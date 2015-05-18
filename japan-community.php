<?php
include "include/header.php";
include "include/leftbar.php";
?>
<div class="page_title">. : : জাপান কমিউনিটি : : .</div>
<?php
$xml = simplexml_load_file('res/xmlfiles/japan-community.xml');
foreach ($xml->singlepost as $singlepost) {
	echo "<div class='post'>";
		echo "<h2 class='title'><a href='$singlepost->mediaUrl'>$singlepost->mediaTitle</a></h2>";
		//echo "<p class='meta'>Posted by <a href='#'>Someone</a> on July 10, 2011	&nbsp;&bull;&nbsp; <a href='#' class='comments'>Comments (64)</a> &nbsp;&bull;&nbsp; <a href='#' class='permalink'>Full article</a></p>";
		echo "<p class='meta'>Source: $singlepost->mediaSource</p>";
		echo "<div class='entry'>";
			echo "<p><img src='$singlepost->thumbUrl' alt='' class='alignleft border' />$singlepost->shortDescription</p>";
		echo "</div>";
		echo "<a href='$singlepost->mediaUrl' class='details_btn'><img src='res/images/details.jpg' alt='Read More'></a>";
	echo "</div>";
}

?>


<?php
include "include/rightbar.php";
include "include/footer.php";
?>