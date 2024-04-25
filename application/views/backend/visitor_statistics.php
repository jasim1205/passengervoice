<div class="inner_body_content col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fas fa-chart-bar"></i> Visitor Statistics</h3>
		
	</div>
	
	<div class="no_padding col-md-12 col-sm-12 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Visitor Statistics</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
				
			
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
					
					<div class="col-md-3 col-sm-4 col-xs-4 no_padding form-group-sm">
						
						<label for="from-date">Date From</label>
						
						<input id="from-date" type="text" class="date_from statistics_date datepicker form-control" value="<?=date('d-m-Y');?>">
						
					</div>
					
					<div class="col-md-3 col-sm-4 col-xs-4 no_padding form-group-sm">
						
						<label for="to-date">Date To</label>
						
						<input id="to-date" type="text" class="date_to statistics_date datepicker form-control" value="<?=date('d-m-Y');?>">
						
					</div>
					
					
					<div class="col-md-3 col-sm-4 col-xs-4 form-group-sm">
						<br>
						<button class="marginT5 search_visitors btn btn-primary btn-sm">Go</button>
						
						<button class="pull-right marginT5 print_visitor btn btn-danger btn-sm">Print</button>
						
						<span class="clear"></span>
						
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
				<br>
				</div>
				
				<?php
					$tot_m = 0;
					foreach($site_statistics_list2 as $site_statistics_list2){
						$tot_m += $site_statistics_list2->visitor_statistics_visitor_count;
					}
				?>
				
				<div id="print_visitor_data" class="col-md-12 col-sm-12 col-xs-12 no_padding">
				
					<h4 class="search_key">
						
						Showing Data: <b class="date_data"><?=date('M Y');?></b> 
						<span class="pull-right">Total Visitors: <b class="total_data"><?=$tot_m;?></b></span>
						<span class="clear"></span>
						
					</h4>
					<div class="table-responsive">
					
						<table class="search_results table table-bordered table-striped">
							<thead>
								<tr>
									<th>Date</th>
									<th>Visitors Countries</th>
									<th>Total Unique Visitors</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
								foreach($site_statistics_list as $site_statistics_list){
							?>
							
								<tr>
									<td><?php echo $site_statistics_list->visitor_statistics_date;?></td>
									<td><?php echo $site_statistics_list->visitor_statistics_country;?></td>
									<td><?php echo $site_statistics_list->visitor_statistics_visitor_count;?></td>
									
								</tr>
								
							<?php }?>
								
							</tbody>
						</table>
						
						
						

					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
				
					<button class="print_visitor btn btn-danger">Print</button>
					
				</div>
				
				
			</div>
		</div>

	</div>
	
</div>

<script>
	$(document).ready(function() {
	
	// visitor printing
	
	
		$(document).on('click','.print_visitor',function () {
			
			var prtContent = document.getElementById("print_visitor_data");
			var WinPrint = window.open('', '', 'left=0,top=0,width=1200,height=900,toolbar=0,scrollbars=0,status=0');
	
			WinPrint.document.writeln('<html><head><title>Visitor Statistics</title>');
			WinPrint.document.writeln('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">');
			WinPrint.document.writeln('<link rel="stylesheet" href="<?php echo base_url();?>files/backend/css/style.css">');
			WinPrint.document.writeln('<style>body{background:#fff;margin:15px;}</style>');
			WinPrint.document.writeln('</head><body>');
			WinPrint.document.writeln('<p><img src="<?=base_url().$meta->site_logo;?>" width="auto" height="70px" alt="image"></p>');
			WinPrint.document.writeln('<h3>Visitor Statistics</h3>');
			WinPrint.document.writeln(prtContent.innerHTML);
			WinPrint.document.writeln('</body></html>');
			WinPrint.document.close();
			WinPrint.focus();
			//WinPrint.print();
			//WinPrint.close();
		});
		
	});

</script>

