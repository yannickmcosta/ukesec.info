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
					// If the current level of disconnection is 0,
					// give the user a blank calendar, with no events
					// just to keep the calendar apps happy
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

		public function createLog() {
			try {
				// Log the useragent, if it's available
				if (!self::isEmptyNull($_SERVER['HTTP_USER_AGENT'])) {
					$userAgent	=	$_SERVER['HTTP_USER_AGENT'];
				} else {
					// Else, bin it, not important
					$userAgent	=	NULL;
				}

				// Log the connecting IP, if available
				if (!self::isEmptyNull($_SERVER['HTTP_CF_CONNECTING_IP'])) {
					// Translate the Cloudflare proxy IP to the original IP
					$ipAddress	=	$_SERVER['HTTP_CF_CONNECTING_IP'];
					if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
						// Replace the last octet with a 0 to perform a degree of pseudanonymisation
						$ipAddress = long2ip(ip2long($ipAddress) & 0xFFFFFF00);
					} else {
						// Do some IPv6 sanitisation here
					}
				} else if (!self::isEmptyNull($_SERVER['SERVER_ADDR'])) {
					// This is more for development as it's unlikely to be correct in the wild
					$ipAddress	=	$_SERVER['SERVER_ADDR'];
					if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
						// Replace the last octet with a 0 to perform a degree of pseudanonymisation
						$ipAddress = long2ip(ip2long($ipAddress) & 0xFFFFFF00);
					} else {
						// Do some IPv6 sanitisation here
					}
				} else {
					// Else, bin it, not important
					$ipAddress	=	NULL;
				}

				// Log the poll so that we can see who's relying on the calendar and how often it's refreshed
				// figures may be skewed due to caching.
				$this->dbHandler->query("INSERT INTO calendar_polls SET ip_address = ?, user_agent = ?, timestamp = NOW()", $ipAddress, $userAgent);
			} catch (Exception $e) {
				// This is a non-blocking function, if it fails, we're not too fussed as it's only analytics data
				error_log($e);
			}
		}
	}