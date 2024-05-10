<?php
// Include database connection
include 'db.php';

// Retrieve form data
$section_name = $_POST['section_name'];
$content = $_POST['content'];
$video_path = $_POST['video_path'];

// SQL query to insert data into the database
$sql = "INSERT INTO fish_db (section_name, content, video_path) VALUES ('$section_name', '$content', '$video_path')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    header("Location: fish_insert.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
