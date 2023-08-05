<?php
/*
	Template Name: Residential Team
*/
get_header();
$team_page_title = get_field('team_page_title');
$team_page_description = get_field('team_page_description');

print_r("<h1>"."/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/ADDENDA.TXT"."</h1>");
$addendaFile = file_get_contents( "/home/customer/www/mdataz.com/public_html/yulstaygit/listing-files/ADDENDA.TXT");
print_r(site_url()."/listing-files/ADDENDA.TXT" );
$pattern = "/[\n]/";
$catch = preg_split($pattern, $addendaFile);

foreach($catch as $value)
{
   $replaceValue= str_replace('"',"",$value);
  $valueExplode=explode(",",$replaceValue);
    global $wpdb;
    $tablename =  'addenda';
    if(count($wpdb->get_results("SELECT * FROM addenda WHERE NO_INSCRIPTION = '".$valueExplode[0]."'", OBJECT ))==0){
      $wpdb->insert( $tablename, array(
          'NO_INSCRIPTION' =>$valueExplode[0],
          'NO_ADDENDA' =>$valueExplode[1],
          'CODE_LANGUE' =>$valueExplode[2],
          'ORDRE_AFFICHAGE' =>$valueExplode[3],
          'CHAMP_INUTILISE_1' =>$valueExplode[4],
          'CHAMP_INUTILISE_2' =>$valueExplode[5],
          'TEXTE' =>$valueExplode[6]
          )
        );
    }
}

$bureauxFile = file_get_contents(site_url()."/listing-files/BUREAUX.TXT");
$bureauxResult = preg_split($pattern, $bureauxFile);
foreach($bureauxResult as $value)
{
    $replaceValue= str_replace('"',"",$value);
    $valueExplode=explode(",",$replaceValue);
    if(count($wpdb->get_results("SELECT * FROM bureaux WHERE CODE = '".$valueExplode[0]."'", OBJECT ))==0){
      $wpdb->insert('bureaux', array(
          'CODE' =>$valueExplode[0],
          'FIRME_CODE' =>$valueExplode[1],
          'NOM_LEGAL' =>$valueExplode[2],
          'NO_CIVIQUE' =>$valueExplode[3],
          'NOM_RUE' =>$valueExplode[4],
          'BUREAU' =>$valueExplode[5],
          'MUNICIPALITE' =>$valueExplode[6],
          'PROVINCE' =>$valueExplode[7],
          'CODE_POSTAL' =>$valueExplode[8],
          'TELEPHONE_1' =>$valueExplode[9],
          'TELEPHONE_2' =>$valueExplode[10],
          'POSTE_2' =>$valueExplode[11],
          'TELEPHONE_FAX' =>$valueExplode[12],
          'COURRIEL' =>$valueExplode[14],
          'SITE_WEB' =>$valueExplode[15],
          'DIRECTEUR_CODE' =>$valueExplode[16],
          'URL_LOGO_BUREAU' =>$valueExplode[17]
          )
        );

    }
}
$caracteristiquesFile = file_get_contents(site_url()."/listing-files/CARACTERISTIQUES.TXT");
$caracteristiquesResult = preg_split($pattern, $caracteristiquesFile);
foreach($caracteristiquesResult as $value)
{
    $replaceValue= str_replace('"',"",$value);
    $valueExplode=explode(",",$replaceValue);
    if(count($wpdb->get_results("SELECT * FROM caracteristiques WHERE NO_INSCRIPTION = '".$valueExplode[0]."' and TCAR_CODE = '".$valueExplode[1]."' and SCARAC_CODE = '".$valueExplode[2]."'", OBJECT ))==0){
      $wpdb->insert('caracteristiques', array(
          'NO_INSCRIPTION' =>$valueExplode[0],
          'TCAR_CODE' =>$valueExplode[1],
          'SCARAC_CODE' =>$valueExplode[2],
          'NOMBRE' =>$valueExplode[3],
          'INFORMATIONS_FRANCAISES' =>$valueExplode[4],
          'INFORMATIONS_ANGLAISES' =>$valueExplode[5],
          'MONTANT' =>$valueExplode[6]
          )
        );
    }
}
?>
<style>
.scroll-style::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px #fff;
    background-color: #fff;

}

.scroll-style::-webkit-scrollbar {
    width: 10px;
    background-color: #fff;
    border-radius: 10px;
}

.scroll-style::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color: #9cebf6;
    border: 2px solid #9cebf6;
}
</style>

<div
    class="grid w-screen h-screen grid-cols-1 gap-8 mr-12 overflow-y-scroll md:grid-cols-2 px-6 md:px-14 pt-24 py-5 md:py-5 md:overflow-y-hidden scroll-style">
    <!-- copy -->
    <div class="md:overflow-y-scroll scroll-style order-last">


        <div class="grid grid-cols-2 md:grid-cols-2 gap-4 pb-12">
            <?php
    $ids_to_display = array(426, 123, 121, 119, 116, 114); // IDs of the posts you want to display114, 116, 119, 121, 123, 426

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

            <div class="hover:bg-gray-400 p-2">
                <a href="<?php the_permalink(); ?>">
                    <?php
                if (has_post_thumbnail()) {
                    $attachment_image = wp_get_attachment_url($thumbnail_id);
                    //echo '<link rel="preload" as="image" href="' . esc_attr($attachment_image) . '">';
                ?>
                    <img src="<?php echo $attachment_image; ?>" alt="">
                    <?php } ?>
                    <div class="text-center">
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="text-2xl font-medium hover:font-bold"><?php the_title(); ?></h3>
                        </a>
                        <p><?php the_excerpt(); ?></p>
                    </div>
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
    <div class="md:overflow-y-scroll scroll-style order-first">
        <div class="hidden md:block">
            <a href="<?php bloginfo('url'); ?>/home"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/1.png" class="w-32 pb-4" alt=""></a>
        </div>
        <div>
            <div class="flex gap-3 mb-3">
                <div>
                    <a href="<?php bloginfo('url'); ?>/home"
                        class="font-bold text-gray-400 hover:text-gray-800"><?php _e('Home','theme-text-domain'); ?></a>
                </div>

                <div class="flex items-center content-between">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                    </div>
                </div>
                <div class="font-medium"><?php the_title(); ?>
                </div>
            </div>


        </div>


        <div class="mx-auto md:mr-8">

            <div class="grid grid-cols-1">
                <h2 class="font-poppins font-medium text-base pb-1 text-justify pt-4">Yulstay is your one-stop-shop for
                    all your real estate needs in Montreal. We offer a comprehensive range of strategic advice and
                    services that cover everything from purchasing, financing, managing, selling and optimizing your
                    multiresidential properties.</h2>

                <h2 class="font-poppins font-medium text-base pb-1 text-justify">We serve a broad range of investors
                    from all corners of the globe, and our team manages the investments of over 100 real estate
                    investors worldwide. With Yulstay, you can rest assured that your real estate investments in
                    Montreal are in the best possible hands.</h2>

                <h2 class="font-poppins font-medium text-base pb-1 text-justify">Our team has consistently ranked in the
                    top producers nationwide and continues to deliver its promises of peace of mind, transparency and
                    results. Do not hesitate to book a consultation to discuss how we can help you maximize your
                    investments.</h2>

                <div class="grid grid-cols-2 gap-1 pt-4">
                    <div>
                        <button id="button1"
                            class="w-full px-4 py-2 mb-4 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold transition-colors duration-300">PURCHASE</button>
                    </div>
                    <div>
                        <button id="button2"
                            class="w-full px-4 py-2 mb-4 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold transition-colors duration-300">SALE</button>
                    </div>
                </div>

                <div id="main" class="w-full h-10">

                </div>

                <script>
                const button1 = document.getElementById("button1");
                const button2 = document.getElementById("button2");
                const mainDiv = document.getElementById("main");

                button1.addEventListener("click", () => {
                    const saleContent = `
    <div>


          <div class="my-3 text-lg font-bold">Purchase</div>
          <!-- Form Purchase -->
        <form action="#" method="POST" class="pb-24 sm:pb-32">

        <div>
          <label class="text-base font-semibold text-gray-900">Invesment</label>
          <p class="text-sm text-gray-500">Are you going to make a Invesment?</p>
          <fieldset class="mt-4 ml-2">
            <legend class="sr-only">Notification method</legend>
            <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
              <div class="flex items-center">
                <input id="email" name="notification-method" type="radio" checked class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-[#00AEC5]">
                <label for="email" class="block ml-3 text-sm font-medium leading-6 text-gray-900">Yes</label>
              </div>
              <div class="flex items-center">
                <input id="sms" name="notification-method" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-[#00AEC5]">
                <label for="sms" class="block ml-3 text-sm font-medium leading-6 text-gray-900">NO</label>
              </div>
            </div>
          </fieldset>
        </div>

          <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 mt-2.5">Type</label>
          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected>Choose a type</option>
          <option value="US">Condo</option>
          <option value="CA">House</option>
          <option value="FR">Plex</option>
          </select>

        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Pre-approval</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Pre-approval">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Area</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Enter Area">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Budget</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Enter Budget">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bedrooms</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Enter Number of Bedrooms">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bathrooms</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Enter Number of Number of Bathrooms" >

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Garages</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Enter Number of Number of Bathrooms">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Other</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Other">

        </div>





        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Name</label>



          <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your name">



        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Email</label>



          <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your Email">



        <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Phone number</label>



          <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your phone number ">


      <div class="flex justify-end mt-8">

        <button type="submit" class="bg-[#00AEC5] px-3.5 py-2.5 text-center rounded-full text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send message</button>

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
          <div class="my-3 text-lg font-bold">Sales</div>
          <!-- Form Sale -->
        <form action="#" method="POST" class="pb-24 sm:pb-32">

        <div>
          <label class="text-base font-semibold text-gray-900">Invesment</label>
          <p class="text-sm text-gray-500">Are you going to make a Invesment?</p>
          <fieldset class="mt-4 ml-2">
            <legend class="sr-only">Notification method</legend>
            <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
              <div class="flex items-center">
                <input id="email" name="notification-method" type="radio" checked class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-[#00AEC5]">
                <label for="email" class="block ml-3 text-sm font-medium leading-6 text-gray-900">Yes</label>
              </div>
              <div class="flex items-center">
                <input id="sms" name="notification-method" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-[#00AEC5]">
                <label for="sms" class="block ml-3 text-sm font-medium leading-6 text-gray-900">NO</label>
              </div>
            </div>
          </fieldset>
        </div>


        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Pre-approval</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Pre-approval">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Area</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Area ">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Budget</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Budget ">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bedrooms</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Enter Number of Bedrooms ">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bathrooms</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Enter Number of Bathrooms ">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Garages</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Enter Number of Garages ">

        </div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Other</label>

        <div class="mt-2.5">

          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6" placeholder="Other ">

        </div>





        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Name</label>



          <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your name ">



        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Email</label>



          <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your Email ">



        <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Phone number</label>



          <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your phone number ">


      <div class="flex justify-end mt-8">

        <button type="submit" class="rounded-full bg-[#00AEC5] px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send message</button>

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
    </div>


    <?php get_footer(); ?>