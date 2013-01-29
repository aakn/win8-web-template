<?php
	include_once('../config.ini');
	$id = $_POST["itemid"];
	$query = "SELECT * from template where id=$id";

	$result = pg_query($db, $query);
	$row = pg_fetch_row($result)
	echo json_encode($row);
?>