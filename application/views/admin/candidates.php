<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
							<div class="caption">
								<?=$page_title;?>
							</div>

						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<br>
									<div class="col-md-12">
									
									<a href="<?=base_url();?>candidate/read" class="btn default">
											Add New 
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Name</th>
								<th>Post</th>
								<th>Motto</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_candidate->get_candidates() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_user->get_name($row['user_id']);?><br>
									<?=$this->M_user->get_program($row['user_id']);?> | Level : 
									<?=$this->M_user->get_level($row['user_id']);?></td>
								<td><?=$this->M_post->get_post($row['post_id']);?></td>
								<td><?=$row['motto'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>candidate/read/<?=$row['candidate_id'];?>/<?=$row['user_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>candidate/delete/<?=$row['candidate_id'];?>/<?=$row['user_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>
								
									</div>
								</td>
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php $this->load->view('footer');?>