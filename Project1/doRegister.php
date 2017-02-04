<?php

session_start();

include("includes/openDbConn.php");

$Login = stripslashes($_POST["login"]);
$Passwd = md5($_POST["passwd"]);
$ConfirmPasswd = md5($_POST["confirmpasswd"]);
$FirstName = stripslashes($_POST["firstname"]);
$LastName = stripslashes($_POST["lastname"]);
$Email = stripslashes($_POST["email"]);
if(!empty($_POST["newsletter"]))
	$Newsletter = "Yes";
else
	$Newsletter = "No";

if($Passwd != $ConfirmPasswd) {
	$_SESSION["errorMessage2"] = "* Your passwords do not match.";
	header("Location:login.php");
	exit;	
}

if(($Login == "") || ($Passwd == "") || ($ConfirmPasswd == "") || ($FirstName == "") || ($LastName == "") || ($Email == "")) {
	$_SESSION["errorMessage2"] = "* You must enter a value for all boxes.";
	header("Location:login.php");
	exit;		
}


//Create the SQL query
$sql = "SELECT Passwd FROM p1user WHERE Login = '".$Login."'";

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
	$_SESSION["errorMessage2"] = "* The Login id already exists.";
	header("Location:login.php");
	exit;
}

$sql = "INSERT INTO p1user(Login, FirstName, LastName, Passwd, Email, NewsLetter) VALUES('".$Login."', '".$FirstName."', '".$LastName."', '".$Passwd."', '".$Email."', '".$Newsletter."')";

$_SESSION["errorMessage2"] = "";

$_SESSION['logged'] = true;
$_SESSION['login_user'] = $Login;
$_SESSION['login_firstname'] = $FirstName;
$_SESSION['success'] = "You have successfully logged in!";

$result      = mysql_query($sql);

header("Location:index.php");

include("includes/closeDbConn.php");
?>