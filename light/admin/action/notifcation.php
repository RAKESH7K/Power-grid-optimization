<?php
	include("../../../connect/db.php");

	$name=$_POST["name"];
	$subjct=$_POST["subjct"];
	$descp=$_POST["descp"];
	$date=$_POST["date"];
	$tme=$_POST["tme"];


	$sql = "insert into notification(name,subjct,descp,date,tme)values('$name','$subjct','$descp','$date','$tme')";
	$q1 = $db->prepare($sql);
	$q1->execute();	

	header("location:../notification_view.php");
?>
