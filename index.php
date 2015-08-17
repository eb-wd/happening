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
      <div class="row" id="clock_wrapper">
        <?php require 'display_events.php'; ?>
      </div>
      <!-- DEV STUFF -->
      <form action="server/create_event.php" method="post">
        Title<input id="event_title" type="text" name="title"/>
        Date:<input id="event_date" type="datetime-local" name="date"/>
        Time:<input id="time_date" type="time" name="time"/>
        <input type="submit" value="submit" id="process_event"/>
      </form>
      <button id="refresh">Refresh</button>
      <div class="prog"></div>
      <!-- END OF CONTENT BOX -->
      </div>
  </div>
  <!-- END MAIN CONTAINER -->
</body>
<script src="js/show_table.js" defer></script>
<script src="js/show_progress.js" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<!-- load display_events.php on page load, and refresh on click of #refresh --> 

<script>
/* load clock script */
function create_knob(){
  $(".dial").knob();
}

create_knob();
/* end load clocks */

/* update clock values */
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
<!-- end update clock values -->

</html>
