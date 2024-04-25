<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-image"></i> Media</h3>
		
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
				<h3 class="panel-title">Add Image</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">			
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-media">	 
					
					<div class="form-group form-group-sm">
					
						<label for="image">Image:</label>
						
						<input type="file" class="form-control" name="media_image" id="image" required>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Add Image</button>					
				</form> 				
			</div>
		</div>
		
	</div>
	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3>All Media List</h3>
		<hr>
		<?php 
				
		if(count($all_media) > 0){
			
		?>
		

		<div>					
			<div class="form-group-sm">
				<label>Search Here: </label>
				<input type="text" class="search_main_media form-control" placeholder="Search...">
			</div>
		</div>
		<br>

		<p class="search_key">Showing All Media Data:</p>
		<br>
		<div class="no_padding col-md-12 col-sm-12 col-xs-12 search_results">
			<div class="no_padding col-md-12 col-sm-12 col-xs-12">
		
				<?php foreach($all_media as $all_media){ ?>	
				
					<div class="media_img no_padding col-md-2 col-sm-4 col-xs-6">
					
						<img src="<?= base_url().$all_media->media_image;?>" alt="image" class="img-thumbnail" />
						
					<!-- 	<a href="<?=base_url();?>delete-media/<?=$all_media->media_id;?>" class="del_med"><i class="fa fa-trash-o"></i></a> -->
						
						<span img-url="<?= base_url().$all_media->media_image;?>">Copy</span>
					</div>
					
				<?php }?>	
			</div>
		</div>
			
			
			
		<div class="text-right no_padding col-md-12 col-sm-12 col-xs-12">
			<br><p class="text-right no_padding"><?= $textline2;?></p>
			
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




<!-- Modal Edit Category-->
<div class="modal fade edit_image_modal" id="" role="dialog">
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




