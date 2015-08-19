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
  <title>Happening</title>
  <!-- <link rel="stylesheet" href="/css/styles.css?v=1.0"> -->
  <!--[if lt IE 9] >
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="js/jquery.knob.js"></script>

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
  	<h1>Yo What's Happening?</h1>
  	<script>
  		function create_knob(){
  			$(".dial").knob();
  		}
  	</script>
        <?php
		require 'event_progress.php';
		$events = events_progress();
		$length = count($events);
		for($i =0; $i < $length; $i++){
			$title = $events[$i][0];
			$time_until = $events[$i][1];
			$sec = $time_until % 60;
                        $min = floor(($time_until / 60) % 60);
                        $hours = floor($time_until / 3600) % 24;
			$total_days = floor($events[$i][2] / 86400);
			$days = ($time_until / 86400);
              echo '<div class="row">
		<div class="eventclock">
                        <div class="dayz">
                                <div class="innerd"><input id="day" type="text" value="' . $days . '"  data-min="0" data-max="' . $total_days . '" data-height="300" data-width="300" data-displayinput=false data-thickness="0.3" class="dial hour"></div>
                        </div>
                        <div class="hourz">
                               <div class="innerh"> <input id="hour" type="text" value="' . $hours . '"  data-min="0" data-max="24" data-height="210" data-width="210" data-thickness="0.25" data-displayinput=false class="dial hour"></div>
                        </div>
                        <div class="minz">
                                <div class="innerm"><input id="min" type="text" value="' . $min . '"  data-displayInput=false data-min="0" data-max="60" data-height="170" data-width="170" data-displayinput=false class="dial min"></div>
                        </div>
                        <div class="secz">
                                <div class="inners"><input id="secs" type="text" value="' . $sec . '"  data-displayInput=false data-min="0" data-max="60" data-height="145" data-width="145" data-thickness="0.1" class="dial sec"></div>
                        </div>
                </div>
		</div>';
/*
	                echo '<div class="row">
				<div class="eventclock">
                                <input id="day" type="text" value="' . $days . '"  data-min="0" data-max="' . $total_days . '" class="dial hour">
                		<input id="hour" type="text" value="' . $hours . '"  data-min="0" data-max="24" class="dial hour">
                		<input id="min" type="text" value="' . $min . '"  data-displayInput=false data-min="0" data-max="60" class="dial min">
                		<input id="secs" type="text" value="' . $sec . '"  data-displayInput=false data-min="0" data-max="60" class="dial sec">
                		</div>
                	</div>';
*/
		}
        ?>
<style>
.row{
	margin-top:300px;
	margin-bottom:300px;
}
.eventclock{
        position:relative;
        width:350px;
        margin:auto;
}
.secz{
        position:absolute;
        left:87.5px;
        top:87px;
}
.inners{
        display:inline;
        width:100px;
        height:100px;
}
.minz{
        position:absolute;
        left:75px;
        top:75px;
}
.innerm{
        display:inline;
        width:100px;
        height:100px;
}
.hourz{
        position:absolute;
        left:55px;
        top:55px;
}
.innerh{
        display:inline;
        width:200px;
        height:200px;
}
.dayz{
        position:absolute;
        left:10px;
        top:10px;
}

.innerd{
        display:inline;
        width:300px;
        height:300px;
}
</style>

	<script>create_knob();</script>
	<script>
	$(".eventclock").each(function(){
		var $clock = $(this);
		setInterval(function(){
			var val = $('#secs', $clock).val();
			if(val == 60){
				val = 0;
				var mins = $('#min', $clock).val();
				mins++;
				if(mins == 60){
					mins = 0;
					var hours = $('#hour',$clock).val();
					hours++;
					if(hours == 24){
						hours = 0;
					}
					$('#hour',$clock).val(hours).trigger("change");
				}
                                $('#min',$clock).val(mins).trigger("change");

			}
			val++;
			$('#secs', $clock).val(val).trigger("change");
			
		}, 1000);
	});
	</script>

  <!-- DEV STUFF -->
  	<form action="server/create_event.php" method="post">
  		Title<input id="event_title" type="text" name="title"/>
  		Date:<input id="event_date" type="datetime-local" name="date"/>
  		Time:<input id="time_date" type="time" name="time"/>
    		<input type="submit" value="submit" id="process_event"/>
  	</form>
  	<button id="show_table">Show Events</button>
  	<div class="table_container"></div>
  	<div class="prog"></div>
  	</div>
  	<!-- END OF CONTENT BOX -->
  </div>
  1
   <!-- END MAIN CONTAINER -->
</body>
<script src="js/show_table.js" defer></script>
<script src="js/show_progress.js" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>

</html>
