<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Campaign</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0; /* Updated margin to zero */
            font-family: Arial, sans-serif;
            background-image: url('https://d2fl3xywvvllvq.cloudfront.net/wp-content/uploads/2015/07/Planning2-e1554986531973.jpg');
            background-size: cover;
            background-position: center;
        }

        form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block; /* Ensures labels are displayed one per line */
            margin-bottom: 6px; /* Added margin bottom for spacing */
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px; /* Added margin top for spacing */
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div>
        <h2>Plan Campaign</h2> <!-- Removed inline style -->
        <form action="process_campaign.php" method="POST">
            <label for="campaign_type">Campaign Type:</label>
            <input type="text" id="campaign_type" name="campaign_type" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            
            <label for="target_audience">Target Audience:</label>
            <input type="text" id="target_audience" name="target_audience">
            
            <label for="scheduled_date">Scheduled Date:</label>
            <input type="date" id="scheduled_date" name="scheduled_date" required>
            
            <input type="submit" value="Plan Campaign">
        </form>
    </div>
</body>
</html>