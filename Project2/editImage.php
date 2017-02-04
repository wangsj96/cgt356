<?php
	session_start();
	
	include("includes/openDbConn.php");
	
	if(empty($_SESSION["badFileType"]))
		$_SESSION["badFileType"] = "";
	
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Upload Image</title>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <style type="text/css">
    	#content{
			width:80%;
			margin:30px auto;	
		}
		#img{
			height:360px;
			width:auto;	
			float:left;
		}
		h1{
			font-family:"Courier New", Courier, monospace;
			text-align:center;	
		}
		#form{
			float:right;	
			width:auto;
			margin-right:150px;
		}
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left;  color:#6666ff}
		ul li input, ul li textarea, ul li select{ float:right; margin-right:10px; border:1px solid #ccc; padding:2px; 
														font-family: Georgia, Times New Roman, Times, serif; width:60%;
														margin-bottom:15px;}
		ul li span{ color: red;}
		#submitBtn{ display:block; margin:0 auto}
		div#errorMsg {color:#ff0000; font-weight:bold; font-size:12pt; margin:30px auto;
			text-align:center}
    </style>
</head>

<body>
	
    <h1>Update Image Information</h1>
    <?php
		include("includes/menu.php"); 
		
		//echo $_SERVER['HTTP_REFERER'];
		if(!strpos($_SERVER['HTTP_REFERER'], "?id="))
		{	
			$id = $_GET["id"];
			$_SESSION["id"] = $id;
		}
	?>
    <div id="content">
	
	<div id="img">
    	<img src="mid/mid_<?php echo($_SESSION["id"])?>" />
    </div>
    <div id="form">
    	<form id="form0" method="post" action="doEditImage.php">
        	<ul>
            <li> <label title="name" for="name">File name: </label> <input type="text" name="name" id="name" size="20" value="<?php echo($_SESSION["id"])?>" readonly/></li>
            <li><label title="description" for="description">Description: <span>*</span></label> <textarea name="description" id="description" rows="4" cols="20"></textarea></li>
            </ul>
            <input type="submit" id="submitBtn" name="submitBtn" value="Update Info" />
        </form>
        <div id="errorMsg"><?php if(!empty($_SESSION["badFileType"])){echo($_SESSION["badFileType"]);} ?></div>
    </div>
    </div>
    <?php
		$_SESSION["badFileType"] = "";
		include("includes/closeDbConn.php");
	?>
</body>
</html>