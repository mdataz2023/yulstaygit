<?php

/*

	Template Name: Rental + Property Info

*/

get_header(); 

$rental_property_info_left_section_company_logo = get_field('rental_property_info_left_section_company_logo');
$rental_property_info_left_section_carousel_image_one = get_field('rental_property_info_left_section_carousel_image_one');
$rental_property_info_left_section_carousel_image_two = get_field('rental_property_info_left_section_carousel_image_two');
$rental_property_info_left_section_carousel_image_three = get_field('rental_property_info_left_section_carousel_image_three');
$rental_property_info_left_section_carousel_image_four = get_field('rental_property_info_left_section_carousel_image_four');
$rental_property_info_left_section_carousel_image_five = get_field('rental_property_info_left_section_carousel_image_five');

$rental_property_info_right_section_rental_paragraph_one = get_field('rental_property_info_right_section_rental_paragraph_one');
$rental_property_info_right_section_rental_title_one = get_field('rental_property_info_right_section_rental_title_one');
$rental_property_info_right_section_rental_description_one = get_field('rental_property_info_right_section_rental_description_one');
$rental_property_info_right_section_rental_title_two = get_field('rental_property_info_right_section_rental_title_two');
$rental_property_info_right_section_rental_description_two = get_field('rental_property_info_right_section_rental_description_two');
$rental_property_info_right_section_rental_title_three = get_field('rental_property_info_right_section_rental_title_three');
$rental_property_info_right_section_rental_description_three = get_field('rental_property_info_right_section_rental_description_three');
$rental_property_info_right_section_rental_title_four = get_field('rental_property_info_right_section_rental_title_four');
$rental_property_info_right_section_rental_description_four = get_field('rental_property_info_right_section_rental_description_four');

$multi_residential_info_right_section_purchase_paragraph_one = get_field('multi_residential_info_right_section_purchase_paragraph_one');
$multi_residential_info_right_section_purchase_title_one = get_field('multi_residential_info_right_section_purchase_title_one');
$multi_residential_info_right_section_purchase_description_one = get_field('multi_residential_info_right_section_purchase_description_one');
$multi_residential_info_right_section_purchase_title_two = get_field('multi_residential_info_right_section_purchase_title_two');
$multi_residential_info_right_section_purchase_description_two = get_field('multi_residential_info_right_section_purchase_description_two');
$multi_residential_info_right_section_purchase_title_three = get_field('multi_residential_info_right_section_purchase_title_three');
$multi_residential_info_right_section_purchase_description_three = get_field('multi_residential_info_right_section_purchase_description_three');
$multi_residential_info_right_section_purchase_title_four = get_field('multi_residential_info_right_section_purchase_title_four');
$multi_residential_info_right_section_purchase_description_four = get_field('multi_residential_info_right_section_purchase_description_four');


?>

<div class="h-screen w-screen mr-12 grid grid-cols-1 md:grid-cols-2 p-14 gap-6">
    <div>
    <div class="flex gap-3 mb-3">
				<div>
					<a href="<?php bloginfo('url'); ?>/home" class="text-gray-400 hover:text-gray-800 font-bold">Home</a>
				</div>
				
                <div class="flex items-center content-between">
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
						<path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
						</svg>
					</div>
				</div>
				<div class="font-medium"><?php the_title(); ?></div>
        </div>
            <div class="md:block hidden">
            <a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/10.png" class="w-32 pb-4" alt=""></a>
          </div>
        
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/06/4-4.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/06/3-4.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/06/2-4.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/06/2-4.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/06/1-4.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="hidden absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="hidden absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

    </div>
    <div class="overflow-y-scroll">
        
<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Rentel</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Management</button>
        </li>
        <!-- <li role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">INVESTMENT</button>
        </li> -->
    </ul>
</div>
<div id="myTabContent">
    <div class="hidden p-4 rounded-lg" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl text-black pt-4 font-bold ">Our mission</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Peace of mind</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Transparency</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Transparency</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>

    </div>
    <div class="hidden p-4 rounded-lg" id="settings" role="tabpanel" aria-labelledby="settings-tab">
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl text-black pt-4 font-bold ">Our mission</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Peace of mind</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Transparency</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Financial Incentive</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    <!-- <div class="hidden p-4 rounded-lg" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl text-black pt-4 font-bold ">Our mission</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Peace of mind</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Transparency</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        <h3 class="text-3xl font-bold pt-4 text-black ">Transparency</h3>
        <p class="text-xl text-gray-900 ">This is some placeholder content the Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div> -->
</div>

    </div>
  
</div>

<?php get_footer(); ?>