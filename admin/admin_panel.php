<?php include('header.php'); ?>

<?php
if (isset($_SESSION['message'])) {
  echo "<div class='msg msg-ok'>";
	  echo "<p><strong>".$_SESSION['message']."</strong></p>";
  echo "</div>";
  unset($_SESSION['message']);
}

if( isset($_GET['type'])) {
    if($_GET['type'] == "bangla-cinema" || $_GET['type'] == "bangla-natok" || $_GET['type'] == "bangla-uponnas" || $_GET['type'] == "bangla-radio") {
        echo "This Data Comes From Smiley-Bangladesh Site";
        die();
    }

	$_SESSION['file'] = $_GET['type'];
	$xml = '../res/xmlfiles/'.$_GET['type'].'.xml';
} else {
	$_SESSION['file'] = 'home';
	$xml = '../res/xmlfiles/top-banner.xml';
}
?>
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left"><?php echo $_SESSION['file']; ?> Items</h2>
					</div>
					<!-- End Box Head -->

					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Thumb</th>
								<th>Title</th>
								<th>Date</th>
								<th width="110" class="ac">Content Control</th>
							</tr>

<?php
/*if( isset($_GET['file'])) {
	$_SESSION['file'] = $_GET['file'];
	$xml = '../res/xmlfiles/'.$_GET['file'].'.xml';
} else {
	$_SESSION['file'] = 'home';
	$xml = '../res/xmlfiles/home.xml';
}*/

$xml_data = simplexml_load_file($xml);
//print_r($xml_data);

$item = 0;
foreach( $xml_data->singlepost as $singlepost )
{
  echo "<tr>";
	  echo "<td><input type='checkbox' class='checkbox' /></td>";
	  echo "<td><a href='../".$singlepost->thumbUrl."' rel='popUp'><img src = '../".$singlepost->thumbUrl."'</a></td>";
	  echo "<td><h3><a href='#'>".$singlepost->mediaTitle."</a></h3></td>";
	  echo "<td>12.05.09</td>";
	  echo "<td><a href='edit_item.php?xml=$xml&item=$item' class='ico edit'>Edit</a><a href='delete_item.php?xml=$xml&item=$item' class='ico del' onclick=\"return confirm('Are You Sure You Want To Delete?');\">Delete</a></td>";
  echo "</tr>";
  $item++;
  }

?>

						</table>
					</div><!-- Table -->
				</div><!-- End Box -->

<?php
if( isset($_GET['type']) && $_GET['type'] != 'home-news') {
	echo "<a href='add_item.php?type=$xml' class='add-button'><span>Add New Item</span></a>";
}
?>

<?php include('footer.php'); ?>