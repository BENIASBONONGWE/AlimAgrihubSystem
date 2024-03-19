<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="navbar-header"></div>
    <div class="secondary-logo">
      <img src="images/logo.svg" alt="Another Logo" class="logo"> <!-- Adjust the image source and alt text -->
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
          <a class="nav-link <?php if ($currentPage == "contact") echo 'active'; ?>" aria-current="page" href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($currentPage == "about") echo 'active'; ?>" aria-current="page" href="about.php">About</a>
        </li>
      </ul>
      
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link <?php if ($currentPage == "services") echo 'active'; ?>" aria-current="page" href="services.php">
            <i class="fas fa-cogs"></i> Services
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($currentPage == "chatroom") echo 'active'; ?>" aria-current="page" href="chatroom.php">
            <i class="fas fa-comments"></i> ChatRoom
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto"> <li class="nav-item">
      <a class="nav-link <?php if ($currentPage == "services") echo 'active'; ?>" aria-current="page" href="services.php">
  <i class="fas fa-search"></i>&nbsp; Ben
</a>

<li class="nav-item custom-yellow-bg"> <a class="nav-link <?php if ($currentPage == "services") echo 'active'; ?>" aria-current="page" href="services.php">
    <i class="fas fa-phone"></i> 0998292856
  </a>
</li>






  <li class="nav-item">
    <a class="nav-link <?php if ($currentPage == "chatroom") echo 'active'; ?>" aria-current="page" href="chatroom.php">
      <i class="fas fa-sign-in-alt"></i> Malawi
    </a>
  </li>
</ul>
    </div>
    </ul>
  </div>
</nav>
