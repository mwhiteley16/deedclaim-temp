<?php get_header(); 
$default_image = get_field('default_image', 'option'); ?>
<main id="top">
<section id="archive" style="padding: 3% 0;">
	<div class="wrapper">
		<div style="text-align:center;">
        <h1><?php echo single_term_title(); ?></h1>
    </div>
		<div class="flex-row flex-wrap" style="justify-content: center;">
		<?php while(have_posts()) {
		the_post(); 
			?>
			<div class="blog-tile thirty-three" style="flex-grow: 0;">
				<div style="padding: 10px;">
					<div class="image center" style="text-align: center;">
							<?php if(has_post_thumbnail()){
										the_post_thumbnail('landscape-550', ['class' => 'theme-border']);  
							} else { ?>
									<img src="<?php echo $default_image['url']; ?>" width="550" height="360" alt="<?php echo $default_image['alt']; ?>" class="theme-border" loading="lazy" />
							<?php } ?>
					</div>
					<div style="margin: 20px 0;">
						<a href="<?php the_permalink(); ?>" class="no-underline">
							<p style="text-align: center;"><?php the_title(); ?></p>
						</a>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="pagination" style="margin-bottom: 3%;">

			<div id="pagination" style="text-align: center;font-weight: 600;">

			<?php

			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?sf_paged=%#%',
				'current' => $query->query['paged'],
				'total' => $query->max_num_pages,
				'prev_text' => '<span style="padding-right:6px;"><img width="16px" height="16px" style="height: 1rem;position: relative;top: 3px;padding-right: 6px;" src="/wp-content/themes/fidelity/images/chevron-left-teal.svg" alt="Left Arrow">Previous Page </span><span> ... </span>',
				'next_text' => '<span style="padding-right:6px;">... </span><span> Next Page<img width="16px" height="16px" style="height: 1rem;position: relative;top: 3px;padding-left: 6px;" src="/wp-content/themes/fidelity/images/chevron-right-teal.svg" alt="Right Arrow"></span>'
			) );
			?>
			</div>


		</div>
		
	</div>
</section>
</main>
<?php get_footer(); ?>
