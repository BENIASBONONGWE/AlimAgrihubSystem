<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1.0"> 
  
    <title>Responsive Navbar with Icons</title> 
  
    <link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
  
    <style> 
        body { 
            margin: 0; 
            font-family: 'Arial', sans-serif; 
        } 
  
        .navbar { 
            background-color: #4b8b01; 
            overflow: hidden; 
            padding: 20px 30px;
			
        } 
  
        .navbar a { 
            float: left; 
            display: block; 
            color: #fff; 
            text-align: center; 
            padding: 20px 16px; 
            text-decoration: none; 
            font-size: 17px; 
        } 
  
        .navbar a:hover { 
            background-color: #2a93d5; 
        } 
  
        .navbar a .icon { 
            margin-right: 8px; 
        } 
  
        .navbar a.icon { 
            float: right; 
            display: none; 
        } 
  
        .navbar.responsive a.icon { 
            position: absolute; 
            right: 0; 
            top: 0; 
        } 
  
        .navbar.responsive a { 
            float: none; 
            display: block; 
            text-align: left; 
        } 
        @media screen and (max-width: 600px) { 
            .navbar a:not(:first-child) {display: none;} 
            .navbar a.icon { 
                float: right; 
                display: block; 
            } 
        } 
    </style> 
</head> 
  
<body> 
    <div class="navbar"> 
        <a href="#home"> 
            <i class="fas fa-home icon"></i>Home 
        </a> 
        <a href="#courses"> 
            <i class="fas fa-graduation-cap icon"></i>Courses 
        </a> 
        <a href="#jobs"> 
            <i class="fas fa-briefcase icon"></i>Jobs 
        </a> 
        <a href="#news"> 
            <i class="fas fa-newspaper icon"></i>News 
        </a> 
        <a href="#contact"> 
            <i class="fas fa-envelope icon"></i>Contact 
        </a> 
        <a href="#about"> 
            <i class="fas fa-info-circle icon"></i>About 
        </a> 
        <a href="javascript:void(0);" class="icon" 
            onclick="myFunc()"> 
            <i class="fas fa-bars"></i> 
        </a> 
    </div> 

  
    <script> 
    </script> 
</body> 
  
</html>
