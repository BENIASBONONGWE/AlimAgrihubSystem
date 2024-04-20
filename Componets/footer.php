
<!DOCTYPE html>
<html>

<head>
    <title>Footer Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        footer {
            display: flex;
            justify-content: space-around;
            background-color: green;
            color: #fff;
            padding: 20px;
        }

        .column {
            width: 27%;
        }

        p {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            text-decoration: none;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        /* Add hover effect */
        a:hover {
            color: #ffd700; /* Change to your desired hover color */
        }
    </style>
</head>

<body>
    <footer>
        <div class="column">
            <p>ZA-ALIMI</p>
            <ul>
			<li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="chartroom.php">ChartRoom</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
				
            </ul>
        </div>

        <div class="column">
            <p>ANIMALS</p>
            <ul>
                <li><a href="goat_details.php">Goats</a></li>
                <li><a href="guineafowl_details.php">Guineafowl</a></li>
                <li><a href="pig_details.php">Pig</a></li>
				<li><a href="cattle_details.php">Cattle</a></li>
                <li><a href="rabbit_details.php">Rabbit</a></li>
                <li><a href="chicken_details.php">chicken</a></li>
                <li><a href="ducks_details.php">Duck</a></li>
            </ul>
        </div>

        <div class="column">
            <p>CROPS</p>
            <ul>
                <li><a href="soya_details.php">Soya Beans</a></li>
                <li><a href="maize_deteals.php">Maize</a></li>
				<li><a href="groundnuts_details.php">Groundnuts</a></li>
                <li><a href="irishpotataos_details.php">Irish Potatoes</a></li>
                <li><a href="tobacco_details.php">Tobacco</a></li>
                <li><a href="tea_details.php">Tea</a></li>
            </ul>
        </div>
    </footer>
</body>
<marquee> &copy; Za-Alimi agrihub <?php echo date('Y'); ?> </marquee>

</html>
