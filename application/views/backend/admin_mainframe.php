<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
    <meta name="author" content="Muktodhara Technology Limited">
    <meta name="description" content="Muktodhara Technology Limited">
	<meta name="keywords" content="Admin Panel, Admin Panel by Muktodhara Technology Limited">
	
    <link rel="icon" href="<?php echo base_url();?>files/backend/img/icon.png">	
	
    <title>Admin Panel</title>
    
	<!-- ICON CDN LINK (Please Always Use The Updated CDN) -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<!-- Fonts CDN LINK -->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet"> 
	<!-- JQuery UI CDN CSS -->
	
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	
	<!-- include summernote css/js -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
	
	<!-- Bootstrap CSS CDN LINK (Please Always Use The Updated CDN) -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- tagsinput css -->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
	
	<!-- JQuery CDN LINK (Please Always Use The Updated CDN) -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<!-- Bootstrap JS CDN LINK (Please Always Use The Updated CDN) -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- JQuery UI JS CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	
	<!-- Tags -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
	
	
	<!-- include summernote css/js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
	

	<script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>

	<!-- CUSTOM CSS LINK -->
	<link rel="stylesheet" href="<?php echo base_url();?>files/backend/css/style.css">	

	<style>
		.sidebar {
			height: 450px; 
		}

		
	</style>

</head>

<body>
	<span id="top"></span>
	<div class="scroll_top"><i class="fa fa-arrow-circle-o-up"></i></div>
	
	<section class="top">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 top_inner">
				<span class="toggle_sidenav"><i class="fa fa-bars"></i></span>

				<span><a href="<?=base_url();?>dashboard"><i class="fa fa-home"></i>&nbsp; <samp class="hidden_470">Home</samp></a></span>

				<span><a href="<?php echo base_url();?>about"><i class="fa fa-info-circle"></i>&nbsp; <samp class="hidden_470">About</samp></a></span>

				<?php date_default_timezone_set("Asia/Dhaka");?>
				<span class="hidden_690"><i class="fa fa-calendar"></i>&nbsp; <?=date('D');?> <?=date('d');?> <?=date('M');?>, <?=date('Y');?></span>

				<span class="hidden_790"><i class="fa fa-clock-o"></i>&nbsp; <em class="time_run">15:10:12</em></span>

				<span class="user_hover pull-right">
					<img src="<?php echo base_url().$this->session->userdata('user_image');?>" alt="User Image"> <name><samp class="hidden_400"><?php echo $this->session->userdata('user_name');?> &nbsp;&nbsp;</samp><i class="fa fa-angle-down"></i></name>
					
					<div class="user_out">
						<p><a href="<?php echo base_url();?>logout"><i class="fa fa-power-off"></i> Logout</a></p>
						<p><a href="<?php echo base_url();?>settings"><i class="fa fa-cogs"></i> Settings</a></p>
					</div>
					
				</span>
				<div class="clear"></div>
			</div>
		</div>
	</section>	
	
	
	
	
	<section class="body">
		<div class="row">
			<div class="side_navigation no_padding col-md-2">
				
				<!--<div class="navigation_top col-md-12 col-sm-12 col-xs-12">
					<img class="logo" alt="logo" src="img/logo.png"/>
					<h1 class="text-center">BCV24</h1>
				</div>-->
				<div id="sidebar-menu" class="no_padding col-md-12 col-sm-12 col-xs-12 ">
				<br>
					<ul class="side-menu my_sidenav sidebar">
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>dashboard" class="nav_in_a"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a>
							
						</li>
						
						<?php if($this->user_model->user_access(1)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>category" class="nav_in_a"><i class="fa fa-sitemap"></i>&nbsp; Category</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(2)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>menu" class="nav_in_a"><i class="fas fa-bezier-curve"></i>&nbsp; Menu</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(3)){?>
						
						<li class="nav_items">
							<a class="nav_in_a" ><i class="fa fa-file-text-o"></i>&nbsp; Post</a>
							
							<ul class="child_menu my_dropdown">
								<li>
									<a class="" href="<?php echo base_url();?>new-post">New Post</a>
								</li>
								<li>
									<a class="" href="<?php echo base_url();?>all-post">All Posts</a>
								</li>
							</ul>
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(4)){?>
						
						<li class="nav_items">
							<a class="nav_in_a"><i class="fa fa-clone"></i>&nbsp; Page</a>
							
							<ul class="child_menu my_dropdown">
								<li>
									<a class="" href="<?php echo base_url();?>new-page">New Page</a>
								</li>
								<li>
									<a class="" href="<?php echo base_url();?>all-page">All Pages</a>
								</li>
							</ul>
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(5)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>gallary" class="nav_in_a"><i class="fa fa-delicious"></i>&nbsp; Gallary</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(6)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>media" class="nav_in_a"><i class="fa fa-image"></i>&nbsp; Media</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(7)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>video" class="nav_in_a"><i class="fa fa-video-camera"></i>&nbsp; Videos</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(12)){?>
						
						<li class="nav_items">
							<a class="nav_in_a"><i class="fa fa-cog"></i>&nbsp; Settings</a>
							
							<ul class="child_menu my_dropdown">
								<li>
									<a class="" href="<?php echo base_url();?>block-settings">Block Settings</a>
								</li>
								<li>
									<a class="" href="<?php echo base_url();?>role-settings">Role Settings</a>
								</li>
							</ul>
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(13)){?>
						
						<li class="nav_items">
							<a class="nav_in_a"><i class="fas fa-chart-bar"></i>&nbsp; Statistics</a>
							
							<ul class="child_menu my_dropdown">
								<li>
									<a class="" href="<?php echo base_url();?>visitor-statistics">Visitors</a>
								</li>
								<li>
									<a class="" href="<?php echo base_url();?>ad-statistics">Advertisement</a>
								</li>
							</ul>
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(8)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>reporters" class="nav_in_a"><i class="fa fa-user-circle-o"></i>&nbsp; Reporters</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(9)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>advertisement" class="nav_in_a"><i class="fas fa-ad"></i>&nbsp; Advertisement</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(10)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>subscribers" class="nav_in_a"><i class="fa fa-users"></i>&nbsp; Subscribers</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(11)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>meta" class="nav_in_a"><i class="fa fa-medium"></i>&nbsp; Meta</a>
							
						</li>
						
						<?php }?>
						<?php if($this->user_model->user_access(14)){?>
						
						<li class="nav_items_no_dropdown">
						
							<a href="<?php echo base_url();?>users" class="nav_in_a"><i class="fa fa-user"></i>&nbsp; Users</a>
							
						</li>
						
						<?php }?>
						
						
					</ul>
				</div>
			</div>
			
			
			<div class="body_main_content no_padding col-md-10 col-sm-12 col-xs-12">
				
				<?= $admin_main_content; ?>
				
				

            </div>
			<div class="clear"></div>
		</div>
	</section>
	
	<section class="copyright no_padding col-md-12 col-sm-12 col-xs-12">
		<p>
			Developed By <a href="http://muktodharaltd.com/">Muktodhara Technology Limited</a>
			<br>
			&copy; Copyright 2017-<?=date('Y');?> All Rights Reserved.
		</p>
	</section>
	
</body>

	<!-- SiteNav show/hide script link -->
	
	
	<script src="<?= base_url();?>files/backend/js/custom.js"></script>
	

<script>
	CKEDITOR.replace( 'summernote' , {

	    uiColor: '#e1e1e1',

	});

</script>
<script>

	$(document).ready(function() {


		//Search  media archive Ajax
		
			var field_data = $('.search_arch_results').html();
			
			var search_key = $('.search_key').html();
			
			
				
			$('.search_media').on('keyup',function(){
				
				var search_val = $(this).val();
				
				$('.search_key').html("Your Searched: '"+search_val+"'");
				
				if(search_val != ''){
					
					$('.search_arch_results').html("<h2 class='text-center'><i class='fa fa-spinner fa-spin'></i></h2>");
					
					
	                
	                $.ajax({

	                    url:"<?php echo base_url();?>search-archive-media",
	        
	                    method:"GET",
	        
	                    data:{search_val:search_val},
	        
	                    success: function(data) {
	        
							$('.search_arch_results').html(data);            
	                      
	                    }
	            
	                });
					
				}
				if(search_val == ''){
					
					$('.search_arch_results').html(field_data);
					$('.search_key').html(search_key);
				}
			
			});




			$(document).on('click','.mImg a',function(){
			
				var mImg_name = $(this).attr('mimg-name');
				var mImg_url = $(this).attr('mimg-url');
				$(".archive_image_2").val(mImg_name);
				$("#archive_image_2").attr("src", mImg_url);
				
			});


			$(document).on('click','.mImg a',function(){
			
				var mImg_name = $(this).attr('mimg-name');
				var mImg_url = $(this).attr('mimg-url');
				$(".archive_image").val(mImg_name);
				$("#archive_image").attr("src", mImg_url);
				
			});







			$(document).on('click','.al_arc_img',function(){			
	                
	            $.ajax({

	                url:"<?php echo base_url();?>get-media",
	    
	                method:"GET",
	    
	                data:{search_val:1},
	    
	                success: function(data) {
	    
						$('.search_arch_results').html(data); 


	                    
	                }
	        
	            });
			
			});


			




		//Search  media Ajax
		
			var field_data = $('.search_results').html();
			
			var search_key = $('.search_key').html();
			
			
				
			$('.search_main_media').on('keyup',function(){
				
				var search_val = $(this).val();
				
				$('.search_key').html("Your Searched: '"+search_val+"'");
				
				if(search_val != ''){
					
					$('.search_results').html("<h2 class='text-center'><i class='fa fa-spinner fa-spin'></i></h2>");
					
					
	                
	                $.ajax({

	                    url:"<?php echo base_url();?>search-media",
	        
	                    method:"GET",
	        
	                    data:{search_val:search_val},
	        
	                    success: function(data) {
	        
							$('.search_results').html(data);            
	                      
	                    }
	            
	                });
					
				}
				if(search_val == ''){
					
					$('.search_results').html(field_data);
					$('.search_key').html(search_key);
				}
			
			});




			//copy media url
			$(document).on('click','.media_img span',function(){			
				var img_url = $(this).attr('img-url');				
				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val(img_url).select();
				document.execCommand("copy");
				$temp.remove();
				
			});

			

		



	
	//Search Post Ajax
		
		var field_data = $('.search_results').html();
		
		var search_key = $('.search_key').html();
		
			
			$('.search_post').on('keyup',function(){
				
				var search_val = $(this).val();
				
				$('.search_key').html("Your Searched: '"+search_val+"'");
				
				if(search_val != ''){
					
					$('.search_results').html("<h2 class='text-center'><i class='fa fa-spinner fa-spin'></i></h2>");
					
					$('.pagi_box').hide();
                    
                    $.ajax({

                        url:"<?php echo base_url();?>search-post",
            
                        method:"GET",
            
                        data:{search_val:search_val},
            
                        success: function(data) {
            
							if(data == "1"){
								
								$('.search_results').html("<h4 class='text-center'>Nothing Found.</h4>");
							  
							}else{
							  
								$('.search_results').html(data);
								
							}              
            
                          
                        }
                
                    });
					
				}
				if(search_val == ''){
					
					$('.search_results').html(field_data);
					$('.search_key').html(search_key);
					$('.pagi_box').show();
				}
			
			});
			
		



		
		
	
	/// search-page ajax
		
		$('.search_page').on('focus focusout',function(){
			
			$(this).on('change keyup',function(){
				
				var search_val = $(this).val();
				
				$('.search_key').html("Your Searched: '"+search_val+"'");
				
				if(search_val != ''){
					
					$('.search_results').html("<h2 class='text-center'><i class='fa fa-spinner fa-spin'></i></h2>");
					
					$('.pagi_box').hide();
                    
                    $.ajax({

                        url:"<?php echo base_url();?>search-page",
            
                        method:"GET",
            
                        data:{search_val:search_val},
            
                        success: function(data) {
            
							if(data == "1"){
								
								$('.search_results').html("<h4 class='text-center'>Nothing Found.</h4>");
							  
							}else{
							  
								$('.search_results').html(data);
								
							}              
            
                        }
                
                    });
					
				}
				if(search_val == ''){
					
					$('.search_results').html(field_data);
					$('.search_key').html(search_key);
					$('.pagi_box').show();
				}
			
			});
			
		});
	
	
	//summernote editor



	
		// $('#summernote').summernote({
		// 	dialogsInBody: true,
		// 	tabsize: 2,
		// 	height: 280
			
		// });


		
		
		
		$('#summernote_web_des').summernote({
			dialogsInBody: true,
			tabsize: 2,
			height: 140
			
		});
		
		$('#summernote_ad_1').summernote({
			dialogsInBody: true,
			tabsize: 2,
			height: 180
			
		});
		
		
		$('#summernote_ad_2').summernote({
			dialogsInBody: true,
			tabsize: 2,
			height: 180
			
		});
		
		$('#summernote_ad_3').summernote({
			dialogsInBody: true,
			tabsize: 2,
			height: 180
			
		});
		
		$('#summernote_ad_4').summernote({
			dialogsInBody: true,
			tabsize: 2,
			height: 180
			
		});
	//Edit cat modal
	
		$('.edit_category').on('click',function(){
			
			var cat_id = $(this).val();
			
			var cat_type_name = $(this).attr('cat-type-name');
			
			var cat_type_id = $(this).attr('cat-type-id');
			
			var cat_name = $(this).attr('cat-name');
			
			var cat_status = $(this).attr('cat-status');
			
			var cat_des = $(this).attr('cat-des');
			
			
			$('.edit_cat_name').val(cat_name);
			
			$('.edit_cat_id').val(cat_id);
			
			$('.edit_cat_type').val(cat_type_id);
			
			$('.edit_cat_type').html(cat_type_name);
			
			$('.edit_cat_des').val(cat_des);
			
			if(cat_status == 0){
				
				$('.edit_cat_type_active').removeClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',false);
				
				$('.edit_cat_type_inactive').addClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',true);
				
			}
			if(cat_status == 1){
				
				$('.edit_cat_type_active').addClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',true);
				
				$('.edit_cat_type_inactive').removeClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',false);
				
			}
			
			$('.edit_cat_modal').modal();
			
		});
		
	
	//Edit menu modal
	
		$(document).on('click','.change_menu',function(){			
			
			
			var menu_id = $(this).val();
			
			var menu_name = $(this).attr('menu-name');
			
			var menu_position = $(this).attr('menu-pos');
			
			var menu_order = $(this).attr('menu-order');
			
			
			$('.menu_name').val(menu_name);
			
			$('.menu_id').val(menu_id);
			
			$('.menu_order').val(menu_order);

			$.ajax({

				url:"<?php echo base_url();?>get-sub-cats",

				method:"GET",

				data:{menu_id:menu_id},

				success: function(data) {

					$('.menu_sub_menu').html(data); 
					
				}

			});
			
			
			if(menu_position == 0){
				
				$('.menu_position_active').removeClass('active');
				$('.menu_position_active').children('input').prop('checked',false);
				
				$('.menu_position_inactive').addClass('active');
				$('.menu_position_inactive').children('input').prop('checked',true);
				
			}
			if(menu_position == 1){
				
				$('.menu_position_active').addClass('active');
				$('.menu_position_active').children('input').prop('checked',true);
				
				$('.menu_position_inactive').removeClass('active');
				$('.menu_position_inactive').children('input').prop('checked',false);
				
			}
			
			$('.menu_modal').modal();
			
		});
		
		
	//Edit Block section modal
	
		$(document).on('click','.edit_block_modal',function(){			
			
			
			var block_id = $(this).val();
			
			var section_name = $(this).attr('block-name');
			
			var block_cat = $(this).attr('block-cat');
			
			var block_cat_name = $(this).attr('block-cat-name');
			
			
			$('.category_location_id').val(block_id);
			
			$('.section_name').val(section_name);
			
			$('.category_id').val(block_cat);
			
			$('.category_id').html(block_cat_name);

			
			$('.block_modal').modal();
			
		});
		


				
	//Edit post modal
		//$(document).on('click','.search_post',function(){
		$('.search_results').on('click','.edit_post_modal',function(){
			
			//clear image and textarea summernote

			$('.clear_image').val($(this).attr('old-image'));
			
			
			var post_id = $(this).val();
			
			var post_title = $(this).attr('post-title');

			var post_sub_title = $(this).attr('post-sub-title');
			
			var post_img = $(this).attr('post-image');

			var old_image = $(this).attr('old-image');

			var image_caption = $(this).attr('image-caption');			
			
			var post_status = $(this).attr('post-status');

			var scroll = $(this).attr('scroll');

			var lead_news = $(this).attr('lead-news');

			var top_news = $(this).attr('top-news');

			var category_pin = $(this).attr('category-pin');

			var reporter = $(this).attr('reporter');
			var reporter_name = $(this).attr('reporter-name');

			var related_news_id = $(this).attr('related-news-id');

			var seo_keyword = $(this).attr('seo-keyword');

			var seo_description = $(this).attr('seo-description');
			
			

			$('.post_id').val(post_id);
			
			$('.post_title').val(post_title);

			$('.post_sub_title').val(post_sub_title);			
			
			$('.post_img').attr('src',post_img);	
			
			$('.old_image').val(old_image);

			$('.image_caption').val(image_caption);

			$('.reporter').val(reporter);
			$('.reporter').html(reporter_name);

			$('.related_news_id').val(related_news_id);

			$('.seo_keyword').val(seo_keyword);

			$('.seo_description').val(seo_description);
			
			$('.tagsinput_edit').tagsinput({});




			
			// $('#summernote').summernote('code', post_des);
			$.ajax({

				url:"<?php echo base_url();?>get-post-des",

				method:"GET",

				data:{post_id:post_id},

				success: function(data) {

					CKEDITOR.instances.summernote.setData(data);

				}

			});
			
					
			$.ajax({

				url:"<?php echo base_url();?>get-post-cats",

				method:"GET",

				data:{post_id:post_id},

				success: function(data) {

					$('.post_category_id').html(data); 
					
				}

			});


			if(scroll== 0){
				
				$('.edit_scroll_type_active').removeClass('active');
				$('.edit_scroll_type_active').children('input').prop('checked',false);
				
				$('.edit_scroll_type_inactive').addClass('active');
				$('.edit_scroll_type_inactive').children('input').prop('checked',true);
				
			}
			if(scroll== 1){
				
				$('.edit_scroll_type_active').addClass('active');
				$('.edit_scroll_type_active').children('input').prop('checked',true);
				
				$('.edit_scroll_type_inactive').removeClass('active');
				$('.edit_scroll_type_inactive').children('input').prop('checked',false);
				
			}


			if(lead_news == 0){
				
				$('.edit_lead_news_type_active').removeClass('active');
				$('.edit_lead_news_type_active').children('input').prop('checked',false);
				
				$('.edit_lead_news_type_inactive').addClass('active');
				$('.edit_lead_news_type_inactive').children('input').prop('checked',true);
				
			}
			if(lead_news == 1){
				
				$('.edit_lead_news_type_active').addClass('active');
				$('.edit_lead_news_type_active').children('input').prop('checked',true);
				
				$('.edit_lead_news_type_inactive').removeClass('active');
				$('.edit_lead_news_type_inactive').children('input').prop('checked',false);
				
			}



			if(top_news == 0){
				
				$('.edit_top_news_type_active').removeClass('active');
				$('.edit_top_news_type_active').children('input').prop('checked',false);
				
				$('.edit_top_news_type_inactive').addClass('active');
				$('.edit_top_news_type_inactive').children('input').prop('checked',true);
				
			}
			if(top_news == 1){
				
				$('.edit_top_news_type_active').addClass('active');
				$('.edit_top_news_type_active').children('input').prop('checked',true);
				
				$('.edit_top_news_type_inactive').removeClass('active');
				$('.edit_top_news_type_inactive').children('input').prop('checked',false);
				
			}



			if(category_pin == 0){
				
				$('.edit_category_pin_type_active').removeClass('active');
				$('.edit_category_pin_type_active').children('input').prop('checked',false);
				
				$('.edit_category_pin_type_inactive').addClass('active');
				$('.edit_category_pin_type_inactive').children('input').prop('checked',true);
				
			}
			if(category_pin == 1){
				
				$('.edit_category_pin_type_active').addClass('active');
				$('.edit_category_pin_type_active').children('input').prop('checked',true);
				
				$('.edit_category_pin_type_inactive').removeClass('active');
				$('.edit_category_pin_type_inactive').children('input').prop('checked',false);
				
			}



			if(post_status == 0){
				
				$('.edit_cat_type_active').removeClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',false);
				
				$('.edit_cat_type_inactive').addClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',true);
				
			}
			if(post_status == 1){
				
				$('.edit_cat_type_active').addClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',true);
				
				$('.edit_cat_type_inactive').removeClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',false);
				
			}
			
			$('.post_modal').modal();
			

		});
		
	
	
	//Edit Page modal
	
		$('.search_results').on('click','.edit_page',function(){
			
			//clear image and textarea summernote
			
			$('.clear_image').val($(this).attr('old-image'));
			
			var page_id = $(this).val();
			
			var page_title = $(this).attr('page-title');
			
			var page_cat_id = $(this).attr('page-cat-id');
			
			var page_cat_name = $(this).attr('page-cat-name');
			
			var page_img = $(this).attr('page-image');
			
			var old_image = $(this).attr('old-image');
			
			var page_status = $(this).attr('page-status');
			
			//var page_des = $(this).attr('page-des');


			$.ajax({

				url:"<?php echo base_url();?>get-page-des",
	
				method:"GET",
	
				data:{page_id:page_id},
	
				success: function(data) {
	
					CKEDITOR.instances.summernote.setData(data);
					
				}
		
			});		
			
			
			$('.page_id').val(page_id);
			
			$('.page_title').val(page_title);
			
			$('.page_cat_id').val(page_cat_id);
			
			$('.page_cat_id').html(page_cat_name);
			
			$('.page_img').attr('src',page_img);	
			
			$('.old_image').val(old_image);			
			
			
			
			
			if(page_status == 0){
				
				$('.edit_cat_type_active').removeClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',false);
				
				$('.edit_cat_type_inactive').addClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',true);
				
			}
			if(page_status == 1){
				
				$('.edit_cat_type_active').addClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',true);
				
				$('.edit_cat_type_inactive').removeClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',false);
				
			}
			
			$('.edit_page_modal').modal();
			
		});
		
	
		
	//Edit image modal
	
		$('.table').on('click','.edit_image',function(){
			
			//clear image and textarea summernote
			$('.clear_image').val($(this).attr('old-image'));
			
			
			var image_id = $(this).val();
			
			var image_name = $(this).attr('image-name');
			
			var image_cat_id = $(this).attr('image-cat-id');
			
			var image_cat_name = $(this).attr('image-cat-name');
			
			var image_img = $(this).attr('image-image');
			
			var old_image = $(this).attr('old-image');
			
			var image_status = $(this).attr('image-status');
					
			
			
			$('.image_id').val(image_id);
			
			$('.image_name').val(image_name);
			
			$('.image_cat_id').val(image_cat_id);
			
			$('.image_cat_id').html(image_cat_name);
			
			$('.image_img').attr('src',image_img);	
			
			$('.old_image').val(old_image);			
			
			
			
			if(image_status == 0){
				
				$('.edit_cat_type_active').removeClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',false);
				
				$('.edit_cat_type_inactive').addClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',true);
				
			}
			if(image_status == 1){
				
				$('.edit_cat_type_active').addClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',true);
				
				$('.edit_cat_type_inactive').removeClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',false);
				
			}
			
			$('.edit_image_modal').modal();
			
		});
		
		
		
	//Edit Video modal
	
		$('body').on('click','.edit_video',function(){
			
			//clear image 
			$('.clear_image').val($(this).attr('old-image'));
			
			
			var video_id = $(this).val();
			
			var video_name = $(this).attr('video-name');

			var video_cat_id = $(this).attr('video-cat-id');

			var video_cat_name = $(this).attr('video-cat-name');
			
			var video_url = $(this).attr('video-url');
			
			var video_img = $(this).attr('video-image');
			
			var old_image = $(this).attr('old-image');
			
			var video_status = $(this).attr('video-status');
			
			var video_pin = $(this).attr('video-pin');
			
			var video_des = $(this).attr('video-des');
			
			
			$('.video_id').val(video_id);
			
			$('.video_name').val(video_name);

			$('.video_cat_id').val(video_cat_id);

			$('.video_cat_id').html(video_cat_name);
			
			$('.video_url').val(video_url);
			
			$('.video_img').attr('src',video_img);	
			
			$('.old_image').val(old_image);			
			
			$('.video_des').html(video_des);
			
			
			if(video_status == 0){
				
				$('.edit_cat_type_active').removeClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',false);
				
				$('.edit_cat_type_inactive').addClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',true);
				
			}
			if(video_status == 1){
				
				$('.edit_cat_type_active').addClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',true);
				
				$('.edit_cat_type_inactive').removeClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',false);
				
			}
			
			if(video_pin == 0){
				
				$('.edit_pin_type_active').removeClass('active');
				$('.edit_pin_type_active').children('input').prop('checked',false);
				
				$('.edit_pin_type_inactive').addClass('active');
				$('.edit_pin_type_inactive').children('input').prop('checked',true);
				
			}
			if(video_pin == 1){
				
				$('.edit_pin_type_active').addClass('active');
				$('.edit_pin_type_active').children('input').prop('checked',true);
				
				$('.edit_pin_type_inactive').removeClass('active');
				$('.edit_pin_type_inactive').children('input').prop('checked',false);
				
			}
			
			$('.edit_video_modal').modal();
			
		});
		
		
		
		
	//Edit user modal
	
		$('body').on('click','.edit_user',function(){
			
			//clear image 
			$('.clear_image').val('');
			
			
			var user_id = $(this).val();
			
			var user_name = $(this).attr('user-name');

			var user_role = $(this).attr('user-role');
			
			var user_email = $(this).attr('user-email');
			
			var user_mobile = $(this).attr('user-mobile');
			
			var user_img = $(this).attr('user-image');
			
			var old_image = $(this).attr('old-image');
			
			var user_status = $(this).attr('user-status');
			
			
			if(user_role == 1){
				var role_name = "Admin";
			}
			if(user_role == 2){
				var role_name = "Senior Editor";
			}
			if(user_role == 3){
				var role_name = "Sub Editor";
			}
			
			
			$('.user_id').val(user_id);
			
			$('.user_name').val(user_name);

			$('.user_role').val(user_role);

			$('.user_role').html(role_name);
			
			$('.user_email').val(user_email);
			
			$('.user_img').attr('src',user_img);	
			
			$('.old_image').val(old_image);			
			
			$('.user_mobile').val(user_mobile);
			
			
			if(user_status == 0){
				
				$('.edit_cat_type_active').removeClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',false);
				
				$('.edit_cat_type_inactive').addClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',true);
				
			}
			if(user_status == 1){
				
				$('.edit_cat_type_active').addClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',true);
				
				$('.edit_cat_type_inactive').removeClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',false);
				
			}
			
			$('.edit_user_modal').modal();
			
		});
		
		
	
	
	
	//Edit ad modal
	
		$('body').on('click','.edit_advertisement',function(){
			
			//clear image 
			$('.clear_image').val('');
			
			
			var advertisement_id = $(this).val();
			
			var advertisement_name = $(this).attr('advertisement-name');

			var advertisement_location_id = $(this).attr('advertisement-location-id');

			var advertisement_location_name = $(this).attr('advertisement-location-name');
			
			var advertisement_url = $(this).attr('advertisement-url');
			
			var advertisement_img = $(this).attr('advertisement-image');
			
			var old_image = $(this).attr('old-image');
			
			var advertisement_status = $(this).attr('advertisement-status');
			
			var advertisement_ad_code = $(this).attr('advertisement-ad-code');
			
			
			$('.advertisement_id').val(advertisement_id);
			
			$('.advertisement_name').val(advertisement_name);

			$('.advertisement_location_id').val(advertisement_location_id);

			$('.advertisement_location_id').html(advertisement_location_id+'. '+advertisement_location_name);
			
			$('.advertisement_url').val(advertisement_url);
			
			$('.advertisement_img').attr('src',advertisement_img);	
			
			$('.old_image').val(old_image);			
			
			$('.custom_ad_code').html(advertisement_ad_code);
			
			
			if(advertisement_status == 0){
				
				$('.edit_cat_type_active').removeClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',false);
				
				$('.edit_cat_type_inactive').addClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',true);
				
			}
			if(advertisement_status == 1){
				
				$('.edit_cat_type_active').addClass('active');
				$('.edit_cat_type_active').children('input').prop('checked',true);
				
				$('.edit_cat_type_inactive').removeClass('active');
				$('.edit_cat_type_inactive').children('input').prop('checked',false);
				
			}
			
			$('.edit_advertisement_modal').modal();
			
		});
		
		
	//Edit reporter modal
	
		$('body').on('click','.edit_reporter',function(){
			
			//clear image 
			$('.clear_image').val('');
			
			
			var reporter_id = $(this).val();
			
			var reporter_name = $(this).attr('reporter-name');
			
			var reporter_email = $(this).attr('reporter-email');
			
			var reporter_mobile = $(this).attr('reporter-mobile');
			
			var reporter_img = $(this).attr('reporter-image');
			
			var old_image = $(this).attr('old-image');
			
			var reporter_address = $(this).attr('reporter-address');
			
			
			$('.reporter_id').val(reporter_id);
			
			$('.reporter_name').val(reporter_name);

			$('.reporter_email').val(reporter_email);

			$('.reporter_mobile').val(reporter_mobile);
			
			$('.reporter_img').attr('src',reporter_img);	
			
			$('.old_image').val(old_image);			
			
			$('.reporter_address').html(reporter_address);
			
			
			$('.edit_reporter_modal').modal();
			
		});
		
		
	
	
	//toggle sidenav
	
		$('.toggle_sidenav').on('click',function(){
			
			$('.side_navigation').toggle('slide', {direction: 'left'}, 300);
			
		});
	
	
	
	// Dtaepicker
	
		$( ".statistics_date" ).datepicker({ dateFormat: 'dd-mm-yy' });
	
	
	
	
	
	
	//Panel bootstrap
	
		$(document).on('click', '.panel-heading span.clickable', function(e){
			var $this = $(this);
			if(!$this.hasClass('panel-collapsed')) {
				$this.parents('.panel').find('.panel-body').slideUp();
				$this.addClass('panel-collapsed');
				$this.find('i').removeClass('fa fa-plus').addClass('fa fa-minus');
			} else {
				$this.parents('.panel').find('.panel-body').slideDown();
				$this.removeClass('panel-collapsed');
				$this.find('i').removeClass('fa fa-minus').addClass('fa fa-plus');
			}
		})
	
	
	
	
	
	//user panel show hide in topbar
	
		$('.user_hover').hover(function() {
			$(this).find('.user_out').stop(true, true).fadeIn('fast');
		}, function() {
			$(this).find('.user_out').stop(true, true).fadeOut("slow");
		});
	
	
	// Time continue
	
		function startTime() {
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			h = checkTime(h);
			$('.time_run').html(h + ":" + m + ":" + s);
			var t = setTimeout(startTime, 500);
		}
		function checkTime(i) {
			if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			return i;
		}
		
		startTime();
		
	
	
	
	
	
	// Make Side nav Active on current page

		var url = window.location.href;
		
		//console.log(url);
		
		$('.nav_in_a').removeClass('active');
		
		$("[href='"+url+"']").parent().parent().fadeIn();
		
		$("[href='"+url+"']").addClass('active');
		
		$("[href='"+url+"']").parent('.nav_items').addClass('active');
		
		$("[href='"+url+"']").next('.my_dropdown').fadeIn();
		
		$("[href='"+url+"']").parent().parent().parent().addClass('active');
		
		
		
		
	//visitor stats search

	
		$(document).on('click','.search_visitors',function(){
			
			var date_from = $(".date_from").val();
			var date_to = $(".date_to").val();
			
			$(".search_results").html();
			
			$('.search_results').html("<h1 style='text-align:center;color:gray; padding:20px 0;'><i class='fa fa-spinner fa-spin'></i></h1>");
			
			$.ajax({

				url:"<?php echo base_url();?>search-site-stat",
	
				method:"GET",
	
				data:{date_from:date_from,date_to:date_to},
	
				success: function(data) {
	
				  
					$('.search_results').html(data);
	
					$('.date_data').html(date_from+' to '+date_to);
				  
				  
				}
		
			});
			
			$.ajax({

				url:"<?php echo base_url();?>search-site-total",
	
				method:"GET",
	
				data:{date_from:date_from,date_to:date_to},
	
				success: function(data) {
					
					$('.total_data').html(data);
				  
				}
		
			});
			
			
		});
		
	

	// ad stat search
	
		$(document).on('click','.search_advertisement',function(){
			
			var date_from = $(".date_from").val();
			var date_to = $(".date_to").val();
			var advertisement = $(".advertisement_id").val();
                
			var split_ad = advertisement.split("___");
			
			$(".search_results").html();
			
			$('.search_results').html("<h1 style='text-align:center;color:gray; padding:20px 0;'><i class='fa fa-spinner fa-spin'></i></h1>");
			
			$.ajax({

				url:"<?php echo base_url();?>search-ad-stat",
	
				method:"GET",
	
				data:{date_from:date_from,date_to:date_to,advertisement_id:split_ad[0]},
	
				success: function(data) {
	
				  
					$('.search_results').html(data);
	
					$('.date_data').html(date_from+' to '+date_to+' <br><h4>'+split_ad[1]+'</h4><img src="<?=base_url();?>'+split_ad[2]+'" alt="All Ad" width="auto" height="40px" />');
				  
				  
				}
		
			});
			
			
		});
		
		
	
		$('.tagsinput').tagsinput({});
	
	});
	
</script>


	

	
</html>
