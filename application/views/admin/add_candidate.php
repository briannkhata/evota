					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> 
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>candidate/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">User/Student</label>
															<select class="form-control" name="user_id">
																<option selected disabled>Option</option>
																<?php foreach($this->M_user->get_users() as $row){?>
																<option <?php if ($user_id == $row['user_id']) echo 'selected';?> value="<?=$row['user_id'];?>"><?=$row['name'];?></option>
															<?php }?>
															</select>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Post</label>
															<select class="form-control" name="post_id">
																<option selected disabled>Option</option>
																<?php foreach($this->M_post->get_posts() as $row){?>
																<option <?php if ($post_id == $row['post_id']) echo 'selected';?> value="<?=$row['post_id'];?>">
																	<?=$row['post'];?></option>
															<?php }?>
															</select>
														</div>
													</div>
												</div>


												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Motto</label>
															<textarea class="form-control" name="motto"><?php if (!empty($motto)){echo $motto;}?></textarea>
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
