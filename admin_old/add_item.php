<?php include('header.php'); ?>			
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Add New Item</h2>
					</div>
					<!-- End Box Head -->
					
					<form action="item_added.php" method="post" enctype="multipart/form-data">
						
						<!-- Form -->
						<div class="form">
								<p>
                                	<input type="hidden" name="file" value="<?php echo $_GET['file']; ?>"
									<span class="req">max 100 symbols</span>
									<label>Item Title <span>*</span></label>
									<input type="text" class="field size1" name="mediaTitle"/>
								</p>	
								<p>
									<span class="req">max 100 symbols</span>
									<label>Item Url <span>*</span></label>
									<input type="text" class="field size1" name="mediaUrl" />
								</p>	
								<p>
									<span class="req">max 100 symbols</span>
									<label>Item Source <span>*</span></label>
									<input type="text" class="field size1" name="mediaSource" />
								</p>	
                                      
								<p>
									<span class="req">max 100 symbols</span>
									<label>Upload Photo <span>*</span></label>
									<input type="file" class="field size1" name="file" />
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
								
								<p>
									<span class="req">max 100 symbols</span>
									<label>Short Description <span>*</span></label>
									<textarea class="field size1" rows="10" cols="30" name="shortDescription"></textarea>
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
			</div>
			<!-- End Content -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
<?php include('footer.php'); ?>