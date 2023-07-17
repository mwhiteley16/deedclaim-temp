<?php get_header(); /*Template Name: Plans*/  
$above_footer = get_field('above_footer');
?>
<main id="top" class="grey-bg">
<?php get_template_part('parts/heading-simple'); ?>
<?php if ( post_password_required() ) : // allows pw login form ?>
<div class="wrapper">
	<?php // No content intended for this section. 
	// It allows pages to be password protected by WordPress' default functionallity
	the_content();  ?>
</div>	
<?php endif; // End password login ?>
<?php if ( ! post_password_required() ) : // allows pages to be password protected by WordPress' default functionallity ?>

<?php $plans = get_field('plans_to_show');
if( $plans ): ?>
<section id="plans" style="padding-bottom: 5%;">
    <div class="wrapper">
		<div class="flex-row sm-mobile-wrap plan-list" style="background: #fff;">
			<div class="thirty" style="flex-grow: 0;">
				<div class="sm-mobile-center" style="padding: 40px 30px 0;">
					<h2><span class="highlight" style="box-shadow: inset 0 -2px 0 0 #34AF41;\-webkit-box-shadow: inset 0 -2px 0 0 #34AF41;">Our pla</span>ns</h2>
				</div>
			</div>
			
			<?php foreach( $plans as $post ): 
					$title = get_the_title( );
					$plan_type = get_field( 'plan_type');
					$starting_price = get_field( 'starting_price');
					$url = get_field( 'url');
					?>
			<div class="twenty term-container">
				<div class="plan-title"><?php echo $title; ?></div>
				<div class="plan-type"><?php echo $plan_type; ?></div>
				<div class="plan-starts">Starts at</div>
				<div class="plan-price"><?php echo $starting_price; ?></div>
				<div class="sm-mobile-only">
					<?php $terms = get_terms( array(
						'taxonomy' => 'feature',
						'hide_empty' => true,
					) ); 
					foreach( $terms as $term ):  ?>
					<div style="font-size: 0.9rem;">
						<?php if( has_term( $term, 'feature' ) ) { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/check.svg" width="12" height="9" style="padding-right: 5px;"> <?php echo $term->name; ?>
						<?php } ?>
					</div>
					<?php endforeach; ?>
				</div>
				<a href="<?php echo $url; ?>" target="_blank" class="button">Select this plan</a>
			</div>
			<?php endforeach; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<section class="no-sm-mobile" style="padding-bottom: 5%;">
    <div class="wrapper">
		<h2 style="font-size: 1rem;">Features</h2>
		<div class="flex-row sm-mobile-wrap" style="background: #fff;">
			<div class="thirty flex-col" style="flex-grow: 0;">
				<?php $terms = get_terms( array(
					'taxonomy' => 'feature',
					'hide_empty' => false,
					'orderby'  => 'id',
					'order'    => 'ASC'
				) ); 
				foreach( $terms as $term ):  ?>
				<div class="plan-term-1">
					<div><?php echo $term->name; ?></div>
				</div>
				<?php endforeach; ?>
				<div class="plan-term-1">&nbsp;</div>
			</div>
			<?php 
			foreach( $plans as $post ): 
			setup_postdata($post); 
			$url = get_field( 'url', $post->ID );
			?>
			<div class="twenty term-container">
				<?php $terms = get_terms( array(
					'taxonomy' => 'feature',
					'hide_empty' => false,
					'orderby'  => 'id',
					'order'    => 'ASC'
				) ); 
				foreach( $terms as $term ):  ?>
				<div class="plan-term-2">
					<?php if( has_term( $term, 'feature' ) ) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/check.svg" width="14" height="11">
					<?php } ?>
				</div>
				<?php endforeach; ?>
				<div class="plan-term-2b">
					<a href="<?php echo $url; ?>" target="_blank" class="button" style="padding: 10px;">Select this plan</a>
				</div>
			</div>
			<?php endforeach; wp_reset_postdata(); ?>
		</div>
	</div>
</section>

<?php endif; // END if plans ?>
<?php get_template_part('parts/flex-simple'); ?>
<?php if($above_footer):
get_template_part('parts/above-footer');
endif; //END above footer section ?>
<?php endif; // End password protected content ?>
</main>
<?php get_footer(); ?>
