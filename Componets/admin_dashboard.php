<?php
session_start();

$adminName = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : "Admin";

// Include your database connection file
include("db.php");

// Query to count total crops
$sql = "SELECT COUNT(*) AS total_crops FROM mycrops";
$result = mysqli_query($conn, $sql);

$totalCrops = 0; // Initialize total crops variable

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalCrops = $row['total_crops'];
} else {
    // Handle error if query fails
    $totalCrops = "N/A";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Agriculture Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <aside class="sidebar">
        <h2>Admin Dashboard</h2>
        <nav>
            <ul>
                <li><a href="livestockinsert.php">LiveStock</a></li>
                <li><a href="cropinsert.php">Crop Section</a></li>
                <li><a href="plan_campaign.php">Plan Campaign</a></li>
                <li><a href="sendsms.php">Send SMS</a></li>
                <li><a href="extensionworkeradd.php">Add Extension Worker</a></li>
                <li><a href="inputcommodities.php">Add Input Commodities</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="settings.php">Settings</a></li>
            </ul>
        </nav>
    </aside>
    <main class="main-content">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($adminName); ?></h1>
            <div class="profile">
                <a href="logout.php">Logout</a>
            </div>
        </header>

        <main class="main-content">
       
        <section class="content-section">
            <h2>Early Warnings and Pest Management</h2>
            <p>SMS alerts can provide early warnings about weather conditions, pest outbreaks, or disease threats. For example, the FarmerLink program in the Philippines sends personalized SMS messages to coconut farmers, alerting them about potential pest infestations. Farmers can take timely action based on these alerts, such as reporting sightings of pests or implementing preventive measures.</p>
        </section>
        <section class="content-section">
            <h2>Customized Agronomic Advice</h2>
            <p>SMS texts can reinforce training provided by field agents. Farmers receive personalized advice on crop management, financial planning, and other relevant topics. For instance, cotton farmers receive SMS messages about farming practices, market prices, and purchasing days.</p>
        </section>
        <section class="content-section">
            <h2>Accessibility and Reach</h2>
            <p>SMS is accessible even in remote areas with limited data connectivity. It allows farmers to receive critical information without relying on internet access. By reaching farmers directly on their mobile phones, SMS ensures wider coverage and engagement.</p>
        </section>
        <section class="content-section">
            <h2>Data Security and Privacy</h2>
            <p>Ensuring the security of farmer data is essential. SMS platforms should protect sensitive information, such as personal details and farm data. Compliance with data protection laws (e.g., GDPR) is crucial to maintain trust and safeguard privacy.</p>
        </section>
        <section class="content-section">
            <h2>Health and Safety Information</h2>
            <p>SMS can also convey health-related information. During the COVID-19 pandemic, SMS messages informed farmers about protective measures. Safety reminders, such as using protective gear during pesticide application, can be shared via SMS.</p>
        </section>
    </main>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100vh;
    background-color: #f4f4f4;
}

.sidebar {
    width: 250px;
    background-color: green;
    color: white;
    padding: 20px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
}

.sidebar h2 {
    text-align: center;
    margin: 0 0 20px;
}

.sidebar nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    flex-grow: 1;
}

.sidebar nav ul li {
    margin: 20px 0;
}

.sidebar nav ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
}

.sidebar nav ul li a:hover {
    background-color: #34495e;
}

.main-content {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
}

header .profile {
    display: flex;
    align-items: center;
}

header .profile a {
    text-decoration: none;
    color: #2c3e50;
}

.content-section {
    margin-top: 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.content-section h2 {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 20px;
    font-size: 1.5em;
    color: #2c3e50;
}

.content-section p {
    line-height: 1.6;
    color: #2c3e50;
}

@media (max-width: 768px) {
    body {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        flex-direction: row;
        justify-content: space-around;
        padding: 10px;
    }

    .sidebar nav ul {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .sidebar nav ul li {
        margin: 0 10px;
    }

    .main-content {
        padding: 10px;
    }

    .content-section {
        margin: 10px 0;
    }
}

    </style>
</body>
</html>
