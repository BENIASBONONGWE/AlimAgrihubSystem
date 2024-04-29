
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZaAlimi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    
    
    .carousel-item img {
      max-height: 600px; 
      object-fit: cover;
    }

    .carousel-caption {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white; 
    }
    .btn-brown {
      color: white; 
      background-color:green; 
      border-color: green;
      padding: 10px;  
    }

    .custom-yellow-bg {
      background-color: #ffd700; /* Adjust the hex code for your desired yellow shade */
      padding: 5px; /* Add some padding for spacing (optional) */
    }

    .btn-brown:hover {
      color: #fff; 
      background-color: #ffd700; 
    }

    .text {
      position: absolute;
      top: 800px;
      left: 100px;
      padding: 100px;
      font-size: large;
      font-weight: bold;
      width: 20%;
      color: white;
    }

    .footer {
      right: 20px;
    }

    .footer-image {
      width: 100%; /* Adjust the width as needed */
      margin-top: 20px; /* Adjust the top margin as needed */
      margin-bottom: 20px; /* Adjust the bottom margin as needed */
    }
    .dropdown-item:hover {
        background-color: gold; 
    }
  </style>
  </head>
  
</head>
<?php include ("nav.php");  ?>
<div class="container-fluid">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/tobacco Field.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Welcome to ZaAlimi</h5>
          <p>About Us</p>
          <a href="about.php" class="btn btn-brown">Discover More</a> <!-- Brown button for the first carousel item -->
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/maize.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Discover The Products</h5>
          <p>Explore on Animal production</p>
          <a href="animal.php" class="btn btn-brown">Discover More</a> <!-- Brown button for the second carousel item -->
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/bean.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Contact Us</h5>
          <p>Get in touch with us for more information</p>
          <a href="contactus.php" class="btn btn-brown">Discover More</a> <!-- Brown button for the third carousel item -->
        </div>
      </div>
    </div>
  </div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</div>
<br></br>
<br></br>

<br></br>

<br></br>
<br></br>
<?php include ("body.php");  ?>

<br></br>

<?php include ("footer.php");  ?>
</html>
