<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-plus"></i> New Page</h3>
		
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
	
	
	<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-page">
	
		<div class="no_padding right_padding col-md-5 col-sm-5 col-xs-12">				
			
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Page Info</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">				
					
					 
					<div class="form-group form-group-sm">
						<label for="page-title">Page Title:</label>
						<input type="text" class="form-control" value="" name="page_title" placeholder="Page Title" id="page-title" required>
					</div>
					
					<div class="form-group form-group-sm">
						<label for="page-cat">Page Category:</label>
						
						<select id="page-cat" class="form-control" name="page_category_id">
						
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
						<input type="hidden" class="archive_image form-control"   name="page_image" id="page-image">
						<img src="" class="archive-img " id="archive_image">
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Page Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="page_status" value="1" autocomplete="off" checked> Active
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="page_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
						
						
				</div>
			</div>
			
		</div>

		<div class="no_padding col-md-7 col-sm-7 col-xs-12">				
			
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Page Content</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">
				
					<div class="form-group form-group-sm">
					
						<label for="summernote">Page Content:</label>
						
						<textarea id="summernote" rows="10" name="page_description" placeholder="Page Content" class="form-control"></textarea>
						
					</div>
					
				</div>
			</div>
			
		</div>
		
		<div class="box_layout col-md-12 col-sm-12 col-xs-12">
		
			<button type="submit" class="button_center btn btn-primary">Add Page</button>
			
		</div>

		
	</form> 
	
</div>



<div class="modal fade right" id="page-img-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
								      			<div class="mImg pageMImg">
									      			
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




