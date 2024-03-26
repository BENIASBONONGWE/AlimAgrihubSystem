<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZaAlimi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      height: 100px;
      width: 100px;
      
    }

    .navbar-brand {
      margin-left: 5rem;
    }

    .secondary-logo {
      margin-left: 5rem;
    }

    .nav-item{
      margin-left: 7rem;
    }

    .nav-item1{
      margin-right: 0rem;
    }

    .carousel-item {
      position: relative;
    }

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
  color: #fff; 
  background-color: #ffd700; 
  border-color: #ffd700;
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
.footer{
  right: 20px;
}
.footer-image {
    width: 100%; /* Adjust the width as needed */
    margin-top: 20px; /* Adjust the top margin as needed */
    margin-bottom: 20px; /* Adjust the bottom margin as needed */
}


  </style>
  </head>
</head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div>
<footer class="container-fluid mt-4 mb-4">
    <div class="row">
        <div class="col-md-1">
            <img src="images/home1.jpeg" alt="Your Image" width="400px" >
        </div>
        <div class="col-md-3">
            <div class="text">MAKE FARMING SIMPLE</div>
        </div>
        <div class="col-md-2">
            <h5>ZA-ALIMI</h5>
            <p>Agriculture is a backbone of our economy as acompany therefore we priotise it </p>
            <p>Code licensed MIT, docs CC BY 3.0.</p>
            <p>Currently v5.0.2.</p>
            <p>Analytics by Group7.</p>
        </div>
        <div class="col-md-1">
            <h5>Links</h5>
            <ul class="list-unstyled">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">services</a></li>
                <li><a href="#chatroom">chatroom</a></li>
                <li><a href="#contact">Contact us</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#">Swag Store</a></li>
            </ul>
        </div>
        <div class="col-md-1">
            <h5>Modules</h5>
            <ul class="list-unstyled">
                <li><a href="#">Maize</a></li>
                <li><a href="#">Rice</a></li>
                <li><a href="#">Tobacco</a></li>
                <li><a href="#">Soya</a></li>
                <li><a href="#">Beans</a></li>
            </ul>
        </div>
        <div class="col-md-1">
            <h5>Information</h5>
            <ul class="list-unstyled">
                <li><a href="about.php">About</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="team.php">Our Team</a></li>
                
            </ul>
        </div>
        <div class="col-md-1">
            <h5>Social</h5>
            <ul class="list-unstyled">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Google</a></li>
                <li><a href="#">Whaatsap</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">YouTube</a></li>
            </ul>
        </div>
    </div>
</footer>
</div>
</html>
<?php include ("footer.php");  ?>
