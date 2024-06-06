<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

include_once "db.php"; // Ensure this file has the correct database connection info

// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ($email) {
        if (emailExists($pdo, $email)) {
            $token = generateToken($email);
            if (storeToken($pdo, $email, $token)) {
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'bed-com-28-19@unima.ac.mw';
                    $mail->Password = 'yamikani2000';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('your-email@gmail.com', 'Your Name');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Password Reset Request';
                    $mail->Body = "Dear User,<br><br>You have requested to reset your password. Click the link below to reset your password:<br><br>";
                    $mail->Body .= "<a href='http://localhost/ZAALIMI/componets/reset_password.php?email=" . urlencode($email) . "&token=" . urlencode($token) . "'>Reset Password</a><br><br>";
                    $mail->Body .= "If you did not request this, please ignore this email.<br><br>";
                    $mail->Body .= "Best regards,<br>Your Website Team";

                    $mail->send();
                    echo 'A password reset link has been sent to your email address.';
                  
                    exit;
                } catch (Exception $e) {
                    echo "Failed to send email. Please try again later. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "Failed to store token. Please try again later.";
            }
        } else {
            echo "Email address not found. Please enter a registered email.";
        }
    } else {
        echo "Invalid email address. Please enter a valid email.";
    }
}

function generateToken($email) {
    return hash('sha256', $email . uniqid('', true));
}

function storeToken($pdo, $email, $token) {
    $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
    return $stmt->execute([$email, $token, $expires_at]);
}

function emailExists($pdo, $email) {
    $stmt = $pdo->prepare("SELECT 1 FROM extension_workers WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetchColumn();
}
?>
