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
            width: 90%; /* Adjusted width for responsiveness */
            max-width: 400px; /* Added max-width for larger screens */
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
        input[type="text"], input[type="email"], input[type="password"], select, textarea {
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
        .select-option {
            padding: 5px;
        }
        .container {
            width: 100%;
            padding: 0 15px; /* Added padding for better mobile layout */
        }
        /* Adjustments for smaller screens */
        .logo {
            height: auto;
            width: 50%;
            margin: 0 auto;
            display: block;
            padding: 10px 0;
        }
        .navbar-brand, .secondary-logo {
            margin-left: 0;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Send SMS</h2>
        <form method="post" action="sms.php" id="smsForm">
            <label for="weather_select">Select Weather:</label><br>
            <select id="weather_select">
                <option value="">Select Weather</option>
            </select><br>
            
            <label for="campaign_select">Select Campaign:</label><br>
            <select id="campaign_select">
                <option value="">Select Campaign</option>
            </select><br>
            
            <label for="recipient_type">Select Recipient Type:</label><br>
            <select id="recipient_type" name="recipient_type">
                <option value="">Select Recipient Type</option>
                <option value="all">All Farmers</option>
                <option value="crop">Crop Farmers</option>
                <option value="animal">Animal Farmers</option>
                <option value="other">Other (Input Number)</option>
            </select><br>
            <div id="phone_dropdown">
                <label for="phone">Select Recipient:</label><br>
                <select id="phone_select" name="phone[]" multiple>
                </select><br>
            </div>
            <div id="phone_input">
                <label for="phone">Enter Recipient's Phone Number:</label><br>
                <input type="text" id="phone_input_text" name="phone_input" value="+265"><br>
            </div>
            
            <div class="message-section">
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
            </div>
            
            <input type="submit" value="Send Message">
        </form>
        
        <script>
            // Your JavaScript code remains the same
        </script>
    </div>
</body>
</html>
