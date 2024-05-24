<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" type="text/css" href="calculate.css"> <!-- Link to your CSS file -->
</head>
<body>
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $crop_id = $_POST['crop'];
    $land_size_acres = $_POST['land_size']; // Land size in acres

    if ($crop_id == 'other') {
        // Use the custom input values
        $crop_name = $_POST['other_name'];
        $crop_type = $_POST['other_type'];
        $spacing = $_POST['other_spacing'];
        $germination_rate = $_POST['other_germination_rate'];
        $seeds_per_kg = $_POST['other_seeds_per_kg'];

        // Validate custom input values
        if (empty($crop_name) || empty($crop_type) || $spacing <= 0 || $germination_rate <= 0 || $seeds_per_kg <= 0) {
            die("Error: All fields for 'Other' crop must be filled out and values must be greater than zero.");
        }
    } else {
        // Fetch crop details from the database
        $sql = "SELECT * FROM crop WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $crop_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $crop = $result->fetch_assoc();

        $crop_name = $crop['name'];
        $crop_type = $crop['type'];
        $spacing = $crop['spacing']; // in meters
        $germination_rate = $crop['germination_rate']; // in percentage
        $seeds_per_kg = $crop['seeds_per_kg']; // seeds per kilogram

        // Validate database values
        if ($spacing <= 0 || $germination_rate <= 0 || $seeds_per_kg <= 0) {
            die("Error: Invalid data for the selected crop.");
        }
    }

    // Convert acres to hectares
    $land_size_hectares = $land_size_acres * 0.404686; // 1 acre = 0.404686 hectares

    // Assuming a square planting pattern
    $plants_per_hectare = 10000 / ($spacing * $spacing);
    $seeds_needed = $plants_per_hectare * $land_size_hectares / ($germination_rate / 100);
    $kg_needed = $seeds_needed / $seeds_per_kg;

    echo "<h1>Seed Calculator Results</h1>";
    echo "<p>Crop: " . htmlspecialchars($crop_name) . " (" . htmlspecialchars($crop_type) . ")</p>";
    echo "<p>Land Size: " . htmlspecialchars($land_size_acres) . " acres</p>"; // Display land size in acres
    echo "<p>Land Size (converted to hectares): " . htmlspecialchars($land_size_hectares) . " hectares</p>";
    echo "<p>Spacing: " . htmlspecialchars($spacing) . " meters</p>";
    echo "<p>Germination Rate: " . htmlspecialchars($germination_rate) . "%</p>";
    echo "<p>Seeds Needed: " . number_format($seeds_needed, 2) . " seeds</p>";
    echo "<p>Seeds Needed: " . number_format($kg_needed, 2) . " kg</p>";
}
?>

<?php
$conn->close();
?>
