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
 	
 	include_once('config.ini');
 	$query = "SELECT employee_id, last_name, first_name, title "
 		."FROM employees ORDER BY last_name ASC, first_name ASC";
 	$result = pg_query($db, $query);

 	while($row = pg_fetch_assoc($result)) {
 		echo "<tr>";
	    echo "<td>" . $row["employee_id"] . "</td>";
	    echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
	    echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
	    echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
	    echo "</tr>";
 	}

 	
?>

   </tbody>
  </table>
 </body>
</html>