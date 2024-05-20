<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Crop Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom styles here -->
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom styles for better readability */
        .container {
            padding: 20px;
            margin-top: 50px; /* Add space at the top for better alignment */
        }

        h1 {
            text-align: center; /* Center align the heading */
        }

        .form-container {
            background-color: #f9f9f9; /* Light gray background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Drop shadow effect */
            padding: 30px; /* Add padding inside the container */
        }

        .form-group {
            margin-bottom: 30px; /* Increase the space between form groups */
        }

        label {
            font-weight: bold;
        }

        textarea {
            resize: vertical; /* Allow vertical resizing of textareas */
        }

        .btn-primary {
            width: 100%; /* Make the button full-width */
            background-color: green;
            border: green;
        }
    </style>
</head>
<body>

<h1>Crop Details</h1>
<div class="container-fluid">
    <div class="container form-container">
        <form action="insert_crop.php" method="post">
            <div class="form-group">
                <label for="section_id">Section ID:</label>
                <input type="text" class="form-control" id="section_id" name="section_id" required>
            </div>
            <div class="form-group">
                <label for="crop_section">Crop Section:</label>
                <select class="form-control" id="crop_section" name="crop_section" required>
                    <option value="Maize">Maize</option>
                    <option value="Tobacco">Tobacco</option>
                    <option value="Soya_beas">Soya beas</option>
                    <option value="Tea">Tea</option>
                    <option value="Irish">Irish</option>
                    <option value="Cassava">Cassava</option>
                    <option value="Rice">Rice</option>
                    <option value="groundnuts">Groundnuts</option>
                </select>
            </div>
            <div class="form-group">
                <label for="section_name">Section Name:</label>
                <input type="text" class="form-control" id="section_name" name="section_name" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="video_path">Video Path:</label>
                <input type="text" class="form-control" id="video_path" name="video_path">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
