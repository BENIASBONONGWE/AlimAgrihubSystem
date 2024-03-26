<title>Get in touch with us</title>
		<!---External CSS file-->
        <link rel="stylesheet" href="CSS/contactus.css">

    <!--<?php include 'includes/session.php'; ?> -->  

	<!--<?php include("includes/header.php"); ?> -->
	<body>
		
	<div class="contact-container">
  
	<form method="post" action="process_form.php">
    <h3>GET IN TOUCH</h3>
    <input type="text" name="name" id="name" placeholder="Enter your name" required>
    <input type="email" name="email" id="email" placeholder="Your email here" required>
    <textarea name="message" id="message" rows="4" placeholder="Message"></textarea>
    <button type="submit" class="login-btn">Send</button>
</form>

</body>
<?php include ("footer.php");  ?>