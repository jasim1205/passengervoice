<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
    <meta name="author" content="Muktodhara Technology Limited">
    <meta name="description" content="Mukto News Management System">
	<meta name="keywords" content="Muktodhara Technology Limited">
	
    <link rel='icon' href='<?php echo base_url();?>files/backend/img/icon.png'>	
	
    <title>Login</title>
    
	<!-- ICON CDN LINK (Please Always Use The Updated CDN) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	
	<!-- Fonts CDN LINK -->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet"> 
	
	<!-- JQuery UI CDN CSS -->
	
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	
	<!-- Bootstrap CSS CDN LINK (Please Always Use The Updated CDN) -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- JQuery CDN LINK (Please Always Use The Updated CDN) -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<!-- Bootstrap JS CDN LINK (Please Always Use The Updated CDN) -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- JQuery UI JS CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	
	<!-- CUSTOM CSS LINK -->
	<link rel="stylesheet" href="<?php echo base_url();?>files/backend/css/style.css">	
	
	
</head>

<body>

<div class="container">
	<div class="row">
		
		<div class="col-md-12 col-sm-12 col-xs-12 no_padding">
			
			<div class="login_form">
			
				<img src="<?php echo base_url().$get_meta->site_logo;?>" alt="<?php echo $get_meta->site_name;?>">
				<hr>
				<form method="POST" action="<?php echo base_url();?>user-login">	
					
					<?php
					$error = $this->session->userdata('error');
					
					if($error)
					{
						echo "<p style='color:red;'>".$error."</p>";
						
						$this->session->unset_userdata('error');
					}
					?>
					
					<div class="form-group form-group-sm">
						<br>
						<label for="email">Email address:</label>
						<input type="email" class="form-control" value="" name="user_email" placeholder="Email" id="email" required>
					</div>
					
					<div class="form-group form-group-sm">
						<label for="pwd">Password:</label>
						<input type="password" value="" name="user_password" placeholder="Password"  class="form-control" id="pwd"  required>
					</div>
					
					<div class="form-group form-group-sm">
						<br>
						<button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
						<br>
					</div>
					<hr>
					<p>Developed By <a href="http://muktodharaltd.com/">Muktodhara Technology Limited</a></p>
					
				</form>
				
			</div>
			
		</div>
		
	</div>
</div>

</body>



	
</html>