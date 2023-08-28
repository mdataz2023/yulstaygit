<?php
/*
	Template Name: Multi Residential contact
*/
get_header(); 
$team_page_title = get_field('team_page_title');
$team_page_description = get_field('team_page_description');

?>

<div class="grid w-screen h-screen grid-cols-1 gap-8 mr-12 overflow-y-scroll md:grid-cols-2 p-14 md:overflow-y-hidden">
        <div class="md:overflow-y-scroll hide-scroll-bar">
        <div class="hidden md:block">
          <a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/1.png" class="w-32 pb-4" alt=""></a>
          </div>
			<div class="flex gap-3 mb-3">
				<div>
					<a href="<?php bloginfo('url'); ?>/home" class="font-bold text-gray-400 hover:text-gray-800"><?php _e('Home','theme-text-domain'); ?></a>
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
			<h2 class="text-3xl font-bold tracking-tight text-gray-900">Get in Touch</h2>

<p class="mt-6 text-lg leading-8 text-black">Through our relationship in the industry and our volume of transactions, we are happy to have access to many new construction projects. This allows us to offer many benefits to any of our clients looking to purchase or invest in new co</p>

<div class="grid grid-cols-1">

  <dl class="mt-10 space-y-4 text-base leading-7 text-black">

    <div class="flex gap-x-4 hover:animate-bounce">

      <dt class="flex-none">

        <span class="sr-only">Address</span>

        <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />

        </svg>

      </dt>

      <dd>
686 St-Paul O. Montreal Quebec H3C 1M4</dd>

    </div>

    <div class="flex gap-x-4 hover:animate-bounce">

      <dt class="flex-none">

        <span class="sr-only">Telephone</span>

        <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />

        </svg>

      </dt>

      <dd><a class="hover:text-gray-900" href="tel:<?php echo $phone_number_link; ?>">514.961.7663</a></dd>

    </div>

    <div class="flex gap-x-4 hover:animate-bounce">

      <dt class="flex-none">

        <span class="sr-only">Email</span>

        <svg class="h-7 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">

          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />

        </svg>

      </dt>

      <dd><a class="hover:text-gray-900" href="mailto:<?php echo $email_link; ?>">admin@yulstay.com</a></dd>

    </div>

  </dl>

  

</div>
</div>


        <div class="md:overflow-y-scroll hide-scroll-bar">
        <div>
        <!-- <h2 class="font-poppins font-medium text-base pb-1 text-justify">Yulstay is your one-stop-shop for all your real estate needs in Montreal. We offer a comprehensive range of strategic advice and services that cover everything from purchasing, financing, managing, selling and optimizing your multiresidential properties.</h2>

<h2 class="font-poppins font-medium text-base pb-1 text-justify">We serve a broad range of investors from all corners of the globe, and our team manages the investments of over 100 real estate investors worldwide. With Yulstay, you can rest assured that your real estate investments in Montreal are in the best possible hands.</h2>

<h2 class="font-poppins font-medium text-base pb-1 text-justify">Our team has consistently ranked in the top producers nationwide and continues to deliver its promises of peace of mind, transparency and results. Do not hesitate to book a consultation to discuss how we can help you maximize your investments.</h2> -->
        </div>


<div class="mx-auto md:mr-8"></div>

<div class="grid grid-cols-1">

<div class="grid grid-cols-2 gap-1">
<div>
  <button id="button11" class="w-full px-4 py-2 mb-4 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold">PURCHASE</button>
</div>
<div>
  <button id="button22" class="w-full px-4 py-2 mb-4 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold">SALE</button>
</div>
</div>

<div id="main1" class="w-full h-10">

</div>

<script>
const button11 = document.getElementById("button11");
const button22 = document.getElementById("button22");
const mainDiv1 = document.getElementById("main1");

button11.addEventListener("click", () => {
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
                <input id="email" name="notification-method" type="radio" checked class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                <label for="email" class="block ml-3 text-sm font-medium leading-6 text-gray-900">Yes</label>
              </div>
              <div class="flex items-center">
                <input id="sms" name="notification-method" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                <label for="sms" class="block ml-3 text-sm font-medium leading-6 text-gray-900">NO</label>
              </div>
            </div>
          </fieldset>
        </div>
 
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Down payment available</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Down payment available">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Doors owned</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Doors owned">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Minimum doors to acquire</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Minimum doors to acquire">

      </div>

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Name</label>

      

<input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your name">



<label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Email</label>



<input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your email">



<label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Phone number</label>



<input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your phone number">


<div class="flex justify-end mt-8">

<button type="submit" class="rounded-full bg-[#00AEC5] px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send message</button>

</div>
      
    </form>
    <!-- Form Purchase -->
  </div>
  `;
  mainDiv1.innerHTML = saleContent;
});

button22.addEventListener("click", () => {
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
                <input id="email" name="notification-method" type="radio" checked class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                <label for="email" class="block ml-3 text-sm font-medium leading-6 text-gray-900">Yes</label>
              </div>
              <div class="flex items-center">
                <input id="sms" name="notification-method" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                <label for="sms" class="block ml-3 text-sm font-medium leading-6 text-gray-900">NO</label>
              </div>
            </div>
          </fieldset>
        </div>
    
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Address</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Address">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Doors</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Doors">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Gross revenue</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Gross revenue">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Taxes</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Taxes">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Hydro</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Hydro">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Heating</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Heating">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Insurance</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Insurance">

      </div>

      

    

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Name</label>

      

        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your name">

      

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Email</label>

      

        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your email">

      

      <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Phone number</label>

      

        <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your phone number">


    <div class="flex justify-end mt-8">

      <button type="submit" class="rounded-full bg-[#00AEC5] px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send message</button>

    </div>
    </form>
    <!-- Form Sale -->
  </div>
  `;
  mainDiv1.innerHTML = purchaseContent;
});
</script>


        </div>
</div>

<?php get_footer(); ?>