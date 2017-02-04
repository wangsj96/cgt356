<?php
	session_start();
		
	include("includes/openDbConn.php");
	
	if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
	
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>View Image</title>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <link href="css/lightbox.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
    <style type="text/css">
    	div#login{
			width:400px;
			height:450px;
			background-color:rgba(158,158,158,0.3);
			-moz-border-radius:10px;
			-webkit-border-radius:10px;
			-khtml-border-radius:10px;
			border-radius:10px;
    		padding: 10px;
			box-shadow: 1px 2px 5px 0 #000000;
			float:right;
			margin-right:2%;
			display:none;
			z-index:1000;
		}
		#Login fieldset{
			width:300px;
			border-radius:10px;
			padding:15px;
			background-color:#FFEEFF;
			height: auto;
			margin:55px auto;
		}
		#Login fieldset div{
			color:red;	
		}
		#Login ol li{
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			-khtml-border-radius:5px;
			border-radius:5px;
			line-height:30px;
			list-style:none;
			padding:5px 5px;
			margin-bottom:2px;
		}
		#Login ol label{
			float:left;
			font-size:16px;
			width:100px;			
		}
		#Login button{
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
		#Login button:hover{
			background:#1e2506;
			cursor:pointer;	
		}
		#Login legend{
			font:30px Tahoma, Geneva, sans-serif;
			font-weight:bold;
			padding-bottom:10px;
			color:#84D1D1;
			text-shadow:0 1px 1px #000000;
		}
		div#gallery{
			width:75%;
			float:left;	
			margin:0 auto;
			
		}

		#select{
			width:75%;
			text-align:center;
			margin-bottom:15px;
			font-size:18px;
			margin-top:30px
		}
		h1{
			font-family:"Courier New", Courier, monospace;
			text-align:center;	
		}
		.photo{
			width:auto;
			height:360px;
			display:inline-block;
			margin:0 auto
		}
    </style>
</head>
<body>
	
    <h1><?php if($_SESSION['logged']) {?>Edit Images<?php } else {?>View Images<?php }?></h1>
	<?php 
		include("includes/menu.php"); 
		
		$sql = "SELECT typeID, typeName FROM dogType";
		
		$result = mysql_query($sql);
		
		if(empty($result))
			$num_results = 0;
		else
			$num_results = mysql_num_rows($result);
			
	?>
    <div id="gallery" <?php if($_SESSION['logged']) echo("style='width:100%; text-align:center'")?>>
    	<div id="select" <?php if($_SESSION['logged']) echo("style='width:100%;'")?>><span>Select the category: </span><select id="selectMe">
    <?php 
		for($i = 1; $i < $num_results + 1; $i ++) {
			
			$row = mysql_fetch_array($result);
	?>		
			
      		<option value="<?php echo("option".$i)?>"><?php echo(trim($row["typeName"]))?></option>

    <?php
		}
	?>
    </select></div>
    <?php 
		$sql = "SELECT MAX(imgNum) AS MaxNum, imageID, typeName, dogImage.typeID FROM dogImage, dogType WHERE dogImage.typeID = dogType.typeID GROUP BY dogImage.typeID";
		
		$result = mysql_query($sql);
	
		if(empty($result))
			$num_results = 0;
		else
			$num_results = mysql_num_rows($result);
			
		if($num_results == 0){
			echo("<br />No image");	
		}
		else{

			for($i = 1; $i < $num_results + 1; $i ++) {
		?>		
				<div id="<?php echo("option".$i)?>" class="group">
			<?php		
				$row = mysql_fetch_array($result);
				
				for ($count = 1; $count < $row["MaxNum"] + 1; $count ++) {
			
				$sql2 = "SELECT imgDesc FROM dogImage WHERE imageID='".trim($row["typeID"]).$count.".jpg'";
				$result2 = mysql_query($sql2);
				$desc = mysql_fetch_array($result2);
			?>	     
                    
                    <div class="photo">
                    <a <?php echo("href='upload/".trim($row["typeID"]).$count).".jpg'"?> data-lightbox="<?php echo(trim($row["typeID"]))?>" data-title="<?php echo($desc['imgDesc'])?>">
                        <img <?php echo("src='mid/mid_".trim($row["typeID"]).$count).".jpg'"?> attr=''/>
                    </a>
                    <br />
                	<?php if($_SESSION['logged']) {?><a href="editImage.php?id=<?php echo trim($row["typeID"]).$count.".jpg" ?>" style="text-decoration:none;">edit</a> | <a href="deleteImage.php?id=<?php echo trim($row["typeID"]).$count.".jpg" ?>" style="text-decoration:none;">delete</a><?php }?>
                    <br />
                    </div>
				<?php	
				}
				?>
		</div>
        <?php
			}
		}
		?>
        </div>
		<div id="login" <?php if(!empty($_SESSION['errorMessage'])) echo("style='display:block; margin-right:100px;'")?>>
    	<form id="Login" method="post" action="doLogin.php">
    	<fieldset>
    		<legend>Login</legend>
        	<ol>
        		<li>
            		<label for="login">Username:</label>
                	<input id="login" name="login" type="text" maxlength="15" size="20"/>
            	</li>
            	<li>
            		<label for="passwd">Password:</label>
                	<input id="passwd" name="passwd" type="password" maxlength="60" size="20"/>
            	</li>
        	</ol>
            <div><span><?php echo $_SESSION["errorMessage"];?></span></div>
            <button type="submit">Login</button>
    	</fieldset>
    </form>
    </div>
<?php 
	include("includes/closeDbConn.php");
	
	$_SESSION['errorMessage'] = "";
?>
<script type="text/javascript">
    lightbox.option({
      'alwaysShowNavOnTouchDevices': true,
      'wrapAround': true
    })
	$(document).ready(function(e) {
			$('.group').hide();
      		$('#option1').show();
      		$('#selectMe').change(function () {
        		$('.group').hide();
        		$('#'+$(this).val()).show();
  	  		})
			$("a#login").click(function(e) {
				e.preventDefault();
				$("div#login").fadeIn({
					duration:1300,
					queue:false	
				}).animate({
					marginRight:15
				},1300);
			});//end of click login
	});
</script>

</body>
</html>