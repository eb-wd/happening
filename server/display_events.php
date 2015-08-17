<?php

require 'event_progress.php';

function display_events() {
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
	/* display event clocks using clock data */
	?>


	<div class="eventclock" id="event<?php echo $i+1; ?>">
        <input id="day" type="text" value="<?php echo $days; ?>" data-min="0" data-max="<?php echo $total_days;?>" readOnly="true" class="dial hour">
		<input id="hour" type="text" value="<?php echo $hours; ?>" data-min="0" data-max="24" readOnly="true" class="dial hour" >
		<input id="min" type="text" value="<?php echo $min; ?>" data-displayInput=false data-min="0" data-max="60" readOnly="true" class="dial min">
		<input id="secs" type="text" value="<?php echo $sec; ?>" data-displayInput=false data-min="0" data-max="60" readOnly="true" class="dial sec">
	</div>
	<?php }
}

display_events();
?>