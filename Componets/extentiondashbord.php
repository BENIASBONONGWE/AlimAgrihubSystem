<?php
include_once "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profile_image'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['message'] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_image"]["size"] > 500000) {
        $_SESSION['message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['message'] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            $sql = "UPDATE extension_workers SET profile_image='$target_file' WHERE email='" . $_SESSION['email'] . "'";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['profile_image'] = $target_file;
                $_SESSION['message'] = "The file " . basename($_FILES["profile_image"]["name"]) . " has been uploaded.";
            } else {
                $_SESSION['message'] = "Error updating record: " . $conn->error;
            }
        } else {
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: green;
            color: white;
            padding: 20px;
            height: 100vh;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            background-color: #34495e;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        
        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ecf0f1;
        }

        .dashboard {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .welcome {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            color: white;
        }

        .message.error {
            background-color: #e74c3c;
        }

        .message.success {
            background-color: #2ecc71;
        }

        /* Media Queries */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                padding: 10px;
            }
        }

        @media screen and (max-width: 576px) {
            .sidebar {
                width: 150px;
            }

            .sidebar h2 {
                font-size: 1.2rem;
            }

            .main-content {
                padding: 5px;
            }
        }
    </style>
    <script>
        function loadContent(page) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', page, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.querySelector('.dashboard').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.sidebar ul li a');
            links.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const page = this.getAttribute('href');
                    loadContent(page);
                });
            });
            // Load the default page on initial load
            loadContent('livestockinsert.php');
        });
    </script>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="livestockinsert.php">LiveStock</a></li>
           
            <li><a href="cropinsert.php">Crop Section</a></li>
            
            <li><a href="plan_campaign.php">Plan Campaign</a></li>
            <li><a href="sendsms.php">Send SMS</a></li>
            <li><a href="extensionworkeradd.php">Add Extension Worker</a></li>
            <li><a href="inputcommodities.php">Add Input Commodities</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="dashboard">
            <div class="welcome">
                Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!
            </div>
            <?php if (isset($_SESSION['message'])): ?>
                <div class="message <?php echo strpos($_SESSION['message'], 'Sorry') !== false ? 'error' : 'success'; ?>">
                    <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
<li style="list-style: none; display: inline-block;">
    <a href="all_users.php" style="display: inline-block; padding: 10px 20px; text-decoration: none; background-color: #4CAF50; color: white; border-radius: 5px; font-family: Arial, sans-serif; font-size: 16px; text-align: center;">
     SEND BULK MESSEGES
    </a>
</li>

</html>
