<?php get_header(); /* Template Name: Our Team */  
$above_footer = get_field('above_footer');
$team_title = get_field('team_title');
$c_button = get_field('c_button');
$bottom_text = get_field('bottom_text');
$bottom_image = get_field('bottom_image');
?>
<main id="top">
	<style>
		.bottom-text {position: absolute;left: 50px;right: 50px;top: -15%;}
		.bottom-img {max-width: 90%;margin: 0 auto;}
		<?php if($bottom_text) { ?>
			.bottom-section {margin-top:15%;}
		<?php } ?>
		@media only screen and (min-width:1150px) {
			<?php if($bottom_text) { ?>
				.bottom-section {margin-top:10%;}
			<?php } ?>
		}
		@media only screen and (min-width:1450px) {
			.bottom-text {position: absolute;left: 0;right: 0;top: -15%;}
			.bottom-img {max-width: 90%;margin: 0 auto;}
		}
	</style>
<?php get_template_part('parts/heading-simple'); ?>
<?php if ( post_password_required() ) : // allows pw login form ?>
<div class="wrapper">
	<?php // No content intended for this section. 
	// It allows pages to be password protected by WordPress' default functionallity
	the_content();  ?>
</div>	
<?php endif; // End password login ?>
<?php if ( ! post_password_required() ) : // allows pages to be password protected by WordPress' default functionallity ?>
	
	<section id="team" class="our-team grey-bg" style="padding: 3% 0;">
		<?php if($c_button){ ?>
		<div class="wrapper c-button" style="padding-top:0;padding-bottom:0;position: absolute;right: 0;top: -35px;">
		<a class="button" href="<?php echo $c_button['url']; ?>" target="<?php echo $c_button['target']; ?>"><?php echo $c_button['title']; ?> <img src="<?php echo get_template_directory_uri(); ?>/images/b-arrow.png" alt=" " width="22" height=""></a>
		</div>
		<?php } ?>
 	<div class="wrapper">
		<div><?php echo $team_title; ?></div>
		<div class="flex-row-stretch flex-wrap sm-mobile-wrap" style="justify-content: space-between;">
		<?php
		$team = get_field('team');
		if( $team ): ?>
			<?php foreach( $team as $post ): 
			setup_postdata($post); 
			$title = get_field('title');
			?>
			<div class="thirty center white-bg" style="flex-grow: 0;margin-bottom: 10px;">
				<div style="padding: 5% 2% 0;">
					<div class="center" style="position: relative;margin: 0 auto;padding: 5% 20%;">
						<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('square-300', ['style' => 'border-radius:300px;']); 
						} else {
							echo '<img src="<?php echo get_template_directory_uri(); ?>/images/no-picture.jpeg" alt="No Picture" width="300" height="300" style="border-radius:300px;" />';
						}
						?>
					</div>
					<h3 style="padding-bottom: 0;"><?php the_title(); ?></h3>
					<p style="padding-top: 0;"><?php echo $title; ?></p>
					<div style="text-align: left;padding: 0 20px 5%;font-size: 1rem;line-height: 1.4rem;"><?php the_content(); ?></div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php 
			// Reset the global post object so that the rest of the page works correctly.
			wp_reset_postdata(); ?>
		<?php endif; ?>
    	</div>
	</div>
</section>
<?php if($bottom_text || $bottom_image) { ?>
<section class="bottom-section" style="padding: 3% 0;position: relative;">
	<?php if($bottom_text) { ?>
	<div class="bottom-text">
		<div class="wrapper">
			<div class="grey-bg">
				<div class="narrow" style="padding: 5%;">
				<?php echo $bottom_text; ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="bottom-img">
		<?php if($bottom_image) { ?>
		<div style="background: url('<?php echo $bottom_image; ?>') center no-repeat;background-size:cover;min-height:400px;"></div>
		<?php } ?>
	</div>	
</section>
<?php } ?>
<?php get_template_part('parts/flex-simple'); ?>
<?php if($above_footer):
get_template_part('parts/above-footer');
endif; //END above footer section ?>
<?php endif; // End password protected content ?>
</main>
<?php get_footer(); ?>
