<?php
// Nutrient content data
$feeds = [
    'Corn' => ['feed_type' => 'concentrate', 'nutrient_content' => ['protein' => 9, 'fat' => 4, 'fiber' => 2]],
    'Cottonseed' => ['feed_type' => 'concentrate', 'nutrient_content' => ['protein' => 23, 'fat' => 18, 'fiber' => 17]],
    'Barley' => ['feed_type' => 'concentrate', 'nutrient_content' => ['protein' => 12, 'fat' => 1.5, 'fiber' => 5]],
    'Alfalfa' => ['feed_type' => 'roughages', 'nutrient_content' => ['protein' => 17, 'fat' => 1.5, 'fiber' => 22]],
    'Clover' => ['feed_type' => 'roughages', 'nutrient_content' => ['protein' => 15, 'fat' => 2, 'fiber' => 20]],
    'Soybean' => ['feed_type' => 'roughages', 'nutrient_content' => ['protein' => 13, 'fat' => 6, 'fiber' => 5]],
    'Oat hay' => ['feed_type' => 'roughages', 'nutrient_content' => ['protein' => 12, 'fat' => 2, 'fiber' => 8]],
    'Corn Silage' => ['feed_type' => 'roughages', 'nutrient_content' => ['protein' => 8, 'fat' => 3, 'fiber' => 23]],
    'Mixed Mineral Feed' => ['feed_type' => 'mixed', 'nutrient_content' => ['salt' => 5, 'copper' => 0.02, 'iodine' => 0.0001, 'iron' => 0.1]],
];

// Get form input
$species = $_POST['species'];
$age = $_POST['age'];
$pregnant = $_POST['pregnant'];
$weight = $_POST['weight'];
$activity = $_POST['activity'];
$health = $_POST['health'];
$feed_type = $_POST['feed_type'];

// Find the appropriate feed based on feed type
$selected_feed = null;
foreach ($feeds as $feed_name => $feed_data) {
    if ($feed_data['feed_type'] == $feed_type) {
        $selected_feed = $feed_data;
        break;
    }
}

if ($selected_feed) {
    $nutrient_content = $selected_feed['nutrient_content'];

    // Perform calculations (this is a simplified example, adjust based on actual requirements)
    $feed_amount = $weight * ($activity == 'high' ? 1.2 : ($activity == 'medium' ? 1 : 0.8));

    // Adjust for pregnancy
    if ($pregnant == 'yes') {
        $feed_amount *= 1.1;
    }

    // Adjust for health status
    if ($health == 'unhealthy') {
        $feed_amount *= 1.2;
    }

    echo "<h1>Feed Calculation Result</h1>";
    echo "Species: $species<br>";
    echo "Age: $age months<br>";
    echo "Pregnant: $pregnant<br>";
    echo "Weight: $weight kg<br>";
    echo "Activity Level: $activity<br>";
    echo "Health Status: $health<br>";
    echo "Feed Type: $feed_type<br>";
    echo "Recommended Feed Amount: " . round($feed_amount, 2) . " kg/day<br>";
    echo "Nutrient Content: <br>";
    foreach ($nutrient_content as $nutrient => $value) {
        echo ucfirst($nutrient) . ": " . $value . "%<br>";
    }
} else {
    echo "No feed data found for the selected feed type.";
}
?>
