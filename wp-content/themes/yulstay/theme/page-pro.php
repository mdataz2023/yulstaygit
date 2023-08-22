<?php
/*
	Template Name: Pro Landing
*/
get_header(); 

?>

<style>
        /* Add custom styles if needed */
        .active-button {
            background-color: #00AEC5; /* Change to your desired active button background color */
        }
    </style>
    <div class="h-screen w-screen pr-12 overflow-y-scroll scroll-style">
        <div class="">
            <div class="flex pb-7 overflow-hidden gap-1 h-[500px]">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36553983.44087083!2d-96!3d56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2slk!4v1692665654783!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="">
            <div class="max-w-7xl mx-auto">

                <div class="flex justify-between">
                    <div class="flex gap-10 mb-7 mt-5">
                    
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center  " type="button">Municipality <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Sign out</a>
                            </li>
                            </ul>
                        </div>
    
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-gray-100  hover:bg-gray-200  font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center  " type="button">Bathrooms <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Sign out</a>
                            </li>
                            </ul>
                        </div>
    
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-gray-100  hover:bg-gray-200  font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center  " type="button">Bedrooms <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Sign out</a>
                            </li>
                            </ul>
                        </div>
    
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-gray-100  hover:bg-gray-200  font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center  " type="button">Prix <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-black">Sign out</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pt-5">
                        <!-- Buttons to toggle between Grid and List views -->
                        <button id="gridButton" class="border border-gray-500 text-black px-4 py-2 rounded mr-2 active-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x2-gap-fill" viewBox="0 0 16 16">
                                <path d="M1 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V4zM1 9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V9z"/>
                            </svg>
                        </button>
                        <button id="listButton" class="border border-gray-500 text-black px-4 py-2 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                                <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                            </svg>
                        </button>
                    </div>
                </div>




            

              <div id="gridView" class="grid grid-cols-3 gap-x-4 gap-y-5 font-poppins">
                <div>
                  <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                  <div class="text-sm py-2">Dollard-Des Ormeaux</div>
                  <div class="text-lg">152 Rue Leslie</div>
                  <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                  <div class="flex gap-3">
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="my-4 pr-4">
                      <div>599 000.0 $</div>
                      <div>prix</div>
                    </div>
                  </div>
                </div>
                <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                    <div class="text-sm py-2">Dollard-Des Ormeaux</div>
                    <div class="text-lg">152 Rue Leslie</div>
                    <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    <div class="flex gap-3">
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="my-4 pr-4">
                        <div>599 000.0 $</div>
                        <div>prix</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                    <div class="text-sm py-2">Dollard-Des Ormeaux</div>
                    <div class="text-lg">152 Rue Leslie</div>
                    <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    <div class="flex gap-3">
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="my-4 pr-4">
                        <div>599 000.0 $</div>
                        <div>prix</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                    <div class="text-sm py-2">Dollard-Des Ormeaux</div>
                    <div class="text-lg">152 Rue Leslie</div>
                    <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    <div class="flex gap-3">
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="my-4 pr-4">
                        <div>599 000.0 $</div>
                        <div>prix</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                    <div class="text-sm py-2">Dollard-Des Ormeaux</div>
                    <div class="text-lg">152 Rue Leslie</div>
                    <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    <div class="flex gap-3">
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="my-4 pr-4">
                        <div>599 000.0 $</div>
                        <div>prix</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                    <div class="text-sm py-2">Dollard-Des Ormeaux</div>
                    <div class="text-lg">152 Rue Leslie</div>
                    <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    <div class="flex gap-3">
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="my-4 pr-4">
                        <div>599 000.0 $</div>
                        <div>prix</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                    <div class="text-sm py-2">Dollard-Des Ormeaux</div>
                    <div class="text-lg">152 Rue Leslie</div>
                    <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    <div class="flex gap-3">
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="border-r my-4 pr-4 border-gray-400">
                        <div>2 + 1</div>
                        <div>salles de bains</div>
                      </div>
                      <div class="my-4 pr-4">
                        <div>599 000.0 $</div>
                        <div>prix</div>
                      </div>
                    </div>
                  </div>
                            
              </div>

              <div id="listView" class="grid grid-cols-3 content-center mb-8 gap-7">
                <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                </div>
                <div class="col-span-2 flex flex-col justify-between">
                    <div>
                        <div class="text-base py-2 border-b border-gray-400">Dollard-Des Ormeaux</div>
                        <div class="text-3xl py-2 border-b border-gray-400">152 Rue Leslie</div>
                        <p class="text-lg py-2 border-b border-gray-400">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    </div>
                  
                  <div class="flex gap-3">
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="my-4 pr-4">
                      <div>599 000.0 $</div>
                      <div>prix</div>
                    </div>
                  </div>
                </div>
                <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                </div>
                <div class="col-span-2 flex flex-col justify-between">
                    <div>
                        <div class="text-base py-2 border-b border-gray-400">Dollard-Des Ormeaux</div>
                        <div class="text-3xl py-2 border-b border-gray-400">152 Rue Leslie</div>
                        <p class="text-lg py-2 border-b border-gray-400">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    </div>
                  
                  <div class="flex gap-3">
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="my-4 pr-4">
                      <div>599 000.0 $</div>
                      <div>prix</div>
                    </div>
                  </div>
                </div>
                <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                </div>
                <div class="col-span-2 flex flex-col justify-between">
                    <div>
                        <div class="text-base py-2 border-b border-gray-400">Dollard-Des Ormeaux</div>
                        <div class="text-3xl py-2 border-b border-gray-400">152 Rue Leslie</div>
                        <p class="text-lg py-2 border-b border-gray-400">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    </div>
                  
                  <div class="flex gap-3">
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="my-4 pr-4">
                      <div>599 000.0 $</div>
                      <div>prix</div>
                    </div>
                  </div>
                </div>
                <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                </div>
                <div class="col-span-2 flex flex-col justify-between">
                    <div>
                        <div class="text-base py-2 border-b border-gray-400">Dollard-Des Ormeaux</div>
                        <div class="text-3xl py-2 border-b border-gray-400">152 Rue Leslie</div>
                        <p class="text-lg py-2 border-b border-gray-400">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    </div>
                  
                  <div class="flex gap-3">
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="my-4 pr-4">
                      <div>599 000.0 $</div>
                      <div>prix</div>
                    </div>
                  </div>
                </div>
                <div>
                    <img class="" src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg" alt="">
                </div>
                <div class="col-span-2 flex flex-col justify-between">
                    <div>
                        <div class="text-base py-2 border-b border-gray-400">Dollard-Des Ormeaux</div>
                        <div class="text-3xl py-2 border-b border-gray-400">152 Rue Leslie</div>
                        <p class="text-lg py-2 border-b border-gray-400">Spacieuse maison de style Jefferson située dans le quartier prisé de Westpark, près de toutes les commodités. La propriété compte une</p>
                    </div>
                  
                  <div class="flex gap-3">
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="border-r my-4 pr-4 border-gray-400">
                      <div>2 + 1</div>
                      <div>salles de bains</div>
                    </div>
                    <div class="my-4 pr-4">
                      <div>599 000.0 $</div>
                      <div>prix</div>
                    </div>
                  </div>
                </div>
              </div>

              
            </div>
            </div>
    
          </div>
    </div>
    <script>
        // Get references to the buttons and views
        const gridButton = document.getElementById('gridButton');
        const listButton = document.getElementById('listButton');
        const gridView = document.getElementById('gridView');
        const listView = document.getElementById('listView');

        // Initially hide listView and display gridView
        listView.classList.add('hidden');
        gridView.classList.remove('hidden');

        // Function to toggle between Grid and List views
        gridButton.addEventListener('click', () => {
            gridView.classList.remove('hidden');
            listView.classList.add('hidden');
            
            // Highlight the clicked button
            gridButton.classList.add('active-button');
            listButton.classList.remove('active-button');
        });

        listButton.addEventListener('click', () => {
            gridView.classList.add('hidden');
            listView.classList.remove('hidden');
            
            // Highlight the clicked button
            listButton.classList.add('active-button');
            gridButton.classList.remove('active-button');
        });
    </script>

<?php get_footer(); ?>