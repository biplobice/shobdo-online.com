<?php
//global.inc.php
//start the session
session_start();
require_once('admin_info.php');
require_once('functions.inc.php');

// function checks if admin is logged. 
checkAdminSession();

//set type
if (!isset($_SESSION['type']) && empty($_SESSION['type'])) {
	$_SESSION['type'] = "top-banner";
}
if( isset($_GET['type']) && !empty($_GET['type'])) {
	if(in_array($_GET['type'], $smileybd_data)) {
		// set message
		$_SESSION['warning'] = "This Data Comes From Smiley-Bangladesh Site";
		
		// display warning
		require_once 'admin_header.php';
		displayMessages();
		require_once 'admin_footer.php';
		die();
	} else {
		$_SESSION['type'] = $_GET['type'];
	}
}
$xml = '../res/xmlfiles/'.$_SESSION['type'].'.xml';
?>