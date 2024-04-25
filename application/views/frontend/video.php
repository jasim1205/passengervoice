	
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
					<li><a href="<?=base_url();?>front-video">ভিডিও</a></li>    
				</ol>
			
			</div>
		
			<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
				<?php
				
					foreach ($front_video as $video){
						
				?>
				<div data-video="https://www.youtube.com/embed/<?=$video->video_url;?>" class="col-md-4 col-sm-6 col-xs-12 video_list_block video_page">
					<div class="video_icon">
						<img src="<?=base_url().$video->video_image;?>" alt="<?=$video->video_name;?>" />
						<span><i class="fa fa-youtube-play"></i></span>
					</div>
				
					<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> 
						
						<?php 
						
							convTime($video->video_time);
							echo ", ";
							convDate($video->video_date);
						
						?>
						
						</p>
						
					<h4 class="three-news-title"><?=$video->video_name;?></h4>
					
					
			    	
				</div>
				<?php }?>

			</div>

					
			<div class="top_margin col-md-12 col-sm-12 col-xs-12">
				<?=$textline2;?>
				<br>
				<ul class="pagination">
					<?=$paginationCtrls;?>
				</ul>
				<br>
			</div>
			
			
		</div>
	</div>

					
	<div id="vdo_modal" class="modal">

		<span class="closeFrm">&times;</span>
		<iframe id="ifrm" src="" width="100%" height="400px" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		
	</div>		


	<script type="text/javascript">
		$(document).ready(function() {
		
			$('.video_list_block').click(function(){

				var gg = $(this).attr('data-video');

				$('#ifrm').attr("src", gg);
				$('#vdo_modal').show();
			});
			
			$(".closeFrm").click(function(){
				$('#vdo_modal').hide();
			});
		});
	</script>	