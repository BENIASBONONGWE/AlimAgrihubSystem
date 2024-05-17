<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Blog Posts and Cards</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1, h2 {
            color: #343a40;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        hr {
            border-top: 1px solid #dee2e6;
        }
        table {
            margin-top: 20px;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="#" onclick="showSection('addPostSection')">Add New Blog Post</a>
        <a href="#" onclick="showSection('addCardSection')">Add New Card</a>
        <a href="#" onclick="showSection('existingPostsSection')">Existing Blog Posts</a>
        <a href="#" onclick="showSection('existingCardsSection')">Existing Cards</a>
    </div>

    <div class="content">
        <h1 class="mb-4">Admin Panel</h1>

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

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        }
    </script>
</body>
</html>
