
<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "phpland";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM cards";
$result = mysqli_query($conn, $sql);
?>
