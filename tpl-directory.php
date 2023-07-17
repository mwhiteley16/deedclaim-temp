<?php get_header(); /*Template Name: Directory*/  
$above_footer = get_field('above_footer');
?>
<main id="top">
<?php get_template_part('parts/heading-simple'); ?>
<?php if ( post_password_required() ) : // allows pw login form ?>
<div class="wrapper">
	<?php // No content intended for this section. 
	// It allows pages to be password protected by WordPress' default functionallity
	the_content();  ?>
</div>	
<?php endif; // End password login ?>
<?php if ( ! post_password_required() ) : // allows pages to be password protected by WordPress' default functionallity ?>
	<?php get_template_part('parts/directory'); ?>
	<?php get_template_part('parts/popular-posts'); ?>
<?php if($above_footer):
get_template_part('parts/above-footer');
endif; //END above footer section ?>
<?php endif; // End password protected content ?>
</main>
<?php get_footer(); ?>