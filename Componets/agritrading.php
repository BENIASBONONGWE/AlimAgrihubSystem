<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AgriTrading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="aboutus.css" rel="stylesheet">
  <link href="body.css" rel="stylesheet">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384"></script>


  <!-- Favicons -->
  <link href="images/Logo.png" rel="icon">
  <link href="images/Logo.png" rel="apple-touch-icon">

	<style>
        body {
            text-align: center; /* Align all text to the center */
            font-family: Arial, sans-serif;
        }
        h1, h4, p {
            margin: 0 auto; /* Set left and right margin to auto to center align */
            max-width: 600px; /* Optional: Set a maximum width to prevent text from becoming too wide */
        }
        body {
            text-align: center; /* Align all text to the center */
            font-family: Arial, sans-serif; /* Optional: Set a font for better readability */
        }
        .crop-cards {
            display: flex; /* Use flexbox for flexible layout */
            flex-wrap: wrap; /* Allow cards to wrap to next row */
            justify-content: center; /* Center align cards horizontally */
        }
        .crop-card {
            flex: 0 0 calc(25% - 20px); /* Set width of each card to 25% minus margin */
            /* display: inline-block; */
            width: 200px; /* Set width of each card */
            margin: 20px; /* Add some space between cards */
            text-align: left; /* Align text content to the left within cards */
            border: 1px solid #ccc; /* Add border for visual separation */
            padding: 10px; /* Add padding for spacing */
            border-radius: 5px; /* Optional: Add rounded corners for visual appeal */
            border: 1px solid #ccc;
        }
        .crop-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px; /* Optional: Add rounded corners to images */
        }
        .crop-card .details {
            margin-top: 10px; /* Add some space between image and details */
        }
        .crop-card .btn {
            display: block;
            background-color: green; /* Set button background color */
            color: #fff; /* Set button text color */
            padding: 5px 10px; /* Add padding for button */
            border: none; /* Remove button border */
            border-radius: 3px; /* Optional: Add rounded corners for button */
            cursor: pointer; /* Change cursor to pointer on hover */
            text-decoration: none; /* Remove default link underline */
             margin: 0 auto; background-color: green;
        }
        .crop-card .btn:hover {
            background-color: #0056b3; /* Change button background color on hover */
        }
        .banner {
      background-image: url('images/agritrading.jpg');
      background-size: cover;
      background-position: center;
      height: 25vh; /* Set the height to 50% of the viewport height */
    }

    .upper-section {
      padding: 20px;
    }
    .btn{
        display: block; margin: 0 auto; background-color: green;
    }
    </style>
</head>
<body>
<?php include ("nav.php");  ?>
<div class="banner"></div>
<b><h3 style="color:green; font-size: 20 px;">WE PROVIDE BEST AGRITRADING</h3></b>

<div class="upper-section"></div>
   <h1>About AgriTrading</h1>
   <h4>Our Smart Approach</h4>
   <br>
   <p>Through Za-Mlimi agri-trading component, buyers are registered into the platform as partners to smallholder farmers. The platform captures name of buyer or company, company contact, name of the officer in charge (officer interacting smallholder based sourcing of commodities) and commodities they source from farmers. The agri-trading function has virtual Aggregation that allows/enables the farmers, CV leaders or CVTF to upload commodities from the Commercial Producer Groups (CPGs) & Commercial Villages. The uploaded commodities are automatically aggregated by the application per commercial village. Buyers who login into the platform in search of produce or raw materials will access the aggregated commodities</p>
    <!-- Crop Cards container -->
    <div class="crop-cards">
    <!-- Crop Cards -->
   <div class="crop-card">
       <img src="images/soya_beans.jpg" alt="Soy Beans">
       <div class="details">
           <h2 style="text-align: center;">Soya Beans</h2>
           <p style="text-align: center;">100kg</p>
           <a href="soyabeans.php" class="btn">Read More</a>
       </div>
   </div>
   <div class="crop-card">
       <img src="images/honey_.jpg" alt="Honey">
       <div class="details">
           <h2 style="text-align: center;">Honey</h2>
           <p style="text-align: center;">100kg</p>
           <a href="honey.php" class="btn">Read More</a>
       </div>
   </div>
   <div class="crop-card">
       <img src="images/cassava_.jpg" alt="Honey">
       <div class="details">
           <h2 style="text-align: center;">Cassava</h2>
           <p style="text-align: center;">100kg</p>
           <a href="cassava.php" class="btn">Read More</a>
       </div>
   </div>
   <div class="crop-card">
       <img src="images/tomatoes_.jpg" alt="Honey">
       <div class="details">
           <h2 style="text-align: center;">Tomatoes</h2>
           <p style="text-align: center;">100kg</p>
           <a href="tomato.php" class="btn">Read More</a>
       </div>
   </div>
   <div class="crop-card">
       <img src="images/maize.jpg" alt="Honey">
       <div class="details">
           <h2 style="text-align: center;">Maize</h2>
           <p style="text-align: center;">100kg</p>
           <a href="maize.php" class="btn">Read More</a>
       </div>
   </div><div class="crop-card">
       <img src="images/rice.jpg" alt="Honey">
       <div class="details">
           <h2 style="text-align: center;">Rice</h2>
           <p style="text-align: center;">120kg</p>
           <a href="rice.php" class="btn">Read More</a>
       </div>
   </div><div class="crop-card">
       <img src="images/honey_.jpg" alt="Honey">
       <div class="details">
           <h2 style="text-align: center;">Honey</h2>
           <p style="text-align: center;">100kg</p>
           <a href="honey.php" class="btn">Read More</a>
       </div>
   </div><div class="crop-card">
       <img src="images/banana.jpg" alt="Honey">
       <div class="details">
           <h2 style="text-align: center;">Banana</h2>
           <p style="text-align: center;">100kg</p>
           <a href="banana.php" class="btn">Read More</a>
       </div>
   </div>
   <div class="crop-card">
       <img src="images/ginger.jpg" alt="Honey">
       <div class="details">
           <h2 style="text-align: center;">Ginger</h2>
           <p style="text-align: center;">10kg</p>
           <a href="ginger.php" class="btn">Read More</a>
       </div>
       <!-- <div class="crop-card">
       <img src="images/ground_nuts.jpg" alt="Honey">
       <div class="details">
           <h2>Ground Nuts</h2>
           <p>10kg</p>
           <a href="#" class="btn">Read More</a>
       </div>
       <div class="crop-card">
       <img src="images/beans_.jpg" alt="Honey">
       <div class="details">
           <h2>Beans</h2>
           <p>10kg</p>
           <a href="#" class="btn">Read More</a>
       </div> -->
    </div>

    <footer>

</footer>
<?php include("footer.php")?>
</body>
</html>