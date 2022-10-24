<?php
	if (file_exists("/tmp/development.env")) {
		define("APP_HTTP_SCHEME", "http://");
		define("APP_URL", "127.0.0.1:49155");
		define("APP_URL_SLASH", "127.0.0.1:49155/");

	} else {
		define("APP_HTTP_SCHEME", "https://");
		define("APP_URL", "ukesec.info");
		define("APP_URL_SLASH", "ukesec.info/");
	}
