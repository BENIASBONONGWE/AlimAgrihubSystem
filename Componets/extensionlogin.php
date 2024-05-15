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
    }
    h2 {
      color: #333;
    }
    form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
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
    }
    input[type="submit"]:hover {
      background-color: green;
    }
    .register-link {
      text-decoration: none;
      color: green;
      display: inline-block;
      margin-top: 10px;
    }
  .logo {
      height: 150px;
      width: 150px;
      padding-left: 750px;
    }

    .navbar-brand {
      margin-left: 5rem;
    }

    .secondary-logo {
      margin-left: 5rem;
    }
   
  </style>
</head>
<div class="secondary-logo">
            <img src="images/Logo1.png" alt="Another Logo" class="logo">
        </div>
  
  <form action="extension_login.php" method="post">
  
    <label for="fullName">Full Name:</label><br>
    <input type="text" id="fullName" name="fullName" required><br>
    <label for="email">Email Address:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    
    <input type="submit" value="Log In">
    
  
    
    
  </form>
  
</body>
<br>
<br>
<?php include ("footer.php");  ?>
</html>
