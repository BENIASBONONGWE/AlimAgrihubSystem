
<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "phpland";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
//EKWQ1ETDRZ7ACZS1BW2CE2EY
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
