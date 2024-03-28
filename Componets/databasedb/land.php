<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "phpland";

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$sql = "INSERT INTO videos (title, description, video_url) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $title, $description, $video_url);

// Iterate through each video submitted via the form
foreach ($_POST['title'] as $index => $title) {
    // Extract information for each video
    $title = $_POST['title'][$index];
    $description = $_POST['description'][$index];
    $video_id = $_POST['video_id'][$index];
    $video_url = "https://www.youtube.com/embed/" . $video_id;

    // Execute the prepared statement to insert the video into the database
    if ($stmt->execute()) {
        echo "Video inserted successfully<br>";
    } else {
        echo "Error inserting video: " . $conn->error . "<br>";
    }
}

// Close prepared statement and connection
$stmt->close();
$conn->close();
?>
