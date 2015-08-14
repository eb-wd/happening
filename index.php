<?php 
set_include_path('server/');

require 'init_sql.php';

?><!doctype html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
    <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <title>stuff</title>
  <!-- <link rel="stylesheet" href="/css/styles.css?v=1.0"> -->
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
<div class="container">
	<div class="masthead">
	<nav class="navbar nav-default">
		<div class="container-fluid hidden-xs hidden-sm">
			<div id="navbar">
			<ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
			</ul>
			</div>
		</div>
	</nav>
	</div>
	<!-- END OF MASTHEAD AND NAV -->
	<!-- BEGINNING OF CONTENT BOX -->
	<div id="content">
	<!-- MOBILE NAV -->
	<div class="dropdown hidden-lg hidden-md" id="mobilnav">
		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			  <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			<li><a href="#">Home</a></li>
		</ul>
	</div>
	<!-- END MOBILE NAV -->
	<h1>Timeline</h1>
	<form action="server/create_event.php" method="post">
		Title<input id="event_title" type="text" name="title"/>
		Date:<input id="event_date" type="datetime-local" name="date"/>
		Time:<input id="time_date" type="time" name="time"/>
  		<input type="submit" value="submit" id="process_event"/>
	</form>
	<button id="show_table">Show Events</button>
	<div class="table_container"></div>
	<div class="prog"></div>
	<?php
/*
		$qr = "SELECT title, date_created, event_date FROM progress1";
		$result = $connect->query($qr);
		if($result->num_rows > 0){
		 while($row = $result->fetch_assoc()){
			echo 'title: ' . $row['title'] . " Event Date: " . $row['event_date'] . " Date Created: " . $row['date_created'] . "<br>";
		 }
		}
*/
	?>
	</div>
	<!-- END OF CONTENT BOX -->
</div>

 <!-- END MAIN CONTAINER -->
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/show_table.js" defer></script>
<script src="js/show_progress.js" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>

</html>
