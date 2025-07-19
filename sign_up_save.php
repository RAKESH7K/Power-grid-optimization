<?php
	include("connect/db.php");
		
	$Log_Id="CRT".rand(1000000000,1);

	$name=$_POST["name"];
	$email=$_POST["email"];
	$cntno=$_POST["cntno"];
	$sex=$_POST["sex"];
	$location=$_POST["location"];
	$about=$_POST["about"];
	
	$username=$_POST["username"];
	$password=$_POST["password"];

	$utype="People";

	$date=date("Y-m-d");
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "light/photo/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	

	$sql = "insert into people(Log_Id,name,email,cntno,sex,location,about,username,password,utype,date,photo)values('$Log_Id','$name','$email','$cntno','$sex','$location','$about','$username','$password','$utype','$date','$photo')";
	$q1 = $db->prepare($sql);
	$q1->execute();	

	header("location:index.php");
	
?>
