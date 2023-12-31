<?php

/*

	Template Name: Residential

*/

get_header();
$lang = get_bloginfo("language");
$language="A";
if ($lang == 'en-US'){
   $language="A";
}else{
   $language="F";
}
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALbrsESmR55p0PLDbeL-SQ_YPuRpucYrw&libraries=places"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

<style>
/* Add custom styles if needed */
.active-button {
    background-color: #00AEC5;
    /* Change to your desired active button background color */
}
</style>
<div class="h-screen w-screen pt-12 md:pt-0 md:pr-12 overflow-y-scroll scroll-style">
    <div class="pt-0 md:pt-20">
        <!-- <div class="flex pb-7 overflow-hidden gap-1 h-[500px] max-w-7xl mx-auto">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36553983.44087083!2d-96!3d56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2slk!4v1692665654783!5m2!1sen!2slk"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> -->
        <div class="max-w-7xl mx-auto" id="map" style="height: 450px;"></div>

        <div class="">
            <div class="max-w-7xl mx-auto">

                <div class="flex justify-between">
                    <div class="flex gap-10 mb-7 mt-5">

                        <!-- <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-black bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center  "
                            type="button">Municipality <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button> -->
                        <!-- Dropdown menu -->
                        <select class="py-2 text-sm text-gray-700 dark:text-gray-200">
                            <option selected desabled><b>Municipality</b></option>
                            <?php
                                $municipalite = $wpdb->get_results(" SELECT * FROM MUNICIPALITES", OBJECT );
                                foreach ($municipalite as $page) { ?>
                            <option id="<?php echo $page->CODE;?>"><?php echo $page->DESCRIPTION;?></option>
                            <?php
                            }
                        ?>
                        </select>


                        <button class="hidden md:block" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-black bg-gray-100  hover:bg-gray-200  font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center  "
                            type="button">Bathrooms <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>

                        <button class="hidden md:block" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-black bg-gray-100  hover:bg-gray-200  font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center  "
                            type="button">Bedrooms <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>

                        <button class="hidden md:block" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-black bg-gray-100  hover:bg-gray-200  font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center  "
                            type="button">Prix <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pt-5 hidden md:block">
                        <!-- Buttons to toggle between Grid and List views -->
                        <button id="gridButton"
                            class="border border-gray-500 text-black px-4 py-2 rounded mr-2 active-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-grid-3x2-gap-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V4zM1 9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V9z" />
                            </svg>
                        </button>
                        <button id="listButton" class="border border-gray-500 text-black px-4 py-2 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-view-list" viewBox="0 0 16 16">
                                <path
                                    d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z" />
                            </svg>
                        </button>
                    </div>
                </div>





                <?php

$the_query = new WP_Query(array(

    'post_type' => 'multi-residential',

    'posts_per_page' => '1000',

    'post__not_in' => array($id),

));

if ($the_query->have_posts()) {

    $displayed_categories = array(); // Array to store displayed category names

    ?>

                <div id="gridView" class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-5 font-poppins px-3 md:px-0">
                    <?php
                while ($the_query->have_posts()) {
                    $inscriptionsData = $wpdb->get_row(" SELECT * FROM INSCRIPTIONS where NO_INSCRIPTION = '".get_the_content()."'", OBJECT );

                    $the_query->the_post();
                    $thumbnail_id = get_post_thumbnail_id();
                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
                    $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    $categories = get_the_category();



                    // if ($categories) {
                    //     foreach ($categories as $category) {
                    //         if (!in_array($category->name, $displayed_categories)) {
                                // $categoryDivName1=$category->name;
                                $results = $wpdb->get_row(" SELECT * FROM PHOTOS where  NO_INSCRIPTION = '".get_the_content()."'", OBJECT );

                ?>
                    <div>
                        <a href="<?php echo get_permalink();?>">
                            <img class="" src="<?php echo $results->PhotoURL;?>" alt="">
                            <div class="text-sm py-2"><?php
                    $municipalite = $wpdb->get_row(" SELECT * FROM MUNICIPALITES where CODE = '".$inscriptionsData->MUN_CODE."'", OBJECT );
                    echo $municipalite->DESCRIPTION;?></div>
                            <div class="text-lg"><?php the_title();?></div>
                            <p class="text-sm pt-1 pb-1"><?php $remarques = $wpdb->get_row(" SELECT * FROM REMARQUES where NO_INSCRIPTION = '".get_the_content()."' and CODE_LANGUE='".$language."'", OBJECT );
                    echo $remarques->TEXTE;
                    ?></p>
                            <div class="flex gap-3">
                                <div class="border-r my-4 pr-4 border-gray-400">
                                    <div>Bedrooms</div>
                                    <div><?php echo $inscriptionsData->NB_CHAMBRES;?></div>
                                </div>
                                <div class="border-r my-4 pr-4 border-gray-400">
                                    <div>Bathrooms</div>
                                    <div><?php echo $inscriptionsData->NB_CHAMBRES_HORS_SOL;?></div>
                                </div>
                                <div class="my-4 pr-4">
                                    <div>price</div>
                                    <div>
                                        <?php echo $inscriptionsData->PRIX_DEMANDE.' '.($inscriptionsData->DEVISE_PRIX_DEMANDE==="CAN"?"$":$inscriptionsData->DEVISE_PRIX_DEMANDE)  ;?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
            //      }
            //     }

            // }
        }
    }
     ?>
                </div>


                <div id="listView" class="grid grid-cols-3 content-center mb-8 gap-7 hidden">
                    <?php
                while ($the_query->have_posts()) {
                    $inscriptionsData = $wpdb->get_row(" SELECT * FROM INSCRIPTIONS where NO_INSCRIPTION = '".get_the_content()."'", OBJECT );

                    $the_query->the_post();
                    $thumbnail_id = get_post_thumbnail_id();
                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
                    $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    $categories = get_the_category();



                    // if ($categories) {
                    //     foreach ($categories as $category) {
                    //         if (!in_array($category->name, $displayed_categories)) {
                                // $categoryDivName1=$category->name;
                                $results = $wpdb->get_row(" SELECT * FROM PHOTOS where  NO_INSCRIPTION = '".get_the_content()."'", OBJECT );

                ?>
                    <div>
                        <a href="<?php echo get_permalink();?>">
                            <img class="" src="<?php  echo $results->PhotoURL;?>" alt="">
                        </a>
                    </div>
                    <div class="col-span-2 flex flex-col justify-between">
                        <a href="<?php echo get_permalink();?>">
                            <div>
                                <div class="text-base py-2 border-b border-gray-400"><?php
                                $municipalite = $wpdb->get_row(" SELECT * FROM MUNICIPALITES where CODE = '".$inscriptionsData->MUN_CODE."'", OBJECT );
                                echo $municipalite->NOM_RUE_COMPLET;?></div>
                                <div class="text-3xl py-2 border-b border-gray-400"><?php the_title();?></div>
                                <p class="text-lg py-2 border-b border-gray-400"><?php $remarques = $wpdb->get_row(" SELECT * FROM REMARQUES where NO_INSCRIPTION = '".get_the_content()."' and CODE_LANGUE='".$language."'", OBJECT );
                                echo $remarques->TEXTE;
                                ?></p>
                            </div>
                        </a>

                        <div class="flex gap-3">
                        <div class="border-r my-4 pr-4 border-gray-400">
                                <div>Bedrooms</div>
                                <div><?php
                                $UNITES_DETAILLEES = $wpdb->get_row("SELECT * FROM UNITES_DETAILLEES WHERE NO_INSCRIPTION='".get_the_content()."' ", OBJECT );
                                echo $UNITES_DETAILLEES->NB_CHAMBRES;?></div>
                            </div>
                            <div class="border-r my-4 pr-4 border-gray-400">
                                <div>Bathrooms</div>
                                <div><?php echo $inscriptionsData->NB_SALLES_BAINS;?></div>
                            </div>
                            <div class="my-4 pr-4">
                                <div>price</div>
                                <div>
                                    <?php echo $inscriptionsData->PRIX_DEMANDE.' '.($inscriptionsData->DEVISE_PRIX_DEMANDE==="CAN"?"$":$inscriptionsData->DEVISE_PRIX_DEMANDE)  ;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
            //      }
            //     }

            // }
        }
     ?>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
// Get references to the buttons and views
const gridButton = document.getElementById('gridButton');
const listButton = document.getElementById('listButton');
const gridView = document.getElementById('gridView');
const listView = document.getElementById('listView');

// Initially hide listView and display gridView
listView.classList.add('hidden');
gridView.classList.remove('hidden');

// Function to toggle between Grid and List views
gridButton.addEventListener('click', () => {
    gridView.classList.remove('hidden');
    listView.classList.add('hidden');

    // Highlight the clicked button
    gridButton.classList.add('active-button');
    listButton.classList.remove('active-button');
});

listButton.addEventListener('click', () => {
    gridView.classList.add('hidden');
    listView.classList.remove('hidden');

    // Highlight the clicked button
    listButton.classList.add('active-button');
    gridButton.classList.remove('active-button');
});
</script>
<script>
function initMap(){
      // map options
      var options = {
        zoom:7,
        center:{lat: 46, lng:-74}
        }
var map = new google.maps.Map(document.getElementById('map'),options);
      // Add a marker clusterer to manage the markers.

      //Add marker
      var markers = [];
      <?php
                        $datas = $wpdb->get_results("SELECT LATITUDE,LONGITUDE,NO_INSCRIPTION FROM INSCRIPTIONS", OBJECT );
                        foreach ($datas as $page) {
                            $post = $wpdb->get_row("SELECT ID from wp_posts where post_content='".$page->NO_INSCRIPTION."'", OBJECT );
                        ?>
                                markers.push({
                                    coords:{lat:<?php echo $page->LATITUDE;?>,lng:<?php echo $page->LONGITUDE;?>},
                                    content:'<a href="<?php  echo get_permalink( $post->ID );?>"><h1><?php  echo $page->NO_INSCRIPTION;?></h1></a>'
                            });
                        <?php
                        }
                        ?>

      // Loop through markers
      var gmarkers = [];
      for(var i = 0; i < markers.length; i++){
        gmarkers.push(addMarker(markers[i]));
      }

      //Add MArker function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,

        });

        /* if(props.iconImage){
          marker.setIcon(props.iconImage);
        } */

        //Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });
          marker.addListener('click',function(){
            infoWindow.open(map,marker);
          });
        }
        return marker;
      }
    var markerCluster = new MarkerClusterer(map, gmarkers,
      {
        imagePath:
        'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
      });
    }
  google.maps.event.addDomListener(window, 'load', initMap)
</script>

<?php get_footer(); ?>