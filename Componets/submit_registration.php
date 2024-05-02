<?php
include_once("db.php");

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $farmer_type = $_POST['farmer_type'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO farmers (full_name, phone, password, address, farmer_type, dob, gender)
            VALUES ('$full_name', '$phone', '$password', '$address', '$farmer_type', '$dob', '$gender')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No data received from the form.";
}

// Close database connection
$conn->close();
?>
