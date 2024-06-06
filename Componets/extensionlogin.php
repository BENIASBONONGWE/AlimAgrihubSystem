<?php
include_once "db.php"; // Ensure this file has the correct database connection info

// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($email && $password) {
        // Fetch the user record
        $stmt = $pdo->prepare("SELECT * FROM extension_workers WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct
            echo "Login successful!";
            // Redirect to the dashboard or home page
            header("Location: extentiondashbord.php");
            exit;
        } else {
            // Invalid email or password
            echo "Invalid email or password.";
        }
    } else {
        echo "Please enter both email and password.";
    }
}
?>
