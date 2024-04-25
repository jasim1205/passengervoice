<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-plus"></i> New Post</h3>
		
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
	
	
	<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-post">
	
		<div class="no_padding right_padding col-md-5 col-sm-5 col-xs-12">				
			
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Post Info</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">				
					
					 
					<div class="form-group form-group-sm">
						<label for="post-title">Post Title:</label>
						<input type="text" class="form-control" value="" name="post_title" placeholder="Post Title" id="post-title" required>
					</div>


					<div class="form-group form-group-sm">
						<label for="post-sub-title">Post ‍Sub Title:</label>
						<input type="text" class="form-control" value="" name="post_sub_title" placeholder="Post Sub Title" id="post-sub-title">
					</div>
					
					<div class="form-group form-group-sm">
						<label>Post Category:</label>
						
						<div style="height:158px;overflow-y:scroll;border:1px solid lightgray;padding:15px;" class="checkbox">
							<?php
							
								foreach ($get_category as $get_category) {
								?>
								<label style="width:50%;float:left;font-size:13px;">
									<input type="checkbox" name="post_category_id[]" value="<?php echo $get_category->category_id; ?>"> <?php echo $get_category->category_name; ?>
								</label>	
									
							<?php } ?>
							
							
							
							<span class="clearfix"></span>
						</div>
						
					</div>
					
					<div class="form-group form-group-sm archive" >
					
						<label for="post-image">Post Image:</label>

						<button class="archive-btn" type="button" data-toggle="modal" data-target="#post-img-modal">Browse</button>
						<input type="hidden" class="archive_image form-control"   name="post_image" id="post-image"required value="">
						<img src=""  class="archive-img " id="archive_image">
						
					</div>



					<div class="form-group form-group-sm">
					
						<label for="image-caption">Image Caption:</label>
						
						<input type="text" class="form-control" name="image_caption" id="image-caption" placeholder="Image Caption">
						
					</div>
					<br>
				</div>
			</div>
		</div>

		<div class="no_padding col-md-7 col-sm-7 col-xs-12">

			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Post Selection</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">


					<div class="form-group form-group-sm">
					
						<label>Scrolling:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="scroll" value="1" autocomplete="off" checked> YES
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="scroll" value="0" autocomplete="off"> NO
							</label>
							
						</div>
						
					</div>




					<div class="form-group form-group-sm">
					
						<label>Lead News:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="lead_news" value="1" autocomplete="off" checked> YES
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="lead_news" value="0" autocomplete="off"> NO
							</label>
							
						</div>
						
					</div>





					<div class="form-group form-group-sm">
					
						<label>Slider News:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="top_news" value="1" autocomplete="off" checked> YES
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="top_news" value="0" autocomplete="off"> NO
							</label>
							
						</div>
						
					</div>





					<div class="form-group form-group-sm">
					
						<label>Category Pin:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="category_pin" value="1" autocomplete="off" checked> YES
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="category_pin" value="0" autocomplete="off"> NO
							</label>
							
						</div>
						
					</div>




					<div class="form-group form-group-sm">
					
						<label for="reporter">Reporter:</label>
						
						
						<select class="form-control" id="reporter" name="reporter">
						
						<?php
						
							foreach($reporter as $reporter){
						
						?>
							<option value="<?=$reporter->reporter_id;?>"><?=$reporter->reporter_name;?></option>
							
						
						<?php }?>
						</select>
						
					</div>



					<div class="form-group form-group-sm">
					
						<label for="related-news">Ralated News ID:</label>
						
						<input type="text" class="form-control" name="related_news_id" id="related-news" placeholder="Related News ID (Comma Separeted No Space)">
						
					</div>

				
					<div class="form-group form-group-sm">
					
						<label>Post Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="post_status" value="1" autocomplete="off" checked> Publish
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="post_status" value="0" autocomplete="off"> Draft
							</label>
							
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Post Description</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">
				
						
					<div class="form-group form-group-sm">
					
						<label for="summernote">Post Description:</label>
						
						<textarea id="summernote" rows="10" name="post_description" placeholder="Post Description" class="form-control"></textarea>
						
					</div>
					
				</div>
			</div>
		</div>



		<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">SEO Information</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">

					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group form-group-sm">
					
							<label for="seo-keywords">SEO Keyword:</label><br>
							
							<input rows="5" type="text" class="tagsinput form-control" name="seo_keyword" id="seo-keyword" value="<?=$meta->site_title?>" placeholder="Keywords">
							
						</div>
					</div>

				
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group form-group-sm">
					
							<label>SEO Description:</label>
							
							<textarea rows="5" name="seo_description" placeholder="SEO Description" class="form-control"></textarea>
							
						</div>
					</div>	
					
					
				</div>
			</div>
		</div>
		
		<div class="box_layout col-md-12 col-sm-12 col-xs-12">
		
			<button type="submit" class="button_center btn btn-primary">Add Post</button>
			
		</div>

		
	</form> 
	
</div>


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