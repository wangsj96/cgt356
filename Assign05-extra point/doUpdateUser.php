<?php
	session_start();
	include("includes/openDbConn.php");
	
	$userID = $_POST["userID"];
	$lastName = addslashes($_POST["LastName"]);
	$firstName = addslashes($_POST["FirstName"]);
	$title = addslashes($_POST["Title"]);
	
	if(empty($userID)) {
		header("Location:select.php");
	}
	
	$sql = "UPDATE usersLab5 SET LastName='".$lastName."', FirstName='".$firstName."', Title='".$title."' WHERE UserID=".$userID;
	
	
	$result = mysql_query($sql);
	
	include("includes/closeDbConn.php");
	
	header("Location: select.php");
?>