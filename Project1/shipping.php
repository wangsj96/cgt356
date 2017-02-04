<?php 
	include("includes/session.php");
	
	@session_start();
	
	if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
	
	if(empty($_SESSION["errorMessage2"]))
	$_SESSION["errorMessage2"] = "";
	
	if(empty($_SESSION["shippingID"]))
	$_SESSION["shippingID"] = "";
	
	if(empty($_SESSION["success"]))
	$_SESSION["success"] = "";
	
	include("includes/openDbConn.php");
	
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<title>Shipping Information</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
<style type="text/css">
#content{
	width:900px;
	margin:0 auto;	
}
form#shipping fieldset{
	width:710px;
	border-radius:10px;
	padding:10px;
	overflow:hidden;
	margin:0 auto;
	margin-top:25px;
}
span{
	color:red;	
} 
form#shipping fieldset div{
	color:red;
	font-size:17px;
	margin-left:40px;
	font-weight:bold;
}
form#shipping ul {
	margin-top:20px;
	width:100%;
}
form#shipping ul li{
	height:40px;
	list-style:none;
	margin-bottom:2px;
	color:white;
}
form#shipping ul li label{
	float:left;
	clear:right;
	margin-top:5px;
	width:100px;
	font-size:17px;
	text-shadow: black 0.1em 0.1em 0;
}
#shipping ul li input{
	margin-right:60px;
	float:right;
	width:400px;
	margin-top:5px;	
}
form#shipping button{
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
	margin-top:15px;
}
form#shipping button:hover{
	background:#1e2506;
	cursor:pointer;	
}
form#shipping legend{
	font:20px Tahoma, Geneva, sans-serif;
	color:#FFB100;
	font-weight:bold;
	padding-bottom:5px;
}
div#content h1{
	margin-top:40px;
	margin-bottom:30px;
	color:white;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size:30px;
	text-shadow:2px 2px 0 black;
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
	display:none;
	cursor:pointer;
}
div#notallow{
	background:#22D686;
	opacity:0.7;
	padding:20px 20px 20px 20px;
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
	width:680px;
	left:100px;
	text-align:center;
	position:relative;
}
form#shipping2 fieldset{
	width:710px;
	border-radius:10px;
	padding:10px;
	overflow:hidden;
	margin:0 auto;
	margin-top:25px;
}
span{
	color:red;	
} 
form#shipping2 fieldset div{
	color:red;
	font-size:17px;
	margin-left:40px;
	font-weight:bold;
}
form#shipping2 ul {
	margin-top:20px;
	width:100%;
}
form#shipping2 ul li{
	height:40px;
	list-style:none;
	margin-bottom:2px;
	color:white;
}
form#shipping2 ul li label{
	float:left;
	clear:right;
	margin-top:5px;
	width:100px;
	font-size:17px;
	text-shadow: black 0.1em 0.1em 0;
}
#shipping2 ul li input{
	margin-right:60px;
	float:right;
	width:400px;
	margin-top:5px;	
}
form#shipping2 div#submit{
	text-align:center;
}
form#shipping2 div#submit span{
	color: white;
	margin-left:3px;
	font:14px Tahoma, Geneva, sans-serif;
	letter-spacing:1px;
}
form#shipping2 div#submit a{
	color: #FFB100;
	text-decoration:none;
}
form#shipping2 button{
	background:#333b3f;
	border:none;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	-khtml-border-radius:10px;
	border-radius:10px;
	color:white;
	font:10px Tahoma, Geneva, sans-serif;
	letter-spacing:1px;
	position:block;
	padding:7px 10px;
	text-shadow:0 1px 1px #000000;
	text-transform:uppercase;
	margin-top:15px;
}
form#shipping2 button:hover{
	background:#1e2506;
	cursor:pointer;	
}
form#shipping2 legend{
	font:20px Tahoma, Geneva, sans-serif;
	color:#FFB100;
	font-weight:bold;
	padding-bottom:5px;
}
</style>
<title>Shipping Information</title>
</head>

<body>
	<?php include("includes/menu.php");?>
    <div id="content">
	<?php
		
		if($_SESSION["logged"] == false) {
			?>
            
			<div id="notallow"><p>You are not allowed to view this page.</p></div>
    <?php
        }
		else {
	?>
	
    <?php
    	if(!empty($_SESSION["success"])){
		?>
		<div id="success"><?php echo($_SESSION["success"]) ?></div>
        <?php
        }
		?>
    <h1>Shipping Information</h1>
    <?php 
	$sql = "SELECT AddressID, Name, Address1, Address2, City, State, Zip FROM shippingaddress WHERE Login = '".$_SESSION['login_user']."'";

//execute the SQL query and store the result of the execution into $result
//in some cases, it might be helpful to replace the following line with this line:
// mysql_query($sql) or die(mysql_error());

$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);
	
if($num_results != 0) {
?>
<table style="border: 1px solid #e3ebc3;; padding:0px; margin:0px auto; border-spacing:0px;-moz-border-radius:10px; -webkit-border-radius:10px; -khtml-border-radius:10px; border-radius:10px; color:white;" title="listing of shipping">
	<thead>
    	<tr>
        	<th colspan="7" style="font-weight:bold; text-align:center; padding-bottom:10px; padding-top:10px; font:20px Georgia, 'Times New Roman', Times, serif; color:#FFB100;text-shadow:2px 2px 0 black;">Billing Information</th>
        </tr>
        <tr>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Name</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Address1</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Address2</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">City</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">State</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Zip</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Operation</th>
        </tr>
    </thead>
	<tbody>
    	<?php
			//Loop through the results
			for($i=0; $i < $num_results; $i++)
			{
			//store a single record into $row 
			//$row in this example is equivalent to oRS in ASP
				$row = mysql_fetch_array($result);
			
				//echo out the value of the column (field) pulled from the database

        ?>
        <tr>
        	<td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["Name"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["Address1"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["Address2"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["City"]) ?></td>
			<td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["State"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["Zip"]) ?></td>
            <td style="padding:10px;"><a href="updateShipping.php?id=<?php echo trim($row["AddressID"]) ?>" style="color:#FFB100; text-decoration:none;">edit</a> | <a href="deleteShipping.php?id=<?php echo trim($row["AddressID"]) ?>" style="color:#FFB100; text-decoration:none;">delete</a></td>
        </tr>
				
		<?php
				//echo $row["Phone"]."<br />".chr(13);
			}
		?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="7" style="text-align:center; font-style:italic; padding-bottom:5px;">Information pulled from <?php echo $_SESSION['login_firstname'];?>'s database</td>
        </tr>
    </tfoot>
</table>
<?php }
	?>
    <form id="shipping" method="post" action="doShipping.php" <?php if(!empty($_SESSION['shippingID']) || !empty($_SESSION['errorMessage2'])){?>style="display: none;"<?php }else{?>style="display: block;"<?php }?>>
		<fieldset>
        	<legend>Add new shipping Address</legend>
            <ul>
            <li>
            <label for="name"><span>* </span>Name</label>
            <input type="text" id="name" name="name" size="30"/>
            </li>
            <li>
            <label for="address1"><span>* </span>Address 1</label>
            <input type="text" id="address1" name="address1" size="30"/>
            </li>
            <li>
            <label for="address2">&nbsp;Address 2</label>
            <input type="text" id="address2" name="address2" size="30"/>
            </li>
            <li>
            <label for="city"><span>* </span>City</label>
            <input type="text" id="city" name="city" size="30"/>
            </li>
            <li>
            <label for="state"><span>* </span>State</label>
            <input type="text" id="state" name="state" size="30"/>
            </li>
            <li>
            <label for="zip"><span>* </span>Zip</label>
            <input type="text" id="zip" name="zip" size="30"/>
            </li>
            </ul>
            <div><?php echo $_SESSION["errorMessage"];?></div>
            <button type="submit">Add Address</button>
        </fieldset>
    </form>
    <form id="shipping2" method="post" action="doUpdateShipping.php" <?php if(empty($_SESSION['shippingID']) && empty($_SESSION['errorMessage2'])){?>style="display: none;"<?php }else{?>style="display: block;"<?php }?>>
    	<?php
		$sql = "SELECT Name, Address1, Address2, City, State, Zip FROM shippingaddress WHERE AddressID = ".$_SESSION['shippingID'];

//execute the SQL query and store the result of the execution into $result
//in some cases, it might be helpful to replace the following line with this line:
// mysql_query($sql) or die(mysql_error());

		$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
		if(empty($result))
			$num_results = 0;
		else
			$num_results = mysql_num_rows($result);
	
			for($i=0; $i < $num_results; $i++)
			{
			//store a single record into $row 
			//$row in this example is equivalent to oRS in ASP
				$row = mysql_fetch_array($result);
			}
		?>
		<fieldset>
        	<legend>Edit Shipping Address</legend>
            <ul>
            <li>
            <label for="name"><span>* </span>Name</label>
            <input type="text" id="name" name="name" size="30" value="<?php echo trim($row['Name'])?>"/>
            </li>
            <li>
            <label for="address1"><span>* </span>Address 1</label>
            <input type="text" id="address1" name="address1" size="30" value="<?php echo trim($row['Address1'])?>"/>
            </li>
            <li>
            <label for="name">&nbsp;Address 2</label>
            <input type="text" id="address2" name="address2" size="30" value="<?php echo trim($row['Address2'])?>"/>
            </li>
            <li>
            <label for="city"><span>* </span>City</label>
            <input type="text" id="city" name="city" size="30" value="<?php echo trim($row['City'])?>"/>
            </li>
            <li>
            <label for="state"><span>* </span>State</label>
            <input type="text" id="state" name="state" size="30" value="<?php echo trim($row['State'])?>"/>
            </li>
            <li>
            <label for="zip"><span>* </span>Zip</label>
            <input type="text" id="zip" name="zip" size="30" value="<?php echo trim($row['Zip'])?>"/>
            </li>
            </ul>
            <div><?php echo $_SESSION["errorMessage2"];?></div>
            <div id="submit"><button type="submit">Update Address</button><span>or <a href="shipping.php">Cancel</a></span></div>
        </fieldset>
    </form>
    <?php }
	?>
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
		$_SESSION["errorMessage"] = "";
		$_SESSION["errorMessage2"] = "";
		$_SESSION["success"]= "";
		$_SESSION['updateID'] = $_SESSION['shippingID'];
		$_SESSION['shippingID'] = '';
		include("includes/closeDbConn.php");
	?>
	
</body>
</html>