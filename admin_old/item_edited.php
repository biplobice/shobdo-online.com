<?php
session_start();
 $xml = $_POST['file'];
 $item = (int) $_POST['item'];
 $mediaTitle=$_POST['mediaTitle'];
 $mediaUrl=$_POST['mediaUrl'];
 $mediaSource=$_POST['mediaSource'];
 $thumbUrl=$_POST['thumbUrl'];
 $shortDescription=$_POST['shortDescription'];
 $thumbWidth=$_POST['thumbWidth'];
 $thumbHeight=$_POST['thumbHeight'];

require_once('function.php');

if (isset($_FILES['image']) && !empty($_FILES['image'])) {
	$file = $_FILES['image'];
 	$name = $file['name'];
 	$path = "../res/images/".$_SESSION['file']."/".basename($name);

	//MAKE DIRECTORY IF IT DOESN'T EXIST
	if (!is_dir( "../res/images/".$_SESSION['file'])) {
	mkdir("../res/images/".$_SESSION['file']);
	} 
	
	resize($thumbWidth, $thumbHeight, $path);
		$thumbUrl = "res/images/".$_SESSION['file']."/".$_FILES['image']['name'];

}
 echo $thumbUrl;
 //die();
 
/*	$xml_data = simplexml_load_file($xml);
	$xml_data->singlepost[3]->mediaTitle = ' Title 4 !';
	echo $xml_data->asXML( $xml );*/
	
	$xml_data = new SimpleXMLElement($xml,null,true);
	$xml_data->singlepost[$item]->mediaTitle = $mediaTitle;
	$xml_data->singlepost[$item]->mediaUrl = $mediaUrl;
	$xml_data->singlepost[$item]->mediaSource = $mediaSource;
	$xml_data->singlepost[$item]->thumbUrl = $thumbUrl;
	$xml_data->singlepost[$item]->shortDescription = $shortDescription;

	$qry = $xml_data->asXML($xml);

	if(!$qry) {
		die("Query Failed: ". mysql_error());
	} else {
		$_SESSION['message'] = 'Data Updated successfully';  
		print "<script>";
		print "self.location='admin_panel.php?type=".basename($xml, ".xml")."';";
		print "</script>";
	}
?>

<a href=admin_panel.php>Go back to Admin Panel</a>
<!-- NEw File -->
