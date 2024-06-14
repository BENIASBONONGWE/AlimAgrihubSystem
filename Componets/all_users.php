<?php
// Include database configuration
include_once "db.php";

try {
    // Establish database connection
    $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query to retrieve all users' details except the password
    $sql = "SELECT full_name, phone, location, farmer_type, dob, gender FROM farmers";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all users' details
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Group phone numbers by location
    $phoneByLocation = [];
    foreach ($users as $user) {
        $location = htmlspecialchars($user['location']);
        if (!isset($phoneByLocation[$location])) {
            $phoneByLocation[$location] = [];
        }
        $phoneByLocation[$location][] = htmlspecialchars($user['phone']);
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .grouped-section {
            margin-top: 20px;
        }
        .selectable {
            cursor: pointer;
        }
        .selected {
            background-color: #d1e7dd;
        }
        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            th {
                background-color: transparent;
                text-align: right;
                display: none;
            }
            td {
                border: none;
                position: relative;
                padding-left: 50%;
                text-align: left;
            }
            td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Send SMS</h2>
        <form method="post" action="sms.php" id="smsForm">
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

        <h1>All Registered Users</h1>
        <?php if (count($users) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Farmer Type</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td data-label="Full Name"><?php echo htmlspecialchars($user['full_name']); ?></td>
                            <td data-label="Phone"><?php echo htmlspecialchars($user['phone']); ?></td>
                            <td data-label="Location"><?php echo htmlspecialchars($user['location']); ?></td>
                            <td data-label="Farmer Type"><?php echo htmlspecialchars($user['farmer_type']); ?></td>
                            <td data-label="Date of Birth"><?php echo htmlspecialchars($user['dob']); ?></td>
                            <td data-label="Gender"><?php echo htmlspecialchars($user['gender']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No registered users found.</p>
        <?php endif; ?>

        <div class="grouped-section">
            <h2>Phone Numbers Grouped by Location</h2>
            <?php if (!empty($phoneByLocation)): ?>
                <?php foreach ($phoneByLocation as $location => $phones): ?>
                    <h3><?php echo $location; ?></h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($phones as $phone): ?>
                                <tr class="selectable">
                                    <td data-label="Phone"><?php echo $phone; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No phone numbers to display.</p>
            <?php endif; ?>
        </div>

        <button id="copyButton">Copy Selected Phone Numbers</button>

        <script>
            // Add event listener to make phone numbers selectable
            const selectableCells = document.querySelectorAll('.selectable td');
            selectableCells.forEach(function(td) {
                td.addEventListener('click', function() {
                    td.classList.toggle('selected');
                });
            });

            // Copy selected phone numbers to clipboard
            document.getElementById('copyButton').addEventListener('click', function() {
                const selectedCells = document.querySelectorAll('.selected');
                const phoneNumbers = [];
                selectedCells.forEach(function(cell) {
                    phoneNumbers.push(cell.textContent);
                });

                const textArea = document.createElement('textarea');
                textArea.value = phoneNumbers.join(', ');
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);

                alert('Selected phone numbers copied to clipboard: ' + textArea.value);
            });
        </script>
    </div>
</body>
</html>
