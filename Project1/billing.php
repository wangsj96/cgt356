<?php 
	
	include("includes/session.php");
	
	@session_start();
	
	if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
	
	if(empty($_SESSION["errorMessage2"]))
	$_SESSION["errorMessage2"] = "";
	
	if(empty($_SESSION["billingID"]))
	$_SESSION["billingID"] = "";
	
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
<title>Billing Information</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
<style type="text/css">
#content{
	width:1100px;
	margin:0 auto;	
}
form#billing fieldset{
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
form#billing fieldset div{
	color:red;
	font-size:17px;
	margin-left:40px;
	font-weight:bold;
}
form#billing ul {
	margin-top:20px;
	width:100%;
}
form#billing ul li{
	height:40px;
	list-style:none;
	margin-bottom:2px;
	color:white;
}
form#billing ul li label{
	float:left;
	clear:right;
	margin-top:5px;
	width:120px;
	font-size:17px;
	text-shadow: black 0.1em 0.1em 0;
}
#billing ul li input{
	margin-right:60px;
	float:right;
	width:400px;
	margin-top:5px;	
}
form#billing button{
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
form#billing button:hover{
	background:#1e2506;
	cursor:pointer;	
}
form#billing legend{
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
	margin-left:50px;
}
div#notallow{
	background:#22D686;
	opacity:0.7;
	padding:20px 20px 20px 20px;
	margin-top:20px;
	margin-left:100px;
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
form#billing2 fieldset{
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
form#billing2 fieldset div{
	color:red;
	font-size:17px;
	margin-left:40px;
	font-weight:bold;
}
form#billing2 ul {
	margin-top:20px;
	width:100%;
}
form#billing2 ul li{
	height:40px;
	list-style:none;
	margin-bottom:2px;
	color:white;
}
form#billing2 ul li label{
	float:left;
	clear:right;
	margin-top:5px;
	width:120px;
	font-size:17px;
	text-shadow: black 0.1em 0.1em 0;
}
#billing2 ul li input{
	margin-right:60px;
	float:right;
	width:400px;
	margin-top:5px;	
}
form#billing2 div#submit{
	text-align:center;
}
form#billing2 div#submit span{
	color: white;
	margin-left:3px;
	font:14px Tahoma, Geneva, sans-serif;
	letter-spacing:1px;
}
form#billing2 div#submit a{
	color: #FFB100;
	text-decoration:none;
}
form#billing2 button{
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
form#billing2 button:hover{
	background:#1e2506;
	cursor:pointer;	
}
form#billing2 legend{
	font:20px Tahoma, Geneva, sans-serif;
	color:#FFB100;
	font-weight:bold;
	padding-bottom:5px;
}
</style>
<title>Billing Information</title>
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
    <h1>Billing Information</h1>
    <?php 
	$sql = "SELECT BillingID, BillName, BillAddress1, BillAddress2, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate FROM billinginfo WHERE Login = '".$_SESSION['login_user']."'";

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
<table style="border: 1px solid #e3ebc3;; padding:0px; margin:0px auto; border-spacing:0px;-moz-border-radius:10px; -webkit-border-radius:10px; -khtml-border-radius:10px; border-radius:10px; color:white;" title="listing of billing">
	<thead>
    	<tr>
        	<th colspan="10" style="font-weight:bold; text-align:center; padding-bottom:10px; padding-top:10px; font:20px Georgia, 'Times New Roman', Times, serif; color:#FFB100;text-shadow:2px 2px 0 black;">Billing Information</th>
        </tr>
        <tr>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Name</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Address1</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Address2</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">City</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">State</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Zip</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Card Type</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Card Number</th>
            <th style="font-size:18px;font-weight:bold; text-shadow:2px 2px 0 black;">Exp. Date</th>
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
        	<td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["BillName"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["BillAddress1"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["BillAddress2"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["BillCity"]) ?></td>
			<td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["BillState"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["BillZip"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["CardType"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo "XXXX-XXXX-XXXX-".substr(trim($row["CardNumber"]),-4) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["ExpDate"]) ?></td>
            <td style="padding:10px;"><a href="updateBilling.php?id=<?php echo trim($row["BillingID"]) ?>" style="color:#FFB100; text-decoration:none;">edit</a> | <a href="deleteBilling.php?id=<?php echo trim($row["BillingID"]) ?>" style="color:#FFB100; text-decoration:none;">delete</a></td>
        </tr>
				
		<?php
				//echo $row["Phone"]."<br />".chr(13);
			}
		?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="10" style="text-align:center; font-style:italic; padding-bottom:5px;">Information pulled from <?php echo $_SESSION['login_firstname']?>'s database</td>
        </tr>
    </tfoot>
</table>
	<?php }
	?>
    <form id="billing" method="post" action="doBilling.php" <?php if(!empty($_SESSION['billingID']) || !empty($_SESSION['errorMessage2'])){?>style="display: none;"<?php }else{?>style="display: block;"<?php }?>>
		<fieldset>
        	<legend>Add new billing information</legend>
            <ul>
            <li>
            <label title="Name" for="name"><span>* </span>Name</label>
            <input type="text" id="name" name="name" size="30" maxlength="50"/>
            </li>
            <li>
            <label title="Address1" for="address1"><span>* </span>Address 1</label>
            <input type="text" id="address1" name="address1" size="30" maxlength="30"/>
            </li>
            <li>
            <label title="Address2" for="name">&nbsp;Address 2</label>
            <input type="text" id="address2" name="address2" size="30" maxlength="30"/>
            </li>
            <li>
            <label title="City" for="city"><span>* </span>City</label>
            <input type="text" id="city" name="city" size="30" maxlength="30"/>
            </li>
            <li>
            <label title="State" for="state"><span>* </span>State</label>
            <input type="text" id="state" name="state" size="30" maxlength="20"/>
            </li>
            <li>
            <label title="Zip" for="zip"><span>* </span>Zip</label>
            <input type="text" id="zip" name="zip" size="30" maxlength="5"/>
            </li>
            <li>
            <label title="CardType" for="cardnum"><span>* </span>Card Type</label>
            <input type="text" id="card" name="card" size="30" maxlength="20"/>
            </li>
            <li>
            <label title="CardNumber" for="card"><span>* </span>Card Number</label>
            <input type="text" id="cardnum" name="cardnum" size="30" maxlength="16"/>
            </li>
            <li>
            <label title="ExpDate" for="date"><span>* </span>Exp. Date</label>
            <input type="text" id="date" name="date" size="30" maxlength="5"/>
            </li>
            </ul>
            <div><?php echo $_SESSION["errorMessage"];?></div>
            <button type="submit">Add Payment</button>
        </fieldset>
    </form>
    <form id="billing2" method="post" action="doUpdateBilling.php" <?php if(empty($_SESSION['billingID']) && empty($_SESSION['errorMessage2'])){?>style="display: none;"<?php }else{?>style="display: block;"<?php }?>>
    	<?php
		$sql = "SELECT BillName, BillAddress1, BillAddress2, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate FROM billinginfo WHERE BillingID = ".$_SESSION['billingID'];

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
        	<legend>Edit Billing Address</legend>
            <ul>
            <li>
            <label for="name"><span>* </span>Name</label>
            <input type="text" id="name" name="name" size="30" maxlength="50" value="<?php echo trim($row['BillName'])?>"/>
            </li>
            <li>
            <label for="address1"><span>* </span>Address 1</label>
            <input type="text" id="address1" name="address1" size="30" maxlength="30" value="<?php echo trim($row['BillAddress1'])?>"/>
            </li>
            <li>
            <label for="address2">&nbsp;Address 2</label>
            <input type="text" id="address2" name="address2" size="30" maxlength="30" value="<?php echo trim($row['BillAddress2'])?>"/>
            </li>
            <li>
            <label for="city"><span>* </span>City</label>
            <input type="text" id="city" name="city" size="30" maxlength="30" value="<?php echo trim($row['BillCity'])?>"/>
            </li>
            <li>
            <label for="state"><span>* </span>State</label>
            <input type="text" id="state" name="state" size="30" maxlength="20"value="<?php echo trim($row['BillState'])?>"/>
            </li>
            <li>
            <label for="zip"><span>* </span>Zip</label>
            <input type="text" id="zip" name="zip" size="30" maxlength="5" value="<?php echo trim($row['BillZip'])?>"/>
            </li>
            <li>
            <label for="card"><span>* </span>Card Type</label>
            <input type="text" id="card" name="card" size="30" maxlength="20" value="<?php echo trim($row['CardType'])?>"/>
            </li>
            <li>
            <label for="cardnum"><span>* </span>Card Number</label>
            <input type="text" id="cardnum" name="cardnum" size="30" maxlength="16" value="<?php echo trim($row['CardNumber'])?>"/>
            </li>
            <li>
            <label for="date"><span>* </span>Exp. Date</label>
            <input type="text" id="date" name="date" size="30" maxlength="5" value="<?php echo trim($row['ExpDate'])?>"/>
            </li>
            </ul>
            <div><?php echo $_SESSION["errorMessage2"];?></div>
            <div id="submit"><button type="submit">Update Payment</button><span>or <a href="billing.php">Cancel</a></span></div>
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
			document.getElementById("name").focus();
        });
		
	</script>
    </div>
    <?php
		$_SESSION["errorMessage"] = "";
		$_SESSION["errorMessage2"] = "";
		$_SESSION["success"]= "";
		$_SESSION['updateBillID'] = $_SESSION['billingID'];
		$_SESSION['billingID'] = '';
		include("includes/closeDbConn.php");
	?>

	
</body>
</html>