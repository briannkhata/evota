	<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="caption">
								<?=$page_title;?>
							</div>
							<hr>


						<form id="vote" action="<?=base_url();?>candidate/vote2" method="post">
							<?php foreach($this->M_candidate->get_candidate_by_post_id($post_id) as $row){
								$photo = $this->M_user->get_photo($row['user_id']);
								?>
								<div class="col-lg-4 col-md-4 col-xs-4 thumb">
								    <a class="thumbnail" href="#">
								        <img class="img-thumbnail" src="<?=base_url();?>uploads/<?=$photo;?>" alt="">
								    </a>
								    
								    <strong><?=$this->M_user->get_name($row['user_id']);?></strong>
								    <hr>
								    Motto : <strong><?=$row['motto'];?></strong>
								    <hr>
									<input type="hidden" name="post_id" value="<?=$post_id;?>" />

									<input type="radio" name="candidate_id" value="<?=$row['candidate_id'];?>">
									  	<span style="color:blue; text-shadow: black;">
									  	Click to vote for <?=$this->M_user->get_name($row['user_id']);?>
									  </span></input>
								</div>
							<?php }?>

						<div class="col-md-12">
				<div class="btn-group" style="text-align: left; padding:1%; font-weight: bolder; font-size: x-large;"> 

							<a class="btn btn-default" href="<?=base_url();?>user/dashboard">
									 <i class="fa fa-arrow-left"></i> Back  to Dashboard
									</a>

						<button class="btn btn-info">
									 Save Your Vote
									</button>
								</div>
				</div>

			</div>
		</form>

		

		</div>
	</div>
<?php $this->load->view('footer');?>

