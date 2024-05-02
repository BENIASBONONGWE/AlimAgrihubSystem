<?php
// Include database connection file
include_once("db.php");

// Retrieve phone numbers from the database
$sql = "SELECT phone FROM farmers";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Format the phone number for display
        $phone_number = $row["phone"];
        // Output option tag with phone number as value and text
        echo "<option value='$phone_number'>$phone_number</option>";
    }
} else {
    echo "0 results";
}

// Close database connection
$conn->close();
?>
