
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

    .dropdown-item:hover {
        background-color: gold; 
    }

    /* Styling for the top navbar */
  
  </style>
  <?php include ("head.php");  ?>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <div class="navbar-header"></div>
        <div class="secondary-logo">
            <img src="Logo1.png" alt="Another Logo" class="logo">
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
    <a class="nav-link dropdown-toggle <?php if ($currentPage == "services") echo 'active'; ?>" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Services
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <li><a class="dropdown-item" href="edu.php">Education</a></li>
        <li><a class="dropdown-item" href="animal.php">Animal Production</a></li>
        <li><a class="dropdown-item" href="Plants.php">CROPS</a></li>
    </ul>
</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == "chartroom") echo 'active'; ?>" aria-current="page" href="sendsms.php">
                      AdminOnly
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == "search") echo 'active'; ?>" aria-current="page" href="seed.php">
                        SeedCalculator 
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

