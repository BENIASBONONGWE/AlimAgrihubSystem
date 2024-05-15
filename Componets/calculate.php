<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Calculator Result</title>
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

    <p><a href="feed_calculator.php">Back to Calculator</a></p>
</body>
</html>

