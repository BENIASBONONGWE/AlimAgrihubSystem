<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feed Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            display: flex;
            flex-grow: 1;
            padding: 20px;
        }
        .form-container, .result-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 10px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        select, input[type="number"], input[type="submit"], textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #218838;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #1e7e34;
        }
        .result {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
        .error {
            color: #d9534f;
        }
        .warning {
            color: #f0ad4e;
        }
        .back-button {
            display: inline-block;
            width: 100px;
            padding: 5px;
            font-size: 12px;
            color: #fff;
            background-color: green;
            text-align: center;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
    </style>
    <script>
        function updateWeightLimits() {
            const animal = document.getElementById("animal").value;
            const productionStageSelect = document.getElementById("production_stage");

            const mammalStages = ['Growth', 'Lactation', 'Maintenance'];
            const birdStages = ['Growth', 'Laying', 'Maintenance'];

            // Update production stage options based on animal type
            productionStageSelect.innerHTML = '';
            const stages = (animal === 'chicken' || animal === 'duck' || animal === 'turkey' || animal === 'guinea_fowl') ? birdStages : mammalStages;
            stages.forEach(stage => {
                const option = document.createElement('option');
                option.value = stage.toLowerCase();
                option.text = stage;
                productionStageSelect.add(option);
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("animal").addEventListener("change", updateWeightLimits);
            // Restore the production stage if it was previously selected
            const selectedStage = "<?php echo isset($_POST['production_stage']) ? $_POST['production_stage'] : ''; ?>";
            if (selectedStage) {
                document.getElementById("production_stage").value = selectedStage;
            }
        });
    </script>
</head>
<body>
    <?php include("nav.php"); ?>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="form-container">
            <h1>Feed Calculator</h1>
            <form action="" method="post">
                <label for="animal">Type of Animal:</label>
                <select id="animal" name="animal" onchange="updateWeightLimits()" required>
                    <option value="goat1" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'goat1') echo 'selected'; ?>>Select below</option>
                    <option value="goat" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'goat') echo 'selected'; ?>>Goat</option>
                    <option value="sheep" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'sheep') echo 'selected'; ?>>Sheep</option>
                    <option value="cattle" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'cattle') echo 'selected'; ?>>Cattle</option>
                    <option value="pig" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'pig') echo 'selected'; ?>>Pig</option>
                    <option value="chicken" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'chicken') echo 'selected'; ?>>Chicken</option>
                    <option value="duck" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'duck') echo 'selected'; ?>>Duck</option>
                    <option value="turkey" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'turkey') echo 'selected'; ?>>Turkey</option>
                    <option value="rabbit" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'rabbit') echo 'selected'; ?>>Rabbit</option>
                    <option value="guinea_fowl" <?php if (isset($_POST['animal']) && $_POST['animal'] == 'guinea_fowl') echo 'selected'; ?>>Guinea Fowl</option>
                </select>

                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" step="0.01" value="<?php echo isset($_POST['weight']) ? htmlspecialchars($_POST['weight']) : ''; ?>" required>

                <label for="number_of_animals">Number of Animals:</label>
                <input type="number" id="number_of_animals" name="number_of_animals" min="1" value="<?php echo isset($_POST['number_of_animals']) ? htmlspecialchars($_POST['number_of_animals']) : 1; ?>" required>

                <label for="production_stage">Production Stage:</label>
                <select id="production_stage" name="production_stage" required>
                    <!-- Options will be populated based on animal type -->
                </select>

                <input type="submit" value="Calculate">
            </form>
        </div>

        <div class="result-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $animal = isset($_POST['animal']) ? $_POST['animal'] : null;
                $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : null;
                $number_of_animals = isset($_POST['number_of_animals']) ? intval($_POST['number_of_animals']) : 1;
                $production_stage = isset($_POST['production_stage']) ? $_POST['production_stage'] : null;

                if ($animal && $weight && $number_of_animals && $production_stage) {
                    echo "<div class='result'>";
                    echo "<h2>Submitted Inputs</h2>";
                    echo "<p>Animal: " . htmlspecialchars($animal) . "</p>";
                    echo "<p>Weight: " . htmlspecialchars($weight) . " kg</p>";
                    echo "<p>Number of Animals: " . htmlspecialchars($number_of_animals) . "</p>";
                    echo "<p>Production Stage: " . htmlspecialchars($production_stage) . "</p>";
                    echo "</div>";

                    // Define weight limits for validation purposes
                    $limits = [
                        'goat' => [10, 70],
                        'sheep' => [10, 75],
                        'cattle' => [48, 600],
                        'pig' => [10, 180],
                        'chicken' => [0.5, 3],
                        'duck' => [0.5, 3],
                        'turkey' => [1, 10],
                        'rabbit' => [0.5, 2.5],
                        'guinea_fowl' => [0.5, 2]
                    ];

                    // Check if the animal type is valid
                    if (isset($limits[$animal])) {
                        // Validate weight against minimum limit
                        if ($weight >= $limits[$animal][0]) {
                            if ($weight > $limits[$animal][1]) {
                                echo "<div class='result warning'>";
                                echo "<p>Warning: Weight exceeds the typical maximum of " . $limits[$animal][1] . " kg for " . htmlspecialchars($animal) . ".</p>";
                                echo "</div>";
                            }

                            // Calculate feed amount per animal based on production stage
                            $feedAmountPerAnimal = calculateFeedAmount($animal, $weight, $production_stage);
                            // Calculate total feed amount
                            $totalFeedAmount = $feedAmountPerAnimal * $number_of_animals;

                            // Display feed calculation results
                            echo "<div class='result'>";
                            echo "<h2>Feed Calculation Results</h2>";
                            echo "<p>Feed Amount per Animal: " . number_format($feedAmountPerAnimal, 2) . " kg/day</p>";
                            echo "<p>Total Feed Amount: " . number_format($totalFeedAmount, 2) . " kg/day for " . htmlspecialchars($number_of_animals) . " " . htmlspecialchars($animal) . "(s)</p>";
                            echo "</div>";
                        } else {
                            echo "<div class='result error'>";
                            echo "<p>Error: Weight must be at least " . $limits[$animal][0] . " kg for " . htmlspecialchars($animal) . ".</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='result error'>";
                        echo "<p>Error: Invalid animal type selected.</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='result error'>";
                    echo "<p>Error: Please provide all required inputs.</p>";
                    echo "</div>";
                }
            }

            function calculateFeedAmount($animal, $weight, $production_stage) {
                $feedAmount = 0;
                switch ($animal) {
                    case 'goat':
                    case 'sheep':
                        if ($production_stage == 'growth') {
                            $feedAmount = $weight * 0.03;  // 3% of body weight
                        } elseif ($production_stage == 'lactation') {
                            $feedAmount = $weight * 0.04;  // 4% of body weight
                        } else {
                            $feedAmount = $weight * 0.025;  // 2.5% of body weight for maintenance
                        }
                        break;
                    case 'cattle':
                        if ($production_stage == 'growth') {
                            $feedAmount = $weight * 0.03;  // 3% of body weight
                        } elseif ($production_stage == 'lactation') {
                            $feedAmount = $weight * 0.04;  // 4% of body weight
                        } else {
                            $feedAmount = $weight * 0.025;  // 2.5% of body weight for maintenance
                        }
                        break;
                    case 'pig':
                        if ($production_stage == 'growth') {
                            $feedAmount = ($weight / 100) * 3;  // 3 kg for 100 kg pig
                        } elseif ($production_stage == 'lactation') {
                            $feedAmount = ($weight / 100) * 3.5;  // 3.5 kg for lactating pig
                        } else {
                            $feedAmount = ($weight / 100) * 2.5;  // 2.5 kg for maintenance pig
                        }
                        break;
                    case 'chicken':
                        if ($production_stage == 'growth') {
                            $feedAmount = 0.13;  // 130 g for broiler chicken
                        } elseif ($production_stage == 'laying') {
                            $feedAmount = 0.15;  // 150 g for laying chicken
                        } else {
                            $feedAmount = 0.12;  // 120 g for maintenance chicken
                        }
                        break;
                    case 'duck':
                        if ($production_stage == 'growth') {
                            $feedAmount = 0.18;  // 180 g for duckling
                        } elseif ($production_stage == 'laying') {
                            $feedAmount = 0.2;  // 200 g for laying duck
                        } else {
                            $feedAmount = 0.17;  // 170 g for maintenance duck
                        }
                        break;
                    case 'turkey':
                        if ($production_stage == 'growth') {
                            $feedAmount = 0.4;  // 400 g for young turkey
                        } elseif ($production_stage == 'laying') {
                            $feedAmount = 0.45;  // 450 g for laying turkey
                        } else {
                            $feedAmount = 0.35;  // 350 g for maintenance turkey
                        }
                        break;
                    case 'rabbit':
                        if ($production_stage == 'growth') {
                            $feedAmount = 0.1;  // 100 g for growing rabbit
                        } elseif ($production_stage == 'maintenance') {
                            $feedAmount = 0.08;  // 80 g for adult rabbit
                        }
                        break;
                    case 'guinea_fowl':
                        if ($production_stage == 'growth') {
                            $feedAmount = 0.14;  // 140 g for young guinea fowl
                        } elseif ($production_stage == 'maintenance') {
                            $feedAmount = 0.12;  // 120 g for adult guinea fowl
                        }
                        break;
                    default:
                        $feedAmount = 0;
                        break;
                }

                return $feedAmount;
            }
            ?>
        </div>
    </div>
    <a href="home.php" class="back-button">Back</a>
    <br>
    <br>
</body>
<?php include("footer.php"); ?>
</html>
