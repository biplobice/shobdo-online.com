<?php
/**
 * Image resize while uploading
 * @author Resalat Haque
 * @link http://www.w3bees.com/2013/03/resize-image-while-upload-using-php.html
 */
 
/**
 * Image resize
 * @param int $width
 * @param int $height
 */
function resize($width, $height, $path){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
	if(empty($width) && empty($height)){
		$width = $w;
		$height = $h;
	}
	
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	//$path = 'uploads/'.$width.'x'.$height.'_'.$_FILES['image']['name'];
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	//return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}


function uploadImage() {
	//set path here
	$path = "../res/uploads/";
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["image"]["name"]);
	$extension = end($temp);
	
	if ((($_FILES["image"]["type"] == "image/gif")
	|| ($_FILES["image"]["type"] == "image/jpeg")
	|| ($_FILES["image"]["type"] == "image/jpg")
	|| ($_FILES["image"]["type"] == "image/pjpeg")
	|| ($_FILES["image"]["type"] == "image/x-png")
	|| ($_FILES["image"]["type"] == "image/png"))
	&& ($_FILES["image"]["size"] < 1024*1024)
	&& in_array($extension, $allowedExts)) {
	  if ($_FILES["image"]["error"] > 0) {
		$msg = "Return Code: " . $_FILES["image"]["error"] . "<br>";
	  } else {
		$msg = "Upload: " . $_FILES["image"]["name"] . "<br>";
		$msg .= "Type: " . $_FILES["image"]["type"] . "<br>";
		$msg .= "Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
		$msg .= "Temp file: " . $_FILES["image"]["tmp_name"] . "<br>";
		if (file_exists($path . $_FILES["image"]["name"])) {
		  $msg = $_FILES["image"]["name"] . " already exists. ";
		} else {
		  move_uploaded_file($_FILES["image"]["tmp_name"],
		  $path . $_FILES["image"]["name"]);
		  $msg = "http://shobdo-online.com/res/uploads/" . $_FILES["image"]["name"];
		}
	  }
	} else {
	  $msg = "Invalid file";
	}
	return $msg;
}
?>