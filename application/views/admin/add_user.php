					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> 
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
			<form action="<?=base_url();?>user/save" method="post" class="horizontal-form" enctype="multipart/form-data">
											<div class="form-body">
												<br>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Photo</label>
															<input type="file" name="photo" class="form-control" value="<?php if (!empty($photo)){echo $photo;}?>" required>
														</div>
													</div>
												</div>
											
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Name</label>
															<input type="text" name="name" class="form-control" value="<?php if (!empty($name)){echo $name;}?>" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Username/Reg No</label>
															<input type="text" name="username" class="form-control" value="<?php if (!empty($username)){echo $username;}?>" required>
														</div>
													</div>
												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Gender</label>
															<select class="form-control" name="gender">
																<option selected disabled>Option</option>
																<option <?php if ($gender == 'male') echo 'selected';?> value="male">Male</option>
																<option <?php if ($gender == 'female') echo 'selected';?> value="female">Female</option>
															</select>
														</div>
													</div>
												</div>


												
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label">Program of study</label>
															<input type="text" name="program" class="form-control" value="<?php if (!empty($program)){echo $program;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Level</label>
															<input type="number" name="level" class="form-control" value="<?php if (!empty($level)){echo $level;}?>" required>
														</div>
													</div>
												</div>


											</div>
											<div class="form-actions left">
											    <?php if (isset($update_id)){?>
			                             <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
			                          <?php }?>
												<button type="submit" class="btn default"> Save</button>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
