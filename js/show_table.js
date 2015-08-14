
$(document).ready(function() {

	$('#show_table').click(function() {
		// use AJAX to load load_table.php into .table_container div upon $show_table button press
		$('.table_container').load('../server/load_table.php');
	});

});
