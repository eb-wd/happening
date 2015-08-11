<!doctype html>
<?php 
  $server = "localhost";
  $username = "ebwd";
  $password = "ebwd707";
  $db = "progress";

  $connect = new mysqli($server, $username, $password,$db);
  if($connect->connect_errno){
      echo "Failed connection to Mysql: (" . $connect->connect_errno . ") ". $connect->connect_error;
  }
?>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>stuff</title>
  <!-- <link rel="stylesheet" href="/css/styles.css?v=1.0"> -->
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
<form action="server/create_event.php" method="post">
  Title<input id="event_title" type="text" name="title"/>
  Date:<input id="event_date" type="datetime-local" name="date"/>
  Time:<input id="time_date" type="time" name="time"/>
  <input type="submit" value="submit" id="process_event"/>
</form>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
      <!--<script src="js/main.js"></script>-->
      <script>
      $('#process_event').click(function(){
        var date = document.getElementById('event_date').value;
      console.log(date);
    });
      </script>

</html>
