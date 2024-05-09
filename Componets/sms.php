<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <style>
        /* Reset default browser styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Global styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    color: #333;
    line-height: 1.6;
}

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
}

header {
    text-align: center;
    margin-bottom: 40px;
}

header h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

header p {
    font-size: 18px;
}

main {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.features {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 40px;
}

.feature {
    flex: 0 0 calc(50% - 20px);
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
}

.feature h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.feature p {
    font-size: 16px;
}

.cta {
    flex-basis: 100%;
    text-align: center;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
}

footer {
    text-align: center;
    margin-top: 40px;
    padding: 20px 0;
    background-color: #333;
    color: #fff;
}

footer p {
    font-size: 14px;
}

    </style>


</head>
<body>

<?php
$currentTime = date('l h:i A');
echo "<p>$currentTime</p>";

// Fetch data from weather API (replace this with your actual API call)
function fetchDataFromAPI() {
    // Simulated data for demonstration
    return [
        'weather' => [
            ['description' => 'Cloudy'],
        ],
        'main' => [
            'temp_max' => 25,
            'temp_min' => 15,
            'humidity' => 70,
        ],
        'wind' => [
            'speed' => 10,
        ],
    ];
}

$data = fetchDataFromAPI();

if ($data !== null) {
    if (isset($data['weather'])) {
        $weatherDescription = $data['weather'][0]['description'];
        echo "<p>Weather: $weatherDescription</p>";
    }

    if (isset($data['main'])) {
        $temperatureMax = isset($data['main']['temp_max']) ? $data['main']['temp_max'] : 'N/A';
        $temperatureMin = isset($data['main']['temp_min']) ? $data['main']['temp_min'] : 'N/A';
        echo "<p>Temperature: Max $temperatureMax°C, Min $temperatureMin°C</p>";

        $humidity = isset($data['main']['humidity']) ? $data['main']['humidity'] : 'N/A';
        echo "<p>Humidity: $humidity%</p>";
    }

    if (isset($data['wind'])) {
        $windSpeed = isset($data['wind']['speed']) ? $data['wind']['speed'] : 'N/A';
        echo "<p>Wind: $windSpeed km/h</p>";
    }
} else {
    echo "<p>Weather data not available.</p>";
}
?>

</body>
</html>
