<?php
include "include/header.php";
include "include/leftbar.php";
echo "<div class='page_title'>. : : বাংলা সিনেমা : : .</div>";
$xml="res/xmlfiles/bangla-movie.xml";
$targetpage = "bangla-movie.php"; 
include "include/read_xml.php";
include "include/rightbar.php";
include "include/footer.php";
?>