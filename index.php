<?php 
set_include_path('server/');

require 'init_sql.php';

?><!doctype html>
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
  <h1>Timeline</h1>
<form action="server/create_event.php" method="post">
  Title<input id="event_title" type="text" name="title"/>
  Date:<input id="event_date" type="datetime-local" name="date"/>
  Time:<input id="time_date" type="time" name="time"/>
  <input type="submit" value="submit" id="process_event"/>
</form>
<button id="show_table">Show Events</button>
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
