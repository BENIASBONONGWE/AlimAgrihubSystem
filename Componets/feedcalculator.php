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
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
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
        select, input[type="number"], input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #218838;
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
    </style>
    <script>
        function updateWeightLimits() {
            const animal = document.getElementById("animal").value;
            const weightInput = document.getElementById("weight");

            let minWeight, maxWeight;
            switch (animal) {
                case 'goat':
                    minWeight = 20;
                    maxWeight = 70;
                    break;
                case 'sheep':
                    minWeight = 20;
                    maxWeight = 75;
                    break;
                case 'cattle':
                    minWeight = 200;
                    maxWeight = 600;
                    break;
                case 'pig':
                    minWeight = 20;
                    maxWeight = 180;
                    break;
                case 'chicken':
                    minWeight = 0.5;
                    maxWeight = 3;
                    break;
                case 'duck':
                    minWeight = 0.5;
                    maxWeight = 3;
                    break;
                case 'turkey':
                    minWeight = 1;
                    maxWeight = 10;
                    break;
                case 'rabbit':
                    minWeight = 0.5;
                    maxWeight = 2.5;
                    break;
                case 'guinea_fowl':
                    minWeight = 0.5;
                    maxWeight = 2;
                    break;
                default:
                    minWeight = 0;
                    maxWeight = 100;
            }
            weightInput.min = minWeight;
            weightInput.max = maxWeight;
            weightInput.value = '';  // Reset value when animal is changed
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Feed Calculator</h1>
        <form action="" method="post">
            <label for="animal">Type of Animal:</label>
            <select id="animal" name="animal" onchange="updateWeightLimits()" required>
                <option value="goat">Goat</option>
                <option value="sheep">Sheep</option>
                <option value="cattle">Cattle</option>
                <option value="pig">Pig</option>
                <option value="chicken">Chicken</option>
                <option value="duck">Duck</option>
                <option value="turkey">Turkey</option>
                <option value="rabbit">Rabbit</option>
                <option value="guinea_fowl">Guinea Fowl</option>
            </select><br><br>

            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" step="0.01" required><br><br>

            <label for="number_of_animals">Number of Animals:</label>
            <input type="number" id="number_of_animals" name="number_of_animals" min="1" value="1" required><br><br>

            <input type="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $animal = isset($_POST['animal']) ? $_POST['animal'] : null;
            $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : null;
            $number_of_animals = isset($_POST['number_of_animals']) ? intval($_POST['number_of_animals']) : 1;

            if ($animal && $weight && $number_of_animals) {
                // Define weight limits for validation
                $limits = [
                    'goat' => [20, 70],
                    'sheep' => [20, 75],
                    'cattle' => [200, 600],
                    'pig' => [20, 180],
                    'chicken' => [0.5, 3],
                    'duck' => [0.5, 3],
                    'turkey' => [1, 10],
                    'rabbit' => [0.5, 2.5],
                    'guinea_fowl' => [0.5, 2]
                ];

                if (isset($limits[$animal]) && $weight >= $limits[$animal][0] && $weight <= $limits[$animal][1]) {
                    $feedAmountPerAnimal = calculateFeedAmount($animal, $weight);
                    $totalFeedAmount = $feedAmountPerAnimal * $number_of_animals;

                    echo "<div class='result'>";
                    echo "<h2>Feed Calculator Result</h2>";
                    echo "<p>Animal: " . htmlspecialchars($animal) . "</p>";
                    echo "<p>Weight: " . htmlspecialchars($weight) . " kg</p>";
                    echo "<p>Number of Animals: " . htmlspecialchars($number_of_animals) . "</p>";
                    echo "<p>Feed Amount per Animal: " . htmlspecialchars($feedAmountPerAnimal) . " kg/day</p>";
                    echo "<p>Total Feed Amount: " . htmlspecialchars($totalFeedAmount) . " kg/day</p>";
                    echo "</div>";
                } else {
                    echo "<p class='error'>Error: Weight must be between " . $limits[$animal][0] . " and " . $limits[$animal][1] . " kg for a " . htmlspecialchars($animal) . ".</p>";
                }
            } else {
                echo "<p class='error'>Error: Please provide animal type, weight, and number of animals.</p>";
            }
        }

        function calculateFeedAmount($animal, $weight) {
            switch ($animal) {
                case 'goat':
                case 'sheep':
                    $feedAmount = $weight * 0.02;  // 2% to 4% of body weight
                    break;
                case 'cattle':
                    $feedAmount = $weight * 0.025;  // Average 2.5% of body weight for beef cattle
                    break;
                case 'pig':
                    $feedAmount = ($weight / 100) * 3;  // Average 3 kg for 100 kg pig
                    break;
                case 'chicken':
                    $feedAmount = 0.125;  // Average 125 g for broiler chicken
                    break;
                case 'duck':
                    $feedAmount = 0.175;  // Average 175 g for duck
                    break;
                case 'turkey':
                    $feedAmount = 0.35;  // Average 350 g for mature turkey
                    break;
                case 'rabbit':
                    $feedAmount = 0.09;  // Average 90 g for rabbit
                    break;
                case 'guinea_fowl':
                    $feedAmount = 0.125;  // Average 125 g for guinea fowl
                    break;
                default:
                    $feedAmount = 0;
            }

            // Convert feedAmount from grams to kilograms if necessary
            if (in_array($animal, ['chicken', 'duck', 'turkey', 'rabbit', 'guinea_fowl'])) {
                $feedAmount /= 1000;  // Convert grams to kilograms
            }

            return $feedAmount;
        }
        ?>
    </div>
</body>
</html>
