<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        #city {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .weather-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .forecast {
            width: calc(50% - 10px);
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
        }

        .forecast p {
            margin: 5px 0;
        }

        .summary {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            cursor: pointer; /* Add cursor pointer for clickable effect */
        }

        .details {
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .forecast {
                width: 100%;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Weather Forecast</h1>
        <div id="city">Locating...</div>
        <div class="weather-info" id="weatherInfo">
            <!-- Weather forecast will be displayed here -->
        </div>
    </div>

    <script>
        function fetchWeatherData(latitude, longitude) {
            const apiUrl = `http://api.openweathermap.org/data/2.5/forecast?lat=${latitude}&lon=${longitude}&units=metric&appid=c75c5b97361b0acfdcd04c629f2b96f2`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    const cityElement = document.getElementById('city');
                    cityElement.textContent = `City: ${data.city.name}, ${data.city.country}`;
                    displayWeatherForecast(data);
                    sendDataToServer(data); // Send data to PHP script
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                });
        }

        function displayWeatherForecast(weatherData) {
            const weatherInfoElement = document.getElementById('weatherInfo');
            weatherInfoElement.innerHTML = ''; // Clear previous content

            if (weatherData) {
                // Display the weather forecast for the next 5 hours
                weatherData.list.slice(0, 5).forEach(forecast => {
                    const date = forecast.dt_txt.split(' ')[0];
                    const time = forecast.dt_txt.split(' ')[1];
                    const { weatherDescription, farmingAdvice } = mapWeatherCondition(forecast.weather[0].id);
                    const temperature = forecast.main.temp;
                    const humidity = forecast.main.humidity;
                    const rainfall = forecast.rain ? forecast.rain['3h'] : 0;
                    const windSpeed = forecast.wind.speed;
                    const windDirection = forecast.wind.deg;

                    const forecastElement = document.createElement('div');
                    forecastElement.classList.add('forecast');
                    forecastElement.innerHTML = `
                        <p class="summary" onclick="showWeatherDetails('${weatherDescription}', ${temperature}, ${humidity}, ${rainfall}, ${windSpeed}, ${windDirection})">${weatherDescription}</p>
                        <div class="details">
                            <p>Date: ${date}</p>
                            <p>Time: ${time}</p>
                            <p>Temperature: ${temperature} °C</p>
                            <p>Humidity: ${humidity} %</p>
                            <p>Rainfall: ${rainfall} mm</p>
                            <p>Wind Speed: ${windSpeed} m/s</p>
                            <p>Wind Direction: ${windDirection}°</p>
                            <p>Farming Advice: ${farmingAdvice}</p>
                        </div>
                    `;
                    weatherInfoElement.appendChild(forecastElement);
                });
            } else {
                weatherInfoElement.innerHTML = '<p>Failed to retrieve weather data</p>';
            }
        }

        function mapWeatherCondition(weatherId) {
            let weatherDescription;
            let farmingAdvice;

            // Map OpenWeatherMap weather condition codes to descriptions and farming advice
            // Adjust the descriptions and advice as needed
            switch (true) {
                case weatherId >= 200 && weatherId < 300:
                    weatherDescription = 'Thunderstorms expected';
                    farmingAdvice = 'Heavy rain expected today. Avoid outdoor activities and secure livestock and equipment.';
                    break;
                case weatherId >= 300 && weatherId < 500:
                    weatherDescription = 'Light rain expected';
                    farmingAdvice = 'Light rain expected today. No significant impact on farming activities.';
                    break;
                case weatherId >= 500 && weatherId < 600:
                    weatherDescription = 'Rain showers expected';
                    farmingAdvice = 'Rain showers expected today. Consider protecting crops and outdoor equipment.';
                    break;
                case weatherId >= 600 && weatherId < 700:
                    weatherDescription = 'Snowfall expected';
                    farmingAdvice = 'Snowfall expected today. Take precautions to protect crops and livestock from the cold.';
                    break;
                case weatherId >= 700 && weatherId < 800:
                    weatherDescription = 'Mist or fog expected';
                    farmingAdvice = 'Mist or fog expected today. Be cautious when working outdoors, visibility may be low.';
                    break;
                case weatherId === 800:
                    weatherDescription = 'Clear skies';
                    farmingAdvice = 'Clear skies today. Ideal conditions for farming activities.';
                    break;
                case weatherId === 801 || weatherId === 802:
                    weatherDescription = 'Partly cloudy skies';
                    farmingAdvice = 'Partly cloudy skies today. No significant impact on farming activities.';
                    break;
                case weatherId === 803 || weatherId === 804:
                    weatherDescription = 'Overcast skies';
                    farmingAdvice = 'Overcast skies today. Monitor weather updates for any changes.';
                    break;
                default:
                    weatherDescription = 'Weather conditions expected';
                    farmingAdvice = 'Weather conditions expected. Monitor weather updates for farming planning.';
            }

            return { weatherDescription, farmingAdvice };
        }

        function showWeatherDetails(weatherDescription, temperature, humidity, rainfall, windSpeed, windDirection) {
            // Your pop-up message logic here
        }

        function sendDataToServer(data) {
            const xhr = new XMLHttpRequest();
            const url = 'send_weather_data.php';
            const jsonData = JSON.stringify(data);

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    console.log('Data sent successfully');
                } else {
                    console.error('Failed to send data');
                }
            };

            xhr.onerror = function () {
                console.error('Network Error');
            };

            xhr.send(jsonData);
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    fetchWeatherData(latitude, longitude);
                }, error => {
                    console.error('Error getting user location:', error);
                    document.getElementById('weatherInfo').innerHTML = '<p>Location access denied. Please allow location access to view weather forecast.</p>';
                });
            } else {
                console.error('Geolocation is not supported by this browser');
                document.getElementById('weatherInfo').innerHTML = '<p>Geolocation is not supported by this browser. Please use a different browser to view weather forecast.</p>';
            }
        }

        getLocation();
    </script>
</body>
</html>
