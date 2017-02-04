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
	text-shadow:2px 2px 0 black;
}
</style>
<title>Welcome to G!</title>
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
    <h1>Welcome to G!</h1>
	<span>We are the world's leading Widgets 'n' Thingies Specialists!</span>
    <div id="about">
    	<h3>About US</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer condimentum lectus et mi mattis, nec ultrices felis convallis. In ex leo, iaculis eget dolor id, convallis commodo magna. Cras pellentesque, diam nec egestas consequat, sapien ante ornare augue, eu rhoncus ipsum arcu ac neque. Cras fermentum efficitur urna consequat lobortis. Ut et consequat odio. In porttitor, lectus id pulvinar ultricies, quam dui faucibus libero, et cursus erat felis sit amet eros. Pellentesque nulla nibh, dignissim sed metus at, tincidunt ultrices neque. Aliquam erat volutpat. Aenean tempus lorem purus, et iaculis sapien tempus nec. Proin egestas risus ut sagittis fringilla. Ut sagittis ex nibh, ut dapibus justo molestie semper. Etiam fringilla viverra leo a faucibus. Morbi est lorem, fermentum vitae bibendum non, tristique eu arcu. Fusce volutpat luctus iaculis. Aenean at augue nec felis semper egestas id eu odio. Vivamus mollis lorem non nunc scelerisque imperdiet. Quisque mollis odio iaculis, semper lectus quis, vestibulum sapien. Donec nisl metus, lacinia vitae sem ut, iaculis ultricies urna. Aenean feugiat ornare lorem, eget scelerisque dolor ultricies nec.</p>
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
