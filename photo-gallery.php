<?php
include "include/session.php";
include "include/header.php";
include "include/leftbar.php";
$_SESSION['page_title'] = "Photo Gallery";
echo "<div class='page_title'>. : : ".$_SESSION['page_title']." : : .</div>";
?>


<?php
	include("gallery/inc/config.inc.php");
	
	// Initialization
	$output = "";
	$counter = 0;
	$cid = (int)(@$_GET['cid']);
	
	if(empty($cid)) {
		$result = mysql_query("SELECT c.category_id,c.category_name,COUNT(photo_id), p.photo_filename
						FROM gallery_category as c
						LEFT JOIN gallery_photos as p ON p.photo_category = c.category_id
						GROUP BY c.category_id");	
		while ($row = mysql_fetch_assoc($result)) {
			$output .= "<li><a href='photo-gallery.php?cid=".$row['category_id']."' title='".$row['category_name']." (".$row['COUNT(photo_id)']."'><img src='gallery/".$images_dir.$row['photo_filename']."'/></a></li>";
		}
		mysql_free_result( $result );	
	} else {
		$result = mysql_query( "SELECT photo_id,photo_caption,photo_filename FROM gallery_photos WHERE photo_category='".addslashes($cid)."'" );
		while( $row = mysql_fetch_array( $result ) ) {
			$output .= "<li><a href='gallery/".$images_dir.$row[2]."' rel='popUp[gallery]'><img src='gallery/".$images_dir.$row['photo_filename']."'/></a></li>";
		}
		mysql_free_result( $result );	
	}
?>

<ul class="gallery">
<?php echo $output; ?>
</ul>

           



<?php
include "include/rightbar.php";
include "include/footer.php";
?>