<?php
	include("../auth.php");
	include('../../../connect/db.php');
	
	$Log_Id=$_POST['Log_Id'];
	
	$aadharno=$_POST["aadharno"];
	$sex=$_POST["sex"];
	$age=$_POST["age"];
	$dob=$_POST["dob"];
	$email=$_POST["email"];
	$password=$_POST["password"];

	$cntno=$_POST["cntno"];
	$email=$_POST["email"];
	$addr=$_POST["addr"];
	
	$state=$_POST["state"];
	$dstrct=$_POST["dstrct"];
	$pncth=$_POST["pncth"];
	$wrd=$_POST["wrd"];
	
	$pcode=$_POST["pcode"];
	
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photo/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	
	if($photo=="")
	{
		$sql = "update people set aadharno='$aadharno',sex='$sex',age='$age',dob='$dob',email='$email',cntno='$cntno',email='$email',addr='$addr',state='$state',dstrct='$dstrct',pcode='$pcode',pncth='$pncth',wrd='$wrd',password='$password' where Log_Id='$Log_Id'";
		$q1 = $db->prepare($sql);
		$q1->execute();	
	}
	else
	{
		$sql = "update people set  aadharno='$aadharno',sex='$sex',age='$age',dob='$dob',email='$email',photo='$photo',cntno='$cntno',email='$email',addr='$addr',state='$state',dstrct='$dstrct',pcode='$pcode',pncth='$pncth',wrd='$wrd',password='$password' where Log_Id='$Log_Id'";
		$q1 = $db->prepare($sql);
		$q1->execute();		
	}

	header("location:../index.php");
?>
