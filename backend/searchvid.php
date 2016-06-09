<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "vshare";
$searchkey = $_POST['vname'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM vbase WHERE VTitle LIKE '%$searchkey%';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Video ID: " . $row["VID"]. "<br>";
		echo "Title <a href=".$row['Vurl'].">";
		echo $row['VTitle'];
		echo "</a> <br>";
		echo "About:" .$row['VAbt']."";
		echo "<br><br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>