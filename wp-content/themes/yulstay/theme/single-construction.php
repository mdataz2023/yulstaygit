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

<div class="h-screen w-screen mr-12 grid grid-cols-12 p-14 gap-4" style="background-color: #0f1112;">
    <div class="col-span-6" id="idCol5" style="border-right: 2px solid #484848;">
        <p style="font-size: 40px;color:white;"> <?php echo get_the_title(); ?></p>

        <img src="https://cadonit.com/yulstay/wp-content/uploads/2023/06/close.png" id="closeIcon"
            onClick="closeButtonClick()" style="
    width: 40px;
    bottom: 0;
    display:none;
    margin:20px;
    position: absolute;">
        <img src="https://cadonit.com/yulstay/wp-content/uploads/2023/06/plus.png" onClick="plusButtonClick()"
            id="plusIcon" style="
    width: 40px;
    bottom: 0;
    margin:20px;
    position: absolute;
    left: 35%;
">
    </div>
    <!-- <div class="col-span-1">

    </div> -->
    <div class="col-span-6 col-scroll" id="idCol6" style="text-align: -webkit-center;">
        <img src="<?php echo $image_one; ?>" alt="">
        <img src="<?php echo $image_two; ?>" alt="">
        <img src="<?php echo $image_three; ?>" alt="">
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
    element2.classList.add("col-span-3");
    element2.classList.remove("col-span-6");
}

function closeButtonClick() {
    var element = document.getElementById("idCol6");
    var element2 = document.getElementById("idCol5");
    document.getElementById("plusIcon").style.display = "block";
    document.getElementById("closeIcon").style.display = "none";
    element.classList.add("col-span-6");
    element.classList.remove("col-span-9");
    element2.classList.add("col-span-5");
    element2.classList.remove("col-span-3");
}
</script>

<?php
get_footer();