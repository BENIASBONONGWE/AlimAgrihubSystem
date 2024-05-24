<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Za-Alimi AgriHub</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Styles for the top bar */
        .top-bar {
            background-color: #066614;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            margin-left: 15px;
            font-weight: bold;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .top-bar a:hover {
            background-color: #04460d;
        }

        /* Styles for the main navigation bar */
        .navbar {
            background-color: #f0f0f0;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 50px;
            z-index: 999;
        }

        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #e0e0e0;
        }

        .logo img {
            height: 60px;
        }

        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f0f0f0;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
            z-index: 1001;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 16px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #e0e0e0;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .menu-toggle div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 5px 0;
            transition: background-color 0.3s;
        }

        .menu-toggle:hover div {
            background-color: #cccccc;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .top-bar {
                padding: 5px 20px;
                justify-content: space-between;
            }

            .top-bar a {
                padding: 5px 10px;
                font-size: 12px;
                margin-left: 5px;
                display: none;
            }

            .navbar {
                padding: 10px 20px;
                flex-direction: column;
                align-items: flex-start;
            }

            .logo img {
                height: 50px;
            }

            .navbar-links {
                display: none;
                flex-direction: column;
                width: 100%;
                text-align: left;
            }

            .menu-toggle {
                display: flex;
                margin-right: 10px;
            }

            .sidebar {
                width: 0;
            }

            .navbar.active .navbar-links,
            .top-bar.active a {
                display: block;
            }
        }

        @media (min-width: 769px) {
            .sidebar {
                display: none;
            }
        }

        .navbar,
        .sidebar a {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body>

    <div class="top-bar">
        <div class="menu-toggle" id="menuToggle">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <a href="extentiondashbord.php">Extension Workers login</a>
        <a href="head.php">Weather</a>
        <a href="halo.php">Campaigns</a>
        <a href="farmer_register.php">Farmer Registration</a>
        <a href="index.php">Seed Calculator</a>
        <a href="feedform.php">Feed Calculator</a>
    </div>

    <div class="navbar">
        <a class="logo" href="#">
            <img src="images/Logo.png" alt="Logo">
        </a>
        <div class="navbar-links">
            <a href="home.php">HOME</a>
            <a href="contactus.php">CONTACT US</a>
            <a href="about.php">ABOUT</a>
            <a href="edu.php">FARMERS HANDBOOK</a>
            <a href="animal.php">LIVESTOCKS</a>
            <a href="Plants.php">CROPS</a>
            <a href="agritrading.php">AGRITRADING</a>
        </div>
    </div>

    <div id="sidebar" class="sidebar">
        <a class="logo" href="#">
            <img src="images/Logo.png" alt="Logo">
        </a>
        <a href="extentiondashbord.php">Extension Workers login</a>
        <a href="head.php">Weather</a>
        <a href="halo.php">Campaigns</a>
        <a href="farmer_register.php">Farmer Registration</a>
        <a href="index.php">Seed Calculator</a>
        <a href="feedform.php">Feed Calculator</a>
        <a href="home.php">HOME</a>
        <a href="contactus.php">CONTACT US</a>
        <a href="about.php">ABOUT</a>
        <a href="edu.php">FARMERS HANDBOOK</a>
        <a href="animal.php">LIVESTOCKS</a>
        <a href="Plants.php">CROPS</a>
        <a href="agritrading.php">AGRITRADING</a>
    </div>

    <script>
        document.getElementById("menuToggle").addEventListener("click", function () {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.width === "300px") {
                sidebar.style.width = "0";
            } else {
                sidebar.style.width = "300px";
            }
        });
    </script>

</body>

</html>
