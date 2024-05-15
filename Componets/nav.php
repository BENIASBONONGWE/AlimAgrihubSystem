<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Za-Alimi AgriHub</title>
    <style>
        /* Styles for the top bar */
        .top-bar {
            background-color: #066614;  /* Change background color as needed */
            padding: 10px;
            text-align: right;  /* Align links to the right */
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
            margin-left: 10px;  /* Add spacing between links */
            font-weight: bold;  /* Make links bolder (optional) */
        }

        .top-bar a:hover {
            background-color: #066614;  /* Change hover color as needed */
        }

        /* Styles for the main navigation bar */
        .navbar {
            background-color: #f0f0f0;  /* Change background color as needed */
            overflow: hidden;
            padding: 50px; /* Adjusted padding */
            display: flex;  /* Arrange links horizontally */
            justify-content: space-between;  /* Space links evenly */
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar a {
            color: black;
            text-decoration: none;
            padding: 20px 10px; /* Adjusted padding */
            font-size: 16px;
            line-height: 1; /* Ensures vertical alignment */
            height: 50px; /* Adjusted height */
        }

        .navbar a:hover {
            /* background-color: #007bff;  Change hover color as needed */
        }

        .logo {
            margin-right: 10px 10px;  /* Add margin for spacing */
        }

        .logo img {
            width: auto;  /* Adjust image width automatically */
            height: 160px;  /* Adjust image height as needed */
            padding-bottom: 70px;
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

<!-- <script>
    // Hide top bar on scroll down
    let lastScrollTop = 0;
    window.addEventListener("scroll", function(){
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        if (currentScroll > lastScrollTop){
            document.getElementById("topBar").style.top = "-50px";
        } else {
            document.getElementById("topBar").style.top = "0";
        }
        lastScrollTop = currentScroll;
    });
</script> -->

</body>

</html>
