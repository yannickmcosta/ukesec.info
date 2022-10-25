<?php
	error_log(json_encode($_POST));
	header("HTTP/1.1 200 OK");
	header("Content-Type: application/json");
	echo "{}";