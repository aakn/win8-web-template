<?php
	include_once("../config.ini");
	include_once("getimages.php");

	//$category = array("");
	//$subcategory = "SubCategory";
	$subcat_id=0;
	//$itemname="Item";
	$price = "Price";
	$description="Polyester, Dry Clean Only, Exposed back zipper, Pleated skirt, Fit and flare silhouette.";
	
	//$img = array("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXY3B0cPoPAANMAcOba1BlAAAAAElFTkSuQmCC",
		// "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXY7h4+cp/AAhpA3h+ANDKAAAAAElFTkSuQmCC",
		// "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXY5g8dcZ/AAY/AsAlWFQ+AAAAAElFTkSuQmCC"
		// );

	$number_of_category = count($img);
	$number_of_sub_category = 6;
	$items_per_sub_category = 50;

	$i=1;
	$count = 1;

	//while($i<=$img) {
	foreach ($img as $key => $subcat) {
		$j=1;
		
		$cname = $key;



		//while($j<=$number_of_sub_category){
		foreach ($subcat as $key => $value)
			$scname=$value["name"];
			$subcat_id=1;

			if($cname == "Clothes" && $scname == "Fit and Flare") {
				foreach($fitandflare as $key => $value) {
					$iname = $value["name"];
					$rand = rand(100,1000);
					$price = "\$".$rand;
					$photo=$value["base64"];
					$query = "INSERT INTO ecom (category, subcategory,itemid,itemname,description,price,photo) VALUES ('$cname','$scname','$subcat_id','$iname','$description','$price','$photo');";
					$result = pg_query($db, $query);
					//echo "$query<br/>";
					//echo $result;
					$count++;
					$subcat_id++;
				}

				break;
			}

			
			while($subcat_id<=$items_per_sub_category) {
				$iname = $scname;
				$rand = rand(100,1000);
				$price = "\$".$rand;
				$photo=$value["base64"];
				$query = "INSERT INTO ecom (category, subcategory,itemid,itemname,description,price,photo) VALUES ('$cname','$scname','$subcat_id','$iname','$description','$price','$photo');";
				$result = pg_query($db, $query);
				//echo "$query<br/>";
				//echo $result;
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