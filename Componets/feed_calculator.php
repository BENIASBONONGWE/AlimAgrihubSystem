<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Feed Calculator for Farmers</h1>
    <div id="calculator">
        <form action="calculate.php" method="post">
            <div class="input-group">
                <label for="animalSpecies">Animal Species:</label>
                <select id="animalSpecies" name="animalSpecies">
                    <option value="Cow">Cow</option>
                    <option value="Horse">Horse</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Pig">Pig</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Rabbit">Rabbit</option>
                    <option value="Fish">Fish</option>
                    <option value="Sheep">Sheep</option>
                    <option value="Goat">Goat</option>
                </select>
            </div>
            <div class="input-group">
                <label for="age">Age (Months):</label>
                <input type="number" id="age" name="age" min="0">
            </div>
            <div class="input-group">
                <label for="weight">Weight (kg):</label>
                <input type="text" id="weight" name="weight" pattern="\d+(\.\d+)?" title="Enter a valid weight">
            </div>
            <div class="input-group">
                <label for="activityLevel">Activity Level:</label>
                <select id="activityLevel" name="activityLevel">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div class="input-group">
                <label for="healthStatus">Health Status:</label>
                <select id="healthStatus" name="healthStatus">
                    <option value="healthy">Healthy</option>
                    <option value="pregnant">Pregnant</option>
                    <option value="recovering">Recovering</option>
                </select>
            </div>
            <div class="feed-group">
                <h2>Feed Information</h2>
                <div class="feed-item">
                    <label for="feed1">Feed 1:</label>
                    <input type="text" id="feed1" name="feed[]" placeholder="Feed name">
                    <input type="number" id="protein1" name="protein[]" placeholder="Protein (%)" min="0">
                    <input type="number" id="fat1" name="fat[]" placeholder="Fat (%)" min="0">
                    <input type="number" id="fiber1" name="fiber[]" placeholder="Fiber (%)" min="0">
                </div>
                <!-- You can add more feed items dynamically using JavaScript if needed -->
            </div>
            <button type="submit">Calculate Feed</button>
        </form>
    </div>
    <div id="result">
        <!-- Feed calculation results will be displayed here -->
    </div>
</body>
</html>
