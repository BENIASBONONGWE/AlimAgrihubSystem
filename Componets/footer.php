<!DOCTYPE html>
<html>

<head>
    <title>Za-Alimi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="images/Logo.png" rel="icon">
    <link href="images/Logo.png" rel="apple-touch-icon">

    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      /* Add your CSS styles here */
      .footer {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        .footer-container {
            background-color: #ccc; /* Gray color for the container */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Add some padding */
            display: flex; /* Use flexbox for layout */
            flex-wrap: wrap; /* Allow wrapping on small screens */
            justify-content: space-between; /* Space out items */
            align-items: center; /* Center items vertically */
        }

        .footer-logo {
            max-width: 100px; /* Adjust the size of the logo */
            padding-bottom: 20px; /* Add space below the logo */
            flex-basis: 100%; /* Take up full width on small screens */
        }

        .company-details {
            flex-basis: 100%; /* Take up full width on small screens */
            margin-bottom: 20px; /* Add space below the company details */
        }

        .quick-links,
        .get-in-touch {
            flex-basis: calc(50% - 20px); /* Two columns with a gap */
            text-align: center; /* Center text in each column */
        }

        .quick-links p,
        .get-in-touch p {
            margin: 5px 0; /* Adjust spacing for each link */
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
         /* Color the photo icons to blue */
         .contact-details i {
            color: blue;
        }
         /* Remove underlines from links */
         .quick-links a {
            text-decoration: none;
            color: blue;
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
                <p>Za-Alimi agri-hub management system is a comprehensive platform aimed </p>
            </div>

            <!-- Quick Links -->
            <div class="quick-links">
                <p style="color: green; font-size: 20px; font-weight: bold;">Quick Links:</p>
                <p><a href="home.php">Home</a> | <a href="about.php">About Us</a> | <a href="edu.php">Education</a> | <a href="animal.php">Animals</a> | <a href="Plants.php">Plants</a></p>
            </div>

            <!-- Get In Touch -->
            <div class="get-in-touch">
                <p style="color: green; font-size: 20px; font-weight: bold;">Get In Touch:</p>
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
            <p>&copy; 2024 Za-Alimi All rights reserved</p>
        </div>
    </footer>
    <!-- Footer Ends Here-->
    </div>
</body>

</html>
