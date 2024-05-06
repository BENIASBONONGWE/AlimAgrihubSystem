<?php
include_once "db.php";

// Fetch all weather data from the database
$stmt = $conn->prepare("SELECT * FROM weather_data");
$stmt->execute();
$result = $stmt->get_result();
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the statement and database connection
$stmt->close();
$conn->close();

// Return the weather data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
