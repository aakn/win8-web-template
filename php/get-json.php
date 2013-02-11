<?php
	include_once('../config.ini');
	$page = $_GET["page"];
	$query = "SELECT * from $tname LIMIT 20";

	$result = pg_query($db, $query);
	$rows=array();
	while($row = pg_fetch_assoc($result)) {
		$rows[] = $row;
	}

	if($page=="main"){
		array_filter($rows,"mainpage");
	}
	else
		echo json_encode($rows);

	function mainpage($var) {
		print_r($var);
		if($var["itemid"]==1) return true;
		else return false;
	}
?>