<?php
// Define spacing requirements in centimeters and seed weights in kilograms
$spacingRequirements = [
    "maize" => ["plant" => ["min" => 20, "max" => 30], "row" => ["min" => 60, "max" => 80], "seedWeight" => 0.0003, "seedingRate" => 30000], // average weight and seeding rate
    "wheat" => ["plant" => ["min" => 15, "max" => 21], "row" => ["min" => 20, "max" => 25], "seedWeight" => 0.00005, "seedingRate" => 1350000], // average weight and seeding rate
    "soybeans" => ["plant" => ["min" => 10, "max" => 20], "row" => ["min" => 50, "max" => 60], "seedWeight" => 0.0002, "seedingRate" => 160000], // average weight and seeding rate
    "rice" => ["plant" => ["min" => 20, "max" => 24], "row" => ["min" => 30, "max" => 40], "seedWeight" => 0.000025, "seedingRate" => 12500], // average weight and seeding rate
    "barley" => ["plant" => ["min" => 12, "max" => 16], "row" => ["min" => 15, "max" => 21], "seedWeight" => 0.000045, "seedingRate" => 1350000], // average weight and seeding rate
    "oats" => ["plant" => ["min" => 10, "max" => 12], "row" => ["min" => 20, "max" => 30], "seedWeight" => 0.000035, "seedingRate" => 1350000], // average weight and seeding rate
    "potatoes" => ["plant" => ["min" => 30, "max" => 40], "row" => ["min" => 60, "max" => 75], "seedWeight" => 0.1, "seedingRate" => 12500], // average weight and seeding rate
    "carrots" => ["plant" => ["min" => 5, "max" => 9], "row" => ["min" => 20, "max" => 25], "seedWeight" => 0.0000015, "seedingRate" => 600000], // average weight and seeding rate
    "lettuce" => ["plant" => ["min" => 20, "max" => 25], "row" => ["min" => 30, "max" => 35], "seedWeight" => 0.000001, "seedingRate" => 35000], // average weight and seeding rate
    "tomatoes" => [
        "determinate" => ["plant" => ["min" => 35, "max" => 45], "row" => ["min" => 75, "max" => 100], "seedWeight" => 0.0003, "seedingRate" => 2500], // average weight and seeding rate
        "indeterminate" => ["plant" => ["min" => 50, "max" => 55], "row" => ["min" => 75, "max" => 100], "seedWeight" => 0.0003, "seedingRate" => 2500] // average weight and seeding rate
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
        'rowSpacing' => $rowSpacing
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
        }
        form {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
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
        #results {
            width: 60%;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f0f0f0;
            text-align: center;
        }
    </style>
</head>
<?php include ("nav.php"); ?>
<body>

<h2>Seed Calculator</h2>

<form method="post">
    <label for="crop">Select Crop:</label>
    <select name="crop" id="crop" onchange="updateSpacingGuidance(this.value)">
        <option value="maize">maize</option>
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

<?php if (!empty($results)): ?>
<div id="results">
    <h3>Results</h3>
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

</body>
</html>
<?php include ("footer.php"); ?>
