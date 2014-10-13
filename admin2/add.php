<?php require_once '_assets/inc/global.inc.php' ?>
<?php require_once 'admin_header.php'; ?>
<?php
if(isset($_POST['submit'])) {
	$xml = "../res/xmlfiles/".$_SESSION['type'].".xml";
	
	// Retrieve, protect & set post variables	
	foreach($_POST as $key=>$value){
		if($key != "submit") 
			$data[$key] = secure($value);
	}
	
	//upload image
	$data['thumbUrl'] = uploadImageResized(200, 200);
	
	// add new nodes
	$result = fnSimpleXMLAddElement2End($xml, $data);
	
	if($result) {
		$_SESSION['success'] = "Item Added successfully";
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		print "<script> self.location='dashboard.php?type=".$_SESSION['type']."'; </script>";		
	} else {
		$_SESSION['error'] = "Error Occured";
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		print "<script> self.location='dashboard.php?type=".$_SESSION['type']."'; </script>";		
	}	
}
?>

<div class="well">
    <form role="form" method="post" enctype="multipart/form-data" >
      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="mediaTitle" placeholder="Enter title" required>
      </div>
      <div class="form-group">
        <label>Url</label>
        <input type="text" class="form-control" name="mediaUrl" placeholder="Enter url" required>
      </div>
      <div class="form-group">
        <label>Source</label>
        <input type="text" class="form-control" name="mediaSource" placeholder="Enter source" >
      </div>
      <div class="form-group">
        <label>File input</label>
        <input type="file" name="image" accept="image/*" required >
        <p class="help-block">Select only .jpg or .png images</p>
      </div>
      <div class="form-group">
      	 <label>Item details</label>
        <textarea class="form-control" rows="4" name="shortDescription" ></textarea>
      </div>
      <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>
</div>
<?php require_once 'admin_footer.php'; ?>