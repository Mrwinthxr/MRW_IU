<?php

$tager_dir  	 = "photos/";
$target_file   = $tager_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadStatus  = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

if (isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if ($check !== false) {
		echo "file is an image - " . $check["mime"] . ". <br />";
		$uploadStatus = 1;
	}else{
		echo "file is not an image.";
		$uploadStatus = 0;
	}
}

// If image exist
if (file_exists($target_file)) {
	echo "A file with that name is already uploaded";
	$uploadStatus = 0;
}

// Certain file times
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
	echo "That's not an image";
}


// Upload the file(s)
if ($uploadStatus == 0) {
	echo "Can't do that!";
}else{
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded!";
	}else{
		echo "Sorry, something went wrong. File not uploaded!";
	}
}

?>