<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Calculator Result</title>
    <style>
   body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

h1 {
    text-align: center;
    color: #333;
}

#calculator {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.input-group select,
.input-group input[type="number"],
.input-group input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s;
}

.input-group select {
    cursor: pointer;
}

.input-group input[type="number"]:focus,
.input-group input[type="text"]:focus {
    outline: none;
    border-color: #4CAF50;
}

.feed-group {
    margin-top: 20px;
}

.feed-group h2 {
    margin-bottom: 10px;
}

.feed-item {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
}

.feed-item label {
    width: 100px;
    flex-shrink: 0;
}

/* General Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

h1, h2, h3 {
    color: #333;
}

/* Container Styles */
#calculator {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

/* Input Styles */
.input-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.input-group select,
.input-group input[type="number"],
.input-group input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s;
}

.input-group select {
    cursor: pointer;
}

.input-group input[type="number"]:focus,
.input-group input[type="text"]:focus,
.input-group select:focus {
    outline: none;
    border-color: #4CAF50;
}

/* Button Styles */
button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Result Styles */
#result {
    margin-top: 20px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Link Styles */
a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <h1>Feed Calculator Result</h1>

    <?php
    // Retrieve form data
    $animalSpecies = $_POST['animalSpecies'];
    $age = (int)$_POST['age'];
    $weight = (float)$_POST['weight'];
    $activityLevel = $_POST['activityLevel'];
    $healthStatus = $_POST['healthStatus'];

    // Perform feed calculation based on selected species and input values
    $dailyFeed = calculateDailyFeed($animalSpecies, $age, $weight, $activityLevel, $healthStatus);
    $monthlyFeed = $dailyFeed * 30; // Assuming 30 days in a month

    // Display feed calculation results
    echo "<h2>Feed Calculation for $animalSpecies</h2>";
    echo "<p><strong>Daily Feed:</strong> $dailyFeed kg</p>";
    echo "<p><strong>Monthly Feed:</strong> $monthlyFeed kg</p>";

    // Provide simple guidelines or explanations for less educated farmers
    echo "<h3>Feed Information:</h3>";
    echo "<p>For $animalSpecies, you should provide this amount of feed every day to ensure proper nutrition.</p>";
    echo "<p>For the best results, consult with a local veterinarian or agricultural extension service for specific feeding recommendations based on your animal's needs and conditions.</p>";

    // Function to calculate daily feed based on animal species, age, weight, activity level, and health status
    function calculateDailyFeed($species, $age, $weight, $activityLevel, $healthStatus) {
        // Here you can implement specific calculation rules for each animal species
        // For demonstration, let's assume a simple calculation based on weight and age

        switch ($species) {
            case "Cow":
                // Implement calculation for Cow
                // Example: Daily feed is 2% of weight
                return $weight * 0.02;
            case "Horse":
                // Implement calculation for Horse
                // Example: Daily feed is 1.5% of weight
                return $weight * 0.015;
            case "Chicken":
                // Implement calculation for Chicken
                // Example: Daily feed is 0.1 kg per chicken
                return 0.1;
            case "Pig":
                // Implement calculation for Pig
                // Example: Daily feed is 3% of weight
                return $weight * 0.03;
            case "Dog":
                // Implement calculation for Dog
                // Example: Daily feed is 1% of weight
                return $weight * 0.01;
            case "Cat":
                // Implement calculation for Cat
                // Example: Daily feed is 0.5% of weight
                return $weight * 0.005;
            case "Rabbit":
                // Implement calculation for Rabbit
                // Example: Daily feed is 5% of weight
                return $weight * 0.05;
            case "Fish":
                // Implement calculation for Fish
                // Example: Daily feed is 0.2 kg per fish
                return 0.2;
            case "Sheep":
                // Implement calculation for Sheep
                // Example: Daily feed is 1.5% of weight
                return $weight * 0.015;
            case "Goat":
                // Implement calculation for Goat
                // Example: Daily feed is 2% of weight
                return $weight * 0.02;
            default:
                return 0; // Default to 0 if species is not recognized
        }
    }
    ?>

    <p><a href="index.html">Back to Calculator</a></p>
</body>
</html>
