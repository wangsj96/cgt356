<?php
	session_start();
	
	include("includes/openDbConn.php");
	
	$_SESSION["shippingID"] = $_GET["id"];
	
	header("Location:shipping.php");
	
	include("includes/closeDbConn.php");
?>