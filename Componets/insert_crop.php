<?php
// Include database connection file
include_once("db.php");

// Check if form is submitted for insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $crop_section = $_POST['crop_section'];
    $section_name = $_POST['section_name'];
    $content = $_POST['content'];
    $video_path = $_POST['video_path'];

    // Determine the table based on the selected crop section
    switch ($crop_section) {
        case 'Maize':
            $table = 'maize_db';
            break;
        case 'Tobacco':
            $table = 'tobacco_db';
            break;
        case 'Soya_beas':
            $table = 'soya_db';
            break;
        case 'Tea':
            $table = 'tea_db';
            break;
        case 'Irish':
            $table = 'irish_db';
            break;
        case 'Cassava':
            $table = 'cassava_db';
            break;
        case 'Rice':
            $table = 'rice_db';
            break;
        case 'Groundnuts':
            $table = 'groundnuts_db';
            break;
        default:
            die("Invalid crop section selected.");
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

    // Determine the table based on the selected crop section (assuming you have this information in the URL)
    if (isset($_GET['crop_section'])) {
        switch ($_GET['crop_section']) {
            case 'Maize':
                $table = 'maize_db';
                break;
            case 'Tobacco':
                $table = 'tobacco_db';
                break;
            case 'Soya_beas':
                $table = 'soya_db';
                break;
            case 'Tea':
                $table = 'tea_db';
                break;
            case 'Irish':
                $table = 'irish_db';
                break;
            case 'Cassava':
                $table = 'cassava_db';
                break;
            case 'Rice':
                $table = 'rice_db';
                break;
            case 'Groundnuts':
                $table = 'groundnuts_db';
                break;
            default:
                die("Invalid crop section selected.");
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
