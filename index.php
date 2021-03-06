			<?php 
set_include_path('server/');
require 'init_sql.php';
?>
<!doctype html>
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
  			$(".dial").knob({
  //				'format' : function (value) {
    // 					return value + ' Days';
  //				},
			    'draw': function() {
       				 $(this.i).css('transform', 'roate180deg').css('font-size', '10pt');
    				}
			});
		}
  	</script>
        <?php
		require 'event_progress.php';
		$events = events_progress();
		$titles = array();
		$length = count($events);
		$colors = array( "#006BB2", "#007ACC", "#008AE6", "#0099FF","#C2F0FF");
		for($i =0; $i < $length; $i++){
			$title = $events[$i][0];
			array_push($titles, $title);
			$time_until = $events[$i][1];
			$sec = $time_until % 60;
                        $min = floor(($time_until / 60) % 60);
                        $hours = floor($time_until / 3600) % 24;
			$total_days = floor($events[$i][2] / 86400);
			$days = floor($time_until / 86400);
			$j = $i;
			if($j % 3 == 0){
				echo '<div class="row">';
				$row_begin = $j;
			}
              echo '<div id="eventcols" class="col-md-4 col-6-sm col-12-xs">
		<div class="eventclock">
                        <div class="dayz">
                                <div class="innerd"><input id="day" type="text" value="' . $days . '"  data-min="0" data-max="' . $total_days . '" data-height="300" data-width="300" data-thickness="0.3" data-bgColor="' . $colors[4] . '" data-fgColor="' . $colors[0] . '" class="dial day"></div>
                        </div>
                        <div class="hourz">
                               <div class="innerh"> <input id="hour" type="text" value="' . $hours . '"  data-min="0" data-max="220" data-height="210" data-width="210" data-thickness="0.25" data-displayinput=false data-fgColor="' . $colors[1] . '" data-bgColor="' . $colors[4] . '" class="dial hour"></div>
                        </div>
                        <div class="minz">
                                <div class="innerm"><input id="min" type="text" value="' . $min . '"  data-displayInput=false data-min="0" data-max="60" data-height="170" data-width="170" data-displayinput=false data-fgColor="' . $colors[2] . '" data-bgColor="' . $colors[4] . '" class="dial min"></div>
                        </div>
                        <div class="secz">
                                <div class="inners"><input id="secs" type="text" value="' . $sec . '"  data-displayInput=false data-min="0" data-max="60" data-height="145" data-width="145" data-thickness="0.1" data-fgColor="' . $colors[3] . '" data-bgColor="' . $colors[4] . '" class="dial sec"></div>
                        </div>
                </div>
		<div class="caption"><h3>' . $title . '</h3>
				    <h5>' . $days . ' Days ' . $hours . ' hours ' . $min . ' minutes </h5>
		</div>
		</div>';
			if($j % 3 == 2){ echo '</div>';}
		}
        ?>

	<script>create_knob();
		var titles  = <?php echo json_encode($titles);?>;
//		$(".dial day").each(function(index){
  //                      $(this).val(this.val()).trigger('change');
//			$(this).val($(this).val() + ' Days');
//		});
	</script>
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
<div class="row">
	<div id="create_event" class="lightbox">
  	<form id="" class="" style="" onsubmit="return isValidDate();" action="server/create_event.php" method="post">
  		<div class="form-group">
			<label for="event_title">Title:</label>
			<input id="event_title" type="text" name="title"/>
		</div>
		<div class="form-group">
  			<label for="event_date">Date:</label>
			<input id="event_date" type="datetime-local" name="date"/>
  		</div>
		<div class="form-group">
			<label for="time_date">Time:</label>
			<input id="time_date" type="time" name="time"/>
   		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="submit" id="process_event"/>
		</div>
  	</form>
	</div>
        <div id="update_event" class="lightbox">
        <form id="" class="" style="" onsubmit="return isValidDate();" action="server/update_event.php" method="post">
                <div class="form-group">
                        <label for="event_title">Title:</label>
			<select name="title">
				<?php
                			$events = events_progress();
					$length = count($events);
			                for($i =0; $i < $length; $i++){
						$title = $events[$i][0];
						echo '<option value="'.$title .'">' . $title . '</option>';
					//	echo '<li id="'. $title . '"><a href="#" onclick="ondropSelect(this)">'. $title . '</a></li>';
					}
				?>
  				</ul>
			</select>
                </div>
		<div class="form-group">
			<label for="new_title">New Title:</label>
			<input id="new_title" type="text" name="new_title"/>(optional)
		</div>
                <div class="form-group">
                        <label for="event_date">Date:</label>
                        <input id="event_date" type="datetime-local" name="date"/>
                </div>
                <div class="form-group">
                        <label for="time_date">Time:</label>
                        <input id="time_date" type="time" name="time"/>
                </div>
                <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="submit" id="process_event"/>
                </div>
        </form>
        </div>
	<script>
	//GETS A LIST OF TITLES TO UPDATE VALUE
	</script>
	<div style="margin-top: 100px;">
  	<button id="add_event">Create Event</button>
	<button id="show_table">Show Events</button>
	<button id="up_event">Update Event</button>
  	<div class="table_container"></div>
  	<div class="prog"></div>
	</div>
  	</div>
</div>
  	<!-- END OF CONTENT BOX -->
  </div>

   <!-- END MAIN CONTAINER -->
</body>
<script src="js/show_table.js" defer></script>
<script src="js/show_progress.js" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/jquery.lightbox_me.js"></script>
<script>
$('#add_event').click(function(e) {
    $('#create_event').lightbox_me({
        centered: true, 
        onLoad: function() { 
            $('#create_event').find('input:first').focus()
            }
        });
    e.preventDefault();
});
$('#up_event').click(function(e){
	$('#update_event').lightbox_me({
		centered: true,
		onLoad: function(){
			$('#update_event').find('input:first').focus()
			}
		});
		e.preventDefault();

});
function isValidDate(){
		var now = new Date();
		var date = $("#event_date").val();
		var new_date = new Date(date.replace(/-/g,'/').replace('T',' '));
		if(new_date < now){
			alert("Woops Please choose a date in the future");
			return false;
	}
}
</script>
</html>
