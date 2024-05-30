<?php
 include_once("db.php");
// Fetch campaigns from the database
$sql = "SELECT * FROM campaigns";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Campaigns</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px; /* Add padding for better alignment */
            margin: 0;
        }

        .container {
            max-width: 800px; /* Adjusted max-width for larger screens */
            margin: 0 auto; /* Center the content horizontally */
        }

        table {
            width: 100%; /* Make the table responsive */
            border-collapse: collapse;
            margin-top: 20px; /* Add margin-top for spacing */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Planned Campaigns</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Campaign Type</th>
                <th>Description</th>
                <th>Target Audience</th>
                <th>Scheduled Date</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["campaign_type"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["target_audience"] . "</td>";
                    echo "<td>" . $row["scheduled_date"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No campaigns planned yet.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
