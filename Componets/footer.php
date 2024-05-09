
<!DOCTYPE html>
<html>

<head>
    <title>Za-Alimi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="images/Logo.png" rel="icon">
    <link href="images/Logo.png" rel="apple-touch-icon">
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
            justify-content: space-between; /* Space out items */
            align-items: center; /* Center items vertically */
        }

        .footer-logo {
            max-width: 100px; /* Adjust the size of the logo */
        }

        .quick-links {
            flex-grow: 1; /* Take up remaining space */
            color: green;
            font-size: 20px;
        }

        .get-in-touch {
            text-align: right; /* Align to the right */
            color: green;
            font-size: 20px;
        }

        .copyright {
            margin-top: 20px; /* Add space between content and copyright */
            font-size: 14px; /* Adjust font size */
        }
    </style>
</head>

<body>
    <!-- Footer Start -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Logo and company details -->
            <div>
                <img src="images/logo.png" alt="Za-Alimi Logo" class="footer-logo">
                <p>About Za-Alimi: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <!-- Quick Links -->
            <class="quick-links">
                <p style="color: green;
            font-size: 20px;">Quick Links:</p>
                <br></br>
                <p><a href="home.php">Home</a> | <a href="about.php">About Us</a> | <a href="edu.php">Education</a> | <a href="animal.php">Animals</a> | <a href="Plants.php">Plants</a></p>
            </div>

            <!-- Get In Touch -->
            <div class="get-in-touch">
                <p>Get In Touch:</p>
                <br><br/>
                <p>123 Street, Area, Lilongwe, Malawi</p>
                <p>+265 9939 24405</p>
                <p>info@zaalimihub.com</p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            <p>&copy; 2024 All rights reserved</p>
        </div>
    </footer>
    <!-- Footer Ends Here-->
</body>

</html>
