<?php

	session_start();
	
	$id = $_GET["id"];
	
	include("includes/openDbConn.php");
	
	$sql = "DELETE FROM shippingaddress WHERE AddressID = ".$id;
	
	$result = mysql_query($sql);
	
	$_SESSION['success'] = 'You have deleted a shipping address successfully!';
	
	include("includes/closeDbConn.php");
	
	header("Location: shipping.php");
?>