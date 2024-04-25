<div class="col-md-12 col-sm-12 col-xs-12">			

	<div class="box_layout col-md-12 col-sm-12 col-xs-12">			

		<h3 class="no_padding"><i class="fa fa-users"></i> Subscribers</h3>
		
		<?php
		$message = $this->session->userdata('message');
		
		if($message){
			
		?>
		
		<div class="alert alert-success alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success !</strong> <?php echo $message;?>
		</div>
		
		<?php		
			
			$this->session->unset_userdata('message');
		}
		?>		
		
	</div>
	
	<div class="no_padding right_padding col-md-5 col-sm-5 col-xs-12">				
		
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Send Newsletters</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			
				<form method="POST" action="<?php echo base_url();?>send-newsletters">
				 
					<div class="form-group form-group-sm">
						<label for="name">Name:</label>
						<input type="text" class="form-control" value="" name="name" placeholder="Name" id="name" required>
					</div>					
					
					<div class="form-group form-group-sm">
						<label for="email">E-mail:</label>
						<input type="email" class="form-control" value="" name="email" placeholder="E-mail" id="email" required>
					</div>	
					
					<div class="form-group form-group-sm">
						<label for="subject">Subject:</label>
						<input type="text" class="form-control" value="" name="subject" placeholder="Subject" id="subject" required>
					</div>
					
					<div class="form-group form-group-sm">
					
						<label for="Message">Message:</label>
						
						<textarea name="message" placeholder="Message" rows="6" class="form-control" id="Message"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Send Newsletter</button>
					
				</form> 
				
			</div>
		</div>
		
	</div>
	<div class="no_padding col-md-7 col-sm-7 col-xs-12">			
		<div class="panel panel-mos">
			<div class="panel-heading">
				<h3 class="panel-title">Subscribers List</h3>
				<span class="pull-right clickable"><i class="fa fa-plus"></i></span>
			</div>
			<div class="panel-body">
			<?php if(count($all_subscribers)){?>
				<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Email</th>
							<th>Date</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
						foreach($all_subscribers as $all_subscribers){
							
							
						?>
					
						<tr>
							<td><?php echo $all_subscribers->subscribe_id;?></td>
							<td><?php echo $all_subscribers->subscribe_email;?></td>
							<td><?php echo $all_subscribers->subscribe_date;?></td>
							<td><?php echo $all_subscribers->subscribe_time;?></td>
							
						</tr>
						
					<?php }?>
						
					</tbody>
				</table>
				</div>
				<div class="text-right no_padding col-md-12 col-sm-12 col-xs-12">
					<p class="text-right no_padding"><?= $textline2;?></p>
					
					<?php if($paginationCtrls != ''){?>
					<ul class="pagination">
						<?= $paginationCtrls;?>
					</ul>
					<?php }?>
				</div>
			<?php }else {
				echo "<h4>Nothing Found.</h4>";
			}?>	
			</div>
		</div>

	</div>
	
</div>


