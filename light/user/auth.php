<?php
session_start();
if(!isset($_SESSION['SESS_PEOPLE_ID']) || (trim($_SESSION['SESS_PEOPLE_ID']) == '')) {
	header("location:../../");
	exit();
}
?>
