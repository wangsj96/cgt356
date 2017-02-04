<?php

session_start();

include("includes/openDbConn.php");

$username = $_POST["login"];
$password = md5($_POST["passwd"]);

if(($username == "") || ($password == "")) {
	$_SESSION["errorMessage"] = "* You must enter a value for all boxes.";
	header("Location:{$_SERVER['HTTP_REFERER']}");
	exit;	
}

//Create the SQL query
$sql = "SELECT Passwd FROM user WHERE Login = '".$username."'";

//echo $sql;
//execute the SQL query and store the result of the execution into $result
$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);

//check whether the username is registered
if($num_results == 0){
	$_SESSION["errorMessage"] = "* Please check username and password entered";
	header("Location:{$_SERVER['HTTP_REFERER']}");
	exit;	
}
else{
	$row = mysql_fetch_array($result);

	//check password whether is correct
	if($password != $row["Passwd"]){
		//not correct
		$_SESSION["errorMessage"] = "* Please check username and password entered";
		header("Location:{$_SERVER['HTTP_REFERER']}");
		exit;
	}
	else{
		//correct
        $_SESSION["login_user"] = $username;
		$sql = "SELECT FirstName,type from user WHERE Login = '".$_SESSION['login_user']."'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$_SESSION['login_firstname'] = $row['FirstName'];
		$_SESSION['logged'] = true;
		$_SESSION["user_type"] = $row["type"];
		$_SESSION["errorMessage"] = "";
		$_SESSION['success'] = "You have successfull logged in!";
		header("Location:{$_SERVER['HTTP_REFERER']}");	
	}
}

include("includes/closeDbConn.php");
?>