<div class="inner_body_content col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-cog"></i> Block Settings</h3>
		
		<?php
		$message = $this->session->userdata('message');
		
		if($message){
			
		?>
		
		<div class="alert alert-success alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success !</strong> <?php echo $message;?>
		</div>
		
		<?php		
			
			$this->session->unset_userdata('message');
		}
		?>		
		
	</div>
	
	<div class="no_padding col-md-12 col-sm-12 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">All Blocks</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<div class="table-responsive">
				
					<table class="search_results table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Block Section Name</th>
								<th>Block Section Category</th>
								<th style="width: 70px;">Action</th>
							</tr>
						</thead>
						<tbody>
						
							<?php
							
							foreach($all_block as $all_block){
								
							?>
						
							<tr>
								<td><?php echo $all_block->category_location_id;?></td>
								<td><?php echo $all_block->category_location_name;?></td>
								<td><?php echo $all_block->category_name;?></td>
								<td>
								
									<button 
								
									block-name="<?php echo $all_block->category_location_name;?>" 
									
									block-cat="<?php echo $all_block->category_id;?>" 
									
									block-cat-name="<?php echo $all_block->category_name;?>" 
									
									class="btn btn-primary btn-xs edit_block_modal" type="button" value="<?php echo $all_block->category_location_id;?>">
									
										<i class="fa fa-edit"></i> Edit
										
									</button>
									
								</td>
							</tr>
							
						<?php }?>
							
						</tbody>
					</table>

				</div>
				
				
				
			</div>
		</div>

	</div>
	
</div>




<!-- Modal Edit Post-->
<div class="modal fade block_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit Block <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>update-block">
				 
					<div class="form-group form-group-sm">
						<label for="sec-name">Block Section Name:</label>
						
						<input type="text" class="section_name form-control" id="sec-name" disabled>
						
						<input type="hidden" class="category_location_id" name="category_location_id" />
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="sec-cat">Block Section Category:</label>
						
						<select id="sec-cat" class="form-control" name="category_id">
							
							<option class="category_id" value=""></option>
							
						<?php 
						
						foreach($section_category as $section_category){
						
						?>
							<option value="<?= $section_category->category_id;?>"><?= $section_category->category_name;?></option>
						
						<?php }?>
							
						</select>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Update</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div> 




