<?php
include "include/session.php";
include "include/header.php";
include "include/leftbar.php";
$_SESSION['page_title'] = "বাংলা রেডিও";
echo "<div class='page_title'>. : : ".$_SESSION['page_title']." : : .</div>";
$xml="http://smiley-bangladesh.com/admin/xmlfiles/radio.xml";
$targetpage = "bangla-radio.php"; 
include "include/read_xml.php";
include "include/rightbar.php";
include "include/footer.php";
?>