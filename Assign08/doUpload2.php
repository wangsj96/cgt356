<?php

	session_start();
	
	set_time_limit(300);
	
	if($_POST["uploadFile"] != "") {
		
		$counter = 54;
		
		
		for($i = 1; $i < 6; $i ++) {
			
			$fileExt = strrchr($_FILES["userfile".$i]["name"], ".");
			//echo $fileExt;
			if(($fileExt != ".jpg") && ($fileExt != ".gif") && ($fileExt!= ".png")) {
				$_SESSION["badFileType"] = "You can not upload that a file of type ".$fileExt;
			}
			else {
				$fileName = $_FILES["userfile".$i]["name"];
				
				if(!is_uploaded_file($_FILES["userfile".$i]["tmp_name"])) {
					echo "Problem: possible file attack";
					exit;
				}
				
				$upfile = "upload/".$_POST["category"].$counter.$fileExt;
				//echo($upfile);
				
				if(!copy($_FILES["userfile".$i]["tmp_name"], $upfile)) {
					echo ("Problem: could not move file into that directory");
					exit;
				}
				
				$counter ++;
				
				$_SESSION["badFileType"] = "Upload Successfully!";
			}
		}
	}
	else {
		$_SESSION["badFileType"] = "";	
	}
	
	header("Location:upload2.php");

?>