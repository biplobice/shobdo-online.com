<?php
include "include/session.php";
include "include/header.php";
include "include/leftbar.php";
$_SESSION['page_title'] = "Video Gallery";
echo "<div class='page_title'>. : : ".$_SESSION['page_title']." : : .</div>";
?>

<script type="text/javascript" src="js/yt-video-gallery.js"></script>
        <div id="ytVideoGallery"></div>
<script type="text/javascript">
$(function() {
	$('#ytVideoGallery').ytVideoGallery({
		feedUrl: 'https://gdata.youtube.com/feeds/api/users/LjLSMGCxK6HKaz0SGAhfQQ/uploads',
		playerOptions: {
			rel: '0',
			wmode: 'opaque'
		},
		playerWidth: 595,
		playerHeight: 363
	});
});
</script>


<?php
include "include/rightbar.php";
include "include/footer.php";
?>