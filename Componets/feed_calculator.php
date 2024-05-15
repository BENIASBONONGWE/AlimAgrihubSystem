

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Calculator</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h1 {
    text-align: center;
    margin-top: 20px;
}

#calculator {
    width: 50%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.input-group {
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
}

.input-group input,
.input-group select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.input-group input[type="number"] {
    -moz-appearance: textfield;
}

.input-group input[type="number"]::-webkit-inner-spin-button,
.input-group input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.feed-group {
    border-top: 1px solid #ccc;
    padding-top: 20px;
    margin-top: 20px;
}

.feed-item {
    margin-bottom: 15px;
}

.feed-item input {
    width: calc(25% - 5px);
    margin-right: 5px;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: green;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button[type="submit"]:hover {
    background-color: green;
}

#result {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.logo {
      height: 150px;
      width: 150px;
      padding-left: 750px;
    }

    .navbar-brand {
      margin-left: 5rem;
    }

    .secondary-logo {
      margin-left: 5rem;
    }
    </style>
    
</head>
<body>

<div class="secondary-logo">
            <img src="images/Logo1.png" alt="Another Logo" class="logo">
        </div>
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
                <input type="number" id="age" name="age" min="0" placeholder="Enter animal's age in months">
            </div>
            <div class="input-group">
                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" min="0" placeholder="Enter animal's weight in kg">
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
                    <label for="feed1">Feed Name:</label>
                    <input type="text" id="feed1" name="feed[]" placeholder="Enter feed name">
                    <label for="protein1">Protein Level:</label>
                    <select id="protein1" name="protein[]">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    <label for="fat1">Fat Level:</label>
                    <select id="fat1" name="fat[]">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    <label for="fiber1">Fiber Level:</label>
                    <select id="fiber1" name="fiber[]">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <!-- You can add more feed items dynamically using JavaScript if needed -->
            </div>
            <button type="submit">Calculate Feed</button>
        </form>
    </div>
    
</body>
<?php include ("footer.php");  ?>
</html>
