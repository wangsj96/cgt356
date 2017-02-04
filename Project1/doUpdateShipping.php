<?php
	session_start();
	include("includes/openDbConn.php");
	
	$Name = stripslashes($_POST["name"]);
	$Address1 = stripslashes($_POST["address1"]);
	$Address2 = stripslashes($_POST["address2"]);
	$City = stripslashes($_POST["city"]);
	$State = stripslashes($_POST["state"]);
	$Zip = stripslashes($_POST["zip"]);
	
	if(empty($Name) || empty($Address1) || empty($City) || empty($State) || empty($Zip)) {
		$_SESSION['errorMessage2'] = '* You must enter a value for all boxes';
		header("Location:shipping.php");
		exit;
	}
	
	$sql = "UPDATE shippingaddress SET Name='".$Name."', Address1='".$Address1."', Address2 = '".$Address2."', City = '".$City."', State = '".$State."', Zip = '".$Zip."' WHERE AddressID=".$_SESSION["updateID"];
	
	//echo $sql;
	
	$result = mysql_query($sql);
	
	include("includes/closeDbConn.php");
	
	$_SESSION['success'] = "You have updated your shipping address successfully!";
	
	$_SESSION['updateID'] = '';
	
	$_SESSION['errorMessage2'] = '';
	
	header("Location: shipping.php");
?>