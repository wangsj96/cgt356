<?php

	session_start();
	
	$userID = $_POST["UserID"];
	$psw1 = md5($_POST["Passwd"]);
	$psw2 = md5($_POST["PasswdConfirm"]);
	$pwdMatch = false;
	
	if(empty($_POST["UserID"]) || empty($_POST["Passwd"]) || empty($_POST["PasswdConfirm"]) || empty($_POST["AcctType"]) || empty($_POST["name"]) || empty($_POST["address"]) || empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["zip"]) || empty($_POST["phone"]) || empty($_POST["email"])) {
		$_SESSION["errorMessage"] = "Please fill out all required fields.";
		header("Location:newAccount.php");
		exit;
	}
	
	include("includes/openDbConn.php");
	
	if($psw1 == $psw2) {
		
		$sql = "SELECT UserID FROM users_356lab07 WHERE UserID='".$userID."'";
		$result = mysql_query($sql);
		
		if(empty($result)) {
			$num_record = 0;
		}
		else {
			$num_record = mysql_num_rows($result);
		}
		
		if($num_record == 0) {
			
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CFB);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
			$_SESSION["iv"] = $iv;
			$encryptedEmail = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, "go356phpEncryption", $_POST["email"], MCRYPT_MODE_CFB, $_SESSION["iv"]);
			
			$sql = "INSERT INTO users_356lab07(UserID, Password, AcctType, Name, Address, City, State, Zip, Phone, Email) ";
			$sql .= "VALUES('".$userID."', '".$psw1."', '".$_POST["AcctType"]."', '".$_POST["name"]."', '".$_POST["address"]."', '".$_POST["city"]."', '".$_POST["state"]."', '".$_POST["zip"]."', '".$_POST["phone"]."', '".$encryptedEmail."')";
			
			//echo ($sql);
			
			$result = mysql_query($sql);
			
			$_SESSION['login'] = $userID;
			
			$_SESSION["errorMessage"] = "";
			
			$pwdMatch = true;
		}
		else {
			$_SESSION["errorMessage"] = "User is already existed in database.";
			$pwdMatch = false;	
		}
	}
	else {
		$_SESSION["errorMessage"] = "Please enter the same passwords.";
		$pwdMatch = false;
	}
	
	include("includes/closeDbConn.php");
	
	if($pwdMatch == true) {
		cleanUp();
		header("Location:success.php");
		exit;
	}
	else {
		cleanUp();
		header("Location:newAccount.php");
		exit;	
	}
	function cleanUp() {
		$userID	= "";
		$psw1 = "";
		$psw2 = "";
		$sql= "";
		$result = "";
		$num_record = "";
	}
?>