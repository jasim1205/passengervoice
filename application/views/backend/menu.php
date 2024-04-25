<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fas fa-bezier-curve"></i> Menu</h3>
		
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
				<h3 class="panel-title">Menu List</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<div class="table-responsive">
				
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Menu Position</th>
							<th>Menu Order</th>
							<th>Sub Menu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
						foreach($menu_category as $menu_category){
							
							$menu_position = $menu_category->menu_position;
							
							if($menu_position == 0){
								$menu_position = '<span class="label label-danger">No</span>';
							}
							if($menu_position == 1){
								$menu_position = '<span class="label label-success">Yes</span>';
							}
							
					?>
					
						<tr>
							<td><?php echo $menu_category->category_name;?></td>
							<td><?php echo $menu_position;?></td>
							<td><?php echo $menu_category->menu_order;?></td>
							<td>
								<?php 
								if($menu_category->sub_menu){

									$subs = explode(",",$menu_category->sub_menu);

									for($xx = 0; $xx < count($subs); $xx++){

										$single_subs = $this->category_model->single_category($subs[$xx]);

										echo "(".$single_subs->category_name.") ";

									}


								}else{

									echo "-";
									
								} ?>
									
							</td>
							<td>
							
								<button
								
									menu-name="<?php echo $menu_category->category_name;?>" 

									menu-pos="<?php echo $menu_category->menu_position;?>" 

									menu-order="<?php echo $menu_category->menu_order;?>" 
									
									class="btn btn-primary btn-xs change_menu" type="button" value="<?php echo $menu_category->category_id;?>">
									
										<i class="fa fa-edit"></i> Change
										
								</button>
								
							</td>
						</tr>
						
					<?php }?>
						
					</tbody>
				</table>
				
				</div>
				
			</div>
		</div>

	</div>
	
</div>




<!-- Modal Edit Menu-->
<div class="modal fade menu_modal" id="" role="dialog">
	<div class="modal-dialog modal-md">
	
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Edit Menu <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo base_url();?>update-menu">				 
					<div class="form-group form-group-sm">

						<label for="menu-name">Menu Name:</label>

						<input type="text" class="menu_name form-control" value="" id="menu-name" disabled>
						
						<input type="hidden" name="category_id" class="menu_id" />
						
					</div>					
					<div class="form-group form-group-sm">
					
						<label>Menu Position:</label><br>
						
						<div class="btn-group btn-group-toggle" data-toggle="buttons">			
							
							<label class="menu_position_active btn btn-default">
								<input type="radio" name="menu_position" value="1" autocomplete="off" > Yes
							</label>
							
							<label class="menu_position_inactive btn btn-default">
								<input type="radio" name="menu_position" value="0" autocomplete="off"> No
							</label>
							
						</div>
						
					</div>

					<div class="form-group form-group-sm">

						<label for="menu-order">Menu Order:</label>

						<input type="text" pattern="(^[0-9]{1,11})" title="Numbers Only" class="menu_order form-control" value="" id="menu-order" name="menu_order" placeholder="Menu Order" required>
						
					</div>
					
					<div class="form-group form-group-sm">

						<label>Sub Menu:</label>

						<div style="height:150px;overflow-y:scroll;border:1px solid lightgray;padding:15px;" class="checkbox menu_sub_menu">


							
							
						</div>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Change</button>
					
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div> 




