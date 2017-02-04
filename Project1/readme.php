<?php 

	include("includes/session.php");
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
<style type="text/css">
#content{
	width:900px;
	margin:0 auto;	
}
div#success{
	background:#22D686;
	opacity:0.7;
	padding:20px 0 20px 30px;
	margin-top:20px;
	border:none;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	-khtml-border-radius:10px;
	border-radius:10px;
	font-style:italic;
	font-weight:bold;
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
	width:780px;
	cursor:pointer;
}
div#content h1{
	margin-top:40px;
	margin-bottom:30px;
	margin-left:30px;
	color:white;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size:30px;
	text-shadow:2px 2px 0 black;
}
div#content span{
	margin-bottom:50px;
	margin-left:30px;
	font-family:Arial, Helvetica, sans-serif;
	font-style:italic;
}
div#about{
	width:700px;
	margin-top:40px;
	margin-bottom:50px;
	margin-left:30px;
	color:white;
	font-family:Arial, Helvetica, sans-serif;
	border:solid black 1px;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	-khtml-border-radius:10px;
	border-radius:10px;
	padding:15px 50px 15px 50px;
	background-color:#1E6678;
}
div#about h3{
	font-size:20px;
	text-shadow:2px 2px 0 black;
}
ul li{
	margin-bottom:5px;	
}
</style>
<title>Read Me</title>
</head>

<body>
<?php include("includes/menu.php");?>
    <div id="content">
	
    <?php
    	if(!empty($_SESSION["success"])){
		?>
		<div id="success"><?php echo($_SESSION["success"]) ?></div>
        <?php
        }
		?>
    <h1>CGT 356 - Project 1</h1>
    <div id="about">
    	<ul>
        	<h3>Summary</h3>
            <li>Name: Sijin Wang</li>
            <li>Course: CGT 356</li>
            <li>Basically achieve all functionalities mentioned in specification</li>
            <li>There may be little small "quirks" in the site but they do not influence main operations in the site</li>
            <li>JQuery used on show and hide the success information</li>
            <li>Changed BillingID and ShippingID in tables to auto-increment and integer type</li>
            <li>Fieldset used on adding shipping and billing information instead of simple div tag</li>
            <li>isset() is used to check whether there is a login user or not. Based on that content of the site will change dynamically</li>
            <h3>Possible improvement</h3> 
            <li>Using more JQuery to make the site more aesthetic and attractive </li>
            <li>Coding can be more organized and more notes should be included</li>
            <li>The whole color style of the site can be more aesthetic</li>
            <li><h3>Thank you!</h3></li>
        </ul>
    </div>

<script type="text/javascript">
		$(document).ready(function() {
            $("#success").fadeIn(500);
			$("div#success").click(function() {
                $("div#success").fadeOut(500);
            });
        });
		
	</script>
    </div>
    <?php 
		$_SESSION['success'] = '';
	?>
</body>
</html>
