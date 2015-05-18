<?php
include "include/session.php";
include "include/header.php";
include "include/leftbar.php";
$_SESSION['page_title'] = "বাংলাদেশী ফ্যাশন";
echo "<div class='page_title'>. : : ".$_SESSION['page_title']." : : .</div>";
$xml="res/xmlfiles/bangla-fashion.xml";
$targetpage = "bangla-fashion.php"; 
include "include/read_xml.php";
include "include/rightbar.php";
include "include/footer.php";
?>