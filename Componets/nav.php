<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Za-Alimi AgriHub</title>
    <style>
        /* Styles for the top bar */
        .top-bar {
            background-color: #066614;
            padding: 10px;
            text-align: right;
            position: fixed;
            top: 0;
            width: 100%;
            transition: top 0.3s;
            z-index: 1000;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            margin-left: 10px;
            font-weight: bold;
        }

        .top-bar a:hover {
            background-color: #066614;
        }

        /* Styles for the main navigation bar */
        .navbar {
            background-color: #f0f0f0;
            overflow: hidden;
            padding: 50px;
            display: flex;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar a {
            color: black;
            text-decoration: none;
            padding: 20px 10px;
            font-size: 16px;
            line-height: 1;
            height: 50px;
        }

        .navbar a:hover {}

        .logo {
            margin-right: 10px 10px;
        }

        .logo img {
            width: auto;
            height: 160px;
            padding-bottom: 70px;
        }

        /* Media Queries */
        @media only screen and (max-width: 768px) {
            .navbar {
                padding: 20px; /* Adjusted padding for smaller screens */
            }

            .navbar a {
                padding: 10px 5px; /* Adjusted padding for smaller screens */
                font-size: 14px; /* Adjusted font size for smaller screens */
                height: auto; /* Adjusted height for smaller screens */
            }

            .logo img {
                height: 100px; /* Adjusted height for smaller screens */
                padding-bottom: 20px; /* Adjusted padding for smaller screens */
            }
        }
    </style>
</head>

<body>

    <div class="top-bar" id="topBar">
        <a href="extensionlogin.php">Extension Workers login</a>
        <a href="head.php">Wealther</a>
        <a href="halo.php">Compaigns</a>
        <a href="farmer_register.php">farmer Registration</a>
        <a href="seed.php">Seed Calculator</a>
        <a href="feed_calculator.php">feed Calculator</a>
    </div>

    <div class="navbar" id="navbar">
        <a class="logo" href="#">
            <img src="images/Logo.png" alt="Logo">
        </a>
        <a href="home.php" style="font-weight: bolder;">HOME</a>
        <a href="contactus.php" style="font-weight: bolder;">CONTACT US</a>
        <a href="about.php" style="font-weight: bolder;">ABOUT</a>
        <a href="edu.php" style="font-weight: bolder;">FARMERS HANDBOOK</a>
        <a href="animal.php" style="font-weight: bolder;">LIVESTOCKS</a>
        <a href="Plants.php" style="font-weight: bolder;">CROPS</a>
        <a href="agritrading.php" style="font-weight: bolder;">AGRITRADING</a>
    </div>

</body>

</html>
