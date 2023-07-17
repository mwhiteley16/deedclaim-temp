<?php get_header(); ?>
<?php while(have_posts()) {
			the_post();  ?>
<main id="top">
<?php if ( ! post_password_required() ) : ?>
<section class="content">
	<div class="wrapper">
		<?php the_content(); ?>
	</div>
</section>
<?php endif; // End password protected content ?>
</main>
<?php } ?>
<?php get_footer(); ?>