<?php get_header(); 
$sf_id = 1148; // Add Search and Filter ID here
$h1 = get_field('custom_h1');
?>
<main id="top">
<style>
#heading h1 {padding-bottom: 0.25rem;}
#heading p {font-size: 1.5rem;}
h2 {font-size: 28px;}
select.sf-input-select {
    min-width: 220px!important;
}
li.sf-field-search input {
	background: url(<?php echo get_template_directory_uri(); ?>/images/search-icon.svg) no-repeat calc(100% - 10px) 50%;
	-moz-appearance: none; 
	-webkit-appearance: none; 
	appearance: none;
}
.searchandfilter ul {margin: 0;}
/* Phones */
@media only screen and (max-width: 600px) { 
	.searchandfilter ul {margin: 0;padding: 0;}	
}
@media only screen and (min-width:800px) {
	div#archive {padding-right: 50px;}
}
</style>
<section>
	<div class="wrapper">
		<h1 style="padding-bottom: 0.25em;"><?php if($h1) {echo $h1;} else {the_title();} ?></h1>
		<div class="flex-row sm-mobile-wrap">
			<div id="archive" class="eighty">
				<?php echo do_shortcode('[searchandfilter id="' . $sf_id . '" show="results"]'); ?>
			</div>
			<div class="twenty">
				<div><?php echo do_shortcode('[searchandfilter id="' . $sf_id . '"]'); ?></div>
				<div><?php get_sidebar( 'sidebar-1' ); ?></div>
			</div>
		</div>
	</div>
</section>
<?php if($above_footer):
get_template_part('parts/above-footer');
endif; //END above footer section ?>
</main>
<?php get_footer(); ?>
