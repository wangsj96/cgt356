<?php 

	
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
    <h1>CGT 356 - Project 2</h1>
    <div id="about">
    	<ul>
        	<h3>Summary</h3>
            <li>Name: Sijin Wang</li>
            <li>Course: CGT 356</li>
            <li>Used LightBox and Jquery Cycle in displaying images</li>
            <li>Thanks!</li>
        </ul>
    </div>

    </div>
    <?php 
		$_SESSION['success'] = '';
	?>
</body>
</html>
