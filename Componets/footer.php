<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Website Title</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evSXbVzTVFTJwvtQveHhqvC02KWw9q2EMROhTkIkIkzAyhzjIW/ATCi3zWRqjsD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css"> 
  <style>
    /* Additional CSS */
    .custom-img {
      max-height: 350px; /* Adjust the value as needed */
      position: relative; /* Make the parent element positioned */
    }
    .img-overlay {
      position: absolute; /* Position the overlay content absolutely */
      top: 20%; /* Align to the middle vertically */
      left: 50%; /* Align to the middle horizontally */
      transform: translate(-50%, -50%); /* Center the content */
      color: black; /* Text color */
      text-align: center; /* Center align text */
    }
    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      height: 100%;
    }
    .carousel-caption {
      position: absolute;
      top: 20%;
      left: 10%;
      transform: translate(-50%, -50%);
      color: white; 
      font-size: 32px;
      font-weight: bold;
    }
    .card-text{
      font-size: 20px;
    }
    .card-title{
      font-size: medium;
      font-weight: bold;
    }
    .custom-img1{
      max-height: 400px;
      width: 100%;
    }
    
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-3 h-100" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4 position-relative"> <!-- Make this column position relative to contain absolute positioning -->
            <img src="images/home1.jpeg" class="img-fluid rounded-start custom-img" alt="..."> <!-- Added custom-img class -->
            <div class="carousel-caption">
              <h5>RICE</h5>
            </div>
            <div class="img-overlay"> <!-- Overlay text -->
              <h5 class="card-title">ZAALIMI AGRI SYSTEM</h5>
              <p class="card-text">eMlimi is an Android-based mobile application that brings together buyers, farmers, and other actors to benefit from the aggregation of commodities in Malawi villages, enhance access to appropriate extension information, market information, weather information, nutrition information, among others.</p>
              <p class="card-text">The application facilitates efficient trade of agricultural commodities, consumer goods, and other services. Buyers, farmers, extension service providers, private companies, and BDS providers register into the platform and access services such as:</p>
              <ul>
                <li>Agronomic information on various commodities (right from land preparation to post-harvest management)</li>
                <li>Commercialization information</li>
                <li>Aggregated agri-commodities</li>
                <li>Nutrition Information</li>
                <li>Quality standards and specification</li>
                <li>Prices and price trends</li>
                <li>Reliable and verified buyers/markets season by season</li>
                <li>Fresh products</li>
              </ul>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <!-- Empty -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title text-center">WE ARE NOT REST UNTIL WE ACHIEVE THE GOALS</h5>
    <ul>
                <li>Agronomic information on various commodities (right from land preparation to post-harvest management)</li>
                <li>Commercialization information</li>
                <li>Aggregated agri-commodities</li>
                <li>Nutrition Information</li>
                <li>Quality standards and specification</li>
                <li>Prices and price trends</li>
                <li>Reliable and verified buyers/markets season by season</li>
                <li>Fresh products</li>
              </ul>
  </div>
  <img src="images/home2.jpeg" class="card-img-bottom custom-img1" alt="...">
<!-- JavaScript and Font Awesome CDN links -->
<script src="https://kit.fontawesome.com/your_fontawesome_kit_id.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-boQlKl8"></script>
</body>
</html>

