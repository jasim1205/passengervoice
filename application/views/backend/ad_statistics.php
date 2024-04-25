<div class="inner_body_content col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fas fa-chart-bar"></i> Advertisement Statistics</h3>
		
	</div>
	
	<div class="no_padding col-md-12 col-sm-12 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Advertisement Statistics</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
				
			
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-3 col-sm-3 col-xs-6 no_padding form-group-sm">
						
						<label for="from-date">Date From</label>
						
						<input id="from-date" type="text" class="date_from statistics_date datepicker form-control" value="<?=date('d-m-Y');?>">
						<br>
					</div>
					
					<div class="col-md-3 col-sm-3 col-xs-6 no_padding form-group-sm">
						
						<label for="to-date">Date To</label>
						
						<input id="to-date" type="text" class="date_to statistics_date datepicker form-control" value="<?=date('d-m-Y');?>">
						<br>
						
					</div>
					
					<div class="col-md-3 col-sm-3 col-xs-12 no_padding form-group-sm">
						
						<label for="to-Select">Advertisement</label>
						
						<select id="to-Select" class="form-control advertisement_id">
								<option value="_________">None</option>
							<?php 
							
							foreach($all_ads as $all_ads){
							
							?>
								<option value="<?= $all_ads->advertisement_id."___".$all_ads->advertisement_name."___".$all_ads->advertisement_image;?>"><?= $all_ads->advertisement_id;?>. <?= $all_ads->advertisement_name;?></option>
							
							<?php }?>
							
						</select>
						<br>
						
					</div>
					
					
					<div class="col-md-3 col-sm-3 col-xs-12 form-group-sm">
						<br>
						<button class="marginT5 search_advertisement btn btn-primary btn-sm">Go</button>
						<br>						
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
				<br>
				
				<button class="pull-right print_ad btn btn-danger btn-sm">Print</button>
				
				<div class="clear"></div>
				</div>
				
				<div id="print_ad_data" class="col-md-12 col-sm-12 col-xs-12 no_padding">
				
					<h4 class="search_key">
						
						Showing Data: <b class="date_data"><?=date('M Y');?></b> 
						
					</h4>
					<div class="table-responsive">
					
						<table class="search_results table table-bordered table-striped">
							<thead>
								<tr>
									<th>Date</th>
									<th>Advertisement</th>
									<th>Image</th>
									<th>Total Clicks</th>
									<th>Countries</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
								foreach($ad_statistics_list as $list){
							?>
							
								<tr>
								
									<td><?=$list->ad_statistics_date;?></td>
									<td><?=$list->advertisement_name;?></td>
									<td>
										<img src="<?=base_url().$list->advertisement_image;?>" alt="<?=$list->advertisement_name;?>" height="40px" width="auto"/>
									</td>
									<td><?=$list->ad_statistics_click_count;?></td>
									<td><?=$list->ad_statistics_user_country;?></td>
									
								</tr>
								
							<?php }?>
								
							</tbody>
						</table>
						
						
						

					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
				
					<button class="print_ad btn btn-danger">Print</button>
					
				</div>
				
				
			</div>
		</div>

	</div>
	
</div>

<script>
	$(document).ready(function() {
	
	// ad printing
	
	
		$(document).on('click','.print_ad',function () {
			
			var prtContent = document.getElementById("print_ad_data");
			var WinPrint = window.open('', '', 'left=0,top=0,width=1200,height=900,toolbar=0,scrollbars=0,status=0');
	
			WinPrint.document.writeln('<html><head><title>Advertisement Statistics</title>');
			WinPrint.document.writeln('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">');
			WinPrint.document.writeln('<link rel="stylesheet" href="<?php echo base_url();?>files/backend/css/style.css">');
			WinPrint.document.writeln('<style>body{background:#fff;margin:15px;}</style>');
			WinPrint.document.writeln('</head><body>');
			WinPrint.document.writeln('<p><img src="<?=base_url().$meta->site_logo;?>" width="auto" height="70px" alt="image"></p>');
			WinPrint.document.writeln('<h3>Advertisement Statistics</h3>');
			WinPrint.document.writeln(prtContent.innerHTML);
			WinPrint.document.writeln('</body></html>');
			WinPrint.document.close();
			WinPrint.focus();
			//WinPrint.print();
			//WinPrint.close();
		});
		
	});

</script>

