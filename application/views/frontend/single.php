
<?php 
	function convTime($time_from_news){		
		
		$currentTime = date('h:i', strtotime($time_from_news));
		
		$am_pm = date('a', strtotime($time_from_news));
		
		if($am_pm == "am"){
			$am_pm = "এএম";
		}
		if($am_pm == "pm"){
			$am_pm = "পিএম";
		}
		
		$engTime = array(1,2,3,4,5,6,7,8,9,0);
		$bangTime = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
		$convertedTime = str_replace($engTime,$bangTime,$currentTime);
		echo $convertedTime." ".$am_pm;
		
	}
	
	function convDate($date_from_news){
		
		$currentDate = $date_from_news; 
		$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
		$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
		বুধবার','বৃহস্পতিবার','শুক্রবার');			
		$convertedDATE = str_replace($engDATE,$bangDATE,$currentDate);
		echo $convertedDATE;	
	}
	
	$tot_views = $news_view->news_views + 1;
	
	$this->db->query("update post_table set news_views='".$tot_views."' where post_id='".$news_view->post_id."'");
	
?>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12 other-page">		
			<div class="top_padding col-md-12 col-sm-12 col-xs-12 print-hide">
				<ol class="breadcrumb">
					<li><a href="<?=base_url(); ?>">হোম</a></li>
					<li><a href="<?=base_url().'news-view/'.$news_view->post_id.'?n='.$news_view->post_title;?>"><?=$news_view->post_title;?></a></li>    
				</ol>
			</div>
			<!-- this logo show only for print and hide web view -->
			<div class="detailNews col-md-12 col-sm-12 col-xs-12">
			    <p style='font-size:20px; color:red'><?=$news_view->post_sub_title;?></p>
				<h2><?=$news_view->post_title;?></h2>
				<p style="color:gray;"><i class="fa fa-user" aria-hidden="true"></i> <?=$news_view->reporter_name;?> &nbsp;&nbsp; | &nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> <?php 
											
					convTime($news_view->post_time);
					echo ", ";
					convDate($news_view->post_date);
				
				?></p>
				
				<div class="sharethis-inline-share-buttons"></div><br>
				<p>
					<img class="img-responsive" src="<?=base_url().$news_view->post_image;?>" alt="<?=$news_view->post_title;?>" />
					<?= html_entity_decode($news_view->post_description);?>
				</p>
				<center>
                <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
                <!-- passengervoice.net into single page content -->
                <!-- <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-7567608637999899"
                     data-ad-slot="6835923121"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script> -->
                </center>

			</div>
			
			<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12 print-hide">
				<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
					<?php
							
						$ad = $this->frontend_model->get_ad(17);
						
						if($ad != ''){
							
						
					?>
					<div class="topads-two col-md-12 col-sm-12 col-xs-12">
						<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
													
							<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
						
						</a>
					</div>
					<?php } ?>
				</div>
				<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
					<?php
							
						$ad = $this->frontend_model->get_ad(18);
						
						if($ad != ''){
							
						
					?>
					<div class="topads-two col-md-12 col-sm-12 col-xs-12">
						<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
													
							<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
						
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
			
			<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12 print-hide">
				<div class="categoryNews col-md-12 col-sm-12 col-xs-12 no_padding">
					<br>
					<div class="cat-head col-md-12 col-sm-12 col-xs-12"> 					
						<h3><span>রিটেলেড নিউজ</span></h3>
					</div>
					

					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<?php								
								foreach ($related as $news){	
							?>
							<div class="col-md-6 col-xs-12 col-sm-12 side-news">
								
									
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
								<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 
										
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								
								?></p>
										
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"><?=$news->post_title;?></h5></a>							 
									
								
							</div>
							<?php } ?>					
							
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12 print-hide">
				<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
					<?php
							
						$ad = $this->frontend_model->get_ad(19);
						
						if($ad != ''){
							
						
					?>
					<div class="topads-two col-md-12 col-sm-12 col-xs-12">
						<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
													
							<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
						
						</a>
					</div>
					<?php } ?>
				</div>
				<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12 print-hide">
					<?php
							
						$ad = $this->frontend_model->get_ad(20);
						
						if($ad != ''){
							
						
					?>
					<div class="topads-two col-md-12 col-sm-12 col-xs-12">
						<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
													
							<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
						
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
				
				