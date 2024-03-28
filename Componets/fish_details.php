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
                    <li>Pig farming, also known as swine production, involves raising domestic pigs for various purposes, including meat production, breeding, and sometimes as pets</li> 
                    <li> It's a significant agricultural activity worldwide due to the high demand for pork products</li>
                    <li> Pig farming can range from small-scale backyard operations to large commercial enterprises</li>
                    
               </ul>
            </div>

            <div id="breeds" class="hidden-info">
                <h3 class="topic">Breeds</h3>
                <ul>
                    <li> Yorkshire. Known for its large size, white color, and good mothering abilities. Often used for pork production</li>
                    <li>Duroc. Recognized for its red color, fast growth rate, and efficient feed conversion. Commonly used in crossbreeding programs</li>
                    <li>Hampshire. Known for its black body with a white belt around the shoulders, good growth rate, and meat quality.</li>
                    <li>Hampshire. Known for its black body with a white belt around the shoulders, good growth rate, and meat quality.</li>
                     <li>Berkshire. Valued for its marbled meat, hardiness, and gentle temperament.</li>
                     <li>Landrace. Known for its long body, large litters and excellent maternal instincts.</li>
                </ul>
            </div>

            <div id="pest-disease" class="hidden-info">
                <h3 class="topic">Pests</h3>
                <ul>
                    <li>Mosquitoes</li>
                    <li>Rodents</li>
                    
                    <li>Lice  (Nsabwe) </li>
                    <li>Mites </li>
                    
               
                <h3 class="topic">Diseases</h3>
                <li>Ticks</li>
                    <li>African Swine Fever (ASF)</li>
                    <li>oot and Mouth Disease (FMD)</li>
                    <li>Porcine Reproductive and Respiratory Syndrome (PRRS) </li>
                    <li>Swine Influenza </li>
                    </ul>
                 </div>

            <div id="importance" class="hidden-info">
                <h3 class="topic">Importance</h3>
                <ul>
                    <li>Food Production</li>
                    <li>Provides income and employment opportunities for farmers and workers in the pork industry</li>
                    <li>Pig manure can be utilized as organic fertilizer, contributing to sustainable agriculture practices </li>
                    <li>Maintaining diverse pig breeds helps preserve genetic resources for future breeding programs and research.</li>
                    
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
