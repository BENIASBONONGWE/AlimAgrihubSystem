<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crop Details - AgriTrading</title>
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

        .crop-details {
            max-width: 800px;
            margin: 20px auto;
            text-align: left;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        .crop-details img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .crop-details h2 {
            text-align: center;
        }

        footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
<?php
// Include your database connection file
include("db.php");

// Check if the crop ID is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $crop_id = $_GET['id'];

    // Query to fetch the crop details from the database
    $sql = "SELECT * FROM mycrops WHERE id = $crop_id";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Fetch the crop details
            $row = mysqli_fetch_assoc($result);
        } else {
            $error_message = "Crop details not found.";
        }
    } else {
        $error_message = "Error executing query: " . mysqli_error($conn);
    }
} else {
    $error_message = "Invalid crop ID.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crop Details - AgriTrading</title>
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

        .crop-details {
            max-width: 800px;
            margin: 20px auto;
            text-align: left;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        .crop-details img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .crop-details h2 {
            text-align: center;
        }

        footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php include("nav.php"); ?>

    <div class="crop-details">
        <?php if (isset($row)) { ?>
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h2><?php echo $row['name']; ?></h2>
            <p><strong>Pests:</strong> <?php echo $row['pests']; ?></p>
            <p><strong>Diseases:</strong> <?php echo $row['diseases']; ?></p>
            <p><strong>Prevention:</strong> <?php echo $row['prevention']; ?></p>
        <?php } else { ?>
            <p><?php echo $error_message; ?></p>
        <?php } ?>
    </div>

    <footer>
        &copy; 2024 AgriTrading. All rights reserved.
    </footer>
    <?php include("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

    </div>

    <footer>
        &copy; 2024 AgriTrading. All rights reserved.
    </footer>
    <?php include("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
