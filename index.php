<!DOCTYPE html>
<html>
<head>
<title>Animal Feed Calculator</title>
<style>
  body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f9;
  }
  .container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  form {
    display: flex;
    flex-direction: column;
  }
  label, input, select {
    margin: 10px 0;
  }
  input[type="submit"] {
    background-color: green;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
  }
  input[type="submit"]:hover {
    background-color: darkgreen;
  }
</style>
</head>
<body>
<div class="container">
  <h1>Animal Feed Calculator</h1>
  <form action="calculate.php" method="post">
    <label for="animal_count">Number of Animals:</label>
    <input type="number" id="animal_count" name="animal_count" min="0" required>
    <label for="animal_type">Animal Type:</label>
    <select name="animal_type" id="animal_type">
      <option value="cattle">Cattle (Malawi Zebu)</option>
      <option value="goat">Goat (Boer)</option>
      <option value="pig">Pig (Large White)</option>
      <option value="chicken">Chicken (Malawi Black)</option>
    </select>
    <input type="submit" value="Calculate Feed">
  </form>
</div>
</body>
</html>
