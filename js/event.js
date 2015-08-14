/*
*
* Contains functions that creates a event object which can be fed to rw.js
*
*/

"use strict";

function ntwr(date) {
	// takes date string in format YYYY-MM-DD and returns date object
	var dateArray = date.split("-");
	var eventDate = new Date(dateArray[0],dateArray[1],dateArray[2]);
	return eventDate;
}