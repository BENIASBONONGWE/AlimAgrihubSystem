<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

$host = "localhost";
$username = "root";
$password = "";
$database = "phpland";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();                                          
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'bed-com-28-19@unima.ac.mw';           
        $mail->Password   = 'yamikani2000';                      
        $mail->SMTPSecure = 'tls';                                 
        $mail->Port       = 587;                                   

        // Recipients
        $mail->setFrom($_POST['email']);                           
        $mail->addAddress('bed-com-28-19@unima.ac.mw');           

        // Content
        $mail->isHTML(true);                                      
        $mail->Subject = 'Message from user';                      
        $mail->Body    = $_POST['message'];                       

        // Send email
        if ($mail->send()) {
            echo 'Message has been sent';

            // Insert form data into the database using prepared statement
            $stmt = $conn->prepare('INSERT INTO messages (name, email, message) VALUES (?, ?, ?)');
            $stmt->bind_param('sss', $_POST['name'], $_POST['email'], $_POST['message']);
            $stmt->execute();
            $stmt->close();
        } else {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
