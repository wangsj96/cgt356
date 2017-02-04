<?php 
//Use session object
session_start();

$id = $_GET["id"];

//Check for empty session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";

include("includes/openDbConn.php");

//This file is validating as HTML5
//You need to use an HTML5 validator to check your code
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
    <title>Lab 5 - Update</title>
	<style type="text/css">
        form { width:400px; margin:0px auto;}
        ul{ list-style:none; margin-top:5px;}
        ul li { display:block; float:left; width:100%; height:1%; }
        ul li label { float:left; padding:7px; }
		ul li span { color:#0000ff; font-weight:bold;}
        ul li input { float:right; margin-right:10px; border:1px solid #000; padding:3px; width:240px;}
		input#submit {width:248px;}
		li input:focus { border:1px solid #999; }
		fieldset{ padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
    </style>
</head>

<body>
<h1 style="text-align:center">Lab 5 - Update</h1>
<?php
	include("includes/menu.php");
?>
<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>

<?php
	$sql = "SELECT UserID, LastName, FirstName, Title FROM userslab5 WHERE UserID=".$id;
	$result = mysql_query($sql);
	if(empty($result)) {
		$num_results = 0;
	}
	else {
		$num_results = mysql_num_rows($result);
		$row = mysql_fetch_array($result);	
	}
	if($num_results == 0) {
		$_SESSION["errorMessage"] = "You must first insert a User with ID".$id;
	}
?>



<form id="form0" method="post" action="doUpdateUser.php">
	<fieldset>
		<legend>Update User table</legend>
        <ul>
            <li><label title="UserID" for="userIDdis">User ID</label>
            	<input type="text" name="userIDdis" id="userIDdis" size="20" maxlength="20" value="<?php if($num_results != 0){echo trim($row["UserID"]);} ?>" disabled="disabled" />
				<input type="hidden" name="userID" id="userID" value="<?php if($num_results != 0){echo trim($row["UserID"]);} ?>"></li>
            <li><label title="LastName" for="LastName">Last Name</label><input name="LastName" id="LastName" type="text" size="20" maxlength="20" value="<?php if($num_results != 0){echo trim($row["LastName"]);} ?>" /></li>
            <li><label title="FirstName" for="FirstName">First Name</label><input name="FirstName" id="FirstName" type="text" size="20" maxlength="20" value="<?php if($num_results != 0){echo trim($row["FirstName"]);} ?>" /></li>
            <li><label title="Title" for="Title">Title</label><input name="Title" id="Title" type="text" size="20" maxlength="20" value="<?php if($num_results != 0){echo trim($row["Title"]);} ?>" /></li>
            <li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
            <li><input type="submit" value="Update Info" name="submit" id="submit" /></li>
        </ul>
	</fieldset>
</form>

<?php
//clear the error message
$_SESSION["errorMessage"] = "";
?>

<script type="text/javascript">
	document.getElementById("shipperID").focus();
</script>

</body>
</html>