<!DOCTYPE html>
<html lang="en">
<?php include("nav.php"); ?>

<head>
    <meta charset="UTF-8">
    <title>Get in touch with us</title>
    <link rel="stylesheet" href="CSS/contactus.css">
    <link rel="stylesheet" href="CSS/nav.css"> <!-- Assuming nav.php includes navigation bar styles -->
    <style>
        .contact-container {
            width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px; /* Added padding for smaller screens */
        }

        .contact-container form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            padding: 2vw 4vw;
            width: 90%;
            max-width: 600px;
            border-radius: 10px;
            margin-top: 20px; /* Adjusted margin for smaller screens */
        }

        .contact-container form h3 {
            text-align: center;
            color: #555;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .contact-container form input[type="text"],
        .contact-container form input[type="email"],
        .contact-container form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contact-container form button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-container form button:hover {
            background: green;
        }

        /* Media Queries */
        @media only screen and (max-width: 768px) {
            .contact-container form {
                padding: 10px; /* Adjusted padding for smaller screens */
            }

            .contact-container form h3 {
                font-size: 18px; /* Adjusted font size for smaller screens */
            }
        }

        @media only screen and (max-width: 576px) {
            .contact-container form {
                width: 100%;
                padding: 10px; /* Adjusted padding for smaller screens */
            }

            .contact-container form h3 {
                font-size: 16px; /* Adjusted font size for smaller screens */
            }
        }
    </style>
</head>

<body>
    <!-- Image at the top -->
    <div style="background-image: url('images/contact-us1.png');  background-position: center; height: 500px;  width: 100%;">
        <div class="centered-text"></div>
        <h3 style="text-align: center;">We are here for you</h3>
        <h2 style="color:green; text-align:center;">CONTACT US</h2>
    </div>
    <div class="contact-container">
        <form method="post" action="sendEmail.php">
            <h3>GET IN TOUCH</h3>
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Your email here" required>
            <textarea name="message" id="message" rows="4" placeholder="Message" required></textarea>
            <button type="submit" class="login-btn">Send</button>
        </form>
    </div>
    <br><br />
    <br><br />
    <br><br />
    <br><br />
    <?php include("footer.php"); ?>
</body>

</html>
