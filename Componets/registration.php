<?php 
require_once "db.php";
 
// Define each variable with an empty value
$name = $password = $confirm_password = "";
$name_err = $password_err = $confirm_password_err = "";
 
// Do it if the data has been entered into the form
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
     // Check if name is empty
     if(empty(trim($_POST["name"])))
     {
         $name_err = "Please enter a name.";
     }
     // Detect disallowed characters using regex
     elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["name"])))
     {
        $name_err = "Names can only contain a combination of words, numbers or underscores.";
     }
     else {
         // Connecting with the database
         $sql = "SELECT id FROM users WHERE name = ?";
        
         if($stmt = mysqli_prepare($conn, $sql)){
             // Used to bind variables to marker parameters of prepared statements.
             mysqli_stmt_bind_param($stmt, "s", $param_name);
            
             // Set up the name parameter
             $param_name = trim($_POST["name"]);
            
             // Execute
             if(mysqli_stmt_execute($stmt)){

                 mysqli_stmt_store_result($stmt);
                
                 if(mysqli_stmt_num_rows($stmt) == 1){
                     $name_err = "This name is already registered!";
                 } else{
                     $name = trim($_POST["name"]);
                 }
             }
             else {
                 // Returns an error if the statement failed to execute
                 echo "There seems to be an error, please try again later.";
             }

             // Close statement
             mysqli_stmt_close($stmt);
         }
     }
    
     // Password validation
     if(empty(trim($_POST["password"]))){
         $password_err = "Please enter a password.";
     } elseif(strlen(trim($_POST["password"])) < 6){
         $password_err = "Password must be up to 6 characters long.";
     } else{
         $password = trim($_POST["password"]);
     }
    
     // Validate password confirmation
     if(empty(trim($_POST["confirm_password"]))){
         $confirm_password_err = "Please confirm password.";
     } else{
         $confirm_password = trim($_POST["confirm_password"]);
         if(empty($password_err) && ($password != $confirm_password)){
             $confirm_password_err = "Passwords do not match.";
         }
     }
    
     // Check for errors before executing into the database
     if(empty($name_err) && empty($password_err) && empty($confirm_password_err)){
        
         // Set up a connection with the database
         $sql = "INSERT INTO users (name, password) VALUES (?, ?)";
         
         if($stmt = mysqli_prepare($conn, $sql)){

             // Used to bind variables to marker parameters of prepared statements.
             mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_password);
            
             // Set parameters of name and password
             $param_name = $name;
             $param_password = password_hash($password, PASSWORD_DEFAULT); // change password to hash code
            
             // Execute
             if(mysqli_stmt_execute($stmt)){
                 // Redirect if successful
                 header("location: chartroom.php");
             } else{
                 // Returns an error if the statement failed to execute
                 echo "There seems to be an error, please try again later.";
             }

             // Close statement
             mysqli_stmt_close($stmt);
         }
     }
    
     // Close connection with database
     mysqli_close($conn);
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Registration</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <style>
         body{ font: 14px sans-serif; background: #efefef;}
         .wrapper{ width: 380px; padding: 20px; margin:0 auto; displays: blocks; margin-top: 60px; background: #fff;}
     </style>
</head>
<body>
     <div class="wrapper">
         <h2>Registration</h2>
         <p>Please fill in the form below to continue.</p>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
             <div class="form-group">
                 <label>Name</label>
                 <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                 <span class="invalid-feedback"><?php echo $name_err; ?></span>
             </div>
             <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                 <span class="invalid-feedback"><?php echo $password_err; ?></span>
             </div>
             <div class="form-group">
                 <label>Confirm Password</label>
                 <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                 <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
             </div>
             <div class="form-group">
                 <input type="submit" class="btn btn-primary" value="Submit">
                 <input type="reset" class="btn btn-secondary ml-2" value="Reset">
             </div>
             <p>Already have an account? <a href="login.php">Login here!</a>.</p>
         </form>
     </div>
</body>
</html> 
