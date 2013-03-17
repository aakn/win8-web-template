<?php
	include_once("../config.ini");
	//include_once("getimages.php");

	$category = "Category";
	$subcategory = "SubCategory";
	$subcat_id=0;
	$itemname="Item";
	$price = "Price";
	$description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porta est id risus consequat in malesuada dui faucibus. Donec pretium lectus vitae magna elementum hendrerit. Nullam sit amet vestibulum urna.";
	
	$img = array("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXY3B0cPoPAANMAcOba1BlAAAAAElFTkSuQmCC",
		"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXY7h4+cp/AAhpA3h+ANDKAAAAAElFTkSuQmCC",
		"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXY5g8dcZ/AAY/AsAlWFQ+AAAAAElFTkSuQmCC"
		);

	$number_of_category = 6;
	$number_of_sub_category = 6;
	$items_per_sub_category = 50;

	$i=1;
	$count = 1;

	while($i<=$number_of_category) {
		$j=1;
		
		$cname = "$category $i";
		while($j<=$number_of_sub_category){
			$scname="$subcategory $j";
			$subcat_id=1;
			
			while($subcat_id<=$items_per_sub_category) {
				$iname = "$itemname $count";
				$rand = array_rand($img);
				$photo=$img[$rand];
				$query = "INSERT INTO $tname (category, subcategory,itemid,itemname,description,price,photo) VALUES ('$cname','$scname','$subcat_id','$iname','$description','$price','$photo');";
				$result = pg_query($db, $query);
				//echo "$query<br/>";
				echo $result;
				$count++;
				$subcat_id++;

				if($i==1 && $subcat_id==10) {
					// Initial Case
					break;
				}
			}
			$j++;
		}
		$i++;
	}
	echo "Inserted Successfully<br/>";

?>