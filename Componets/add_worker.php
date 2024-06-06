<?php
include_once "db.php"; // Ensure this file has the correct database connection info
try {
    $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    try {
        // Prepare SQL statement to insert data into the extension_worker table
        $stmt = $pdo->prepare("INSERT INTO extension_workers (full_name, email, password, created_at) VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
        // Execute the statement with the provided values
        $stmt->execute([$full_name, $email, $password]);

        echo "Extension worker added successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
