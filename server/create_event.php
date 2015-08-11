<?php 
  $server = "localhost";
  $username = "ebwd";
  $password = "ebwd707";
  $db = "progress";

  $connect = mysql_connect($server, $username, $password);
  if(!$connect){
	die('could not connect: ' . mysql_error());
  }
  echo 'connected';
  $select = mysql_select_db($db,$connect);

date_default_timezone_set('America/Chicago');
$date_str = $_POST['date'] . " " . $_POST['time'];
$new_date = date('Y-m-d H:m:s', strtotime($date_str));
/*$date = date('Y-m-d', strtotime($_POST['date']));*/
$title = $_POST['title'];
$sql = "INSERT INTO progress1 (title, date_created, event_date) VALUES('$title', NOW(), '$new_date')";
$result = mysql_query($sql);

if($result){
	echo "SUCCESS";
}


mysql_close($connect);
?>


