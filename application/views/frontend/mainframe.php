<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<?php 
	
    $url= $_SERVER['REQUEST_URI'];
    $rt = explode("/", $url);
    
    if (in_array("news-view", $rt)){
		
       $title = $news_view->post_title;
	
	?>
	
	<meta name="description" content="<?php echo strip_tags($news_view->post_description);?>">
	<meta name="keywords" content="<?php echo $news_view->post_title;?>">
	<title><?php echo $news_view->post_title;?></title>
	
	<meta property="og:url" content="<?php echo base_url().'news-view/'.$news_view->post_id.'?n='.$news_view->post_title;?>">
	
	<meta property="og:description" content="<?php echo strip_tags($news_view->post_description);?>">
	<meta property="og:title" content="<?php echo $news_view->post_title;?>">
	
	<meta property="og:site_name" content="Laldighi">
	
	<!--<meta property="fb:app_id" content="1405933432817561" /> -->
    <meta property="og:type" content="website" /> 
    
    <meta property="og:image" content="<?php echo base_url().$news_view->post_image;?>">
    <!--<meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="<?php echo $news_view->post_title;?>" /> -->
	
	
	
	<?php 
	   
    }else{
		
	?>
	
	
    <meta name="description" content="<?= substr(strip_tags($meta->site_description),0,200);?>">
	<!--<meta name="keywords" content="<?= $meta->site_keywords;?>">-->
    <title><?= $meta->site_name;?></title>	
	
	
	<?php
    }
	?>
    <meta name="author" content="Muktodhara Technology Limited">
    <link rel="icon" href="<?= base_url().$meta->site_icon;?>">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <!-- Your custom styles (optional) -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	
	
	

	<!-- Bootstrap CSS CDN LINK (Please Always Use The Updated CDN) -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	 <!-- Owl Carousel Assets -->
	<link rel="stylesheet" href="<?= base_url();?>files/frontend/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url();?>files/frontend/owlcarousel/owl.theme.default.min.css">
	
    <link href="<?= base_url();?>files/frontend/css/style.css?updatetimes=2" rel="stylesheet">
    <link  href="<?= base_url();?>files/frontend/css/print.css?updatetimes=3" rel="stylesheet" media="print">

	<!-- JQuery CDN LINK (Please Always Use The Updated CDN) -->
	
	<script src="<?= base_url();?>files/frontend/scripts/jquery-2.js"></script>
	
	<!-- Bootstrap JS CDN LINK (Please Always Use The Updated CDN) -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <!-- CUSTOM JQuery & JS -->
	
	<script src="<?= base_url();?>files/frontend/scripts/jquery-ui.js"></script>
	<script src="<?= base_url();?>files/frontend/scripts/jquery-ui.min.js"></script>
	<script src="<?= base_url();?>files/frontend/scripts/jquery.cycle.all.min.js"></script>
	<script src="<?= base_url();?>files/frontend/scripts/jquery.easing.1.3.js"></script>
	
	

	<script src="https://apis.google.com/js/platform.js"></script>
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	
	
	<!-- calender -->
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>files/frontend/css/jsCalendar.css">
	<script type="text/javascript" src="<?= base_url();?>files/frontend/js/jsCalendar.js"></script>

	<script src="https://apis.google.com/js/platform.js"></script>
	<style type="text/css">
		@font-face {
		    font-family: SolaimanLipi;
		    src: url("<?= base_url();?>files/frontend/fonts/SolaimanLipi_22-02-2012.ttf");
			
		}
		
		#st-1 .st-btn > img {
    display: inline-block;
        height: 30px !important;
    }
	</style>
	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d986cad2b036a0011ed0d77&product=inline-share-buttons' async='async'></script>
	<script data-ad-client="ca-pub-7567608637999899" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
   <section class="top hidden-xs">
   		<div class="container">
	   		<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p>
						    <?php
								

								echo " চট্টগ্রাম ";

								?>
						
						</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="social col-md-12 col-sm-12 col-xs-12 no_padding">						
							<a href="<?= $meta->facebook;?>" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="<?= $meta->twitter; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="<?= $meta->google; ?>" class="google"><i class="fa fa-google-plus"></i></a>
							<a href="<?= $meta->youtube; ?>" class="youtube"><i class="fa fa-youtube"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
   		
    </section>
	<section class="header ">
		<div class="container">
			<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<a href="<?=base_url();?>"><img src="<?= base_url().$meta->site_logo;?>" class="logo" alt="<?= $meta->site_name;?>" /></a>
					</div>
					
					<div class="no_padding col-md-5 col-sm-4 col-xs-12 print-hide">
						<?php			
							$ad = $this->frontend_model->get_ad(2);							
							if($ad != ''){	
							
						?>
							<div style="" class="bottom_margin top_small_margin no_padding col-md-12 col-sm-12 col-xs-12">
								<div class="middleNewsAdd no_padding col-md-12 col-sm-12 col-xs-12">
									<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
										<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" alt="<?=$ad->advertisement_name;?>" />
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
					
					<div class="col-md-3 col-sm-4 col-xs-12 print-hide">
						<p>
							<?php 
					   
								date_default_timezone_set('asia/dhaka');
								
								$currentDate = date("l, j F Y");
								
								$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
								
								$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
								
								$convertedDATE = str_replace($engDATE,$bangDATE,$currentDate);
								
								echo "$convertedDATE";
							?>
						</p>
						<form action="<?= base_url();?>search-news" class="searchform" method="GET">
							<div class="input-group stylish-input-group">
							
								<input type="text" class="form-control" name="s"  placeholder="অনুসন্ধান..." required>
								<span class="input-group-addon">
									<button type="submit">
										<span class="glyphicon glyphicon-search"></span>
									</button>  
								</span>
						
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="navigation print-hide">
		<div class="container">
			<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					
					<nav class="navbar">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>                        
								</button>
								<div class="collapse navbar-collapse" id="myNavbar">
									<ul class="nav navbar-nav">
										<li class="active"><a href="<?=base_url();?>">প্রচ্ছদ</a></li>
										<?php
										 	foreach($menu as $menu){
										 		if($menu->sub_menu){

										?>								
										
										<li class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="<?=base_url().'category/'.$menu->category_id."?c=".$menu->category_name;?>"><?=$menu->category_name;?> <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<?php 
													$subs = explode(",",$menu->sub_menu);

													for($xx = 0; $xx < count($subs); $xx++){

														$single_subs = $this->frontend_model->get_category_single($subs[$xx]);
												?>
													<li><a href="<?=base_url().'category/'.$single_subs->category_id."?c=".$single_subs->category_name;?>"><?=$single_subs->category_name;?></a></li>
												<?php 
													}
												?>
											
											</ul>
										</li>
										<?php

											}else{
										 ?>

									 	<li><a href="<?=base_url().'category/'.$menu->category_id."?c=".$menu->category_name;?>"><?=$menu->category_name;?></a><span></span></li>
								
										<?php } } ?>
									</ul>
								</div>
							</div>
						</div>
					</nav>
					
				</div>
			</div>
		</div>
	</section>
	<section class="news_scroller print-hide">
		<div class="container">
			<div class="news_scroller_content col-md-12 col-sm-12 col-xs-12">
				<div class="no_padding border_r col-md-1 col-sm-2 col-xs-3">
					
					<p>শিরোনাম</p>
					
				</div>
				<div class="col-md-11 col-sm-10 col-xs-9">
					
					<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" attribute_name="attribute_value">
						<ul class="list-inline">
							<?php foreach($scroll_news as $scroll_news){?>
								<li><i class="fa fa-arrow-circle-o-right"></i>&nbsp;&nbsp; 
									<a href="<?=base_url().'news-view/'.$scroll_news->post_id.'?n='.$scroll_news->post_title;?>" title="<?=$scroll_news->post_title;?>"><?=$scroll_news->post_title;?></a>
								</li>
							<?php }?>
						</ul>
					</marquee>
					
				</div>
				
			</div>
		</div>
	</section>
	


	 <!-- Main Three News section Start -->
	<section class="body">
		<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
			<div class="container">
				<div class="row">

					<div class="col-md-9 col-sm-12 col-xs-12 no_padding">
						<?= $main_content ?>
					</div>

					<div class="col-md-3 col-sm-12 col-xs-12  no_padding print-hide">
						<div class="col-md-12 col-sm-12 col-xs-12">
						
						    <!---  Add scetion start-->
						    
							<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							
								
                            
							</div>
							
							<!---  Add scetion end
						
						
							<div class="col-md-12 col-sm-12 col-xs-12 public-comment">
								
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span>পাবলিক মতামত </span></h3>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
								
									<form action="<?= base_url();?>contact-send" method="POST">
									    <?php
											$message = $this->session->userdata('message');
											if($message)
											{
												echo "<h5>".$message."</h5><br>";
												$this->session->unset_userdata('message');
											}
											?>
										<div class="form-group">
										    <input type="text" class="form-control" name="contact_name" placeholder="Your Name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" name="contact_number" placeholder="Your Number">
										</div>
										<div class="form-group">
										    <input type="email" class="form-control" name="contact_email" placeholder="Your Email">
										</div>

										<div class="form-group">
										    <input type="text" class="form-control" name="contact_headline" placeholder="News Headline">
										</div>

										<div class="form-group">
											<textarea rows="3" class="form-control" name="contact_details" placeholder="News Details"></textarea>
										</div>
										
										<button type="submit" class="btn btn-success">Send</button>
									</form> 
								</div>

							</div>
-->
							<!---  Add scetion start-->
							<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
								<?php
						
									$ad = $this->frontend_model->get_ad(21);
									
									if($ad != ''){							
									
								?>
								<div class="sideads">
									<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
										<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
									</a>
								</div>
								<?php } ?>
							</div>
							<!---  Add scetion end-->
                            
							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
							    <?php
									$police = $this->frontend_model->page(6);
								?>	
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span><?= $police->page_title;?></span></h3>
								</div>	
                        
								<div class="col-md-12 col-sm-12 col-xs-12">
									<a href="<?=base_url().'pages/'.$police->page_id?>" target="_blank">
										<img src="<?=base_url().$police->page_image;?>" alt="<?= $police->page_title;?>">
									</a>
								</div>

							</div>


							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								<?php								
                					$sidebar_location1 = $this->frontend_model->category_location(13);					
                				?>
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<a href="<?=base_url().'category/'.$sidebar_location1->category_id."?c=".$sidebar_location1->category_name;?>">	
                						<h3><span><?=$sidebar_location1->category_name;?></span></h3>
                					</a>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
									<a href="<?=base_url().'category/'.$sidebar_location1->category_id."?c=".$sidebar_location1->category_name;?>">
										<img src="<?=$sidebar_location1->category_description;?>" alt="<?=$sidebar_location1->category_name;?>">
									</a>
								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<?php								
                					$sidebar_location2 = $this->frontend_model->category_location(14);					
                				?>
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<a href="<?=base_url().'category/'.$sidebar_location2->category_id."?c=".$sidebar_location2->category_name;?>">	
                						<h3><span><?=$sidebar_location2->category_name;?></span></h3>
                					</a>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
									<a href="<?=base_url().'category/'.$sidebar_location2->category_id."?c=".$sidebar_location2->category_name;?>">
										<img src="<?=$sidebar_location2->category_description;?>" alt="<?=$sidebar_location2->category_name;?>">
									</a>
								</div>

							</div>
							<!---  Add scetion start-->
							<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
								<?php
						
									$ad = $this->frontend_model->get_ad(24);
									
									if($ad != ''){							
									
								?>
								<div class="sideads">
									<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
										<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
									
									</a>
								</div>
								<?php 										
									}
								?>
							</div>
							<!---  Add scetion end-->
							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span>ভাড়ার তালিকা</span></h3>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
									<!--<img src="<?= base_url().$meta->basfee_list;?>" alt="<?= $meta->site_title;?>">-->
									<!--<object data="<?=base_url().$meta->basfee_list;?>" width="100%" height="auto" type="application/pdf"> PDF Plugin Not Available </object>-->
									<br>
									<h3><a href="<?=base_url().$meta->basfee_list;?>" target="_blank"> Click to Download</a></h3>
									<br>
								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								<?php
									$train = $this->frontend_model->page(7);
								?>

								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span><?= $train->page_title;?></span></h3>
								</div>	
                        
								<div class="col-md-12 col-sm-12 col-xs-12">
									<a href="<?=$train->page_description;?>" target="_blank">
										<img src="<?=base_url().$train->page_image;?>" alt="<?= $train->page_title;?>">
									</a>
								</div>

							</div>


							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<?php
									$train = $this->frontend_model->page(8);
								?>

								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span><?= $train->page_title;?></span></h3>
								</div>	
                        
								<div class="col-md-12 col-sm-12 col-xs-12">
									<a href="<?= strip_tags($train->page_description); ?>" target="_blank">
										<img src="<?=base_url().$train->page_image;?>" alt="<?= $train->page_title;?>">
									</a>
								</div>

							</div>
							<!---  Add scetion start-->
							<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
								<?php
						
									$ad = $this->frontend_model->get_ad(22);
									
									if($ad != ''){							
									
								?>
								<div class="sideads">
									<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
										<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
									
									</a>
								</div>
								<?php 										
									}
								?>
							</div>
							<!---  Add scetion end-->
							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span>আবহাওয়া</span></h3>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
										<a href="https://www.accuweather.com/en/bd/chittagong/27822/weather-forecast/27822" class="aw-widget-legal">
										</a><div id="awcc1526100755813" class="aw-widget-current"  data-locationkey="" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1526100755813"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
								</div>

							</div>




							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span>নামাজের সময়সূচি</span></h3>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
									<iframe src="http://sunsetsunrisetime.com/widget_namaz.php?view=true&amp;idcity=665&amp;text=054871&amp;colB=054871&amp;infoDetails=true&amp;method=1&amp;timezone=6&amp;typeClock=undefined" frameborder="0" width="100%" scrolling="no" height="415"></iframe>
								</div>

							</div>
							<!---  Add scetion start-->
							<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
								<?php
						
									$ad = $this->frontend_model->get_ad(23);
									
									if($ad != ''){							
									
								?>
								<div class="sideads">
									<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
										<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
									
									</a>
								</div>
								<?php 										
									}
								?>
							</div>
							<!---  Add scetion end-->
							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<?php								
                					$sidebar_location3 = $this->frontend_model->category_location(15);					
                				?>
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<a href="<?=base_url().'category/'.$sidebar_location3->category_id."?c=".$sidebar_location3->category_name;?>">	
                						<h3><span><?=$sidebar_location3->category_name;?></span></h3>
                					</a>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
									<a href="<?=base_url().'category/'.$sidebar_location3->category_id."?c=".$sidebar_location3->category_name;?>">
										<img src="<?=$sidebar_location3->category_description;?>" alt="<?=$sidebar_location3->category_name;?>">
									</a>
								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<?php								
                					$sidebar_location4 = $this->frontend_model->category_location(16);					
                				?>
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<a href="<?=base_url().'category/'.$sidebar_location4->category_id."?c=".$sidebar_location4->category_name;?>">	
                						<h3><span><?=$sidebar_location4->category_name;?></span></h3>
                					</a>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
									<a href="<?=base_url().'category/'.$sidebar_location4->category_id."?c=".$sidebar_location4->category_name;?>">
										<img src="<?=$sidebar_location4->category_description;?>" alt="<?=$sidebar_location4->category_name;?>">
									</a>
								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<?php
									$train = $this->frontend_model->page(9);
								?>

								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span><?= $train->page_title;?></span></h3>
								</div>	
                        
								<div class="col-md-12 col-sm-12 col-xs-12">
									<a href="<?=$train->page_description;?>" target="_blank">
										<img src="<?=base_url().$train->page_image;?>" alt="<?= $train->page_title;?>">
									</a>
								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span>ক্যালেন্ডার</span></h3>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">	
									<div class="auto-jsCalendar material-theme red"></div>
								</div>

							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					 
									<h3><span>বিমান বন্দর সিডিউল </span></h3>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">		
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#dha">ঢাকা</a></li>
										<li><a data-toggle="tab" href="#ctg">চট্টগ্রাম</a></li>
										<li><a data-toggle="tab" href="#cox">কক্সবাজার</a></li>
										<li><a data-toggle="tab" href="#syl">সিলেট</a></li>
									 </ul>
									<br>
									<div class="sidebarTabs tab-content">
										<div id="dha" class="tab-pane fade in active">										<?php
                        					$biman = $this->frontend_model->page(10);
                        				    ?>

											<a href="<?=$biman->page_description;?>" target="blank">
												<img src="<?=base_url().$biman->page_image;?>" alt="<?= $biman->page_title;?>" class="img-responsive">
											</a>									
										</div>

										<div id="ctg" class="tab-pane fade">
											<?php
                        					$biman = $this->frontend_model->page(11);
                        				    ?>

											<a href="<?=$biman->page_description;?>" target="blank">
												<img src="<?=base_url().$biman->page_image;?>" alt="<?= $biman->page_title;?>" class="img-responsive">
											</a>									
										</div>
										<div id="cox" class="tab-pane fade">
											<?php
                        					$biman = $this->frontend_model->page(12);
                        				    ?>

											<a href="<?=$biman->page_description;?>" target="blank">
												<img src="<?=base_url().$biman->page_image;?>" alt="<?= $biman->page_title;?>" class="img-responsive">
											</a>									
										</div>
										<div id="syl" class="tab-pane fade">
											<?php
                        					$biman = $this->frontend_model->page(13);
                        				    ?>

											<a href="<?=$biman->page_description;?>" target="blank">
												<img src="<?=base_url().$biman->page_image;?>" alt="<?= $biman->page_title;?>" class="img-responsive">
											</a>									
										</div>
									</div>
									
								</div>

							</div>


							



							<div class="col-md-12 col-sm-12 col-xs-12 sidebar-info">
								
								<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
									<h3><span>ফেসবুক</span></h3>
								</div>	

								<div class="col-md-12 col-sm-12 col-xs-12">
								<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FPassenger-voice-109692330365340%2F&tabs=timeline&width=270&height=1300&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId=1405933432817561" width="270" height="1300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
								</div>

							</div>

							

						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

    
		

<!-- ============footer start=============-->
	<section class="footer clear">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					<div class="site_name_app col-md-3 col-sm-12 col-xs-12">
						<div class="no_padding col-md-12 col-sm-12 col-xs-12">
							<h2><a href="<?= base_url();?>"><img src="<?= base_url().$meta->site_logo;?>" alt="<?= $meta->site_name;?>"></a></h2>
							
						</div>

						<div class="socialBottom col-md-12 col-sm-12 col-xs-12">						
							<a href="<?= $meta->facebook;?>"><span class="face1"><i class="fa fa-facebook"></i></span></a>
							<a href="<?= $meta->twitter;?>"><span class="twit1"><i class="fa fa-twitter"></i></span></a>
							<a href="<?= $meta->google;?>"><span class="gol1"><i class="fa fa-google-plus"></i></span></a>
							<a href="<?=$meta->youtube;?>"><span class="you1"><i class="fa fa-youtube"></i></span></a>
						</div>
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding footer-info">
							<div class="col-md-4 col-sm-4 col-xs-12 no_padding">
								<div class="publish">
									<h3>Advisor</h3>
									<p><?= $meta->site_address_3; ?></p>
									<h3>Editor</h3>
									<p><?= $meta->site_address_4; ?></p>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12 no_padding">
								<div class="footer-main-address">
									<h3>Office</h3>
									
									<p><?= $meta->site_address_1; ?></p>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12 no_padding">
								<div class="footer-address">
									<h3>Contact</h3>
									
									<p><?= $meta->site_address_2; ?></p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<section class="copyright">
		<div class="container">
			<div class="row">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<p class="center"> © সর্বস্বত্ব স্বত্বাধিকার সংরক্ষিত 2019 - <?= date('Y') ; ?> <a href="<?= base_url();?>"><?= $meta->site_name; ?></a> &nbsp;&nbsp;| &nbsp;&nbsp;এই ওয়েবসাইটের কোনো লেখা, ছবি, ভিডিও অনুমতি ছাড়া ব্যবহার সম্পূর্ণ বেআইনি এবং শাস্তিযোগ্য অপরাধ</p>
					<p class="center">Developed By <a href="http://muktodharaltd.com/">Muktodhara Technology Limited</a><a href="http://ourchattogram.com/">.</a></p>
				</div>
			</div>
		</div>
	</section>
<!-- ============footer=============-->
	<!-- <script src="js/jquery-2.1.1.js"></script> -->

	<script src="<?= base_url();?>files/frontend/owlcarousel/owl.carousel.min.js"></script>
	<script src="<?= base_url();?>files/frontend/scripts/breakingNews.js"></script>

	<script src="<?= base_url();?>files/frontend/scripts/custom.js"></script>



	<script>
		


			function openCity(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			$(document).ready(function() {
			
			    $.ajax({
    				url:"<?php echo base_url();?>get-visitor",
    
    				method:"GET",
    
    				data:{confirm_id:'1'},
    
    				success: function(data) {
    				   console.log(data);
    				}
    			});
       
				$(".scroll_top").on('click', function(event) {

					event.preventDefault();
					  
					  $('html, body').animate({
						scrollTop: $('#top').offset().top
					  }, 800, function(){
					   // window.location.hash = hash;
					  });
				});

				$('.video_slide').owlCarousel({
					loop:true,
					margin:10,
					responsiveClass:true,
					autoplay:true,
					dots:false,
					responsive:{
						0:{
							items:1,
							nav:true
						},
						600:{
							items:1,
							nav:true
						},
						1000:{
							items:1,
							nav:true,
							loop:true
						}
					}
				});

				$('.image_slide').owlCarousel({
					loop:true,
					margin:10,
					responsiveClass:true,
					autoplay:true,
					dots:false,
					responsive:{
						0:{
							items:1,
							nav:true
						},
						600:{
							items:1,
							nav:true
						},
						1000:{
							items:1,
							nav:true,
							loop:true
						}
					}
				});	



			});



			$(function() {
		 
				var sticky_navigation_offset_top = $('#navigation').offset().top;
				var sticky_navigation = function(){
		      
					var scroll_top = $(window).scrollTop(); 
					if (scroll_top > sticky_navigation_offset_top) { 
						$('#navigation').css({ 'position': 'fixed', 'top':0, 'left':0, 'width':'100%', 'z-index':10});
						
					}else {
						$('#navigation').css({ 'position': 'relative'}); 
					}
				};
				
				sticky_navigation();
		     
				$(window).scroll(function() {
					sticky_navigation();
				});
		 
		 
		    });



		    $(document).ready(function(){
			
				$(".closeI").click(function(){
					$(".sticky_add").delay(100).hide(500);			
				});
				
			});





			$(document).ready(function(){
			
				$(".closeY").click(function(){
					$(".youtube_sub").delay(100).hide(500);			
				});
				
			});





			$(document).ready(function(){
				
				//$(document).on("contextmenu", function (event) { event.preventDefault(); });
				
				$(".defaultOpen").click();
				$(".defaultOpen").addClass('activ');
				
				$(".closeIco").click(function(){
					$(".fbPage").delay(100).hide(500);			
				});


					
				
				
				
			});
		</script>
</body>
</html>
