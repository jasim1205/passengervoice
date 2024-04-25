<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-sitemap"></i> Category</h3>
		
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
				<h3 class="panel-title">Add Category</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<form method="POST" action="<?php echo base_url();?>save-category">
				 
					<div class="form-group form-group-sm">
						<label for="cat-name">Category Name:</label>
						<input type="text" class="form-control" value="" name="category_name" placeholder="Category Name" id="cat-name" required>
					</div>
					
					<div class="form-group form-group-sm">
						<label for="cat-type">Category Type:</label>
						
						<select id="cat-type" class="form-control" name="category_type">
							<option value="1">Post</option>
							<option value="2">Page</option>
							<option value="3">Gallary</option>
							<option value="4">Videos</option>
						</select>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Category Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="btn btn-default active">
								<input type="radio" name="category_status" value="1" autocomplete="off" checked> Active
							</label>
							
							<label class="btn btn-default">
								<input type="radio" name="category_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="cat-des">Category Description:</label>
						
						<textarea name="category_description" placeholder="Category Description" class="form-control" id="cat-des"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Add Category</button>
					
				</form> 
				
			</div>
		</div>
		
	</div>
	<div class="no_padding col-md-8 col-sm-8 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Category List</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<div class="table-responsive">
				
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Type</th>
							<th>Status</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
						foreach($all_category as $all_category){
							
							$type = $all_category->category_type;							
							
							$type = ($type == '1' ? 'Post' : ($type == '2' ? 'Page' : ($type == '3' ? 'Gallary':($type == '4' ? 'Videos':false))));
							
							$sts = $all_category->category_status;
							
							if($sts == 0){
								$sts = '<span class="label label-danger">Inactive</span>';
							}
							if($sts == 1){
								$sts = '<span class="label label-success">Active</span>';
							}
							
						?>
					
						<tr>
							<td><?php echo $all_category->category_id;?></td>
							<td><?php echo $all_category->category_name;?></td>
							<td><?php echo $type;?></td>
							<td><?php echo $sts;?></td>
							<td>
							<?php 
								if (strlen($all_category->category_description) > 60){
									
									$str = substr($all_category->category_description, 0, 60);
									echo $str;
									
								}else{
									echo $all_category->category_description;
								}
							
							?>
							</td>
							<td>
							
								<button
								
								cat-name="<?php echo $all_category->category_name;?>"
								cat-type-id="<?php echo $all_category->category_type;?>"
								cat-type-name="<?php echo $type;?>"
								cat-status="<?php echo $all_category->category_status;?>" 
								cat-des="<?php echo $all_category->category_description;?>" 
								
								class="btn btn-primary btn-xs edit_category" type="button" value="<?php echo $all_category->category_id;?>">
								
									<i class="fa fa-edit"></i> Edit
									
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
<div class="modal fade edit_cat_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Edit Category <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo base_url();?>update-category">
				 
					<div class="form-group form-group-sm">
						<label for="cat-name">Category Name:</label>
						<input type="text" class="edit_cat_name form-control" value="" name="category_name" placeholder="Category Name" id="cat-name" required>
						
						<input type="hidden" name="category_id" class="edit_cat_id" />
						
					</div>
					
					<div class="form-group form-group-sm">
						<label for="cat-type">Category Type:</label>
						
						<select id="cat-type" class="form-control" name="category_type">
							
							<option class="edit_cat_type" value=""></option>
							
							<option value="1">Post</option>
							<option value="2">Page</option>
							<option value="3">Gallary</option>
							<option value="4">Videos</option>
						</select>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label>Category Status:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="edit_cat_type_active btn btn-default">
								<input type="radio" name="category_status" value="1" autocomplete="off" > Active
							</label>
							
							<label class="edit_cat_type_inactive btn btn-default">
								<input type="radio" name="category_status" value="0" autocomplete="off"> Inactive
							</label>
							
						</div>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="cat-des">Category Description:</label>
						
						<textarea name="category_description" placeholder="Category Description" class="edit_cat_des form-control" id="cat-des"></textarea>
						
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




