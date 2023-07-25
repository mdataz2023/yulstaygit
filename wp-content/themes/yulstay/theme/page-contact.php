<?php

/*

	Template Name: Contact Us

*/

get_header(); 



$contact_page_title = get_field('contact_page_title');

$contact_page_description = get_field('contact_page_description');

$phone_number_link = get_field('phone_number_link');
$phone_number = get_field('phone_number');
$address_link = get_field('address_link');
$address = get_field('address');
$email_link = get_field('email_link');
$email = get_field('email');

?>

<style>
  .scroll-style::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px #fff;
	background-color: #fff;
  
}

.scroll-style::-webkit-scrollbar
{
	width: 10px;
	background-color: #fff;
  border-radius: 10px;
}

.scroll-style::-webkit-scrollbar-thumb
{
  border-radius: 10px;
	background-color: #9cebf6;
	border: 2px solid #9cebf6;
}
</style>

<div class="h-screen w-screen mr-12 grid grid-cols-1 md:grid-cols-2 p-14 gap-6 bg-white">

<div>
<div class="md:block hidden">
    <a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/1.png" class="w-32 pb-4" alt=""></a>
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


  <h2 class="text-3xl font-bold tracking-tight text-gray-900"><?php echo $contact_page_title; ?></h2>

<p class="mt-6 text-lg leading-8 text-black"><?php echo $contact_page_description; ?></p>

<div class="grid grid-cols-2">

  <dl class="mt-10 space-y-4 text-base leading-7 text-black">

    <div class="flex gap-x-4">

      <dt class="flex-none">

        <span class="sr-only">Address</span>

        <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />

        </svg>

      </dt>

      <dd><?php echo $address; ?></dd>

    </div>

    <div class="flex gap-x-4">

      <dt class="flex-none">

        <span class="sr-only">Telephone</span>

        <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />

        </svg>

      </dt>

      <dd><a class="hover:text-gray-900" href="<?php echo $phone_number_link; ?>"><?php echo $phone_number; ?></a></dd>

    </div>

    <div class="flex gap-x-4">

      <dt class="flex-none">

        <span class="sr-only">Email</span>

        <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />

        </svg>

      </dt>

      <dd><a class="hover:text-gray-900" href="<?php echo $email_link; ?>"><?php echo $email; ?></a></dd>

    </div>

  </dl>

  

</div>
</div>

<div class="md:overflow-y-scroll scroll-style">
    <div class="container mx-auto p-4">
        <div class="flex border-b border-gray-300">
            <div class="cursor-pointer py-2 px-4 hover:text-[#00AEC5]" id="tab1">Residential</div>
            <div class="cursor-pointer py-2 px-4 hover:text-[#00AEC5]" id="tab2">Multi Residential</div>
            <div class="cursor-pointer py-2 px-4 hover:text-[#00AEC5]" id="tab3">Rental + Property</div>
            <div class="cursor-pointer py-2 px-4 hover:text-[#00AEC5]" id="tab4">Join our Team</div>
        </div>
        <div class="py-4" id="tabContent">
            <div class="tab-pane hidden" id="content1">
              <div class="grid grid-cols-2">
                <div class="bg-green-600">
                  <button class="w-full text-center">BTN1</button>
                </div>
                <div>
                  <button class="w-full text-center">BTN2</button>
                </div>
              </div>
            </div>
            <div class="tab-pane hidden" id="content2">Content of Tab 2</div>
            <div class="tab-pane hidden" id="content3">Content of Tab 3</div>
            <div class="tab-pane hidden" id="content4">Content of Tab 4</div>
        </div>
    </div>
</div>

<script>
        // JavaScript to handle tab switching
        const tabs = document.querySelectorAll('[id^="tab"]');
        const tabContents = document.querySelectorAll('[id^="content"]');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Hide all tab contents
                tabContents.forEach(content => content.classList.add('hidden'));

                // Remove 'bg-gray-200' class from all tabs
                tabs.forEach(t => t.classList.remove('text-[#00AEC5]'));

                // Show the selected tab content
                const tabContentId = tab.getAttribute('id').replace('tab', 'content');
                const tabContent = document.getElementById(tabContentId);
                tabContent.classList.remove('hidden');

                // Add 'bg-gray-200' class to the clicked tab
                tab.classList.add('text-[#00AEC5]');
            });
        });
    </script>

<?php get_footer(); ?>