<?php
	session_start();
	
	include("includes/openDbConn.php");
	
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Download Pictures</title>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <link href="css/lightbox.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
</head>

<body>
		
	<select>		
		<option value="option1">option1</option>
		<option value="option2">option2</option>
        <option value="option3">option3</option>
        <option value="option4">option4</option>
    </select>
	
		<div>
			<a href="upload/AlaskanMalamute1.jpg" data-lightbox="roadtrip">
            	<img src="mid/mid_AlaskanMalamute1.jpg" attr=''/>
            </a>
			<a href="upload/AlaskanMalamute2.jpg" data-lightbox="roadtrip">
            	<img src="mid/mid_AlaskanMalamute2.jpg" attr=''/>
            </a>
			<a href="upload/AlaskanMalamute3.jpg" data-lightbox="roadtrip">
            	<img src="mid/mid_AlaskanMalamute3.jpg" attr=''/>
            </a>
		</div>
    
    <script type="text/javascript">
     
     </script> 
</body>
</html>