<?php
// Include database configuration
include_once "db.php";

if (isset($_POST['location'])) {
    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare statement to fetch phone numbers for the selected location
        $sql = "SELECT phone_number FROM farmers WHERE location = :location";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':location', $_POST['location'], PDO::PARAM_STR);
        $stmt->execute();
        $phoneNumbers = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        // Return phone numbers as JSON
        echo json_encode($phoneNumbers);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
