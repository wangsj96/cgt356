<?php
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Lab 08 - HTML 5 Upload</title>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<style type="text/css">
	body{
		font-family:Arial, Helvetica, sans-serif;
		font-size:16px;
		font-weight:normal;
		background: #ddddff;
		margin:0px;
		margin-top:40px;
		padding:0px;	
	}
	section, header, footer{
		display:block;	
	}
	#wrapper{
		width:600px;
		margin:0px auto;
		background:#ffffff;
		-moz-border-radius:20px;
		-webkit-border-radius:20px;
		border-radius:20px;
		border-top:1px solid #fff;
		padding-bottom:76px;
	}
	h1{
		padding-top:10px;	
	}
	h2{
		font-size:100%;
		font-style:italic;	
	}
	header, article > * {
		margin:20px;	
	}
	footer > * {
		margin:20px;
		color:#666666;	
	}
	#imgHolder{
		border:3px solid #ccffcc;
		width: 300px;
		height:300px;
		margin: 20px auto;	
	}
	#imgHolder.hover{
		border:3px dashed #ccffcc;	
	}
</style>
</head>

<body>

	<section id="wrapper">
    	<header>
        	<h1 style="text-align: center">Image Upload</h1>
        </header>
    	<?php include("includes/menu.php"); ?>
    <article>
    	<p>Drag an image from your desktop on to the drop box below.</p>
        <div id="imgHolder"></div>
        <script type="text/javascript">
			var imgHolder = document.getElementById('imgHolder');
		var url = "doHTML5Upload.php";
		imgHolder.ondragover = function() {
			this.className = "hover";
			return false;	
		};
		imgHolder.ondragend = function() {
			this.className = "";
			return false;	
		};
		
		
		imgHolder.ondrop     = function(event) {  
			this.className = '';
			event.preventDefault();
			
			var file = event.dataTransfer.files[0];
			var reader = new FileReader();
			var preview = new FileReader();
			
			reader.onloadend = function()
			{
				binary = reader.result;
				//begin ajax
				request = new XMLHttpRequest();
				request.onreadystatechange = function()
				{
					
					if(request.readyState == 4 && request.status == 200)
					{
						//result = request.responseText;
						eval("result=" + request.responseText);
						
						if(result.error == "" ) {
							imgHolder.innerHTML = "<img id='img1' src='" + result.source + "' width='225' alt='' title='' />";
						}
					
					}//end readyState
					
				};//end onreadystatechange
				
				
				//don't touch anything below here.
				
				if(request.sendAsBinary != null){
					request.open('POST', url + '?binary=true', true);
					
					var boundary = 'xxxxxxxxx';
					var body = '--' + boundary + '\r\n';
					body += "Content-Disposition: form-data; name='image'; filename='" + file.name + "'\r\n";
					body += "Content-Type: application/octet-stream\r\n\r\n";
					body += binary + "\r\n";
					body += '--' + boundary + '--';
					
					request.setRequestHeader('content-type', 'multipart/form-data; boundary=' + boundary);
					request.sendAsBinary(body);
				}else {
					request.open('POST', url + '?binary=false', true);
					
					request.setRequestHeader('UP-FILENAME', file.name);
					request.setRequestHeader('UP-SIZE', file.size);
					request.setRequestHeader('UP-TYPE', file.type);
					
					request.send( window.btoa(binary) );
				}

				preview.onloadend = function(){};
				
				
			};//end onloadend
			
			reader.readAsBinaryString(file);
			preview.readAsDataURL(file);
			
			return false;
		}; //end ondrop

		</script>
    </article>
	</section>
</body>
</html>