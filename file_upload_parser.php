

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "video_upload";
 
 // Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
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
				$sql = "INSERT INTO videos (name,url) VALUES('$name','$random_name')";
				if ($con->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				}
				$con->close();
?>	