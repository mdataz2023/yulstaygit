<?php
/*
	Template Name: Home
*/
get_header(); ?>

<div class="h-screen w-screen mr-12 flex flex-col justify-between px-6 py-14 md:p-14 text-white" onclick="openModal()">
        <video autoplay muted loop id="myVideo" class="w-full h-full object-cover">
            <source src="<?php echo get_template_directory_uri(); ?>/assets/img/Yulstay.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
          </video>
          <div>
          <div class="hidden md:block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" class="w-80" alt="">
        </div>
        <h2 class="text-5xl pt-4 font-bold">
                Investing in peace of mind
            </h2>
          </div>
        
        
        <div class="flex justify-between">
            <div>
                <a href="<?php bloginfo('url'); ?>/join-our-team" class="font-bold"><?php _e('Join Our Team','theme-text-domain'); ?></a>
            </div>
            <div class="md:pr-6">
                <a href="<?php bloginfo('url'); ?>/join-our-team" class="font-bold"><?php _e('Book a Consutation','theme-text-domain'); ?></a>
            </div>
        </div>
    </div>

<?php get_footer(); ?>