<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seed Calculator - Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Seed Calculator - Result</h2>
        <?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$crop = $_POST['crop'];
$calculation = $_POST['calculation'];
$seed_spacing = isset($_POST['seed_spacing']) ? $_POST['seed_spacing'] : null;
$land_size = isset($_POST['land_size']) ? $_POST['land_size'] : null;
$seed_density = isset($_POST['seed_density']) ? $_POST['seed_density'] : null;
$seed_weight = isset($_POST['seed_weight']) ? $_POST['seed_weight'] : null;


echo "<p>Selected Crop: " . ucfirst($crop) . "</p>";
echo "<p>Selected Calculation: " . str_replace("_", " ", ucfirst($calculation)) . "</p>";
switch ($calculation) {
    case 'seed_weight':
        if ($seed_spacing && $land_size && $seed_density) {
          
            $seed_weight = ($seed_spacing * $seed_density * $land_size) / 1000;
            echo "<p>Calculated Seed Weight (kg): " . number_format($seed_weight, 2) . "</p>";
        }
        break;
    case 'seed_spacing':
        if ($seed_weight && $land_size && $seed_density) {
            $seed_spacing = ($seed_weight * 1000) / ($seed_density * $land_size);
            echo "<p>Calculated Seed Spacing (cm): " . number_format($seed_spacing, 2) . "</p>";
        }
        break;
    case 'land_size':
        if ($seed_weight && $seed_spacing && $seed_density) {
            $land_size = ($seed_weight * 1000) / ($seed_spacing * $seed_density);
            echo "<p>Calculated Land Size (hectares): " . number_format($land_size, 2) . "</p>";
        }
        break;
    case 'seed_density':
        if ($seed_weight && $seed_spacing && $land_size) {
           
            $seed_density = ($seed_weight * 1000) / ($seed_spacing * $land_size);
            echo "<p>Calculated Seed Density (seeds/m²): " . number_format($seed_density, 2) . "</p>";
        }
        break;
    default:
        echo "<p>Invalid Calculation Selected</p>";
        break;
}
?>

        <form action="seed.php">
            <button type="submit">Back to Calculator</button>
        </form>
        </div>
</body>
</htm
