	
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
			
	<!-- Main Division Starts -->
		
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12 other-page">	
			<div class="top_padding col-md-12 col-sm-12 col-xs-12">
			
				<ol class="breadcrumb">
					<li><a href="<?=base_url();?>">হোম</a></li>
					<li><a href="<?=base_url();?>chobighor">ছবিঘর</a></li>    
				</ol>
			
			</div>
		
			<div class="col-md-12 col-sm-12 col-xs-12 no_padding ">
				<?php
								
					foreach ($gallary as $gallary){
						
				?>		
				<div class="col-md-4 col-sm-6 col-xs-12 image_list_block">
					<div class="video_icon photo_icon">
						<img src="<?=base_url().$gallary->image_image;?>" alt="<?=$gallary->image_name;?>" data-img-name='<?=$gallary->image_name;?>' class="myImg2" />
						<span><i class="fa fa-camera"></i></span>
					</div>
				
					<p class="post-author-times">আপডেট <i class="fa fa-clock-o" aria-hidden="true"></i> <?php 
						convTime($gallary->image_time);
						echo ", ";
						convDate($gallary->image_date);
					
					?>
					</p>
						
					<h4><?=$gallary->image_name;?></h4>
					
					
			    	
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
			


		 <div id="myModal2" class="modal">
			<span class="close">&times;</span>    					
			<img class="modal-content img-responsive" id="img02">
			<p id="name2"></p>					
		</div>
	<!-- Main Division Ends -->
					
					
				
	<script type="text/javascript">
		$(document).ready(function() {
	
			var modal = $('#myModal2');
			var img = $('.myImg2');
			
			var modalImg = $("#img02");

			var modalImgName = $("#name2");
			
			img.click(function(){
				modalImg.attr("src", this.src);
				var img_title = $(this).attr('data-img-name2');
				modalImgName.html(img_title);
				modal.show();
			});

			$(".close").click(function(){
				modal.hide();
			});
		});
	</script>