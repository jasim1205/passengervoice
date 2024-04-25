	
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
	
	<section class="body_block">
		<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
			<div class="container">
				<div class="row">
					<div class="breakingNews bn-bordernone bn-darkred" id="bn7">
						<div class="bn-title" class="w-auto"><h2 class="d-inline-block"><?= $page->page_title?> </h2></div>
						<div class="bn-title" class="w-auto"><img src="<?=base_url().$page->page_image;?>" alt="<?= $page->page_title;?>"></div>
						<p><?= $page->page_description?></p>
					</div>

				</div>
			</div>
		</div>
	</section>