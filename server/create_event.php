<?php 

require 'init_sql.php';





function create_event() {

  date_default_timezone_set('America/Chicago');
  $date_str = $_POST['date'] . " " . $_POST['time'];
  $new_date = date('Y-m-d H:m:s', strtotime($date_str));
  /*$date = date('Y-m-d', strtotime($_POST['date']));*/
  $title = $_POST['title'];
  $sql = "INSERT INTO progress1 (title, date_created, event_date) VALUES('$title', NOW(), '$new_date')";
  $result = $connect::mysql_query($sql);

  if( $result ) {
    echo "SUCCESS";
  } else {
    echo "Error" . $connect->error;
  }

  mysql_close( $connect );
}

// launch create_event
create_event();

/*
*  get previous webpage URL a.k.a. "referrer", and redirect 
*  NOTE: This can be spoofed, and we should set it to a definite URL once we have a working site up and running
*/

$homepage = $_SERVER['HTTP_REFERER']; 

header("Location: " . $homepage);
die();



?>


