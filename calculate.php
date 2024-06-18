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
    max-width: 500px;
    width: 100%;
  }
  h1 {
    text-align: center;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  label, input, select {
    margin: 10px 0;
  }
  input[type="submit"] {
    background-color: green;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
  }
  input[type="submit"]:hover {
    background-color: darkgreen;
  }
  .result {
    text-align: center;
    margin-top: 20px;
  }
  .result p {
    font-size: 1.1em;
  }
  .result ul {
    list-style-type: none;
    padding: 0;
  }
  .result ul li {
    background: #f9f9f9;
    margin: 5px 0;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
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
      "maize_bran_percent" => 89,
      "soybean_meal_percent" => 10.75,
      "salt_percent" => 0.25,
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
    
    $total_feed_days = 1; // Only for a single day

    $total_feed_kg = $animal_count * $average_daily_feed_kg * $total_feed_days;

    echo "<div class='result'>";
    echo "<h2>Results</h2>";
    echo "<p>Number of Animals: $animal_count</p>";
    echo "<p>Animal Type: " . $feed_info["type"] . "</p>"; // Use the defined type from the array

    // Display feed composition based on animal type
    if ($animal_type == "chicken") {
      $maize_bran_kg = ($feed_info["maize_bran_percent"] / 100) * $total_feed_kg;
      $soybean_meal_kg = ($feed_info["soybean_meal_percent"] / 100) * $total_feed_kg;
      $salt_kg = ($feed_info["salt_percent"] / 100) * $total_feed_kg;

      echo "<p>Feed Composition:</p>";
      echo "<ul>";
      echo "<li><strong>Maize Bran:</strong> " . round($maize_bran_kg, 2) . " kg ({$feed_info["maize_bran_percent"]}%)</li>";
      echo "<li><strong>Soybean Meal:</strong> " . round($soybean_meal_kg, 2) . " kg ({$feed_info["soybean_meal_percent"]}%)</li>";
      echo "<li><strong>Salt:</strong> " . round($salt_kg, 2) . " kg ({$feed_info["salt_percent"]}%)</li>";
      echo "</ul>";
      echo "<p><strong>Total Feed Required:</strong> " . round($total_feed_kg, 2) . " kg for 1 day</p>";
    } else {
      $concentrate_kg = ($total_feed_kg * $feed_info["concentrate"]) / 100;
      $roughage_kg = ($total_feed_kg * $feed_info["roughage"]) / 100;

      echo "<p><strong>Concentrate:</strong> " . round($concentrate_kg, 2) . " kg</p>";
      echo "<p><strong>Roughage:</strong> " . round($roughage_kg, 2) . " kg</p>";
      echo "<p><strong>Total Feed Required:</strong> " . round($total_feed_kg, 2) . " kg for 1 day</p>";
    }
    echo "</div>";
  } else {
    echo "<p>Error: Invalid animal type.</p>";
  }
}
?>

</div>
</body>
</html>
