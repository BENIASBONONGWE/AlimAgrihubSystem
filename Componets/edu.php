<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Blog</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Custom styles for this template */
    body {
      padding-top: 56px;
    }
    .blog-post {
      margin-bottom: 4rem;
    }
    
    .card {
      background-size: cover;
      background-position: center;
      color: white;
      height: 200px; /* Adjust height as needed */
    }
    .centered-text {
     color: aliceblue;
      padding: 300px;
     
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <?php include ("navbar.php");  ?>

  <!-- Page Content -->
  <div class="container-fluid mt-4 mb-4">
    <!-- Image at the top -->
    <div class="container mt-5">
    <div style="background-image: url('images/home1.jpeg'); background-size: cover; background-position: center; height: 500px;  width: 1500px;right: 0px;">
      <div class="centered-text">
      <h3>LEARNING SECTION</h3>
    </div>
    </div>
  </div>


    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">Latest Date for Farming</h1>

        <!-- Blog Post -->
        <div class="blog-post">
          <h2 class="blog-post-title">Lets rebuld Agriculture together</h2>
          <p class="blog-post-meta">January 1, 2024 by <a href="#">Group3</a></p>
          <p>Making agriculture more profitable by accessing information on our finger tips</p>
          <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
  
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <!-- First Row -->
      <div class="col-md-4 mb-4">
  
    <a href="land.php" class="text-decoration-none">
      <div style="background-image: url('images/home2.jpeg'); background-size: cover; height: 200px;"></div>
    </a>
  <div class="card-body">
      <h5 class="card-title">Time of land preparations</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
</div>

      <div class="col-md-4 mb-4">
      <a href="pesticides.ph">
      <div class="card" style="background-image: url('images/rice.jpg">
          
        </div>
      </a>
      <div class="card-body">
            <h5 class="card-title">Use of pesticides effectively</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
      </div>
      <div class="col-md-4 mb-4">
      <a href="care.php">
        <div class="card" style="background-image: url('images/tea.jpg');">
          
        </div>
      </a>
      <div class="card-body">
            <h5 class="card-title">Taking care of usable resources</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
      </div>
      <!-- Second Row -->
      <div class="col-md-4 mb-4">
      <a href="treatment.php">
        <div class="card" style="background-image: url('images/maize.jpeg');">
         
        </div>
      </a>
      <div class="card-body">
            <h5 class="card-title">Prevention and treatment with pesticides</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
      </div>
      <div class="col-md-4 mb-4">
      <a href="pay.php">
        <div class="card" style="background-image: url('images/home3.jpeg');">
          
        </div>
      </a>
      <div class="card-body">
            <h5 class="card-title">How to pay employees</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
      </div>
      <div class="col-md-4 mb-4">
      <a href="pay.php">
        <div class="card" style="background-image: url('images/home2.jpeg');">
          
        </div>
      </a>
      <div class="card-body">
            <h5 class="card-title">How to pay employees</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
      </div>
    </div>
    
  <?php
    // Function to generate a paragraph about the importance of agriculture
    function importanceOfAgriculture() {
    }

    echo "<p><strong>Importance of Knowing Issues about Agriculture:</strong> Understanding the issues surrounding agriculture is crucial for addressing
     the challenges faced by the sector. These issues encompass a wide range of topics, including but not limited to, food security, sustainable
      farming practices, climate change adaptation, water management, and rural development. By being informed about these issues, stakeholders 
      can develop informed policies, innovative solutions, and effective strategies to enhance agricultural productivity, resilience, and sustainability.
       Furthermore, knowledge about agricultural issues empowers consumers to make informed choices, promotes public awareness and advocacy, and fosters
        collaboration among various stakeholders, including farmers, policymakers, researchers, and civil society organizations.
     Ultimately, knowing about agricultural issues is essential for shaping a more resilient, equitable, and sustainable agricultural future.</p>";
    function importanceOfKnowingIssues() {
      echo "<p style='margin-top: 50px;'><strong>Importance of Knowing Issues about Agriculture:</strong> Understanding the issues surrounding agriculture is crucial for addressing the challenges faced by the sector. These issues encompass a wide range of topics, including but not limited to, food security, sustainable farming practices, climate change adaptation, water management, and rural development. By being informed about these issues, stakeholders can develop informed policies, innovative solutions, and effective strategies to enhance agricultural productivity, resilience, and sustainability. Furthermore, knowledge about agricultural issues empowers consumers to make informed choices, promotes public awareness and advocacy, and fosters collaboration among various stakeholders, including farmers, policymakers, researchers, and civil society organizations. Ultimately, knowing about agricultural issues is essential for shaping a more resilient, equitable, and sustainable agricultural future.</p>";
    }

    // Calling the functions to generate paragraphs
    importanceOfAgriculture();
    importanceOfKnowingIssues();
  ?>
</body>

  </div>

</body>

<div class="container mt-5">
    <h2>Crop Production for Five Years</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Year</th>
          <th>Maize (in tons)</th>
          <th>Cassava (in tons)</th>
          <th>Beans (in tons)</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Define data for each year
          $crop_production = array(
            array("Year 1", 1000, 800, 500),
            array("Year 2", 1200, 900, 600),
            array("Year 3", 1300, 1000, 700),
            array("Year 4", 1100, 850, 550),
            array("Year 5", 1500, 1100, 800)
          );

          // Loop through each year's data and generate table rows
          foreach ($crop_production as $data) {
            echo "<tr>";
            foreach ($data as $value) {
              echo "<td>$value</td>";
            }
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
        <h5>Malawi</h5>
        <ul class="list-unstyled">
    <li class="my-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="images/home6.jpeg" alt="Maize" class="img-fluid">
                </div>
                <div class="col">
                    <a href="#" style="font-size: 20px;">Maize</a>
                </div>
            </div>
        </div>
    </li>
    <li class="my-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="images/home1.jpeg" alt="Rice" class="img-fluid">
                </div>
                <div class="col">
                    <a href="#" style="font-size: 20px;">Rice</a>
                </div>
            </div>
        </div>
    </li>
    <li class="my-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="images/home2.jpeg" alt="Tobacco" class="img-fluid">
                </div>
                <div class="col">
                    <a href="#" style="font-size: 20px;">Tobacco</a>
                </div>
            </div>
        </div>
    </li>
    <li class="my-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="images/home3.jpeg" alt="Soya" class="img-fluid">
                </div>
                <div class="col">
                    <a href="#" style="font-size: 20px;">Soya</a>
                </div>
            </div>
        </div>
    </li>
    <li class="my-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="images/home4.jpeg" alt="Beans" class="img-fluid">
                </div>
                <div class="col">
                    <a href="#" style="font-size: 20px;">Beans</a>
                </div>
            </div>
        </div>
    </li>
</ul>
<h5>What to learn</h5>
<ul class="list-unstyled">
    <li class="my-4">
        <a href="#" style="font-size: 20px;">Time of land preparations</a>
    </li>
    <li class="my-4">
        <a href="#" style="font-size: 20px;">Use of pesticides effectively</a>
    </li>
    <li class="my-4">
        <a href="#" style="font-size: 20px;">Taking care of usable resources</a>
    </li>
    <li class="my-4">
        <a href="#" style="font-size: 20px;">Prevention and treatment with pesticides</a>
    </li>
    <li class="my-4">
        <a href="#" style="font-size: 20px;">How to pay employees</a>
    </li>
</ul>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php include ("footer.php");  ?>


