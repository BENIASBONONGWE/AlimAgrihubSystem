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
      padding-top: 0px;
      min-height: 100vh;
      padding: 0;

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
      padding-left: 750px;
      padding-right: 750px;
     padding-top: 200px;
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <?php include ("navbar.php");  ?>

  <!-- Page Content -->
  <div class="container-fluid mt-4 mb-4">
    <!-- Image at the top -->
    <div >
      <div style="background-image: url('images/home1.jpeg');  background-position: center; height: 500px;  width: 100%;">
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
        <?php
          // Include database connection
          include 'db.php';

          // Query to fetch blog posts from database
          $query = "SELECT * FROM posts";
          $result = mysqli_query($conn, $query);

          // Display fetched blog posts
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='blog-post'>";
            echo "<h2 class='blog-post-title'>" . $row['title'] . "</h2>";
            echo "<p class='blog-post-meta'>" . $row['date'] . " by <a href='#'>" . $row['author'] . "</a></p>";
            echo "<p>" . $row['content'] . "</p>";
            echo "</div>";
          }

          // Close database connection
          mysqli_close($conn);
        ?>
      </div>
      <body>
      <?php
// Include the database connection file
include('db.php');

// Fetch card data from the database

$sql = "SELECT * FROM cards";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    ?>
    <div class="container mt-5">
        <div class="row">
            <?php
            // Iterate over the fetched data and generate HTML for each card
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4 mb-4">
                    <a href="<?php echo $row['page']; ?>" class="text-decoration-none">
                        <div style="background-image: url('<?php echo $row['image_url']; ?>'); background-size: cover; height: 200px;"></div>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
} else {
    echo "No data found";
}

// Close the database connection
mysqli_close($conn);
?>

    <div class="container-fluid mt-4 mb-4">
    <div class="row">
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
              <!-- Sidebar content -->
          </li>
          <!-- List items -->
        </ul>
        <h5>What to learn</h5>
        <ul class="list-unstyled">
          <li class="my-4">

        <a href="land.php" style="font-size: 20px;">Time of land preparations</a>
    </li>
    <li class="my-4">
        <a href="pesticides.php" style="font-size: 20px;">Use of pesticides effectively</a>
    </li>
    <li class="my-4">
        <a href="care.php" style="font-size: 20px;">Taking care of usable resources</a>
    </li>
    <li class="my-4">
        <a href="Prevention.php" style="font-size: 20px;">Prevention and treatment with pesticides</a>
    </li>
    <li class="my-4">
        <a href="payemproyee.php" style="font-size: 20px;">How to pay employees</a>
    </li>
    <li class="my-4">
        <a href="farmbudget.php" style="font-size: 20px;">Farm budgeting</a>
    </li>
</ul>
    
          </li>
          <!-- List items -->
        </ul>
      </div>

      <!-- Main content column -->
      <div class="col-md-8">
        <!-- Content -->
        <div class="container mt-5">
          <div class="row">
            <!-- First Row -->
            <div class="col-md-4 mb-4">
              <a href="land.php" class="text-decoration-none">
                <!-- Content -->
              </a>
              <!-- Card Body -->
            </div>

            <div class="col-md-4 mb-4">
              <a href="pesticides.php" class="text-decoration-none">
                <!-- Content -->
              </a>
              <!-- Card Body -->
            </div>

            <div class="col-md-4 mb-4">
              <a href="care.php">
                <!-- Content -->
              </a>
              <!-- Card Body -->
            </div>
            <!-- Second Row -->
            <div class="col-md-4 mb-4">
              <a href="Prevention.php">
                <!-- Content -->
              </a>
              <!-- Card Body -->
            </div>

            <div class="col-md-4 mb-4">
              <a href="payemproyee.php">
                <!-- Content -->
              </a>
              <!-- Card Body -->
            </div>

            <div class="col-md-4 mb-4">
              <a href="farmbudget.php">
                <!-- Content -->
              </a>
              <!-- Card Body -->
            </div>
          </div>
        </div>
       <?php
// Include database connection
include 'db.php';

// Query to fetch paragraphs from database
$query = "SELECT paragraph_text FROM agriculture_paragraphs";
$result = mysqli_query($conn, $query);

// Display fetched paragraphs
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>" . $row['paragraph_text'] . "</p>";
}

// Close database connection
mysqli_close($conn);
?>

<?php
// Include database connection
include 'db.php';

// Query to fetch crop production data from database
$query = "SELECT * FROM crop_production";
$result = mysqli_query($conn, $query);

// Display fetched crop production data in a table
echo "<div class='container mt-5'>";
echo "<h2>Crop Production for Five Years</h2>";
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th>Year</th>";
echo "<th>Maize (in tons)</th>";
echo "<th>Cassava (in tons)</th>";
echo "<th>Beans (in tons)</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Loop through each year's data and generate table rows
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['maize'] . "</td>";
    echo "<td>" . $row['cassava'] . "</td>";
    echo "<td>" . $row['beans'] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";

// Close database connection
mysqli_close($conn);
?>

      </div>
      
    </div>
  </div>
  <!-- /.container -->
  
  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php include ("footer.php");  ?>
