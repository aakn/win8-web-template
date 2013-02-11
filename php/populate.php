<?php
	include_once("../config.ini");

	$category = "Category";
	$subcategory = "SubCategory";
	$subcat_id=0;
	$itemname="Item";
	$price = "Price";
	$description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eros dui, sollicitudin in pulvinar vulputate, ultrices volutpat elit. In pulvinar luctus tellus a placerat. Etiam non arcu dui. Aenean iaculis, turpis vitae egestas consectetur, dolor quam interdum tortor, cursus tempor augue ipsum id lacus. Mauris vel metus nunc. Proin mattis bibendum lectus in commodo. Duis posuere auctor nisi id tempor. Nulla in urna ligula. Phasellus dapibus, augue vitae tincidunt varius, dui magna faucibus libero, a congue sem dolor quis odio. Donec eu orci eros. Nullam ultricies nulla at libero bibendum sollicitudin. Mauris tincidunt sem non orci volutpat mollis. Nam tortor quam, vulputate id aliquam ullamcorper, mattis vel purus. Vestibulum quis mi ipsum.";
	
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
				$iname = "$item $count";
				$query = "INSERT INTO ecom (category, subcategory,itemid,itemname,description,price) VALUES ('$cname','$scname','$subcat_id','$iname','$description','$price');";
				$result = pg_query($db, $query);
				echo "$query<br/>";
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