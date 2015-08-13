<?php 

require 'init_sql.php';


function create_event() {

  global $connect;
  date_default_timezone_set('America/Chicago');
  $date_str = $_POST['date'];
  $new_date = date('Y-m-d H:m:s', strtotime($date_str));
  echo $new_date;
  /*$date = date('Y-m-d', strtotime($_POST['date']));*/
  $title = $_POST['title'];
  $sql = "INSERT INTO progress1 (title, event_date) VALUES ('$title', '$new_date')";
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
create_event();






?>


