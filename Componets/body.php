<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Farming Information</title>
  <style>
    .container {
      max-width: 100%;
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
    /* Style the button to look like a button */
    .button {
        display: inline-block;
        padding: 4px 20px;
        background-color: green; /* Button background color */
        color: wheat; /* Button text color */
        text-decoration: none; /* Remove underline from link */
        border: none; /* Remove border */
        border-radius: 3px; /* Rounded corners */
        cursor: pointer; /* Cursor style */
    }

   
    .button:hover {
        background-color: green; /* Darker shade of the button color */
    }
  </style>
</head>

<body>
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
      </div>
      
    </div>
    <a href="Plants.php" class="button">More</a>
  </section>
</main>
<br>
<br></br>
</body>
</html>
