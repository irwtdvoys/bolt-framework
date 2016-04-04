<?php
	// General
	define("DEPLOYMENT", "development"); // development or production
	define("API_NAME", "ARC_BLOOD");

	// Versioning
	define("VERSION_EXTERNAL_AUTH", "v1.6");
	define("VERSION_EXTERNAL_SIEBEL", "qa");
	define("VERSION_INTERNAL_FRAMEWORK", "v3.1.0");
	define("VERSION_INTERNAL_BLOOD", "v1.8.6");
	define("VERSION_INTERNAL_API", "test");

	if (DEPLOYMENT == "development") // Framework expects server to be setup with no errors displayed
	{
		ini_set("display_errors", 1);
		ini_set("error_reporting", E_ALL & ~E_NOTICE);
	}

	require_once(ROOT_SERVER . "library/functions.php");

	$config = array("database", "roots");

	foreach ($config as $next)
	{
		require_once(ROOT_SERVER . "library/config/" . $next . ".php");
	}

	/*$connection = array(
		"type" => DB_TYPE,
		"host" => DB_HOST,
		"port" => DB_PORT,
		"database" => DB_NAME,
		"username" => DB_USER,
		"password" => DB_PASS,
		"autoconnect" => true
	);*/

	$_USERID = 0;
?>
