<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-medium"></i> Meta</h3>
		
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
	
	
	<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>save-meta">
		
		
		<div class="no_padding right_padding col-md-6 col-sm-6 col-xs-12">				
			
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Site Info</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">				
					
					 
					<div class="form-group form-group-sm">
						<label for="site-name">Website Name:</label>
						<input type="text" class="form-control" value="<?= $get_meta->site_name;?>" name="site_name" placeholder="Site Name" id="site-name" required>
					</div>
					 
					<div class="form-group form-group-sm">
						<label for="site-Title">Website Title:</label>
						<input type="text" class="form-control" value="<?= $get_meta->site_title;?>" name="site_title" placeholder="Site Title" id="site-Title" required>
					</div>
					
					<div class="form-group form-group-sm">
						<label for="site-keys">Website Keywords:</label>
						<input type="text" class="form-control" value="<?= $get_meta->site_keywords;?>" name="site_keywords" placeholder="Site Keywords" id="site-keys">
					</div>
					 
					<div class="form-group form-group-sm">
						<label for="site-email">Email:</label>
						<input type="text" class="form-control" value="<?= $get_meta->site_email;?>" name="site_email" placeholder="Email" id="site-email">
					</div>
					 
					<div class="form-group form-group-sm">
						<label for="site-Number">Number:</label>
						<input type="text" class="form-control" value="<?= $get_meta->site_number;?>" name="site_number" placeholder="Number" id="site-Number">
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="site-logo">Website Logo:</label>
						
						<input type="file" class="form-control" name="site_logo" id="site-logo">
						
						<br>
						
						<img src="<?=base_url().$get_meta->site_logo;?>" alt="Default Logo" height="60px" width="auto">
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="site-Icon">Website Icon:</label>
						
						<input type="file" class="form-control" name="site_icon" id="site-Icon">
						
						<br>
						
						<img src="<?=base_url().$get_meta->site_icon;?>" alt="Default Icon" height="60px" width="auto">
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="basfee-list">বাস ভাড়ার তালিকা:</label>
						
						<input type="file" class="form-control" name="basfee_list" id="basfee-list">
						<br>
						<span class="text_red">Please must be upload PDF file.</span>
						<br>
					    <!--<img src="<?=base_url().$get_meta->basfee_list;?>" alt="<?= $get_meta->site_title;?>" height="60px" width="auto">-->
					    
					    <object data="<?=base_url().$get_meta->basfee_list;?>" width="100%" height="400px" type="application/pdf"> PDF Plugin Not Available </object>
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="summernote_web_des">Website Description:</label>
						
						<textarea id="summernote_web_des" rows="10" name="site_description" placeholder="Site Description" class="form-control"><?= $get_meta->site_description;?></textarea>
						
					</div>
					
						
				</div>
			</div>
				
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Social Info</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">				
					
					
					<div class="form-group form-group-sm">
						<label for="site-fb">Facebook Link:</label>
						<input type="text" class="form-control" value="<?= $get_meta->facebook;?>" name="facebook" placeholder="Facebook Link" id="site-fb">
					</div>
					
					<div class="form-group form-group-sm">
						<label for="site-tw">Twitter Link:</label>
						<input type="text" class="form-control" value="<?= $get_meta->twitter;?>" name="twitter" placeholder="Twitter Link" id="site-tw">
					</div>
					
					<div class="form-group form-group-sm">
						<label for="site-Linkedin">Linkedin Link:</label>
						<input type="text" class="form-control" value="<?= $get_meta->linkedin;?>" name="linkedin" placeholder="Linkedin Link" id="site-Linkedin">
					</div>
					
					<div class="form-group form-group-sm">
						<label for="site-gl">Google+ Link:</label>
						<input type="text" class="form-control" value="<?= $get_meta->google;?>" name="google" placeholder="Google+ Link" id="site-gl">
					</div>
					
					<div class="form-group form-group-sm">
						<label for="site-you">Youtube Link:</label>
						<input type="text" class="form-control" value="<?= $get_meta->youtube;?>" name="youtube" placeholder="Youtube Link" id="site-you">
					</div>
						
				</div>
			</div>
			
			
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Google Map</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">				
					
					
					<div class="form-group form-group-sm">
						<label for="Map-Latitude">Map Latitude:</label>
						<input type="text" class="form-control" value="<?= $get_meta->map_latitude;?>" name="map_latitude" placeholder="Map Latitude" id="Map-Latitude">
					</div>
					
					<div class="form-group form-group-sm">
						<label for="Map-Longitude">Map Longitude:</label>
						<input type="text" class="form-control" value="<?= $get_meta->map_longitude;?>" name="map_longitude" placeholder="Map Longitude" id="Map-Longitude">
					</div>
					
						
				</div>
			</div>
			
		</div>

		<div class="no_padding col-md-6 col-sm-6 col-xs-12">				
			
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Address</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">
				
						
					<div class="form-group form-group-sm">
					
						<label for="summernote_ad_1">Address 1:</label>
						
						<textarea id="summernote_ad_1" name="site_address_1" placeholder="Address 1" class="form-control"><?= $get_meta->site_address_1;?></textarea>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="summernote_ad_2">Address 2:</label>
						
						<textarea id="summernote_ad_2" name="site_address_2" placeholder="Address 2" class="form-control"><?= $get_meta->site_address_2;?></textarea>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="summernote_ad_3">Address 3:</label>
						
						<textarea id="summernote_ad_3" name="site_address_3" placeholder="Address 3" class="form-control"><?= $get_meta->site_address_3;?></textarea>
						
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="summernote_ad_4">Address 4:</label>
						
						<textarea id="summernote_ad_4" name="site_address_4" placeholder="Address 4" class="form-control"><?= $get_meta->site_address_4;?></textarea>
						
					</div>
					
				</div>
			</div>
			
			
			
			<div class="panel panel-mos">
				<div class="panel-heading">
					<h3 class="panel-title">Application Download Links</h3>
					<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
				</div>
				<div class="panel-body">				
					
					
					<div class="form-group form-group-sm">
						<label for="Google-Play">Google Play:</label>
						<input type="text" class="form-control" value="<?= $get_meta->google_play;?>" name="google_play" placeholder="Google Play" id="Google-Play">
					</div>
					
					<div class="form-group form-group-sm">
						<label for="Apple-Store">Apple Store:</label>
						<input type="text" class="form-control" value="<?= $get_meta->apple_store;?>" name="apple_store" placeholder="Apple Store" id="Apple-Store">
					</div>
					
						
				</div>
			</div>
			
		</div>
		<div class="box_layout col-md-12 col-sm-12 col-xs-12">
		
			<button type="submit" class="button_center btn btn-primary">Save Meta</button>
			
		</div>

		
	</form> 
	
</div>





