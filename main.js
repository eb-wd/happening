"use strict";

/*
*
* main.js initiates the program
*
* Base javascript does not have a require(), import(), or include() function, 
* so we just run this after other .js have been loaded.
*
*/

var d = new Date("October 13, 2015 11:13:00");
var t = "Birthday Bash";

//create new event
//write event to json


function new_event(d, t) {
	var date = d;
	var tite = t;

	var event = {
		date: date,
		title: tite;
	};
}

/* 
* write event to JSON file
te server requires some backend language (backbone.js, PH)
*/


function writeJSON(e) {

	JSON.stringify(e);
}