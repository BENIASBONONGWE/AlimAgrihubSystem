<?php
// Include your database connection file here
// Example: include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the search term from the form
    $searchTerm = $_POST["search"];

    // Perform the search query using UNION (replace this with your actual database query)
    $sql = "
    SELECT id, title, description, 'caring' AS category FROM caring WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'
    UNION
    SELECT section_id AS id, section_name AS title, content AS description, 'cassava' AS category FROM cassava_db WHERE section_name LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT section_id AS id, section_name AS title, content AS description, 'maize' AS category FROM maize_db WHERE section_name LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT section_id AS id, section_name AS title, content AS description, 'tea' AS category FROM tea_db WHERE section_name LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT section_id AS id, section_name AS title, content AS description, 'tobacco' AS category FROM tobacco_db WHERE section_name LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT section_id AS id, section_name AS title, content AS description, 'rice' AS category FROM rice_db WHERE section_name LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT section_id AS id, section_name AS title, content AS description, 'groundnuts' AS category FROM groundnuts_db WHERE section_name LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT section_id AS id, section_name AS title, content AS description, 'soya' AS category FROM soya_db WHERE section_name LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT section_id AS id, section_name AS title, content AS description, 'irish' AS category FROM irish_db WHERE section_name LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT id, title, description, 'posts' AS category FROM posts WHERE title LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'
    UNION
    SELECT id, title, description, 'farmbudget' AS category FROM farmbudget WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'
    UNION
    SELECT id, title, description, 'payemproyee' AS category FROM payemproyee WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'
    UNION
    SELECT id, title, description, 'pesticides' AS category FROM pesticides WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'
    ";

  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mb-4">Search</h2>
            <!-- Search form -->
            <form method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter your search term" name="search" required>
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            
            <!-- Display search results -->
            <?php if (isset($results) && !empty($results)) : ?>
                <h3>Search Results</h3>
                <ul class="list-group">
                    <?php foreach ($results as $result) : ?>
                        <li class="list-group-item">
                            <h4><?php echo $result["title"]; ?> (<?php echo $result["category"]; ?>)</h4>
                            <p><?php echo $result["description"]; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
                <div class="alert alert-warning" role="alert">
                    No results found.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
