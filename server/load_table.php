<?php
require 'init_sql.php';
/* Loads full <table> element with SQL data */
?>

<table class="event_table">
	<tr>
		<th>ID #</th>
		<th>Event</th>
		<th>Event Date</th>
		<th>Date Created</th>
	</tr>
	<?php
		$query = "SELECT * FROM progress1";
		if ($data = $connect->query($query, MYSQLI_USE_RESULT)) {
			// if query successful, store resulting db data in $data
			while ($row = $data->fetch_row()) {
				// for each row that exists in $data, print the next row in its own <tr> element
				?><tr>
				<?php
				// for every column in SQL row, create a new <td> element
				foreach ($row as $column) {
					?><td><?php echo $column; ?></td><?php
				}
				?></tr><?php
			}
			$data->close();
		} else {
			// if query fails, report error
			echo '$data = $connect->query($query) failed';
		}
	?>

</table>
