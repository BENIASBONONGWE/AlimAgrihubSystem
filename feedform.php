<!DOCTYPE html>
<html>
<head>
    <title>Feed Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }

        .calculator {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Increased width */
            margin: 0 auto; /* Center the calculator horizontally */
            padding: 30px;
        }

        h1 {
            color: #333333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }

        input[type="number"],
        select {
            width: 100%; /* Adjust width to fill the container */
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%; /* Make button fill the container */
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .output {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Adjust width for better fit */
            margin: 20px auto; /* Center the output horizontally */
            padding: 20px;
            text-align: left;
        }

        .calculator form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>Feed Calculator</h1>
        <form action="" method="post">
            <label for="species">Animal Species:</label>
            <select name="species" id="species">
                <option value="cow">Cow</option>
                <option value="rabbit">Rabbit</option>
                <option value="goat">Goat</option>
                <option value="pig">Pig</option>
                <option value="fish">Fish</option>
                <option value="sheep">Sheep</option>
                <option value="donkey">Donkey</option>
                <option value="chicken">Chicken</option>
            </select><br>

            <label for="age">Age (in months):</label>
            <input type="number" id="age" name="age" required><br>

            <label for="pregnant">Pregnant:</label>
            <select name="pregnant" id="pregnant">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select><br>

            <label for="weight">Weight (in kg):</label>
            <input type="number" id="weight" name="weight" required><br>

            <label for="activity">Activity Level:</label>
            <select name="activity" id="activity">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select><br>

            <label for="health">Health Status:</label>
            <select name="health" id="health">
                <option value="healthy">Healthy</option>
                <option value="unhealthy">Unhealthy</option>
            </select><br>

            <label for="feed_type">Feed Type:</label>
            <select name="feed_type" id="feed_type">
                <option value="concentrate">Concentrate</option>
                <option value="roughages">Roughages</option>
                <option value="mixed">Mixed Feeds</option>
            </select><br>

            <button type="submit">Calculate Feed</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            echo "<div class='output'>";
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
            echo "</div>";
        } else {
            echo "<div class='output'>No feed data found for the selected feed type.</div>";
        }
    }
    ?>
</body>
</html>
