<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navigation Bar</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Top Bar Styles */
        .top-bar {
            background-color: black;
            color: white;
            text-align: center;
            padding: 5px 0;
            z-index: 1000; /* Ensure top bar is above other elements */
            position: fixed;
            top: 0;
            width: 100%;
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1001; /* Ensure dropdown content is above other elements */
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

<div class="top-bar" id="topBar">
    <p>This is the top bar</p>
    <div class="dropdown">
        <button class="dropbtn">Dropdown</button>
        <div class="dropdown-content">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
        </div>
    </div>
</div>

<div style="height: 2000px; background-color: lightgray;"> <!-- Placeholder content for scrolling -->
    Scroll down to see the effect
</div>

<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        var topBar = document.getElementById("topBar");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            topBar.style.display = "block";
        } else {
            topBar.style.display = "none";
        }
    }
</script>

</body>
</html>
