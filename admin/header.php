<?php require('session_check.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Shobdo-Online.com Admin Panel</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="admin_panel.php">Shobdo-Online.com Admin Panel</a></h1>
			<div id="top-navigation">
            	<?php
					echo "Welcome <a href='#'><strong>".$_SESSION['name']."</strong></a>";
					echo "<span> | </span>";
					echo "<a href='logout.php'>Logout</a>";
				?>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>

			<!-- Sidebar -->
			<div id="sidebar">

				<!-- Box -->
				<div class="box">

					<!-- Box Head -->
					<div class="box-head">
						<h2>Category Menu</h2>
					</div>
					<!-- End Box Head-->

					<div class="box-content">
						<a href="admin_panel.php?type=top-banner" class="cat-button"><span>Top Banner</span></a>
						<a href="admin_panel.php?type=top-right-news" class="cat-button"><span>Top Right News</span></a>
						<a href="admin_panel.php?type=home-news" class="cat-button"><span>Home News</span></a>
						<a href="admin_panel.php?type=desher-khobor" class="cat-button"><span>Desher Khobor</span></a>
						<a href="admin_panel.php?type=bidesher-khobor" class="cat-button"><span>Bidesher Khobor</span></a>
						<a href="admin_panel.php?type=japan-community" class="cat-button"><span>Japan Comm..</span></a>
						<a href="admin_panel.php?type=bangla-natok" class="cat-button"><span>Bangla Natok</span></a>
						<a href="admin_panel.php?type=bangla-cinema" class="cat-button"><span>Bangla Cinema</span></a>
						<a href="admin_panel.php?type=bangla-gaan" class="cat-button"><span>Bangla Gaan</span></a>
						<a href="admin_panel.php?type=bangla-uponnas" class="cat-button"><span>Bangla Uponnas</span></a>
						<a href="admin_panel.php?type=bangla-radio" class="cat-button"><span>Bangla Radio</span></a>
						<a href="admin_panel.php?type=bangla-fashion" class="cat-button"><span>Bangla Fashion</span></a>
						<a href="upload_photo.php" class="cat-button"><span>Upload Image</span></a>
						<div class="cl">&nbsp;</div>

					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->

			<!-- Content -->
			<div id="content">
