<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "phpland";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL queries to create tables

?>
