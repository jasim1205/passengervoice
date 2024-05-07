	
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
?>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12 other-page">
			
			<div class="top_padding col-md-12 col-sm-12 col-xs-12">
			
				<ol class="breadcrumb">
					<li><a href="<?=base_url();?>">হোম</a></li>
					<li><a href="<?=base_url();?>archive/<?=$post_date;?>"><?=$post_date;?></a></li>    
				</ol>
			
			</div>
		
			<div class="categoryNews top_padding no_padding col-md-12 col-sm-12 col-xs-12">
			
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<?php
						foreach ($posts as $post){
					?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						
						<a href="<?=base_url().'news-view/'.$post->post_id.'?n='.$post->post_title;?>"><img src="<?=base_url().$post->post_image;?>" alt="<?=$post->post_title;?>" /></a>
						<h4> <?=$post->post_title;?></h4>
						<p class="news-details"><b><?=$post->reporter_name;?> :</b> <?=substr(strip_tags($post->post_description),0,260);?>...<a class="more" href="<?=base_url().'news-view/'.$post->post_id.'?n='.$post->post_title;?>">বিস্তারিত</a></p>
						<br>
					</div>
					<?php } ?>
					
													
				</div>
			</div>
			<div class="top_margin col-md-12 col-sm-12 col-xs-12">
				<?=$textline2;?>
				<br>
				<ul class="pagination">
					<?=$paginationCtrls;?>
				</ul>
				<br>
			</div>

			<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
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
				<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
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
		
					
					
					
					
				