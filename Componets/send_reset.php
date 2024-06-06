<?php
// Database connection details
include_once "db.php";
// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
    $new_password = filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);

    if ($email && $token && $new_password) {
        if (verifyToken($db, $email, $token)) {
            if (resetPassword($db, $email, password_hash($new_password, PASSWORD_DEFAULT))) {
                echo "Your password has been successfully reset.";
                header("Location: login.php");
            } else {
                echo "Failed to reset password. Please try again.";
            }
        } else {
            echo "Invalid or expired token. Please request a new password reset.";
        }
    } else {
        echo "All fields are required.";
    }
} else if ($_GET["email"] && $_GET["token"]) {
    $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
    $token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING);

    if ($email && $token && verifyToken($db, $email, $token)) {
        // Display password reset form
        echo '<form method="post" action="">
                <input type="hidden" name="email" value="' . htmlspecialchars($email) . '">
                <input type="hidden" name="token" value="' . htmlspecialchars($token) . '">
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" required>
                <button type="submit">Reset Password</button>
              </form>';
    } else {
        echo "Invalid or expired token. Please request a new password reset.";
    }
}

function verifyToken($db, $email, $token) {
    $stmt = $db->prepare("SELECT * FROM password_resets WHERE email = ? AND token = ? AND expires_at > NOW()");
    $stmt->execute([$email, $token]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function resetPassword($db, $email, $new_password) {
    $stmt = $db->prepare("UPDATE extension_workers SET password = ? WHERE email = ?");
    return $stmt->execute([$new_password, $email]);
}
?>
