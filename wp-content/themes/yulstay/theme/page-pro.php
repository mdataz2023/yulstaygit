<?php
/*
	Template Name: Pro
*/
get_header(); 

?>
<div>
<div class="overflow-y-scroll">
<?php
for ($i = 1; $i <= 100000; $i++) {
    echo $i . PHP_EOL;
}
?>
</div>
</div>

<?php get_footer(); ?>