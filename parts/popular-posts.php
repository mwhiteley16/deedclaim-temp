<section style="padding: 3% 0;">
	<div class="wrapper">
		<div>
		<h2 style="margin-bottom: 20px;">Recent Posts</h2>
		<?php 
		$popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
			while ( $popularpost->have_posts() ) : $popularpost->the_post();
			$excerpt = get_the_excerpt(); 
		?>
		  <div style="padding-bottom: 30px;">
			  <div class="flex-row-center phone-wrap">
			  	<div class="fifty" style="flex-grow:0;">
					 <strong><a class="no-underline" href="<?php the_permalink(); ?>" style="box-shadow: none;-webkit-box-shadow:none;"><?php the_title(); ?></a></strong>
					 <div><?php echo wp_trim_words( $excerpt, 8, '...'); ?></div>
				</div>
				<div class="no-phones">
					<a href="<?php the_permalink(); ?>" style="box-shadow: none;-webkit-box-shadow:none;text-decoration: none;" tabindex="-1;">
						<img class="arrow-link" style="display: inline-block;position: relative;padding-left: 20px;" src="<?php echo get_template_directory_uri(); ?>/images/link-arrow.svg" alt=" " width="26" height="14">
					</a>
				</div>
			  </div>
		   </div>
		<?php endwhile; ?>
			<div style="text-align: center;">
				<?php echo paginate_links(); ?>
			</div>
		</div>
	</div>
</section>
