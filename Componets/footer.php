<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Za-Alimi</title>

    <!-- Favicons -->
    <link href="images/Logo.png" rel="icon">
    <link href="images/Logo.png" rel="apple-touch-icon">

    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        .footer-container {
            background-color: #ccc;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
        }

        .footer-logo {
            max-width: 100px;
            margin-bottom: 20px;
        }

        .company-details {
            flex: 1 1 100%;
            margin-bottom: 20px;
            text-align: center;
        }

        .quick-links,
        .get-in-touch {
            flex: 1 1 calc(50% - 20px);
            margin-bottom: 20px;
            text-align: center;
        }

        .quick-links p,
        .get-in-touch p {
            margin: 5px 0;
        }

        .contact-details {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        .contact-details p {
            margin-left: 10px;
        }

        .contact-details i {
            color: blue;
        }

        .quick-links a {
            text-decoration: none;
            color: blue;
        }

        .quick-links a:hover {
            text-decoration: underline;
        }

        .section-title {
            color: green;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .copyright {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .quick-links,
            .get-in-touch {
                flex: 1 1 100%;
                margin-bottom: 20px;
            }

            .contact-details {
                flex-direction: column;
                align-items: flex-start;
            }

            .contact-details p {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Footer Start -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Logo and company details -->
            <div class="company-details">
                <img src="images/Logo.png" alt="Za-Alimi Logo" class="footer-logo">
                <p>Za-Alimi agri-hub management system is a comprehensive platform aimed at enhancing agricultural practices and resources.</p>
            </div>

            <!-- Quick Links -->
            <div class="quick-links">
                <p class="section-title">Quick Links:</p>
                <p><a href="home.php">Home</a> | <a href="about.php">About Us</a> | <a href="edu.php">Education</a> | <a href="animal.php">Animals</a> | <a href="plants.php">Plants</a></p>
            </div>

            <!-- Get In Touch -->
            <div class="get-in-touch">
                <p class="section-title">Get In Touch:</p>
                <div class="contact-details">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>123 Street, Area, Lilongwe, Malawi</p>
                </div>
                <div class="contact-details">
                    <i class="fas fa-phone"></i>
                    <p>+265 9939 24405</p>
                </div>
                <div class="contact-details">
                    <i class="fas fa-envelope"></i>
                    <p>info@zaalimihub.com</p>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="copyright">
            <p>&copy; 2024 Za-Alimi. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer Ends Here -->
</body>

</html>
