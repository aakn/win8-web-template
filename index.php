 <?php
 	
 	include_once('config.ini');
 	$query = "SELECT employee_id, last_name, first_name, title "
 		."FROM employees ORDER BY last_name ASC, first_name ASC";
 	$result = pg_query($db, $query);
 	$final = array();
 	while($row = pg_fetch_assoc($result)) {
 		$final[] = $row;
 	}
 	echo json_encode($final);
 	
?>
<?php
	include_once("connection.ini");
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