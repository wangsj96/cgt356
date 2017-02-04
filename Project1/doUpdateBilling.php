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
	
	if(empty($Name) || empty($Address1) || empty($City) || empty($State) || empty($Zip) || empty($cardType) || empty($cardNum) || empty($expDate)) {
		$_SESSION['errorMessage2'] = '* You must enter a value for all boxes';
		header("Location:billing.php");
		exit;
	}
	if(!is_numeric($cardNum) || strlen($cardNum) != 16) {
		$_SESSION['errorMessage2'] = "* Your card number must be 16 digits";
		header("Location:billing.php");
		exit;
	}
	
	$sql = "UPDATE billinginfo SET BillName='".$Name."', BillAddress1='".$Address1."', BillAddress2 = '".$Address2."', BillCity = '".$City."', BillState = '".$State."', BillZip = '".$Zip."', CardType = '".$cardType."', CardNumber = '".$cardNum."', ExpDate = '".$expDate."' WHERE BillingID=".$_SESSION["updateBillID"];
	
	//echo $sql;
	
	$result = mysql_query($sql);
	
	include("includes/closeDbConn.php");
	
	$_SESSION['success'] = "You have updated your billing address successfully!";
	
	$_SESSION['updateBillID'] = '';
	
	$_SESSION['errorMessage2'] = '';
	
	header("Location: billing.php");
?>