<?php
/*
	Template Name: Pro
*/
get_header(); 

?>

<div class="h-screen w-screen mr-12 p-14 gap-6 overflow-y-scroll">

<div>
    <!-- <button onclick="wheelFunction()" id="btnwheel">wheel</button> -->
    <button onclick="gridFunction()" borber id="girdbtn" class="bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold py-1 px-4 mb-4 rounded-full">grid</button>
    <button onclick="listFunction()" id="btnlist" class="bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold py-1 px-4 mb-4 rounded-full">list</button>
</div>

<script>

function wheelFunction() {
    var wheel = document.getElementById("wheel");
  var grid = document.getElementById("grid");
  var list = document.getElementById("list");
    wheel.style.display = "block"; 
    grid.style.display = "none";
    wheel.style.display = "none"; 
}
function gridFunction() {
    var wheel = document.getElementById("wheel");
  var grid = document.getElementById("grid");
  var list = document.getElementById("list");
    wheel.style.display = "none";
    grid.style.display = "block";
    list.style.display = "none";
}
function listFunction() {
    var wheel = document.getElementById("wheel");
  var grid = document.getElementById("grid");
  var list = document.getElementById("list");
    wheel.style.display = "none";
    grid.style.display = "none";
    list.style.display = "block";
}
</script>

<div id="wheel" class="grid grid-cols-1 md:grid-cols-2" style="">
    <div>

        <div>
        <div class="flex gap-3 mb-3 mt-6">
				<div>
					<a href="<?php bloginfo('url'); ?>/home" class="text-gray-400 hover:text-gray-800 font-bold"><?php _e('Home','theme-text-domain'); ?></a>
				</div>
				<div class="flex items-center content-between">
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
						<path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
						</svg>
					</div>
				</div>
				
				<div class="font-medium"><?php the_title(); ?>
			</div>
        </div>
        </div>
        <div class="md:block hidden">
        <a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/7.png" class="w-32 pb-4" alt=""></a>
          </div>

        <?php

            $the_query = new WP_Query(array(

                'post_type' => 'residential',

                'posts_per_page' => '10',

                'post__not_in' => array($id),

            ));



            if ($the_query->have_posts()) {

                $displayed_categories = array(); // Array to store displayed category names



                while ($the_query->have_posts()) {

                    $the_query->the_post();



                    $thumbnail_id = get_post_thumbnail_id();

                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);

                    $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);



                    $categories = get_the_category();



                    if ($categories) {
                        foreach ($categories as $category) {
                            if (!in_array($category->name, $displayed_categories)) {
                                $categoryDivName1=$category->name;
                                echo '<div>';
                                echo '<div class="text-6xl category-name-class transitionCS" style="color:#c1c1c1;line-height: 80px;"   onmouseover="categoryMouseOver('."'".$categoryDivName1."'".',this)" onmouseout="categoryMouseOut('."'".$categoryDivName1."'".')">' . esc_html($category->name) . '</div>';
                                echo '</div>';
                                $displayed_categories[] = $category->name; // Add the category name to the displayed array
                            }
                        }

                    }

                }

                wp_reset_postdata();

            }

            ?>

    </div>

    <div class="col-scroll">

        <div class="text-black">

            <div class="d-flex flex-row mb-3 text-white mt-4 gap-4 text-uppercase text-black">

                <div class="text-black" style="font-size: 25px;font-weight: bold;"><a href>Residential</a></div>

            </div>



            <div class="text-black" style="font-size: 22px;">



            </div>



            <div class="mt-5">

                <!-- <a href><div class="text-5xl"><h1>1500 De Maisonneuve</div></a> -->

                <div>

                    <?php

                        $categories = get_categories(array(

                            'taxonomy' => 'category', // Replace 'category' with your custom taxonomy if needed

                            'hide_empty' => false,

                        ));


                        $i=0;
                        foreach ($categories as $category) {
                        $categoryDivName=$category->name;
                            echo '<div>';

                            echo '<h2 class="category-name text-black text-6xl md:text-lg md:text-white">' . esc_html($category->name) . '</h2>';

                            echo '<ul>';

                            $category_posts = new WP_Query(array(

                                'post_type' => 'residential',

                                'posts_per_page' => -1,

                                'tax_query' => array(

                                    array(

                                        'taxonomy' => 'category', // Replace 'category' with your custom taxonomy if needed

                                        'field' => 'term_id',

                                        'terms' => $category->term_id,

                                    ),

                                ),

                            ));


                            echo "<div id='".$categoryDivName."' class='".$categoryDivName."'>";
                            if ($category_posts->have_posts()) {
                                while ($category_posts->have_posts()) {
                                    $category_posts->the_post();
                                    echo '<li><a class="text-4xl multi-residential-post transitionCS" style="color: #c1c1c1;" href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></li>';

                                }

                            }
                            echo "</div>";


                            echo '</ul>';

                            echo '</div>';



                            wp_reset_postdata(); // Reset the post data for the inner query
                            $i++;
                        }

                        ?>


                </div>
            </div>
        </div>
    </div>

</div>
<div id="grid" style="display: none;">

    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold py-1 px-4 mb-4 rounded-full" type="button">Dropdown button <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Test</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Test</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Test</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Test</a>
        </li>
        </ul>
    </div>

    <div class="grid grid-cols-4 gap-4">
        <div>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
                <h2 class="text-gray-700 hover:text-gray-900 text-xl  py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
                <p class="text-gray-900 hover:text-gray-700 text-2xl  py-2">$1,488,000</p>
                <div class="flex gap-4">
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="">20</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                        <p class="">5</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                        <p class="">3</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 96c0-17.7 14.3-32 32-32s32 14.3 32 32s14.3 32 32 32s32-14.3 32-32c0-53-43-96-96-96s-96 43-96 96V288H160V264c0-30.9-25.1-56-56-56H56c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c4.4 0 8 3.6 8 8v24H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H256 480c17.7 0 32-14.3 32-32s-14.3-32-32-32H400V264c0-4.4 3.6-8 8-8h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H408c-30.9 0-56 25.1-56 56v24H288V96zM480 416V384H32v32c0 53 43 96 96 96H384c53 0 96-43 96-96z"/></svg>
                        <p class="">1</p>
                    </div>
                </div>
                <p href="" class="text-sm hover:underline ">3007, Rue Cherrier</p>
                <p class="text-sm hover:underline ">Two or more storey for sale</p> 
                <p class="text-sm hover:underline ">Centris No. 19441707</p> 
            </a>
        </div>
        <div>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
                <h2 class="text-gray-700 hover:text-gray-900 text-xl  py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
                <p class="text-gray-900 hover:text-gray-700 text-2xl  py-2">$1,488,000</p>
                <div class="flex gap-4">
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="">20</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                        <p class="">5</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                        <p class="">3</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 96c0-17.7 14.3-32 32-32s32 14.3 32 32s14.3 32 32 32s32-14.3 32-32c0-53-43-96-96-96s-96 43-96 96V288H160V264c0-30.9-25.1-56-56-56H56c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c4.4 0 8 3.6 8 8v24H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H256 480c17.7 0 32-14.3 32-32s-14.3-32-32-32H400V264c0-4.4 3.6-8 8-8h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H408c-30.9 0-56 25.1-56 56v24H288V96zM480 416V384H32v32c0 53 43 96 96 96H384c53 0 96-43 96-96z"/></svg>
                        <p class="">1</p>
                    </div>
                </div>
                <p href="" class="text-sm hover:underline ">3007, Rue Cherrier</p>
                <p class="text-sm hover:underline ">Two or more storey for sale</p> 
                <p class="text-sm hover:underline ">Centris No. 19441707</p> 
            </a>
        </div>
        <div>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
                <h2 class="text-gray-700 hover:text-gray-900 text-xl  py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
                <p class="text-gray-900 hover:text-gray-700 text-2xl  py-2">$1,488,000</p>
                <div class="flex gap-4">
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="">20</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                        <p class="">5</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                        <p class="">3</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 96c0-17.7 14.3-32 32-32s32 14.3 32 32s14.3 32 32 32s32-14.3 32-32c0-53-43-96-96-96s-96 43-96 96V288H160V264c0-30.9-25.1-56-56-56H56c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c4.4 0 8 3.6 8 8v24H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H256 480c17.7 0 32-14.3 32-32s-14.3-32-32-32H400V264c0-4.4 3.6-8 8-8h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H408c-30.9 0-56 25.1-56 56v24H288V96zM480 416V384H32v32c0 53 43 96 96 96H384c53 0 96-43 96-96z"/></svg>
                        <p class="">1</p>
                    </div>
                </div>
                <p href="" class="text-sm hover:underline ">3007, Rue Cherrier</p>
                <p class="text-sm hover:underline ">Two or more storey for sale</p> 
                <p class="text-sm hover:underline ">Centris No. 19441707</p> 
            </a>
        </div>
        <div>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
                <h2 class="text-gray-700 hover:text-gray-900 text-xl  py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
                <p class="text-gray-900 hover:text-gray-700 text-2xl  py-2">$1,488,000</p>
                <div class="flex gap-4">
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="">20</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                        <p class="">5</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                        <p class="">3</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 96c0-17.7 14.3-32 32-32s32 14.3 32 32s14.3 32 32 32s32-14.3 32-32c0-53-43-96-96-96s-96 43-96 96V288H160V264c0-30.9-25.1-56-56-56H56c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c4.4 0 8 3.6 8 8v24H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H256 480c17.7 0 32-14.3 32-32s-14.3-32-32-32H400V264c0-4.4 3.6-8 8-8h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H408c-30.9 0-56 25.1-56 56v24H288V96zM480 416V384H32v32c0 53 43 96 96 96H384c53 0 96-43 96-96z"/></svg>
                        <p class="">1</p>
                    </div>
                </div>
                <p href="" class="text-sm hover:underline ">3007, Rue Cherrier</p>
                <p class="text-sm hover:underline ">Two or more storey for sale</p> 
                <p class="text-sm hover:underline ">Centris No. 19441707</p> 
            </a>
        </div>
        <div>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
                <h2 class="text-gray-700 hover:text-gray-900 text-xl  py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
                <p class="text-gray-900 hover:text-gray-700 text-2xl  py-2">$1,488,000</p>
                <div class="flex gap-4">
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="">20</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                        <p class="">5</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                        <p class="">3</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 96c0-17.7 14.3-32 32-32s32 14.3 32 32s14.3 32 32 32s32-14.3 32-32c0-53-43-96-96-96s-96 43-96 96V288H160V264c0-30.9-25.1-56-56-56H56c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c4.4 0 8 3.6 8 8v24H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H256 480c17.7 0 32-14.3 32-32s-14.3-32-32-32H400V264c0-4.4 3.6-8 8-8h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H408c-30.9 0-56 25.1-56 56v24H288V96zM480 416V384H32v32c0 53 43 96 96 96H384c53 0 96-43 96-96z"/></svg>
                        <p class="">1</p>
                    </div>
                </div>
                <p href="" class="text-sm hover:underline ">3007, Rue Cherrier</p>
                <p class="text-sm hover:underline ">Two or more storey for sale</p> 
                <p class="text-sm hover:underline ">Centris No. 19441707</p> 
            </a>
        </div>
        <div>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
                <h2 class="text-gray-700 hover:text-gray-900 text-xl  py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
                <p class="text-gray-900 hover:text-gray-700 text-2xl  py-2">$1,488,000</p>
                <div class="flex gap-4">
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="">20</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                        <p class="">5</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                        <p class="">3</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 96c0-17.7 14.3-32 32-32s32 14.3 32 32s14.3 32 32 32s32-14.3 32-32c0-53-43-96-96-96s-96 43-96 96V288H160V264c0-30.9-25.1-56-56-56H56c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c4.4 0 8 3.6 8 8v24H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H256 480c17.7 0 32-14.3 32-32s-14.3-32-32-32H400V264c0-4.4 3.6-8 8-8h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H408c-30.9 0-56 25.1-56 56v24H288V96zM480 416V384H32v32c0 53 43 96 96 96H384c53 0 96-43 96-96z"/></svg>
                        <p class="">1</p>
                    </div>
                </div>
                <p href="" class="text-sm hover:underline ">3007, Rue Cherrier</p>
                <p class="text-sm hover:underline ">Two or more storey for sale</p> 
                <p class="text-sm hover:underline ">Centris No. 19441707</p> 
            </a>
        </div>
        <div>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
                <h2 class="text-gray-700 hover:text-gray-900 text-xl  py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
                <p class="text-gray-900 hover:text-gray-700 text-2xl  py-2">$1,488,000</p>
                <div class="flex gap-4">
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="">20</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                        <p class="">5</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                        <p class="">3</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 96c0-17.7 14.3-32 32-32s32 14.3 32 32s14.3 32 32 32s32-14.3 32-32c0-53-43-96-96-96s-96 43-96 96V288H160V264c0-30.9-25.1-56-56-56H56c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c4.4 0 8 3.6 8 8v24H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H256 480c17.7 0 32-14.3 32-32s-14.3-32-32-32H400V264c0-4.4 3.6-8 8-8h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H408c-30.9 0-56 25.1-56 56v24H288V96zM480 416V384H32v32c0 53 43 96 96 96H384c53 0 96-43 96-96z"/></svg>
                        <p class="">1</p>
                    </div>
                </div>
                <p href="" class="text-sm hover:underline ">3007, Rue Cherrier</p>
                <p class="text-sm hover:underline ">Two or more storey for sale</p> 
                <p class="text-sm hover:underline ">Centris No. 19441707</p> 
            </a>
        </div>
        <div>
            <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
                <h2 class="text-gray-700 hover:text-gray-900 text-xl  py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
                <p class="text-gray-900 hover:text-gray-700 text-2xl  py-2">$1,488,000</p>
                <div class="flex gap-4">
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="">20</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                        <p class="">5</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                        <p class="">3</p>
                    </div>
                    <div class="flex gap-1">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 96c0-17.7 14.3-32 32-32s32 14.3 32 32s14.3 32 32 32s32-14.3 32-32c0-53-43-96-96-96s-96 43-96 96V288H160V264c0-30.9-25.1-56-56-56H56c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c4.4 0 8 3.6 8 8v24H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H256 480c17.7 0 32-14.3 32-32s-14.3-32-32-32H400V264c0-4.4 3.6-8 8-8h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H408c-30.9 0-56 25.1-56 56v24H288V96zM480 416V384H32v32c0 53 43 96 96 96H384c53 0 96-43 96-96z"/></svg>
                        <p class="">1</p>
                    </div>
                </div>
                <p href="" class="text-sm hover:underline ">3007, Rue Cherrier</p>
                <p class="text-sm hover:underline ">Two or more storey for sale</p> 
                <p class="text-sm hover:underline ">Centris No. 19441707</p> 
            </a>
        </div>
        
    </div>
</div>
<div id="list" style="display: none;">

    <div class="grid grid-cols-5 gap-8 mt-10">
        <div class="col-span-2 "> 
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
        </div>
        <div class="col-span-3 ">
            <h2 class="text-gray-700 hover:text-gray-900 text-2xl border-b border-gray-700 py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
            <p class="text-gray-900 hover:text-gray-700 text-2xl border-b border-gray-700 py-2">$1,488,000</p>
            <div class="flex  gap-2 py-2 ">
                    <p class="">20</p>
                    <p class="">5</p>
                    <p class="">3</p>
                    <p class="">1</p>
            </div>
            <a href="" class="text-base py-2">3007, Rue Cherrier</a>
            <p class="text-base py-2">This stunning waterfront property boasts 5 bedrooms and 3.5 bathrooms, with walnut and heated ceramic floors throughout. The marble countertop adds an element of elegance to the home, and the large basement provides easy access to the backyard and paved jumbo terrace, perfect for outdoor entertaining. The garage can accommodate a lift for up to 4 cars. The location offers privacy and tranquility, but is just a short drive from all services, providing access to shopping, the REM, and other public transportation. This luxurious home is the perfect retreat for those seeking waterfront living with all the amenities of city life nearby</p>
            <p class="text-base py-2"><a href="" class="">Two or more storey for sale </a></p> 
            <p class="text-base py-2"><a href="" class="">Centris No. 19441707 </a></p>
        </div>


        <div class="col-span-2 "> 
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
        </div>
        <div class="col-span-3 ">
            <h2 class="text-gray-700 hover:text-gray-900 text-2xl border-b border-gray-700 py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
            <p class="text-gray-900 hover:text-gray-700 text-2xl border-b border-gray-700 py-2">$1,488,000</p>
            <div class="flex  gap-2 py-2 ">
                    <p class="">20</p>
                    <p class="">5</p>
                    <p class="">3</p>
                    <p class="">1</p>
            </div>
            <a href="" class="text-base py-2">3007, Rue Cherrier</a>
            <p class="text-base py-2">This stunning waterfront property boasts 5 bedrooms and 3.5 bathrooms, with walnut and heated ceramic floors throughout. The marble countertop adds an element of elegance to the home, and the large basement provides easy access to the backyard and paved jumbo terrace, perfect for outdoor entertaining. The garage can accommodate a lift for up to 4 cars. The location offers privacy and tranquility, but is just a short drive from all services, providing access to shopping, the REM, and other public transportation. This luxurious home is the perfect retreat for those seeking waterfront living with all the amenities of city life nearby</p>
            <p class="text-base py-2"><a href="" class="">Two or more storey for sale </a></p> 
            <p class="text-base py-2"><a href="" class="">Centris No. 19441707 </a></p>
        </div>

        <div class="col-span-2 "> 
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
        </div>
        <div class="col-span-3 ">
            <h2 class="text-gray-700 hover:text-gray-900 text-2xl border-b border-gray-700 py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
            <p class="text-gray-900 hover:text-gray-700 text-2xl border-b border-gray-700 py-2">$1,488,000</p>
            <div class="flex  gap-2 py-2 ">
                    <p class="">20</p>
                    <p class="">5</p>
                    <p class="">3</p>
                    <p class="">1</p>
            </div>
            <a href="" class="text-base py-2">3007, Rue Cherrier</a>
            <p class="text-base py-2">This stunning waterfront property boasts 5 bedrooms and 3.5 bathrooms, with walnut and heated ceramic floors throughout. The marble countertop adds an element of elegance to the home, and the large basement provides easy access to the backyard and paved jumbo terrace, perfect for outdoor entertaining. The garage can accommodate a lift for up to 4 cars. The location offers privacy and tranquility, but is just a short drive from all services, providing access to shopping, the REM, and other public transportation. This luxurious home is the perfect retreat for those seeking waterfront living with all the amenities of city life nearby</p>
            <p class="text-base py-2"><a href="" class="">Two or more storey for sale </a></p> 
            <p class="text-base py-2"><a href="" class="">Centris No. 19441707 </a></p>
        </div>


        <div class="col-span-2 "> 
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
        </div>
        <div class="col-span-3 ">
            <h2 class="text-gray-700 hover:text-gray-900 text-2xl border-b border-gray-700 py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
            <p class="text-gray-900 hover:text-gray-700 text-2xl border-b border-gray-700 py-2">$1,488,000</p>
            <div class="flex  gap-2 py-2 ">
                    <p class="">20</p>
                    <p class="">5</p>
                    <p class="">3</p>
                    <p class="">1</p>
            </div>
            <a href="" class="text-base py-2">3007, Rue Cherrier</a>
            <p class="text-base py-2">This stunning waterfront property boasts 5 bedrooms and 3.5 bathrooms, with walnut and heated ceramic floors throughout. The marble countertop adds an element of elegance to the home, and the large basement provides easy access to the backyard and paved jumbo terrace, perfect for outdoor entertaining. The garage can accommodate a lift for up to 4 cars. The location offers privacy and tranquility, but is just a short drive from all services, providing access to shopping, the REM, and other public transportation. This luxurious home is the perfect retreat for those seeking waterfront living with all the amenities of city life nearby</p>
            <p class="text-base py-2"><a href="" class="">Two or more storey for sale </a></p> 
            <p class="text-base py-2"><a href="" class="">Centris No. 19441707 </a></p>
        </div>


        <div class="col-span-2 "> 
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/194417071.jpg" alt="Image" class="w-full">
        </div>
        <div class="col-span-3 ">
            <h2 class="text-gray-700 hover:text-gray-900 text-2xl border-b border-gray-700 py-2">Montréal (L'Île-Bizard/Sainte-Geneviève)</h2>
            <p class="text-gray-900 hover:text-gray-700 text-2xl border-b border-gray-700 py-2">$1,488,000</p>
            <div class="flex  gap-2 py-2 ">
                    <p class="">20</p>
                    <p class="">5</p>
                    <p class="">3</p>
                    <p class="">1</p>
            </div>
            <a href="" class="text-base py-2">3007, Rue Cherrier</a>
            <p class="text-base py-2">This stunning waterfront property boasts 5 bedrooms and 3.5 bathrooms, with walnut and heated ceramic floors throughout. The marble countertop adds an element of elegance to the home, and the large basement provides easy access to the backyard and paved jumbo terrace, perfect for outdoor entertaining. The garage can accommodate a lift for up to 4 cars. The location offers privacy and tranquility, but is just a short drive from all services, providing access to shopping, the REM, and other public transportation. This luxurious home is the perfect retreat for those seeking waterfront living with all the amenities of city life nearby</p>
            <p class="text-base py-2"><a href="" class="">Two or more storey for sale </a></p> 
            <p class="text-base py-2"><a href="" class="">Centris No. 19441707 </a></p>
        </div>



    </div>
        
</div>
</div>



<script>
function categoryMouseOver(categoryName, el) {
    window.location.hash = '#' + categoryName;
    document.querySelectorAll('.category-name-class').forEach(function(classNames) {
        classNames.style.color = "#c1c1c1";
    });
    document.getElementById(categoryName).style.color = "black";

    el.style.color = "black";

    document.querySelectorAll('.category-mouse-over-class').forEach(function(classNames) {
        classNames.classList.remove('category-mouse-over-class');
    });

    var element = document.getElementById(categoryName);
    element.classList.add("category-mouse-over-class");
    element.classList.remove("category-mouse-end-class");

}

function categoryMouseOut(categoryName) {
    // window.location.hash = '#' + categoryName;
    // document.getElementById(categoryName).style.color = "#c1c1c1";

    // var element = document.getElementById(categoryName);
    // element.classList.remove("category-mouse-over-class");
    // element.classList.add("category-mouse-end-class");
}
</script>


<?php get_footer(); ?>