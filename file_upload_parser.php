

<?php
include 'connect.php';
			    $name = $_FILES['file1']['name'];
				$type = explode('.', $name);
				$type = end($type);
				$size = $_FILES['file1']['size'];
//to create a random file name
				$random_name = rand();
				$tmp_name = $_FILES["file1"]["tmp_name"];
//check format for the uploaded video
			     if($type != 'mp4' && $type != 'MP4'  && $type != 'flv'){
					$message = "Video Format Not Supported";
					}
				else {
//move the uploaded video with random name to your folder
				move_uploaded_file($tmp_name,'upload/'.$random_name.'.'.$type);
				$result = 	 mysql_query("INSERT INTO `videos`  VALUES('','$name','$random_name')") ;
				if (!$result) {
					die('Invalid query: ' . mysql_error());
					}
					$message = "Successfully Uploaded!!";
					
					
				}
				echo "$message <br/><br/>";
?>	