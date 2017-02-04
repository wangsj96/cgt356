<?php

session_start();

include("includes/openDbConn.php");

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
	$_SESSION["errorMessage"] = "* Your passwords do not match.";
	header("Location:account.php");
	exit;	
}

if(($Passwd == "") || ($ConfirmPasswd == "") || ($FirstName == "") || ($LastName == "") || ($Email == "")) {
	$_SESSION["errorMessage"] = "* You must enter a value for all boxes.";
	header("Location:account.php");
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
/*if($num_results > 0){
	//exist
	$_SESSION["errorMessage"] = "* The Login id already exists.";
	header("Location:account.php");
	exit;
}*/

$sql = "UPDATE p1user SET FirstName = '".$FirstName."', LastName = '".$LastName."', Passwd = '".$Passwd."', Email = '".$Email."', NewsLetter = '".$Newsletter."' WHERE Login = '".$_SESSION['login_user']."'";

$_SESSION["errorMessage"] = "";

$result      = mysql_query($sql);

$_SESSION["success"] = "You have updated your account information successfully!";

header("Location:account.php");

include("includes/closeDbConn.php");
?>