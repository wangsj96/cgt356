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
	<title>Admin</title>
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
		#Register fieldset{
	width:450px;
	margin:30px auto;
	border-radius:10px;
	padding:15px;	
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
	color:#FFB100;
	font-weight:bold;
	padding-bottom:10px;
}
#Register ol label{
	float:left;
	font-size:16px;
	width:170px;			
}
#Register ol li{
	background:#b9cf6a;
	background:rgba(255,255,255,0.3);
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
		
		if($_SESSION["logged"] == false) {
			?>
            
			<div id="notallow"><p>You are not allowed to view this page.</p></div>
    <?php
        }
		else {
	?>
    <h1>Admin Information</h1>
    <?php 
	include("includes/menu.php");
	$sql = "SELECT Login, FirstName, LastName, type, typeID FROM user";

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
<table style="border: 1px solid #e3ebc3;; padding:0px; margin:0px auto; border-spacing:0px;-moz-border-radius:10px; -webkit-border-radius:10px; -khtml-border-radius:10px; border-radius:10px;" title="listing of users">
	<thead>
    	<tr>
        	<th colspan="10" style="font-weight:bold; text-align:center; padding-bottom:10px; padding-top:10px; font:20px Georgia, 'Times New Roman', Times, serif; color:#FFB100;text-shadow:2px 2px 0 black;">User Information</th>
        </tr>
        <tr>
            <th style="font-size:18px;font-weight:bold; ">Login</th>
            <th style="font-size:18px;font-weight:bold; ">First Name</th>
            <th style="font-size:18px;font-weight:bold; ">Last Name</th>
            <th style="font-size:18px;font-weight:bold; ">User Type</th>
            <th style="font-size:18px;font-weight:bold; ">Category Name</th>
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
        	<td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["Login"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["FirstName"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["LastName"]) ?></td>
            <td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["type"]) ?></td>
			<td style="border-right:1px solid black; padding:10px;"><?php echo trim($row["typeID"]) ?></td>
            <td style="padding:10px;"><a href="deleteUser.php?id=<?php echo trim($row["Login"]) ?>" style="color:#FFB100; text-decoration:none;">delete</a></td>
        </tr>
				
		<?php
				//echo $row["Phone"]."<br />".chr(13);
			}
}
		?>
    </tbody>
</table>

	<?php $sql = "SELECT typeID FROM usertype";
		
		$result = mysql_query($sql);
		
		if(empty($result))
			$num_results = 0;
		else
			$num_results = mysql_num_rows($result);
			
	?>
    <form id="Register" method="post" action="doRegister.php">
    <fieldset>
    	<legend>Add New User</legend>
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
                <li>
                <label for="type"><span>* </span>User Type:</label>
            		<select id="type" name="type">
					<?php 
                        for($i = 1; $i < $num_results + 1; $i ++) {
                            
                            $row = mysql_fetch_array($result);
                    ?>		
                            
                            <option value="<?php echo(trim($row["typeID"]))?>"><?php echo(trim($row["typeID"]))?></option>
                
                    <?php
                        }
                    ?>
                    </select>
            	</li>
        	</ol>
            <div><span><?php echo $_SESSION["badFileType"];?></span></div>
            <button type="submit">Register</button>
    </fieldset>
    </form>
    <?php
}
		$_SESSION["badFileType"] = "";
		include("includes/closeDbConn.php");
	?>
</body>
</html>