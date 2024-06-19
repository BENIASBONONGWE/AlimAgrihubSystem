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
      "body_weight" => 325, // Average weight in kg
      "daily_feed_min_percentage" => 2, // Minimum daily feed intake as a percentage of body weight
      "daily_feed_max_percentage" => 3, // Maximum daily feed intake as a percentage of body weight
      "water_intake_min" => 30, // Minimum water intake in liters
      "water_intake_max" => 60, // Maximum water intake in liters
    ),
    "goat" => array(
      "type" => "Boer",
      "body_weight" => 80, // Average weight in kg
      "daily_feed_min_percentage" => 3, // Minimum daily feed intake as a percentage of body weight
      "daily_feed_max_percentage" => 4, // Maximum daily feed intake as a percentage of body weight
      "water_intake_min" => 4, // Minimum water intake in liters
      "water_intake_max" => 10, // Maximum water intake in liters
    ),
    "pig" => array(
      "type" => "Large White",
      "body_weight" => 275, // Average weight in kg
      "daily_feed_min_percentage" => 4, // Minimum daily feed intake as a percentage of body weight
      "daily_feed_max_percentage" => 5, // Maximum daily feed intake as a percentage of body weight
      "water_intake_min" => 20, // Minimum water intake in liters
      "water_intake_max" => 40, // Maximum water intake in liters
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
    } else if ($animal_type == "cattle" || $animal_type == "goat" || $animal_type == "pig") {
      $daily_feed_min_kg = ($feed_info["body_weight"] * $feed_info["daily_feed_min_percentage"]) / 100;
      $daily_feed_max_kg = ($feed_info["body_weight"] * $feed_info["daily_feed_max_percentage"]) / 100;
      $average_daily_feed_kg = ($daily_feed_min_kg + $daily_feed_max_kg) / 2; // Average feed requirement
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
    } else if ($animal_type == "cattle" || $animal_type == "goat" || $animal_type == "pig") {
      $water_intake_min_liters = $animal_count * $feed_info["water_intake_min"];
      $water_intake_max_liters = $animal_count * $feed_info["water_intake_max"];
      $average_water_intake_liters = ($water_intake_min_liters + $water_intake_max_liters) / 2; // Average water intake
      
      echo "<p><strong>Dry Matter Feed:</strong> " . round($total_feed_kg, 2) . " kg</p>";
      echo "<p><strong>Water Intake:</strong> " . round($average_water_intake_liters, 2) . " liters</p>";
    } else {
      $concentrate_kg = ($total_feed_kg * $feed_info["concentrate"]) / 100;
      $roughage_kg = ($total_feed_kg * $feed_info["roughage"]) / 100;

      echo "<p><strong>Concentrate:</strong> " . round($concentrate_kg, 2) . " kg</p>";
      echo "<p><strong>Roughage:</strong> " . round($roughage_kg, 2) . " kg</p>";
      echo "<p><strong>Total Feed Required:</strong> " . round($total_feed_kg, 2) . " kg for 1 day</p>";
    }
    echo "</div>";

    // Generate a filename based on timestamp
    $filename = 'feed_calculation_' . date('YmdHis') . '.txt';
    // Create content for download
    $content = "Animal Feed Calculation Results\n\n";
    $content .= "Number of Animals: $animal_count\n";
    $content .= "Animal Type: " . $feed_info["type"] . "\n";

    // Additional content based on animal type
    if ($animal_type == "chicken") {
      // Include specific details for chickens
      $content .= "Feed Composition:\n";
      $content .= "- Maize Bran: " . round($maize_bran_kg, 2) . " kg ({$feed_info["maize_bran_percent"]}%)\n";
      $content .= "- Soybean Meal: " . round($soybean_meal_kg, 2) . " kg ({$feed_info["soybean_meal_percent"]}%)\n";
      $content .= "- Salt: " . round($salt_kg, 2) . " kg ({$feed_info["salt_percent"]}%)\n";
    } else if ($animal_type == "cattle" || $animal_type == "goat" || $animal_type == "pig") {
      // Include details for cattle, goats, and pigs
      $content .= "Dry Matter Feed: " . round($total_feed_kg, 2) . " kg\n";
      $content .= "Water Intake: " . round($average_water_intake_liters, 2) . " liters\n";
    } else {
      // Include details for other animals
      $content .= "Concentrate: " . round($concentrate_kg, 2) . " kg\n";
      $content .= "Roughage: " . round($roughage_kg, 2) . " kg\n";
    }

    $content .= "Total Feed Required: " . round($total_feed_kg, 2) . " kg for 1 day\n";

    // Save content to a file
    file_put_contents($filename, $content);

    // Provide download link
    echo "<p><a href='$filename' download>Download Results</a></p>";
  } else {
    echo "<p>Error: Invalid animal type.</p>";
  }
}
?>

</div>
</body>
</html>
