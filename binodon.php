<?php
include "include/header.php";
include "include/leftbar.php";
?>

<div class="page_title">. : : বিনোদন : : .</div>

<?php

function read_binodon_xml($doc) {
	$xml = simplexml_load_file($doc);
	echo "<ul class='gallery'>";
	$i = 1;
	foreach ($xml->singlepost as $singlepost) {
		if ( $doc == "res/xmlfiles/bangla-gaan.xml") {
			echo "<li><a href='songs.php?id=$i&iframe=true' title='$singlepost->mediaTitle' rel='popUp[gallery]'><img src='$singlepost->thumbUrl'/><span class='video_play'></span></a></li>";
		} else {
			echo "<li><a href='$singlepost->mediaUrl' title='$singlepost->mediaTitle' rel='popUp[gallery]'><img src='$singlepost->thumbUrl'/><span class='video_play'></span></a></li>";
		}
		if ($i++ >= 6) break;
	}
	echo "</ul>";
}

echo "<div class='page_title'>. : : <a href='bangla-cinema.php'> বাংলা সিনেমা </a> : : .</div>";
read_binodon_xml("res/xmlfiles/bangla-cinema.xml");
echo "<div class='clr'></div>";

echo "<div class='page_title'>. : : <a href='bangla-natok.php'> বাংলা নাটক </a> : : .</div>";
read_binodon_xml("res/xmlfiles/bangla-natok.xml");
echo "<div class='clr'></div>";

echo "<div class='page_title'>. : : <a href='bangla-gaan.php'> বাংলা গান </a> : : .</div>";
read_binodon_xml("res/xmlfiles/bangla-gaan.xml");

?>


<?php
include "include/rightbar.php";
include "include/footer.php";
?>