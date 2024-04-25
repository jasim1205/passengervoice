<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-cog"></i> Admin Role Settings</h3>
		
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
				<h3 class="panel-title">Role Settings</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<form method="POST" class="role_inputs" enctype="multipart/form-data" action="<?php echo base_url();?>update-role">
				 
					<div class="form-group form-group-md">
						<?php 
                      
                        $admin = explode(",",$get_role->admin_role);
                        $senior_editor = explode(",",$get_role->senior_editor_role);
                        $sub_editor = explode(",",$get_role->sub_editor_role);
                        
                        function check_function($op, $uo){
                            if(in_array($op,$uo)){
                                return "checked";
                              }else{
                                  return " ";
                              }
                        }
						
						$admin_cat = check_function(1,$admin);
						$admin_menu = check_function(2,$admin);
						$admin_post = check_function(3,$admin);
						$admin_page = check_function(4,$admin);
						$admin_gallary = check_function(5,$admin);
						$admin_media = check_function(6,$admin);
						$admin_videos = check_function(7,$admin);
						$admin_reporters = check_function(8,$admin);
						$admin_advertisement = check_function(9,$admin);
						$admin_subscribers = check_function(10,$admin);
						$admin_meta = check_function(11,$admin);
						$admin_settings = check_function(12,$admin);
						$admin_statistics = check_function(13,$admin);
						$admin_users = check_function(14,$admin);
						
						$senior_editor_cat = check_function(1,$senior_editor);
						$senior_editor_menu = check_function(2,$senior_editor);
						$senior_editor_post = check_function(3,$senior_editor);
						$senior_editor_page = check_function(4,$senior_editor);
						$senior_editor_gallary = check_function(5,$senior_editor);
						$senior_editor_media = check_function(6,$senior_editor);
						$senior_editor_videos = check_function(7,$senior_editor);
						$senior_editor_reporters = check_function(8,$senior_editor);
						$senior_editor_advertisement = check_function(9,$senior_editor);
						$senior_editor_subscribers = check_function(10,$senior_editor);
						$senior_editor_meta = check_function(11,$senior_editor);
						$senior_editor_settings = check_function(12,$senior_editor);
						$senior_editor_statistics = check_function(13,$senior_editor);
						$senior_editor_users = check_function(14,$senior_editor);
						
						$sub_editor_cat = check_function(1,$sub_editor);
						$sub_editor_menu = check_function(2,$sub_editor);
						$sub_editor_post = check_function(3,$sub_editor);
						$sub_editor_page = check_function(4,$sub_editor);
						$sub_editor_gallary = check_function(5,$sub_editor);
						$sub_editor_media = check_function(6,$sub_editor);
						$sub_editor_videos = check_function(7,$sub_editor);
						$sub_editor_reporters = check_function(8,$sub_editor);
						$sub_editor_advertisement = check_function(9,$sub_editor);
						$sub_editor_subscribers = check_function(10,$sub_editor);
						$sub_editor_meta = check_function(11,$sub_editor);
						$sub_editor_settings = check_function(12,$sub_editor);
						$sub_editor_statistics = check_function(13,$sub_editor);
						$sub_editor_users = check_function(14,$sub_editor);

                       
					?>

						<label>Admin Role:</label>
						<br>
						<br>
                      
						<input type="checkbox" name="admin_role[]" value="1" <?=$admin_cat;?> disabled> Category
						
						<input type="checkbox" name="admin_role[]" value="2" <?=$admin_menu;?> disabled> Menu
						
						<input type="checkbox" name="admin_role[]" value="3" <?=$admin_post;?> disabled> Post
						
						<input type="checkbox" name="admin_role[]" value="4" <?=$admin_page;?> disabled> Page
						
						<input type="checkbox" name="admin_role[]" value="5" <?=$admin_gallary;?> disabled> Gallary
						
						<input type="checkbox" name="admin_role[]" value="6" <?=$admin_media;?> disabled> Media
						
						<input type="checkbox" name="admin_role[]" value="7" <?=$admin_videos;?> disabled> Videos
						
						<br>
						
						<input type="checkbox" name="admin_role[]" value="8" <?=$admin_reporters;?> disabled> Reporters
						
						<input type="checkbox" name="admin_role[]" value="9" <?=$admin_advertisement;?> disabled> Advertisement
						
						<input type="checkbox" name="admin_role[]" value="10" <?=$admin_subscribers;?> disabled> Subscribers
						
						<input type="checkbox" name="admin_role[]" value="11" <?=$admin_meta;?> disabled> Meta
						
						<input type="checkbox" name="admin_role[]" value="12" <?=$admin_settings;?> disabled> Settings
						
						<input type="checkbox" name="admin_role[]" value="13" <?=$admin_statistics;?> disabled> Statistics
						
						<input type="checkbox" name="admin_role[]" value="14" <?=$admin_users;?> disabled> Users
                        
						<br>
						<hr>
						<hr>
					</div>
					
					<div class="form-group form-group-md">
						
						<label>Senior Editor Role:</label>
						<br>
						<br>
                      
						<input type="checkbox" name="senior_editor_role[]" value="1" <?=$senior_editor_cat;?>> Category
						
						<input type="checkbox" name="senior_editor_role[]" value="2" <?=$senior_editor_menu;?>> Menu
						
						<input type="checkbox" name="senior_editor_role[]" value="3" <?=$senior_editor_post;?>> Post
						
						<input type="checkbox" name="senior_editor_role[]" value="4" <?=$senior_editor_page;?>> Page
						
						<input type="checkbox" name="senior_editor_role[]" value="5" <?=$senior_editor_gallary;?>> Gallary
						
						<input type="checkbox" name="senior_editor_role[]" value="6" <?=$senior_editor_media;?>> Media
						
						<input type="checkbox" name="senior_editor_role[]" value="7" <?=$senior_editor_videos;?>> Videos
						
						<br>
						
						<input type="checkbox" name="senior_editor_role[]" value="8" <?=$senior_editor_reporters;?>> Reporters
						
						<input type="checkbox" name="senior_editor_role[]" value="9" <?=$senior_editor_advertisement;?>> Advertisement
						
						<input type="checkbox" name="senior_editor_role[]" value="10" <?=$senior_editor_subscribers;?>> Subscribers
						
						<input type="checkbox" name="senior_editor_role[]" value="11" <?=$senior_editor_meta;?>> Meta
						
						<input type="checkbox" name="senior_editor_role[]" value="12" <?=$senior_editor_settings;?>> Settings
						
						<input type="checkbox" name="senior_editor_role[]" value="13" <?=$senior_editor_statistics;?>> Statistics
						
						<input type="checkbox" name="senior_editor_role[]" value="14" <?=$senior_editor_users;?>> Users
                        
                        <br>
                        <hr>
                        <hr>
					</div>
					
					<div class="form-group form-group-md">
					
						<label>Sub Editor Role:</label>
						<br>
						<br>
                      
						<input type="checkbox" name="sub_editor_role[]" value="1" <?=$sub_editor_cat;?>> Category
						
						<input type="checkbox" name="sub_editor_role[]" value="2" <?=$sub_editor_menu;?>> Menu
						
						<input type="checkbox" name="sub_editor_role[]" value="3" <?=$sub_editor_post;?>> Post
						
						<input type="checkbox" name="sub_editor_role[]" value="4" <?=$sub_editor_page;?>> Page
						
						<input type="checkbox" name="sub_editor_role[]" value="5" <?=$sub_editor_gallary;?>> Gallary
						
						<input type="checkbox" name="sub_editor_role[]" value="6" <?=$sub_editor_media;?>> Media
						
						<input type="checkbox" name="sub_editor_role[]" value="7" <?=$sub_editor_videos;?>> Videos
						
						<br>
						
						<input type="checkbox" name="sub_editor_role[]" value="8" <?=$sub_editor_reporters;?>> Reporters
						
						<input type="checkbox" name="sub_editor_role[]" value="9" <?=$sub_editor_advertisement;?>> Advertisement
						
						<input type="checkbox" name="sub_editor_role[]" value="10" <?=$sub_editor_subscribers;?>> Subscribers
						
						<input type="checkbox" name="sub_editor_role[]" value="11" <?=$sub_editor_meta;?>> Meta
						
						<input type="checkbox" name="sub_editor_role[]" value="12" <?=$sub_editor_settings;?>> Settings
						
						<input type="checkbox" name="sub_editor_role[]" value="13" <?=$sub_editor_statistics;?>> Statistics
						
						<input type="checkbox" name="sub_editor_role[]" value="14" <?=$sub_editor_users;?>> Users
                        
                        <br>
                        <hr>
                        <hr>
					</div>
					
					
					
					<button type="submit" class="btn btn-primary">Update</button>
					
				</form> 
				
			</div>
		</div>
		
	</div>
	
	
</div>




<!-- Modal Edit Category-->
<div style="z-index:9999999999" class="modal fade edit_image_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit Image <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>update-image">
					
					<div class="form-group form-group-sm">
						<label for="image-name">Image Name:</label>
						
						<input type="text" class="image_name form-control" value="" name="image_name" placeholder="Image Name" id="image-name" required>
						
						<input type="hidden" class="image_id" name="image_id" />
						
						<input type="hidden" class="old_image" name="old_image" />
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="image-image">Image:</label>
						
						<input type="file" class="clear_image form-control" name="image_image" id="image-image">
						
						<img src="" alt="image" class="image_img top_margin" width="auto" height="60px" >
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="image-cat">Image Category:</label>
						
						<select id="image-cat" class="form-control" name="image_category_id">
						
							<option class="image_cat_id" value=""></option>
						
							<?php 
							$get_category = $this->category_model->get_category(5);
							foreach($get_category as $get_category){
							
							?>
							
								<option value="<?= $get_category->category_id;?>"><?= $get_category->category_name;?></option>
							
							
							<?php }?>
							
						</select>
						
					</div>
					
					
					<div class="form-group form-group-sm">
					
						<label>Image Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_cat_type_active btn btn-default">
								<input type="radio" name="image_status" value="1" autocomplete="off"> Active
							</label>
							
							<label class="edit_cat_type_inactive btn btn-default">
								<input type="radio" name="image_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					
					<button type="submit" class="btn btn-primary">Update Category</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div> 




