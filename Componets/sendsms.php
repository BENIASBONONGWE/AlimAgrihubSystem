<!DOCTYPE html>
<html lang="en">
<head>
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Send SMS</h2>
        <form method="post" action="send_sms.php">
            <label for="recipient_type">Select Recipient Type:</label><br>
            <select id="recipient_type" name="recipient_type">
                <option value="all">All Farmers</option>
                <option value="animal">Animal Farmers</option>
                <option value="crop">Crop Farmers</option>
                <option value="other">Other (Input Number)</option>
            </select><br>
            <div id="phone_dropdown">
                <label for="phone">Select Recipient:</label><br>
                <select id="phone_select" name="phone[]" multiple>
                    <?php include_once("get_phone_numbers.php"); ?>
                </select><br>
            </div>
            <div id="phone_input">
                <label for="phone">Enter Recipient's Phone Number:</label><br>
                <input type="text" id="phone_input_text" name="phone_input" value="+265"><br>
            </div>
            <label for="message">Enter Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Send Message">
        </form>
        
        <script>
            // JavaScript to update input field value based on selection
            document.getElementById('phone_select').addEventListener('change', function() {
                var selectedNumbers = Array.from(this.selectedOptions).map(option => option.value);
                document.getElementById('phone_input_text').value = selectedNumbers.join(', ');
            });
        </script>
    </div>
</body>
</html>
