<?php
include "include/session.php";
include "include/header.php";
include "include/leftbar.php";
$_SESSION['page_title'] = "বাংলা উপন্যাস";
echo "<div class='page_title'>. : : ".$_SESSION['page_title']." : : .</div>";
$xml="http://smiley-bangladesh.com/admin/xmlfiles/ebook.xml";
$targetpage = "bangla-uponnas.php"; 
include "include/read_xml.php";
include "include/rightbar.php";
include "include/footer.php";
?>