<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seed Calculator</title>
    <link rel="stylesheet" href="seed.css">
</head>
<body>
    <div class="calculator">
        <h2>Seed Calculator</h2>
        <form method="post">
            <label for="crop">Crop Type:</label>
            <select id="crop" name="crop" onchange="showGerminationRate(this.value)" required>
                <option value="">Select Crop</option>
                <option value="wheat">Wheat</option>
                <option value="maize">Maize</option>
                <option value="rice">Rice/Mpunga</option>
                <option value="beans">Beans/Nyemba</option>
                <option value="groundnuts">Groundnuts/Mtedza</option>
                <option value="soya">Soya</option>
                <option value="sweet potatoes">Sweet Potatoes/Mbatata</option>
                <option value="irish potatoes">Irish Potatoes/Mbatatesi</option>
                <option value="nandolo">Nandolo</option>
                <option value="nsawawa">Nsawawa</option>
                <option value="nzama">Nzama</option>
                <option value="mapira">Mapira</option>
                <option value="mchewere">Mchewere</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="chinese">Chinese</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
                <option value="cassava">Cassava/Chinangwa</option>
            </select><br><br>

            <label for="desired_population">Desired Population:</label>
            <input type="number" id="desired_population" name="desired_population" required><br><br>
            <label for="seed_size">Seed Size(mm):</label>
            <input type="number" id="seed_size" name="seed_size" required><br><br>

            <label for="germination_rate">Germination Rate (%):</label>
            <input type="text" id="germination_rate" name="germination_rate" required><br><br>
            <label for="land_size">Size of Land:</label>
            <select id="land_size" name="land_size" required>
                <option value="0.5">Half Acre</option>
                <option value="1">1 Acre</option>
                <option value="2">2 Acres</option>
                <option value="3">3 Acres</option>
                <option value="4">4 Acres</option>
                <option value="5">5 Acres</option>
                <option value="6">6 Acres</option>
                <option value="1">1 Hectare</option>
                <option value="2">2 Hectares</option>
                <option value="3">3 Hectares</option>
            </select><br><br>

            <input type="submit" value="Calculate">
            <button type="button" onclick="clearResults()">Clear Results</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $crop = $_POST['crop'];
            $desired_population = $_POST['desired_population'];
            $seed_size = $_POST['seed_size'];
            $germination_rate = $_POST['germination_rate'];
            $seeds_needed = ceil($desired_population / ($germination_rate / 100));
            $total_seed_weight = $seeds_needed * $seed_size;
            $land_size = $_POST['land_size'];
            
            echo "<p>Seeds needed: $seeds_needed </p>";
            echo "<p>Total seed weight needed: $total_seed_weight (grams) </p>";
        }
        ?>
    </div>

    <script>
        function showGerminationRate(crop) {
            var germinationRate = 0;
            var desiredPopulation = 0;
            switch (crop) {
                case "wheat":
                    germinationRate = 85;
                    desiredPopulation = 20000;
                    break;
                case "maize":
                    germinationRate = 90;
                    desiredPopulation = 25000;
                    break;
                case "rice":
                    germinationRate = 95;
                    desiredPopulation = 30000;
                    break;
                case "beans":
                    germinationRate = 96;
                    desiredPopulation = 40000;
                    break;
                case "groundnuts":
                    germinationRate = 98;
                    desiredPopulation = 50000;
                    break;
                case "soya":
                    germinationRate = 88;
                    desiredPopulation = 45000;
                    break;
                case "sweet potatoes":
                    germinationRate = 85;
                    desiredPopulation = 60000;
                    break;
                case "irish potatoes":
                    germinationRate = 80;
                    desiredPopulation = 55000;
                    break;
                case "nandolo":
                    germinationRate = 75;
                    desiredPopulation = 70000;
                    break;
                case "nsawawa":
                    germinationRate = 90;
                    desiredPopulation = 65000;
                    break;
                case "nzama":
                    germinationRate = 89;
                    desiredPopulation = 50000;
                    break;
                case "mapira":
                    germinationRate = 90;
                    desiredPopulation = 80000;
                    break;
                case "mchewere":
                    germinationRate = 87;
                    desiredPopulation = 90000;
                    break;
                case "cassava":
                    germinationRate = 87;
                    desiredPopulation = 20000;
                    break;
                default:
                    germinationRate = 0;
                    desiredPopulation = 0;
                    break;
                    
            }
            document.getElementById("germination_rate").value = germinationRate;
            document.getElementById("desired_population").value = desiredPopulation;
        }

        function clearResults() {
            document.getElementById("germination_rate").value = "";
            document.getElementById("desired_population").value = "";
        }
    </script>
</body>
</html>