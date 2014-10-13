<?php require_once '_assets/inc/global.inc.php' ?>
<?php require_once 'admin_header.php' ?>

<?php
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
$max_file_size = 500 * 1024; #500kb
//$nw = $nh = 200; # image with # height

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ( isset($_FILES['image']) ) {
		if (! $_FILES['image']['error'] && $_FILES['image']['size'] < $max_file_size) {
			$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
			if (in_array($ext, $valid_exts)) {
					$path = '../res/uploads/' . $_FILES['image']['name'];
					$size = getimagesize($_FILES['image']['tmp_name']);

					$x = (int) $_POST['x'];
					$y = (int) $_POST['y'];
					$w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
					$h = (int) $_POST['h'] ? $_POST['h'] : $size[1];
					$nw = $w;
					$nh = $h;

					$data = file_get_contents($_FILES['image']['tmp_name']);
					$vImg = imagecreatefromstring($data);
					$dstImg = imagecreatetruecolor($nw, $nh);
					imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
					imagejpeg($dstImg, $path);
					imagedestroy($dstImg);
					
					$_SESSION['success'] = "Image uploaded successfully";
					$image_url = "http://shobdo-online.com/res/uploads/". $_FILES['image']['name'];
				} else {
					$_SESSION['error'] = "Unknown problem!";
				} 
		} else {
			$_SESSION['error'] = "File is too small or large!";
		}
	} else {
		$_SESSION['error'] = "File not set";
	}
} 

?>
<?php displayMessages(); ?>
<div class="well">
	<img id="uploadPreview" style="display:none;" class="img-responsive center-block" >
    <br>
    <?php
    if(isset($image_url) && !empty($image_url)) {
	 ?>
        <div class="zero-clipboard">
            <a id="copy-button" class="btn-clipboard">Copy</a>
            <input type="text" id="txtCopyText" class="form-control" value="<?php echo $image_url ?>" /> 
        </div>
	<?php     
	 }
	?>
    <br>   
 
    
    <form role="form" method="post" enctype="multipart/form-data">
    	<div class="form-group">
        	<label>Upload Image</label>
       		<input type="file" id="uploadImage" name="image" accept="image/*">
       </div>
       <input type="submit" value="Upload" class="btn btn-default">
       
		<!-- hidden inputs -->
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />       
    </form>
</div>
<?php require_once 'admin_footer.php' ?>