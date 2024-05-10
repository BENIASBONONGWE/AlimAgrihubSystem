<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seed Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Seed Calculator</h2>
        <form action="farm.php" method="post">
            <div class="form-group">
                <label for="crop">Select Type of Crop:</label>
                <select id="crop" name="crop" required>
                    <option value="wheat">Wheat</option>
                    <option value="corn">Corn</option>
                    <option value="rice">Rice</option>
                </select>
            </div>
            <div class="form-group">
                <label for="calculation">What Do You Want To Compute?:</label>
                <select id="calculation" name="calculation" required>
                    <option value="seed_weight">Seed Weight (kg)</option>
                    <option value="seed_spacing">Seed Spacing (cm)</option>
                    <option value="land_size">Land Size (hectares)</option>
                    <option value="seed_density">Seed Density (seeds/m²)</option>
                </select>
            </div>
            <button type="submit">Next</button>
        </form>
    </div>
</body>
</html>