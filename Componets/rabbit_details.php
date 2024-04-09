<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Details</title>
    <link rel="stylesheet" href="css/cattle_details.css" />
   

    <!-- Add your custom styles here -->
    <style>
        /* Add custom styles for better readability */
        
        .container1 {
            width: 98%; /* Adjust the width as needed */
            margin:  0 auto; /* Center the container horizontally */
            display: flex;
        }
        .sidebar1 {
            flex-basis: 20%;
            margin-right: 100px; /* Add margin to the sidebar */
        }
        .main-content1 {
            flex-basis: 50%;
        }
        .sidebar h2, .main-content h2 {
            color: black;
        }
        .sidebar1 p, .main-content1 p {
            color: black;
        }
        .sidebar1 ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar1 li {
            margin-bottom: 5px;
            background-color: #f0f0f0;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
        }
        .sidebar1 li a {
            text-decoration: none;
            color: #333;
        }
        .sidebar1 li:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>

<body>

<?php include ("navbar.php");  ?>
    <div class="container1">
        <div class="sidebar1">
            <br></br>
            <h2>TOPIC</h2>
            <br></br>
            <ul>
                <?php
                    // Include database connection file
                    include_once("db.php");

                    // Fetch data from the database
                    $sql = "SELECT * FROM rabbit_db";
                    $result = mysqli_query($conn, $sql);

                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<li><a href='#' onclick=\"showContent('" . $row['section_id'] . "'); return false;\">" . $row['section_name'] . "</a></li>";
                    }
                ?>
            </ul>
        </div>
        
        <div class="main-content1" style="margin-top: 70px;">
    <?php
        // Reset the result pointer to the beginning
        mysqli_data_seek($result, 0);

        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div id='" . $row['section_id'] . "' style='display: none;'>";
            echo "<h2>" . $row['section_name'] . "</h2>";
            echo "<p>" . nl2br($row['content']) . "</p>";
            
            // Check if there is a video path available
            if (!empty($row['video_path'])) {
                echo "<video width='320' height='240' controls>";
                echo "<source src='" . $row['video_path'] . "' type='video/mp4'>";
                echo "Your browser does not support the video tag.";
                echo "</video>";
            }
            
            echo "</div>";
        }

        // Close database connection
        mysqli_close($conn);
    ?>
</div>

    </div>

    <script>
        function showContent(id) {
            // Hide all content divs
            var contentDivs = document.querySelectorAll('.main-content1 > div');
            contentDivs.forEach(function(div) {
                div.style.display = 'none';
            });

            // Show the selected content div
            document.getElementById(id).style.display = 'block';
        }
    </script>
     
</body>


</html>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>


<?php include ("footer.php");  ?>
