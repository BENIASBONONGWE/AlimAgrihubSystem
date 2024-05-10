<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Website - Send SMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px auto;
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
        .message-section {
            display: block;
            margin-bottom: 15px;
        }
        #message {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            resize: vertical;
        }
        /* Style for select options */
        .select-option {
            padding: 5px;
        }
        .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none; /* Remove underline for anchor tag */
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="secondary-logo">
            <img src="images/Logo1.png" alt="Another Logo" class="logo">
        </div>
    <div class="container">
        <h2>Send SMS</h2>
        <form method="post" action="send_sms.php" id="smsForm">
            <!-- Dropdown for selecting weather -->
            <label for="weather_select">Select Weather:</label><br>
            <select id="weather_select" style="width: 100%;">
                <option value="">Select Weather</option>
                <!-- Weather options will be populated here -->
            </select><br>
            
            <!-- Dropdown for selecting campaign -->
            <label for="campaign_select">Select Campaign:</label><br>
            <select id="campaign_select" style="width: 100%;">
                <option value="">Select Campaign</option>
                <!-- Campaign options will be populated here -->
            </select><br>
            
            <!-- Recipient selection -->
            <label for="recipient_type">Select Recipient Type:</label><br>
            <select id="recipient_type" name="recipient_type" style="width: 100%;">
                <option value="">Select Recipient Type</option>
                <option value="all">All Farmers</option>
                <option value="crop">Crop Farmers</option>
                <option value="animal">Animal Farmers</option>
                <option value="other">Other (Input Number)</option>
            </select><br>
            <div id="phone_dropdown">
                <label for="phone">Select Recipient:</label><br>
                <select id="phone_select" name="phone[]" multiple style="width: 100%;">
                    <!-- Phone numbers options will be populated here -->
                </select><br>
            </div>
            <div id="phone_input">
                <label for="phone">Enter Recipient's Phone Number:</label><br>
                <input type="text" id="phone_input_text" name="phone_input" value="+265"><br>
            </div>
            
            <!-- Message display -->
            <div class="message-section">
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
            </div>
            
            <input type="submit" value="Send Message">
        </form>
        
        <script>
    $(document).ready(function() {
        // Function to fetch phone numbers based on recipient type
        function fetchPhoneNumbers(recipientType) {
            $.ajax({
                url: 'fetch_phone_numbers.php',
                method: 'POST',
                data: { recipient_type: recipientType },
                success: function(response) {
                    $('#phone_select').html(response);
                    updatePhoneInput();
                }
            });
        }

        // Event listener for recipient type select change
        $('#recipient_type').change(function() {
            var selectedRecipientType = $(this).val();
            fetchPhoneNumbers(selectedRecipientType);
        });
        
        // Function to update phone input with selected phone numbers
        function updatePhoneInput() {
            var selectedPhones = $('#phone_select').val();
            if (selectedPhones) {
                var formattedPhones = selectedPhones.map(function(phone) {
                    // Remove leading zeros and add +2659 prefix
                    return '+265' + phone.replace(/^0+/, '');
                });
                $('#phone_input_text').val(formattedPhones.join(', '));
            } else {
                $('#phone_input_text').val('');
            }
        }

        // Event listener for phone select change
        $('#phone_select').change(updatePhoneInput);
        
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


    </div>
</body>
<a href="AnimalsInsert.php" class="button">AnimalsInsert</a>
<a href="plan_campaign.php" class="button">Plan Campaign</a>

<?php include ("footer.php");  ?>
</html>
