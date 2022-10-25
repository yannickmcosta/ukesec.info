<?php
	class ESECEngine {
		private	$dbHandler			=	NULL;

		public	$disconnectionRota	=	NULL;

		public function __construct() {
			try {
				$this->dbHandler	=	new DBConnection(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
			} catch (Exception $e ) {
				throw $e;
			}
		}

		private static function isEmptyNull($data) {
			try {
				if (empty($data) || !isset($data)) {
					return TRUE;
				} else {
					return FALSE;
				}
			} catch (Exception $e) {
				throw $e;
			}
		}

		public function fetchDisconnectionRota($loadBlock) {
			try {
				if (self::isEmptyNull($loadBlock)) {
					// return NULL
					return $this->disconnectionRota;
				}

				$loadBlock	=	strtoupper($loadBlock);

				$query		=	$this->dbHandler->query("SELECT day_of_week AS dow, disconnection_rota.period_id AS pid, load_block AS lb, level_of_disconnection AS lod, start_time AS st, end_time AS et FROM disconnection_rota INNER JOIN time_periods ON disconnection_rota.period_id = time_periods.period_id WHERE load_block = BINARY ? AND level_of_disconnection <= ? ORDER BY dow, pid;", $loadBlock, CURRENT_LOD);

				if (count($query) >= 1) {
					$this->disconnectionRota	=	array();
					foreach ($query as $row) {
						$line['dow']	=	$row[0];
						$line['pid']	=	$row[1];
						$line['lb']		=	$row[2];
						$line['lod']	=	$row[3];
						$line['st']		=	$row[4];
						$line['et']		=	$row[5];
						array_push($this->disconnectionRota, $line);
					}
					$this->disconnectionRota	=	json_decode(json_encode($this->disconnectionRota, TRUE));
				}
				return $this->disconnectionRota;
			} catch (Exception $e) {
				throw $e;
			}
		}

		public function handleLevel0() {
			try {
				if (CURRENT_LOD == 0) {
					echo "BEGIN:VCALENDAR" . PHP_EOL;
					echo "VERSION:2.0" . PHP_EOL;
					echo "PRODID:icalendar-ruby" . PHP_EOL;
					echo "CALSCALE:GREGORIAN" . PHP_EOL;
					echo "X-WR-CALNAME:UK Scheduled Power Disconnections" . PHP_EOL;
					echo "X-APPLE-LANGUAGE:en" . PHP_EOL;
					echo "X-APPLE-REGION:GB" . PHP_EOL;
					echo "END:VCALENDAR" . PHP_EOL;
					die();
				}
			} catch (Exception $e) {
				throw $e;
			}
		}
	}