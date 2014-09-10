<?php
	require '../inc/config.inc.php';
	require '../inc/functions.inc.php';
?>
<?php
	if(isset($_POST['submit'])) {
		// Set Variables
		$category = protect($_POST['category']);
		$caption = protect($_POST['caption']);
		echo $filename = $_FILES['file']['name'];
		$destination = "../".$images_dir.$filename;
		$upload = uploadImage('file', $destination);
		$query = "INSERT INTO gallery_photos (photo_filename, photo_caption, photo_category) VALUES ('$filename', '$caption', $category)";
		$exequery	= mysql_query($query);
		mysql_close();
		if($exequery) echo "Photo Uploaded Successfully"; else "An error occured, try again!";

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Photos</title>

    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin_style.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
  <body>
  	<div class="container">
    <div class="well">
    	<div class="page-header">
        	<h2> Add Photo </h2>
       </div>
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="category">Select Category</label>
            <select class="form-control" name="category"><?php echo print_dropdown("SELECT * FROM gallery_category", $con); ?></select>
          </div>
          <div class="form-group">
            <label for="caption">Photo Caption</label>
            <input type="text" class="form-control" name="caption" placeholder="Caption" required>
          </div>
          <div class="form-group">
            <label for="file">Upload Photo</label>
            <input type="file" name="file" required>
            <p class="help-block">Please, upload an image with .jpg or.png extension</p>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Upload</button>
        </form>    
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>