<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wealther - Your Weather Companion</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: green;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        main {
            padding: 20px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
            justify-items: center;
        }

        .feature {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            color: #333;
            text-decoration: none;
            transition: transform 0.3s;
        }

        .feature:hover {
            transform: translateY(-5px);
        }

        .cta {
            text-align: center;
            margin-top: 50px;
        }

        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }

    </style>
</head>
<?php include ("nav.php");  ?>
<br ><br>
<br ><br>
<br ><br>
<br ><br>

<body>
    <header>
        <h1>Wealther</h1>
        <p>Your Weather Companion</p>
    </header>
    <main>
        <section class="features">
            <a href="head.php" class="feature">
                <h2>check your Weather</h2>
                <p>Your 5 days wealther upudate</p>
            </a>
            <!-- Add more feature sections as needed -->
        </section>
    </main>
    
</body>
<br ><br>
<br ><br>
<br ><br>
<br ><br>
<br ><br>
<br ><br>
<?php include ("footer.php");  ?>
</html>
