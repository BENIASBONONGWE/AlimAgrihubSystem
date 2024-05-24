
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZaAlimi Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="aboutus.css" rel="stylesheet">
    <link href="body.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="testimonial.css">

    <!-- Swiper JavaScript -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Your custom JavaScript -->
    <script src="script.js"></script>

    <!-- Your custom CSS -->
    <link rel="stylesheet" href="styles.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Favicons -->
    <link href="images/Logo.png" rel="icon">
    <link href="images/Logo.png" rel="apple-touch-icon">

    <style>
        .wrapper {
            padding: 80px;
        }


        .carousel-item img {
            max-height: 600px;
            object-fit: cover;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .btn-brown,
        .btn-brown1 {
            color: white;
            background-color: #066614;
            border-color: #066614;
            padding: 10px;
        }

        .custom-yellow-bg {
            background-color: #70b72d;
            padding: 5px;
        }

        .btn-brown:hover,
        .btn-brown1:hover {
            background-color: #70b72d;
            color: white;
        }

        .text {
            position: absolute;
            top: 800px;
            left: 100px;
            padding: 100px;
            font-size: large;
            font-weight: bold;
            width: 20%;
            color: white;
        }

        .footer {
            right: 20px;
        }

        .footer-image {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .dropdown-item:hover {
            background-color: #70b72d;
        }

        .about {
            text-align: center;
            color: #70b72d;
            font-size: 24px;
            font-family: Arial, sans-serif;
        }

        .learn-more-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #066614;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            align-items: center;
        }

        .learn-more-btn:hover {
            background-color: #066614;
            color: white;
        }

        /* Adjust sliding interval to 4 minutes */
        .carousel-item {
            transition: transform 6s ease-in-out;
        }

        /* Media Queries */
        @media only screen and (max-width: 768px) {
            .wrapper {
                padding: 40px;
            }

            .carousel-caption {
                padding: 0 20px;
            }

            .btn-brown,
            .btn-brown1 {
                padding: 8px;
            }

            .text {
                position: static;
                padding: 20px;
                width: auto;
                text-align: center;
            }

            .footer {
                right: auto;
                text-align: center;
            }
        }

        @media only screen and (max-width: 576px) {
            .carousel-caption {
                font-size: 14px;
            }

            .btn-brown,
            .btn-brown1 {
                padding: 5px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <?php include("nav.php");  ?>
    <div class="container-fluid">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/farmer.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h1>Modern Farming Techniques</h1>
                        <p style="text-shadow: 2px 2px 4px black">Our Application offers Farmers with a wide range of modern farming information compiled by experts to help turn farming to high profitable venture</p>
                        <a href="about.php" class="btn btn-brown">Learn More</a>
                        <a href="contactus.php" class="btn btn-brown1">Contact Us</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/happywomen.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Discover The Products</h5>
                        <p>Explore on Animal production</p>
                        <a href="animal.php" class="btn btn-brown">Discover More</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/nice.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Contact Us</h5>
                        <p>Get in touch with us for more information</p>
                        <a href="contactus.php" class="btn btn-brown">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>
</div>
<br></br>
<br></br>
        
<div class="about-section">
            <div class="wrapper">
                <div class="content">
                <div class="image-container">
                <img src="images/chicken.jpg" alt="Image Description" class="about-image">
                  </div>
                    <h1  class="about">WHO WE ARE</h1>
                    <p>Za-Alimi agri-hub management system is a comprehensive platform aimed at empowering farmers with
                        knowledge, skills, and resources to enhance their farming practices and improve their agricultural
                        productivity. Our system provides accessible and practical education on various aspects of agriculture
                        including crop cultivation, livestock management, pest and disease control, weather-related information, and many more.
                    </p>
                    <a href="about.php" class="learn-more-btn">Learn More</a>
                </div>
            </div>
        </div>
    </div>
<?php include ("body.php");  ?>

<br></br>

    
</section>

<!-- ======= Testimonials Section ======= -->


<?php include ("footer.php");  ?>
</html>
