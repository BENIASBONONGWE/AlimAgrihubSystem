<?php
// Include database configuration
include_once "db.php";

// Check if location is provided via POST
if (isset($_POST['location'])) {
    // Sanitize and store the selected location
    $location = $_POST['location'];

    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to fetch phone numbers for the selected location
        $stmt = $pdo->prepare("SELECT phone_number FROM farmers WHERE location = ?");
        $stmt->execute([$location]);
        $phoneNumbers = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Return phone numbers as JSON
        echo json_encode($phoneNumbers);
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // If location is not provided, return an error message
    echo "Error: Location not provided.";
}
?>
