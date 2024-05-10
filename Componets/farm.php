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
        $crop = $_POST['crop'];
        $calculation = $_POST['calculation'];

        echo "<p>You have Selected: " . ucfirst($crop) . "</p>";
        echo "<p>You have Selected: " . str_replace("_", " ", ucfirst($calculation)) . "</p>";

        switch ($calculation) {
            case 'seed_weight':
            case 'seed_spacing':
            case 'land_size':
            case 'seed_density':
                echo '<form action="calculate.php" method="post">
                        <input type="hidden" name="crop" value="' . $crop . '">
                        <input type="hidden" name="calculation" value="' . $calculation . '">';

                if ($calculation != 'seed_weight') {
                    echo '<div class="form-group">
                            <label for="seed_weight">Enter Seed Weight (kg):</label>
                            <input type="number" id="seed_weight" name="seed_weight" step="any" required>
                        </div>';
                }

                if ($calculation != 'seed_spacing') {
                    echo '<div class="form-group">
                            <label for="seed_spacing">Enter Seed Spacing (cm):</label>
                            <input type="number" id="seed_spacing" name="seed_spacing" step="any" required>
                        </div>';
                }

                if ($calculation != 'land_size') {
                    echo '<div class="form-group">
                            <label for="land_size">Enter Land Size (hectares):</label>
                            <input type="number" id="land_size" name="land_size" step="any" required>
                        </div>';
                }

                if ($calculation != 'seed_density') {
                    echo '<div class="form-group">
                            <label for="seed_density">Enter Seed Density (seeds/m²):</label>
                            <input type="number" id="seed_density" name="seed_density" step="any" required>
                        </div>';
                }

                echo '<button type="submit">Calculate</button>
                    </form>';
                break;
            default:
                echo "<p>Invalid Calculation Selected</p>";
                break;
        }
        ?>
    </div>
</body>
</html>
