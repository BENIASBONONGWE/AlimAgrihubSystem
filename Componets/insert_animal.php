<?php
// Include database connection file
include_once("db.php");

// Check if form is submitted for insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $animal_section = $_POST['animal_section'];
    $section_name = $_POST['section_name'];
    $content = $_POST['content'];
    $video_path = $_POST['video_path'];

    // Determine the table based on the selected animal section
    switch ($animal_section) {
        case 'Cattle':
            $table = 'cattle_db';
            break;
        case 'Sheep':
            $table = 'sheep_db';
            break;
        case 'Goat':
            $table = 'goat_db';
            break;
        case 'Guineafowl':
            $table = 'guineafowl_db';
            break;
        case 'Pig':
            $table = 'pig_db';
            break;
        case 'Chicken':
            $table = 'chicken_db';
            break;
        case 'Duck':
            $table = 'ducks_db';
            break;
        case 'Fish':
            $table = 'fish_db';
            break;
        default:
            die("Invalid animal section selected.");
    }

    // Insert data into the appropriate table
    $sql = "INSERT INTO $table (section_name, content, video_path) VALUES ('$section_name', '$content', '$video_path')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully in $table.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Check if form is submitted for deletion
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
    // Sanitize the content ID
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);

    // Determine the table based on the selected animal section (assuming you have this information in the URL)
    if (isset($_GET['animal_section'])) {
        switch ($_GET['animal_section']) {
            case 'Cattle':
                $table = 'cattle_db';
                break;
            case 'Sheep':
                $table = 'sheep_db';
                break;
            case 'Goat':
                $table = 'goat_db';
                break;
            case 'Guineafowl':
                $table = 'guineafowl_db';
                break;
            case 'Pig':
                $table = 'pig_db';
                break;
            case 'Chicken':
                $table = 'chicken_db';
                break;
            case 'Duck':
                $table = 'ducks_db';
                break;
            case 'Fish':
                $table = 'fish_db';
                break;
            default:
                die("Invalid animal section selected.");
        }

        // Delete the content from the database
        $delete_sql = "DELETE FROM $table WHERE id = '$delete_id'";
        
        if (mysqli_query($conn, $delete_sql)) {
            echo "Record deleted successfully from $table.";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>
