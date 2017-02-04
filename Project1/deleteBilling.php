<?php

	session_start();
	
	$id = $_GET["id"];
	
	include("includes/openDbConn.php");
	
	$sql = "DELETE FROM billinginfo WHERE BillingID = ".$id;
	
	$result = mysql_query($sql);
	
	$_SESSION['success'] = 'You have deleted a billing address successfully!';
	
	include("includes/closeDbConn.php");
	
	header("Location: billing.php");
?>