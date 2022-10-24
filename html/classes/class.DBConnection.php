<?php
	
	date_default_timezone_set("Europe/London");
	
	class DBConnection  
	{
		/* MySQL error codes */
		const DUPLICATE_ENTRY = 1062;
		const FK_CHILD_CONSTRAINT = 1452;
		const FK_PARENT_CONSTRAINT = 1451;
		const INNODB_DEADLOCK = 1213;
		const TRIGGER_EXCEPTION = 1644;
		
		private $conn;
		private $dbHost;
		private $dbName;
		
		/**
	 	 * @param string $dbHost
		 * @param string $dbUser
		 * @param string $dbPass
		 * @param string $dbName
		 * @param int $dbPort
		 *
		 * @return void
		 */
		public function __construct($dbHost, $dbUser, $dbPass, $dbName, $dbPort = "3306")
		{
			$this->conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort);
			
			$this->dbHost = $dbHost;
			$this->dbName = $dbName;
			
			if ($this->conn->connect_errno > 0)
			{
				throw new Exception($this->conn->connect_error . " (Host: " . $dbHost . "; Database: " . $dbName . ")", $this->conn->connect_errno);
			}
		}
		
		/**
		 * @return void
		 */
		public function __destruct()
		{
			$this->conn->close();
		}
		
		/**
		 * Converts all values in an array to references
		 *
		 * @param array &$array
		 *
		 * @return array
		 */
		public function array_refs(&$array)
		{
			$result = array();
			
			foreach ($array as &$element)
			{
				$result[] = &$element;
			}
			
			return $result;
		}
		
		/**
	 	 * @param bool $bool
	 	 *
		 * @return void
		 */
		public function autocommit($bool)
		{
			$this->conn->autocommit($bool);
		}
		
		/**
		 * @return void
		 */
		public function commit()
		{
			$this->conn->commit();
		}
		
		/**
	 	 * @param string $str
	 	 *
		 * @return void
		 */
		public function escape($str)
		{
			return $this->conn->real_escape_string($str);
		}
		
		/**
		 * Parses the given duplicate entry error and returns the corresponding column name
		 *
		 * @param string $table
		 * @param string $errorMsg
		 *
		 * @return string
		 */
		public function get_unique_column($table, $errorMsg)
		{
			/* Just in case the phrase ' for key ' happens to be in the duplicate value and therefore appears more
				than once in the error message... */
			$array = explode("' for key '", $errorMsg);
			
			/* The middle entry will always be the right one regardless of the above */
			$index = count($array) / 2;
			
			if (!is_whole_number($index))
			{
				throw new Exception("Failed to correctly parse error message '" . $errorMsg . "'");
			}
			
			/* Get name of corresponding unique key */
			$key = strtok($array[$index], "'");
			
			/* Get list of indexes for this table */
			$result = $this->query("SHOW INDEXES FROM `" . $table . "`");
			
			/* Get column name corresponding to unique key */
			foreach ($result as $row)
			{
				if ($row[2] == $key)
				{
					$column = $row[4];
					break;
				}
			}
			
			if (!isset($column))
			{
				throw new Exception("No index found in table '" . $table . "' with the name '" . $index . "'");
			}
			
			return $column;
		}
	
		/**
	 	 * @return string
		 */
		public function get_db()
		{
			return $this->dbName;
		}
		
		/**
	 	 * @return string
		 */
		public function get_host()
		{
			return $this->dbHost;
		}
		
		/**
	 	 * @return int
		 */
		public function get_insert_id()
		{
			return $this->conn->insert_id;
		}
		/**
		 * Executes a query (via a prepared statement if arguments are provided) and returns the result
		 * 
		 * @param string $query
		 * @param mixed $_ [optional]
		 *
		 * @return array
		 */
		public function query($query, $_ = NULL)
		{
			/* Get all function arguments */
			$args = func_get_args();
			
			/* Remove query, leaving just query parameters */
			array_shift($args);
			
			$numParameters = count($args);
			
			$result = array();
			
			try
			{
				/* If no query parameters, don't use prepared statement */
				if ($numParameters == 0)
				{
					/* Process query */
					$mysqliResult = $this->conn->query($query);
					
					if (!$mysqliResult)
					{
						throw new Exception($this->conn->error, $this->conn->errno);
					}
					
					if (is_object($mysqliResult))
					{
						/* Get result */
						while ($row = $mysqliResult->fetch_row())
						{
							array_push($result, $row);
						}
						
						$mysqliResult->free();
					}
					else
					{
						$result["affectedRows"]		=	$this->conn->affected_rows;
						$result["Affected rows"]	=	$this->conn->affected_rows;
						$result["affected_rows"]	=	$this->conn->affected_rows;
					}
				}
				else
				{
					/* Treat all parameters as strings */
					$types = str_repeat("s", $numParameters);
					
					/* Add parameter types */
					array_unshift($args, $types);
					
					/* Prepare statement */
					$stmt = $this->conn->prepare($query);
					
					if (!$stmt)
					{
						throw new Exception($this->conn->error, $this->conn->errno);
					}
					
					/* Check correct number of parameters have been provided */
					if ($numParameters != $stmt->param_count)
					{
						throw new Exception("Number of parameters does not match");
					}
					
					/* Bind parameters to statement */
					if (!call_user_func_array(array($stmt, "bind_param"), $this->array_refs($args)))
					{
						throw new Exception("Failed to bind parameters", $stmt->errno);
					}
					
					$count = 0;
					
					while (true)
					{
						if ($stmt->execute())
						{
							break;
						}
						
						if ($stmt->errno != self::INNODB_DEADLOCK)
						{
							throw new Exception($stmt->error, $stmt->errno);
						}
						
						/* Retry if statement failed to execute due to InnoDB deadlock */
						
						++$count;
						
						if ($count <= 10)
						{
							usleep(100000);
						}
						else if ($count <= 20)
						{
							sleep(1);
						}
						else if (date("G") <= 7)
						{
							sleep(10);
						}
						else
						{
							throw new Exception($stmt->error, $stmt->errno);
						}
					}
					
					/* If query returned a result */
					if ($stmt->field_count > 0)
					{
						/* Get empty array of correct size */
						$array = array_fill(0, $stmt->field_count, "");
						
						/* Convert array values to references */
						$fields = $this->array_refs($array);
						
						/* Bind query result */
						if (!call_user_func_array(array($stmt, "bind_result"), $fields))
						{
							throw new Exception("Failed to bind result", $stmt->errno);
						}
						
						/* Get results */
						while ($success = $stmt->fetch())
						{
							for ($i = 0; $i < count($fields); ++$i)
							{	
								$row[$i] = $fields[$i];
							}
						
							array_push($result, $row);
						}
						
						if ($success === false)
						{
							throw new Exception("Failed to fetch result", $stmt->errno);
						}
					}
					else
					{
						$result["affectedRows"] = $stmt->affected_rows;
						$result["Affected rows"] = $stmt->affected_rows;
					}
					
					$stmt->close();
				}
			}
			catch (Exception $e)
			{
				$errorMsg = $e->getMessage() . " (Host: " . $this->dbHost . "; Database: " . $this->dbName . "; Query: " . $query;
				
				if ($numParameters > 0)
				{
					if (!empty($stmt))
					{
						$stmt->close();
					}
					
					/* Remove parameter types */
					array_shift($args);
					
					$errorMsg .= "; Parameter list: {" . implode(", ", $args) . "}";
				}
				
				$errorMsg .= ")";
				
				throw new Exception($errorMsg, $e->getCode());
			}
			
			return $result;
		}
		
		/**
		 * @return void
		 */
		public function rollback()
		{
			$this->conn->rollback();
		}
	}
