<?php
	session_start();
	
	include("includes/openDbConn.php");
	
	if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
	
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Love 4 dogs</title>
    <script type="text/javascript" src="js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <style type="text/css">
    	h1{
			text-align:center;
			font-family:"Courier New", Courier, monospace;
			font-size:72px;
		}
		div#login{
			width:400px;
			height:450px;
			background-color:rgba(158,158,158,0.3);
			-moz-border-radius:10px;
			-webkit-border-radius:10px;
			-khtml-border-radius:10px;
			border-radius:10px;
    		padding: 10px;
			box-shadow: 1px 2px 5px 0 #000000;
			float:right;
			margin-right:30%;
			display:none;
			z-index:1000;
		}
		#Login fieldset{
			width:300px;
			border-radius:10px;
			padding:15px;
			background-color:#FFEEFF;
			height: auto;
			margin:55px auto;
		}
		#Login fieldset div{
			color:red;	
		}
		#Login ol li{
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
			font:30px Tahoma, Geneva, sans-serif;
			font-weight:bold;
			padding-bottom:10px;
			color:#84D1D1;
			text-shadow:0 1px 1px #000000;
		}
		input{
			background-color:white;	
		}
		div#cycle{
			margin:0 auto;
			margin-top:50px;
			width:800px;
			height:550px;
			border:1px solid black;	
			background-color:#F0F0F0;
			border:1px solid #dfdfdf;
			box-shadow: 1px 1px 1px 1px #888888;
			border-radius:10px;
			-moz-border-radius:10px;
			-webkit-border-radius:10px;
			-khtml-border-radius:10px;
			position:absolute;
			left:29%;
			z-index:-1;
		}
		#cycle img{
			width:780px;
			height:530px;
			position: absolute;
			margin-top:10px;
			margin-left:10px;	
		}
    </style>
</head>

<body>

	<h1>Welcome to Love 4 Dogs!</h1>
    
    <?php
		include("includes/menu.php");
	?>
	<div id="login" <?php if(!empty($_SESSION['errorMessage'])) echo("style='display:block; margin-right:100px;'")?>>
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
    </div>
    
    <div id="cycle">
    	<img src="images/cycle1.jpg" />
        <img src="images/cycle2.jpg" />
        <img src="images/cycle3.jpg" />
        <img src="images/cycle4.jpg" />
        <img src="images/cycle5.jpg" />
        <img src="images/cycle6.jpg" />
    </div>
    
    <script type="text/javascript">
		$(document).ready(function(e) {
			$("a#login").click(function(e) {
				e.preventDefault();
				$("div#login").fadeIn({
					duration:1500,
					queue:false	
				}).animate({
					marginRight:100
				},1500);
			});//end of click login
			$("#cycle").cycle({
				fx: 'scrollHorz',
				//timeout: 3000,
				//next: '#next',
				//prev: '#prev',
				//before:  onBefore, 
    			//after:   onAfter,
				//pager: '#nav',
				easing: 'easeInOutCubic'
			});//end of image slide
        });//end of ready
    </script>
    <?php
	$_SESSION['errorMessage'] = "";
	?>
</body>
</html>