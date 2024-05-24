<?php
include 'db.php';

// Fetch crops from database
$sql = "SELECT * FROM crop";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seed Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 300px;
        }

        .calculator {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Increased width */
            margin: 0 auto; /* Center the calculator horizontally */
            padding: 90px;
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
    <script>
        function toggleOtherCropFields() {
            var cropSelect = document.getElementById("crop");
            var otherFields = document.getElementById("otherFields");
            if (cropSelect.value === "other") {
                otherFields.style.display = "block";
            } else {
                otherFields.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <h1>Seed Calculator</h1>
    <div class="calculator">
        <form method="post" action="calculate.php">
            <label for="crop">Select Crop:</label>
            <select id="crop" name="crop" onchange="toggleOtherCropFields()">
                <?php while($row = $result->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?> (<?= $row['type'] ?>)</option>
                <?php endwhile; ?>
                <option value="other">Other</option>
            </select><br><br>

            <div id="otherFields" style="display:none;">
                <label for="other_name">Crop Name:</label>
                <input type="text" id="other_name" name="other_name"><br><br>

                <label for="other_type">Crop Type:</label>
                <input type="text" id="other_type" name="other_type"><br><br>

                <label for="other_spacing">Spacing (meters):</label>
                <input type="number" id="other_spacing" name="other_spacing" step="0.01"><br><br>

                <label for="other_germination_rate">Germination Rate (%):</label>
                <input type="number" id="other_germination_rate" name="other_germination_rate" step="0.01"><br><br>

                <label for="other_seeds_per_kg">Seeds per Kilogram:</label>
                <input type="number" id="other_seeds_per_kg" name="other_seeds_per_kg" step="0.01"><br><br>
            </div>

            <label for="land_size">Enter Land Size (in hectares):</label>
            <input type="number" id="land_size" name="land_size" step="0.01" required><br><br>
            
            <input type="submit" value="Calculate">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
