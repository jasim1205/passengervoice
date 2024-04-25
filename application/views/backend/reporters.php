<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-user-circle-o"></i> Reporters</h3>
		
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
	
	<div class="no_padding right_padding col-md-4 col-sm-4 col-xs-12">				
		
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Add Reporter</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-reporter">
				 
					<div class="form-group form-group-sm">
						<label for="reporter-name">Reporter Name:</label>
						<input type="text" class="form-control" value="" name="reporter_name" placeholder="Reporter Name" id="reporter-name" required>
					</div>				
					
					<div class="form-group form-group-sm">
						<label for="reporter-email">Reporter E-mail:</label>
						<input type="text" class="form-control" value="" name="reporter_email" placeholder="Reporter E-mail" id="reporter-email" required>
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="reporter-image">Reporter Image:</label>
						
						<input type="file" class="form-control" name="reporter_image" id="reporter-image">
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="reporter-mobile">Reporter Mobile:</label>
						<input type="text" class="form-control" value="" name="reporter_mobile" placeholder="Reporter Mobile" id="reporter-mobile" required>
					</div>
					
					
					<div class="form-group form-group-sm">
					
						<label for="Address">Address:</label>
						
						<textarea name="reporter_address" placeholder="Address" rows="6" class="form-control" id="Address"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Add Reporter</button>
					
				</form> 
				
			</div>
		</div>
		
	</div>
	<div class="no_padding col-md-8 col-sm-8 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Reporters List</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>E-mail</th>
							<th>Image</th>
							<th>Mobile</th>
							<th>Created By</th>
							<th>Date/Time</th>
							<th style="width: 70px;">Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
						foreach($all_reporters as $all_reporters){
					?>
					
						<tr>
							<td><?php echo $all_reporters->reporter_id;?></td>
							<td><?php echo $all_reporters->reporter_name;?></td>
							<td><?php echo $all_reporters->reporter_email;?></td>
							
							<td><img src="<?=base_url().$all_reporters->reporter_image;?>" alt="No Image" width="auto" height="30px"></td>
							
							<td><?php echo $all_reporters->reporter_mobile;?></td>
							<td><?php echo $all_reporters->user_name;?></td>
							
							<td><?php echo $all_reporters->created_date." ".$all_reporters->created_time;?></td>
							
							<td >
							
								<button 
								
								reporter-name="<?php echo $all_reporters->reporter_name;?>"
								
								reporter-email="<?php echo $all_reporters->reporter_email;?>" 
								
								reporter-image="<?php echo base_url().$all_reporters->reporter_image;?>" 
								
								old-image="<?php echo $all_reporters->reporter_image;?>" 
								
								reporter-mobile="<?php echo $all_reporters->reporter_mobile;?>" 
								
								reporter-address="<?php echo $all_reporters->reporter_address;?>" 
								
								class="btn btn-primary btn-xs edit_reporter" type="button" value="<?php echo $all_reporters->reporter_id;?>">
								
									<i class="fa fa-edit"></i>
									
								</button>
								
							</td>
						</tr>
						
					<?php }?>
						
					</tbody>
				</table>
				</div>

				<div class="text-right no_padding col-md-12 col-sm-12 col-xs-12">
					<p class="text-right no_padding"><?= $textline2;?></p>
					
					<?php if($paginationCtrls != ''){?>
					<ul class="pagination">
						<?= $paginationCtrls;?>
					</ul>
					<?php }?>
				</div>
			</div>
		</div>

	</div>
	
</div>




<!-- Modal Edit Category-->
<div style="z-index:9999999999" class="modal fade edit_reporter_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit Reporter <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
				
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>update-reporter">
				 
					<div class="form-group form-group-sm">
						<label for="reporter-name">Reporter Name:</label>
						<input type="text" class="reporter_name form-control" value="" name="reporter_name" placeholder="Reporter Name" id="reporter-name" required>
						
						<input type="hidden" class="reporter_id" name="reporter_id" />
						
						<input type="hidden" class="old_image" name="old_image" />
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="reporter-email">Reporter E-mail:</label>
						<input type="text" class="reporter_email form-control" value="" name="reporter_email" placeholder="Reporter E-mail" id="reporter-email" required>
					</div>
					
					
					<div class="form-group form-group-sm">
					
						<label for="reporter-image">Reporter Image:</label>
						
						<input type="file" class="clear_image form-control" name="reporter_image" id="reporter-image">
						
						<img src="" alt="No Image" class="reporter_img top_margin" width="auto" height="60px" >
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="reporter-mobile">Reporter Mobile:</label>
						<input type="text" class="reporter_mobile form-control" value="" name="reporter_mobile" placeholder="Reporter Mobile" id="reporter-mobile" required>
					</div>
					
					
					<div class="form-group form-group-sm">
					
						<label for="Address">Address:</label>
						
						<textarea name="reporter_address" placeholder="Address" rows="6" class="reporter_address form-control" id="Address"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Update Reporter</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div> 




