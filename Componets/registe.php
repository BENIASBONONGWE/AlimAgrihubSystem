<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px auto;
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Farmer Registration</h2>
    <form action="submit_registration.php" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
        
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone">
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="address">Where do you stay:</label>
        <input type="text" id="address" name="address">
        
        <label for="farmer_type">Type of Farmer:</label>
        <select id="farmer_type" name="farmer_type">
            <option value="all">Both Farming</option>
            <option value="crop">Crop Farming</option>
            <option value="animal">Animal Farming</option>
        </select>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob">
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
