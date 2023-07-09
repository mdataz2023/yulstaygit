<?php
/*
	Template Name: Multi Residential Team
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
    <?php
    $ids_to_display = array(114, 116, 123); // IDs of the posts you want to display

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
                <?php
                if (has_post_thumbnail()) {
                    $attachment_image = wp_get_attachment_url($thumbnail_id);
                    //echo '<link rel="preload" as="image" href="' . esc_attr($attachment_image) . '">';
                ?>
                    <img src="<?php echo $attachment_image; ?>" alt="">
                <?php } ?>
                <div class="text-center">
                    <a href="<?php the_permalink(); ?>"><h3 class="text-2xl font-bold"><?php the_title(); ?></h3></a>
                    <p><?php the_excerpt(); ?></p>
                </div>
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
        <div class="md:overflow-y-scroll hide-scroll-bar">



<div class="mx-auto md:mr-8"></div>

<div class="grid grid-cols-1">

<div class="grid grid-cols-2 gap-1">
<div>
  <button id="button1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 w-full">PURCHASE</button>
</div>
<div>
  <button id="button2" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 w-full">SALE</button>
</div>
</div>

<div id="main" class="w-full h-10">
Default content
</div>

<script>
const button1 = document.getElementById("button1");
const button2 = document.getElementById("button2");
const mainDiv = document.getElementById("main");

button1.addEventListener("click", () => {
  const saleContent = `
  <div>
        <div class="font-bold my-3 text-lg">Purchase</div>
        <!-- Form Purchase -->
      <form action="#" method="POST" class="pb-24  sm:pb-32">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Type</label>
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Choose a type</option>
        <option value="US">Condo</option>
        <option value="CA">House</option>
        <option value="FR">Plex</option>
        </select>

      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Pre-approval</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Area</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Budget</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bedrooms</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bathrooms</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Garages</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Other</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>

      

    

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Name</label>

      

        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5">

      

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Email</label>

      

        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5">

      

      <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Phone number</label>

      

        <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5">


    <div class="mt-8 flex justify-end">

      <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send message</button>

    </div>
    </form>
    <!-- Form Purchase -->
  </div>
  `;
  mainDiv.innerHTML = saleContent;
});

button2.addEventListener("click", () => {
  const purchaseContent = `
  <div>
        <div class="font-bold my-3 text-lg">Sales</div>
        <!-- Form Sale -->
      <form action="#" method="POST" class="pb-24  sm:pb-32">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Type</label>
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Choose a type</option>
        <option value="US">Condo</option>
        <option value="CA">House</option>
        <option value="FR">Plex</option>
        </select>

      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Pre-approval</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Area</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Budget</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bedrooms</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bathrooms</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Garages</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Other</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      </div>

      

    

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Name</label>

      

        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5">

      

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Email</label>

      

        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5">

      

      <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Phone number</label>

      

        <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5">


    <div class="mt-8 flex justify-end">

      <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send message</button>

    </div>
    </form>
    <!-- Form Sale -->
  </div>
  `;
  mainDiv.innerHTML = purchaseContent;
});
</script>


        </div>
</div>

<?php get_footer(); ?>