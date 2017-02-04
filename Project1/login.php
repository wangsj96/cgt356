<?php 
	session_start();
	
	if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
	
	if(empty($_SESSION["errorMessage2"]))
	$_SESSION["errorMessage2"] = "";
	
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<title>Login & Register</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
<style type="text/css">
#content{
	width:900px;
	margin:0 auto;	
}
div#content h1{
	margin-top:50px;
	margin-bottom:50px;
	color:white;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size:30px;
	text-shadow:2px 2px 0 black;
}
#Login fieldset{
	width:360px;
	float:left;
	border-radius:10px;
	padding:15px;
}
#Login fieldset div{
	color:red;	
}
#Login ol li{
	background:#b9cf6a;
	background:rgba(255,255,255,0.3);
	border-color:#e3ebc3;
	border-color:rgba(255,255,255,0.6);
	border-style:solid;
	border-width:2px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	-khtml-border-radius:5px;
	border-radius:5px;
	line-height:30px;
	list-style:none;
	padding:5px 5px;
	margin-bottom:2px;
	color:white;
}
#Login ol label{
	float:left;
	font-size:16px;
	width:100px;			
}
#Login button{
	background:#333b3f;
	border:none;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	-khtml-border-radius:10px;
	border-radius:10px;
	color:white;
	display:block;
	font:10px Tahoma, Geneva, sans-serif;
	letter-spacing:1px;
	margin:auto;
	padding:7px 10px;
	text-shadow:0 1px 1px #000000;
	text-transform:uppercase;
	margin-top:25px;
}
#Login button:hover{
	background:#1e2506;
	cursor:pointer;	
}
#Login legend{
	font:20px Tahoma, Geneva, sans-serif;
	color:#FFB100;
	font-weight:bold;
	padding-bottom:10px;
}
#Register fieldset{
	width:380px;
	float:right;
	border-radius:10px;
	padding:15px;	
}
#Register fieldset span{
	color:red;	
}
#Register fieldset ol{
	list-style:none;	
}
#Register button{
	background:#333b3f;
	border:none;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	-khtml-border-radius:10px;
	border-radius:10px;
	color:white;
	display:block;
	font:10px Tahoma, Geneva, sans-serif;
	letter-spacing:1px;
	margin:auto;
	padding:7px 10px;
	text-shadow:0 1px 1px #000000;
	text-transform:uppercase;
	margin-top:25px;
}
#Register button:hover{
	background:#1e2506;
	cursor:pointer;	
}
#Register legend{
	font:20px Tahoma, Geneva, sans-serif;
	color:#FFB100;
	font-weight:bold;
	padding-bottom:10px;
}
#Register ol label{
	float:left;
	font-size:16px;
	width:170px;			
}
#Register ol li{
	background:#b9cf6a;
	background:rgba(255,255,255,0.3);
	border-color:#e3ebc3;
	border-color:rgba(255,255,255,0.6);
	border-style:solid;
	border-width:2px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	-khtml-border-radius:5px;
	border-radius:5px;
	line-height:30px;
	list-style:none;
	padding:5px 10px;
	margin-bottom:2px;
	color:white;	
}
fieldset div span{
	color:red;
	font-weight:bold;	
}

</style>
</head>

<body>
<?php
	include("includes/menu.php");

	include("includes/openDbConn.php");
//Create the SQL query
$sql = "SELECT Login, FirstName, LastName, Passwd, Email, Newsletter FROM p1user";

//execute the SQL query and store the result of the execution into $result
$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);

/*Loop through the results
for($i=0; $i < $num_results; $i++)
{
	//store a single record into $row 
	//$row in this example is equivalent to oRS in ASP
	$row = mysql_fetch_array($result);

	//echo out the value of the column (field) pulled from the database
	echo $row["Title"]."<br />".chr(13);
}
*/
?>
	<div id="content">
	<h1>Login or Register</h1>
    <form id="Login" method="post" action="doLogin.php">
    	<fieldset>
    		<legend>Login</legend>
        	<ol>
        		<li>
            		<label for="login">Username:</label>
                	<input id="login" name="login" type="text" maxlength="15" size="20"/>
            	</li>
            	<li>
            		<label for="passwd">Password:</label>
                	<input id="passwd" name="passwd" type="password" maxlength="60" size="20"/>
            	</li>
        	</ol>
            <div><span><?php echo $_SESSION["errorMessage"];?></span></div>
            <button type="submit">Login</button>
    	</fieldset>
    </form>
    <form id="Register" method="post" action="doRegister.php">
    <fieldset>
    	<legend>Register</legend>
        <ol>
        		<li>
            		<label for="login"><span>* </span>Username:</label>
                	<input id="login" name="login" type="text" maxlength="15" size="20"/>
            	</li>
            	<li>
            		<label for="passwd"><span>* </span>Password:</label>
                	<input id="passwd" name="passwd" type="password" maxlength="60" size="20"/>
            	</li>
                <li>
            		<label for="confirmpasswd"><span>* </span>Confirm Password:</label>
                	<input id="confirmpasswd" name="confirmpasswd" type="password" maxlength="60" size="20"/>
            	</li>
                <li>
            		<label for="firstname"><span>* </span>First Name:</label>
                	<input id="firstname" name="firstname" type="text" maxlength="25" size="20"/>
            	</li>
                <li>
            		<label for="lastname"><span>* </span>Last Name:</label>
                	<input id="lastname" name="lastname" type="text" maxlength="60" size="20"/>
            	</li>
                <li>
            		<label for="email"><span>* </span>Email:</label>
                	<input id="email" name="email" type="text" maxlength="40" size="20"/>
            	</li>
                <li>
            		<label for="newsletter"><span>* </span>Newsletter:</label>
                	<input id="newsletter" name="newsletter" type="checkbox" />
            	</li>
        	</ol>
            <div><span><?php echo $_SESSION["errorMessage2"];?></span></div>
            <button type="submit">Register</button>
    </fieldset>
    </form>
    </div>
    <?php
	//clear the error message
		$_SESSION["errorMessage"] = "";
		$_SESSION["errorMessage2"]= "";
		include("includes/closeDbConn.php");
	?>
    <script type="text/javascript">
		document.getElementById("login").focus();
	</script>
    
</body>
</html>
