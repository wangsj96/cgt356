<?php
	session_start();
	
	include("includes/openDbConn.php");
	
	$_SESSION["billingID"] = $_GET["id"];
	
	header("Location:billing.php");
	
	include("includes/closeDbConn.php");
?>