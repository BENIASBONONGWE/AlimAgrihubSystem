<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouTube-like Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <div class="container mt-5">
    <div class="row">
      <?php
      // Database connection
      $dsn = 'mysql:host=localhost;dbname=your_database';
      $username = 'your_username';
      $password = 'your_password';

      try {
          $pdo = new PDO($dsn, $username, $password);
      } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
          die();
      }

      // Query to fetch video data from the database
      $stmt = $pdo->query("SELECT * FROM videos");

      // Loop through the data and generate HTML for each video
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="col-md-4 mb-4">';
          echo '<div class="card">';
          echo '<div class="embed-responsive embed-responsive-16by9">';
          echo '<iframe class="embed-responsive-item" src="' . $row['video_url'] . '" allowfullscreen></iframe>';
          echo '</div>';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $row['title'] . '</h5>';
          echo '<p class="card-text">' . $row['description'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
      }
      ?>
    </div>
  </div>

</body>
</html>
