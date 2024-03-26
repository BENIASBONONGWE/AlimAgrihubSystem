<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Details</title>
    <link rel="stylesheet" href="css/cattle_details.css" />
    <?php include ("navbar.php");  ?>
</head>

<body>

<div>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="#" class="animal-link" data-animal="introduction">Introduction</a></li>
                <li><a href="#" class="animal-link" data-animal="breeds">Breeds</a></li>
                <li><a href="#" class="animal-link" data-animal="pest-disease">Pest and Disease Control</a></li>
                <li><a href="#" class="animal-link" data-animal="importance">Importance</a></li>
                <li><a href="#" class="animal-link" data-animal="feeds">Feeds</a></li>
            </ul>
        </div>
        <div class="main-content">
            <!-- Hidden information sections for each animal -->
            <div id="introduction" class="hidden-info">
                <h3>Introduction</h3>
                <ul>
                    <li>Cattle farming, also known as cattle ranching or beef production, is the process of raising cattle for meat, milk, leather, and other by-products. Cattle have been integral to human civilization for centuries, providing essential resources and playing a significant role in agriculture and food production worldwide.</li>
                     <li>Cattle farming is the practice of raising cattle for various purposes, such as for meat, milk, and as draft animals. Cattle farming is an important industry worldwide and has been a key part of agriculture for thousands of years.</li> 
                     <li>Cattle farming can be a profitable business if managed properly, but it requires significant investment in land, equipment, and infrastructure</li>
               </ul>
            </div>

            <div id="breeds" class="hidden-info">
                <h3 class="topic">Breeds</h3>
                <ul>
                    <li>Angus</li>
                    <li>Hereford</li>
                    <li>Charolais</li>
                    <li>Malawi Zebu</li>
                    <li> Holstein</li>
                    <li> Jersey</li>
                    <li>Guernsey</li>
               </ul>
            </div>

            <div id="pest-disease" class="hidden-info">
                <h3 class="topic">Pests</h3>
                <ul>
                    <li>Ticks</li>
                    <li>Flies</li>
                    <li>Mosquitoes</li>
                    <li>Lice  (Nsabwe) </li>
                    <li>Mites ie mange mites  </li>
                    <li>Warbles aka Cattle grubs which are the larvae of bot flies</li>
                    <li>Midges which are small flies</li>
               
                <h3 class="topic">Diseases</h3>
                <li>Ticks</li>
                    <li>Bovine Respiratory Disease (BRD)</li>
                    <li>Mastitis</li>
                    <li>Foot Rot </li>
                    <li>Bovine Viral Diarrhea (BVD) </li>
                    <li>Brucellosis</li>
                    <li>Foot-and-Mouth Disease (FMD)</li>
                    <li>Rinderpest</li>
                    <li>Johne's Disease</li>
                    <li>Blackleg</li>
                    </ul>
                 </div>

            <div id="importance" class="hidden-info">
                <h3 class="topic">Importance</h3>
                <ul>
                    <li>Food Production interms of meat & milk</li>
                    <li>Source of revenue and employment opportunities.</li>
                    <li>Provides income and sustenance for rural communities and helps alleviate poverty </li>
                    <li>Integrating livestock into farming systems improve soil fertility, enhance nutrient cycling & contribute to sustainable land management.</li>
                    <li>Valuable sources of draught power, helping farmers plow fields, transport goods</li>
                    <li>Serve as important models for biomedical research due to their physiological similarities to humans</li>
                    <li>They are integral to cultural identities and heritage, serving as symbols of wealth, prosperity, and social status in various cultures.</li>
                </ul>
            </div>

            <div id="feeds" class="hidden-info">
             <h3 class="topic">Feeds</h3>
                <ul>
                    <li>Forages ie grasses, legumes, and browse plants such as alfalfa</li>
                    <li>Concentrates ie Grains, Oilseed Meal, By-Products like , dried beet pulp </li>
                    <li>Supplements like Minerals,Vitamins (A,D,E,B), Additives: Additives such as ionophores </li>
                    <li>Silages and Haylage</li>
                    <li>Pasture and Range</li>
                    <li>Water</li>
                </ul>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add click event listeners to animal links
            $('.animal-link').click(function(event) {
                event.preventDefault();
                // Hide all information sections
                $('.hidden-info').hide();
                // Get the data-animal attribute value
                var animal = $(this).data('animal');
                // Show the corresponding information section
                $('#' + animal).show();
            });

            // Add click event listeners to topic headers
            $('.topic').click(function() {
                // Toggle visibility of corresponding information section
                $(this).next('ul').toggle();
            });
        });
    </script>
    </div>
</body>
</html>
<?php include ("footer.php");  ?>
