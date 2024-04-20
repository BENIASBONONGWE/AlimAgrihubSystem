<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
            font-size: 16px;
        }
        body {
            background-color: #435165;
            margin: 0;
        }
        .login {
            width: 400px;
            background-color: #ffffff;
            box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
            margin: 100px auto;
            padding: 20px;
        }
        .login h1 {
            text-align: center;
            color: #5b6574;
            font-size: 24px;
            border-bottom: 1px solid #dee0e4;
            margin-bottom: 20px;
        }
        .login form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .login form label {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background-color: #3274d6;
            color: #ffffff;
        }
        .login form input[type="password"],
        .login form input[type="text"] {
            width: 310px;
            height: 50px;
            border: 1px solid #dee0e4;
            margin-bottom: 20px;
            padding: 0 15px;
        }
        .login form input[type="submit"] {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #3274d6;
            border: 0;
            cursor: pointer;
            font-weight: bold;
            color: #ffffff;
            transition: background-color 0.2s;
        }
        .login form input[type="submit"]:hover {
            background-color: green;
            transition: background-color 0.2s;
        }
        .forgot-password-link {
            text-align: center;
            margin-top: 10px;
        }
        .forgot-password-link a {
            color: #3274d6;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="login">
    <h1>Login</h1>
    <form action="login.php" method="post" autocomplete="off">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Sign up">
        <p>Don't have an account? <a href="registering.php">Register now</a>.</p>
    </form>
</div>
</body>
</html>

<?php
session_start();

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "phpland";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $num_rows = $stmt->num_rows;

    if ($num_rows == 1) {
        $stmt->bind_result($db_password);
        $stmt->fetch();
        if (password_verify($password, $db_password)) {
            // Password is correct, redirect to welcome page
            $_SESSION['username'] = $username;
            header("Location: Home.php");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect username or password.";
        }
    } else {
        // User not found
        echo "Incorrect username or password.";
    }

    $stmt->close();
}

$conn->close();
?>

