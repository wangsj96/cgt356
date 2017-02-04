<?php
	session_start();
	include("includes/openDbConn.php");
	
	$ShipperID = $_POST["shipperID"];
	$CompanyName = addslashes($_POST["companyName"]);
	$Phone = addslashes($_POST["phone"]);
	
	if(empty($ShipperID)) {
		header("Location:select.php");
	}
	
	$sql = "UPDATE ShippersLab5 SET CompanyName='".$CompanyName."', Phone='".$Phone."' WHERE ShipperID=".$ShipperID;
	
	
	$result = mysql_query($sql);
	
	include("includes/closeDbConn.php");
	
	header("Location: select.php");
?>