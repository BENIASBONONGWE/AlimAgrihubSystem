<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $recipientType = $_POST['recipient_type'];
    $phoneNumbers = $_POST['phone'] ?? [];
    $phoneInput = $_POST['phone_input'] ?? '';
    $message = $_POST['message'];
    
    // Combine phone numbers from multiple select and input
    if ($recipientType === 'other' && !empty($phoneInput)) {
        $phoneNumbers = explode(', ', $phoneInput);
    }

    // Prepare the message and phone numbers
    $apiKey = "g50Fa2AlRQziZf6m2dDy";
    $password = "yamikani2000";
    $from = "WGIT";
    
    foreach ($phoneNumbers as $phoneNumber) {
        $url = "https://telcomw.com/api-v2/text?message=" . urlencode($message) .
               "&phone=" . urlencode($phoneNumber) .
               "&api_key=" . urlencode($apiKey) .
               "&password=" . urlencode($password) .
               "&from=" . urlencode($from);

        $response = file_get_contents($url);
        if ($response !== false) {
            $responseData = json_decode($response, true);
            if ($responseData && isset($responseData['status']) && $responseData['status'] == 'success') {
                echo "Message sent successfully to $phoneNumber<br>";
            } else {
                echo "Failed to send message to $phoneNumber<br>";
            }
        } else {
            echo "Failed to connect to Telcomw API for $phoneNumber<br>";
        }
    }
}
?>
