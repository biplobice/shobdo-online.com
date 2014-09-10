<?php
session_start();
$xml = $_GET['xml'];
echo $item = (int) $_GET['item'];

	$xml_data = new SimpleXMLElement($xml,null,true);
	unset($xml_data->singlepost[$item]);
	$qry = $xml_data->asXML($xml);
	
	if(!$qry){
		die('Query Failed:'. mysql_error());
	} else {
		$_SESSION['message'] = 'Data Deleted successfully';  
		print "<script>";
		print "self.location='admin_panel.php';";
		print "</script>";
	}
?>

<a href=admin_panel.php>Go back to Admin Panel</a>