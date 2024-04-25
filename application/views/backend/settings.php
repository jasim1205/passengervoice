<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-cogs"></i> Settings</h3>
		
		<?php
		$message = $this->session->userdata('message');
		
		$error = $this->session->userdata('error');
		
		
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
		
		<?php
		if($error){
			
		?>
		
		<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Not Successfull !</strong> <?php echo $error;?>
		</div>
		
		<?php		
			
			$this->session->unset_userdata('error');
		}
		?>	
		
	</div>
	
	<div class="box_layout col-md-12 col-sm-12 col-xs-12">
		<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-settings">
			<h3>User Settings</h3>
			<hr>
			<?php foreach($get_settings as $get_settings){?>
			
			<div class="no_padding right_padding col-md-5 col-sm-12 col-xs-12">				
				
				
				<div class="form-group form-group-sm">
					<label for="user-name">User Name:</label>
					<input type="text" class="form-control" value="<?= $get_settings->user_name;?>" name="user_name" placeholder="User Name" id="user-name" required>
				</div>
				
				
				<div class="form-group form-group-sm">
				
					<label for="user-image">User Image:</label>
					
					<input type="file" class="form-control" name="user_image" id="user-image">
					
					<br>
					
					<img src="<?=base_url().$get_settings->user_image;?>" alt="Default Image" height="80px" width="auto">
					
				</div>
				
				
				<div class="form-group form-group-sm">
					<label for="Old-Email">Old Email:</label>
					<input type="email" class="form-control" value="" name="old_email" placeholder="Old Email" id="Old-Email">
				</div>
				
				<div class="form-group form-group-sm">
					<label for="New-Email">New Email:</label>
					<input type="email" class="form-control" value="" name="user_email" placeholder="New Email" id="New-Email">
				</div>
				
				
				<div class="form-group form-group-sm">
					<label for="old-pass">Old Password:</label>
					<input type="psw" class="form-control" value="" name="old_password" placeholder="Old Password" id="old-pass">
				</div>
				
				<div class="form-group form-group-sm">
					<label for="New-pass">New Password:</label>
					<input type="psw" class="form-control" value="" name="user_password" placeholder="New Password" id="New-pass">
				</div>
				
				<div class="form-group form-group-sm">
					<label for="RetypeNew-pass">Retype New Password:</label>
					<input type="psw" class="form-control" value="" name="retype_password" placeholder="Retype New Password" id="RetypeNew-pass">
				</div>
				
			</div>

			<?php }?>
			<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
				<br>
				<button type="submit" class="btn btn-primary">Save Settings</button>

			</div>
		</form> 
	
	</div>
</div>





