<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Retrieve phone number and message from the form
        $phoneNumber = $_POST['phoneNumber'];
        $message = $_POST['message'];
        // API parameters
        $apiKey = "g50Fa2AlRQziZf6m2dDy";
        $password = "yamikani2000";
        $from = "WGIT";
        // Construct the API URL
        $url = "https://telcomw.com/api-v2/text?message=" . urlencode($message) .
            "&phone=" . urlencode($phoneNumber) .
            "&api_key=" . urlencode($apiKey) .
            "&password=" . urlencode($password) .
            "&from=" . urlencode($from);
        
        // Make GET request to the API URL using file_get_contents
        $response = file_get_contents($url);
        if ($response !== false) {
            // Decode JSON response
            $responseData = json_decode($response, true);
            // Check if the message was sent successfully
            if ($responseData && isset($responseData['status']) && $responseData['status'] == 'success') {
                echo "Message sent successfully";
            } else {
                echo "Failed to send message";
            }
        } else {
            echo "Failed to connect to Telcomw API";
        }
    }
}
?>


