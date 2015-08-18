/* 
*  clocks.js
*  runs and reloads clocks 
*/

"use strict";

/* load knobs function */
function create_knob(){
  $(".dial").knob();
}

var refresh = function() {
  /* load clocks */
  $('#clock_wrapper').load('server/display_events.php');

  setTimeout(function() {
    // delay half second for AJAX to work, then create_knob and update
    create_knob();

    /* update clocks */
    $('.eventclock').each(function() {
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
  }, 500);
  create_knob();
  /* end update clocks */
};

$(document).ready(refresh); // refresh at page load

$('#refresh').click(refresh); // refresh upon button press

