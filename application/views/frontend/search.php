
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12 other-page">
					
					
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
							
									<?php
										
									if(isset($_GET['s']) && $_GET['s'] != ''){
										echo "<h4 class='color_gray top_margin bottom_margin'>You Searched: '".$_GET['s']."'<h4>";
										echo "<h4 class='color_gray top_margin'>".count($search_news)." Results Found.<h4>";
									}
										
									?>
									
								</div>
								<div class="categoryNews top_padding no_padding col-md-12 col-sm-12 col-xs-12">
								
									<div class="no_padding col-md-12 col-sm-12 col-xs-12">
										<?php
										
											if(isset($_GET['s']) && $_GET['s'] != ''){
												foreach ($search_news as $news){
												
										?>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>"><img src="<?=base_url().$news->post_image;?>" alt="<?=$news->post_title;?>" /></a>
											<a href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">
												<h4> <?=$news->post_title;?></h4>
											</a>
											<p><b><?=$news->reporter_name;?></b> <?=substr(strip_tags($news->post_description),0,260);?>...
												<a class="see_more" href="<?=base_url().'news-view/'.$news->post_id.'?n='.$news->post_title;?>">বিস্তারিত</a></p>
											<br>
										</div>
										<?php 
										}
									
										}else {
											echo "<h4 class='color_gray top_margin left_margin right_margin bottom_margin'>Please Search Something.</h4>";
										}
										
										?>
																		
									</div>
								</div>
								
								
								<div class="top_margin no_padding col-md-12 col-sm-12 col-xs-12">
									<div class="bottom_margin no_padding col-md-6 col-sm-12 col-xs-12">
										<?php
												
											$ad = $this->frontend_model->get_ad(15);
											
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
												
											$ad = $this->frontend_model->get_ad(16);
											
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
					</div>
					
					
					
				