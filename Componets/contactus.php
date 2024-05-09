<!DOCTYPE html>
<html lang="en">
<?php include("nav.php"); ?>
<head>
    <meta charset="UTF-8">
    <title>Get in touch with us</title>
    <link rel="stylesheet" href="CSS/contactus.css">
    <link rel="stylesheet" href="CSS/nav.css"> <!-- Assuming nav.php includes navigation bar styles -->
</head>
<body>
    
    <div class="contact-container">
        <form method="post" action="sendEmail.php">
            <h3>GET IN TOUCH</h3>
            <input type="text" name="name"  placeholder="Enter your name" required>
            <input type="email" name="email"  placeholder="Your email here" required>
            <textarea name="message" id="message" rows="4" placeholder="Message" required></textarea>
            <button type="submit" class="login-btn">Send</button>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
