<?php

	session_start();
	
	set_time_limit(300);
	
	if($_POST["uploadFile"] != "") {
		$fileExt = strrchr($_FILES["userfile"]["name"], ".");
		//echo $fileExt;
		if(($fileExt != ".jpg") && ($fileExt != ".gif") && ($fileExt!= ".png")) {
			$_SESSION["badFileType"] = "You can not upload that a file of type ".$fileExt;
		}
		else {
			$fileName = $_FILES["userfile"]["name"];
			
			if(!is_uploaded_file($_FILES["userfile"]["tmp_name"])) {
				echo "Problem: possible file attack";
				exit;
			}
			
			$counter = 84;
			
			$upfile = "upload/".$_POST["category"].$counter.$fileExt;
			//echo($upfile);
			
			$newFileName = $_POST["category"].$counter.$fileExt;
			
			if(!copy($_FILES["userfile"]["tmp_name"], $upfile)) {
				echo ("Problem: could not move file into that directory");
				exit;
			}
			$_SESSION["badFileType"] = "Upload Successfully!";
		}
	}
	else {
		$_SESSION["badFileType"] = "";	
	}
	
	$dir = "./upload/";
	$middir = "./mid/";
	$thdir = "./thumb/";
	$img = $newFileName;
	
	resizejpeg($dir, $middir, $img, 480, 360, "mid_");
	
	resizejpeg($dir, $thdir, $img, 160, 120, "th_");
	
	$_SESSION["badFileType"] .= " Resize Successfully!";
	
	header("Location:uploadResize.php");



///////////////////////////////////////////////////////////
// function resizejpeg
//
//    creates a resized image based on the max width
//    specified as well as generates a thumbnail from
//    a rectangle cut from the middle of the image.
//
//    @dir    = directory image is stored in
//    @newdir = directory new image will be stored in
//    @img    = the image name
//    @max_w  = the max width of the resized image
//    @max_h  = the max height of the resized image
//    @prefix = the prefix of the resized image
//
///////////////////////////////////////////////////////////

function resizejpeg($dir, $newdir, $img, $max_w, $max_h, $prefix)
{
   // set destination directory
   if (!$newdir) $newdir = $dir;

   // get original images width and height
   list($or_w, $or_h, $or_t) = getimagesize($dir.$img);

   // make sure image is a jpeg
   if ($or_t == 2) 
   {
   
       // obtain the image's ratio
       $ratio = ($or_h / $or_w);

       // original image
       $or_image = imagecreatefromjpeg($dir.$img);

       // resize image?
       if ($or_w > $max_w || $or_h > $max_h) {

           // resize by height, then width (height dominant)
           if ($max_h < $max_w) {
               $rs_h = $max_h;
               $rs_w = $rs_h / $ratio;
           }
           // resize by width, then height (width dominant)
           else {
               $rs_w = $max_w;
               $rs_h = $ratio * $rs_w;
           }

           // copy old image to new image
           $rs_image = imagecreatetruecolor($rs_w, $rs_h);
           imagecopyresampled($rs_image, $or_image, 0, 0, 0, 0, $rs_w, $rs_h, $or_w, $or_h);
       }
       // image requires no resizing
       else {
           $rs_w = $or_w;
           $rs_h = $or_h;

           $rs_image = $or_image;
       }

       // generate resized image
       imagejpeg($rs_image, $newdir.$prefix.$img, 100);

       return true;
   } 

   // Image type was not jpeg!
   else 
   {
       return false;
   }
}

?>