<?php

require 'init_sql.php';

//function events_progress(){
	global $connect;
	$sql = "SELECT title,  date_created, event_date FROM progress1";
	$result = $connect->query($sql);
	date_default_timezone_set("America/Chicago");
	if($result->num_rows > 0){
		//compute difference in time
		while($row = $result->fetch_assoc()){
			$date_end = $row['event_date'];
			$date_start = $row['date_created'];
			$total_time = abs(strtotime($date_end) - strtotime($date_start));
			$now = date("Y-m-d h:i:s");
			$time_until = abs(strtotime($now) - strtotime($date_start));
			$progress = round((($time_until / $total_time) * 100),0);
			echo 'Title: ' . $row['title'] . ' Progress: ' . $progress . '%<br>';
		}
	}
	//table is empty 
	else{
		echo 'PLEASE CREATE AN EVENT';

	}

//}


//run events_progress()
//events_progess();

?>
