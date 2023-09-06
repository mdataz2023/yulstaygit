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

  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/site.webmanifest">
<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" /> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<style>
  .dropdown-container .ml-2 {
    opacity: 0;
    display: none;

  transition: opacity 0.3s ease, visibility 0.3s ease;
  }
  
  .dropdown-container:hover .ml-2 {
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

    <div id="myModal" class="modal z-40 transition-color duration-300" style="background-color: #fff;">
        <div class="grid grid-cols-1 md:grid-cols-4 w-screen mr-12">

        <div></div>

          <div class="col-span-2 px-6 py-14 md:p-14 h-screen flex flex-col justify-between">
            <div class="text-2xl uppercase">

              <div class="dropdown-container grid grid-cols-2">
                <div>
                  <a href="<?php bloginfo('url'); ?>/residential-info" class="text-gray-700 text-3xl hover:font-bold hover:text-[#00AEC5] hover:duration-500"><?php _e('Residential','theme-text-domain'); ?></a>
                </div>
                <div class="font-poppins">
                <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/residential-info" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Residential Info','theme-text-domain'); ?></a>
                  </div>
                  <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/residential" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Properties','theme-text-domain'); ?></a>
                  </div>
                  <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/residential-team" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Team','theme-text-domain'); ?></a>
                  </div>
                  
                </div>
                </div>

                <div class="dropdown-container grid grid-cols-2">
                <div class="mt-2">
                  <a href="<?php bloginfo('url'); ?>/multi-residential-info" class="text-gray-700 text-3xl hover:font-bold hover:text-[#00AEC5]"><?php _e('Multi-Residential','theme-text-domain'); ?></a>
                </div>
                <div class="font-poppins">
                <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/multi-residential-info" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Multi-Residential Info','theme-text-domain'); ?></a>
                  </div>
                <div class="ml-2">
                  <a href="<?php bloginfo('url'); ?>/multi-residential" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Properties','theme-text-domain'); ?></a>
                </div>
                <div class="ml-2">
                  <a href="<?php bloginfo('url'); ?>/multi-residential-team" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Team','theme-text-domain'); ?></a>
                </div>
                
                </div>
                </div>

                <div class="dropdown-container grid grid-cols-2">
                  <div class="mt-2">
                    <a href="<?php bloginfo('url'); ?>/rental-property-info" class="text-gray-700 text-3xl hover:font-bold hover:text-[#00AEC5]"><?php _e('Rental + Property','theme-text-domain'); ?></a>
                  </div>
                  <div class="font-poppins">
                  <div class="ml-2">
                    <a href="<?php bloginfo('url'); ?>/rental-property-info" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Rental + Property Info','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/rental-property" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Properties','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/rental-property-team" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Team','theme-text-domain'); ?></a>
                    </div>
                    
                  </div>
                </div>
                
                <div class="dropdown-container grid grid-cols-2">
                  <div class="mt-2">
                    <a href="#" class="text-gray-700 text-3xl hover:font-bold hover:text-[#00AEC5]">Yulstay +</a>
                  </div>
                  <div class="font-poppins">
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/events-collaboration" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Events & Collaboration','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/podcasts" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Podcasts','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/building-history" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Building History','theme-text-domain'); ?></a>
                    </div>
                    <div class="ml-2">
                      <a href="<?php bloginfo('url'); ?>/join-our-team" class="text-gray-600 hover:font-bold hover:text-[#00AEC5]"><?php _e('Join the Team','theme-text-domain'); ?></a>
                    </div>
                  </div>
                </div>

                <div class="mt-2">
                  <a href="<?php bloginfo('url'); ?>/new-construction" class="text-gray-700 text-3xl hover:font-bold hover:text-[#00AEC5]"><?php _e('New Construction','theme-text-domain'); ?></a>
                </div>
                <div class="mt-2">
                  <a href="<?php bloginfo('url'); ?>/contact-us" class="text-gray-700 text-3xl hover:font-bold hover:text-[#00AEC5]"><?php _e('Contact Us','theme-text-domain'); ?></a>
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
            
            <div class="px-6 py-14 md:px-14 md:py-5 h-screen flex flex-col justify-between">
            <div>
                  <!-- <div id="language-switcher" class="py-2">
                    <ul class="flex justify-end">
                      <li>
                        <?php do_action('wpml_add_language_selector'); ?>
                      </li>
                    </ul>
                  </div> -->
                  <div class="flex justify-end">
                    
                  </div>
                  
                  <div class="flex flex-row gap-5 justify-end pr-4">
                    <a href="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#00AEC5" class="bi bi-facebook" viewBox="0 0 16 16">
                                   <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                   </svg>
                    </a>
                    <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#00AEC5" class="bi bi-instagram" viewBox="0 0 16 16">
                                   <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                   </svg>
                    </a>
                    <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#00AEC5" class="bi bi-linkedin" viewBox="0 0 16 16">
                                   <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                   </svg>
                    </a>
                    <div>
                      <!-- <?php
                      if (has_nav_menu('main-menu')) {
                          wp_nav_menu(
                              array(
                                  'theme_location' => 'main-menu',
                                  'menu_class'     => 'main-menu', 
                              )
                          );
                      }
                      ?> -->
                          <div class="flex items-center space-x-2">
                            <?php if ($lang == 'si-SL') : ?>
                                <span class="text-blue-500">සිංහල</span>
                                <span class="text-gray-400">|</span>
                                <a href="?lang=en-US" class="cursor-pointer transition duration-300 ease-in-out hover:text-blue-500">English</a>
                            <?php elseif ($lang == 'en-US') : ?>
                                <a href="?lang=si-SL" class="cursor-pointer transition duration-300 ease-in-out hover:text-blue-500">සිංහල</a>
                                <span class="text-gray-400">|</span>
                                <span class="text-blue-500">English</span> 
                            <?php else : ?>
                                <a href="?lang=si-SL" class="cursor-pointer transition duration-300 ease-in-out hover:text-blue-500">සිංහල</a>
                                <span class="text-gray-400">|</span>
                                <a href="?lang=en-US" class="cursor-pointer transition duration-300 ease-in-out hover:text-blue-500">English</a>
                            <?php endif; ?>
                        </div>
                    </div>
                  </div>
            </div>
           
              <div class="flex justify-end">
                <a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/1.png" class="w-44 pb-4" alt=""></a>
              </div>
              
            </div>
        </div>
    </div>
    <!-- Nav ending -->
