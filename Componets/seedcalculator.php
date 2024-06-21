<?php
// Define spacing requirements in centimeters and seed weights in kilograms
$spacingRequirements = [
    "maize" => ["plant" => ["min" => 20, "max" => 30], "row" => ["min" => 60, "max" => 80], "seedWeight" => 0.0003, "seedingRate" => 30000],
    "wheat" => ["plant" => ["min" => 15, "max" => 21], "row" => ["min" => 20, "max" => 25], "seedWeight" => 0.00005, "seedingRate" => 1350000],
    "soybeans" => ["plant" => ["min" => 10, "max" => 20], "row" => ["min" => 50, "max" => 60], "seedWeight" => 0.0002, "seedingRate" => 160000],
    "rice" => ["plant" => ["min" => 20, "max" => 24], "row" => ["min" => 30, "max" => 40], "seedWeight" => 0.000025, "seedingRate" => 12500],
    "barley" => ["plant" => ["min" => 12, "max" => 16], "row" => ["min" => 15, "max" => 21], "seedWeight" => 0.000045, "seedingRate" => 1350000],
    "oats" => ["plant" => ["min" => 10, "max" => 12], "row" => ["min" => 20, "max" => 30], "seedWeight" => 0.000035, "seedingRate" => 1350000],
    "potatoes" => ["plant" => ["min" => 30, "max" => 40], "row" => ["min" => 60, "max" => 75], "seedWeight" => 0.1, "seedingRate" => 12500],
    "carrots" => ["plant" => ["min" => 5, "max" => 9], "row" => ["min" => 20, "max" => 25], "seedWeight" => 0.0000015, "seedingRate" => 600000],
    "lettuce" => ["plant" => ["min" => 20, "max" => 25], "row" => ["min" => 30, "max" => 35], "seedWeight" => 0.000001, "seedingRate" => 35000],
    "tomatoes" => [
        "determinate" => ["plant" => ["min" => 35, "max" => 45], "row" => ["min" => 75, "max" => 100], "seedWeight" => 0.0003, "seedingRate" => 2500],
        "indeterminate" => ["plant" => ["min" => 50, "max" => 55], "row" => ["min" => 75, "max" => 100], "seedWeight" => 0.0003, "seedingRate" => 2500]
    ]
];

function calculateSeeds($crop, $variety, $rows, $rowLength, $plantSpacing, $rowSpacing, $spacingRequirements) {
    // Check if variety is set and exists for tomatoes
    if ($crop === 'tomatoes' && (!isset($spacingRequirements[$crop][$variety]) || !isset($spacingRequirements[$crop][$variety]['plant']))) {
        throw new Exception("Invalid tomato variety selected.");
    }

    // Default to minimum spacing if not provided
    if (!$plantSpacing) {
        if ($variety && isset($spacingRequirements[$crop][$variety]['plant'])) {
            $plantSpacing = $spacingRequirements[$crop][$variety]['plant']['min'];
        } else {
            $plantSpacing = $spacingRequirements[$crop]['determinate']['plant']['min']; // Default to determinate variety
        }
    }
    if (!$rowSpacing) {
        if ($variety && isset($spacingRequirements[$crop][$variety]['row'])) {
            $rowSpacing = $spacingRequirements[$crop][$variety]['row']['min'];
        } else {
            $rowSpacing = $spacingRequirements[$crop]['determinate']['row']['min']; // Default to determinate variety
        }
    }

    // Convert row length from meters to centimeters
    $rowLengthCm = $rowLength * 100;

    // Calculate the number of plants per row
    if ($plantSpacing == 0) {
        throw new Exception("Plant spacing cannot be zero.");
    }
    $plantsPerRow = $rowLengthCm / $plantSpacing;

    // Calculate the total number of plants
    if ($rows == 0) {
        throw new Exception("Number of rows cannot be zero.");
    }
    $totalPlants = $rows * $plantsPerRow;

    // Calculate area in acres
    $areaInAcres = ($rowLengthCm * $rows * $rowSpacing) / (10000 * 4046.86); // Conversion factor from sq cm to acres

    if ($areaInAcres == 0) {
        throw new Exception("Area cannot be zero.");
    }

    // Calculate seed weight in kilograms
    if ($crop === 'tomatoes') {
        $seedWeightPerPlant = $spacingRequirements[$crop][$variety]['seedWeight'];
        $seedingRate = $spacingRequirements[$crop][$variety]['seedingRate'];
    } else {
        $seedWeightPerPlant = $spacingRequirements[$crop]['seedWeight'];
        $seedingRate = $spacingRequirements[$crop]['seedingRate'];
    }

    // Calculate the total seed weight based on the area and seeding rate
    $totalSeedWeight = $areaInAcres * $seedingRate * $seedWeightPerPlant;

    return [
        'seedsRequired' => round($totalPlants),
        'seedWeight' => round($totalSeedWeight, 2), // Seed weight in kilograms
        'areaInAcres' => round($areaInAcres, 2),
        'plantSpacing' => $plantSpacing,
        'rowSpacing' => $rowSpacing,
        'crop' => $crop,
        'variety' => $variety,
        'rows' => $rows,
        'rowLength' => $rowLength
    ];
}

// Initialize variables for form input and result/error handling
$results = [];
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $crop = $_POST['crop'];
    $variety = $_POST['variety'] ?? null;
    $rows = $_POST['rows'];
    $rowLength = $_POST['rowLength'];
    $plantSpacing = $_POST['plantSpacing'] ?? null;
    $rowSpacing = $_POST['rowSpacing'] ?? null;

    try {
        if ($crop === 'tomatoes' && (!$variety || !isset($spacingRequirements[$crop][$variety]))) {
            throw new Exception("Please select a valid variety for tomatoes.");
        }
        
        // Calculate results
        $results = calculateSeeds($crop, $variety, $rows, $rowLength, $plantSpacing, $rowSpacing, $spacingRequirements);

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seed Calculator</title>
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
            justify-content: space-between;
            width: 80%;
            margin: 0 auto;
        }
        .form-container, .results-container {
            width: 48%;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2, h3 {
            text-align: center;
        }
        .result {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
        .back-button {
            display: inline-block;
            width: 100px;      /* Fixed width */
            padding: 5px;      /* Adjusted padding */
            font-size: 12px;   /* Smaller font size */
            color: #fff;
            background-color: green;
            text-align: center;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
        
    </style>
</head>
<?php include ("nav.php"); ?>
<br>
<br>
<body>

<h2>Seed Calculator</h2>

<div class="container">
    <div class="form-container">
        <form method="post">
            <label for="crop">Select Crop:</label>
            <select name="crop" id="crop" onchange="updateSpacingGuidance(this.value)">
            <option value="maize3">choose crops below</option>
                <option value="maize">Maize</option>
                <option value="wheat">Wheat</option>
                <option value="soybeans">Soybeans</option>
                <option value="rice">Rice</option>
                <option value="barley">Barley</option>
                <option value="oats">Oats</option>
                <option value="potatoes">Potatoes</option>
                <option value="carrots">Carrots</option>
                <option value="lettuce">Lettuce</option>
                <option value="tomatoes">Tomatoes</option>
            </select>
            <br><br>
            <div id="varietySection" style="display: none;">
                <label for="variety">Select Tomato Variety:</label>
                <select name="variety" id="variety" onchange="updateSpacingGuidance('tomatoes')">
                    <option value="determinate">Determinate</option>
                    <option value="indeterminate">Indeterminate</option>
                </select>
                <br><br>
            </div>
            <label for="rows">Enter Number of Rows:</label>
            <input type="number" name="rows" id="rows" required>
            <br><br>
            <label for="rowLength">Enter Length of Each Row (in meters):</label>
            <input type="number" name="rowLength" id="rowLength" required>
            <br><br>
            <label for="plantSpacing">Enter Plant Spacing (in cm):</label>
            <input type="number" name="plantSpacing" id="plantSpacing" required>
            <span id="plantSpacingGuidance"></span>
            <br><br>
            <label for="rowSpacing">Enter Row Spacing (in cm):</label>
            <input type="number" name="rowSpacing" id="rowSpacing" required>
            <span id="rowSpacingGuidance"></span>
            <br><br>
            <input type="submit" value="Calculate">
        </form>
    </div>

    <div class="results-container">
        <?php if (!empty($results)): ?>
        <div class="results">
            <h3>Seed Calculator Result</h3>
            <p><strong>Entered Values:</strong></p>
            <p>Crop: <?php echo htmlspecialchars($results['crop']); ?></p>
            <?php if ($results['crop'] === 'tomatoes'): ?>
            <p>Variety: <?php echo htmlspecialchars($results['variety']); ?></p>
            <?php endif; ?>
            <p>Number of Rows: <?php echo htmlspecialchars($results['rows']); ?></p>
            <p>Length of Each Row: <?php echo htmlspecialchars($results['rowLength']); ?> meters</p>
            <p>Plant Spacing: <?php echo htmlspecialchars($results['plantSpacing']); ?> cm</p>
            <p>Row Spacing: <?php echo htmlspecialchars($results['rowSpacing']); ?> cm</p>

            <h3>Calculated Results:</h3>
            <p>Seeds required: <?php echo $results['seedsRequired']; ?></p>
            <p>Seed weight: <?php echo $results['seedWeight']; ?> kg</p>
            <p>Land area: <?php echo $results['areaInAcres']; ?> acres</p>
            <p>Plant spacing: <?php echo $results['plantSpacing']; ?> cm</p>
            <p>Row spacing: <?php echo $results['rowSpacing']; ?> cm</p>
        </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
        <div id="error" style="color: red; text-align: center;">
            <h3>Error</h3>
            <p><?php echo $error; ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
const spacingRequirements = <?php echo json_encode($spacingRequirements); ?>;

function updateSpacingGuidance(crop) {
    const variety = document.getElementById('variety').value;
    let plantSpacingMin, plantSpacingMax, rowSpacingMin, rowSpacingMax;

    if (crop === 'tomatoes') {
        document.getElementById('varietySection').style.display = 'block';
        if (spacingRequirements[crop][variety]) {
            plantSpacingMin = spacingRequirements[crop][variety].plant.min;
            plantSpacingMax = spacingRequirements[crop][variety].plant.max;
            rowSpacingMin = spacingRequirements[crop][variety].row.min;
            rowSpacingMax = spacingRequirements[crop][variety].row.max;
        } else {
            plantSpacingMin = 0;
            plantSpacingMax = 0;
            rowSpacingMin = 0;
            rowSpacingMax = 0;
        }
    } else {
        document.getElementById('varietySection').style.display = 'none';
        plantSpacingMin = spacingRequirements[crop].plant.min;
        plantSpacingMax = spacingRequirements[crop].plant.max;
        rowSpacingMin = spacingRequirements[crop].row.min;
        rowSpacingMax = spacingRequirements[crop].row.max;
    }

    // Update guidance texts
    document.getElementById('plantSpacingGuidance').textContent = ` (Recommended: ${plantSpacingMin}-${plantSpacingMax} cm)`;
    document.getElementById('rowSpacingGuidance').textContent = ` (Recommended: ${rowSpacingMin}-${rowSpacingMax} cm)`;
}

// Initial guidance update based on default crop
updateSpacingGuidance(document.getElementById('crop').value);
</script>
<a href="home.php" class="back-button">Back</a>
    <br>
    <br>
</body>
</html>
<?php include ("footer.php"); ?>