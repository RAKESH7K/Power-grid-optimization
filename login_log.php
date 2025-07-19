<?php
	//Start session
	session_start();
	
	include('connect/db.php');
		
	//Sanitize the POST values
	$username = $_POST['username'];
	$password = $_POST['password'];
	//Create query
	$qrya= $db->prepare("SELECT * FROM admin WHERE username='$username' AND password='$password' AND utype='Administrator'");
	$qrya->execute();
	$counta = $qrya->rowcount();
	
	
		
	//Check whether the query was successful or not
	$qrypeople= $db->prepare("SELECT * FROM people WHERE username='$username' AND password='$password' AND utype='People'");
	$qrypeople->execute();
	$countpeople = $qrypeople->rowcount();
		
	//Check whether the query was successful or not
	if($counta > 0) {
		//Login Successful
		session_regenerate_id();
		$rowa = $qrya->fetch();
		$_SESSION['SESS_ADMIN_ID'] = $rowa['Log_Id'];
		session_write_close();
		header("location: light/admin/index.php");
		exit();
	}
	else if($countpeople > 0) {
		//Login Successful
		session_regenerate_id();
		$rowpeople = $qrypeople->fetch();
		$_SESSION['SESS_PEOPLE_ID'] = $rowpeople['Log_Id'];
		session_write_close();
		header("location: light/user/index.php");
		exit();
	}
	else 
	{
		//Login failed
		echo "<script>alert('Check Username And Password'); window.location='login.php'</script>";
		exit();
	}
?>
