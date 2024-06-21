

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Details</title>
  <link rel="stylesheet" href="css/cattle_details.css" />
  <style>
    /* Custom styles for better readability */
    .container1 {
      width: 98%;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
    }
    .sidebar1 {
      flex-basis: 100%;
      margin-bottom: 20px;
    }
    .main-content1 {
      flex-basis: 100%;
      margin-top: 70px;
    }
    .sidebar1 h2, .main-content1 h2 {
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
      border-radius: 5px;
    }
    .sidebar1 a {
      display: block;
      background-color: #f0f0f0;
      padding: 8px 12px;
      text-decoration: none;
      color: #333;
      border-radius: 5px;
    }
    .sidebar1 a:hover {
      background-color: #e0e0e0;
    }
    .main-content1 p, .main-content1 ul {
      padding: 10px;
      line-height: 1.6;
      color: #333;
      font-size: 16px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }
    .main-content1 ul {
      list-style-type: disc;
      margin-left: 20px;
    }
    .main-content1 h2 {
      color: green; /* Make the topic titles green */
    }
    .sub-topic {
      text-align: center;
      font-weight: bold;
      margin: 20px 0;
    }
    @media (min-width: 768px) {
      .container1 {
        display: flex;
      }
      .sidebar1 {
        flex-basis: 30%;
        margin-right: 20px;
      }
      .main-content1 {
        flex-basis: calc(70% - 20px);
      }
    }
  </style>
</head>
<body>
  <?php include("nav.php"); ?>
  <div class="container1">
    <div class="sidebar1">
      <br><br>
      <h2>TOPICS</h2>
      <br><br>
      <ul>
        <?php
        include_once("db.php");
        $sql = "SELECT * FROM rice_db";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<li><a href='#' onmouseover=\"showContent('" . $row['section_id'] . "'); return false;\">" . $row['section_name'] . "</a></li>";
        }
        ?>
      </ul>
    </div>
    <div class="main-content1">
      <?php
      mysqli_data_seek($result, 0);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div id='" . $row['section_id'] . "' style='display: none;'>";
        echo "<h2>" . $row['section_name'] . "</h2>";
        $content = nl2br(htmlentities($row['content']));
        
        // Formatting bullets, dashes, and numbers
        $content = preg_replace('/^\* (.+)$/m', '<li>$1</li>', $content); // bullets
        $content = preg_replace('/^- (.+)$/m', '<ul><li>$1</li></ul>', $content); // dashes
        $content = preg_replace('/^(\d+)\. (.+)$/m', '<ol><li>$2</li></ol>', $content); // numbers
        
        // Formatting subtitles
        $content = preg_replace('/^([A-Z\s]+)$/m', '<div class="sub-topic">$1</div>', $content);

        // Ensure nested lists are properly nested
        $content = preg_replace('/<\/ul>\n<ul>/', '', $content); // Remove redundant opening/closing tags for lists
        $content = preg_replace('/<\/ol>\n<ol>/', '', $content); // Remove redundant opening/closing tags for ordered lists

        echo "<p>" . $content . "</p>";
        
        if (!empty($row['video_path'])) {
          echo "<video width='320' height='240' controls>";
          echo "<source src='" . $row['video_path'] . "' type='video/mp4'>";
          echo "Your browser does not support the video tag.";
          echo "</video>";
        }
        echo "</div>";
      }
      mysqli_close($conn);
      ?>
    </div>
  </div>
  <script>
    function showContent(id) {
      var contentDivs = document.querySelectorAll('.main-content1 > div');
      contentDivs.forEach(function(div) {
        div.style.display = 'none';
      });
      document.getElementById(id).style.display = 'block';
    }
  </script>
  <?php include("footer.php"); ?>
</body>
</html>
