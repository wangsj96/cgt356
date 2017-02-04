<?php

	session_start();
	
	include("includes/openDbConn.php");
	
	$sql = "DELETE FROM ShippersLab5 WHERE ShipperID = 2";
	
	$result = mysql_query($sql);
	
	include("includes/closeDbConn.php");
	
	header("Location: select.php");
?>