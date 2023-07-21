<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yulstay
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href="<?php echo get_template_directory_uri(); ?>/dist/output.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" /> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<style>
  .dropdown-container .ml-20 {
    opacity: 0;
    display: none;

  transition: opacity 0.3s ease, visibility 0.3s ease;
  }
  
  .dropdown-container:hover .ml-20 {
    opacity: 1;
    display: block;
  }

</style>
    <script>
        var modal = document.getElementById("myModal");
        
        var btn = document.getElementById("MD_OPEN_BTN");
        
        var span = document.getElementsByClassName("close")[0];
        
        function openModal() {
             document.getElementById("myModal").style.display = "block";
             document.getElementById("logoIcon").style.display = "none";
             document.getElementById("xIcon").style.display = "block";
        }
        
        function cancelModal() {
             document.getElementById("myModal").style.display = "none";
             document.getElementById("logoIcon").style.display = "block";
             document.getElementById("xIcon").style.display = "none";
        }
        
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
    <nav class="h-12 w-screen md:w-12 md:h-screen right-0 fixed opacity-100 md:bg-white border-l border-gray-500 z-50 flex justify-between md:items-center md:content-between">
       <div class="md:hidden mx-6">
        <a href="<?php bloginfo('url'); ?>/home">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" class="h-11" alt="">
        </a>
       </div>

       <div class="" >
            <img id="logoIcon" onclick="openModal()" class="w-12 h-auto" src="<?php echo get_template_directory_uri(); ?>/assets/img/menu_icon.png" alt="">
            <svg id="xIcon" onclick="cancelModal()" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-x-lg transitionCS7 mt-auto w-12 h-auto" viewBox="0 0 16 16">
            <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
            </svg>
       </div>
    </nav>

    <div id="myModal" class="modal z-40" style="background-color: #fff;">
        <div class="grid grid-cols-1 md:grid-cols-2 w-screen mr-12">
          <div class="px-6 py-14 md:p-14 h-screen flex flex-col justify-between">
            <div class="text-2xl uppercase">

              <div class="dropdown-container grid grid-cols-2">
                <div>
                  <a href="<?php bloginfo('url'); ?>/residential-info" class="text-gray-700 text-3xl hover:font-bold"><?php _e('Residential','theme-text-domain'); ?></a>
                </div>
                <div>
                  <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/residential" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Properties','theme-text-domain'); ?></a>
                  </div>
                  <div class="ml-20">
                    <a href="<?php bloginfo('url'); ?>/residential-team" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Team','theme-text-domain'); ?></a>
                  </div>
                  <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/residential-info" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Residential Info','theme-text-domain'); ?></a>
                  </div>
                </div>
                </div>

                <div class="dropdown-container grid grid-cols-2">
                <div class="mt-2">
                  <a href="<?php bloginfo('url'); ?>/multi-residential-info" class="text-gray-700 text-3xl hover:font-bold"><?php _e('Multi-Residential','theme-text-domain'); ?></a>
                </div>
                <div>
                <div class="ml-2">
                  <a href="<?php bloginfo('url'); ?>/multi-residential" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Properties','theme-text-domain'); ?></a>
                </div>
                <div class="ml-2">
                  <a href="<?php bloginfo('url'); ?>/multi-residential-team" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Team','theme-text-domain'); ?></a>
                </div>
                <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/multi-residential-info" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Multi-Residential Info','theme-text-domain'); ?></a>
                  </div>
                </div>
                </div>

                <div class="dropdown-container grid grid-cols-2">
                  <div class="mt-2">
                    <a href="<?php bloginfo('url'); ?>/rental-property-info" class="text-gray-700 text-3xl hover:font-bold"><?php _e('Rental + Property','theme-text-domain'); ?></a>
                  </div>
                  <div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/rental-property" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Properties','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/rental-property-team" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Team','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/rental-property-info" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Rental + Property Info','theme-text-domain'); ?></a>
                    </div>
                  </div>
                </div>
                
                <div class="dropdown-container grid grid-cols-2">
                  <div class="mt-2">
                    <a href="#" class="text-gray-700 text-3xl hover:font-bold">Yulstay +</a>
                  </div>
                  <div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/events-collaboration" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Events & Collaboration','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/podcasts" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Podcasts','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/building-history" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Building History','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/join-our-team" class="text-gray-600 link link-underline link-underline-black hover:font-bold"><?php _e('Join the Team','theme-text-domain'); ?></a>
                    </div>
                  </div>
                </div>

                <div class="mt-2">
                  <a href="<?php bloginfo('url'); ?>/new-construction" class="text-gray-700 text-3xl link link-underline link-underline-black hover:font-bold"><?php _e('New Construction','theme-text-domain'); ?></a>
                </div>
                <div class="mt-2">
                  <a href="<?php bloginfo('url'); ?>/contact-us" class="text-gray-700 text-3xl link link-underline link-underline-black hover:font-bold"><?php _e('Contact Us','theme-text-domain'); ?></a>
                </div>
                
                
          </div>
          
                    <div>
                    
                    <div>
                    <h2 class="text-xl"><?php _e('SUBSCRIBE TO OUR NEWSLETTER','theme-text-domain'); ?></h2>
                    <div class="flex gap-4 border-b border-black pt-5">
                      <input type="email" name="" placeholder="Email address" class="w-full bg-[#fff] outline-none" id="">
                      <input type="submit" value="<?php _e('Join','theme-text-domain'); ?>" class="hover:font-black">
                    </div>
                  </div>
                    </div>
            
          </div>
            
            <div class="px-6 py-14 md:p-14 h-screen flex flex-col justify-between">
            
            <div id="language-switcher" class="py-2">
                    <ul class="flex justify-end">
                      <li>
                        <?php do_action('wpml_add_language_selector'); ?>
                      </li>
                    </ul>
                  </div>
              <div class="flex justify-end">
                <a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/1.png" class="w-44 pb-4" alt=""></a>
              </div>
              
            </div>
        </div>
    </div>
    <!-- Nav ending -->
