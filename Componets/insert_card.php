<?php
include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$image_url = $_POST['image_url'];
$page = $_POST['page'];

// Insert card into the database
$query = "INSERT INTO cards (title, description, image_url, page) VALUES ('$title', '$description', '$image_url', '$page')";

if (mysqli_query($conn, $query)) {
    echo "New card created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: admin_dashboard.php");
exit();
?>
