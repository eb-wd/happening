"use strict";

/*
*
* main.js initiates the program
*
* Base javascript does not have a require(), import(), or include() function, 
* so we just run this after other .js have been loaded.
*
*/
//creates database
var events = TAFFY();

$(document).ready(function(){
	//if event button is clicked then create NEW EVENT
	$('#process_event').click(function(){
		var title = $('#event_title').val();
		var date = $('#event_date').val();
		var start = new Date("08/05/15");
		var ne = new_event(start,date,title);
		create_event(ne);
	});
});

//returns event object (date,title) to be input into json file
function new_event(n,d, t){T
	var date = d.split("-");
	var y = date[0]; var m = date[1]; var d = date[2];
	var event_date = new Date(y,m-1,d);
	var event_title= t;
	var dateOfCreation = n;
	var event = {
		date_start: dateOfCreation,
		date_end: event_date,
		title: event_title
	};

	return event;
}

//writes event object to database
function create_event(event){
	events.insert(event);
}

//returns a list of date objects 
function get_dates(){
	return events().select("date_start","date_end");
}
//returns array of titles
function get_titles(){
	return events().select("title");
}

function get_all(){
	return events().select("date_start","date_end","title");
}

//returns an array of percentage of event completion
//gets dates of ALL events and calculates time between now and date divided by total time(creation of event to end)
function get_progress(){
	var event_times = get_all();
	var now = new Date("10/10/2015").getTime();

	var progress = [];
	for(var i =0;i<event_times.length;i++){
		var end = event_times[i][1];
		var start = event_times[i][0];
		var title = event_times[i][2];

		var time_until = Math.abs(now- start);
		var total_time = Math.abs(end - start);
		progress.push([time_until/total_time,title]);
	}
	return progress;

}

