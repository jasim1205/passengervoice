<?php 
	session_start();
	if(isset($_GET['myssn'])){
		$_SESSION['myssn']=$_GET['myssn'];
	}
	if(isset($_SESSION['myssn'])){
		echo $_SESSION['myssn'];
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$filename=$_FILES['image']['name'];
		$filetmp=$_FILES['image']['tmp_name'];
		move_uploaded_file($filetmp,$filename);
		echo "<h2>Uploaded Succesfully!</h2>";
	}
?>