<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database configuration
    include_once "db.php";

    // Retrieve form data
    $full_name = $_POST["full_name"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $location = $_POST["location"];
    $farmer_type = $_POST["farmer_type"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];

    // Hash the password (You should use more secure methods for hashing)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=localhost;dbname=phpland", "root", "");

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user data into the database
        $sql = "INSERT INTO farmers (full_name, phone, password, location, farmer_type, dob, gender) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$full_name, $phone, $hashed_password, $location, $farmer_type, $dob, $gender]);

        if ($stmt->rowCount() > 0) {
            // Redirect to the success page with user details
            $query = http_build_query([
                'full_name' => $full_name,
                'phone' => $phone,
                'location' => $location,
                'farmer_type' => $farmer_type,
                'dob' => $dob,
                'gender' => $gender
            ]);
            header("Location: home.php?$query");
            exit(); // Make sure to stop further execution
        } else {
            echo "Error: Unable to create new record";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "No data received from the form.";
}
?>
