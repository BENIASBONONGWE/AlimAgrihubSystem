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
      height: 200px; 
     
    }
    .centered-text {
      color: aliceblue;
      padding-left: 750px;
      padding-right: 750px;
      padding-top: 200px;
    }
    .blog-container {
      padding-right: 10px; /* Adjust padding as needed */
      padding-left: 100px; /* Adjust padding as needed */
    }
    .card-wrapper {
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        transition: transform 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-wrapper:hover {
        transform: scale(1.05);
    }

    .card-wrapper:hover .card-body {
        color: black;
    }
    .card-title{
color: black;
    }
    .learn{
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <?php include ("navbar.php");  ?>

  <!-- Page Content -->
  <div class="container-fluid mt-4 mb-4">
    <!-- Image at the top -->
    <div>
      <div style="background-image: url('images/home1.jpeg');  background-position: center; height: 500px;  width: 100%;">
        <div class="centered-text">
          <h3>LEARNING SECTION</h3>
        </div>
      </div>
    </div>

    <!-- Row containing both main content and sidebar -->
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
        <div class="container blog-container">
<br></br>
<br></br>
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
        echo "<p>";

        // Output content
        echo $row['content'];

        // Check if there are any associated files
        if (!empty($row['files'])) {
            $files = explode(",", $row['files']);
            foreach ($files as $file) {
                // Assuming files are stored in a directory named "uploads"
                echo "<a href='uploads/$file' target='_blank'>$file</a><br>";
            }
        }

        // Check if there are any associated images
        if (!empty($row['images'])) {
            $images = explode(",", $row['images']);
            foreach ($images as $image) {
                // Assuming images are stored in a directory named "images"
                echo "<img src='images/$image' alt='Image'><br>";
            }
        }

        // Check if there are any associated videos
        if (!empty($row['videos'])) {
            $videos = explode(",", $row['videos']);
            foreach ($videos as $video) {
                // Display each video directly from the stored video ID
                echo '<div class="video">';
                echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video . '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
            }
        }

        echo "</p>";
       
        echo "</div>";
    }

    // Close database connection
    mysqli_close($conn);
    ?>
</div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <br><br>
            <h1 class="learn">WHAT TO LEARN</h1> 
            <br><br>
            <?php
            // Include the database connection file
            include('db.php');

            // Fetch card data from the database
            $sql = "SELECT * FROM cards";
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                echo "<div class='container mt-5'>";
                echo "<div class='row'>";
                // Iterate over the fetched data and generate HTML for each card
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<a href='" . $row['page'] . "' class='text-decoration-none'>";
                    echo "<div class='card-wrapper'>";
                    echo "<div style='background-image: url(" . $row['image_url'] . "); background-size: cover; height: 200px;'></div>";
                    echo "<div class='card-body' style='height: 150px; overflow: hidden;'>";
                    echo "<h5 class='card-title'>" . $row['title'] . "</h5>";
                    echo "<p class='card-text'>" . $row['description'] . "</p>";
                    echo "</div>"; // Close card-body
                    echo "</div>"; // Close card-wrapper
                    echo "</a>";
                    echo "</div>"; // Close col-md-4
                }
                echo "</div>"; // Close row
                echo "</div>"; // Close container
            } else {
                echo "No data found";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Footer -->
  <?php include ("footer.php");  ?>
</body>
</html>
