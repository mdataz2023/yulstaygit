<?php

/*

	Template Name: New Construction

*/

get_header(); ?>



<div class="h-screen w-screen mr-12 grid grid-cols-1 md:grid-cols-2 p-14 gap-6 bg-white">

    <div class="md:grid-cols-6">

        <div>
        <div class="md:block hidden">
        <a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/10.png" class="w-32 pb-4" alt=""></a>
          </div>
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
        </div>

        <div>



            <?php $the_query = new WP_Query( array('post_type' =>'construction','posts_per_page' => '10',  'post__not_in'   => array( $id),) );?>

            <?php if ( have_posts())   : while ( $the_query->have_posts() ) : $the_query->the_post();?>



            <?php

										$thumbnail_id = get_post_thumbnail_id();

										$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );

										$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);



                    $categories = get_the_category();

                    ?>

            

            <?php

                                        if ( has_post_thumbnail() ) {

    $attachment_image = wp_get_attachment_url( get_post_thumbnail_id() );

    //echo '<link rel="preload" as="image" href="' . esc_attr( $attachment_image ) . '">';

?>
            <img src="<?php echo $attachment_image; ?>" alt="" style="width: 100%;
             object-fit: cover;
             opacity:0;
             position: absolute;
             top: 35%;
             filter: grayscale(70%);    left: 10%;
             width: 30%;" class="transitionCS7 image<?php echo $thumbnail_id ;?>">
            <?php } ?>
            <?php endwhile; endif; ?>

        </div>

    </div>

    <div class="col-scroll">

        <div class="text-black">




            <div class="text-black font-poppins font-medium text-base">

                <h1>Through our relationship in the industry and our volume of transactions, we

                    are happy to have access to many new construction projects. This allows us to offer many benefits to
                    any of our

                    clients looking to purchase or invest in new constructions.</h1>

            </div>



            <div class="mt-5">

                <?php $the_query = new WP_Query( array('post_type' =>'construction','posts_per_page' => '10',  'post__not_in'   => array( $id),) );?>

                <?php
                if ( have_posts())   : while ( $the_query->have_posts() ) : $the_query->the_post();?>



                <?php

										$thumbnail_id = get_post_thumbnail_id();

										$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );

										$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);



                    $categories = get_the_category();



										?>

                <div onmouseover="constructionMouseOver('image<?php echo $thumbnail_id;?>')"
                    onmouseout="constructionMouseOut('image<?php echo $thumbnail_id;?>')">

                    <a href="<?php the_permalink(); ?>">

                        <div class="text-5xl text-gray-500 my-4 font-poppins hover:text-black transitionCS">
                            <h2 class="font-poppins"><?php the_title(); ?></h2>
                            <div class="text-uppercase font-poppins text-xl">montreal,ca
                            </div>
                        </div>
                    </a>
                </div>

                <?php
               endwhile; endif; ?>

            </div>

        </div>



    </div>

</div>

</div>


<script>
function constructionMouseOver(name) {
    document.querySelectorAll('.' + name).forEach(function(classNames) {
        classNames.style.opacity = 1;
    });
}

function constructionMouseOut(name) {
    document.querySelectorAll('.' + name).forEach(function(classNames) {
        classNames.style.opacity = 0;
    });
}
</script>
<?php get_footer(); ?>