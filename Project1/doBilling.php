<?php
 	session_start();

	include("includes/openDbConn.php");
	
	$Name = stripslashes($_POST["name"]);
	$Address1 = stripslashes($_POST["address1"]);
	$Address2 = stripslashes($_POST["address2"]);
	$City = stripslashes($_POST["city"]);
	$State = stripslashes($_POST["state"]);
	$Zip = stripslashes($_POST["zip"]);
	$cardType = stripslashes($_POST["card"]);
	$cardNum = stripslashes($_POST["cardnum"]);
	$expDate = stripslashes($_POST["date"]);
	
	
	if( ($Name == "") || ($Address1 == "") || ($City == "") || ($State == "") || ($Zip == "") || ($cardType == "") || ($cardNum == "") || ($expDate == "")) {
		$_SESSION["errorMessage"] = "* You must enter a value for all boxes";
		header("Location:billing.php");
		exit;
	}
	if(!is_numeric($cardNum) || strlen($cardNum) != 16) {
		$_SESSION['errorMessage'] = "* Your card number must be 16 digits";
		header("Location:billing.php");
		exit;
	}
	else {
		$_SESSION["errorMessage"] = "";	
	}
	
	include("includes/openDbConn.php");
	
	
	$sql = "INSERT INTO billinginfo (Login) SELECT Login FROM p1user WHERE p1user.Login = '".$_SESSION['login_user']."'";
	
	//echo $sql;
	$result      = mysql_query($sql);
	
	
	$sql = "UPDATE billinginfo SET BillName = '".$Name."', BillAddress1 = '".$Address1."', BillAddress2 = '".$Address2."', BillCity = '".$City."', BillState = '".$State."', BillZip = '".$Zip."', CardType = '".$cardType."', CardNumber = '".$cardNum."', ExpDate = '".$expDate."' WHERE Login = '".$_SESSION['login_user']."' ORDER BY BillingID DESC LIMIT 1";
	
	//echo $sql;
	
	$result      = mysql_query($sql);
	
	$_SESSION["success"] = "You added a billing address sucessfully!";
	
	$_SESSION["errorMessage"] = "";	
	
	include("includes/closeDbConn.php");
	header("Location:billing.php");
	exit;
	
?>