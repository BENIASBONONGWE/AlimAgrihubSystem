<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgriTrading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="aboutus.css" rel="stylesheet">
    <link href="body.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="images/Logo.png" rel="icon">
    <link href="images/Logo.png" rel="apple-touch-icon">
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        h1, h4, p {
            margin: 0 auto;
            max-width: 600px;
        }

        .banner {
            background-image: url('images/agritrading.jpg');
            background-size: cover;
            background-position: center;
            height: 25vh;
        }

        .upper-section {
            padding: 20px;
        }

        .crop-card {
            margin: 20px;
            text-align: left;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
            transition: transform 0.2s;
        }

        .crop-card:hover {
            transform: scale(1.05);
        }

        .crop-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .crop-card .details {
            margin-top: 10px;
        }

        .crop-card .btn {
            display: block;
            background-color: green;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            margin-top: 10px;
        }

        .crop-card .btn:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .info-card h3 {
            text-align: center;
        }

        .info-card p {
            text-align: justify;
        }

        .info-card ul {
            text-align: left;
        }
    </style>
</head>

<body>
    <?php include("nav.php"); ?>
    <div class="banner"></div>
    <h3 style="color:green; font-size: 20px; margin-top: 10px;">WE PROVIDE BEST AGRITRADING</h3>
    <div class="upper-section"></div>
    <h1>About AgriTrading</h1>
    <h4>Our Smart Approach</h4>
    <p>Through Za-Mlimi agri-trading component, buyers are registered into the platform as partners to smallholder farmers...</p>

    <!-- Crop Cards container -->
    <div class="container">
        <div class="row crop-cards">
            <!-- Crop Cards -->
            <?php
            // Include your database connection file
            include("db.php");

            // Query to fetch crops from the database
            $sql = "SELECT * FROM mycrops";
            $result = mysqli_query($conn, $sql);

            // Check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row
                while ($row = mysqli_fetch_assoc($result)) {
                    // Output HTML for each crop card dynamically
                    echo '<div class="col-lg-3 col-md-4 col-sm-6">';
                    echo '<div class="crop-card">';
                    echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                    echo '<div class="details">';
                    echo '<h2 style="text-align: center;">' . $row['name'] . '</h2>';
                    echo '<p><strong>Pests:</strong> ' . $row['pests'] . '</p>';
                    echo '<p><strong>Diseases:</strong> ' . $row['diseases'] . '</p>';
                    echo '<p><strong>Prevention:</strong> ' . $row['prevention'] . '</p>';
                    echo '<a href="crop_details.php' . $row['link'] . '" class="btn">Read More</a>';
                    echo '</div></div></div>';
                }
            } else {
                // If no crops found in the database
                echo "No crops found";
            }
            ?>
        </div>
    </div>

    <footer>
        &copy; 2024 AgriTrading. All rights reserved.
    </footer>
    <?php include("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

