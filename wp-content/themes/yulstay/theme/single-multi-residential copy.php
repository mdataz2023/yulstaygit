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

?>

<div class="h-screen w-screen mr-12 grid grid-cols-1 md:grid-cols-12 px-14 gap-4">

    <div class="col-span-5 md:col-span-5 col-scroll" id="idCol5">



        <div class="mt-28" style='padding: 10px;'>
            <p style="font-size: 40px;"> <?php echo get_the_title(); ?></p>
            <div class="grid grid-cols-2 transitionCS7" id="detailId2">
                <div>chan</div>
                <div>bandara</div>
                <div>chandima</div>
                <div>banra <br> chand</div>
                <div>chan</div>
                <div>bandara</div>
                <div>chan</div>
                <div>bandara</div>
                <div>chandima</div>
                <div>banra <br> chand</div>
                <div>chan</div>
                <div>bandara</div>
                <div>chan</div>
                <div>bandara</div>
                <div>chandima</div>
                <div>banra <br> chand</div>
                <div>chan</div>
                <div>bandara</div>
            </div>
            <div class="flex justify-between border-b border-black transitionCS7" id="detailId1">
                <div>Deatils</div>

                <div>
                    <svg onclick="slideToggle('detailId','open')" id="moreDetailId" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-plus-lg transitionCS7" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>

                    <svg id="closeDetailId" onclick="slideToggle('detailId','close')" style="display:none; "
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg transitionCS7"
                        viewBox="0 0 16 16">
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>
                </div>
            </div>
            <div id="detailId" class="transitionCS7 detailId">
                <div>
                    hrough our relationship in the industry and our volume of transactions, we are happy to have access
                    to many
                    new construction projects. This allows us to offer many benefits to any of our clients looking to
                    purchase
                    or invest in new co
                </div>
                <div class="grid grid-cols-6 transitionCS7">
                    <div class="col-span-1">address</div>
                    <div class="col-span-5">3007 , Rue Cherrier , Montréal (L'Île-Bizard/Sainte-Geneviève)</div>
                </div>
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
            class="bi bi-x-lg transitionCS7" viewBox="0 0 16 16">
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
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4  transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4  transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4  transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
        </div>
        <div class="bg-cover h-full mb-4 transitionCS7"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/300-rue-du-saint-sacrement-24-1.webp');">
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