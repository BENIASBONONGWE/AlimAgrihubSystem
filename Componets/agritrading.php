<?php
include_once "db.php";
session_start();

// Fetch commodities from the database
$sql = "SELECT * FROM commodities";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgriTrading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="aboutus.css" rel="stylesheet">
    <link href="body.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
        }
        .crop-card .btn:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <?php include("nav.php"); ?>
    <div class="banner"></div>
    <b>
        <h3 style="color:green; font-size: 20px;">WE PROVIDE BEST AGRITRADING</h3>
    </b>
    <div class="upper-section"></div>
    <h1>About AgriTrading</h1>
    <h4>Our Smart Approach</h4>
    <br>
    <p>Through Za-Mlimi agri-trading component, buyers are registered into the platform as partners to smallholder farmers. The platform captures name of buyer or company, company contact, name of the officer in charge (officer interacting smallholder based sourcing of commodities) and commodities they source from farmers. The agri-trading function has virtual Aggregation that allows/enables the farmers, CV leaders or CVTF to upload commodities from the Commercial Producer Groups (CPGs) & Commercial Villages. The uploaded commodities are automatically aggregated by the application per commercial village. Buyers who login into the platform in search of produce or raw materials will access the aggregated commodities</p>
    
    <!-- Crop Cards container -->
    <div class="container">
        <div class="row crop-cards">
            <!-- Dynamically Generated Crop Cards -->
            <?php
          
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                   echo '
                   <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="crop-card">
                           <img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '">
                           <div class="details">
                               <h2 style="text-align: center;">' . htmlspecialchars($row['name']) . '</h2>
                               <p style="text-align: center;">' . htmlspecialchars($row['quantity']) . '</p>
                               <a href="commodity_detail.php?id=' . htmlspecialchars($row['id']) . '" class="btn">Read More</a>
                           </div>
                       </div>
                   </div>';
               }
           } else {
               echo '<p>No commodities available.</p>';
           }
            ?>
        </div>
    </div>

    <footer>
        <!-- Footer content -->
    </footer>
    <?php include("footer.php"); ?>
</body>
</html>
