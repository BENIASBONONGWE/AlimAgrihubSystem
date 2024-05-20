
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px; /* Add space at the top for better alignment */
            font-family: Arial, sans-serif; /* Set a fallback font family */
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Adjust width as needed */
            margin: 0 auto; /* Center the form horizontally */
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px; /* Add some space below the heading */
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block; /* Ensure labels are on their own line */
        }

        select,
        input[type="tel"],
        textarea,
        input[type="submit"] {
            width: calc(100% - 22px); /* Adjust width to accommodate padding and borders */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            outline: none; /* Remove default outline on focus */
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
            background-color: darkgreen; /* Darken the background color on hover */
        }

        .admin-dashboard-link {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px; /* Add some space above the link */
            text-align: center;
        }

        .admin-dashboard-link:hover {
            background-color: #0056b3; /* Darken the background color on hover */
        }
    </style>
</head>
<body>
    <form action="sms.php" method="post">
        <h2>Send SMS</h2>
        <label for="recipient_type">Select Recipient Type:</label>
        <select id="recipient_type" name="recipient_type">
            <option value="">Select Recipient Type</option>
            <option value="all">All Farmers</option>
            <option value="crop">Crop Farmers</option>
            <option value="animal">Animal Farmers</option>
            <option value="other">Other (Input Number)</option>
        </select>
        
        <label for="phoneNumber">Enter Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{12}" maxlength="12" required>
        
        <label for="campaign">Select Campaign:</label>
        <select id="campaign_select" name="campaign" required>
            <option value="">Select campaign</option>
        </select>
        
        <label for="weather">Select Weather:</label>
        <select id="weather_select" name="weather" required>
            <option value="">Select weather</option>
        </select>
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea>
        
        <input type="submit" value="Send Message">
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
