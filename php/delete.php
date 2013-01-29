<?php
	include("../config.ini");
	$id = $_POST["id"];
	$query="delete from template where id=$id";
	$result=pg_query($db,$query);
	echo "done $result\n$query";

?>