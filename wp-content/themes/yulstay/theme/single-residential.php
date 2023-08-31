<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yulstay
 */

get_header();
global $wpdb;
$image_one = get_field('image_one');
$image_two = get_field('image_two');
$image_three = get_field('image_three');
$lang = get_bloginfo("language");
$language="A";
if ($lang == 'en-US'){
   $language="A";
}else{
   $language="F";
}
$inscriptionsData = $wpdb->get_row(" SELECT * FROM INSCRIPTIONS where NO_INSCRIPTION = '".get_the_content()."'", OBJECT );
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
                    <?php
                        $results = $wpdb->get_results(" SELECT * FROM PHOTOS where  NO_INSCRIPTION = '".get_the_content()."'", OBJECT );
                        foreach ($results as $page) {
                    ?>
                    <div class="slide aspect-[4/3] h-full flex-shrink-0 snap-center overflow-hidden">
                        <img class="w-full h-full object-cover" src="<?php echo $page->PhotoURL;?>"
                            alt="<?php echo $page->CODE_DESCRIPTION_PHOTO;?>">
                    </div>
                    <?php
                        }
                    ?>
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
                    <p class="text-base font-poppins pb-2"><?php
                    $municipalite = $wpdb->get_row(" SELECT * FROM MUNICIPALITES where CODE = '".$inscriptionsData->MUN_CODE."'", OBJECT );
                    echo $municipalite->DESCRIPTION;?> - <?php echo $inscriptionsData->NO_INSCRIPTION;?> </p>
                    <h1 class="text-4xl font-poppins"><?php the_title();?></h1>
                </div>
                <div class="flex gap-3 font-poppins">
                    <div class="text-center border-r mt-4 mb-4 pr-4 border-gray-300">
                        <div class="text-lg"><?php echo $inscriptionsData->UM_SUPERFICIE_HABITABLE;?></div>
                        <div class="text-sm">sqft</div>
                    </div>
                    <div class="text-center border-r mt-4 mb-4 pr-4 border-gray-300">
                        <div class="text-lg"><?php echo $inscriptionsData->NB_CHAMBRES;?></div>
                        <div class="text-sm">Bedrooms</div>
                    </div>
                    <div class="text-center border-r mt-4 mb-4 pr-4 border-gray-300">
                        <div class="text-lg"><?php echo $inscriptionsData->NB_CHAMBRES_HORS_SOL;?></div>
                        <div class="text-sm">Bathrooms</div>
                    </div>
                    <div class="text-center m-4 pr-4">
                        <div class="text-lg">
                            <?php echo $inscriptionsData->PRIX_DEMANDE.' '.$inscriptionsData->DEVISE_PRIX_DEMANDE  ;?>
                        </div>
                        <div class="text-sm">price</div>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-7 font-poppins">
                <div class="col-span-2">
                    <p class="text-sm pt-7"><?php
                    $remarques = $wpdb->get_row(" SELECT * FROM REMARQUES where NO_INSCRIPTION = '".$inscriptionsData->NO_INSCRIPTION."' and CODE_LANGUE='".$language."'", OBJECT );
                    echo $remarques->TEXTE;
                    ?></p>

                    <h2 class="text-2xl pt-7">Addenda</h2>
                    <p class="text-sm pt-3">
                        <?php
                                 $results = $wpdb->get_results("SELECT * FROM ADDENDA WHERE NO_INSCRIPTION = '".get_the_content()."' and CODE_LANGUE='".$language."'", OBJECT );
                                 foreach ($results as $page) {
                                    echo $page->TEXTE.'<br/>';
                                 }
                    ?>
                    </p>

                    <h2 class="text-2xl pt-7">Included in the sale</h2>
                    <p class="text-sm pt-3">
                        <?php echo $inscriptionsData->INCLUS_ANGLAIS.', '.$inscriptionsData->INCLUS_FRANCAIS;?></p>

                    <h2 class="text-2xl pt-7">Room Details</h2>
                    <div class="grid grid-cols-5 pt-3">
                        <div class="text-sm font-poppins font-bold py-1">ROOM(S)</div>
                        <div class="text-sm font-poppins font-bold py-1">LEVEL</div>
                        <div class="text-sm font-poppins font-bold py-1">DIMENSIONS</div>
                        <div class="text-sm font-poppins font-bold py-1">TYPE OF FLOORING</div>
                        <div class="text-sm font-poppins font-bold py-1">ADDITIONAL INFO.</div>

                        <?php
                            $results = $wpdb->get_results("SELECT * FROM PIECES_UNITES WHERE NO_INSCRIPTION = '".get_the_content()."' ", OBJECT );
                            foreach ($results as $page) {
                                $valeursFixes = $wpdb->get_row("SELECT * FROM VALEURS_FIXES WHERE DOMAINE ='COUVRE_PLANCHER_CODE' AND VALEUR='".$page->COUVRE_PLANCHER_CODE."' ", OBJECT );
                        ?>
                        <div class="text-sm font-poppins font-medium py-1">Washroom</div>
                        <div class="text-sm font-poppins font-medium py-1">Ground floor</div>
                        <div class="text-sm font-poppins font-medium py-1"><?php echo $page->DIMENSIONS;?></div>
                        <div class="text-sm font-poppins font-medium py-1">
                            <?php echo $valeursFixes->DESCRIPTION_ABREGEE_ANGLAISE;?></div>
                        <div class="text-sm font-poppins font-medium py-1"></div>
                        <?php
                            }
                        ?>
                    </div>

                    <h2 class="font-poppins text-2xl pt-7 pb-3">Assessment, taxes and other costs</h2>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Property Type</div>
                        <div class="font-medium text-gray-600">
                            <?php
                            $GENRES_PROPRIETES = $wpdb->get_row("SELECT * FROM GENRES_PROPRIETES WHERE GENRE_PROPRIETE ='".$inscriptionsData->GENRE_PROPRIETE."'", OBJECT );
                            if ($lang == 'en-US'){
                                echo $GENRES_PROPRIETES->DESCRIPTION_ANGLAISE;
                            }else{
                                 echo $GENRES_PROPRIETES->DESCRIPTION_FRANCAISE;
                             }
                            ?></div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Living Area</div>
                        <div class="font-medium text-gray-600">
                            <?php
                            echo $inscriptionsData->SUPERFICIE_HABITABLE;
                            ?></div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Year of construction</div>
                        <div class="font-medium text-gray-600">
                            <?php
                            echo $inscriptionsData->ANNEE_CONTRUCTION;?></div>
                    </div>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold">Deed of sale Signature</div>
                        <div class="font-medium text-gray-600">
                            <?php
// ." ".$inscriptionsData->DELAI_OCCUPATION_ANGLAIS franse

                            echo $inscriptionsData->DELAI_OCCUPATION_ANGLAIS;?></div>
                    </div>


                    <?php
                        $results = $wpdb->get_results("SELECT * FROM CARACTERISTIQUES WHERE NO_INSCRIPTION = '".get_the_content()."' ", OBJECT );
                        foreach ($results as $page) {
                            $SOUS_TYPE_CARACTERISTIQUES = $wpdb->get_row("SELECT * FROM SOUS_TYPE_CARACTERISTIQUES WHERE CODE ='".$page->SCARAC_CODE."' AND TCAR_CODE='".$page->TCAR_CODE."' ", OBJECT );
                            $TYPE_CARACTERISTIQUES = $wpdb->get_row("SELECT * FROM TYPE_CARACTERISTIQUES WHERE  CODE='".$page->TCAR_CODE."' ", OBJECT );
                    ?>
                    <div class="flex gap-4 text-sm p-4 border-b border-gray-300 hover:bg-slate-100 hover:duration-100">
                        <div class="font-bold"><?php echo $SOUS_TYPE_CARACTERISTIQUES->DESCRIPTION_ANGLAISE;?></div>
                        <div class="font-medium text-gray-600">
                            <?php echo $TYPE_CARACTERISTIQUES->DESCRIPTION_ANGLAISE;?></div>
                    </div>
                    <?php } ?>
                </div>
                <div>
                    <h3 class="text-xl pt-7 pb-4">Contact the listing broker(s)</h3>
                    <div class="grid grid-cols-3 gap-2">
                        <?php
                            $MEMBRES = $wpdb->get_row("SELECT * FROM MEMBRES WHERE CODE ='".$inscriptionsData->COURTIER_INSCRIPTEUR_1."'", OBJECT );
                        ?>
                        <div>
                            <img src="<?php echo $MEMBRES->PHOTO_URL?>" alt="">
                        </div>
                        <div class="col-span-2">
                            <div><?php echo $MEMBRES->NOM." ".$MEMBRES->PRENOM?></div>
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
                                    <a href="" class="text-sm"><?php echo $MEMBRES->COURRIEL?></a>
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
                                    <a href="" class="text-sm"><?php echo $MEMBRES->TELEPHONE_1?></a>
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


        <div class="max-w-7xl mx-auto">
                <h2 class="text-center font-poppins text-2xl pt-7 pb-3">CALCULATORS</h2>
                <div class="grid grid-cols-3 gap-4">
                  <div class="bg-slate-100 p-4 rounded-2xl">
                    <h2 class="text-center text-xl pb-4">MONTHLY PAYMENT</h2>
                    <div class="grid grid-cols-2 gap-3">
                      <div class="flex items-center text-base">
                        <div>Purchase price :</div>
                      </div>
                      <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">
                      </div>
                      <div class="flex items-center text-base">
                        <div>Interest rate :</div>
                      </div>
                      <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">
                      </div>
                      <div class="flex items-center text-base">
                        <div>Amortization:</div>
                      </div>
                      <div class="mt-2.5">
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a type</option>
                        <option value="US">Condo</option>
                        <option value="CA">House</option>
                        <option value="FR">Plex</option>
                        </select>
                      </div>
                      <div class="flex items-center text-base">
                        <div>Down payment:</div>
                      </div>
                      <div class="mt-2.5">
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option selected>Choose a type</option>
                          <option value="US">Condo</option>
                          <option value="CA">House</option>
                          <option value="FR">Plex</option>
                          </select>
                      </div>
                      <div class="flex items-center text-base">
                        <div>Mortgage amount:</div>
                      </div>
                      <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="text-center py-5 mt-2.5"> answer </div>
                    <div class="mt-1">
                      <button type="submit" class="text-center w-full py-2 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none">CALCULAT</button>
                    </div>
                  </div>
                  <div class="bg-gray-50 p-4 rounded-2xl">
                    <h2 class="text-center text-xl pb-4">WELCOME TAX</h2>
                    <div class="grid grid-cols-2 gap-3">
                      <div class="flex items-center text-base">
                        <div>Purchase price:</div>
                      </div>
                      <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="text-center py-5 mt-2.5"> answer </div>
                    <div class="mt-1">
                      <button type="submit" class="text-center w-full py-2 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none">CALCULAT</button>
                    </div>
                  </div>
                  <div class="bg-slate-100 p-4 rounded-2xl">
                    <h2 class="text-center text-xl pb-4">PURCHASING POWER</h2>
                    <div class="grid grid-cols-2 gap-3">
                      <div class="flex items-center text-base">
                        <div>Payment</div>
                      </div>
                      <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">
                      </div>
                      <div class="flex items-center text-base">
                        <div>Payment frequency</div>
                      </div>
                      <div class="mt-2.5">
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option selected>Choose a type</option>
                          <option value="US">Condo</option>
                          <option value="CA">House</option>
                          <option value="FR">Plex</option>
                          </select>
                      </div>
                      <div class="flex items-center text-base">
                        <div>Interest rate</div>
                      </div>
                      <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">
                      </div>
                      <div class="flex items-center text-base">
                        <div>Amortization period</div>
                      </div>
                      <div class="mt-2.5">
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a type</option>
                        <option value="US">Condo</option>
                        <option value="CA">House</option>
                        <option value="FR">Plex</option>
                        </select>
                      </div>
                      <div class="flex items-center text-base">
                        <div>Down payment</div>
                      </div>
                      <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-[#00AEC5] focus:ring-opacity-50 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="text-center py-5 mt-2.5"> answer </div>
                    <div class="mt-1">
                      <button type="submit" class="text-center w-full py-2 rounded-full bg-white hover:bg-[#00AEC5] text-black hover:text-white border border-black hover:border-none">CALCULAT</button>
                    </div>
                  </div>
                </div>
              </div>


        <?php

$the_query = new WP_Query(array(

    'post_type' => 'residential',

    'posts_per_page' => '6',

    'post__not_in' => array($id),

));

if ($the_query->have_posts()) {

    $displayed_categories = array(); // Array to store displayed category names

    ?>
        <div class="bg-slate-100">
            <div class="max-w-7xl mx-auto">
                <h2 class="font-poppins text-5xl pt-20 pb-7">Properties in the Region</h2>
                <div class="grid grid-cols-3 gap-x-4 gap-y-5 font-poppins">
                    <?php
                while ($the_query->have_posts()) {
                    $inscriptionsData = $wpdb->get_row(" SELECT * FROM INSCRIPTIONS where NO_INSCRIPTION = '".get_the_content()."'", OBJECT );

                    $the_query->the_post();
                    $thumbnail_id = get_post_thumbnail_id();
                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
                    $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    $categories = get_the_category();

                     $results = $wpdb->get_row(" SELECT * FROM PHOTOS where NO_INSCRIPTION = '".get_the_content()."'", OBJECT );

                ?>
                    <div>
                        <a href="<?php echo get_permalink();?>">
                            <img class="" src="<?php echo $results->PhotoURL;?>" alt="">
                            <div class="text-sm py-1"><?php
                    $municipalite = $wpdb->get_row(" SELECT * FROM MUNICIPALITES where CODE = '".$inscriptionsData->MUN_CODE."'", OBJECT );
                    echo $municipalite->DESCRIPTION;?></div>
                            <div class="text-lg"><?php the_title();?></div>
                            <p class="text-sm pt-1 pb-1"><?php $remarques = $wpdb->get_row(" SELECT * FROM REMARQUES where NO_INSCRIPTION = '".get_the_content()."' and CODE_LANGUE='".$language."'", OBJECT );
                    echo $remarques->TEXTE;
                    ?></p>
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
                        </a>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php
get_footer();