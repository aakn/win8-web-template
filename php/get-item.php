<?php
	include_once('../config.ini');
	$id = $_POST["itemid"];
	$query = "SELECT * from $tname where id=$id";

	$result = pg_query($db, $query);
	$rows = array();
	$row = pg_fetch_assoc($result);
	echo json_encode($row);
?>