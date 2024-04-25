<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-video-camera"></i> Video</h3>
		
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
				<h3 class="panel-title">Add Video</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-video">
				 
					<div class="form-group form-group-sm">
						<label for="video-name">Video Name:</label>
						<input type="text" class="form-control" value="" name="video_name" placeholder="Video Name" id="video-name" required>
					</div>

					<div class="form-group form-group-sm">
						<label for="video-cat">Video Category:</label>
						
						<select id="video-cat" class="form-control" name="video_category_id">
						
							<?php 
							
							foreach($get_category as $get_category){
							
							?>
								<option value="<?= $get_category->category_id;?>"><?= $get_category->category_name;?></option>
							
							<?php }?>
							
						</select>
						
					</div>					
					
					<div class="form-group form-group-sm">
						<label for="video-id">Youtube Video ID:</label>
						<input type="text" class="form-control" value="" name="video_url" placeholder="Youtube Video ID" id="video-id" required>
					</div>
					
					<div class="form-group form-group-sm archive">
					
						<label for="Video-image">Video Image:</label>


						<button class="archive-btn" type="button" data-toggle="modal" data-target="#post-img-modal">Browse</button>
						<input type="hidden" class="archive_image form-control"   name="video_image" id="Video-image"required>
						<img src=""  class="archive-img" id="archive_image">
						
						<!-- <input type="file" class="form-control" name="video_image" id="Video-image"> -->
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Video Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="video_status" value="1" autocomplete="off" checked> Active
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="video_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Homepage Pin Video:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="video_pin" value="1" autocomplete="off" checked> Yes
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="video_pin" value="0" autocomplete="off"> No
							</label>
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="Video_Description">Video Description:</label>
						
						<textarea name="video_description" placeholder="Video Description" rows="6" class="form-control" id="Video_Description"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Add Video</button>
					
				</form> 
				
			</div>
		</div>
		
	</div>
	<div class="no_padding col-md-8 col-sm-8 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Video List</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Video ID</th>
							<th>Category</th>
							<th>Image</th>
							<th>Status</th>
							<th>Pin</th>
							<th>Date/Time</th>
							<th style="width: 70px;">Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
						foreach($all_video as $all_video){
							
							$sts = $all_video->video_status;
							$pin = $all_video->video_pin;
							
							if($sts == 0){
								$sts = '<span class="label label-danger">Inactive</span>';
							}
							if($sts == 1){
								$sts = '<span class="label label-success">Active</span>';
							}
							
							if($pin == 0){
								$pin = '<span class="label label-danger">No</span>';
							}
							if($pin == 1){
								$pin = '<span class="label label-success">Yes</span>';
							}
						?>
					
						<tr>
							<td><?php echo $all_video->video_id;?></td>
							<td><?php echo $all_video->video_name;?></td>
							<td><?php echo $all_video->video_url;?></td>
							<td><?php echo $all_video->category_name;?></td>
							<td><img src="<?=base_url().$all_video->video_image;?>" alt="No Image" width="auto" height="30px"></td>
							<td><?php echo $sts;?></td>
							<td><?php echo $pin;?></td>
							
							<td><?php echo $all_video->video_date." ".$all_video->video_time;?></td>
							
							<td >
							
								<button 
								
								video-name="<?php echo $all_video->video_name;?>"

								video-cat-id="<?php echo $all_video->video_category_id;?>" 

								video-cat-name="<?php echo $all_video->category_name;?>" 
								
								video-url="<?php echo $all_video->video_url;?>" 
								
								video-image="<?php echo base_url().$all_video->video_image;?>" 
								
								old-image="<?php echo $all_video->video_image;?>" 
								
								video-status="<?php echo $all_video->video_status;?>" 
								
								video-pin="<?php echo $all_video->video_pin;?>" 
								
								video-des="<?php echo $all_video->video_description;?>" 

								
								
								class="btn btn-primary btn-xs edit_video" type="button" value="<?php echo $all_video->video_id;?>">
								
									<i class="fa fa-edit"></i>
									
								</button>
								
								
								<a href="<?= base_url().'delete-video/'.$all_video->video_id;?>" class="btn btn-danger btn-xs">
									
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
<div style="" class="modal modal-overflow fade edit_video_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit Video <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
				
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>update-video">
				 
					<div class="form-group form-group-sm">
						<label for="video-name">Video Name:</label>
						
						<input type="text" class="video_name form-control" value="" name="video_name" placeholder="Video Name" id="video-name" required>
						
						<input type="hidden" class="video_id" name="video_id" />
						
						<input type="hidden" class="old_image" name="old_image" />
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="video-id">Youtube Video ID:</label>
						<input type="text" class="video_url form-control" value="" name="video_url" placeholder="Youtube Video ID" id="video-id" required>
					</div>

					<div class="form-group form-group-sm">
						<label for="video-cat">Video Category:</label>
						
						<select id="video-cat" class="form-control" name="video_category_id">
							
							<option class="video_cat_id" value=""></option>
							<?php 
							
							foreach($get_category1 as $get_category1){
							
							?>
								<option value="<?= $get_category1->category_id;?>"><?= $get_category1->category_name;?></option>
							
							<?php }?>
							
						</select>
						
					</div>
					
					
					<div class="form-group form-group-sm archive">
					
						<label for="video-image">Video Image:</label>

						<button class="archive-btn" type="button" data-toggle="modal" data-target="#post-img-modal">Browse</button>
						

						<input type="hidden" class="archive_image_2 form-control clear_image" name="video_image" id="video-image">

						<img src=""  class="archive-img video_img"   id="archive_image_2">	


						
						<!-- <input type="file" class="clear_image form-control" name="video_image" id="video-image">
						
						<img src="" alt="No Image" class="video_img top_margin" width="auto" height="60px" > -->
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Video Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_cat_type_active btn btn-default">
								<input type="radio" name="video_status" value="1" autocomplete="off"> Active
							</label>
							
							<label class="edit_cat_type_inactive btn btn-default">
								<input type="radio" name="video_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Homepage Pin Video:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_pin_type_active btn btn-default">
								<input type="radio" name="video_pin" value="1" autocomplete="off"> Active
							</label>
							
							<label class="edit_pin_type_inactive btn btn-default">
								<input type="radio" name="video_pin" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="video_des">Video Description:</label>
						
						<textarea id="video_des" rows="6" name="video_description" placeholder="Video Description" class="video_des form-control"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Update Video</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div> 

<!-- archive -->
<div class="modal fade right" id="post-img-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
	<div class="modal-dialog modal-full-height modal-right modal-lg" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="modal-title" id="myModalLabel">Image Archive
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		        </h4>
	      	</div>
	      	<div class="modal-body col-md-12 col-sm-12 col-xs-12">
	        	<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
	        		<ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#upload">Upload</a></li>
					    <li><a data-toggle="tab" href="#media" class="al_arc_img">All Media</a></li>
				  	</ul>

				  	<div class="tab-content col-md-12 col-sm-12 col-xs-12 no_padding">
					    <div id="upload" class="tab-pane fade in active">
					      	<div class="ulImg">
					      		<!-- <p>Drag And Drop Files To Upload</p>
					      		<p>or</p>
					      		<p>
					      			<label class="fileContainer">
									    Chooose File <span><i class="fa fa-upload"></i></span>
									    <input type="file"/>
									</label>
					      		</p> -->

					      		<form  action="<?= base_url();?>save-archive-media" class="dragImg" id='fileupload'>
			
								</form>
					      	</div>
					    </div>
					    <div id="media" class="tab-pane fade col-md-12 col-sm-12 col-xs-12 no_padding">
					    	<br>
				    		

					    	<?php 
				
								if(count($all_media) > 0){
							
							?>
						    	<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						    		<form class="form-inline">
							    		<input type="text" class="form-control pImgSearch search_media" name="" id="imgSearch" placeholder="Search...">	
						    		</form>
						    		<div class="clear"></div>
						    		<br>
						    	</div>
						    	<p class="search_key">Showing All Media Data:</p><br>
						      	<div class="col-md-12 col-sm-12 col-xs-12 no_padding search_arch_results">	

							      	<div class="col-md-12 col-sm-12 col-xs-12 no_padding ">		
										<?php foreach($all_media as $all_media){ ?>	

								      		<div class="col-md-3 col-sm-4 col-xs-12">
								      			<div class="mImg">
									      			
								      				<img src="<?= base_url().$all_media->media_image;?>" alt="<?= $all_media->media_image;?>">
									      		
									      			<div class="img-hov">
									      				<a mimg-name="<?= $all_media->media_image;?>"
									      				mimg-url="<?= base_url().$all_media->media_image;?>"  class="btn" data-dismiss="modal">Insert</a>
									      			</div>
									      		</div>
								      		</div>
							      		<?php } ?>			      		
							      		
							      	</div>
						      </div>
					      	<?php 
					      		}else{
									echo "<h4>Nothing Found</h4>";
								}
					      	?>
					    </div>
					    
					</div>


	        	</div>
	      	</div>
	      	<div class="modal-footer justify-content-center">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        
	      	</div>
	    </div>
	</div>
</div>










<link href='<?= base_url() ?>files/backend/css/dropzone.css' type='text/css' rel='stylesheet'>
<script src='<?= base_url() ?>files/backend/js/dropzone.js' type='text/javascript'></script>


