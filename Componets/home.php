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
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <div class="navbar-header"></div>
        <div class="secondary-logo">
            <img src="images/Za-Alimi.jpg" alt="Another Logo" class="logo">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == "home") echo 'active'; ?>" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == "contact") echo 'active'; ?>" aria-current="page" href="contactus.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == "about") echo 'active'; ?>" aria-current="page" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if ($currentPage == "services") echo 'active'; ?>" href="services" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="Plants.php">CROPS</a></li>
                        <li><a class="dropdown-item" href="edu.php">Education</a></li>
                        <li><a class="dropdown-item" href="animal.php">Animal Production</a></li>
                       
                    
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == "chatroom") echo 'active'; ?>" aria-current="page" href="login.php">
                        <i class="fas fa-comments"></i> ChatRoom
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == "search") echo 'active'; ?>" aria-current="page" href="search.php">
                        <i class="fas fa-search"></i>&nbsp; 
                    </a>
                </li>
                <li class="nav-item custom-yellow-bg">
                    <a class="nav-link <?php if ($currentPage == "phone") echo 'active'; ?>" aria-current="page" href="phone.php">
                        <i class="fas fa-phone"></i> 0998292856
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == "location") echo 'active'; ?>" aria-current="page" href="location.php">
                        <i class="fas fa-map-marker-alt"></i> Malawi
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/tobacco Field.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Welcome to ZaAlimi</h5>
          <p>We provide top-notch services</p>
          <a href="about.php" class="btn btn-brown">Discover More</a> <!-- Brown button for the first carousel item -->
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/maize.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Discover Our Products</h5>
          <p>Explore our wide range of products</p>
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
<?php include ("body.php");  ?>

<br></br>
</html>
<?php include ("footer.php");  ?>
