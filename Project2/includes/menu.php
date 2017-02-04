<!----<p style="text-align:center">
    <a href="download.php">Download Pictures</a> | 
    <a href="login.php">Login and Register</a> | 
    <a href="uploadResize.php">Upload Resize</a> | 
    <a href="viewImage.php">View Image</a>
    <a href="logout.php">Logout</a>
</p>--->
<?php
	
	if(empty($_SESSION["logged"]))
	$_SESSION["logged"] = "";
	if(empty($_SESSION["user_type"]))
	$_SESSION["user_type"] = "";
		
	if($_SESSION['user_type'] == "CategoryAdmin" && $_SESSION['logged']){
?>
    <p style="text-align:center">
    	<a href="index.php">Home page</a> |
        <a href="download.php">Download Pictures</a> |  
        <a href="uploadResize.php">Upload Image</a> | 
        <a href="viewImage.php">Edit and Delete Images</a> |
        <a href="logout.php">Logout</a> |
        <a href="readme.php">Read Me</a> |
        <strong>Welcome back, <?php echo($_SESSION["login_firstname"])?></strong>
    </p>
<?php
	} else if($_SESSION['user_type'] == "SuperAdmin" && $_SESSION['logged']){
?>		
		<p style="text-align:center">
    	<a href="index.php">Home page</a> |
        <a href="download.php">Download Pictures</a> |  
        <a href="uploadResize.php">Upload Image</a> | 
        <a href="viewImage.php">Edit and Delete Images</a> |
        <a href="admin.php">Admin Control</a> |
        <a href="logout.php">Logout</a> |
        <a href="readme.php">Read Me</a> |
        <strong>Welcome back, <?php echo($_SESSION["login_firstname"])?></strong>
    </p>
<?php	
	}
	else{
?>
    <p style="text-align:center">
        <a href="index.php">Home page</a> |
        <a href="download.php">Download Pictures</a> | 
        <a href="viewImage.php">View Images</a> |
        <a id="login" href="#">Login</a> | 
        <a href="readme.php">Read Me</a> 
    </p>
<?php
	}
?>
<style type="text/css">
	p{
		font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;	
	}
	a{
		text-decoration:none;
		font-size:18px;
		color:#7D4EC2;
	}
</style>