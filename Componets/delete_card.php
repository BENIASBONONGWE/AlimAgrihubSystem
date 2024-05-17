<?php
include 'db.php';

$id = $_GET['id'];

// Delete card from the database
$query = "DELETE FROM cards WHERE id = $id";

if (mysqli_query($conn, $query)) {
    echo "Card deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: adminposts.php");
exit();
?>
