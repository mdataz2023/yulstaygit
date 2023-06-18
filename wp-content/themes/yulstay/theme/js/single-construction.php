<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yulstay
 */

get_header();

$image_one = get_field('image_one');
$image_two = get_field('image_two');
$image_three = get_field('image_three');

?>

<div class="h-screen w-screen mr-12 grid grid-cols-12 p-14 gap-4">
    <div class="col-span-5">
        <?php echo get_the_title(); ?>

        <img src="https://cadonit.com/yulstay/wp-content/uploads/2023/06/plus.png"/>
    </div>
    <div class="col-span-1">

    </div>
    <div class="col-span-6 col-scroll">
        <img src="<?php echo $image_one; ?>" alt="">
        <img src="<?php echo $image_two; ?>" alt="">
        <img src="<?php echo $image_three; ?>" alt="">
    </div>
</div>
</div>


<?php
get_footer();