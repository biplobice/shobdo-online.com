<?php
include "include/header.php";
include "include/leftbar.php";
?>
<div class="page_title">. : : বিদেশের খবর : : .</div>
<div id="blog_wrapper">

<?php
$xml = simplexml_load_file('res/xmlfiles/bidesher_khobor.xml');
foreach ($xml->singlepost as $singlepost) {
	echo "<div class='post'>";
	  echo "<div class='row'>";
	  	echo "<div class='span3'>";
		  echo "<a href='$singlepost->mediaUrl'><img class='main_pic' src='$singlepost->thumbUrl'></a>";
		echo "</div>";
		echo "<div class='span4 info'>";
		  echo "<a href='$singlepost->mediaUrl'><h3>$singlepost->mediaTitle</h3></a>";
		  echo "<p><em>".$singlepost->mediaSource."</em></p>";
		  echo "<p>".$singlepost->shortDescription."</p>";
	  echo "</div>";
	echo "</div>";
	echo "<a href='$singlepost->mediaUrl' class='btn'>বিস্তারিত..</a>";
	//echo "<a href='$singlepost->mediaUrl' class='btn'><img src='res/images/details.jpg' alt='Read More'></a>";
   echo "</div>";
}

?>
</div>



<?php
include "include/rightbar.php";
include "include/footer.php";
?>