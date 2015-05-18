<?php
include "include/session.php";
require 'include/connection.php';
require "include/check.php";
//require "include/menu.php";

//function exportPostxml() {
//Query App Bundle Name	
$qry=mysql_query("SELECT * FROM user WHERE username='$_SESSION[userid]'");
$row=mysql_fetch_array($qry);
$_SESSION['app_bundle']="$row[app_bundle]";
//echo "App Bundle Name is: ".$_SESSION['app_bundle']."";

//Query App Category Name	
$qry=mysql_query("SELECT LCASE(SUBSTRING_INDEX(SUBSTRING_INDEX(cat_name, ' ', 2), ' ', -1)) as firstname FROM category WHERE cat_id ='$_SESSION[category]'");
$row=mysql_fetch_array($qry);
$_SESSION['cat_name']="$row[firstname]";
//echo "Category Name is: ".$_SESSION['cat_name']."";
	
	//MAKE xmlfiles DIRECTORY IF IT DOESN'T EXIST
	if (!is_dir( "xmlfiles/")) {
    	mkdir("xmlfiles/");
	} 
	
	//START BUFFER
	ob_start();
	
	echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	echo '<multipostxml>';
	
	$qry=mysql_query("SELECT * FROM posts WHERE cat_id ='$_SESSION[category]' AND post_by='$_SESSION[userid]' AND show_post = 'YES' ORDER BY id DESC");
	while($row=mysql_fetch_array($qry))
		{
			$mydate=strtotime($row['date']);
			$mydate=date("Y-m-d", $mydate);
			$title=htmlspecialchars($row['title']);
			echo '<singlepost>';
			echo "<advertisementDate>【".$mydate."】</advertisementDate>";
			echo "<advertisementTitle>".$title."</advertisementTitle>";
			echo "<advertisementUrl>".$row['contents']."</advertisementUrl>";
			echo '</singlepost>';
		}
	
	//endwhile; endif;
	echo '</multipostxml>';
	
	$page = ob_get_contents();
	// EXPORT THE BUFFER AS A FILE WITH AN XML EXTENSION
	$fp = fopen( "xmlfiles/".$_SESSION[app_bundle]."_".$_SESSION['cat_name']."data.xml","w");
	fwrite($fp,$page);
	// CLEAN BUFFER SO XML IT WON'T PRINT ON POST PAGE
	ob_end_clean();	
//}


?>