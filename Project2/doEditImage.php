<?php
	session_start();
	include("includes/openDbConn.php");
	
	$description = stripslashes($_POST["description"]);
	$id = $_POST["name"];
	
	//echo $id;
	//exit;
	
	$sql = "UPDATE dogImage SET imgDesc = '".$description."' WHERE imageID='".$id."'";
	
	//echo $sql;
	//exit;
	$result = mysql_query($sql);
	
	include("includes/closeDbConn.php");
	
	$_SESSION['badFileType'] = "You have updated your image description successfully!";
	
	header("Location: editImage.php");
?>