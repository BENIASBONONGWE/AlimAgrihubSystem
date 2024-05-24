<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Farming</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="aboutus.css" rel="stylesheet">
  <link href="body.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Favicons -->
  <link href="images/Logo.png" rel="icon">
  <link href="images/Logo.png" rel="apple-touch-icon">

  <style>
    .container {
      max-width: 1200px;
      margin: auto;
      padding: 0 20px;
    }
    
    .grid-3 {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      grid-gap: 20px;
    }
    
    .animal {
      background: #f4f4f4;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      text-decoration: none;
      transition: transform 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .animal:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      color: yellow;
    }
    
    .animal img {
      width: 100%;
      border-radius: 5px;
      height: 200px;
      object-fit: cover;
    }
    
    .animal h3, .animal h5 {
      margin-top: 10px;
      color: green;
      text-decoration: none;
    }
    
    .banner {
      background-image: url('images/tea.jpg');
      background-size: cover;
      background-position: center;
      height: 50vh;
    }

    .upper-section {
      padding: 20px;
    }

    @media (max-width: 768px) {
      .banner {
        height: 30vh;
      }

      .animal img {
        height: 150px;
      }

      .animal h3, .animal h5 {
        font-size: 1rem;
      }
    }

    @media (max-width: 480px) {
      .animal img {
        height: 100px;
      }

      .animal h3 {
        font-size: 0.9rem;
      }

      .animal h5 {
        font-size: 0.8rem;
      }
    }
  </style>
</head>
<body>
  <?php include("nav.php"); ?>
  <div class="banner"></div>

  <div class="upper-section"></div>

  <center>
    <h3 style="color:green; font-size: 20px;">WE HELP YOU GROW THE BEST CROPS</h3>
  </center>

  <main>
    <section id="animal">
      <div class="container">
        <div class="grid-3">
          <!-- Animal Cards -->
          <a href="maize_deteals.php" class="animal">
            <img src="images/maize.jpeg" alt="">
            <h3>MAIZE</h3>  
            <h5>Land Preparation, Planting, Pests and Diseases, Harvesting, Varieties.</h5>
          </a>

          <a href="tobacco_details.php" class="animal">
            <img src="images/Tobacco Field.jpeg" alt="">
            <h3>TOBACCO</h3> 
            <h5>Land Preparation, Planting, Pests and Diseases, Harvesting, Varieties.</h5>
          </a>

          <a href="rice_details.php" class="animal">
            <img src="images/rice.jpg" alt="">
            <h3>RICE</h3> 
            <h5>Land Preparation, Planting, Pests and Diseases, Harvesting, Varieties.</h5>
          </a>

          <a href="soya_details.php" class="animal">
            <img src="images/Soya.jpeg" alt="">
            <h3>SOYA BEANS</h3> 
            <h5>Land Preparation, Planting, Pests and Diseases, Harvesting, Varieties.</h5>
          </a>

          <a href="groundnuts_details.php" class="animal">
            <img src="images/Peanut.jpeg" alt="">
            <h3>GROUNDNUTS</h3>
            <h5>Land Preparation, Planting, Pests and Diseases, Harvesting, Varieties.</h5>
          </a>

          <a href="cassava_details.php" class="animal">
            <img src="images/Cassava.jpeg" alt="">
            <h3>CASSAVA</h3>
            <h5>Land Preparation, Planting, Pests and Diseases, Harvesting, Varieties.</h5>
          </a>

          <a href="tea_details.php" class="animal">
            <img src="images/tea.jpeg" alt="">
            <h3>TEA</h3>
            <h5>Land Preparation, Planting, Pests and Diseases, Harvesting, Varieties.</h5>
          </a>

          <a href="irishpotataos_details.php" class="animal">
            <img src="images/Irish.jpeg" alt="">
            <h3>IRISH</h5>
            <h5>Land Preparation, Planting, Pests and Diseases, Harvesting, Varieties.</h5>
          </a>
        </div>
      </div>
    </section>
  </main>
  
  <?php include("footer.php"); ?>
</body>
</html>

