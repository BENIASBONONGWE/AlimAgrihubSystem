<?php // login.php

/*
* genelify.com
*/

// Initialize session
session_start();
 
// Check if the user is already logged in, if so then it will be redirected to home
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
     header("location: chartroom.php");
     exit;
}
 
// Add database configuration
require_once "db.php";
 
// Define each variable with an empty value
$name = $password = "";
$name_err = $password_err = $login_err = "";

// Define $name variable to avoid undefined variable error
$name = "";
 
// Process the data if the form has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
     // Checks if name is empty
     if(empty(trim($_POST["name"]))){
         $name_err = "Please enter your name.";
     } else{
         $name = trim($_POST["name"]);
     }
    
     // Checks if the password is empty
     if(empty(trim($_POST["password"]))){
         $password_err = "Please enter your password.";
     } else{
         $password = trim($_POST["password"]);
     }
    
     // Validate name and password
     if(empty($name_err) && empty($password_err)){

         // Connect with database
         $sql = "SELECT id, name, password FROM users WHERE name = ?";
        
         if($stmt = mysqli_prepare($conn, $sql)){

             // Bind variables into the statement as parameters
             mysqli_stmt_bind_param($stmt, "s", $param_name);
            
             // Set parameters
             $param_name = $name;
            
             // Execute
             if(mysqli_stmt_execute($stmt)){

                 // Save result
                 mysqli_stmt_store_result($stmt);
                
                 // Checks if the name is already in use, if yes do the next validation
                 if(mysqli_stmt_num_rows($stmt) == 1){

                     // Bind the result variable
                     mysqli_stmt_bind_result($stmt, $id, $name, $hashed_password);

                     if(mysqli_stmt_fetch($stmt)){
                        
                         // Perform password validation
                         if(password_verify($password, $hashed_password)){

                             // If the password is successful, start into the session
                             session_start();
                            
                             // Put data into session variables
                             $_SESSION["loggedin"] = true;
                             $_SESSION["id"] = $id;
                             $_SESSION["name"] = $name;
                            
                             // Redirect user to home page
                             header("location: chartroom.php");
                         } else{
                             // Displays an error if the password does not match
                             $login_err = "Passwords do not match.";
                         }
                     }
                 } else {
                     // Displays an error if the name or password does not match
                     $login_err = "Incorrect username or password.";
                 }
             } else {
                 echo "Seems like an error, please try again later!";
             }

             // Close statement
             mysqli_stmt_close($stmt);
         }
     }
    
     // Close connection
     mysqli_close($conn);
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Login</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <style>
         body{ font: 14px sans-serif; background: #efefef;}
         .wrapper{ width: 380px; padding: 20px; margin:0 auto; displays: blocks; margin-top: 60px; background: #fff;}
     </style>
</head>
<body>
     <div class="wrapper">
         <h2>Login</h2>
         <p>Please fill in the data needed to access your page.</p>

         <?php
         if(!empty($login_err)){
             echo '<div class="alert alert-danger">' . $login_err . '</div>';
         }
         ?>

         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
             <div class="form-group">
                 <label>Name</label>
                 <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                 <span class="invalid-feedback"><?php echo $name_err; ?></span>
             </div>
             <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                 <span class="invalid-feedback"><?php echo $password_err; ?></span>
             </div>
             <div class="form-group">
                 <input type="submit" class="btn btn-primary" value="Login">
             </div>
             <p>Don't have an account? <a href="registration.php">Register here!</a>.</p>
         </form>
     </div>
</body>
</html>
