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

<div class="grid grid-cols-1">

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
<style>
        /* Style for the active tab button */
        .w3-button.active {
          color:#00AEC5;
        }
      </style>
      
      <div class="w3-bar w3-black flex justify-around mb-7 border-b border-gray-500 pb-6">
        <button class="w3-bar-item w3-button hover:text-[#00AEC5]" onclick="openCity('London')">London</button>
        <button class="w3-bar-item w3-button hover:text-[#00AEC5]" onclick="openCity('Paris')">Paris</button>
        <button class="w3-bar-item w3-button hover:text-[#00AEC5]" onclick="openCity('Tokyo')">Tokyo</button>
        <button class="w3-bar-item w3-button hover:text-[#00AEC5]" onclick="openCity('NewYork')">New York</button>
      </div>
      
      <div id="London" class="w3-container city" style="display:none">
      <div class="grid grid-cols-2 gap-1">
  <div>
    <button id="button1" class="w-full px-4 py-2 mb-4 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold transition-colors duration-300">PURCHASE</button>
  </div>
  <div>
    <button id="button2" class="w-full px-4 py-2 mb-4 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold transition-colors duration-300">SALE</button>
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
      
      <div id="Paris" class="w3-container city" style="display:none">
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
      
      <div id="Tokyo" class="w3-container city" style="display:none">
      <div class="grid grid-cols-1">

<div class="grid grid-cols-2 gap-1">
<div>
  <button id="button111" class="w-full px-4 py-2 mb-4 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold">Rental / Management</button>
</div>
<div>
  <button id="button222" class="w-full px-4 py-2 mb-4 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none font-poppins font-semibold">Rental + Management</button>
</div>
</div>

<div id="main2" class="w-full h-10">

</div>

<script>
const button111 = document.getElementById("button111");
const button222 = document.getElementById("button222");
const mainDiv2 = document.getElementById("main2");

button111.addEventListener("click", () => {
  const saleContent = `
  <div>
        <div class="my-3 text-lg font-bold">Rental / Management</div>
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


      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Address</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Address">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bedrooms</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Number of Bedrooms">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bathrooms</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Number of Bathrooms">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Garages</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Number of Garages">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Locker</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Number of Locker">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Is unit rented?</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Is unit rented?">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">If so, Rental end date</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Rental end date">

      </div>
      <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Interested in management?</label>

      <div class="mt-2.5">

        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Interested in management?">

      </div>

      

    

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Name</label>

      

        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your Name">

      

      <label for="email" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Email</label>

      

        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your Email">

      

      <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900  mt-2.5">Phone number</label>

      

        <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-2.5" placeholder="Enter your phone number">


    <div class="flex justify-end mt-8">

      <button type="submit" class="rounded-full bg-[#00AEC5] px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send message</button>

    </div>
    </form>
    <!-- Form Purchase -->
  </div>
  `;
  mainDiv2.innerHTML = saleContent;
});

button222.addEventListener("click", () => {
  const purchaseContent = `
  <div>
        <div class="my-3 text-lg font-bold">Rental + Management</div>
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
<label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bedrooms</label>

<div class="mt-2.5">

  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Number of Bedrooms">

</div>
<label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Bathrooms</label>

<div class="mt-2.5">

  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Number of Bathrooms">

</div>
<label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Garages</label>

<div class="mt-2.5">

  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Number of Garages">

</div>
<label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Number of Locker</label>

<div class="mt-2.5">

  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Number of Locker">

</div>
<label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Is unit rented?</label>

<div class="mt-2.5">

  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Is unit rented?">

</div>
<label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">If so, Rental end date</label>

<div class="mt-2.5">

  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="If so, Rental end date">

</div>
<label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900 mt-2.5">Interested in management?</label>

<div class="mt-2.5">

  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Interested in management?">

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
  mainDiv2.innerHTML = purchaseContent;
});
</script>

        </div>
      </div>
      
      <div id="NewYork" class="w3-container city" style="display:none">
      <form action="#" method="POST" class="px-6 pb-24 lg:px-8">

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
      
      <script>
      function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }
        document.getElementById(cityName).style.display = "block";
      
        // Remove 'active' class from all buttons
        var tabButtons = document.getElementsByClassName("w3-button");
        for (i = 0; i < tabButtons.length; i++) {
          tabButtons[i].classList.remove("active");
        }
      
        // Add 'active' class to the clicked button
        var activeButton = document.querySelector("[onclick=\"openCity('" + cityName + "')\"]");
        if (activeButton) {
          activeButton.classList.add("active");
        }
      }
      </script>
</div>
</div>



<?php get_footer(); ?>