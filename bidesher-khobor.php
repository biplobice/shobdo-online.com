<?php
include "include/session.php";
include "include/header.php";
include "include/leftbar.php";
$_SESSION['page_title'] = "বিদেশের খবর";
echo "<div class='page_title'>. : : ".$_SESSION['page_title']." : : .</div>";
$xml="res/xmlfiles/bidesher-khobor.xml";
$targetpage = "bidesher-khobor.php"; 
include "include/read_blog_xml.php";
include "include/rightbar.php";
include "include/footer.php";
?>

