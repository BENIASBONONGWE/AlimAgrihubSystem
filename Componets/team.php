<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google-like Weather Card</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .weather-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 320px;
            text-align: center;
            padding: 20px;
        }

        .weather-card .location {
            font-size: 24px;
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
        }

        .weather-card .icon {
            width: 100px;
            height: 100px;
            margin: 10px 0;
        }

        .weather-card .temperature {
            font-size: 64px;
            font-weight: 300;
            color: #333;
            margin: 10px 0;
        }

        .weather-card .description {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .weather-card .details {
            display: flex;
            justify-content: space-around;
            font-size: 14px;
            color: #666;
        }

        .weather-card .details div {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="weather-card">
        <div class="location">San Francisco</div>
        <img class="icon" src="https://www.example.com/weather-icon.png" alt="Weather Icon">
        <div class="temperature">18°C</div>
        <div class="description">Cloudy</div>
        <div class="details">
            <div>
                <div>Humidity</div>
                <div>72%</div>
            </div>
            <div>
                <div>Wind</div>
                <div>15 km/h</div>
            </div>
            <div>
                <div>Precipitation</div>
                <div>10%</div>
            </div>
        </div>
    </div>
</body>
</html>
