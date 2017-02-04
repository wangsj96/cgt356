<?php

	session_start();
	
	$id = $_GET["id"];
	
	include("includes/openDbConn.php");
	
	$sql = "DELETE FROM ShippersLab5 WHERE ShipperID = ".$id;
	
	$result = mysql_query($sql);
	
	include("includes/closeDbConn.php");
	
	header("Location: select.php");
?>