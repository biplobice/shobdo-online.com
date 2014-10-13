<?php
require_once '_assets/inc/global.inc.php';

$item = (int) $_GET['id'];

	$xml_data = new SimpleXMLElement($xml,null,true);
	unset($xml_data->singlepost[$item]);
	$result = $xml_data->asXML($xml);
	
	if($result) {
		$_SESSION['success'] = "Item Deleted successfully";
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		print "<script> self.location='dashboard.php?type=".$_SESSION['type']."'; </script>";		
	} else {
		$_SESSION['error'] = "Error Occured";
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		print "<script> self.location='dashboard.php?type=".$_SESSION['type']."'; </script>";		
	}	
?>

<a href=dashboard.php>Go back to Admin Panel</a>