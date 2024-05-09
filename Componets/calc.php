<!DOCTYPE html>
<html>
<head>
    <title>Seed Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px auto;
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
    </style>
    <script>
        // Function to validate form before submission
        function validateForm() {
            var option = document.forms["seedForm"]["calc_option"].value;
            var seedSpacing = document.forms["seedForm"]["seed_spacing"].value;
            var areaOfLand = document.forms["seedForm"]["area_of_land"].value;
            var seedDensity = document.forms["seedForm"]["seed_density"].value;
            var totalSeeds = document.forms["seedForm"]["total_seeds"].value;

            // Check if all fields are empty
            if (seedSpacing == '' && areaOfLand == '' && seedDensity == '' && totalSeeds == '') {
                alert("Please fill at least one field.");
                return false;
            }

            // Check if all fields are filled
            if (seedSpacing != '' && areaOfLand != '' && seedDensity != '' && totalSeeds != '') {
                alert("Please fill only one field.");
                return false;
            }

            // Check if exactly three fields are filled
            var filledCount = 0;
            if (seedSpacing != '') filledCount++;
            if (areaOfLand != '') filledCount++;
            if (seedDensity != '') filledCount++;
            if (totalSeeds != '') filledCount++;

            if (filledCount != 3) {
                alert("Please fill exactly three fields.");
                return false;
            }

            // If everything is valid, allow form submission
            return true;
        }
    </script>
</head>
<body>
    <?php
    // Function to calculate based on selected option
    function calculate($option, $seedSpacing, $areaOfLand, $seedDensity, $totalSeeds) {
        switch ($option) {
            case 'total_seeds':
                $totalSeeds = $areaOfLand * $seedDensity;
                break;
            case 'seed_spacing':
                // You can modify this calculation based on specific requirements or recommendations
                $seedSpacing = 100 * sqrt(10000 / $seedDensity);
                break;
            case 'area_of_land':
                $areaOfLand = $totalSeeds / $seedDensity;
                break;
            case 'seed_density':
                $seedDensity = $totalSeeds / $areaOfLand;
                break;
        }
        return array($seedSpacing, $areaOfLand, $seedDensity, $totalSeeds);
    }

    // Default values
    $seedSpacing = ''; // in cm
    $areaOfLand = ''; // in hectares
    $seedDensity = ''; // seeds per square meter
    $totalSeeds = ''; // in 50kg bags

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $option = $_POST['calc_option'];
        $seedSpacing = $_POST['seed_spacing'];
        $areaOfLand = $_POST['area_of_land'];
        $seedDensity = $_POST['seed_density'];
        $totalSeeds = $_POST['total_seeds'];

        // Calculate based on selected option
        list($seedSpacing, $areaOfLand, $seedDensity, $totalSeeds) = calculate($option, $seedSpacing, $areaOfLand, $seedDensity, $totalSeeds);
    }
    ?>
    <form name="seedForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
        Calculate: 
        <select name="calc_option">
            <option value="total_seeds">Total Seeds</option>
            <option value="seed_spacing">Seed Spacing</option>
            <option value="area_of_land">Area of Land</option>
            <option value="seed_density">Seed Density</option>
        </select><br><br>
        Seed spacing (cm): <input type="text" name="seed_spacing" value="<?php echo isset($seedSpacing) ? $seedSpacing : ''; ?>"><br><br>
        Area of land (hectares): <input type="text" name="area_of_land" value="<?php echo isset($areaOfLand) ? $areaOfLand : ''; ?>"><br><br>
        Seed density (seeds per m²): <input type="text" name="seed_density" value="<?php echo isset($seedDensity) ? $seedDensity : ''; ?>"><br><br>
        Total seeds (kg): <input type="text" name="total_seeds" value="<?php echo isset($totalSeeds) ? $totalSeeds : ''; ?>"><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>
</body>
</html>
