<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Details</title>
    <link rel="stylesheet" href="css/cattle_details.css" />
</head>
<body>
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
                    <li>Goat farming, also known as caprine farming, involves the raising and breeding of goats for various purposes such as meat, milk, fiber, and even as pets</li> 
                    <li>  Goats are versatile animals that can thrive in diverse environments, making them suitable for farming in different regions worldwide</li>
                    <li>They are valued for their adaptability, high reproductive rates, and ability to utilize a wide range of feed sources</li>
                    
               </ul>
            </div>

            <div id="breeds" class="hidden-info">
                <h3 class="topic">Breeds</h3>
                <ul>
                    <li>Boer</li>
                    <li>Saanen</li>
                    <li>Nubian</li>
                    <li>Anglo-Nubian</li>
                    <li>Alpine</li>
                </ul>
            </div>

            <div id="pest-disease" class="hidden-info">
                <h3 class="topic">Pests</h3>
                <ul>
                    <li>Worms .ie. tapeworm</li>
                    <li>Rodents</li>
                    
                    <li>Lice  (Nsabwe) </li>
                    <li>Mites </li>
                    
               
                <h3 class="topic">Diseases</h3>
                <li>Ticks</li>
                    <li>Foot rot</li>
                    <li>Contagious ecthyma (soremouth)</li>
                    <li>Caseous lymphadenitis (CL)</li>
                    <li>Metabolic Diseases .ie. Ketosis, hypocalcemia (milk fever) & Pregnancy toxemia </li>
                    </ul>
                 </div>

            <div id="importance" class="hidden-info">
            

                <h3 class="topic">Importance</h3>
                <ul>
                    <li>Food Production</li>
                    <li>Provides income and employment opportunities for farmers and workers in the pork industry</li>
                    <li>Goat manure can be utilized as organic fertilizer, contributing to sustainable agriculture practices </li>
                    <li>Maintaining diverse Goat breeds helps preserve genetic resources for future breeding programs and research.</li>
                    
                    <h3 class="topic">Prevention</h3>
            <li>Regular vaccination & proper nutrition</li>
            <li>Keep the Khola clean & well thatched</li>   
                </ul>
            </div>

            <div id="feeds" class="hidden-info">
             <h3 class="topic">Feeds</h3>
                <ul>
                    <li>Grains .ie. Corn, barley, wheat, and sorghum</li>
                    <li>Protein Sources .ie. Soyabean meal, fish meal, and dried whey</li>
                    <li> Vitamins and Minerals</li>
                    <li>Madeya</li>
                    <li>Water</li>
                    <li>Forages .ie. Khovani</li>
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
</body>
</html>
