<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "see";
$nam = $_POST['fullname'];
$ema = $_POST['email'];
$yr = $_POST['yr'];
$coll = $_POST['coll'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO sin1 (fname, email, yr, coll,event)
VALUES ('$nam','$ema','$yr','$coll','paper')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 