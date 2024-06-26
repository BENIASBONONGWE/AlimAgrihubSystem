<?php
session_start();

// Example db.php content
$phoneByLocation = [];
$campaigns = [];

try {
    // Establish database connection
    $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch phone numbers grouped by location
    $sql = "SELECT location, phone FROM farmers";
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Group phone numbers by location
    foreach ($results as $row) {
        $location = $row['location'];
        $phone = $row['phone'];
        if (!isset($phoneByLocation[$location])) {
            $phoneByLocation[$location] = [];
        }
        $phoneByLocation[$location][] = htmlspecialchars($phone); // Sanitize if needed
    }

    // Fetch campaigns from the database
    $sql_campaigns = "SELECT * FROM campaigns";
    $stmt_campaigns = $pdo->query($sql_campaigns);
    while ($row_campaigns = $stmt_campaigns->fetch(PDO::FETCH_ASSOC)) {
        $campaigns[$row_campaigns['id']] = [
            'campaign_type' => $row_campaigns['campaign_type'],
            'description' => $row_campaigns['description'],
            'target_audience' => $row_campaigns['target_audience'],
            'scheduled_date' => $row_campaigns['scheduled_date']
        ];
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
    <title>Send SMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0;
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
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: green;
        }
        .error {
            color: red;
        }
        .message-section {
            margin-top: 20px;
        }
        .summary-section {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0;
            cursor: pointer;
        }
        .summary-section h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        .summary-section p {
            margin-bottom: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<?php include ("nav.php"); ?>
<br>
<br>
<body>
<div class="container">
    <h2>Send SMS</h2>

    <!-- Summary Action Plan Section -->
    <div class="summary-section" id="summarySection">
        <div id="summaryActionPlanContent">
            <?php
            if (isset($_SESSION['summaryActionPlan'])) {
                // Retrieve the weather action plan summary from session data
                $fullContent = $_SESSION['summaryActionPlan'];

                // Split the summary into individual sentences
                $sentences = preg_split('/(?<=[.?!])\s+/', $fullContent, -1, PREG_SPLIT_NO_EMPTY);

                // Take the first three sentences and combine them into a concise summary
                $summary = implode(' ', array_slice($sentences, 0, 2));

                // Display a message indicating a brief summary is available
                echo "A brief summary of the weather action plan for a week.";

                // Store the summarized content in a hidden textarea for further use
                echo "<textarea id='fullSummaryContent' style='display:none;'>$summary</textarea>";
            } else {
                // Display a message indicating no brief summary is available
                echo "No brief summary of the weather action plan available.";
            }
            ?>
        </div>
    </div>

    <form method="post" action="sms.php" id="smsForm">
        <div id="phone_input">
            <label for="phone">Enter Recipient's Phone Number:</label><br>
            <input type="text" id="phone_input_text" name="phone_input" value=""><br>
        </div>
        <div>
            <label for="location">Select Locations:</label><br>
            <select id="location" name="locations[]" multiple>
                <option value="all">Select All Locations</option>
                <?php
                // Output options for each location
                foreach ($phoneByLocation as $loc => $phones) {
                    echo "<option value='" . htmlspecialchars($loc) . "'>" . htmlspecialchars($loc) . "</option>";
                }
                ?>
            </select><br>
        </div>
        <div>
            <label for="campaign">Select Campaigns:</label><br>
            <select id="campaign" name="campaigns[]" multiple>
                <option value="all">Select All Campaigns</option>
                <?php
                // Output options for each campaign
                foreach ($campaigns as $campaignId => $campaignDetails) {
                    echo "<option value='" . htmlspecialchars($campaignId) . "' 
                                data-description='" . htmlspecialchars($campaignDetails['description']) . "' 
                                data-target-audience='" . htmlspecialchars($campaignDetails['target_audience']) . "' 
                                data-scheduled-date='" . htmlspecialchars($campaignDetails['scheduled_date']) . "'>" 
                         . htmlspecialchars($campaignDetails['campaign_type']) . "</option>";
                }
                ?>
            </select><br>
        </div>
        <div class="message-section">
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
        </div>

        <input type="submit" value="Send Message">
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // JavaScript code to update phone number input based on location selection
        document.getElementById('location').addEventListener('change', function() {
            var selectedLocations = Array.from(this.selectedOptions).map(option => option.value);
            var phoneNumbers = <?php echo json_encode($phoneByLocation); ?>;
            var allNumbers = selectedLocations.reduce((acc, loc) => {
                if (loc === 'all') {
                    // If "Select All" is selected, add all phone numbers
                    Object.values(phoneNumbers).forEach(numbers => acc.push(...numbers.map(phone => "+265" + phone.replace(/^0+/, ''))));
                } else if (phoneNumbers[loc] && phoneNumbers[loc].length > 0) {
                    var formattedNumbers = phoneNumbers[loc].map(phone => "+265" + phone.replace(/^0+/, ''));
                    acc.push(...formattedNumbers);
                }
                return acc;
            }, []);
            document.getElementById('phone_input_text').value = allNumbers.join(', ');
        });

        // JavaScript code to handle the change event on the campaign dropdown
        document.getElementById('campaign').addEventListener('change', function() {
            var selectedCampaigns = Array.from(this.selectedOptions).map(option => {
                if (option.value === 'all') {
                    return Object.values(document.getElementById('campaign').options).map(opt => {
                        return {
                            text: opt.text,
                            description: opt.getAttribute('data-description'),
                            targetAudience: opt.getAttribute('data-target-audience'),
                            scheduledDate: opt.getAttribute('data-scheduled-date')
                        };
                    });
                }
                return {
                    text: option.text,
                    description: option.getAttribute('data-description'),
                    targetAudience: option.getAttribute('data-target-audience'),
                    scheduledDate: option.getAttribute('data-scheduled-date')
                };
            }).flat();
            
            // Construct message based on campaign details
            var message = selectedCampaigns.map(campaign => {
                return "Campaign Type: " + campaign.text + "\n" +
                       "Description: " + campaign.description + "\n" +
                       "Target Audience: " + campaign.targetAudience + "\n" +
                       "Scheduled Date: " + campaign.scheduledDate;
            }).join("\n\n");

            // Update the message textarea
            document.getElementById('message').value = message;
        });

        // JavaScript code to handle the click event on the summary action plan section
        document.getElementById('summarySection').addEventListener('click', function() {
            var fullContent = document.getElementById('fullSummaryContent').value;

            // Strip HTML tags from the summary content
            var cleanContent = fullContent.replace(/<[^>]*>?/gm, '');

            // Set the cleaned content into the message textarea
            document.getElementById('message').value = cleanContent.trim();
        });
    });
</script>
</body>
</html>
<?php include ("footer.php");  ?>
