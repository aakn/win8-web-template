<?php
	include_once('../config.ini');
	$query = "SELECT * from $tname";

	$result = pg_query($db, $query);
	$rows=array();
	while($row = pg_fetch_assoc($result)) {
		$rows[] = $row;
	}
	echo json_encode($rows);
?>