<?php require_once '_assets/inc/global.inc.php' ?>
<?php require_once 'admin_header.php'; ?>

<?php 	$item = (int) $_GET['id']; 
		$xml_data = simplexml_load_file($xml);
 ?>
<div class="well">
    <img src= "../<?php echo $xml_data->singlepost[$item]->thumbUrl; ?>" class="thumbnail center-block img-responsive"> <br>
    <dl class="dl-horizontal">
      <dt>Media Title:</dt>
      <dd><?php echo $xml_data->singlepost[$item]->mediaTitle; ?></dd>
      <dt>Media Url:</dt>
      <dd><?php echo $xml_data->singlepost[$item]->mediaUrl; ?></dd>
      <dt>Target Url:</dt>
      <dd><?php echo $xml_data->singlepost[$item]->itemUrl; ?></dd>
      <dt>Thumb Url:</dt>
      <dd><?php echo $xml_data->singlepost[$item]->thumbUrl; ?></dd>
      <dt>Short description:</dt>
      <dd><?php echo $xml_data->singlepost[$item]->shortDescription; ?></dd>
    </dl>

	<p><a href="edit.php?id=<?php echo $item; ?>">Edit</a> 
    <?php 
	if ($_SESSION['admin_logged_in'] == "superAdmin") {
	?>
    | <a href="delete.php?id=<?php echo $item; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a></p>
    <?php
	}
    ?>
</div>

<?php require_once 'admin_footer.php'; ?>