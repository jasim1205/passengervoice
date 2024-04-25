<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-delicious"></i> Gallary</h3>
		
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
				<h3 class="panel-title">Add Image</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-image">
				 
					<div class="form-group form-group-sm">
						<label for="image-name">Image Name:</label>
						<input type="text" class="form-control" value="" name="image_name" placeholder="Image Name" id="image-name" required>
					</div>
					
					<div class="form-group form-group-sm archive">
					
						<label for="image">Image:</label>

						<button class="archive-btn" type="button" data-toggle="modal" data-target="#post-img-modal">Browse</button>
						<input type="hidden" class="archive_image form-control"   name="image_image" id="image"required>
						<img src=""  class="archive-img " id="archive_image">
						
						<!-- <input type="file" class="form-control" name="image_image" id="image" required> -->
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="image-cat">Image Category:</label>
						
						<select id="image-cat" class="form-control" name="image_category_id">
						
							<?php 
						
							foreach($get_category as $get_category){
							
							?>
							
								<option value="<?= $get_category->category_id;?>"><?= $get_category->category_name;?></option>
							
							
							<?php }?>
							
							
						</select>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Image Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="image_status" value="1" autocomplete="off" checked> Active
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="image_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					
					<button type="submit" class="btn btn-primary">Add Image</button>
					
				</form> 
				
			</div>
		</div>
		
	</div>
	<div class="no_padding col-md-8 col-sm-8 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Image List</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<?php 
				
				if(count($all_gallary) > 0){
				
				?>
				<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Image</th>
							<th>Category</th>
							<th>Status</th>
							<th>Date/Time</th>
							<th style="width:70px;">Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
						foreach($all_gallary as $all_gallary){
							
							$sts = $all_gallary->image_status;
							
							if($sts == 0){
								$sts = '<span class="label label-danger">Inactive</span>';
							}
							if($sts == 1){
								$sts = '<span class="label label-success">Active</span>';
							}
							
						?>
					
						<tr>
							<td><?php echo $all_gallary->image_name;?></td>
							<td><img src="<?php echo base_url().$all_gallary->image_image;?>" alt="Image" height="30px" width="auto"></td>
							<td><?php echo $all_gallary->category_name;?></td>
							<td><?php echo $sts;?></td>
							<td><?php echo $all_gallary->image_date." ".$all_gallary->image_time;?></td>
							<td>
							
								<button 
								
								image-name="<?php echo $all_gallary->image_name;?>" 
								image-cat-id="<?php echo $all_gallary->image_category_id;?>" 
								image-cat-name="<?php echo $all_gallary->category_name;?>" 
								image-status="<?php echo $all_gallary->image_status;?>" 
								
								image-image="<?php echo base_url().$all_gallary->image_image;?>" 
									
								old-image="<?php echo $all_gallary->image_image;?>" 
								
								class="btn btn-primary btn-xs edit_image" type="button" value="<?php echo $all_gallary->image_id;?>">
								
									<i class="fa fa-edit"></i>
									
								</button>
								
								<a onclick="return confirm('Are You Sure?');" class="btn btn-danger btn-xs" href="<?=base_url().'delete-image/'.$all_gallary->image_id;?>">
									
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
				
				
				<?php
				
				}else{
					echo "<h4>Nothing Found</h4>";
				}
				
				?>
				
			</div>
		</div>

	</div>
	
</div>




<!-- Modal Edit Category-->
<div  class="modal modal-overflow fade edit_image_modal" id="" role="dialog">
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
					
					<div class="form-group form-group-sm archive">
					
						<label for="image-image">Image:</label>


						<button class="archive-btn" type="button" data-toggle="modal" data-target="#post-img-modal">Browse</button>
						

						<input type="hidden" class="archive_image_2 form-control clear_image" name="image_image" id="image-image">

						<img src=""  class="archive-img image_img"   id="archive_image_2">	
						
						<!-- <input type="file" class="clear_image form-control" name="image_image" id="image-image">
						
						<img src="" alt="image" class="image_img top_margin" width="auto" height="60px" > -->
						
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
					
					
					<button type="submit" class="btn btn-primary">Update Image</button>
					
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


