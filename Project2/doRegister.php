<?php

session_start();

include("includes/openDbConn.php");

$Login = stripslashes($_POST["login"]);
$Passwd = md5($_POST["passwd"]);
$ConfirmPasswd = md5($_POST["confirmpasswd"]);
$FirstName = stripslashes($_POST["firstname"]);
$LastName = stripslashes($_POST["lastname"]);
$Email = stripslashes($_POST["email"]);
$user = $_POST["type"];


if($Passwd != $ConfirmPasswd) {
	$_SESSION["badFileType"] = "* Your passwords do not match.";
	header("Location:admin.php");
	exit;	
}

if(($Login == "") || ($Passwd == "") || ($ConfirmPasswd == "") || ($FirstName == "") || ($LastName == "") || ($Email == "")) {
	$_SESSION["badFileType"] = "* You must enter a value for all boxes.";
	header("Location:admin.php");
	exit;		
}


//Create the SQL query
$sql = "SELECT Passwd FROM user WHERE Login = '".$Login."'";

//echo $sql;
//execute the SQL query and store the result of the execution into $result
$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);

//check whether the username is already exist
if($num_results > 0){
	//exist
	$_SESSION["badFileType"] = "* The Login id already exists.";
	header("Location:admin.php");
	exit;
}

$sql = "INSERT INTO user(Login, FirstName, LastName, Passwd, Email, type) VALUES('".$Login."', '".$FirstName."', '".$LastName."', '".$Passwd."', '".$Email."', '".$user."')";
//echo $sql;
//exit;

$_SESSION["badFileType"] = "";

$_SESSION['logged'] = true;
$_SESSION['login_user'] = $Login;
$_SESSION['login_firstname'] = $FirstName;
$_SESSION["user_type"] = "User";
$_SESSION['success'] = "You have successfully logged in!";

$result      = mysql_query($sql);

header("Location:admin.php");

include("includes/closeDbConn.php");
?>