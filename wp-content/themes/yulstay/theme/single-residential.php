<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yulstay
 */

get_header();

$image_one = get_field('image_one');
$image_two = get_field('image_two');
$image_three = get_field('image_three');


$residential_list_title_one = get_field('residential_list_title_one');
$residential_list_description_one = get_field('residential_list_description_one');
$residential_list_title_two = get_field('residential_list_title_two');
$residential_list_description_two = get_field('residential_list_description_two');
$residential_list_title_three = get_field('residential_list_title_three');
$residential_list_description_three = get_field('residential_list_description_three');
$residential_list_title_four = get_field('residential_list_title_four');
$residential_list_description_four = get_field('residential_list_description_four');
$residential_list_title_five = get_field('residential_list_title_five');
$residential_list_description_five = get_field('residential_list_description_five');
$residential_list_title_six = get_field('residential_list_title_six');
$residential_list_description_six = get_field('residential_list_description_six');
$residential_list_title_seven = get_field('residential_list_title_seven');
$residential_list_description_seven = get_field('residential_list_description_seven');
$residential_list_title_eight = get_field('residential_list_title_eight');
$residential_list_description_eight = get_field('residential_list_description_eight');
$residential_list_title_nine = get_field('residential_list_title_nine');
$residential_list_description_nine = get_field('residential_list_description_nine');

$residential_details_description = get_field('residential_details_description');
$residential_address = get_field('residential_address');

$residential_image_one = get_field('residential_image_one');
$residential_image_two = get_field('residential_image_two');
$residential_image_three = get_field('residential_image_three');
$residential_image_four = get_field('residential_image_four');
$residential_image_five = get_field('residential_image_five');
$residential_image_six = get_field('residential_image_six');
$residential_image_seven = get_field('residential_image_seven');
$residential_image_eight = get_field('residential_image_eight');
$residential_image_nine = get_field('residential_image_nine');
$residential_image_ten = get_field('residential_image_ten');


?>

<div class="h-screen w-screen mr-12 grid grid-cols-1 md:grid-cols-12 px-14 gap-4">

    <div class="col-span-5 md:col-span-5 col-scroll" id="idCol5">



        <div>
            <h1 class="text-2xl font-light font-poppins"><?php echo get_the_title(); ?></h1>
            <div class="transitionCS7 pt-1 font-poppins" id="detailId2">
                <div class="font-bold text-base">Address</div>
                <div class="text-sm font-normal">3007 , Rue Cherrier , Montréal (L'Île-Bizard/Sainte-Geneviève)</div>
                <div class="font-bold text-base pt-1">Description - MLS 19441707 </div>
                <div class="text-sm font-normal">Room(s) : 20 | Bedroom(s) : 5 | Bathroom(s) : 3 | Powder room(s) : 1</div>
                <div class="text-sm font-normal pt-1">This stunning waterfront property boasts 5 bedrooms and 3.5 bathrooms, with walnut and heated ceramic floors throughout. The marble countertop adds an element of elegance to the home, and the large basement provides easy access to the backyard and paved jumbo terrace, perfect for outdoor entertaining. The garage can accommodate a lift for up to 4 cars. The location offers privacy and tranquility, but is just a short drive from all services, providing access to shopping, the REM, and other public transportation. This luxurious home is the perfect retreat for those seeking waterfront living with all the amenities of city life nearby </div>
            </div>
            <div class="transitionCS7" id="detailId1">
                <div class="container mx-auto">
                    <div class="flex justify-between border-b text-black border-gray-300">
                        <div class="cursor-pointer my-2 text-base font-normal hover:text-[#00AEC5] pr-1 border-r border-black" id="tab1">Characteristics</div>
                        <div class="cursor-pointer my-2 text-base font-normal hover:text-[#00AEC5] pr-1 border-r border-black" id="tab2">Room Dimentions</div>
                        <div class="cursor-pointer my-2 text-base font-normal hover:text-[#00AEC5] pr-1 border-r border-black" id="tab3">Inclusions</div>
                        <div class="cursor-pointer my-2 text-base font-normal hover:text-[#00AEC5] pr-1 border-r border-black" id="tab4">Addenda</div>
                        <div class="cursor-pointer my-2 text-base font-normal hover:text-[#00AEC5] pr-1 border-r border-black" id="tab5">Calculators</div>
                        <div class="cursor-pointer my-2 text-base font-normal hover:text-[#00AEC5] pr-1 border-r border-black" id="tab6">Map</div>
                        <div class="cursor-pointer my-2 text-base font-normal hover:text-[#00AEC5]" id="tab7">Contact</div>
                    </div>
                    <div class="py-4l" id="tabContent">
                        <!-- tab 1 -->
                        <div class="tab-pane hidden" id="content1">
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Property Type</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Type of building</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Building dimensions</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Living Area</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Lot dimensions</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Zoning</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Water supply</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Roofing</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Siding</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Windows</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Window Type</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Energy/Heating</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Basement</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Bathroom</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Heating system</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Sewage system</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Year of construction</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Trade possible</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Certificate of Location</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Certificate of Location</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Deed of Sale Signature</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Pool</div>
                                <div class="font-light">test</div>
                            </div>

                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Parking (total)</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Driveway</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Garage</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Lot</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Topography</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Distinctive Features</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm py-1 border-dashed border-b border-gray-500">
                                <div class="font-medium">Proximity</div>
                                <div class="font-light">test</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm pt-1 mb-8 border-dashed border-b border-gray-500">
                                <div class="font-medium">Parking</div>
                                <div class="font-light">test</div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-5 pb-8">
                                <div>
                                    <div class="text-base font-semibold">Dimensions</div>
                                    <div class="grid grid-cols-3 text-sm py-1 gap-y-1">
                                        <div class="font-medium col-span-2">Width of the building</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">Depth building</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">Living area</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">Lot frontage</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">Depth of field</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">Lot dimensions (Sq. ft.)</div>
                                        <div class="font-light">test</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-base font-semibold">Fees and taxes</div>
                                    <div class="grid grid-cols-3 text-sm py-1 gap-y-1">
                                        <div class="font-medium col-span-2">Municipal Taxes :</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">School taxes :</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">Total</div>
                                        <div class="font-light">test</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-base font-semibold">Municipal evaluation</div>
                                    <div class="grid grid-cols-3 text-sm py-1 gap-y-1">
                                        <div class="font-medium col-span-2">Year</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">Lot</div>
                                        <div class="font-light">test</div>

                                        <div class="font-medium col-span-2">Total</div>
                                        <div class="font-light">test</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab 2 -->
                        <div class="tab-pane hidden" id="content2">
                            <div class="flex justify-between border-b-2 px-1 border-black">
                                <div class="text-sm font-bold font-poppins">
                                    Room(s) : 20
                                </div>
                                <div class="text-sm font-bold font-poppins">
                                    Bedroom(s) : 5
                                </div>
                                <div class="text-sm font-bold font-poppins">
                                    Bathroom(s) : 3
                                </div>
                                <div class="text-sm font-bold font-poppins">
                                    Powder room(s) : 1
                                </div>
                            </div>
                            <div class="grid grid-cols-5">
                                <div class="text-xs font-poppins font-medium py-1">ROOM(S)</div>
                                <div class="text-xs font-poppins font-medium py-1">LEVEL</div>
                                <div class="text-xs font-poppins font-medium py-1">DIMENSIONS</div>
                                <div class="text-xs font-poppins font-medium py-1">TYPE OF FLOORING</div>
                                <div class="text-xs font-poppins font-medium py-1">ADDITIONAL INFO.</div>

                                <div class="text-xs font-poppins font-medium py-1">Washroom</div>
                                <div class="text-xs font-poppins font-medium py-1">Ground floor</div>
                                <div class="text-xs font-poppins font-medium py-1">8x5.6 P - irr</div>
                                <div class="text-xs font-poppins font-medium py-1">Ceramic tiles</div>
                                <div class="text-xs font-poppins font-medium py-1"></div>

                                <div class="text-xs font-poppins font-medium py-1">Washroom</div>
                                <div class="text-xs font-poppins font-medium py-1">Ground floor</div>
                                <div class="text-xs font-poppins font-medium py-1">8x5.6 P - irr</div>
                                <div class="text-xs font-poppins font-medium py-1">Ceramic tiles</div>
                                <div class="text-xs font-poppins font-medium py-1"></div>
                            </div>
                        </div>
                        <!-- tab 3 -->
                        <div class="tab-pane hidden" id="content3">
                            <div class="text-sm font-medium py-1 font-poppins">
                                All major appliances. 
                            </div>
                        </div>
                        <div class="tab-pane hidden" id="content4">
                            <div class="text-sm font-medium py-1 font-poppins">
                            Beautiful 2 story home located in Ile-Bizard with a direct view of the Rivière des Prairies. A total of 5 large bedrooms with one in the basement, 3 full bathrooms and 1 powder room, easy access to the backyard through the large basement. A double size garage is also available. The master bedroom has a walk-in closet, direct access to a private balcony with view of the river and in-suite bathroom with stand-up shower and french bathtub. 

The area is quiet and secluded yet a short drive from west-island and all that it has to offer such as shopping and access to the REM and other public transport.

Nearby- Rivières des Prairies- 4 Golf clubs: St-Raphael, Royal Montreal, Elm Ridge, LA Cité,- Bois-de-L'Ile-Bizard Nature Park- St-Raphael Sports Complex- Several parks- Grocery stores, pharmacies, banks- Fairview Pointe-Claire Shopping Center- Ferry to access Laval-sur-le-Lac- Several daycares, primary and high schools, CEGEP
                            </div>
                        </div>
                        <div class="tab-pane hidden" id="content5">Content of Tab 2</div>
                        <div class="tab-pane hidden" id="content6">Content of Tab 3</div>
                        <div class="tab-pane hidden" id="content7">Content of Tab 4</div>
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
                
                            // Remove 'text-[#00AEC5]' class from all tabs
                            tabs.forEach(t => t.classList.remove('text-[#00AEC5]'));
                
                            // Show the selected tab content
                            const tabContentId = tab.getAttribute('id').replace('tab', 'content');
                            const tabContent = document.getElementById(tabContentId);
                            tabContent.classList.remove('hidden');
                
                            // Add 'text-[#00AEC5]' class to the clicked tab
                            tab.classList.add('text-[#00AEC5]');
                        });
                    });
                
                    // Simulate click on the first tab to open it on page load
                    tabs[0].click();
                </script>

               
            </div>

        </div>

    </div>

    <div class="md:col-span-1 flex flex-col items-end p-3">
        <svg id="closeIcon" onClick="closeButtonClick()" style="
                width: 40px;
                bottom: 0;
                display:none;
                position: fixed;
                margin:20px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-x-lg transitionCS7 mt-auto w-12 h-auto" viewBox="0 0 16 16">
            <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
        <svg onClick="plusButtonClick()" style="
                width: 40px;
                bottom: 0;
                position: fixed;
                margin:20px;" id="plusIcon" class="mt-auto w-12 h-auto" style="" xmlns="http://www.w3.org/2000/svg"
            width="30" height="30" fill="currentColor" class="bi bi-plus-lg transitionCS7" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>
    </div>

    <div class="col-span-1 md:col-span-6 col-scroll" id="idCol6" style="text-align: -webkit-center;">
        <div class="bg-cover h-full mb-4  transitionCS7"
            style="background-image: url('<?php echo $residential_image_one; ?>');">
        </div>
        <div class="bg-cover h-full mb-4  transitionCS7"
            style="background-image: url('<?php echo $residential_image_two; ?>');">
        </div>
        <div class="bg-cover h-full mb-4  transitionCS7"
            style="background-image: url('<?php echo $residential_image_three; ?>');">
        </div>
        <div class="bg-cover h-full mb-4  transitionCS7"
            style="background-image: url('<?php echo $residential_image_four; ?>');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo $residential_image_five; ?>');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo $residential_image_six; ?>');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo $residential_image_seven; ?>');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo $residential_image_eight; ?>');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo $residential_image_nine; ?>');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo $residential_image_ten; ?>');">
        </div>
    </div>
</div>


<script>
function plusButtonClick() {
    var element = document.getElementById("idCol6");
    var element2 = document.getElementById("idCol5");
    document.getElementById("plusIcon").style.display = "none";
    document.getElementById("closeIcon").style.display = "block";

    element.classList.add("col-span-9");
    element.classList.remove("col-span-6");
    element.classList.add("md:col-span-9");
    element.classList.remove("md:col-span-6");

    element2.classList.add("col-span-2");
    element2.classList.remove("col-span-5");
    element2.classList.add("md:col-span-2");
    element2.classList.remove("md:col-span-5");

    document.getElementById("detailId1").style.opacity = 0;
    document.getElementById("detailId").style.opacity = 0;
    document.getElementById("detailId2").style.opacity = 0;
}

function closeButtonClick() {
    var element = document.getElementById("idCol6");
    var element2 = document.getElementById("idCol5");
    document.getElementById("detailId2").style.opacity = 1;
    document.getElementById("detailId1").style.opacity = 1;
    document.getElementById("detailId").style.opacity = 1;

    document.getElementById("plusIcon").style.display = "block";
    document.getElementById("closeIcon").style.display = "none";

    element.classList.add("col-span-6");
    element.classList.remove("col-span-9");
    element.classList.add("md:col-span-6");
    element.classList.remove("md:col-span-9");

    element2.classList.add("col-span-5");
    element2.classList.remove("col-span-2");
    element2.classList.add("md:col-span-5");
    element2.classList.remove("md:col-span-2");
}

function slideToggle(el, type) {
    var elem = document.getElementById(el);
    elem.classList.toggle("open");

    var moreDetailId = document.getElementById("moreDetailId");
    var closeDetailId = document.getElementById("closeDetailId");

    if (type == 'open') {
        moreDetailId.style.display = "none";
        closeDetailId.style.display = "block";
    } else {
        moreDetailId.style.display = "block";
        closeDetailId.style.display = "none";
    }
}
</script>

<?php
get_footer();