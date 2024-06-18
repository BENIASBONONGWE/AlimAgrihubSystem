<!DOCTYPE html>
<html>
<head>
<title>Animal Feed Calculator</title>
<style>
  body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f9;
  }
  .container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
</style>
</head>
<body>
<div class="container">
  <h1>Animal Feed Calculator</h1>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $animal_count = $_POST["animal_count"];
  $animal_type = $_POST["animal_type"];

  // Define feed composition based on animal type
  $feed_composition = array(
    "cattle" => array(
      "type" => "Malawi Zebu",
      "body_weight" => 250, // Average weight in kg
      "daily_feed_percentage" => 2.25, // Average daily feed intake as a percentage of body weight
      "concentrate" => 30, // Percentage of concentrate in feed
      "roughage" => 70,   // Percentage of roughage in feed
    ),
    "goat" => array(
      "type" => "Boer",
      "body_weight" => 50, // Adjusted weight for example
      "daily_feed_percentage" => 3,
      "concentrate" => 70,
      "roughage" => 30,
    ),
    "pig" => array(
      "type" => "Large White",
      "body_weight" => 100, // Average weight in kg
      "daily_feed_percentage" => 4.5, // Average daily feed intake as a percentage of body weight
      "concentrate" => 70,
      "roughage" => 30,
    ),
    "chicken" => array(  // Breakdown for chicken
      "type" => "Malawi Black",
      "daily_feed_grams" => 100, // Grams per day
      "grains_energy" => 60,
      "proteins" => 25,
      "vitamins_minerals" => 15,
    ),
  );

  // Check if animal type is valid
  if (array_key_exists($animal_type, $feed_composition)) {
    $feed_info = $feed_composition[$animal_type];

    // Calculate total feed amount in kilograms
    if ($animal_type == "chicken") {
      $average_daily_feed_kg = $feed_info["daily_feed_grams"] / 1000; // Convert grams to kg
    } else {
      $average_daily_feed_kg = ($feed_info["body_weight"] * $feed_info["daily_feed_percentage"]) / 100;
    }
    
    $total_feed_days = 7; // Number of days for the calculation

    $total_feed_kg = $animal_count * $average_daily_feed_kg * $total_feed_days;

    echo "<h2>Results</h2>";
    echo "<p>Number of Animals: $animal_count</p>";
    echo "<p>Animal Type: " . $feed_info["type"] . "</p>"; // Use the defined type from the array

    // Display feed composition based on animal type
    if ($animal_type == "chicken") {
      echo "<p>Feed Composition:</p>";
      echo "<ul>";
      echo "<li>Grains and Energy Source: " . $feed_info["grains_energy"] . "%</li>";
      echo "<li>Proteins: " . $feed_info["proteins"] . "%</li>";
      echo "<li>Vitamins and Minerals: " . $feed_info["vitamins_minerals"] . "%</li>";
      echo "</ul>";
    } else {
      $concentrate_kg = ($total_feed_kg * $feed_info["concentrate"]) / 100;
      $roughage_kg = ($total_feed_kg * $feed_info["roughage"]) / 100;

      echo "<p>Concentrate: " . $concentrate_kg . " kg</p>";
      echo "<p>Roughage: " . $roughage_kg . " kg</p>";
    }

    echo "<p>Total Feed Required: " . $total_feed_kg . " kg</p>";
  } else {
    echo "<p>Error: Invalid animal type.</p>";
  }
}
?>

</div>
</body>
</html>
