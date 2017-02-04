<?php
	session_start();
	
	include("includes/openDbConn.php");
	
	if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
	
	if(empty($_SESSION["errorMessage2"]))
	$_SESSION["errorMessage2"] = "";
	
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Login and Register</title>
    <style type="text/css">
    	div#content{
			width:75%;
			margin:0 auto;	
		}
		h1{
			text-align:center;	
		}
		#Login fieldset{
			width:360px;
			float:left;
			border-radius:10px;
			padding:15px;
			margin-left:15%;
		}
		#Login fieldset div{
			color:red;	
		}
		#Login ol li{
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
			font-weight:bold;
			padding-bottom:10px;
		}
		#Register fieldset{
			width:450px;
			float:right;
			border-radius:10px;
			padding:10px;
			margin-right:13%;
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
			font-weight:bold;
			padding-bottom:10px;
		}
		#Register ol label{
			float:left;
			font-size:16px;
			width:170px;		
		}
		#Register ol li{
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
		}
    </style>
</head>

<body>
<?php
	include("includes/menu.php");
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