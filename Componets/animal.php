<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animals Section</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="aboutus.css" rel="stylesheet">
  <link href="body.css" rel="stylesheet">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384"></script>


  <!-- Favicons -->
  <link href="images/Logo.png" rel="icon">
  <link href="images/Logo.png" rel="apple-touch-icon">
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
      text-decoration: none; 
      color: green;
    }
    
    .animal h5 {
      margin-top: 5px;
      text-decoration: none; 
      color: green;
    }

    .banner {
      background-image: url('images/3cattles.jpg');
      background-size: cover;
      background-position: center;
      height: 50vh; /* Set the height to 50% of the viewport height */
    }

    .upper-section {
      padding: 20px;
    }
  </style>
</head>
<body>

<?php include("nav.php"); ?>
<div class="banner"></div>

<div class="upper-section"></div>
<center>
  <b><h3 style="color:green;">FARMED ANIMALS</h3></b>
  <br></br>
</center>

<main>
  <section id="animal">
    <div class="container">
      <div class="grid-3">
        <!-- Animal Cards -->
        <a href="cattle_details.php" class="animal">
          <img src="images\cattle.jpg" alt="" >
          <h3>CATTLE FARMING</h3>  
          <h5>breeds, pest and disease control etc</h5>
        </a>

        <a href="chicken_details.php" class="animal">
          <img src="images\chicken.jpg" alt="">
          <h3>CHICKEN FARMING</h3> 
          <h5>breeds, pest and disease control, etc.</h5>
        </a>

        <a href="fish_details.php" class="animal">
          <img src="images\fish.jpeg" alt="">
          <h3>FISH FARMING</h3> 
          <h5>types, pest & disease control, caring, etc.</h5>
        </a>

        <a href="goat_details.php" class="animal">
          <img src="images\goat.jpg" alt="">
          <h3>GOAT FARMING</h3> 
          <h5>types, pest & disease control, caring, etc.</h5>
        </a>

        <a href="pig_details.php" class="animal">
          <img src="images\pig.jpg" alt="">
          <h3>PIG FARMING</h3>
          <h5>types, pest & disease control, caring, etc.</h5>
        </a>

        <a href="sheep_details.php" class="animal">
          <img src="images\sheep.jpg" alt="">
          <h3>SHEEP FARMING</h3>
          <h5>types, pest & disease control, caring, etc.</h5>
        </a>

        <a href="guineafowl_details.php" class="animal">
          <img src="images\guinea_fowl.jpg" alt="">
          <h3>GUINEA FOWL</h3>
          <h5>types, pest & disease control, caring, etc.</h5>
        </a>

        <a href="ducks_details.php" class="animal">
          <img src="images\ducks.jpeg" alt="">
          <h3>DUCKS</h3>
          <h5>types, pest & disease control, caring, etc.</h5>
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
