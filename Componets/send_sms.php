<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Adjust width as needed */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        select,
        input[type="tel"],
        textarea,
        input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        select[multiple] {
            height: 150px;
        }

        input[type="submit"] {
            background-color: green;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    
    <form action="sms.php" method="post">
    <h2>Send SMS</h2>
    <label for="recipient_type">Select Recipient Type:</label><br>
            <select id="recipient_type" name="recipient_type">
                <option value="">Select Recipient Type</option>
                <option value="all">All Farmers</option>
                <option value="crop">Crop Farmers</option>
                <option value="animal">Animal Farmers</option>
                <option value="other">Other (Input Number)</option>
            </select>
        
        <label for="phoneNumber">Enter Phone Number:</label><br>
        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{12}" maxlength="12" required><br>
        
        <label for="campaign">Select Campaign:</label><br>
        <select id="campaign_select" name="campaign" required>
            <option value="">Select campaign</option>
        </select><br>
        
        <label for="weather">Select Weather:</label><br>
        <select id="weather_select" name="weather" required>
            <option value="">Select weather</option>
        </select><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>
        
        <input type="submit" name="submit" value="Send SMS">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch phone numbers based on recipient type
            function fetchPhoneNumbers(recipientType) {
                $.ajax({
                    url: 'fetch_phone_numbers.php',
                    method: 'POST',
                    data: { recipient_type: recipientType },
                    success: function(response) {
                        $('#phoneNumber').html(response);
                    }
                });
            }

            // Event listener for recipient type select change
            $('#farmerType').change(function() {
                var selectedRecipientType = $(this).val();
                fetchPhoneNumbers(selectedRecipientType);
            });
            
            // Populate weather options
            $.get('send_weather_data.php', function(data) {
                var weatherOptions = '<option value="">Select Weather</option>';
                $.each(data, function(index, option) {
                    var weatherText = 'City: ' + option.city_name + ', ' +
                                      'Weather: ' + option.weather_description + ', ' +
                                      'Temperature: ' + option.temperature + ' °C, ' +
                                      'Humidity: ' + option.humidity + '%, ' +
                                      'Rainfall: ' + option.rainfall + ' mm, ' +
                                      'Wind Speed: ' + option.wind_speed + ' m/s, ' +
                                      'Wind Direction: ' + option.wind_direction + '°';
                    weatherOptions += '<option class="select-option" value="' + weatherText + '">' + weatherText + '</option>';
                });
                $('#weather_select').html(weatherOptions);
            }).fail(function() {
                console.error('Failed to fetch weather data');
            });
            
            // Populate campaign options
            $.get('halo.php', function(data) {
                var campaigns = $(data).find('.article');
                var campaignOptions = '<option value="">Select Campaign</option>';
                campaigns.each(function(index) {
                    var campaignType = $(this).find('h2').text();
                    var campaignDesc = $(this).find('p').text();
                    campaignOptions += '<option class="select-option" value="' + campaignDesc + '">' + campaignType + ': ' + campaignDesc + '</option>';
                });
                $('#campaign_select').html(campaignOptions);
            });
            
            // Show/hide message textarea based on selected SMS type
            $('#sms_type').change(function() {
                var smsType = $(this).val();
                if (smsType === 'weather' || smsType === 'campaign') {
                    $('.message-section').show();
                } else {
                    $('.message-section').hide();
                }
            });
            
            // Update message textarea based on selected weather
            $('#weather_select').change(function() {
                var selectedWeather = $(this).val();
                $('#message').val(selectedWeather);
            });
            
            // Update message textarea based on selected campaign
            $('#campaign_select').change(function() {
                var selectedCampaign = $(this).val();
                $('#message').val(selectedCampaign);
            });
        });
    </script>
</body>
</html>
