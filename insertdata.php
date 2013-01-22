<?php
	$connection_string = "dbname=de6tvs4ke4h1nt host=ec2-54-243-235-100.compute-1.amazonaws.com port=5432 user=uvscftzkhczzoz password=qbMzLTEWpn-aU8kCFGh2UDSrdQ sslmode=require";
	$db = pg_connect($connection_string);
	if(!$db) {
		echo "Database Connection Error";
		exit;
	}
	// include_once('config.ini');
	// $result = pg_query($db, "select * from employees limit 1");
	// $i = 1;
	// $field_name_row = array();
	// $field_value_row = array();
	// while($i < pg_num_fields($result)) 
	// {
	// 	$fieldName = pg_field_name($result, $i);
		
	// 	$value = $_POST[$fieldName];
	// 	if($value) {
	// 		$field_name_row[] = $fieldName;
	// 		$field_value_row[] = $value;
	// 	}
	// 	$i++;
	// }

	// echo implode(",",$field_name_row)."<br/>";
	// echo implode(",",$field_value_row)."<br/>";
	// $field_name_row = array("last_name","first_name","title");
	// $field_value_row = array($_POST["last_name"],$_POST["first_name"],$_POST["title"]);

	//$query = "INSERT INTO employees (".implode(", ",$field_name_row).") VALUES ('".implode("', '",$field_value_row)."');";
	$query = "INSERT INTO employees (last_name, first_name, title) VALUES('Asgar', 'Ali', 'Intern');";
	echo $query ."<br/>";
	pg_query = ($db, $query);
	//echo $_POST["last_name"]."<br/>".$_POST["first_name"]."<br/>".$_POST["title"];
	echo "inserted successfully";
?>