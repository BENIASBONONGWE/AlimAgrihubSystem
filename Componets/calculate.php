<!DOCTYPE html>
<html>
<head>
    <title>Seed and Seedling Spacing Results</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1, h2 {
            color: #4CAF50;
            align-items: center;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .button:hover {
            background-color: #45a049;
        }
        .results {
            margin-top: 20px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
        }
        .result-item {
            margin-bottom: 10px;
        }
        .center-heading {
            text-align: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const cropType = document.getElementById('crop_type_val').innerText;
            const rowLength = document.getElementById('row_length_val').innerText;
            const numRows = document.getElementById('num_rows_val').innerText;
            const seedDistance = document.getElementById('seed_distance').innerText;
            const seedlingDistance = document.getElementById('seedling_distance').innerText;
            const seedsInRow = document.getElementById('seeds_in_row').innerText;
            const totalSeeds = document.getElementById('total_seeds').innerText;
            const seedlingsInRow = document.getElementById('seedlings_in_row').innerText;
            const totalSeedlings = document.getElementById('total_seedlings').innerText;
            const areaAcres = document.getElementById('area_acres_val').innerText;
            const areaSqMeters = document.getElementById('area_sq_meters_val').innerText;

            doc.text("Seed and Seedling Spacing Results", 10, 10);
            doc.text(`Crop Type: ${cropType}`, 10, 20);
            doc.text(`Row Length: ${rowLength} meters`, 10, 30);
            doc.text(`Seed Distance: ${seedDistance} meters`, 10, 40);
            doc.text(`Seedling Distance: ${seedlingDistance} meters`, 10, 50);
            doc.text(`Number of Rows: ${numRows}`, 10, 60);
            doc.text(`Total Area: ${areaAcres} acres (${areaSqMeters} square meters)`, 10, 70);
            doc.text("Results:", 10, 80);
            doc.text(`Seeds in a Row: ${seedsInRow}`, 10, 90);
            doc.text(`Total Seeds Needed: ${totalSeeds}`, 10, 100);
            doc.text(`Seedlings in a Row: ${seedlingsInRow}`, 10, 110);
            doc.text(`Total Seedlings Needed: ${totalSeedlings}`, 10, 120);

            doc.save("Seed_Seedling_Spacing_Results.pdf");
        }
    </script>
</head>
<body>
<h1 class="center-heading">Seed and Seedling Spacing Results</h1>
    <?php
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve input values
            $crop_type = $_POST['crop_type'];
            $row_length = $_POST['row_length'];
            $num_rows = $_POST['num_rows'];
            $area_acres = $_POST['area_acres'];

            // Convert acres to square meters (1 acre = 4046.86 square meters)
            $area_sq_meters = $area_acres * 4046.86;

            // Define crop-specific spacing (in meters)
            $crop_spacing = array(
                "maize" => array("seed_distance" => 0.25, "seedling_distance" => 0.30),
                "cassava" => array("seed_distance" => 1.00, "seedling_distance" => 1.00),
                "sweet_potatoes" => array("seed_distance" => 0.20, "seedling_distance" => 0.30),
                "groundnuts" => array("seed_distance" => 0.10, "seedling_distance" => 0.15),
                "beans" => array("seed_distance" => 0.05, "seedling_distance" => 0.10),
                "rice" => array("seed_distance" => 0.15, "seedling_distance" => 0.20),
                "sorghum" => array("seed_distance" => 0.10, "seedling_distance" => 0.15),
                "millet" => array("seed_distance" => 0.05, "seedling_distance" => 0.10),
                "pigeon_peas" => array("seed_distance" => 0.50, "seedling_distance" => 0.60),
                "tobacco" => array("seed_distance" => 0.40, "seedling_distance" => 0.50)
            );

            // Get spacing for selected crop
            $seed_distance = $crop_spacing[$crop_type]['seed_distance'];
            $seedling_distance = $crop_spacing[$crop_type]['seedling_distance'];

            // Calculate seeds in a row
            $seeds_in_row = floor($row_length / $seed_distance);
            $total_seeds = $seeds_in_row * $num_rows;

            // Calculate seedlings in a row
            $seedlings_in_row = floor($row_length / $seedling_distance);
            $total_seedlings = $seedlings_in_row * $num_rows;

            // Display results
            echo "<div class='results'>";
            echo "<div class='result-item'><strong>Crop Type:</strong> <span id='crop_type_val'>" . ucfirst(str_replace('_', ' ', $crop_type)) . "</span></div>";
            echo "<div class='result-item'><strong>Row Length:</strong> <span id='row_length_val'>" . $row_length . "</span> meters</div>";
            echo "<div class='result-item'><strong>Seed Distance:</strong> <span id='seed_distance'>" . $seed_distance . "</span> meters</div>";
            echo "<div class='result-item'><strong>Seedling Distance:</strong> <span id='seedling_distance'>" . $seedling_distance . "</span> meters</div>";
            echo "<div class='result-item'><strong>Number of Rows:</strong> <span id='num_rows_val'>" . $num_rows . "</span></div>";
            echo "<div class='result-item'><strong>Total Area:</strong> <span id='area_acres_val'>" . $area_acres . "</span> acres (<span id='area_sq_meters_val'>" . round($area_sq_meters, 2) . "</span> square meters)</div>";
            echo "<h2>Results:</h2>";
            echo "<div class='result-item'><strong>Seeds in a Row:</strong> <span id='seeds_in_row'>" . $seeds_in_row . "</span></div>";
            echo "<div class='result-item'><strong>Total Seeds Needed:</strong> <span id='total_seeds'>" . $total_seeds . "</span></div>";
            echo "<div class='result-item'><strong>Seedlings in a Row:</strong> <span id='seedlings_in_row'>" . $seedlings_in_row . "</span></div>";
            echo "<div class='result-item'><strong>Total Seedlings Needed:</strong> <span id='total_seedlings'>" . $total_seedlings . "</span></div>";
            echo "</div>";
            echo '<button class="button" onclick="downloadPDF()">Download PDF</button>';
        } else {
            echo "<p>No data received.</p>";
        }
    ?>
    <a href="seedcalculator.php" class="button">Go Back</a>
</body>
</html>
