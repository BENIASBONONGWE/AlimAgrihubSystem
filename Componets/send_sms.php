<?php
// Include Twilio PHP SDK
require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';

// Your Twilio Account SID and Auth Token
$sid = "AC60ebd3a572f7d080f10427f5e739323d";
$token = "57957044f57735a56f3d376f5788a684";
$client = new Twilio\Rest\Client($sid, $token);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the message body and phone numbers from the form input
    $messageBody = $_POST['message'];
    $phoneNumber = isset($_POST['phone_input']) ? $_POST['phone_input'] : $_POST['phone']; // This will be pre-filled with the selected phone number or user input
    // Use the phone number directly to send the message
    $message = $client->messages->create(
        $phoneNumber,
        [
            'from' => '+13252405760',
            'body' => $messageBody
        ]
    );

    // Check if the message was sent successfully
    if ($message) {
        echo '<div class="message">Message sent successfully</div>';
    } else {
        echo '<div class="error">Failed to send message</div>';
    }
}
?>
