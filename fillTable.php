<?php								
	include_once('config.ini');
	$result = pg_query($db, "select * from template limit 1");
	$i = 1;
	$field_name_row = array();
	
	while($i < pg_num_fields($result)) 
	{
		$fieldName = pg_field_name($result, $i);
		$field_name_row[] = $fieldName;
	}

	$i=0;$j=0;
	$item3="This is a sample item";
	$item4="This is a sample sample sample sample sample item";
	while($i<10) {
		$item1 = "group$i";
		while($j<10){
			$item2="subitem$j";

			$query = "INSERT INTO template (".implode(", ",$field_name_row).") VALUES ('$item1','$item2','$item3','$item4');";
			$result = pg_query($db, $query);
			echo "$query<br/>";
			$j++;
		}
		$i++;
	}
	

	echo "Inserted Successfully<br/>";

?>