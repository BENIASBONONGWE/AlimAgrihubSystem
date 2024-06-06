<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <style>
        body {
            display: flex;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin-top: 10px;
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
            width: 200px;
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
    <div class="container">
        <h1>Weather Forecast</h1>
        <div id="city">Locating...</div>
        <div class="weather-info" id="weatherInfo">
            <!-- Weather forecast will be displayed here -->
        </div>
    </div>

    <script>
        // JavaScript code here

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
                    const dateTime = forecast.dt_txt.split(' ');
                    const date = dateTime[0];
                    const time = dateTime[1];
                    const { weatherDescription, farmingAdvice } = mapWeatherCondition(forecast.weather[0].id);
                    const temperature = forecast.main.temp;
                    const humidity = forecast.main.humidity;
                    const rainfall = forecast.rain ? forecast.rain['3h'] : 0;
                    const windSpeed = forecast.wind.speed;
                    const windDirection = forecast.wind.deg;

                    const forecastElement = document.createElement('div');
                    forecastElement.classList.add('forecast');
                    forecastElement.innerHTML = `
                        <div class="date">${date} ${time}</div>
                        <div class="summary">${weatherDescription}</div>
                        <img class="icon" src="images/${getWeatherImage(forecast.weather[0].id)}" alt="${weatherDescription}">
                        <div class="temperature">${temperature}°C</div>
                        <div class="details">
                            <div>
                                <div>Humidity</div>
                                <div>${humidity}%</div>
                            </div>
                            <div>
                                <div>Rainfall</div>
                                <div>${rainfall} mm</div>
                            </div>
                            <div>
                                <div>Wind</div>
                                <div>${windSpeed} m/s</div>
                            </div>
                            <div>
                                <div>Direction</div>
                                <div>${windDirection}°</div>
                            </div>
                        </div>
                        <div>Farming Advice: ${farmingAdvice}</div>
                    `;
                    weatherInfoElement.appendChild(forecastElement);
                })
            } else {
                weatherInfoElement.innerHTML = '<p>Failed to retrieve weather data</p>';
            }
        }

        function mapWeatherCondition(weatherId) {
            let weatherDescription;
            let farmingAdvice;

            // Map OpenWeatherMap weather condition codes to descriptions and farming advice
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

        function getWeatherImage(weatherId) {
            // Map weather conditions to image filenames
            switch (true) {
                case weatherId >= 200 && weatherId < 300:
                    return 'thunderstorm.jpg';
                case weatherId >= 300 && weatherId < 500:
                    return 'light_rain.jpg';
                case weatherId >= 500 && weatherId < 600:
                    return 'rain_showers.jpg';
                case weatherId >= 600 && weatherId < 700:
                    return 'snowfall.jpg';
                case weatherId >= 700 && weatherId < 800:
                    return 'mist.jpg';
                case weatherId === 800:
                    return 'clear_sky.jpg';
                case weatherId === 801 || 802:
                    return 'partly_cloudy.jpg';
                case weatherId === 803 || 804:
                    return 'overcast.jpg';
                default:
                    return 'default.jpg';
            }
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
