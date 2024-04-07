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
      text-decoration: none; 
      color: green;
    }
    
    .animal h5 {
      margin-top: 5px;
      text-decoration: none; 
      color: green;
    }
  </style>
</head>
<body>

<?php include("navbar.php"); ?>
<br></br>
<center>
  <p1><b>The page is about providing information on various animals commonly used in agriculture</b></p1>.
  <p>It includes sections for different types of animals. Don't worry, check information regarding breeds,</p>
  <p>pest and disease control, and how you can take care of your animals.</p>
</center>

<center>
  <p><i>Check it out.</i></p>
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
          <img src="images\fish.jpg" alt="">
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
          <img src="images\ducks.jpg" alt="">
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
