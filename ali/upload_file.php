<?php
$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
var_dump($extension);
var_dump($type);
var_dump($_FILES["file"]["size"]);
$type = $_FILES["file"]["type"];
if (
	(
		($type == "image/gif")
		|| ($type == "image/jpeg")
		|| ($type == "image/png")
		|| ($type == "image/pjpeg")
	)
	&& ($_FILES["file"]["size"] < 1000000)
	&& in_array($extension, $allowedExts)
	)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $type . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    $imagedata = file_get_contents($_FILES["file"]["tmp_name"]);
             // alternatively specify an URL, if PHP settings allow
	$base64 = 'data:' . $type . ';base64,' . base64_encode($imagedata);

	echo $base64;
    // if (file_exists("./upload/" . $_FILES["file"]["name"]))
    //   {
    //   echo $_FILES["file"]["name"] . " already exists. ";
    //   }
    // else
    //   {
    //   echo move_uploaded_file($_FILES["file"]["tmp_name"],
    //   "./upload/" . $_FILES["file"]["name"]);
    //   echo "Stored in: " . "./upload/" . $_FILES["file"]["name"];
    //   }
   		}
  }
else
  {
  echo "Invalid file";
  }
?>