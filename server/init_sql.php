<?php

/* declare variables */
$server = "localhost";
$username = "ebwd";
$password = "ebwd707";
$db = "progress";

try {
	$connect = new mysqli($server, $username, $password, $db);
} catch (Exception $e) {
	//if using Wynn's db, switch to Wynn's db
	include 'dbvars.php';
	$connect = new mysqli($server, $username, $password, $db);
}

// for db compatibility for Wynn's db (different name)

echo $server;

if ($connect->connect_errno) {
	echo "Failed connection to Mysql: (" . $connect->connect_errno . ") ". $connect->connect_error;
	}
}




?>