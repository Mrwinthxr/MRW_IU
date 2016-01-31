<?php
//error_reporting(E_ALL ^ E_NOTICE);

if(!empty($_FILES)){

	$targetDir    = "photos/";
	$fileName 	  = $_FILES['file']['name'];
	$uploadStatus = 1;
	$targetFile   = $targetDir.$fileName;
	$imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
		$uploadStatus = 0;
	}

	if ($uploadStatus == 0) {
		echo "lol, no";
	}else{
		if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
	    //files inserted
		}
	}
}

?>