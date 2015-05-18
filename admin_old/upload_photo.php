<?php include('header.php'); ?>
<?php
include( 'function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_FILES['image'])) {
	$msg = uploadImage();
}

?>
	<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Upload Photo</h2>
					</div>
					<!-- End Box Head -->
					<!-- Table -->
		<div style="padding: 20px;">
    	<?php 
		if (isset($msg)) {
			if (stripos($msg, "http://shobdo-online.com/res/uploads/") !== false) {
				echo "<h1 style='color: #00FF00'> Image Uploaded Successfully. </h1>";
				echo "<p>Please copy the following url & paste into desired place.</p><br>";
				echo "<h4 style='color: #0000FF'>$msg</h4><br>";
			} else {
				echo $msg;
			}
		}
		?>

		
		<!-- file uploading form -->
		<form action="" method="post" enctype="multipart/form-data">
			<label>
				<span>Choose image</span>
				<input type="file" name="image" accept="image/*" />
			</label>
			<input type="submit" value="Upload" />
		</form>
		<br /><br />
		<?php
		// show image thumbnails
		if (isset($msg) && stripos($msg, "http://shobdo-online.com/res/uploads/") !== false){
				echo "<img class='img' src='$msg' style='max-width: 100%' /><br /><br />";
		}
		?>
		</div>
    </div>
<?php include('footer.php'); ?>