<?php
/*
	Template Name: The Team
*/
get_header();
$team_page_title = get_field('team_page_title');
$team_page_description = get_field('team_page_description');

?>

<div class="h-screen w-screen mr-12 grid grid-cols-1 md:grid-cols-2 p-14 gap-8 overflow-y-scroll md:overflow-y-hidden">
        <div class="md:overflow-y-scroll hide-scroll-bar">
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
				<div class="font-medium"><?php the_title(); ?>
			</div>
			</div>
			<div class="grid grid-cols-3 gap-4">
			<?php $the_query = new WP_Query( array('post_type' =>'team','posts_per_page' => '9',  'post__not_in'   => array( $id),) );?>
							     <?php if ( have_posts())   : while ( $the_query->have_posts() ) : $the_query->the_post();?>

									   <?php
										$thumbnail_id = get_post_thumbnail_id();
										$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
										$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);

                    $categories = get_the_category();

										?>
				<div>
				<?php
				if ( has_post_thumbnail() ) {
					$attachment_image = wp_get_attachment_url( get_post_thumbnail_id() );
					//echo '<link rel="preload" as="image" href="' . esc_attr( $attachment_image ) . '">';
				?>
					<img src="<?php echo $attachment_image; ?>" alt="">
					<?php } ?>
					<div class="text-center">
						<a href="<?php the_permalink(); ?>"><h3 class="text-2xl font-bold"><?php the_title(); ?></h3></a>
						<p><?php the_excerpt(); ?></p>
					</div>
				</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
        <div class="md:overflow-y-scroll hide-scroll-bar">
            <h1 class="text-3xl font-bold"><?php echo $team_page_title; ?></h1>
			<p class="text-2xl"><?php echo $team_page_description; ?></p>
        </div>
</div>

<?php get_footer(); ?>