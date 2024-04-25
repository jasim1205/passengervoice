<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fas fa-ad"></i> Advertisement</h3>
		
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
				<h3 class="panel-title">Add Advertisement</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-advertisement">
				 
					<div class="form-group form-group-sm">
						<label for="advertisement-name">Advertisement Name:</label>
						<input type="text" class="form-control" value="" name="advertisement_name" placeholder="Advertisement Name" id="advertisement-name" required>
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="Advertisement-image">Advertisement Image:</label>
						
						<input type="file" class="form-control" name="advertisement_image" id="Advertisement-image">
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="ad-code">Custom Ad Code:</label>
						
						<textarea name="custom_ad_code" placeholder="Custom Ad Code" rows="5" class="form-control" id="ad-code"></textarea>
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="ad-url">Advertisement URL:</label>
						<input type="text" class="form-control" value="" name="advertisement_url" placeholder="Advertisement URL" id="ad-url">
					</div>

					<div class="form-group form-group-sm">
						<label for="ad-loc">Advertisement Location:</label>
						
						<select id="ad-loc" class="form-control" name="advertisement_location">
						
							<?php 
							
							foreach($get_location as $get_location){
							
							?>
								<option value="<?= $get_location->location_id;?>"><?= $get_location->location_id;?>. <?= $get_location->location_name;?></option>
							
							<?php }?>
							
						</select>
						
					</div>			
					
					
					<div class="form-group form-group-sm">
					
						<label>Advertisement Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="advertisement_status" value="1" autocomplete="off" checked> Active
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="advertisement_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Add Advertisement</button>
					
				</form> 
				
			</div>
		</div>
		
	</div>
	<div class="no_padding col-md-8 col-sm-8 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Advertisement List</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Image</th>
							<th>Url</th>
							<th>Location</th>
							<th>Status</th>
							<th>Created By</th>
							<th>Date/Time</th>
							<th style="width: 70px;">Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
						foreach($all_advertisement as $all_advertisement){
							
							$sts = $all_advertisement->advertisement_status;
							
							if($sts == 0){
								$sts = '<span class="label label-danger">Inactive</span>';
							}
							if($sts == 1){
								$sts = '<span class="label label-success">Active</span>';
							}
						?>
					
						<tr>
							<td><?php echo $all_advertisement->advertisement_id;?></td>
							
							<td><?php echo $all_advertisement->advertisement_name;?></td>
							
							<td><img src="<?=base_url().$all_advertisement->advertisement_image;?>" alt="No Image" width="auto" height="20px"></td>
							
							<td><?php echo $all_advertisement->advertisement_url;?></td>
							<td><?php echo $all_advertisement->location_name;?></td>
							<td><?php echo $sts;?></td>
							<td><?php echo $all_advertisement->user_name;?></td>
							
							<td><?php echo $all_advertisement->created_date." ".$all_advertisement->created_time;?></td>
							
							<td >
							
								<button 
								
								advertisement-name="<?php echo $all_advertisement->advertisement_name;?>"
								
								advertisement-location-id="<?php echo $all_advertisement->advertisement_location;?>" 

								advertisement-location-name="<?php echo $all_advertisement->location_name;?>" 
								
								advertisement-image="<?php echo base_url().$all_advertisement->advertisement_image;?>" 
								
								advertisement-ad-code="<?php echo $all_advertisement->custom_ad_code;?>" 
								
								advertisement-url="<?php echo $all_advertisement->advertisement_url;?>" 								
								
								old-image="<?php echo $all_advertisement->advertisement_image;?>" 
								
								advertisement-status="<?php echo $all_advertisement->advertisement_status;?>" 								
								
								class="btn btn-primary btn-xs edit_advertisement" type="button" value="<?php echo $all_advertisement->advertisement_id;?>">
								
									<i class="fa fa-edit"></i>
									
								</button>
								
								
								<a href="<?= base_url().'delete-advertisement/'.$all_advertisement->advertisement_id;?>" class="btn btn-danger btn-xs">
									
									<i class="fa fa-trash-o"></i>
									
								</a>
								
								
								
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
<div style="z-index:9999999999" class="modal fade edit_advertisement_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit Advertisement <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
				
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>update-advertisement">
				 
					<div class="form-group form-group-sm">
					
						<label for="advertisement-name">Advertisement Name:</label>
						
						<input type="text" class="advertisement_name form-control" value="" name="advertisement_name" placeholder="Advertisement Name" id="advertisement-name" required>
						
						<input type="hidden" class="advertisement_id" name="advertisement_id" />
						
						<input type="hidden" class="old_image" name="old_image" />
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="advertisement-image">Advertisement Image:</label>
						
						<input type="file" class="clear_image form-control" name="advertisement_image" id="advertisement-image">
						
						<img src="" alt="No Image" class="advertisement_img top_margin" width="auto" height="60px" >
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="ad-code">Custom Ad Code:</label>
						
						<textarea name="custom_ad_code" placeholder="Custom Ad Code" rows="5" class="custom_ad_code form-control" id="ad-code"></textarea>
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="ad-url">Advertisement URL:</label>
						<input type="text" class="advertisement_url form-control" value="" name="advertisement_url" placeholder="Advertisement URL" id="ad-url">
					</div>

					<div class="form-group form-group-sm">
						<label for="ad-loc">Advertisement Location:</label>
						
						<select id="ad-loc" class="form-control" name="advertisement_location">
							
							<option class="advertisement_location_id" value=""></option>
							
							<?php 
							
							foreach($get_location2 as $get_location){
							
							?>
								<option value="<?= $get_location->location_id;?>"><?= $get_location->location_id;?>. <?= $get_location->location_name;?></option>
							
							<?php }?>
							
						</select>
						
					</div>		
					
					<div class="form-group form-group-sm">
					
						<label>Advertisement Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_cat_type_active btn btn-default">
								<input type="radio" name="advertisement_status" value="1" autocomplete="off"> Active
							</label>
							
							<label class="edit_cat_type_inactive btn btn-default">
								<input type="radio" name="advertisement_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					
					<button type="submit" class="btn btn-primary">Update Advertisement</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div> 




