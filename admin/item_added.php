<?php
session_start();
//echo $item = $_POST['item'];
 $xml = $_POST['file'];
 $mediaTitle=$_POST['mediaTitle'];
 $mediaUrl=$_POST['mediaUrl'];
 $mediaSource=$_POST['mediaSource'];
 //$thumbUrl=$_POST['thumbUrl'];
 $shortDescription=$_POST['shortDescription'];

 $file = $_FILES['file'];
 //print_r( $file );
 $name = $file['name'];
 
 echo $_SESSION['file'];
 $path = "../res/images/".$_SESSION['file']."/".basename($name);
 
 
  //MAKE xmlfiles DIRECTORY IF IT DOESN'T EXIST
  if (!is_dir( "../res/images/".$_SESSION['file'])) {
	mkdir("../res/images/".$_SESSION['file']);
  } 

 
 if( move_uploaded_file($file['tmp_name'], $path) ) {
	 echo "Move Succeed";
 } else {
	 echo "Move Failed";
 }
 $thumbUrl = "res/images/".$_SESSION['file']."/".basename($name);


	$xml_data = new SimpleXMLElement($xml,null,true);
	$node = $xml_data->addChild("singlepost");
	$node->addChild("mediaTitle", $mediaTitle);
	$node->addChild("mediaUrl", $mediaUrl);
	$node->addChild("mediaSource", $mediaSource);
	$node->addChild("thumbUrl", $thumbUrl);
	$node->addChild("shortDescription", $shortDescription);
	
	$qry = $xml_data->saveXML($xml);

	if(!$qry) {
		die("Query Failed: ". mysql_error());
	} else {
		$_SESSION['message'] = 'Data added successfully';  
		print "<script>";
		print "self.location='admin_panel.php';";
		print "</script>";
	}
?>

<a href=admin_panel.php>Go back to Admin Panel</a>

