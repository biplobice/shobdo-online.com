<?php
include "include/header.php";
include "include/leftbar.php";
echo "<div class='page_title'>. : : বাংলা গান : : .</div>";
$xml="res/xmlfiles/bangla-music.xml";
$targetpage = "bangla-music.php"; 
include "include/read_xml.php";
include "include/rightbar.php";
include "include/footer.php";
?>