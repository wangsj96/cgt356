<?php
// Connect to MySQL from PHP
// You can use either of these code segments BUT NOT both at the same time
// Both of these segments below perform the same task in different manners
// One of the segments is commented out in this example using /*  */

// NOTICE: the use of mysql_ as a prefix (as opposed to mssql or others)

///////////////////////////////////////////////
///////////////////////////////////////////////
// Open DB connection and select DB to use
// The '@' bypasses the usual PHP error handling, so you get to deal with a 
// failure return from pconnect yourself in the if statement below.
// If you leave off the '@' then any errors will automatically be thrown
@ $db = mysql_pconnect("localhost", "cgt356web2m", "Dumpling2m5382");
mysql_select_db("cgt356web2m") or die(mysql_error());

// check to see if connection was successful
if(!$db)
{
	echo "Error: Could not connect to database.  Please try again later.";
	exit;
}
?>