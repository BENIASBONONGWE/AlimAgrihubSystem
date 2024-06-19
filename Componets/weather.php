<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <style>
        /* Your existing CSS styles */
        body {
            display: flex;
            flex-direction: column;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        .navbar {
            width: 100%;
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin-top: 40px;
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        #city {
            text-align: center;
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .weather-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .forecast {
            width: calc(100% - 40px);
            margin: 10px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .forecast .summary {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .forecast .date {
            font-size: 20px;
            font-weight: 300;
            margin-bottom: 10px;
            color: #555;
        }

        .forecast .icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 10px;
        }

        .forecast .temperature {
            font-size: 48px;
            font-weight: 300;
            margin: 10px 0;
        }

        .forecast .details {
            display: flex;
            justify-content: space-around;
            font-size: 14px;
            color: #666;
        }

        .forecast .details div {
            text-align: center;
        }

        @media (max-width: 600px) {
            .forecast {
                width: 100%;
            }
        }

        .summary-section {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
            cursor: pointer; /* Add cursor pointer to indicate clickable */
        }

        .summary-section h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .summary-section p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .message-section {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 12px;
            min-height: 100px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include("nav.php"); ?>
    <!-- Main container -->
    <div class="container">
        <h1>Weather Forecast</h1>
        <div id="city">Locating...</div>
        <div class="weather-info" id="weatherInfo">
            <!-- Weather forecast cards will be dynamically added here -->
        </div>
    </div>

    <!-- New section for summarized action plan -->
    <div class="summary-section" id="summaryActionPlan">
        <h2>Summary Action Plan</h2>
        <div id="summaryText">
            <!-- Summarized action plan will be dynamically added here -->
        </div>
    </div>

    <script>
        function fetchWeatherData(latitude, longitude) {
            const apiKey = '8f5169d74da04b208ad203824241306';
            const apiUrl = `https://api.weatherapi.com/v1/forecast.json?key=${apiKey}&q=${latitude},${longitude}&days=7`; // Fetching weather data for 7 days

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('city').textContent = `City: ${data.location.name}, ${data.location.country}`;
                    displayWeatherForecast(data);
                    generateSummaryActionPlan(data);
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                    document.getElementById('city').textContent = 'Failed to retrieve weather data';
                });
        }

        function displayWeatherForecast(weatherData) {
            const weatherInfoElement = document.getElementById('weatherInfo');
            weatherInfoElement.innerHTML = ''; // Clear previous content

            if (weatherData && weatherData.forecast && weatherData.forecast.forecastday) {
                weatherData.forecast.forecastday.forEach(day => {
                    const forecastElement = document.createElement('div');
                    forecastElement.classList.add('forecast');
                    forecastElement.innerHTML = `
                        <div class="date">${day.date}</div>
                        <div class="summary">${day.day.condition.text}</div>
                        <img class="icon" src="${day.day.condition.icon}" alt="${day.day.condition.text}">
                        <div class="temperature">${day.day.avgtemp_c}°C</div>
                        <div class="details">
                            <div>
                                <div>Humidity</div>
                                <div>${day.day.avghumidity}%</div>
                            </div>
                            <div>
                                <div>Wind</div>
                                <div>${day.day.maxwind_kph} kph</div>
                            </div>
                            <div>
                                <div>Chance of Rain</div>
                                <div>${day.day.daily_chance_of_rain}%</div>
                            </div>
                        </div>
                        <div class="description">
                            <p>${getWeatherDescription(day)}</p>
                        </div>
                    `;
                    weatherInfoElement.appendChild(forecastElement);
                });
            } else {
                weatherInfoElement.innerHTML = '<p>Failed to retrieve weather data</p>';
            }
        }

        function getWeatherDescription(day) {
            const weatherCode = day.day.condition.code;
            const chanceOfRain = day.day.daily_chance_of_rain;

            // Determine weather-related description for both crops and animals
            let description = '';

            // Crop-related advice
            if (chanceOfRain > 50) {
                description += 'Prepare for rain: Ensure drainage systems are clear. Apply fungicides if necessary.<br>';
            } else if (weatherCode >= 800) {
                description += 'Sunny weather: Monitor soil moisture and adjust irrigation as needed. Apply mulch around plants.<br>';
            } else if (weatherCode >= 700) {
                description += 'Hot weather: Provide shade for crops. Increase watering frequency. Harvest sensitive crops early.<br>';
            } else if (weatherCode >= 600) {
                description += 'Cold weather: Protect crops from frost. Delay planting if needed. Monitor plant health closely.<br>';
            } else {
                description += 'General advice: Adjust farming practices based on weather conditions.<br>';
            }

            // Animal-related advice
            description += 'Ensure animals have access to water and shelter. Monitor their health and feed quality.';

            return description;
        }

        function generateSummaryActionPlan(weatherData) {
            const summaryActionPlanElement = document.getElementById('summaryText');
            summaryActionPlanElement.innerHTML = ''; // Clear previous content

            let summaryText = '';

            const forecast = weatherData.forecast.forecastday;
            let actionPlan = '<p>Summary Action Plan for the upcoming week:</p><ul>';

            // Analyze the weather forecast data and generate a summary action plan
            forecast.forEach(day => {
                const weatherDescription = getWeatherDescription(day);
                const summaryDate = day.date;

                actionPlan += `<li><strong>${summaryDate}:</strong> ${weatherDescription}</li>`;
            });

            actionPlan += '</ul>';
            summaryText += actionPlan;

            summaryActionPlanElement.innerHTML = summaryText;

            // Save summary action plan in the session
            saveSummaryActionPlan(summaryText);
        }

        function saveSummaryActionPlan(summary) {
            $.ajax({
                type: "POST",
                url: "save_summary.php",
                data: { summaryActionPlan: summary },
                success: function(response) {
                    console.log("Summary action plan saved:", response);
                },
                error: function(error) {
                    console.error("Error saving summary action plan:", error);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const { latitude, longitude } = position.coords;
                    fetchWeatherData(latitude, longitude);
                }, error => {
                    console.error('Error getting location:', error);
                    document.getElementById('city').textContent = 'Location access denied';
                });
            } else {
                console.error('Geolocation is not supported by this browser.');
                document.getElementById('city').textContent = 'Geolocation is not supported by this browser';
            }
        });
    </script>
</body>
</html>
