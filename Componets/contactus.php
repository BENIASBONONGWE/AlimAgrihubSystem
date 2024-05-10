<!DOCTYPE html>
<html lang="en">
<?php include("nav.php"); ?>
<head>
    <meta charset="UTF-8">
    <title>Get in touch with us</title>
    <link rel="stylesheet" href="CSS/contactus.css">
    <link rel="stylesheet" href="CSS/nav.css"> <!-- Assuming nav.php includes navigation bar styles -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="aboutus.css" rel="stylesheet">
  <link href="body.css" rel="stylesheet">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384"></script> -->

  <style>
  .contact-container {
  width: 100%;
  height: 65%;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.contact-container form {
  background: #f9f9f9;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  display: flex;
    flex-direction: column;
    padding: 2vw 4vw;
    width: 90%;
    max-width: 600px;
    border-radius: 10px;
    margin-top: 100px;

}

.contact-container form h3 {
  text-align: center;
  margin-bottom: 20px;
  color: #555;
    font-weight: 800;
    margin-bottom: 20px;
    text-align: center; /* Center the text horizontally */
}
.contact-container form h3{
    color: #555;
    font-weight: 800;


}


.contact-container form input[type="text"],
.contact-container form input[type="email"],
.contact-container form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.contact-container form button {
  width: 100%;
  padding: 10px;
  background: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.contact-container form button:hover {
  background: green;
}

</style>


  <!-- Favicons -->
  <link href="images/Logo.png" rel="icon">
  <link href="images/Logo.png" rel="apple-touch-icon">
</head>
<body>
    <!-- Image at the top -->
    <div>
      <div style="background-image: url('images/contact-us1.png');  background-position: center; height: 500px;  width: 100%;">
        <div class="centered-text"></div>
    <h3 style="text-align: center;">We are here for you</h3>
    <h2 style="color:green; text-align:center;">CONTACT US</h2>
    <div class="contact-container">
        <form method="post" action="sendEmail.php">
            <h3>GET IN TOUCH</h3>
            <input type="text" name="name"  placeholder="Enter your name" required>
            <input type="email" name="email"  placeholder="Your email here" required>
            <textarea name="message" id="message" rows="4" placeholder="Message" required></textarea>
            <button type="submit" class="login-btn">Send</button>
        </form>
    </div>
    <br><br/>
    <br><br/>
    <br><br/>
    <br><br/>
    <?php include("footer.php"); ?>
</body>
</html>
