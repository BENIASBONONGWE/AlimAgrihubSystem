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
                    <li>Chicken farming, also known as poultry farming</li> <li>Is the practice of raising domesticated birds such as chickens for the purpose of meat, eggs, or both.</li> <li> It is one of the most widespread and important agricultural practices worldwide, contributing significantly to food security and economic development..</li>
                    
               </ul>
            </div>

            <div id="breeds" class="hidden-info">
                <h3 class="topic">Breeds</h3>
                <ul>
                    <li>Broilers which are raised primarily for meat production</li>
                    <li>Layers are bred for egg production</li>
                    <li>Dual-Purpose Breeds raised for both meat and egg production ie Sussex and Orpington.</li>
             </ul>
            </div>

            <div id="pest-disease" class="hidden-info">
                <h3 class="topic">Pests</h3>
                <ul>
                    <li>Ticks</li>
                    <li>Flies</li>
                    
                    <li>Lice  (Nsabwe) </li>
                    <li>Mites </li>
                    
               
                <h3 class="topic">Diseases</h3>
                <li>Ticks</li>
                    <li>Newcastle disease</li>
                    <li>avian influenza (BIRD Flu)</li>
                    <li>coccidiosis (Cocci) </li>
                    <li>Newcastle disease </li>
                    <li>Avian influenza</li>
                    <li>Fowl pox</li>
                    <li>Mycoplasma</li>
                    
                    </ul>
                 </div>

            <div id="importance" class="hidden-info">
                <h3 class="topic">Importance</h3>
                <ul>
                    <li>Source of protein through both meat and eggs, contributing to balanced diets worldwide.</li>
                    <li>Vital component of the agricultural economy, providing livelihoods for millions of people globally, especially in rural areas</li>
                    <li>Provides income and sustenance for rural communities and helps alleviate poverty </li>
                    <li>Integrating livestock into farming systems improve soil fertility, enhance nutrient cycling & contribute to sustainable land management.</li>
                    <li>Chickens are adaptable to various environmental conditions and can be raised on a small scale by individuals or on large commercial farms, making them accessible to a wide range of farmers.</li>
                    <li>chickens require less feed, water, and space for production, making them a relatively sustainable protein source.</li>
                    <li></li>
                </ul>
            </div>

            <div id="feeds" class="hidden-info">
             <h3 class="topic">Feeds</h3>
                <ul>
                    <li>Forages .ie. grasses</li>
                    <li>Concentrates ie Grains, Oilseed Meal </li>
                    <li>Supplements like Minerals,Vitamins (A,D,E,B), Additives: Additives such as ionophores </li>
                    <li>Madeya</li>
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
</body>
</html>
