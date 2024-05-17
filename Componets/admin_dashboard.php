<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard_styles.css">
   <style>
/* Additional CSS for link styling */
#dashboard ul {
    list-style-type: none;
    padding: 0;
}

#dashboard ul li {
    display: inline-block;
    margin-right: 20px;
}

#dashboard ul li a {
    color: #007bff;
    text-decoration: none;
    padding: 8px 16px;
    border: 1px solid #007bff;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

#dashboard ul li a:hover {
    background-color: #007bff;
    color: #fff;
}
   </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        
    </header>
    <main>
        <section id="dashboard">
            <h2>Dashboard</h2>
            
            <ul>
                <li><a href="AnimalsInsert.php">Animals Insert</a></li>
                <li><a href="plan_campaign.php">Plan Campaign</a></li>
                <li><a href="AnimalsInsert.php">Animals Insert</a></li>
                <li><a href="adminposts.php">Education</a></li>
            </ul>

        </section>
    </main>
    <footer>
        <p>&copy; 2024 Admin Dashboard</p>
    </footer>
</body>
</html>

