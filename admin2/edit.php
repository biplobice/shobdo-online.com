<?php require_once '_assets/inc/global.inc.php' ?>
<?php require_once 'admin_header.php'; ?>
<?php
$item = (int) $_GET['id'];

if(isset($_POST['submit'])) {
	$xml = "../res/xmlfiles/".$_SESSION['type'].".xml";
	
	// Retrieve, protect & set post variables	
	foreach($_POST as $key=>$value){
		if($key != "submit") 
			$data[$key] = secure($value);
			$w = (isset($data['thumbWidth']))? $data['thumbWidth'] : 200;
			$h = (isset($data['thumbHeight']))? $data['thumbHeight'] : 200;
	}
	
	if (isset($_FILES['image']) && !empty($_FILES['image']) && $_FILES['image']['size'] != 0) {
		//remove old image
		unlink('../'.$data['thumbUrl']);
				
		//upload new image
		$data['thumbUrl'] = uploadImageResized($w, $h);
	}
	
	// add new nodes
	$result = fnSimpleXMLEditElement($xml, $data, $item);
	
	if($result) {
		$_SESSION['success'] = "Item updated successfully";
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		print "<script> self.location='dashboard.php?type=".$_SESSION['type']."'; </script>";		
	} else {
		$_SESSION['error'] = "Error Occured";
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		print "<script> self.location='dashboard.php?type=".$_SESSION['type']."'; </script>";		
	}	
}
?>

<?php
$xml_data = simplexml_load_file($xml);
?>
<div class="well">
    <form role="form" method="post" enctype="multipart/form-data" >
	  <?php
        if (isset($xml_data->singlepost[$item]->thumbWidth) && !empty($xml_data->singlepost[$item]->thumbWidth) && isset($xml_data->singlepost[$item]->thumbHeight) && !empty($xml_data->singlepost[$item]->thumbHeight)) {
            echo '<input type="hidden" name="thumbWidth" value="'.$xml_data->singlepost[$item]->thumbWidth.'" />';
            echo '<input type="hidden" name="thumbHeight" value="'.$xml_data->singlepost[$item]->thumbHeight.'" />';
        }
      ?>

      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="mediaTitle" placeholder="Enter title" value="<?php echo $xml_data->singlepost[$item]->mediaTitle; ?>" required>
      </div>
      <div class="form-group">
        <label>Url</label>
        <input type="text" class="form-control" name="mediaUrl" placeholder="Enter url" value="<?php echo $xml_data->singlepost[$item]->mediaUrl; ?>" >
      </div>
      <div class="form-group">
        <label>Source</label>
        <input type="text" class="form-control" name="mediaSource" placeholder="Enter source" value="<?php echo $xml_data->singlepost[$item]->mediaSource; ?>" >
      </div>
      <div class="form-group">
        <label>File input</label>
        <input type="hidden" name="thumbUrl"  value="<?php echo $xml_data->singlepost[$item]->thumbUrl; ?>" />
        <input type="file" name="image" accept="image/*" >
        <p class="help-block">Select only if you want to change the image</p>
      </div>
      <div class="form-group">
      	 <label>Item details</label>
        <textarea class="form-control" rows="4" name="shortDescription" value="<?php echo $xml_data->singlepost[$item]->shortDescription; ?>" ></textarea>
      </div>
      <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>
</div>
<?php require_once 'admin_footer.php'; ?>