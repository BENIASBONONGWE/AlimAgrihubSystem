<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Farming Information</title>
  <style>
    .container {
      max-width: 1200px;
      margin: auto;
      overflow: hidden;
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
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Adjust shadow on hover */
        color: yellow;
    }
    
    .animal img {
      width: 100%;
      border-radius: 5px;
      height: 200px;
      object-fit: cover;
    }
    
    .animal h3 {
      margin-top: 10px;
      text-decoration: none; /* Remove underlines */
      color: green;
    }
    
    .animal h5 {
      margin-top: 5px;
      text-decoration: none; /* Remove underlines */
      color: green;
    }
  </style>
</head>
<body>

<?php include("nav.php"); ?>
<br></br>
<center>
<h><b>The page is about providing information on various crops commonly used in agriculture</b></h>
  <p>It includes sections for different types of crops. Don't worry, check information regarding breeds,</p>
  <p>pest and disease control, and how you can take care of your animals.</p>
</center>

<center>
<p><i style="color: green;">Check it out.</i></p>

</center>

<center>
    <br></br>
  <b><h3 style="color:black;">ANIMAL SECTION</h3></b>
  <br></br>
</center>

<main>
  <section id="animal">
    <div class="container">
      <div class="grid-3">
        <!-- Animal Cards -->
        <a href="maize_deteals.php" class="animal">
          <img src="images\maize.jpeg" alt="" >
          <h3>MAIZE</h3>  
          <h5>Land Preparation,
Planting,
Pests and Diseases,
Harvesting,
Varieties.</h5>
        </a>

        <a href="tobacco_details.php" class="animal">
          <img src="images\Tobacco Field.jpeg" alt="">
          <h3>TOBACCO</h3> 
          <h5>Land Preparation,
Planting,
Pests and Diseases,
Harvesting,
Varieties.</h5>
        </a>

        <a href="rice_details.php" class="animal">
          <img src="images\rice.jpg" alt="">
          <h3>RICE</h3> 
          <h5>Land Preparation,
Planting,
Pests and Diseases,
Harvesting,
Varieties.</h5>
        </a>

        <a href="soya_details.php" class="animal">
          <img src="images\Soya.jpeg" alt="">
          <h3>SOYA BEANS</h3> 
          <h5>Land Preparation,
Planting,
Pests and Diseases,
Harvesting,
Varieties</h5>
        </a>

        <a href="groundnuts_details.php" class="animal">
          <img src="images\Peanut.jpeg" alt="">
          <h3>GROUNDNUTS</h3>
          <h5>Land Preparation
Planting,
Pests and Diseases,
Harvesting,
Varieties.</h5>
        </a>

        <a href="cassava_details.php" class="animal">
          <img src="images\Cassava.jpeg" alt="">
          <h3>CASSAVA</h3>
          <h5>Land Preparation
    Planting,
    Pests and Diseases,
    Harvesting,
     Varieties.</h5>
        </a>

        <a href="tea_details.php" class="animal">
          <img src="images\tea.jpeg" alt="">
          <h3>TEA</h3>
          <h5>Land Preparation
Planting,
Pests and Diseases,
Harvesting,
Varieties</h5>
        </a>

        <a href="irishpotataos_details.php" class="animal">
          <img src="images\Irish.jpeg" alt="">
          <h3>IRISH</h3>
          <h5>Land Preparation
Planting,
Pests and Diseases,
Harvesting,
Varieties</h5>
        </a>
      </div>
    </div>
  </section>
</main>
<br>
<br></br>
<?php include("footer.php")?> 

</body>
</html>
