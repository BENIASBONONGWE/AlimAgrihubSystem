<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: green;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: gold;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            color: #155724;
        }

        .error {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Send SMS</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="to">Enter Recipient's Phone Number (comma-separated):</label><br>
            <input type="text" id="to" name="to"><br>
            <label for="message">Enter Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Send Message">
        </form>
        <?php
        // Require the bundled autoload file - the path may need to change
        // based on where you downloaded and unzipped the SDK
        require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
        
        // Your Account SID and Auth Token from console.twilio.com
        $sid = "AC60ebd3a572f7d080f10427f5e739323d";
        $token = "57957044f57735a56f3d376f5788a684";
        $client = new Twilio\Rest\Client($sid, $token);
        
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the message body and phone numbers from the form input
            $messageBody = $_POST['message'];
            $toNumbers = explode(',', $_POST['to']);
        
            // Variable to track if any message fails to send
            $allMessagesSent = true;
        
            // Iterate through each phone number and send the message
            foreach ($toNumbers as $toNumber) {
                // Use the Client to make requests to the Twilio REST API
                $message = $client->messages->create(
                    trim($toNumber),
                    [
                        'from' => '+13252405760',
                        'body' => $messageBody
                    ]
                );
        
                // If any message fails to send, set $allMessagesSent to false
                if (!$message) {
                    $allMessagesSent = false;
                }
            }
        
            // Check if all messages were sent successfully
            if ($allMessagesSent) {
                echo '<div class="message">All messages sent successfully</div>';
            } else {
                echo '<div class="error">Some messages failed to send</div>';
            }
        }
        ?>
    </div>
</body>
</html>