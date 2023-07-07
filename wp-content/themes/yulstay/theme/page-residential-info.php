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

<div class="h-screen w-screen mr-12 p-14 gap-6">
    <div>

        <div class="flex gap-3 mb-3">
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
				<div class="font-medium"><?php the_title(); ?></div>
        </div>
        <div class="md:block hidden flex justify-center">
            <a href="<?php bloginfo('url'); ?>/home" class="flex justify-center"><img src="<?php echo $residential_info_left_section_company_logo; ?>" class="w-60 pb-4" alt=""></a>
        </div>
        <div class="grid grid-cols-3 gap-1">
  <div>
    <button id="button1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 w-full">SALE</button>
  </div>
  <div>
    <button id="button2" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 w-full">PURCHASE</button>
  </div>
  <div>
    <button id="button3" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 w-full">INVESTMENT</button>
  </div>
</div>

<div id="main" class="w-full h-10">
<p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_paragraph_one; ?></p>
</div>

<script>
  const button1 = document.getElementById("button1");
  const button2 = document.getElementById("button2");
  const button3 = document.getElementById("button3");
  const mainDiv = document.getElementById("main");

  button1.addEventListener("click", () => {
    const saleContent = `
    <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_paragraph_one; ?></p>
        <h3 class="text-3xl text-black pt-4 font-bold "><?php echo $residential_info_right_section_sales_title_one; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_description_one; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_sales_title_two; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_description_two; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_sales_title_three; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_sales_description_three; ?></p>
    `;
    mainDiv.innerHTML = saleContent;
  });

  button2.addEventListener("click", () => {
    const purchaseContent = `
    <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_paragraph_one; ?></p>
        <h3 class="text-3xl text-black pt-4 font-bold "><?php echo $residential_info_right_section_purchase_title_one; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_description_one; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_purchase_title_two; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_description_two; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_purchase_title_three; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_description_three; ?></p>
        <h3 class="text-3xl font-bold pt-4 text-black "><?php echo $residential_info_right_section_purchase_title_four; ?></h3>
        <p class="text-xl text-gray-900 "><?php echo $residential_info_right_section_purchase_description_four; ?></p>
    `;
    mainDiv.innerHTML = purchaseContent;
  });

  button3.addEventListener("click", () => {
    const investmentContent = `
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
    `;
    mainDiv.innerHTML = investmentContent;
  });
</script>




<script>


</script>
        

    <!-- <div class="overflow-y-scroll">
        
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
    </div>
</div> -->

    </div>
  
</div>

<?php get_footer(); ?>