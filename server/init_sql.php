<?php


/* declare variables */
$server = "localhost";
$username = "ebwd";
$password = "ebwd707";
$db = "progress";

// if using Erik's db, just remove dbvars.php... might add that to .gitignore
//if ( file_exists ( 'dbvars.php' ) || file_exists( 'server/dbvars.php' ) ) {
//	include 'dbvars.php';
//}

$connect = new mysqli($server, $username, $password, $db);

// for db compatibility for Wynn's db (different name)

if ($connect->connect_errno) {
	echo "Failed connection to Mysql: (" . $connect->connect_errno . ") ". $connect->connect_error;
}



?>
