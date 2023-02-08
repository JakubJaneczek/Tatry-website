<?php
include_once 'mongo.php';
if(isset($_POST['submit']))
{
	$filetmp = $_FILES["Photo"]["tmp_name"];
	$filename = $_FILES["Photo"]["name"];
	$filetype = $_FILES["Photo"]["type"];
	$filesize = $_FILES["Photo"]["size"];
	$fileinfo = getimagesize($_FILES["Photo"]["tmp_name"]);
	$filewidth = $fileinfo[0];
	$fileheight = $fileinfo[1];
	$filepath = "uploaded/Original/".$filename;
	$filepath_thumb = "uploaded/Thumbnail/".$filename;
	$filepath_watermark = "uploaded/Watermark/".$filename;
	$watermark = $_POST['watermark'];
	$title = $_POST['title'];
	$author = $_POST['author'];


		if($filesize > 1000000)
		{
			echo "Plik jest za duży.";
		}
		else
		{
			
			if($filetype != "image/jpeg" && $filetype != "image/png")
			{
				echo "Akceptowane typy plików to JPG oraz PNG.";
			}
			else
			{
				move_uploaded_file($filetmp,$filepath);	
				
				
				//////////////////////////////////////////////////////////////////////////////////////
				
				if($filetype == "image/jpeg")
				{
				  $imagecreate = "imagecreatefromjpeg";
				  $imageformat = "imagejpeg";
				}
				if($filetype == "image/png")
				{						 
				  $imagecreate = "imagecreatefrompng";
				  $imageformat = "imagepng";
				}

				$new_width = "200";
				$new_height = "125";
								
				$image_p = imagecreatetruecolor($new_width, $new_height);
				$image = $imagecreate($filepath); //photo folder
						
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $filewidth, $fileheight);						
				$imageformat($image_p, $filepath_thumb);//thumb folder		
				
				//////////////////////////////////////////////////////////////////////////////////////
				header('Content-Type: image/jpg');

				$image_w = imagecreatetruecolor($filewidth, $fileheight);
				imagecopyresampled($image_w, $image, 0, 0, 0, 0, $filewidth, $fileheight, $filewidth, $fileheight);
				$red = imagecolorallocate($image_w, 255, 0, 0);
				$white = imagecolorallocate($image_w, 255, 255, 255);
				$grey = imagecolorallocate($image_w, 128, 128, 128);
				$black = imagecolorallocate($image_w, 0, 0, 0);
				

				$font = "static/Pacifico.ttf";
				$font_size = 50;
				imagettftext($image_w, 20, 0, 100, 100, $red, $font, (string)$watermark);
				
				$imageformat($image_w, $filepath_watermark);
				
				 AddAuthor($author, $title, $filename);
			}		
		}
	}


?>