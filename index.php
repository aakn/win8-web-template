 <?php
 	include('config.ini');
 	$query = "SELECT employee_id, last_name, first_name, title "
 		."FROM employees ORDER BY last_name ASC, first_name ASC";
 	$result = pg_query($db, $query);
 	print_r($result);
 	echo $result;
?>