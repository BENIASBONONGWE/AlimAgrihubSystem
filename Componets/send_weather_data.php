
<?php

// Establish database connection
include_once "db.php";
// Get the JSON data sent from JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Extract weather details and other data
$weatherData = $data['weather'];
$cityName = $data['city']['name'];
$countryCode = $data['city']['country'];

// Insert weather data into the database
foreach ($weatherData as $weather) {
    $date = $weather['date'];
    $time = $weather['time'];
    $weatherDescription = $weather['weatherDescription'];
    $temperature = $weather['temperature'];
    $humidity = $weather['humidity'];
    $rainfall = $weather['rainfall'];
    $windSpeed = $weather['windSpeed'];
    $windDirection = $weather['windDirection'];
    $farmingAdvice = $weather['farmingAdvice'];

    $sql = "INSERT INTO weather_data (date, time, weather_description, temperature, humidity, rainfall, wind_speed, wind_direction, farming_advice, city_name, country_code)
            VALUES ('$date', '$time', '$weatherDescription', '$temperature', '$humidity', '$rainfall', '$windSpeed', '$windDirection', '$farmingAdvice', '$cityName', '$countryCode')";

    if ($conn->query($sql) === TRUE) {
        echo "Weather data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
