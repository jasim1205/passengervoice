

<div class="inner_body_content col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-list"></i> All Post List</h3>
		
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
				<h3 class="panel-title">All Posts</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				
				<?php 
				
				if(count($all_post) > 0){
				
				?>
				
			
				<div>					
					<div class="form-group-sm">
						<label>Search Here: </label>
						<input type="text" class="search_post form-control" placeholder="Search...">
					</div>
				</div>
				<br>
				
				
				
				
				<p class="search_key">Showing All Post Data:</p>
				<div class="table-responsive">
				
					<table class="search_results table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Image</th>
								<th>Category</th>
								<th>Status</th>
								<th>Date/Time</th>
								<th>Reporter</th>
								<th>Operator</th>
								<th>Views</th>
								<th style="width: 70px;">Action</th>
							</tr>
						</thead>
						<tbody>
						
						<?php
							foreach($all_post as $all_post){
								
								$sts = $all_post->post_status;
								
								if($sts == 0){
									$sts = '<span class="label label-danger">Inactive</span>';
								}
								if($sts == 1){
									$sts = '<span class="label label-success">Active</span>';
								}
								
							?>
							<tr>
								<td><?= $all_post->post_id;?></td>
								<td><?= $all_post->post_title;?></td>
								<td>
								
									<img src="<?= base_url().$all_post->post_image;?>" alt="<?= $all_post->post_title;?>" width="auto" height="30px"/>
								
								</td>
								<td>
									
									<?php
										$cat_array = explode(',',$all_post->post_category_id);
									
										$category_info = $this->category_model->get_category(1);
										
										foreach ($category_info as $category) {
											
											if(in_array($category->category_id, $cat_array)){
												echo $category->category_name.", ";
											}
										} 
									?>

								</td>
								<td><?= $sts;?></td>
								<td><?= $all_post->post_date." ".$all_post->post_time;?></td>
								<td><?= $all_post->reporter_name;?></td>
								<td><?= $all_post->user_name;?></td>
								<td><?= $all_post->news_views;?></td>
								<td>
								
									<button 
								
									post-title="<?= $all_post->post_title;?>" 
									post-sub-title="<?= $all_post->post_sub_title;?>" 
									post-image="<?= base_url().$all_post->post_image;?>" 
									old-image="<?= $all_post->post_image;?>"
									image-caption="<?= $all_post->image_caption;?>"
									scroll="<?= $all_post->scroll;?>"
									lead-news="<?= $all_post->lead_news;?>"
									top-news="<?= $all_post->top_news;?>"
									category-pin="<?= $all_post->category_pin;?>"
									reporter="<?= $all_post->reporter;?>"
									reporter-name="<?= $all_post->reporter_name;?>"						
									
									related-news-id="<?= $all_post->related_news_id;?>"

									post-status="<?= $all_post->post_status;?>" 
									seo-keyword="<?= $all_post->seo_keyword;?>" 
									seo-description="<?= $all_post->seo_description;?>" 
									

									
									
									class="btn btn-primary btn-xs edit_post_modal" type="button" value="<?= $all_post->post_id;?>">
									
										<i class="fa fa-edit"></i>
										
									</button>
									<!-- <?php print_r($all_post) ?> -->
									<?php if($all_post->user_role != 3){?>
										<a onclick="return confirm('Are You Sure?');" class="btn btn-danger btn-xs" href="<?=base_url().'delete-post/'.$all_post->post_id;?>">
										
											<i class="fa fa-trash-o"></i>
											
										</a>
									<?php } ?>
									
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




<!-- Modal Edit Post-->
<div class="modal modal-overflow fade post_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit Post <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>update-post">
				 
					<div class="form-group form-group-sm">
						<label for="post-title">Post Title:</label>

						<input type="text" class="post_title form-control" value="" name="post_title" placeholder="Post Title" id="post-title" required>
						
						<input type="hidden" class="post_id" name="post_id" />					
						

						<!-- <input type="hidden" class="archive_image form-control"   name="post_image" id="post-image"> -->

						<input type="hidden" class="old_image" name="old_image" />

						
						
					</div>

					<div class="form-group form-group-sm">
						<label for="post-sub-title">Post Sub Title:</label>
						
						<input type="text" class="post_sub_title form-control" value="" name="post_sub_title" placeholder="Post Title" id="post-sub-title">						
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="post-cat">Post Category:</label>
						
						<div style="height:150px;overflow-y:scroll;border:1px solid lightgray;padding:15px;" class="checkbox post_category_id">							
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm archive">					
						<label for="post-image">Post Image:</label>						
						<button class="archive-btn" type="button" data-toggle="modal" data-target="#post-img-modal">Browse</button>
						

						<input type="hidden" class="archive_image form-control clear_image" name="post_image" id="post-image">

						<img src=""  class="archive-img post_img"   id="archive_image">	

						<!-- <input type="file" class="clear_image form-control" name="post_image" id="post-image">
						
						<img src="" alt="image" class="post_img top_margin" width="auto" height="60px" > -->
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="image-caption">Image Caption:</label>
						
						<input type="text" class="image_caption form-control" name="image_caption" id="image-caption" placeholder="Image Caption">
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Scroll:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_scroll_type_active btn btn-default">
								<input type="radio" name="scroll" value="1" autocomplete="off"> Yes
							</label>
							
							<label class="edit_scroll_type_inactive btn btn-default">
								<input type="radio" name="scroll" value="0" autocomplete="off"> No
							</label>
							
						</div>
						
					</div>



					<div class="form-group form-group-sm">
					
						<label>Lead News:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_lead_news_type_active btn btn-default">
								<input type="radio" name="lead_news" value="1" autocomplete="off"> Yes
							</label>
							
							<label class="edit_lead_news_type_inactive btn btn-default">
								<input type="radio" name="lead_news" value="0" autocomplete="off"> No
							</label>
							
						</div>
						
					</div>



					<div class="form-group form-group-sm">
					
						<label>Slider News:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_top_news_type_active btn btn-default">
								<input type="radio" name="top_news" value="1" autocomplete="off"> Yes
							</label>
							
							<label class="edit_top_news_type_inactive btn btn-default">
								<input type="radio" name="top_news" value="0" autocomplete="off"> No
							</label>
							
						</div>
						
					</div>



					<div class="form-group form-group-sm">
					
						<label>Category Pin:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_category_pin_type_active btn btn-default">
								<input type="radio" name="category_pin" value="1" autocomplete="off"> Yes
							</label>
							
							<label class="edit_category_pin_type_inactive btn btn-default">
								<input type="radio" name="category_pin" value="0" autocomplete="off"> No
							</label>
							
						</div>
						
					</div>

					<div class="form-group form-group-sm">
						<label for="reporter">Reporter:</label>
						
						<select class="form-control" id="reporter" name="reporter">
							<option class="reporter"></option>
						<?php
						
							foreach($reporter as $reporter){
						
						?>
							<option value="<?=$reporter->reporter_id;?>"><?=$reporter->reporter_name;?></option>
							
						
						<?php }?>
						</select>				
						
					</div>


					<div class="form-group form-group-sm">
						<label for="related-news-id">Related News ID:</label>
						
						<input type="text" class="related_news_id form-control" value="" name="related_news_id" placeholder="Related News ID" id="related-news-id">						
						
					</div>



					<div class="form-group form-group-sm">
					
						<label>Post Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_cat_type_active btn btn-default">
								<input type="radio" name="post_status" value="1" autocomplete="off"> Yes
							</label>
							
							<label class="edit_cat_type_inactive btn btn-default">
								<input type="radio" name="post_status" value="0" autocomplete="off"> No
							</label>
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label >Post Description:</label>
						
						<textarea id="summernote" rows="10" name="post_description" placeholder="Post Description" class="post_des form-control"></textarea>
						
					</div>




					<div class="form-group form-group-sm">
						<label for="seo-keyword">SEO Keyword:</label>
						
						<input type="text" class="tagsinput_edit seo_keyword form-control" value="" name="seo_keyword" placeholder="SEO Keyword" id="seo-keyword">						
						
					</div>



					<div class="form-group form-group-sm">
					
						<label for="seo-des">SEO Description:</label>
						
						<textarea id="seo-des" rows="10" name="seo_description" placeholder="SEO Description" class="seo_description form-control"></textarea>
						
					</div>



					
					<button type="submit" class="btn btn-primary">Update Post</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
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
				    			$all_media = $this->archive_model->archive_media();
				    		 ?>

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




