<?php
// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['video_id'])) {
    echo "Form data received successfully<br>";

    // Print received data for debugging
    echo "Titles: ";
    print_r($_POST['title']);
    echo "<br>Descriptions: ";
    print_r($_POST['description']);
    echo "<br>Video IDs: ";
    print_r($_POST['video_id']);

    // Add your database insertion code here
    // Make sure to properly connect to the database and handle SQL injection
} else {
    echo "Form data not received";
}
?>
