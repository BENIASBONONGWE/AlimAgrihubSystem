<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <div class="form-group">
            <label for="sectionSelect">Select Section:</label>
            <select class="form-control" id="sectionSelect" onchange="showSection(this.value)">
                <option value="">Select Section</option>
                <option value="addPostSection">Add New Blog Post</option>
                <option value="addCardSection">Add New Card</option>
                <option value="existingPostsSection">Existing Blog Posts</option>
                <option value="existingCardsSection">Existing Cards</option>
            </select>
        </div>

        <div id="addPostSection" class="section">
            <h2>Add New Blog Post</h2>
            <form action="insert_adminposts.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="files">Files (comma-separated)</label>
                    <input type="text" class="form-control" id="files" name="files">
                </div>
                <div class="form-group">
                    <label for="images">Images (comma-separated)</label>
                    <input type="text" class="form-control" id="images" name="images">
                </div>
                <div class="form-group">
                    <label for="videos">Videos (YouTube IDs, comma-separated)</label>
                    <input type="text" class="form-control" id="videos" name="videos">
                </div>
                <button type="submit" class="btn btn-primary">Add Blog Post</button>
            </form>
            <hr>
        </div>

        <div id="addCardSection" class="section">
            <h2>Add New Card</h2>
            <form action="insert_card.php" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL</label>
                    <input type="text" class="form-control" id="image_url" name="image_url" required>
                </div>
                <div class="form-group">
                    <label for="page">Page URL</label>
                    <input type="text" class="form-control" id="page" name="page" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Card</button>
            </form>
            <hr>
        </div>

        <div id="existingPostsSection" class="section">
            <h2>Existing Blog Posts</h2>
            <?php
            include 'db.php';

            $query = "SELECT * FROM posts";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<thead><tr><th>Title</th><th>Author</th><th>Date</th><th>Action</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td><a href='delete_blog.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No blog posts found.";
            }

            mysqli_close($conn);
            ?>
        </div>

        <div id="existingCardsSection" class="section">
            <h2>Existing Cards</h2>
            <?php
            include 'db.php';

            $query = "SELECT * FROM cards";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<thead><tr><th>Title</th><th>Description</th><th>Action</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td><a href='delete_card.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No cards found.";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            // Show the selected section
            if (sectionId) {
                document.getElementById(sectionId).classList.add('active');
            }
        }
    </script>
</body>
</html>
