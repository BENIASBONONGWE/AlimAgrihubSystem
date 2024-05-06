<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default username for XAMPP MySQL setup
$password = ""; // Leave empty if no password is set
$database = "phpland"; // Your database name
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $campaign_type = $_POST["campaign_type"];
    $description = $_POST["description"];
    $target_audience = $_POST["target_audience"];
    $scheduled_date = $_POST["scheduled_date"];

    // Insert data into the database
    $sql = "INSERT INTO campaigns (campaign_type, description, target_audience, scheduled_date) VALUES ('$campaign_type', '$description', '$target_audience', '$scheduled_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<!DOCTYPE html>
              <html lang='en'>
              <head>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <title>Campaign Planned Successfully</title>
                  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'> <!-- Include Font Awesome -->
                  <style>
                  body {
                      display: center;
                      justify-content: center;
                      align-items: center;
                      height: 100vh;
                      margin: 300px;
                      font-family: Arial, sans-serif;
                  }
                  .message {
                      text-align: center;
                      display: center; /* Use flexbox */
                      align-items: center; /* Center items vertically */
                  }
                  .message .icon {
                      color: #4CAF50; /* Green color */
                      font-size: 40px; /* Icon size */
                      margin-right: 2px;
                      
                  }
                  .btn-container {
                      margin-top: 20px;
                      text-align: center;
                  }
                  .btn-container a {
                      text-decoration: none;
                  }
                  .btn-container button {
                      background-color: #4CAF50;
                      color: white;
                      padding: 10px 20px;
                      border: none;
                      border-radius: 4px;
                      cursor: pointer;
                  }
                  .btn-container button:hover {
                      background-color: #45a049;
                  }
                  </style>
              </head>
              <body>
                  <div class='message'>
                      <span class='icon'><i class='fas fa-check-circle'></i></span> <!-- Icon -->
                      <h2>Campaign planned successfully!</h2>
                  </div>
                  <div class='btn-container'>
                      <a href='halo.php'><button>View Planned Campaigns</button></a>
                  </div>
              </body>
              </html>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
