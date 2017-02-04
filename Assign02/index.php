<?php
echo("<?xml version=\"1.0\" encoding=\"UTF-8\">")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" /> 
<title>Assign02-Index page</title>
</head>

<body>

<form id="form0" name="form0" method="post" action="login.php">
	<div style="position:absolute; top:100px; left:200px">
    	<h1 style="text-align:center; font-size:16pt;">Index Page</h1>
        <br /><br />
        <table border="0" width="350" cellpadding="2" cellspacing="2">
        	<tr>
            	<td style="text-align:right"><label for="userID">Login:</label></td>
                <td style="text-align:left"><input id="userID" name="userID" size="20" maxlength="20" type="text"></input></td>
            </tr>
            <tr>
            	<td style="text-align:right"><label for="passwd">Password:</label></td>
                <td style="text-align:left"><input id="passwd" name="passwd" size="20" maxlength="20" type="password"></input></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center"><input value="login" type="submit"></input></td>
            </tr>
        </table>
    </div>	
</form>

</body>
</html>