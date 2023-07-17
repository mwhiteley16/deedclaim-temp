<?php 
extract( $args );
?>
<style>
	.post-img img {border-radius: 15px;}
</style>
<section id="section<?php echo $s; ?>" style="padding: 3% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible <?php echo $bg; ?>">
    <div class="wrapper">
         <!-- Content Section ------------------------------------------------------------------------>
		<div <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
            <!-- Text -->
            <div><?php echo $content; ?></div>
        </div>
		<?php
		$posts = get_sub_field('posts');
		if( $posts ): ?>
        <div class="flex-row phone-wrap">
			<?php foreach( $posts as $post ): 
			setup_postdata($post);
        		$terms = get_the_terms( $post->ID, 'category' );
				$categories = wp_list_pluck( $terms, 'name' );
				//$excerpt = get_post_field('post_excerpt');
				//if(!$excerpt) {$excerpt = get_the_content();}
			?>
			<div class="thirty-three">
				<div style="padding: 10px;">
					<a href="<?php the_permalink(); ?>" class="post-img" tabindex="-1">
						<?php if(has_post_thumbnail()){
							the_post_thumbnail('landscape-550', ['class' => 'theme-border box-shadow']);  
						} else { ?>
							<img src="/wp-content/themes/go-fish/images/Okera-default.svg" width="550" height="360" alt="Okera Logo" class="theme-border box-shadow" loading="lazy" />
						<?php } ?>
					</a>
					<div style="text-align: center;padding-top: 8px;font-weight: 600;font-size: 0.95rem;">
						<div class="cat" style="font-weight: 600;text-transform: uppercase;">
							<a style="text-decoration: none;" href="<?php echo esc_url( get_term_link( $terms[0] ) ); ?>"><?php echo $categories[0]; ?></a>
						</div>
					</div>
					<div style="text-align: center;">
						<a class="no-underline font-color" href="<?php the_permalink(); ?>">
						<p style="font-weight: 500;"><?php the_title(); ?></p>
						</a>
						<?php // echo wp_trim_words( $excerpt, 26, '...'); ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php wp_reset_postdata(); endif; ?>
    </div>
</section>