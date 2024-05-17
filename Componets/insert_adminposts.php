<?php
include 'db.php';

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$files = $_POST['files'];
$images = $_POST['images'];
$videos = $_POST['videos'];
$date = date('Y-m-d');

// Insert blog post into the database
$query = "INSERT INTO posts (title, author, content, files, images, videos, date) VALUES ('$title', '$author', '$content', '$files', '$images', '$videos', '$date')";

if (mysqli_query($conn, $query)) {
    echo "New blog post created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: admin_dashboard.php");
exit();
?>
