<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-user"></i> Users</h3>
		
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
				<h3 class="panel-title">Add User</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-user">
				 
					<div class="form-group form-group-sm">
						<label for="user-name">User Name:</label>
						<input type="text" class="form-control" value="" name="user_name" placeholder="User Name" id="user-name" required>
					</div>		
					
					<div class="form-group form-group-sm">
					
						<label for="User-image">User Image:</label>
						
						<input type="file" class="form-control" name="user_image" id="User-image" required>
						
					</div>		
					
					<div class="form-group form-group-sm">
						<label for="user-email">User E-mail:</label>
						<input type="text" class="form-control" value="" name="user_email" placeholder="User E-mail" id="user-email" required>
					</div>		
					
					<div class="form-group form-group-sm">
						<label for="user-pass">User Password:</label>
						<input type="text" class="form-control" value="" name="user_pass" placeholder="User Password" id="user-pass" required>
					</div>
					
					<div class="form-group form-group-sm">
						<label for="user-Mobile">User Mobile:</label>
						<input type="text" class="form-control" value="" name="user_mobile" placeholder="User Mobile" id="user-Mobile" required>
					</div>
					

					<div class="form-group form-group-sm">
						<label for="user-role">User Role:</label>
						
						<select id="user-role" class="form-control" name="user_role">
						
							<option value="1">Admin</option>
							<option value="2">Senior Editor</option>
							<option value="3">Sub Editor</option>
							
						</select>
						
					</div>	
					
					<div class="form-group form-group-sm">
					
						<label>User Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="user_status" value="1" autocomplete="off" checked> Active
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="user_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Add User</button>
					
				</form> 
				
			</div>
		</div>
		
	</div>
	<div class="no_padding col-md-8 col-sm-8 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">User List</h3>
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
							<th>E-mail</th>
							<th>Mobile</th>
							<th>Role</th>
							<th>Status</th>
							<th>Date/Time</th>
							<th style="width: 70px;">Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
						foreach($all_user as $all_user){
							
							$sts = $all_user->user_status;
							$role = $all_user->user_role;
							
							if($sts == 0){
								$sts = '<span class="label label-danger">Inactive</span>';
							}
							if($sts == 1){
								$sts = '<span class="label label-success">Active</span>';
							}
							
							if($role == 1){
								$role = 'Admin';
							}
							if($role == 2){
								$role = 'Senior Editor';
							}
							if($role == 3){
								$role = 'Sub Editor';
							}
						?>
					
						<tr>
							<td><?php echo $all_user->user_id;?></td>
							<td><?php echo $all_user->user_name;?></td>
							<td><img src="<?=base_url().$all_user->user_image;?>" alt="No Image" width="auto" height="30px"></td>
							<td><?php echo $all_user->user_email;?></td>
							<td><?php echo $all_user->user_mobile;?></td>
							<td><?php echo $role;?></td>
							<td><?php echo $sts;?></td>
							
							<td><?php echo $all_user->created_date." ".$all_user->created_time;?></td>
							
							<td >
							
								<button 
								
								user-name="<?php echo $all_user->user_name;?>"

								user-role="<?php echo $all_user->user_role;?>" 
								
								user-email="<?php echo $all_user->user_email;?>" 
								
								user-image="<?php echo base_url().$all_user->user_image;?>" 
								
								old-image="<?php echo $all_user->user_image;?>" 
								
								user-status="<?php echo $all_user->user_status;?>" 
								
								user-mobile="<?php echo $all_user->user_mobile;?>" 								
								
								class="btn btn-primary btn-xs edit_user" type="button" value="<?php echo $all_user->user_id;?>">
								
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
<div style="z-index:9999999999" class="modal fade edit_user_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit User <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
				
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>update-user">
				 
					<div class="form-group form-group-sm">
						<label for="user-name">User Name:</label>
						
						<input type="text" class="user_name form-control" value="" name="user_name" placeholder="User Name" id="user-name" required>
						
						<input type="hidden" class="user_id" name="user_id" />
						
						<input type="hidden" class="old_image" name="old_image" />
						
					</div>					
					
					<div class="form-group form-group-sm">
					
						<label for="user-image">User Image:</label>
						
						<input type="file" class="clear_image form-control" name="user_image" id="user-image">
						
						<img src="" alt="No Image" class="user_img top_margin" width="auto" height="60px" >
						
					</div>		
					
					<div class="form-group form-group-sm">
						<label for="user-email">User E-mail:</label>
						<input type="text" class="user_email form-control" value="" name="user_email" placeholder="User E-mail" id="user-email" required>
					</div>		
					
					<div class="form-group form-group-sm">
						<label for="user-pass">User Password:</label>
						<input type="text" class="form-control" value="" name="user_pass" placeholder="User Password" id="user-pass">
					</div>
					
					<div class="form-group form-group-sm">
						<label for="user-Mobile">User Mobile:</label>
						<input type="text" class="user_mobile form-control" value="" name="user_mobile" placeholder="User Mobile" id="user-Mobile" required>
					</div>
					

					<div class="form-group form-group-sm">
						<label for="user-role">User Role:</label>
						
						<select id="user-role" class="form-control" name="user_role">
						
							<option class="user_role" value=""></option>
							
							<option value="1">Admin</option>
							<option value="2">Senior Editor</option>
							<option value="3">Sub Editor</option>
							
						</select>
						
					</div>	
					
					<div class="form-group form-group-sm">
					
						<label>User Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_cat_type_active btn btn-default">
								<input type="radio" name="user_status" value="1" autocomplete="off"> Active
							</label>
							
							<label class="edit_cat_type_inactive btn btn-default">
								<input type="radio" name="user_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Update User</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div> 




