<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="caption">
								<?=$page_title;?>
							</div>
							<hr>

					
							<?php 
							$count = 1;
							foreach ($this->M_candidate->get_candidates() as $row):
								$photo = $this->M_user->get_photo($row['user_id']);
								?>
								<div class="col-md-4">
								    <a class="thumbnail" href="#">
								        <img class="img-thumbnail" src="<?=base_url();?>uploads/<?=$photo;?>" alt="">
								    </a>
								    <br>
								    <strong><?=$this->M_user->get_name($row['user_id']);?></strong>
								    <hr>
								    Motto : <strong><?=$row['motto'];?></strong>
								    <hr>
									Vying for <b><?=$this->M_post->get_post($row['post_id']);?></b>
									<hr>
									Program : <?=$this->M_user->get_program($row['user_id']);?> (<?=$this->M_user->get_level($row['user_id']);?>)
									<hr>
									TOTAL VOTES OBTAINED : <strong>
										<?=count($this->M_candidate->get_votes_by_candidate($row['candidate_id'],$row['post_id']));?>
									</strong>
								</div>

								
							<?php endforeach;?>
							
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			<?php $this->load->view('footer');?>
