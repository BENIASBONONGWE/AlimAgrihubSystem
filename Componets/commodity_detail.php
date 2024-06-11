<?php
include_once "db.php";
session_start();

// Get commodity ID from query string
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid commodity ID.");
}
$commodity_id = (int)$_GET['id'];

// Fetch commodity details from the database
$sql = "SELECT * FROM commodities WHERE id = $commodity_id";
$result = $conn->query($sql);

// Check if the commodity exists
if ($result->num_rows == 0) {
    die("Commodity not found.");
}
$commodity = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from the form
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $quantity = (int)$_POST['quantity'];

    // Validate inputs
    if (empty($name) || empty($contact) || $quantity <= 0) {
        $order_error = "All fields are required and quantity must be greater than zero.";
    } else {
        // Check if requested quantity is available
        if ($quantity > $commodity['quantity']) {
            $order_error = "Insufficient quantity available.";
        } else {
            // Start a transaction
            $conn->begin_transaction();

            // Insert order into the database
            $stmt = $conn->prepare("INSERT INTO orders (commodity_id, name, contact, quantity) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("issi", $commodity_id, $name, $contact, $quantity);

            if ($stmt->execute()) {
                // Update commodity quantity
                $new_quantity = $commodity['quantity'] - $quantity;
                $update_sql = "UPDATE commodities SET quantity = $new_quantity WHERE id = $commodity_id";
                if ($conn->query($update_sql)) {
                    $order_success = true;
                    // Commit the transaction
                    $conn->commit();
                } else {
                    $order_error = "Error updating commodity quantity: " . $conn->error;
                    // Rollback the transaction
                    $conn->rollback();
                }
            } else {
                $order_error = "Error placing order: " . $stmt->error;
                // Rollback the transaction
                $conn->rollback();
            }

            // Close the statement
            $stmt->close();
        }
    }
}
?>

<!-- Rest of your HTML code remains unchanged -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($commodity['name']); ?> Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include("nav.php"); ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($commodity['image']); ?>" alt="<?php echo htmlspecialchars($commodity['name']); ?>" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1><?php echo htmlspecialchars($commodity['name']); ?></h1>
                <p><?php echo htmlspecialchars($commodity['quantity']); ?> available</p>
                <p><?php echo htmlspecialchars($commodity['description']); ?></p>
                <?php
                if (isset($order_success)) {
                    echo '<div class="alert alert-success">Order placed successfully!</div>';
                } elseif (isset($order_error)) {
                    echo '<div class="alert alert-danger">Error placing order: ' . htmlspecialchars($order_error) . '</div>';
                }
                ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Information</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Order Now</button>
                </form>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
