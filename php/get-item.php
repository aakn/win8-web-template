<?php
	include_once('../config.ini');
	$id = $_POST["itemid"];
	$query = "SELECT * from template where id=$id";

	$result = pg_query($db, $query);
	$rows = array();
	$rows[] = pg_fetch_assoc($result);
	echo json_encode($rows);
?>