<?php
	if (file_exists("/tmp/development.env")) {
		define("APP_HTTP_SCHEME", "http://");
		define("APP_URL", "127.0.0.1:49255");
		define("APP_URL_SLASH", "127.0.0.1:49255/");

	} else {
		define("APP_HTTP_SCHEME", "https://");
		define("APP_URL", "ukesec.info");
		define("APP_URL_SLASH", "ukesec.info/");
	}

	define("DB_HOST", "ukesec-db");
	define("DB_USER", "ukesec_user");
	define("DB_PASS", "PleaseChangeMe!");
	define("DB_NAME", "ukesec_db");
	define("DB_PORT", 3306);

	// Set the current National Level of Disconnection
	// SET TO 5 FOR DEVELOPMENT ONLY
	define("CURRENT_LOD", 1);
