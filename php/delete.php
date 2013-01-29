<?php
	include("../config.ini");
	$id = $_POST["itemid"];
	$query="delete from template where id=".$id;
	$result=pg_query($db,$query);
	echo "done";

?>