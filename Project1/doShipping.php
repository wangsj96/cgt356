<?php
 	session_start();

	include("includes/openDbConn.php");
	
	$Name = stripslashes($_POST["name"]);
	$Address1 = stripslashes($_POST["address1"]);
	$Address2 = stripslashes($_POST["address2"]);
	$City = stripslashes($_POST["city"]);
	$State = stripslashes($_POST["state"]);
	$Zip = stripslashes($_POST["zip"]);
	
	
	if( ($Name == "") || ($Address1 == "") || ($City == "") || ($State == "") || ($Zip == "")) {
		$_SESSION["errorMessage"] = "* You must enter a value for all boxes";
		header("Location:shipping.php");
		exit;
	}
	else {
		$_SESSION["errorMessage"] = "";	
	}
	
	include("includes/openDbConn.php");
	
	$sql = "INSERT INTO shippingaddress (Login) SELECT Login FROM p1user WHERE p1user.Login = '".$_SESSION['login_user']."'";
	
	$result      = mysql_query($sql);
	
	$sql = "UPDATE shippingaddress SET Name = '".$Name."', Address1 = '".$Address1."', Address2 = '".$Address2."', City = '".$City."', State = '".$State."', Zip = '".$Zip."' WHERE Login = '".$_SESSION['login_user']."' ORDER BY AddressID DESC LIMIT 1";
	
	
	$result      = mysql_query($sql);
	
	$_SESSION["success"] = "You added a new address sucessfully!";
	
	include("includes/closeDbConn.php");
	header("Location:shipping.php");
	exit;
	
?>