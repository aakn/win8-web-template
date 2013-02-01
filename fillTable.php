<?php								
	include_once('config.ini');
	
	$i=3;
	
	$item3="This is a sample item";
	$item4="This is a sample sample sample sample sample item";
	while($i<10) {
		$j=0;
		$item1 = "group$i";
		while($j<10){
			$item2="subitem$j";

			$query = "INSERT INTO template (item1, item2,item3,item4) VALUES ('$item1','$item2','$item3','$item4');";
			$result = pg_query($db, $query);
			echo "$query<br/>";
			$j++;
		}
		$i++;
	}
	

	echo "Inserted Successfully<br/>";

?>