<?php

session_start();
if(empty($_SESSION["name"])) {
		header("Location:index.php");
		exit;
}

$_SESSION["errorMessage"] = "";

////////////////////////////
////////start Page
///////////////////////////
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Lab 04 - displayFormData Page</title>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		label span{ color:#ff0000;  }
		fieldset#billing {position:absolute; top:60px; left:20px; }
		fieldset#shipping {position:absolute; top:60px; left:460px; }
		fieldset#submit {position:absolute; top:540px; left:20px; width:840px; text-align:center; }
		fieldset input#SubmitBtn{ background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
		div#nav{width:400px; position:absolute; top:330px; left:200px;}
		div span#nav1{float: left}
		div span#nav2{float:right}
	</style>
</head>
<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 04 - displayFormData Page</h1>

<form id="form0" method="post" action="storeInfo.php"> 
    <fieldset id="billing">
        <legend>Billing Information</legend>
        <ul>
            <li> <?php echo($_SESSION["name"]); ?></li>
            <li> <?php echo($_SESSION["address"]); ?></li>
            <li> <?php echo($_SESSION["city"].", ".$_SESSION["state"].", ".$_SESSION["zip"]); ?></li>
            <li> <?php echo($_SESSION["country"]); ?></li>
            <li> <?php echo($_SESSION["phone"]); ?></li>
            <li> <?php echo($_SESSION["email"]); ?></li>
            <li> Comments: <?php echo($_SESSION["comments"]); ?></li>
        </ul>
    </fieldset>
    <fieldset id="shipping">
        <legend>Shipping Information (if different from billing)</legend>
        <ul>
            <li> <?php echo($_SESSION["Sname"]); ?></li>
            <li> <?php echo($_SESSION["Saddress"]); ?></li>
            <li> <?php echo($_SESSION["Scity"].", ".$_SESSION["Sstate"].", ".$_SESSION["Szip"]); ?></li>
            <li> <?php echo($_SESSION["Scountry"]); ?></li>
        </ul>
    </fieldset>
</form>

<div id="nav"><span id="nav1"><a href="index.php">Continue Updating</a></span><span id="nav2"><a href="finishedUpdate.php">Finish Updating</a></span></div>

</body>
</html>
