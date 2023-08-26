<?php
/*
	Template Name: Multi Residential Team
*/
get_header(); 
$team_page_title = get_field('team_page_title');
$team_page_description = get_field('team_page_description');

?>


<div class="w-screen h-screen overflow-y-scroll scroll-style">
  <div class="max-w-7xl mx-auto pr-12 pt-12 pb-16">
        <div class="w-2/3">
            <h1 class="text-4xl font-poppins mb-4">Residential Team</h1>
            <p>Yulstay is your one-stop-shop for all your real estate needs in Montreal. We offer a comprehensive range of strategic advice and services that cover everything from purchasing, financing, managing, selling and optimizing your multiresidential properties.</p>
            <p>We serve a broad range of investors from all corners of the globe, and our team manages the investments of over 100 real estate investors worldwide. With Yulstay, you can rest assured that your real estate investments in Montreal are in the best possible hands.</p>
            <p>Our team has consistently ranked in the top producers nationwide and continues to deliver its promises of peace of mind, transparency and results. Do not hesitate to book a consultation to discuss how we can help you maximize your investments.</p>
        </div>

        <div class="grid grid-cols-4 gap-4 mt-12">
        <?php
    $ids_to_display = array(123, 116, 114); // IDs of the posts you want to display114, 116, 123

    $the_query = new WP_Query(array(
        'post_type' => 'team',
        'post__in' => $ids_to_display,
        'posts_per_page' => count($ids_to_display),
    ));

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
            $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

            $categories = get_the_category();
            ?>
            <div>
                <a href="<?php the_permalink(); ?>">
                <?php
                if (has_post_thumbnail()) {
                    $attachment_image = wp_get_attachment_url($thumbnail_id);
                    //echo '<link rel="preload" as="image" href="' . esc_attr($attachment_image) . '">';
                ?>
                <img src="<?php echo $attachment_image; ?>" alt="">
                <?php } ?>
                <h2 class="text-lg mt-2"><?php the_title(); ?></h2>
                <span class="text-sm"><?php the_excerpt(); ?></span>
                </a>
            </div>
            <?php
                }
            } else {
                echo 'No posts found.';
            }

            wp_reset_postdata();
            ?>
        </div>
    </div>
  </div>
<?php get_footer(); ?>