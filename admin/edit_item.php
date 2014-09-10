<?php
include('header.php');
$xml = $_GET['xml'];
 $item = (int) $_GET['item'];
$xml_data = simplexml_load_file($xml);
?>
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2><?php echo $_SESSION['file']; ?> Items - Edit</h2>
					</div>
					<!-- End Box Head -->
					<form action="item_edited.php" method="post" enctype="multipart/form-data">
                    <?php
						if (isset($xml_data->singlepost[$item]->thumbWidth) && !empty($xml_data->singlepost[$item]->thumbWidth) && isset($xml_data->singlepost[$item]->thumbHeight) && !empty($xml_data->singlepost[$item]->thumbHeight)) {
							echo '<input type="hidden" name="thumbWidth" value="'.$xml_data->singlepost[$item]->thumbWidth.'" />';
							echo '<input type="hidden" name="thumbHeight" value="'.$xml_data->singlepost[$item]->thumbHeight.'" />';
						}
					  ?>

						<!-- Form -->
						<div class="form">
								<p>
                                	<input type="hidden" name="file" value="<?php echo $xml; ?>" />
                                <input type="hidden" name="item" value="<?php echo $item; ?>" /><label>Item Title <span>*</span></label>
									<input type="text" class="field size1" name="mediaTitle" value="<?php echo $xml_data->singlepost[$item]->mediaTitle; ?>"/>
								</p>
								<p><label>Item Url <span>*</span></label>
									<input type="text" class="field size1" name="mediaUrl"  value="<?php echo $xml_data->singlepost[$item]->mediaUrl; ?>" />
								</p>
								<p><label>Item Source <span>*</span></label>
									<input type="text" class="field size1" name="mediaSource"  value="<?php echo $xml_data->singlepost[$item]->mediaSource; ?>" />
								</p>

									<input type="hidden" class="field size1" name="thumbUrl"  value="<?php echo $xml_data->singlepost[$item]->thumbUrl; ?>" />

								<p><label>New Image <span>(If You Want To Change)</span></label>
									<input type="file" class="field size1" name="image" />
								</p>
<!--								<p class="inline-field">
									<label>Date</label>
									<select class="field size2">
										<option value="">23</option>
									</select>
									<select class="field size3">
										<option value="">July</option>
									</select>
									<select class="field size3">
										<option value="">2009</option>
									</select>
								</p>-->

								<p><label>Short Description <span>*</span></label>
									<textarea class="field size1" rows="10" cols="30" name="shortDescription"><?php echo $xml_data->singlepost[$item]->shortDescription; ?></textarea>
								</p>

						</div>
						<!-- End Form -->

						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="Save" />
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->
<?php include('footer.php'); ?>