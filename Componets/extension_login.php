<?php
// Start session
session_start();

// Include database configuration
include_once "db.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch user from database based on email
        $sql = "SELECT * FROM extension_workers WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Store user data in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_location'] = $user['location']; // Store location in session

            // Redirect to dashboard or wherever you want
            header("Location: sendsms.php");
            exit();
        } else {
            // Password is incorrect, show pop-up message
            echo '<script>alert("Invalid email or password");</script>';
            // Reload the current page
            echo '<script>window.location.href = window.location.href;</script>';
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    // No data received from the form, redirect to login page
    header("Location: extensionlogin.php");
    exit();
}
?>
