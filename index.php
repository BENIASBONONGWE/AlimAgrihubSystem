<?php
include 'db.php';

// Fetch crops from database
$sql = "SELECT * FROM crops";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seed Calculator</title>
    <link rel="stylesheet" type="text/css" href="seed.css">
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
<body><div class="calculator">
    <h1>Seed Calculator</h1>
    <form method="post" action="calculate.php">
        <div class="form-group">
            <label for="crop">Select Crop:</label>
            <select id="crop" name="crop" onchange="toggleOtherCropFields()">
                <?php while($row = $result->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?> (<?= $row['type'] ?>)</option>
                <?php endwhile; ?>
                <option value="other">Other</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="land_size">Enter Land Size (in acres):</label>
            <input type="number" id="land_size" name="land_size" step="0.01" required>
        </div>
        
        <input type="submit" value="Calculate">
    </form>
</div>

    
</body>
</html>

<?php
$conn->close();
?>
