<?php
	include_once('../config.ini');
	$query = "SELECT * from photos";
	$result = pg_query($db, $query);
	$num = pg_num_rows($result);
	echo "number of rows: $num <br/>";
	$rows=array();
	while($row = pg_fetch_row($result)) {
		$rows[] = $row;
		$image = $row.photo;
		var_dump($image);
		echo $image."<br/>";
		echo "img src='$image'<br/>";
		echo "<img src='$image'/><br/>";
	}
	echo json_encode($rows);
?>