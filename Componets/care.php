<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My YouTube-like Page</title>
    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 100px;
            display: flex;
        }

        .sidebar {
            flex: 1;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .videos {
            flex: 3;
            margin-left: 20px;
        }

        footer {
            background-color: #f9f9f9;
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }

        .video {
            margin-bottom: 20px;
            cursor: pointer;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .video-details {
            margin-top: 20px;
        }

        .video-details p {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
  <?php include("nav.php"); ?>
</head>
<body>

<header>
    
</header>

<div class="container">
    <aside class="sidebar sticky-top">
        <h2>WHEN AND HOW TO PREPARE LAND</h2>
        <p>LAND PREPARATION</p>
    </aside>

    <section class="videos">
    <h2 style="position: sticky; top: 0; background-color: white;">Latest Videos</h2>

    

    <?php
    // Database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "phpland";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // READ operation: Retrieve videos from the database
    $sql = "SELECT * FROM caring";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="video">';
            echo '<h3>' . $row["title"] . '</h3>';
            echo '<p>' . $row["description"] . '</p>';
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $row["video_id"] . '" frameborder="0" allowfullscreen></iframe>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }

    // CREATE operation: Add new videos to the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['video_id'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $video_id = $_POST['video_id'];

            $sql = "INSERT INTO videos (title, description, video_id) VALUES ('$title', '$description', '$video_id')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Close connection
    $conn->close();
    ?>
    
    </section>
</div>

<script src="https://www.youtube.com/iframe_api"></script>
<script>
    // JavaScript code
    document.querySelectorAll('.video').forEach(function(video) {
        video.addEventListener('click', function() {
            var videoId = this.getAttribute('data-video-id');
            var playerDiv = document.createElement('div');
            playerDiv.id = 'player';
            document.querySelector('.sidebar').innerHTML = '<h2>Video Details</h2><div class="video-details"><p>' + this.querySelector('h3').innerText + '</p><iframe width="560" height="315" src="https://www.youtube.com/embed/' + videoId + '" frameborder="0" allowfullscreen></iframe></div>';
        });
    });
</script>

</body>
</html>
<?php include ("footer.php");  ?>