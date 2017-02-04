<?php
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8" />
<title>Lab 05 - select</title>
</head>

<body>

<h1 style="text-align:center;">Lab 05 - Select Page</h1>

<?php
	include("includes/menu.php");

include("includes/openDbConn.php");

//Create the SQL query
$sql = "SELECT UserID, LastName, FirstName, Title FROM userslab5";

//execute the SQL query and store the result of the execution into $result
//in some cases, it might be helpful to replace the following line with this line:
// mysql_query($sql) or die(mysql_error());

$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);
	
?>
<table style="border=0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px;" title="listing of employees">
	<thead>
    	<tr>
        	<th colspan="4" style="font-weight:bold; background-color:#b1946c; text-align:center; text-decoration:underline">userslab5 table</th>
        </tr>
        <tr>
        	<th style="background-color:#b1946c; font-weight:bold">UserID</th>
            <th style="background-color:#b1946c; font-weight:bold">Last Name</th>
            <th style="background-color:#b1946c; font-weight:bold">First Name</th>
            <th style="background-color:#b1946c; font-weight:bold">Title</th>
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
        	<td style="border-right:1px solid black"><?php echo trim($row["UserID"]) ?></td>
            <td style="border-right:1px solid black"><?php echo trim($row["LastName"]) ?></td>
            <td style="border-right:1px solid black"><?php echo trim($row["FirstName"]) ?></td>
            <td><?php echo trim($row["Title"]) ?></td>
        </tr>
				
		<?php
				//echo $row["Phone"]."<br />".chr(13);
			}
		?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="4" style="text-align:center; font-style:italic">Information pulled from the database</td>
        </tr>
    </tfoot>
</table>

<?php
//Create the SQL query
$sql = "SELECT ShipperID, CompanyName, Phone FROM shipperslab5";

//execute the SQL query and store the result of the execution into $result
//in some cases, it might be helpful to replace the following line with this line:
// mysql_query($sql) or die(mysql_error());

$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);
	
?>
<table style="border=0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px;" title="listing of employees">
	<thead>
    	<tr>
        	<th colspan="4" style="font-weight:bold; background-color:#b1946c; text-align:center; text-decoration:underline">shipperslab5 table</th>
        </tr>
        <tr>
        	<th style="background-color:#b1946c; font-weight:bold">ShippersID</th>
            <th style="background-color:#b1946c; font-weight:bold">Company Name</th>
            <th style="background-color:#b1946c; font-weight:bold">Phone</th>
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
        	<td style="border-right:1px solid black"><?php echo trim($row["ShipperID"]) ?></td>
            <td style="border-right:1px solid black"><?php echo trim($row["CompanyName"]) ?></td>
            <td><?php echo trim($row["Phone"]) ?></td>
        </tr>
				
		<?php
				//echo $row["Phone"]."<br />".chr(13);
			}
		?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="4" style="text-align:center; font-style:italic">Information pulled from the database</td>
        </tr>
    </tfoot>
</table>


<?php

include("includes/closeDbConn.php");

?>

</body>
</html>