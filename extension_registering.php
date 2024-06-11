<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agriculture Extension Worker Registration</title>
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
    input[type="tel"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 14px;
    }
    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    .login-link {
      text-decoration: none;
      color: #007bff;
      display: inline-block;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <form action="register_extension.php" method="post" enctype="multipart/form-data">
  <h2>Extension Worker Registration</h2>
    <label for="fullName">Full Name:</label><br>
    <input type="text" id="fullName" name="fullName" required><br>
    <label for="phone">Phone Number:</label><br>
    <input type="tel" id="phone" name="phone" required><br>
    <label for="email">Email Address:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" required><br>
    <label for="employeeNumber">Employee Number:</label><br>
    <input type="text" id="employeeNumber" name="employeeNumber" required><br>
    
    <input type="submit" value="Register">
    <h3>Already Have an Account? <a href="extensionlogin.php" class="login-link">Log In</a></h3>
  </form>
</body>
</html>


