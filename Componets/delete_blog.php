<?php
include 'db.php';

$id = $_GET['id'];

// Delete blog post from the database
$query = "DELETE FROM posts WHERE id = $id";

if (mysqli_query($conn, $query)) {
    echo "Blog post deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: adminposts.php");
exit();
?>
