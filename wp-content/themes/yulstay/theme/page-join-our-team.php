<?php
/*
	Template Name: Join our Team
*/
get_header(); 

$join_our_team_page_title = get_field('join_our_team_page_title');

$join_our_team_page_description = get_field('join_our_team_page_description');

$phone_number_link = get_field('phone_number_link');
$phone_number = get_field('phone_number');
$address_link = get_field('address_link');
$address = get_field('address');
$email_link = get_field('email_link');
$email = get_field('email');

?>

<div class="relative isolate bg-white h-screen overflow-y-scroll md:overflow-y-auto">

<div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">

  <div class="relative px-6 pb-20 pt-24 sm:pt-32 lg:static lg:px-8">

    <div class="mx-auto lg:mx-0 lg:max-w-lg md:pr-12">


      <div class="md:block hidden">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/1.png" class="w-32 pb-4" alt="">
      </div>
      <div class="flex gap-3 mb-3">
				<div>
					<a href="<?php bloginfo('url'); ?>/home" class="text-black hover:text-gray-800 font-bold"><?php _e('Home','theme-text-domain'); ?></a>
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

      <h2 class="text-3xl font-bold tracking-tight text-black"><?php echo $join_our_team_page_title; ?></h2>

      <p class="mt-6 text-lg leading-8 text-black"><?php echo $join_our_team_page_description; ?></p>

      <div class="grid grid-cols-2">

        <dl class="mt-10 space-y-4 text-base leading-7 text-gray-600">

          <div class="flex gap-x-4">

            <dt class="flex-none">

              <span class="sr-only">Address</span>

              <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />

              </svg>

            </dt>

            <dd class="text-black"><?php echo $address; ?></dd>

          </div>

          <div class="flex gap-x-4">

            <dt class="flex-none">

              <span class="sr-only">Telephone</span>

              <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />

              </svg>

            </dt>

            <dd><a class="hover:text-black text-black" href="<?php echo $phone_number_link; ?>"><?php echo $phone_number; ?></a></dd>

          </div>

          <div class="flex gap-x-4">

            <dt class="flex-none">

              <span class="sr-only">Email</span>

              <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />

              </svg>

            </dt>

            <dd><a class="hover:text-gray-900 text-black" href="<?php echo $email_link; ?>"><?php echo $email; ?></a></dd>

          </div>

        </dl>

        

      </div>



    </div>

  </div>
<div class="md:overflow-y-scroll hide-scroll-bar">
  <form action="#" method="POST" class="px-6 pb-24 pt-20 lg:px-8">

    <div class="mx-auto md:mr-8">

      <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

        <div>

          <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">First name</label>

          <div class="mt-2.5">

            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">

          </div>

        </div>

        <div>

          <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Last name</label>

          <div class="mt-2.5">

            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">

          </div>

        </div>

        <div class="sm:col-span-2">

          <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>

          <div class="mt-2.5">

            <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">

          </div>

        </div>

        <div class="sm:col-span-2">

          <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900">Phone number</label>

          <div class="mt-2.5">

            <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">

          </div>

        </div>

        <div class="sm:col-span-2">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Type</label>
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Choose a Position</option>
        <option value="US">New brokers</option>
        <option value="CA">Experienced Brokers</option>
        <option value="FR">Rental expert</option>
        <option value="CA">Property Manager</option>
        <option value="FR">Administrative</option>
        </select>
        </div>

        <div class="sm:col-span-2">

          <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Message</label>

          <div class="mt-2.5">

            <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6"></textarea>

          </div>

        </div>

      </div>

      <div class="mt-8 flex justify-end">

        <button type="submit" class="text-center w-full py-3 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none">Send message</button>

      </div>

    </div>

  </form>
  </div>

</div>

</div>

<?php get_footer(); ?>