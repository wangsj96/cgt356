<?php

session_start();

$_SESSION["name"] = "";
$_SESSION["address"] = "";
$_SESSION["city"] = "";
$_SESSION["state"] = "";
$_SESSION["zip"] = "";
$_SESSION["country"] = "";
$_SESSION["phone"] = "";
$_SESSION["email"] = "";
$_SESSION["comments"] = "";
$_SESSION["Sname"] = "";
$_SESSION["Saddress"] = "";
$_SESSION["Scity"] = "";
$_SESSION["Sstate"] = "";
$_SESSION["Szip"] = "";
$_SESSION["Scountry"] = "";
$_SESSION["errorMessage"] = "";

session_unset();
session_destroy();


////////////////////////////
////////start Page
///////////////////////////
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Lab 04 - Finished Update Page</title>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
</head>

<body>

	<h1 style="font-size:14pt; text-indent:360px;">Lab 04 - Finished Update Page</h1>
	<p>Your information has been successfully recorded in our database.</p>
</body>
</html>