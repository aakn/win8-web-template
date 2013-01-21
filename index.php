 <?php
 	/*
 	include('config.ini');
 	$query = "SELECT employee_id, last_name, first_name, title "
 		."FROM employees ORDER BY last_name ASC, first_name ASC";
 	$result = pg_query($db, $query);
 	print_r($result);
 	echo $result;
 	echo "Done";
 	*/
?>
<?php
	$dsn = "pgsql:"
	    . "host=ec2-54-243-235-100.compute-1.amazonaws.com;"
	    . "dbname=de6tvs4ke4h1nt;"
	    . "user=uvscftzkhczzoz;"
	    . "port=5432;"
	    . "sslmode=require;"
	    . "password=qbMzLTEWpn-aU8kCFGh2UDSrdQ";

	$db = new PDO($dsn);
?>
<html>
 <head>
  <title>Employees</title>
 </head>
 <body>
  <table>
   <thead>
    <tr>
     <th>Employee ID</th>
     <th>Last Name</th>
     <th>First Name</th>
     <th>Title</th>
    </tr>
   </thead>
   <tbody>
<?php
$query = "SELECT employee_id, last_name, first_name, title "
    . "FROM employees ORDER BY last_name ASC, first_name ASC";
$result = $db->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row["employee_id"] . "</td>";
    echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
    echo "</tr>";
}
$result->closeCursor();
?>
   </tbody>
  </table>
 </body>
</html>