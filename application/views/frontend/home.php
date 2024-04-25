	
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
	<!-- lead news start -->
	<div class="col-md-12 col-sm-12 col-xs-12 top-two-news">
		<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(2);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php } ?>
			</div>
		<!---  Add scetion end-->
		<div class="col-md-8 col-sm-7 col-xs-12">
			
			<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php												
						$news = $this->frontend_model->lead_news();	
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
													
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট   <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?> 
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title" style="color:red;"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i> <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,900);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-4 col-sm-5 col-xs-12">
			
			<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'Latest')" id="defaultOpen">সর্বশেষ</button>
					<button class="tablinks" onclick="openCity(event, 'Popular')">সর্বপঠিত</button>
				</div>

				<div id="Latest" class="tabcontent">
					<?php foreach($latest_news as $news){?>
						<p>
							<i class="fa fa-hand-o-right"></i>&nbsp; 
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">	
								<?=$news->post_title;?>
							</a>
						</p>
					<?php }?>
						
				</div>

				<div id="Popular" class="tabcontent">
					<?php foreach($most_viewed as $news){?>
						<p>
							<i class="fa fa-hand-o-right"></i>&nbsp; 
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">	
								<?=$news->post_title;?>
							</a>
						</p>
					<?php }?>

						
				</div>
				<br>
			
			</div>

		</div>

	</div>
	<!-- lead news end -->
	<!-- main news 1 start -->
	<div class="col-md-12 col-sm-12 col-xs-12 main-body-news">
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(3);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(1);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php				
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট   <i class="fa fa-clock-o" aria-hidden="true"></i><?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)
							foreach ($news as $news) {
						?>
							
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(4);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(2);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php												
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)						
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>

				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)

							foreach ($news as $news){
							
						?>
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট  <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>

	</div>

	<!-- main news 1 end -->

	<!-- main news 2 start -->
	<div class="col-md-12 col-sm-12 col-xs-12 main-body-news">
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(5);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(3);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php				
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট   <i class="fa fa-clock-o" aria-hidden="true"></i><?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)
							foreach ($news as $news) {
						?>
							
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(6);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(4);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php												
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)						
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>

				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)

							foreach ($news as $news){
							
						?>
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট  <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>

	</div>

	<!-- main news 2 end -->

	<!-- main news 3 start -->
	<div class="col-md-12 col-sm-12 col-xs-12 main-body-news">
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(7);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(5);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php				
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট   <i class="fa fa-clock-o" aria-hidden="true"></i><?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)
							foreach ($news as $news) {
						?>
							
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(8);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(6);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php												
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)						
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>

				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)

							foreach ($news as $news){
							
						?>
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট  <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
	</div>

	<!-- main news 3 end -->

	<!-- main news 4 start -->
	<div class="col-md-12 col-sm-12 col-xs-12 main-body-news">
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(9);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(7);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php				
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট   <i class="fa fa-clock-o" aria-hidden="true"></i><?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)
							foreach ($news as $news) {
						?>
							
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(10);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(8);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php												
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)						
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>

				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)

							foreach ($news as $news){
							
						?>
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট  <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
	</div>

	<!-- main news 4 end -->

	<!-- main news 5 start -->
	<div class="col-md-12 col-sm-12 col-xs-12 main-body-news">
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(11);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(9);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php				
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট   <i class="fa fa-clock-o" aria-hidden="true"></i><?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)
							foreach ($news as $news) {
						?>
							
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(12);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(10);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php												
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)						
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>

				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)

							foreach ($news as $news){
							
						?>
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট  <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
	</div>

	<!-- main news 5 end -->

	<!-- main news 6 start -->
	<div class="col-md-12 col-sm-12 col-xs-12 main-body-news">
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(13);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(11);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php				
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট   <i class="fa fa-clock-o" aria-hidden="true"></i><?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)
							foreach ($news as $news) {
						?>
							
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(14);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<?php								
					$location = $this->frontend_model->category_location(12);					
				?>
				<div class="cat-head"> 
					<a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">	
						<h3><span><?=$location->category_name;?></span></h3>
					</a>
				</div>	

				 
				<div class="col-md-12 col-sm-12 col-xs-12 lead-news no_padding">
					<?php												
						$news = $this->frontend_model->news_by_cat($location->category_id,1,0); //(id,limit,offset)						
					?>
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						
						<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
						<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 	
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
						
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
								<h2 class="exclusive-news-title"><?=$news->post_title;?></h2>
							</a>
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
							<h6 class="author"><i class="fa fa-user" aria-hidden="true"></i>  <?=$news->reporter_name;?></h6>
							</a>

							<p class="exclusive-news-details"> 
								<?=substr(strip_tags($news->post_description),0,500);?>...
								<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
									<span>বিস্তারিত</span>
								</a>
							</p>
						</div>
					</div>

				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
						<?php	
							$news = $this->frontend_model->news_by_cat($location->category_id,2,1); //(id,limit,offset)

							foreach ($news as $news){
							
						?>
						<div class="col-md-6 col-xs-12 col-sm-12 side-news">   
							
								
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img class="img-responsive" src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
							<p class="post-author-times">আপডেট  <i class="fa fa-clock-o" aria-hidden="true"></i><?php 				
									convTime($news->post_time);
									echo ", ";
									convDate($news->post_date);
								?>
							</p>
									
							<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><h5 class="side_news_title"> <?=$news->post_title;?></h5></a>							 
								
							
						</div>
						<?php } ?>						
						
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="more-news col-md-12 no-padding">
							 <a href="<?=base_url().'category/'.$location->category_id."?c=".$location->category_name;?>">সব খবর</a>
							 <span class="clear"></span>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
	</div>

	<!-- main news 6 end -->

	<!-- image & video content -->
	<div class="col-md-12 col-sm-12 col-xs-12  main-body-news">
		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(15);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<div class="cat-head"> 					
					<a href="<?=base_url();?>front-video"><h3><span>ভিডিও</span> </h3></a>
				</div>	
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 video-section">
				
				<div class="video_slide owl-carousel no_padding col-md-12 col-sm-12 col-xs-12">
					
					<?php						
						foreach ($home_videos as $home_video){						
					?>
						
					 	<div class="item no_padding col-md-12 col-sm-12 col-xs-12">
							<iframe src="https://www.youtube.com/embed/<?=$home_video->video_url;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					<?php } ?>			     		
			   </div>
			</div>
		</div>

		<div class="col-md-6 col-sm-6 col-xs-12 no_padding">
			<!---  Add scetion start-->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
						
					$ad = $this->frontend_model->get_ad(16);
					
					if($ad != ''){
						
					
				?>
				<div class="topads-one">
					<a class="ads_click_counter" data-ad-id="<?= $ad->advertisement_id;?>" target="_blank" href="<?=$ad->advertisement_url;?>">
												
						<img src="<?=base_url().$ad->advertisement_image;?>" title="<?=$ad->advertisement_name;?>" class="img-responsive" alt="<?=$ad->advertisement_name;?>"/>
					
					</a>
				</div>
				<?php 
										
					}
				?>
			</div>
			<!---  Add scetion end-->

			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<div class="cat-head"> 					
					<a href="<?=base_url();?>chobighor"><h3><span>ছবিঘর</span></h3></a>
				</div>	
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 image-section">
				
				<div class="image_slide owl-carousel no_padding col-md-12 col-sm-12 col-xs-12">
					<?php foreach($home_gallary as $home_gallary1){?>
				 	<div class="item no_padding col-md-12 col-sm-12 col-xs-12">
						<div class="no_padding col-md-12 col-sm-12 col-xs-12">
							<div class="medium_news_type no_padding col-md-12 col-sm-12 col-xs-12">
								<img data-img-name='<?=$home_gallary1->image_name;?>' class="myImg" src="<?=base_url().$home_gallary1->image_image;?>" alt="<?=$home_gallary1->image_name;?>" />
								<h6><?=$home_gallary1->image_name;?></h6>
							</div>
						</div>
					</div>
					<?php } ?>
					
			     		
			   </div>
			   <div id="myModal" class="modal">
					<span class="close">&times;</span>    					
					<img class="modal-content img-responsive" id="img01">
					<p id="name"></p>					
				</div>
			</div>
		</div>
	</div>
</div>


				