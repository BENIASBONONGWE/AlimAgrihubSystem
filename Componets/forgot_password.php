<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
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
    .container {
      max-width: 400px;
      width: 100%;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .logo {
      margin-bottom: 20px;
    }
    h3 {
      color: #333;
      margin-bottom: 20px;
    }
    p {
      color: #666;
      margin-bottom: 20px;
      font-size: 14px;
      text-align: left;
    }
    input[type="email"] {
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
      width: 100%;
      font-size: 14px;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="images/Logo.png" alt="Logo" class="logo" width="100" height="100">
    <div class="forgot-password-content">
      <h3>Forgot your password?</h3>
      <p>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
      <form action="send_reset_link.php" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="submit" value="EMAIL PASSWORD RESET LINK">
      </form>
    </div>
  </div>
</body>
</html>
