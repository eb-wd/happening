<?php 

require 'init_sql.php';


function update_event() {

  global $connect;
  date_default_timezone_set('America/Chicago');
  $date_str = $_POST['date'];
  $new = $_POST['new_title'];
  $title = $_POST['title'];
 // $new_date = date('Y-m-d H:m:s', strtotime($date_str));
 // echo $new_date;
  /*$date = date('Y-m-d', strtotime($_POST['date']));*/
  if(strlen($new) > 0){
	  $sql = "UPDATE progress1 SET title='$new', event_date ='$date_str' WHERE title='$title'";

  }
  else{
  	$sql = "UPDATE progress1 SET title='$title', event_date ='$date_str' WHERE title='$title'";
  }
  $result = $connect->query($sql);

  if( $result ) {
    // show success message and redirect to homepage
    echo "SUCCESS";
    $homepage = $_SERVER['HTTP_REFERER']; 
    header("Location: " . $homepage);
    die();

  } else {
    //stay on page and show error
    echo "Error" . $connect->error;
  }

  $connect->close(void);
}

// launch create_event
update_event();






?>


