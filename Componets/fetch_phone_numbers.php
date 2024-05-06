<?php
// Include database connection file
include_once("db.php");

// Start session
session_start();

// Check if the recipient type is set and not empty
if (isset($_POST['recipient_type']) && !empty($_POST['recipient_type'])) {
    // Retrieve the selected recipient type
    $recipient_type = $_POST['recipient_type'];

    // Check if extension worker is logged in and location is set in session
    if (isset($_SESSION['user_location']) && !empty($_SESSION['user_location'])) {
        // Retrieve the location of the extension worker
        $location = $_SESSION['user_location'];

        // Query to fetch phone numbers based on the recipient type and extension worker's location
        if ($recipient_type === 'all') {
            // Fetch all phone numbers from the same location
            $sql = "SELECT phone FROM farmers WHERE location = ?";
        } elseif ($recipient_type === 'crop') {
            // Fetch phone numbers of crop farmers from the same location
            $sql = "SELECT phone FROM farmers WHERE location = ? AND farmer_type = 'crop'";
        } elseif ($recipient_type === 'animal') {
            // Fetch phone numbers of animal farmers from the same location
            $sql = "SELECT phone FROM farmers WHERE location = ? AND farmer_type = 'animal'";
        } else {
            // Default case or any other specific logic you want to implement
            $sql = "SELECT phone FROM farmers WHERE location = ?";
        }

        // Prepare and execute the query with the location parameter
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $location);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Format the phone number for display
                $phone_number = $row["phone"];
                // Output option tag with phone number as value and text
                echo "<option class='select-option' value='$phone_number'>$phone_number</option>";
            }
        } else {
            // No results found
            echo "<option value=''>No recipients found</option>";
        }
    } else {
        // Location is not set in session
        echo "<option value=''>Location not set</option>";
    }
} else {
    // Recipient type is not set or empty
    echo "<option value=''>Invalid recipient type</option>";
}

// Close database connection
$conn->close();
?>
