<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database configuration
    include_once "db.php";

    // Retrieve form data
    $full_name = $_POST["fullName"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $location = $_POST["location"]; // Include location in registration
    $employeeNumber = $_POST["employeeNumber"]; // Retrieve employee number from form
    $password = $_POST["password"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user data into the database
        $sql = "INSERT INTO extension_workers (full_name, phone, email, location, employee_number, password) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$full_name, $phone, $email, $location, $employeeNumber, $hashed_password]);

        if ($stmt->rowCount() > 0) {
            // Redirect to another page
            header("Location: extensionlogin.php");
            exit(); // Make sure to stop further execution
        } else {
            echo "Error: Unable to create new record";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "No data received from the form.";
}
?>
