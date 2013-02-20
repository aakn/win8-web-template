<?php
	$string =array();
	$rootpath = "../images/";
	$items=array('handbags','clothes','shoes','accesories' ,'fitandflare');

	$img=array();
	$img["Handbags"] = getItems($rootpath.$items[0]."/");
	$img["Clothes"] = getItems($rootpath.$items[1]."/");
	$img["Shoes"] = getItems($rootpath.$items[2]."/");
	$img["Accessories"] = getItems($rootpath.$items[3]."/");
	$fitandflare = getItems($rootpath.$items[4]."/");
	//echo json_encode($img, JSON_PRETTY_PRINT);

	function getItems($filePath) {
		$dir = opendir($filePath);
		while ($file = readdir($dir)) {
		   if (eregi("\.png",$file) || eregi("\.jpg",$file) || eregi("\.gif",$file) ) { 
		   	$string[] = $file;
		   }
		}
		$rows = array();
		while (sizeof($string) != 0){
		  $img = array_pop($string);
		  $item = array();
		  $item["name"] = substr($img,0,-4);
		  $item["base64"] = getBase64($filePath.$img);
		  $rows[] = $item;
		}


		//echo json_encode($rows, JSON_PRETTY_PRINT);
		return $rows;
	}
	function getBase64($path) {
		$imagedata = file_get_contents($path);
		$type = "image/jpeg";
		$base64 = 'data:' . $type . ';base64,' . base64_encode($imagedata);
		return $base64;
	}
?>