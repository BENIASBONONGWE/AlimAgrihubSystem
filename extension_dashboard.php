<?php
// Include database configuration
include_once "db.php";

// Start session
session_start();

// Check if the extension worker is logged in
if(isset($_SESSION['user_location'])) {
    $extensionWorkerLocation = $_SESSION['user_location'];

    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch farmers from the same location as the extension worker
        $sql = "SELECT * FROM farmers WHERE location = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$extensionWorkerLocation]);
        $farmers = $stmt->fetchAll();

        // Output farmer details
        foreach($farmers as $farmer) {
            echo "Name: " . $farmer['full_name'] . ", Phone: " . $farmer['phone'] . "<br>";
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    // Redirect the user to the login page if not logged in
    header("Location: extensionlogin.php");
    exit();
}
?>
