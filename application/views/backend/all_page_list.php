<div class="inner_body_content col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-list"></i> All Page List</h3>
		
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
				<h3 class="panel-title">All Pages</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				
				<?php 
				
				if(count($all_page) > 0){
				
				?>
				
			
				<div>					
					<div class="form-group-sm">
						<label>Search Here: </label>
						<input type="text" class="search_page form-control" placeholder="Search...">
					</div>
				</div>
				<br>
				
				
				
				
				<p class="search_key">Showing All Page Data:</p>
				<div class="table-responsive">
				
					<table class="search_results table table-bordered table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Image</th>
								<th>Category</th>
								<th>Status</th>
								<th>Date/Time</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						
						<?php
							foreach($all_page as $all_page){
								
								$sts = $all_page->page_status;
								
								if($sts == 0){
									$sts = '<span class="label label-danger">Inactive</span>';
								}
								if($sts == 1){
									$sts = '<span class="label label-success">Active</span>';
								}
								
							?>
						
							<tr>
								<td><?= $all_page->page_title;?></td>
								<!-- <td>
									<?php if($all_page->page_image != ''){?>
									
										<img src="<?= base_url().$all_page->page_image;?>" alt="image" width="auto" height="30px"/>
										
									<?php }else{echo 'Default Image';}?>
								</td> -->


								<td>
									
									
										<img src="<?= base_url().$all_page->page_image;?>" alt="<?= $all_page->page_title;?>" width="auto" height="30px"/>
										
								
								</td>
								<td><?= $all_page->category_name;?></td>
								<td><?= $sts;?></td>
								<td><?= $all_page->page_date." ".$all_page->page_time;?></td>
								<td>
								
									<button 
								
									page-title="<?= $all_page->page_title;?>" 
									page-cat-id="<?= $all_page->page_category_id;?>" 
									page-cat-name="<?= $all_page->category_name;?>" 
									page-image="<?= base_url().$all_page->page_image;?>" 
									
									old-image="<?= $all_page->page_image;?>" 
									
									page-status="<?= $all_page->page_status;?>" 
									
									class="btn btn-primary btn-xs edit_page" type="button" value="<?php echo $all_page->page_id;?>">
									
										<i class="fa fa-edit"></i> Edit
										
									</button>
									
									<a onclick="return confirm('Are You Sure?');" class="btn btn-danger btn-xs" href="<?=base_url().'delete-page/'.$all_page->page_id;?>">
									
										<i class="fa fa-trash-o"></i> Delete
										
									</a>
									
								</td>
							</tr>
							
						<?php }?>
							
						</tbody>
					</table>
					
					
					
					<div class="pagi_box text-right no_padding col-md-12 col-sm-12 col-xs-12">
						<p class="text-right no_padding"><?= $textline2;?></p>
						
						<?php if($paginationCtrls != ''){?>
						<ul class="pagination">
							<?= $paginationCtrls;?>
						</ul>
						<?php }?>
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




<!-- Modal Edit Category-->
<div class="modal fade edit_page_modal modal-overflow" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit Page <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?= base_url();?>update-page">
				 
					<div class="form-group form-group-sm">
						<label for="page-title">Page Title:</label>
						
						<input type="text" class="page_title form-control" value="" name="page_title" placeholder="Page Title" id="page-title" required>
						
						<input type="hidden" class="page_id" name="page_id" />
						
						<input type="hidden" class="old_image" name="old_image" />
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="page-cat">Page Category:</label>
						
						<select id="page-cat" class="form-control" name="page_category_id">
						
							<option class="page_cat_id" value=""></option>
						
						<?php 
						
						foreach($get_category as $get_category){
						
						?>
							<option value="<?= $get_category->category_id;?>"><?= $get_category->category_name;?></option>
						
						<?php }?>
							
						</select>
						
					</div>
					
					<div class="form-group form-group-sm archive">
					
						<label for="page-image">Page Image:</label>
						<button class="archive-btn" type="button" data-toggle="modal" data-target="#page-img-modal">Browse</button>
						<input type="hidden" class="archive_image form-control clear_image"   name="page_image" id="page-image">
						<img src="" class="archive-img page_img" id="archive_image">



						<!-- <input type="file" class="clear_image form-control" name="page_image" id="page-image">
						
						<img src="" alt="Default Image" class="page_img top_margin" width="auto" height="60px" > -->
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Page Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_cat_type_active btn btn-default">
								<input type="radio" name="page_status" value="1" autocomplete="off"> Active
							</label>
							
							<label class="edit_cat_type_inactive btn btn-default">
								<input type="radio" name="page_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="summernote">Page Description:</label>
						
						<textarea id="summernote" rows="20" name="page_description" placeholder="Page Description" class="page_des form-control"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Update Page</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div> 


<div class="modal  fade right" id="page-img-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
									      				<a mImg-name="<?= $all_media->media_image;?>"
									      				mImg-url="<?= base_url().$all_media->media_image;?>"  class="btn" data-dismiss="modal">Insert</a>
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

