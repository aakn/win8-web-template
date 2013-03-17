<?php
	include_once('config.ini');
	$result = pg_query($db, "select * from $tname limit 1");
	$i = 1;
	$field_name_row = array();
	$field_value_row = array();
	while($i < pg_num_fields($result)) 
	{
		$fieldName = pg_field_name($result, $i);
		
		$value = $_POST[$fieldName];
		if($value) {
			$field_name_row[] = $fieldName;
			$field_value_row[] = $value;
		}
		$i++;
	}

	$query = "insert into $tname (".implode(",",$field_name_row).") values (".implode(",",$field_value_row).")";
	pg_query = ($db, $query);
	echo "inserted successfully";
?>