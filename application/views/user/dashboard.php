	<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="caption">
								<?=$page_title;?>
							</div>
							<hr>


			<div class="row">
				<?php foreach($this->M_post->get_posts() as $row){?>
			
				<div class="col-md-8">
				<a class="btn btn-default btn-xxlg btn-block" href="<?=base_url();?>candidate/vote/<?=$row['post_id'];?>" style="text-align: left; padding:1%; font-weight: bolder; font-size: x-large;">
						 <i class="fa fa-arrow-right"></i> <?=$row['post'];?>
						</a>
						<br>
				</div>
			<?php }?>
				
			</div>

		

		</div>
	</div>
	<!-- END CONTENT -->
<?php $this->load->view('footer');?>
