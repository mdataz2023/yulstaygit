<?php

/*

	Template Name: Residential Info

*/

get_header(); 

$residential_info_left_section_company_logo = get_field('residential_info_left_section_company_logo');
$residential_info_left_section_carousel_image_one = get_field('residential_info_left_section_carousel_image_one');
$residential_info_left_section_carousel_image_two = get_field('residential_info_left_section_carousel_image_two');
$residential_info_left_section_carousel_image_three = get_field('residential_info_left_section_carousel_image_three');
$residential_info_left_section_carousel_image_four = get_field('residential_info_left_section_carousel_image_four');
$residential_info_left_section_carousel_image_five = get_field('residential_info_left_section_carousel_image_five');

$residential_info_right_section_sales_paragraph_one = get_field('residential_info_right_section_sales_paragraph_one');
$residential_info_right_section_sales_title_one = get_field('residential_info_right_section_sales_title_one');
$residential_info_right_section_sales_description_one = get_field('residential_info_right_section_sales_description_one');
$residential_info_right_section_sales_title_two = get_field('residential_info_right_section_sales_title_two');
$residential_info_right_section_sales_description_two = get_field('residential_info_right_section_sales_description_two');
$residential_info_right_section_sales_title_three = get_field('residential_info_right_section_sales_title_three');
$residential_info_right_section_sales_description_three = get_field('residential_info_right_section_sales_description_three');

$residential_info_right_section_purchase_paragraph_one = get_field('residential_info_right_section_purchase_paragraph_one');
$residential_info_right_section_purchase_title_one = get_field('residential_info_right_section_purchase_title_one');
$residential_info_right_section_purchase_description_one = get_field('residential_info_right_section_purchase_description_one');
$residential_info_right_section_purchase_title_two = get_field('residential_info_right_section_purchase_title_two');
$residential_info_right_section_purchase_description_two = get_field('residential_info_right_section_purchase_description_two');
$residential_info_right_section_purchase_title_three = get_field('residential_info_right_section_purchase_title_three');
$residential_info_right_section_purchase_description_three = get_field('residential_info_right_section_purchase_description_three');
$residential_info_right_section_purchase_title_four = get_field('residential_info_right_section_purchase_title_four');
$residential_info_right_section_purchase_description_four = get_field('residential_info_right_section_purchase_description_four');

$residential_info_right_section_investment_paragraph_one = get_field('residential_info_right_section_investment_paragraph_one');
$residential_info_right_section_investment_title_one = get_field('residential_info_right_section_investment_title_one');
$residential_info_right_section_investment_description_one = get_field('residential_info_right_section_investment_description_one');
$residential_info_right_section_investment_title_two = get_field('residential_info_right_section_investment_title_two');
$residential_info_right_section_investment_description_two = get_field('residential_info_right_section_investment_description_two');
$residential_info_right_section_investment_title_three = get_field('residential_info_right_section_investment_title_three');
$residential_info_right_section_investment_description_three = get_field('residential_info_right_section_investment_description_three');

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
            <a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo $residential_info_left_section_company_logo; ?>" class="w-32 pb-4" alt=""></a>
          </div>
        
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
         <?php if( have_rows('residential_info_left_section_carousel_images') ): $s= 1; $a=0; ?>
				
                <?php while( have_rows('residential_info_left_section_carousel_images') ): the_row() ;   
                   $i++;
                          $residential_info_left_section_carousel_image = get_sub_field('residential_info_left_section_carousel_image');
                  ?>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo $residential_info_left_section_carousel_image; ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <?php   endwhile; endif; ?>
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
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">SALE</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">PURCHASE</button>
        </li>
        <li role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">INVESTMENT</button>
        </li>
    </ul>
</div>
<div id="myTabContent">
    <div class="hidden p-4 rounded-lg" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_paragraph_one; ?></p>
        <h3 class="text-3xl text-black pt-4 font-bold "><?php echo $residential_info_right_section_sales_title_one; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_description_one; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_sales_title_two; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_description_two; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_sales_title_three; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_description_three; ?></p>

    </div>
    <div class="hidden p-4 rounded-lg" id="settings" role="tabpanel" aria-labelledby="settings-tab">
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_paragraph_one; ?></p>
        <h3 class="text-3xl text-black pt-4 font-bold "><?php echo $residential_info_right_section_purchase_title_one; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_description_one; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_purchase_title_two; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_description_two; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_purchase_title_three; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_description_three; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_purchase_title_four; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_description_four; ?></p>
    </div>
    <div class="hidden p-4 rounded-lg" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
    <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_investment_paragraph_one; ?></p>
    <?php if( have_rows('residential_info_right_section_investment') ): $s= 1; $a=0; ?>
				
                <?php while( have_rows('residential_info_right_section_investment') ): the_row() ;   
                   $i++;
                          $residential_info_right_section_investment_title = get_sub_field('residential_info_right_section_investment_title');
                          $residential_info_right_section_investment_description = get_sub_field('residential_info_right_section_investment_description');
                  ?>
                
                <h3 class="text-3xl text-black pt-4 font-bold "><?php echo $residential_info_right_section_investment_title; ?></h3>
                <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_investment_description; ?></p>
        <?php   endwhile; endif; ?>


        <!-- 
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_investment_title_two; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_investment_description_two; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_investment_title_three; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_investment_description_three; ?></p> -->
    </div>
</div>

    </div>
  
</div>

<?php get_footer(); ?>