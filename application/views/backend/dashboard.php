<?php date_default_timezone_set('Asia/Dhaka');?>
<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-dashboard"></i> Dashboard</h3>
		<?php
		$no_access = $this->session->userdata('no_access');
		
		if($no_access){
			
		?>
		
		<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Access Denied !</strong> <?php echo $no_access;?>
		</div>
		
		<?php		
			
			$this->session->unset_userdata('no_access');
		}
		?>	
	</div>
	
	<div class="no_padding col-md-12 col-sm-12 col-xs-12">				
		
		<div class="panel panel-mos">
			<div class="marginT10 panel-body">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-area"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Visitors Today</span>
						<span class="info-box-number">
							<?= $this->statistics_model->visitor_stats(date('d-m-Y'));?>
						</span>
						<span class="info-box-text">From <b><?= $this->statistics_model->country_stats(date('d-m-Y'));?></b> Countries</span>
					  </div>
					</div>
				</div>
				
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-danger elevation-1"><i class="far fa-chart-bar"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Visitors This Month</span>
						<span class="info-box-number">
							<?= $this->statistics_model->visitor_stats(date('-m-Y'));?>
						</span>
						<span class="info-box-text">From <b><?= $this->statistics_model->country_stats(date('-m-Y'));?></b> Countries</span>
					  </div>
					</div>
				</div>
				
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-green elevation-1"><i class="fas fa-chart-line"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Visitors This Year</span>
						<span class="info-box-number">
							<?= $this->statistics_model->visitor_stats(date('-Y'));?>
						</span>
						<span class="info-box-text">From <b><?= $this->statistics_model->country_stats(date('-Y'));?></b> Countries</span>
					  </div>
					</div>
				</div>
				
				
				
			</div>
		</div>
		
	</div>
	
	<div class="no_padding right_padding col-md-6 col-sm-12 col-xs-12">				
		
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Site Visitors (Daily)</h3>
			</div>
			<div class="panel-body">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="no_padding col-md-6 col-sm-6 col-xs-6">
						<h4 class="no_padding"><?= $this->statistics_model->visitor_stats(date('-m-Y'));?></h4>
						<span>Total Visitors</span>
						<br>
						<span><?=date('M Y');?></span>
						<br>
						<br>
					</div>
					<div class="no_padding col-md-6 col-sm-6 col-xs-6">
						<span class="pull-right">
							Total Visitors <i class="fa fa-square text-primary"></i>
						</span>
						<br>
						<span class="pull-right">
							Visited Contries <i class="fa fa-square text-lightgray"></i>
						</span>
						
						<span class="clear"></span>

					</div>
                </div>
				
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<canvas id="visitors-chart-daily" height="250"></canvas>
				</div>
			</div>
		</div>
		
	</div>
	
	
	<div class="no_padding col-md-6 col-sm-12 col-xs-12">				
		
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Site Visitors (Monthly)</h3>
			</div>
			<div class="panel-body">
				
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="no_padding col-md-6 col-sm-6 col-xs-6">
						<h4 class="no_padding"><?= $this->statistics_model->visitor_stats(date('-Y'));?></h4>
						<span>Total Visitors</span>
						<br>
						<span><?=date('Y');?></span>
						<br>
						<br>
					</div>
					<div class="no_padding col-md-6 col-sm-6 col-xs-6">
						<span class="pull-right">
							Total Visitors <i class="fa fa-square text-primary"></i>
						</span>
						<br>
						<span class="pull-right">
							Visited Contries <i class="fa fa-square text-lightgray"></i>
						</span>
						
						<span class="clear"></span>

					</div>
                </div>
				
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<canvas id="visitors-chart-monthly" height="250"></canvas>
				</div>
			</div>
		</div>
		
	</div>
	
	<div class="no_padding col-md-12 col-sm-12 col-xs-12">				
		
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Visitors Worldwide (Yearly)</h3>
			</div>
			<div class="panel-body">
				
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div id="regions_div" style="width: 100%; height: 400px;"></div>

				</div>
				
			</div>
		</div>
		
	</div>
	
	<div class="no_padding col-md-12 col-sm-12 col-xs-12">				
		
		<div class="panel panel-mos">
			<div class="marginT10 panel-body">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-info elevation-1"><i class="fa fa-file-text-o"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Total Posts</span>
						<span class="info-box-number">
							<?= count($this->post_model->all_post());?>
						</span>
					  </div>
					</div>
				</div>
				
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-delicious"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Total Images</span>
						<span class="info-box-number">
							<?= count($this->gallary_model->all_gallary());?>
						</span>
					  </div>
					</div>
				</div>
				
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-purple elevation-1"><i class="fa fa-clone"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Total Pages</span>
						<span class="info-box-number">
							<?= count($this->page_model->all_page());?>
						</span>
					  </div>
					</div>
				</div>
				
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-black elevation-1"><i class="fa fa-video-camera"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Total Videos</span>
						<span class="info-box-number">
							<?= count($this->video_model->all_video());?>
						</span>
					  </div>
					</div>
				</div>
				
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-gray elevation-1"><i class="fa fa-users"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Total Subcribers</span>
						<span class="info-box-number">
							<?= count($this->subscribers_model->all_subscribers());?>
						</span>
					  </div>
					</div>
				</div>
				
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="info-box">
					  <span class="info-box-icon bg-blue elevation-1"><i class="fa fa-sitemap"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Total Categories</span>
						<span class="info-box-number">
							<?= count($this->category_model->all_category());?>
						</span>
					  </div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="no_padding right_padding col-md-12 col-sm-12 col-xs-12">				
		
		<div class="panel panel-mos">
			<div class="panel-heading">
			
				<h3 class="panel-title">Daily Statistics</h3>
				
			</div>
			<div class="panel-body">
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<div class="no_padding col-md-12 col-sm-12 col-xs-12">
						<span><i class="fa fa-square text-primary"></i> Total Posts Per Day</span><br>
						<span><i class="fa fa-square text-yellow"></i> Total Images Per Day</span><br>
						<span><i class="fa fa-square text-gray"></i> Total Videos Per Day</span>
						<br>
						<br>
					</div>
                </div>
				
				<div class="no_padding col-md-12 col-sm-12 col-xs-12">
					<canvas id="post-chart" height="300"></canvas>
				</div>
			</div>
		</div>
		
	</div>
	
	
	
</div>


<!-- charts SCRIPTS -->
<script src="<?= base_url();?>files/backend/js/chart.js/Chart.min.js"></script>

<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#visitors-chart-monthly')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [
		  
			<?php  
				for ($x = 1; $x <= intval(date('m')); $x++) {
					if($x<10){
					   $g="0".$x;
					}else{
					   $g=$x;
					}
					
					echo $this->statistics_model->visitor_stats('-'.$g.date('-Y')).', ';
					
				}
			?>
		  
		  ]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [
		  
			<?php  
				for ($x = 1; $x <= intval(date('m')); $x++) {
					if($x<10){
					   $g="0".$x;
					}else{
					   $g=$x;
					}
					
					echo $this->statistics_model->country_stats('-'.$g.date('-Y')).', ';
					
				}
			?>
		  
		  ]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

  var $visitorsChart = $('#visitors-chart-daily')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : [<?php for($x=1;$x<=date('d');$x++){echo $x.', ';}?>],
      datasets: [{
        type                : 'line',
        data                : [
			<?php  
				for ($x = 1; $x <= intval(date('d')); $x++) {
					if($x<10){
					   $g="0".$x;
					}else{
					   $g=$x;
					}
					
					echo $this->statistics_model->visitor_stats($g.date('-m-Y')).', ';
					
				}
			?>
		],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : [
			<?php  
				for ($x = 1; $x <= intval(date('d')); $x++) {
					if($x<10){
					   $g="0".$x;
					}else{
					   $g=$x;
					}
					
					echo $this->statistics_model->country_stats($g.date('-m-Y')).', ';
					
				}
			?>
		],
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
  
  
  
  var $postChart = $('#post-chart')
  var postChart  = new Chart($postChart, {
    data   : {
      labels  : [<?php for($x=1;$x<=date('d');$x++){echo $x.', ';}?>],
      datasets: [
	  {
        type                : 'line',
        data                : [
			<?php  
				for ($x = 1; $x <= intval(date('d')); $x++) {
					if($x<10){
					   $g="0".$x;
					}else{
					   $g=$x;
					}
					
					echo $this->post_model->postD($g).', ';
					
				}
			?>
		],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : [
			<?php  
				for ($x = 1; $x <= intval(date('d')); $x++) {
					if($x<10){
					   $g="0".$x;
					}else{
					   $g=$x;
					}
					
					echo $this->gallary_model->gallaryD($g).', ';
					
				}
			?>
		],
          backgroundColor     : 'tansparent',
          borderColor         : '#ffc107',
          pointBorderColor    : '#ffc107',
          pointBackgroundColor: '#ffc107',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        },
        {
          type                : 'line',
          data                : [
			<?php  
				for ($x = 1; $x <= intval(date('d')); $x++) {
					if($x<10){
					   $g="0".$x;
					}else{
					   $g=$x;
					}
					
					echo $this->video_model->videoD($g).', ';
					
				}
			?>
		],
          backgroundColor     : 'tansparent',
          borderColor         : '#333',
          pointBorderColor    : '#333',
          pointBackgroundColor: '#333',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
  
})

</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
	google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'AIzaSyAappGfKHP41lgp6M-K39EqWXEQGVKYj24'
    });
	
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
			['Country', 'Day Visited'],
			<?php
				$country = $this->statistics_model->all_visited_countries(date('-Y'));
				
				for($i=0;$i<count($country);$i++){
			?>
					['<?=$country[$i];?>', <?=$this->statistics_model->visited_countries_day_visited(date('-Y'),$country[$i]);?>],
			<?php
				}
			?>
			
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
	}
</script>


