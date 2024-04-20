<?php
 
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "phpland";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Process registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $phone = $_POST['phone'];
    $type = $_POST['type'];

    // Check if phone number already exists
    $check_phone_query = "SELECT * FROM users WHERE phone = '$phone'";
    $check_phone_result = $conn->query($check_phone_query);
    if ($check_phone_result->num_rows > 0) {
        echo "Phone number already registered, cannot register again.";
    } else {
        // Prepare and bind statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (username, password, phone, type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $phone, $type);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
