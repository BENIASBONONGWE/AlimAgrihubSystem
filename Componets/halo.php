<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns and Awerenesses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: green;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .article {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            display: flex;
        }

        .article h2 {
            color: #333;
            margin-top: 0;
        }

        .article-content {
            flex: 1;
        }

        .sidebar {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 10px;
            margin-left: 20px;
            width: 200px;
        }

        .sidebar p {
            color: #666;
            margin-bottom: 10px;
        }

        .sidebar p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Campaigns and Awerenesses</h1>
</div>

<div class="container">
    <?php
    include_once "db.php";
    // Retrieve planned campaigns from the database
    $sql = "SELECT * FROM campaigns";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='article'>";
            echo "<div class='article-content'>";
            echo "<h2>" . $row["campaign_type"] . "</h2>";
            echo "<p><strong> Campaign:</strong> " . $row["description"] . "</p>";
            echo "</div>";
            echo "<div class='sidebar'>";
            echo "<p><strong>Target Audience:</strong> " . $row["target_audience"] . "</p>";
            echo "<p><strong>Scheduled Date:</strong> " . $row["scheduled_date"] . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='article'>";
        echo "<p>No campaigns planned yet.</p>";
        echo "</div>";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
