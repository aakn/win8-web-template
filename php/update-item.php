<?php

	include_once('../config.ini');
	$id = $_POST["id"];

	$result = pg_query($db, "select * from $tname limit 1");
	$i = 1;
	$field_name_row = array();
	$field_value_row = array();

	$pairs = array();
	while($i < pg_num_fields($result)) 
	{
		$fieldName = pg_field_name($result, $i);
		
		$value = $_POST[$fieldName];
		if($value) {
			$field_name_row[] = $fieldName;
			$field_value_row[] = $value;
			$item = $fieldName . " = '" . $value . "'";
			$pairs[] = $item;
			//echo "$item\n";
		}
		$i++;

	}
	
	//FIX THE QUERY
	$query = "UPDATE $tname SET ".implode(", ",$pairs)." where id=$id;";

	$result = pg_query($db, $query);

	echo "Updated Successfully\n$query";

?>