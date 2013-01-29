<?php

	include_once('config.ini');
	$result = pg_query($db, "select * from template limit 1");
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

	//fix the query..
	$query = "UPDATE template (".implode(", ",$field_name_row).") VALUES ('".implode("', '",$field_value_row)."');";

	$result = pg_query($db, $query);

	echo "Inserted Successfully";

?>