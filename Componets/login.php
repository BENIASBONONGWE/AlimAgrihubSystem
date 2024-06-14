<?php
session_start();
include_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Assuming you use prepared statements for security
    $stmt = $conn->prepare("SELECT full_name FROM extension_workers WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($full_name);
        $stmt->fetch();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['full_name'] = $full_name; // Set full name in session
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agriculture Extension Worker Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    form {
      max-width: 400px;
      width: 100%;
      padding: 20px;
      margin: 20px; /* Added margin around the form */
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    h3 {
      color: #333;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      text-align: left;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 25px; /* Increased spacing between form elements */
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 14px;
    }
    input[type="submit"] {
      background-color: green;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
      font-size: 14px;
    }
    input[type="submit"]:hover {
      background-color: green;
    }
    .register-link {
      text-decoration: none;
      color: green;
      display: block;
      text-align: center;
      margin-top: 20px;
    }
    .logo {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <form action="extensionlogin.php" method="post">
    <img src="images/Logo.png" alt="Logo" class="logo" width="100" height="100">
    <h3>Extension Worker Login</h3>
    <label for="fullName">Full Name:</label><br>
    <input type="text" id="fullName" name="fullName" placeholder="Full name"><br>
    <label for="email">Email Address:</label><br>
    <input type="email" id="email" name="email" placeholder="Email"required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" placeholder="password" required><br>
    <a href="extension_dashboard.php"><input type="submit" value="Log In"></a>
    <a href="forgot_password.php" class="register-link">Forgot password?</a>
  </form>
</body>
</html>
