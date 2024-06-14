<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <style>
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
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#home">Home</a>
        <a href="#weather">Weather</a>
        <a href="#contact">Contact</a>
    </div>

    <div class="container">
        <h1>Weather Forecast</h1>
        <div id="city">Locating...</div>
        <div class="weather-info" id="weatherInfo">
            <!-- Weather forecast will be displayed here -->
        </div>
    </div>

    <script>
        function fetchWeatherData(latitude, longitude) {
            const apiKey = '8f5169d74da04b208ad203824241306';
            const apiUrl = `https://api.weatherapi.com/v1/current.json?key=${apiKey}&q=${latitude},${longitude}`;

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
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                    document.getElementById('city').textContent = 'Failed to retrieve weather data';
                });
        }

        function displayWeatherForecast(weatherData) {
            const weatherInfoElement = document.getElementById('weatherInfo');
            weatherInfoElement.innerHTML = ''; // Clear previous content

            if (weatherData) {
                const forecastElement = document.createElement('div');
                forecastElement.classList.add('forecast');
                forecastElement.innerHTML = `
                    <div class="date">${weatherData.location.localtime}</div>
                    <div class="summary">${weatherData.current.condition.text}</div>
                    <img class="icon" src="${weatherData.current.condition.icon}" alt="${weatherData.current.condition.text}">
                    <div class="temperature">${weatherData.current.temp_c}°C</div>
                    <div class="details">
                        <div>
                            <div>Humidity</div>
                            <div>${weatherData.current.humidity}%</div>
                        </div>
                        <div>
                            <div>Wind</div>
                            <div>${weatherData.current.wind_kph} kph</div>
                        </div>
                        <div>
                            <div>Direction</div>
                            <div>${weatherData.current.wind_dir}</div>
                        </div>
                    </div>
                    <div>Animal Advice: ${getAnimalAdvice(weatherData.current.condition.code)}</div>
                    <div>Crop Advice: ${getCropAdvice(weatherData.current.condition.code)}</div>
                `;
                weatherInfoElement.appendChild(forecastElement);
            } else {
                weatherInfoElement.innerHTML = '<p>Failed to retrieve weather data</p>';
            }
        }

        function getAnimalAdvice(weatherCode) {
            switch (true) {
                case weatherCode >= 200 && weatherCode < 300:
                    return 'Secure livestock indoors and avoid outdoor activities.';
                case weatherCode >= 300 && weatherCode < 500:
                    return 'Animals can remain outside but monitor for signs of stress.';
                case weatherCode >= 500 && weatherCode < 600:
                    return 'Ensure shelter is available for all animals.';
                case weatherCode >= 600 && weatherCode < 700:
                    return 'Provide extra feed and shelter to protect from cold.';
                case weatherCode >= 700 && weatherCode < 800:
                    return 'Limit animal movement due to low visibility.';
                case weatherCode === 800:
                    return 'Ideal conditions for grazing.';
                case weatherCode > 800:
                    return 'Monitor weather updates for potential changes.';
                default:
                    return 'General advice based on weather conditions.';
            }
        }

        function getCropAdvice(weatherCode) {
            switch (true) {
                case weatherCode >= 200 && weatherCode < 300:
                    return 'Delay planting and protect seedlings from heavy rain.';
                case weatherCode >= 300 && weatherCode < 500:
                    return 'No significant impact, regular monitoring required.';
                case weatherCode >= 500 && weatherCode < 600:
                    return 'Protect crops from rain and potential flooding.';
                case weatherCode >= 600 && weatherCode < 700:
                    return 'Take measures to prevent frost damage to crops.';
                case weatherCode >= 700 && weatherCode < 800:
                    return 'Monitor crops for fungal diseases due to humidity.';
                case weatherCode === 800:
                    return 'Optimal conditions for most farming activities.';
                case weatherCode > 800:
                    return 'Prepare for potential adverse weather conditions.';
                default:
                    return 'General advice based on weather conditions.';
            }
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    fetchWeatherData(latitude, longitude);
                }, error => {
                    console.error('Error getting user location:', error);
                    document.getElementById('city').textContent = 'Location access denied. Please allow location access to view weather forecast.';
                });
            } else {
                console.error('Geolocation is not supported by this browser');
                document.getElementById('city').textContent = 'Geolocation is not supported by this browser. Please use a different browser to view weather forecast.';
            }
        }

        getLocation();
    </script>
</body>
</html>
