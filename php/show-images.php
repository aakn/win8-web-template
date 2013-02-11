<?php
	include_once('../config.ini');
	$query = "SELECT * from photos LIMIT 2";
	$result = pg_query($db, $query);
	$num = pg_num_rows($result);
	echo "number of rows: $num <br/>";
	$rows=array();
	while($row = pg_fetch_assoc($result)) {
		$row.photo = stripslashes($row.photo);

		$image = $row.photo;
		var_dump($image);
		echo $image."<br/>";
		echo "img src='$image'<br/>";
		echo "<img src='$image'/><br/>";
		$rows[] = $row;
	}
	echo json_encode($rows);
?>