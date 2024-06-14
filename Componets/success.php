<?php
// Check if required query parameters are set
if (isset($_GET['full_name'], $_GET['phone'], $_GET['location'], $_GET['farmer_type'], $_GET['dob'], $_GET['gender'])) {
    $full_name = htmlspecialchars($_GET['full_name']);
    $phone = htmlspecialchars($_GET['phone']);
    $location = htmlspecialchars($_GET['location']);
    $farmer_type = htmlspecialchars($_GET['farmer_type']);
    $dob = htmlspecialchars($_GET['dob']);
    $gender = htmlspecialchars($_GET['gender']);
} else {
    echo "User details are not available.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
</head>
<body>
    <h1>Registration Successful</h1>
    <p><strong>Full Name:</strong> <?php echo $full_name; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Location:</strong> <?php echo $location; ?></p>
    <p><strong>Farmer Type:</strong> <?php echo $farmer_type; ?></p>
    <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
</body>
</html>
