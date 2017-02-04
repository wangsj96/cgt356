<?php
	$uploadsDir = '/inetpub/wwwroot/356/wangs/Assign08/upload/';	
	$uploadsDir2 = 'upload/';																									//folder location for the uploaded file, make sure modify permissions are set on it
	$result = array();																									//create an array, used below
	$filename = "";
	
	if($_GET['binary'] == 'false')																						//if binary option is false
	{
		$headers = emu_getallheaders();																					//get the posted http headers
		$content = base64_decode(file_get_contents('php://input'));														//read file content in as string

		if (!empty($content) && !empty($headers['Up-Filename']))														//make sure content and headers are not empty before processing
		{
			$filename = stripslashes($headers['Up-Filename']);															//get the filename
			$extension = getExtension($filename);																		//get the file extension off of the filename
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))		//check for valid file type extension, if NOT valid do this
			{
				$result = array('error' 	=> 'Invalid extension.',													//error array set if it is not successful
								'source'	=> '');
				echo json_encode($result);																				//error checking, echo the result array as name : value pairs (json_encode)
				exit;																									//exit the php script
			}
			else																										//file type is valid, do this
			{

				if(!file_put_contents($uploadsDir.$filename, $content))												//upload the file
				{
					$result = array('error' 	=> $uploadsDir.$filename.' : Image could not be copied.',										//error array set if it is not successful
									'source'	=> '');
					echo json_encode($result);																			//error checking, echo the result array as name : value pairs (json_encode)
					exit;																								//exit the php script
				}
			}
		}
	}
	else																												//else binary option is set to true
	{
		$image = $_FILES['image']['name'];																				//get the image using php _FILES
		if ($image)																										//check to make sure there is an image before processing
		{
			$filename = stripslashes($_FILES['image']['name']);															//get the filename
			$extension = getExtension($filename);																		//get the file extension off of the filename
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))		//check for valid file type extension
			{
				$result = array('error' 	=> 'Invalid extension.',													//error array set if it is not successful
								'source'	=> '');
				echo json_encode($result);																				//error checking, echo the result array as name : value pairs (json_encode)
				exit;																									//exit the php script
			}
			else																										//file type is valid, do this
			{
				$filename = $_FILES['image']['name'];																	//get the filename
				if(!copy($_FILES['image']['tmp_name'], $uploadsDir . $filename))										//upload the file
				{
					$result = array('error' 	=> 'Image could not be copied.',										//error array set if it is not successful
									'source'	=> '');
					echo json_encode($result);																			//error checking, echo the result array as name : value pairs (json_encode)
					exit;																								//exit the php script
				}
			}
		}
		else																											//else there is no image, do this
		{
			$result = array('error' 	=> 'Image could not be uploaded.',												//error array set if it is not successful
							'source'	=> '');
			echo json_encode($result);																					//error checking, echo the result array as name : value pairs (json_encode)
			exit;																										//exit the php script
		}
	}

	$result = array('error' 	=> '',																					//it worked correctly, set result array for Ajax
					'source'	=> $uploadsDir2 . $filename);								
	echo json_encode($result);																							//echo result for Ajax to read on the html page


	// Additional functions

	function getExtension($str)																							//function to get the extension
	{
		$i = strrpos($str, ".");																						//look for the position of the period, in reverse (start from right)
		if (!$i)																										//if the period doesn't exist in the string
		{
			return "";																									//return nothing
		}
		$l = strlen($str) - $i;																							//get the length of the filename without the extension, used as starting point //below
		$ext = strtolower(substr($str, $i + 1, $l));																	//get the file extension, start with whole string, get . + extension, start at //end of filename
		return $ext;																									//return the file extension
	}

	function emu_getallheaders()																						//function to get http headers
	{
   		foreach($_SERVER as $name => $value)																			//foreach loop to loop through server variables
   		{
       		if(substr($name, 0, 5) == 'HTTP_')																			//check to see if the server variable name starts with HTTP_
				$headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;	//create name, value pairs as an array called headers
   		}
   		return $headers;																								//return the array of headers, which should contain the filename
	}
	

?>