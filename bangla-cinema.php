<?php
include "include/session.php";
include "include/header.php";
include "include/leftbar.php";
$_SESSION['page_title'] = "বাংলা সিনেমা";
echo "<div class='page_title'>. : : ".$_SESSION['page_title']." : : .</div>";
$xml="http://smiley-bangladesh.com/admin/xmlfiles/movie.xml";
$targetpage = "bangla-cinema.php"; 
include "include/read_xml.php";
include "include/rightbar.php";
include "include/footer.php";
?>