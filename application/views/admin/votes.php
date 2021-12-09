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
							
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Name</th>
								<th>Position</th>
								<th>Voter</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_candidate->get_votes() as $row):
								$user_id = $this->M_candidate->get_user_id($row['candidate_id']);
								?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_user->get_name($user_id);?></td>
								<td><?=$this->M_post->get_post($row['post_id']);?></td>
								<td><?=$this->M_user->get_name($row['user_id']);?> <br>
									<?=$row['vote_date'];?></td>
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
