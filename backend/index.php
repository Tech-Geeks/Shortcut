<html>
<head>

		<h1>Video Upload</h1>
		<link rel="stylesheet" href="css/bulma.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<form method='post'  enctype='multipart/form-data'>
<?php
if(isset($_FILES['video']))
{
			    $name = $_FILES['video']['name'];
				$type = explode('.', $name);
				$type = end($type);
				$size = $_FILES['video']['size'];
//to create a random file name
				$random_name = rand();
				$tmp_name = $_FILES["video"]["tmp_name"];
//check format for the uploaded video
			     if($type != 'mp4' && $type != 'MP4'  && $type != 'flv'){
					$message = "Video Format Not Supported";
					}
				else {
//move the uploaded video with random name to your folder
					 move_uploaded_file($tmp_name,'upload/'.$random_name.'.'.$type);
					$message = "Successfully Uploaded!!";
				}
				echo "$message <br/><br/>";
}
?>		
Select Video: <br />
   <input type='file'  name='video' />
   <br/><br/>
   <input type='submit' value='upload'  />
</form>
</body>
</html>