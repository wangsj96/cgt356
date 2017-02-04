<?php
	session_start();
	
	include("includes/openDbConn.php");
	
	$userID = $_POST["UserID"];
	
	$password = md5($_POST["Passwd"]);
	
	$sql = "SELECT UserID FROM users_356lab07 WHERE UserID = '".$userID."' AND Password = '".$password."'";
	
	$result = mysql_query($sql);
	
	if(empty($result)) {
		$num_record = 0;
	}
	else {
		$num_record = mysql_num_rows($result);
	}
	
	include("includes/closeDbConn.php");
		
	if($num_record == 1) {
		$_SESSION['login'] = $userID;
		$_SESSION['errorMessage'] = '';
		header("Location:success.php");
		cleanUp();
		exit;
	}
	else {
		$_SESSION['errorMessage'] = '* Please check UserID and Password you entered.';
		header("Location:index.php");
		cleanUp();
		exit;
	}
	
	function cleanUp() {
		$userID	= "";
		$password = "";
		$sql= "";
		$result = "";
		$num_record = "";
	}	
?>