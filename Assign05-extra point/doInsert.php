<?php
 	session_start();

	$ShipperID = $_POST["shipperID"];
	$CompanyName = addslashes($_POST["companyName"]);
	$Phone = addslashes($_POST["phone"]);
	
	if( ($ShipperID == "") || ($CompanyName == "") || ($Phone == "")) {
		$_SESSION["errorMessage"] = "You must enter a value for all boxes";
		header("Location:insert.php");
		exit;
	}
	else if(!is_numeric($ShipperID)) {
		$_SESSION["errorMessage"] = "You must enter a number for shipper ID";
		header("Location:insert.php");
		exit;
	}
	else {
		$_SESSION["errorMessage"] = "";	
	}
	
	include("includes/openDbConn.php");
	
	$sql = "SELECT ShipperID FROM shipperslab5 WHERE ShipperID =".$ShipperID;

	$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
	if(empty($result))
		$num_results = 0;
	else
		$num_results = mysql_num_rows($result);
	
	if($num_results != 0) {
		$_SESSION["errorMessage"] = "ShipperID you entered already exist";
		header("Location:insert.php");
		exit;	
	}
	else {
		$_SESSION["errorMessage"] = "";	
	}
	
	$sql = "INSERT INTO shipperslab5(ShipperID, CompanyName, Phone) VALUES(".$ShipperID.", '".$CompanyName."', '".$Phone."')";
	
	
	$result      = mysql_query($sql);
	
	include("includes/closeDbConn.php");
	header("Location:select.php");
	exit;
	
?>