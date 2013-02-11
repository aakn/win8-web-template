<?php
	include_once('../config.ini');
	$query = "SELECT * from photos LIMIT 1";
	$result = pg_query($db, $query);
	$num = pg_num_rows($result);
	echo "number of rows: $num <br/>";
	$rows=array();
	while($row = pg_fetch_assoc($result)) {
		// $row.photo = stripslashes($row.photo);

		$image = $row["photo"];
		$hey = json_encode($image);
		$hey=stripslashes($hey);
		$image = json_decode($hey);
		echo "$hey";
		echo "<img src='$image'/><br/>";

		$row["photo"]=$image;
		$rows[] = $row;
	}
	echo json_encode($rows);

?>