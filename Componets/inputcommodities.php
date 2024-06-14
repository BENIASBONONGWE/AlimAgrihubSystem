<?php
include_once "db.php";
session_start();

// Fetch all commodities
$commodities = [];
$sql = "SELECT id, name, quantity FROM commodities";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commodities[] = $row;
    }
}

// Handle adding new commodity
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_commodity'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = (int)$_POST['quantity'];
    $image = $_POST['image'];

    if (!empty($name) && !empty($description) && $quantity > 0 && !empty($image)) {
        $stmt = $conn->prepare("INSERT INTO commodities (name, description, quantity, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $description, $quantity, $image);

        if ($stmt->execute()) {
            $add_success = true;
        } else {
            $add_error = "Error adding commodity: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $add_error = "All fields are required and quantity must be greater than zero.";
    }
}

// Handle placing an order
$order_error = $order_success = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_order'])) {
    $commodity_id = (int)$_POST['commodity_id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $quantity = (int)$_POST['quantity'];

    // Fetch the selected commodity details
    $sql = "SELECT * FROM commodities WHERE id = $commodity_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $commodity = $result->fetch_assoc();

        // Validate inputs
        if (empty($name) || empty($contact) || $quantity <= 0) {
            $order_error = "All fields are required and quantity must be greater than zero.";
        } elseif ($quantity > $commodity['quantity']) {
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
                    $conn->commit();
                } else {
                    $order_error = "Error updating commodity quantity: " . $conn->error;
                    $conn->rollback();
                }
            } else {
                $order_error = "Error placing order: " . $stmt->error;
                $conn->rollback();
            }

            $stmt->close();
        }
    } else {
        $order_error = "Selected commodity not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commodity Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .btn.btn-primary {
        background-color: green;
        border-color: green; /* Optional: Change border color if needed */
    }
</style>
</head>
<body>
   
    <div class="container mt-5">
        <h1>Commodity Dashboard</h1>

        <!-- Section to Add New Commodity -->
        <div class="mb-5">
            <h2>Add New Commodity</h2>
            <?php if (isset($add_success)): ?>
                <div class="alert alert-success">Commodity added successfully!</div>
            <?php elseif (isset($add_error)): ?>
                <div class="alert alert-danger">Error: <?php echo htmlspecialchars($add_error); ?></div>
            <?php endif; ?>
            <form method="post">
                <input type="hidden" name="add_commodity" value="1">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Commodity</button>
            </form>
        </div>

        <!-- Section to Process Orders -->
      
    </div>
  
</body>
</html>
