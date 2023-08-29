<?php
/*
	Template Name: Prop new
*/
get_header();

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

<div class="h-screen w-screen pr-12 overflow-y-scroll scroll-style">

    <div class="">
        <!-- caro -->
        <div id="app" class="transition-all duration-500 ease-linear pb-7">
            <div class="relative">
                <div
                    class="slides-container h-[350px] flex snap-x snap-mandatory overflow-hidden overflow-x-auto space-x-2 rounded scroll-smooth before:w-[45vw] before:shrink-0 after:w-[45vw] after:shrink-0 md:before:w-0 md:after:w-0">
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover" src="./assest/img/10578486-1-327342585.jpg"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/6263568/pexels-photo-6263568.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/3026364/pexels-photo-3026364.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/10343729/pexels-photo-10343729.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/13860053/pexels-photo-13860053.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/8576739/pexels-photo-8576739.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/1743367/pexels-photo-1743367.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/5920021/pexels-photo-5920021.jpeg?auto=compress&cs=tinysrgb&w=1600"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/12805075/pexels-photo-12805075.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="mountain_image">
                    </div>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://images.pexels.com/photos/547115/pexels-photo-547115.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="mountain_image">
                    </div>

                </div>

                <div class="absolute top-0 left-2 h-full items-center hidden md:flex">
                    <button role="button" class="prev px-2 py-2 rounded-full bg-neutral-100 text-neutral-900 group"
                        aria-label="prev"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="w-5 h-5 group-active:-translate-x-2 transition-all duration-200 ease-linear">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>

                    </button>
                </div>
                <div class="absolute top-0 right-2 h-full items-center hidden md:flex">
                    <button role="button" class="next px-2 py-2 rounded-full bg-neutral-100 text-neutral-900 group"
                        aria-label="next"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="w-5 h-5 group-active:translate-x-2 transition-all duration-200 ease-linear">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <script>
        const slidesContainer = document.querySelector(".slides-container");
        const slideWidth = slidesContainer.querySelector(".slide").clientWidth;
        const prevButton = document.querySelector(".prev");
        const nextButton = document.querySelector(".next");

        nextButton.addEventListener("click", () => {
            slidesContainer.scrollLeft += slideWidth;
        });

        prevButton.addEventListener("click", () => {
            slidesContainer.scrollLeft -= slideWidth;
        });
        </script>
        <!-- caro -->
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between pb-7 border-b border-gray-300">
                <div>
                    <p class="text-base font-poppins pb-2">Dollard-Des Ormeaux - Centris® No. 23168752</p>
                    <h1 class="text-4xl font-poppins">294 Rue Barnett</h1>
                </div>
                <div class="flex gap-3 font-poppins">
                    <div class="text-center border-r mt-4 mb-4 pr-4 border-gray-300">
                        <div class="text-lg">722.26</div>
                        <div class="text-sm">sqft</div>
                    </div>
                    <div class="text-center border-r mt-4 mb-4 pr-4 border-gray-300">
                        <div class="text-lg">2</div>
                        <div class="text-sm">Bedrooms</div>
                    </div>
                    <div class="text-center border-r mt-4 mb-4 pr-4 border-gray-300">
                        <div class="text-lg">2</div>
                        <div class="text-sm">Bathrooms</div>
                    </div>
                    <div class="text-center m-4 pr-4">
                        <div class="text-lg">599 000.0 $</div>
                        <div class="text-sm">price</div>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-7 font-poppins">
                <div class="col-span-2">
                    <p class="text-sm pt-7">* dimensions des chambres précis à suivre* Bienvenue dans votre nouvelle
                        maison dans l'ouest de l'île! Cette charmante maison de ville de 2 chambres et 2,5 salles de
                        bains offre une expérience de vie confortable et pratique. Espace de vie lumineux et aéré à aire
                        ouverte avec hauts plafonds, chambre principale avec 2 garde-robes walk-in et un sous-sol
                        spacieux. La maison dispose de deux stationnements intérieurs avec accès direct à la maison.
                        Profitez de la vie en plein air sur le grand patio, parfait pour se détendre et se divertir. Ne
                        manquez pas l'occasion de faire vôtre cette jolie maison de ville! </p>

                    <h2 class="text-2xl pt-7">Addenda</h2>
                    <p class="text-sm pt-3">* dimensions des chambres précis à suivre
                        * Bienvenue dans votre nouvelle maison dans l'ouest de l'île! Cette charmante maison de ville de
                        2 chambres et 2,5 salles de bains offre une expérience de vie confortable et pratique. Espace de
                        vie lumineux et aéré à aire ouverte avec hauts plafonds, chambre principale avec 2 garde-robes
                        walk-in et un sous-sol spacieux. La maison dispose de deux stationnements intérieurs avec accès
                        direct à la maison. Profitez de la vie en plein air sur le grand patio, parfait pour se détendre
                        et se divertir. Ne manquez pas l'occasion de faire vôtre cette jolie maison de ville!</p>

                    <h2 class="text-2xl pt-7">Included in the sale</h2>
                    <p class="text-sm pt-3">Réfrigérateur, cuisinière, lave-vaisselle, micro-ondes, stores et rideaux
                        tels qu'installés</p>

                    <h2 class="text-2xl pt-7">Room Details</h2>
                    <div class="grid grid-cols-5 pt-3">
                        <div class="text-sm font-poppins font-bold py-1">ROOM(S)</div>
                        <div class="text-sm font-poppins font-bold py-1">LEVEL</div>
                        <div class="text-sm font-poppins font-bold py-1">DIMENSIONS</div>
                        <div class="text-sm font-poppins font-bold py-1">TYPE OF FLOORING</div>
                        <div class="text-sm font-poppins font-bold py-1">ADDITIONAL INFO.</div>

                        <div class="text-sm font-poppins font-medium py-1">Washroom</div>
                        <div class="text-sm font-poppins font-medium py-1">Ground floor</div>
                        <div class="text-sm font-poppins font-medium py-1">8x5.6 P - irr</div>
                        <div class="text-sm font-poppins font-medium py-1">Ceramic tiles</div>
                        <div class="text-sm font-poppins font-medium py-1"></div>

                        <div class="text-sm font-poppins font-medium py-1">Washroom</div>
                        <div class="text-sm font-poppins font-medium py-1">Ground floor</div>
                        <div class="text-sm font-poppins font-medium py-1">8x5.6 P - irr</div>
                        <div class="text-sm font-poppins font-medium py-1">Ceramic tiles</div>
                        <div class="text-sm font-poppins font-medium py-1"></div>

                        <div class="text-sm font-poppins font-medium py-1">Washroom</div>
                        <div class="text-sm font-poppins font-medium py-1">Ground floor</div>
                        <div class="text-sm font-poppins font-medium py-1">8x5.6 P - irr</div>
                        <div class="text-sm font-poppins font-medium py-1">Ceramic tiles</div>
                        <div class="text-sm font-poppins font-medium py-1"></div>
                    </div>

                    <h2 class="font-poppins text-2xl pt-7 pb-3">Assessment, taxes and other costs</h2>

                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>

                    <h2 class="font-poppins text-2xl pt-7 pb-3">Inclus dans la vente</h2>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">test</div>
                    </div>

                </div>
                <div>
                    <h3 class="text-xl pt-7 pb-4">Contact the listing broker(s)</h3>
                    <div class="grid grid-cols-3 gap-2">
                        <div>
                            <img src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/DSC06075-3.jpg" alt="">
                        </div>
                        <div class="col-span-2">
                            <div>Elio Di Spaldro</div>
                            <div class="text-sm">Residential & Commercial Real Estate Broker</div>
                            <div class="flex gap-1 items-baseline">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                        <path
                                            d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                    </svg>
                                </div>
                                <div>
                                    <a href="" class="text-sm">admin@mdataz.com</a>
                                </div>
                            </div>
                            <div class="flex gap-1 items-baseline">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                        <path
                                            d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                    </svg>
                                </div>
                                <div>
                                    <a href="" class="text-sm">admin@mdataz.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-2.5">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 bg-slate-200"
                                placeholder="Your Name">
                        </div>
                        <div class="mt-2.5">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 bg-slate-200"
                                placeholder="Your Email">
                        </div>
                        <div class="mt-2.5">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 bg-slate-200"
                                placeholder="Your Phone Number">
                        </div>
                        <div class="mt-2.5">
                            <textarea type="text" name="last-name" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 bg-slate-200"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="mt-2.5">
                            <button type="submit"
                                class="text-center w-full py-3 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none">Send
                                message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-slate-100">
            <div class="max-w-7xl mx-auto">
                <h2 class="font-poppins text-5xl pt-20 pb-7">Properties in the Region</h2>
                <div class="grid grid-cols-3 gap-x-4 gap-y-5 font-poppins">
                    <div>
                        <img class=""
                            src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg"
                            alt="">
                        <div class="text-sm py-1">Dollard-Des Ormeaux</div>
                        <div class="text-lg">152 Rue Leslie</div>
                        <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé
                            de Westpark, près de toutes les commodités. La propriété compte une</p>
                        <div class="flex gap-3">
                            <div class="border-r my-4 pr-4 border-gray-300">
                                <div>2 + 1</div>
                                <div>salles de bains</div>
                            </div>
                            <div class="border-r my-4 pr-4 border-gray-300">
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
                        <img class=""
                            src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg"
                            alt="">
                        <div class="text-sm py-1">Dollard-Des Ormeaux</div>
                        <div class="text-lg">152 Rue Leslie</div>
                        <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé
                            de Westpark, près de toutes les commodités. La propriété compte une</p>
                        <div class="flex gap-3">
                            <div class="border-r my-4 pr-4 border-gray-300">
                                <div>2 + 1</div>
                                <div>salles de bains</div>
                            </div>
                            <div class="border-r my-4 pr-4 border-gray-300">
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
                        <img class=""
                            src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg"
                            alt="">
                        <div class="text-sm py-1">Dollard-Des Ormeaux</div>
                        <div class="text-lg">152 Rue Leslie</div>
                        <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé
                            de Westpark, près de toutes les commodités. La propriété compte une</p>
                        <div class="flex gap-3">
                            <div class="border-r my-4 pr-4 border-gray-300">
                                <div>2 + 1</div>
                                <div>salles de bains</div>
                            </div>
                            <div class="border-r my-4 pr-4 border-gray-300">
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
                        <img class=""
                            src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg"
                            alt="">
                        <div class="text-sm py-1">Dollard-Des Ormeaux</div>
                        <div class="text-lg">152 Rue Leslie</div>
                        <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé
                            de Westpark, près de toutes les commodités. La propriété compte une</p>
                        <div class="flex gap-3">
                            <div class="border-r my-4 pr-4 border-gray-300">
                                <div>2 + 1</div>
                                <div>salles de bains</div>
                            </div>
                            <div class="border-r my-4 pr-4 border-gray-300">
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
                        <img class=""
                            src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg"
                            alt="">
                        <div class="text-sm py-1">Dollard-Des Ormeaux</div>
                        <div class="text-lg">152 Rue Leslie</div>
                        <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé
                            de Westpark, près de toutes les commodités. La propriété compte une</p>
                        <div class="flex gap-3">
                            <div class="border-r my-4 pr-4 border-gray-300">
                                <div>2 + 1</div>
                                <div>salles de bains</div>
                            </div>
                            <div class="border-r my-4 pr-4 border-gray-300">
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
                        <img class=""
                            src="https://mdataz.com/yulstaygit/wp-content/uploads/2023/08/10578486-1-327342585.jpg"
                            alt="">
                        <div class="text-sm py-1">Dollard-Des Ormeaux</div>
                        <div class="text-lg">152 Rue Leslie</div>
                        <p class="text-sm pt-1 pb-1">Spacieuse maison de style Jefferson située dans le quartier prisé
                            de Westpark, près de toutes les commodités. La propriété compte une</p>
                        <div class="flex gap-3">
                            <div class="border-r my-4 pr-4 border-gray-300">
                                <div>2 + 1</div>
                                <div>salles de bains</div>
                            </div>
                            <div class="border-r my-4 pr-4 border-gray-300">
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

<?php get_footer(); ?>