<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_url = "https://telcomw.com/api-v2/text/?";
    $message = urlencode($_POST['message']);
    $api_key = "SZBZCPONZSLTWHLJLIAP ";
    $password = urlencode("yamikani2000");
    $from = "WGIT";

    $phone_numbers = [];

    if (isset($_POST['phone']) && is_array($_POST['phone'])) {
        foreach ($_POST['phone'] as $phone) {
            $phone_numbers[] = '+265' . ltrim($phone, '0');
        }
    } elseif (!empty($_POST['phone_input'])) {
        $phone_numbers = explode(', ', $_POST['phone_input']);
    }

    $all_responses = [];
    foreach ($phone_numbers as $phone) {
        $phone = urlencode($phone);
        $url = $api_url . "message=$message&phone=$phone&api_key=$api_key&password=$password&from=$from";

        $response = file_get_contents($url);

        if ($response === FALSE) {
            $_SESSION['message'] = 'Error occurred';
            header('Location: home.php');
            exit();
        }

        $all_responses[] = $response;
    }

    // Store success message in session
    $_SESSION['message'] = 'Message sent successfully!';
    header('Location: admin_dashboard.php');
    exit();
} else {
    echo "Invalid request method.";
}
?>
