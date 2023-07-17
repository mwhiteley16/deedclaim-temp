<?php 
	$footer_logo = get_field('footer_logo', 'option');
		$footer_logo_type = get_field('footer_logo_type', 'option');
		if($footer_logo_type == 'svg') {
			$footer_logo_width = get_field('footer_logo_width', 'option');
			$footer_logo_height = get_field('footer_logo_height', 'option');
		} else {
			$footer_logo_width = $footer_logo['width'];
			$footer_logo_height = $footer_logo['height'];
		}
	$facebook = get_field('facebook', 'option');
	$twitter = get_field('twitter', 'option');
	$linkedin = get_field('linkedin', 'option');
	$instagram = get_field('instagram', 'option');
	$youtube = get_field('youtube', 'option');
	$footer_text = get_field('footer_text', 'option');
	$f_disclosures = get_field('disclosures', 'option');
	$footer_options = get_field('footer_options', 'option');
	$copyright = get_field('copyright', 'option');
	
?>
	<footer style="border-top: 2px solid #e5e5e5;">
		<div class="wrapper" style="margin: 0 auto;">
			<div class="flex-row flex-wrap top-footer" style="padding: 5% 0;justify-content: space-between;">
				<div class="fifteen col1 phones-center">
					<div>
					<?php if( !empty( $footer_logo ) ): ?>
						<div>
						<a href="<?php echo get_bloginfo('url'); ?>">
							<img loading="lazy" style="position: relative;left: -5px;max-width: 200px;height: auto;" src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>" width="<?php echo $footer_logo_width; ?>"  height="<?php echo $footer_logo_height; ?>" />
						</a>
						</div>
					<?php endif; ?>
						<div>
						<?php echo $footer_text; ?>
						</div>
                	</div>       
				</div>
				<?php if ( has_nav_menu( 'footerMenu1' ) ) { ?>
				<div class="twenty-five col2 no-print phones-center">
					<div class="content" style="padding: 0 10px;">
						<p><strong>
								<?php
								$locations = get_nav_menu_locations();
								$menu_ID = $locations['footerMenu1'];
								$nav_menu = wp_get_nav_menu_object( $menu_ID );
								echo $nav_menu->name; ?>
								</strong></p>
								<?php
								wp_nav_menu(array(
								'theme_location' => 'footerMenu1'
								))
								?>
					</div>
				</div>
				<?php } 
				if ( has_nav_menu( 'footerMenu2' ) ) { ?>
				<div class="twenty col3 no-print phones-center">
					<div class="content" style="padding: 0 10px;">
						<p><strong>
								<?php
								$locations = get_nav_menu_locations();
								$menu_ID = $locations['footerMenu2'];
								$nav_menu = wp_get_nav_menu_object( $menu_ID );
								echo $nav_menu->name; ?>
								</strong></p>
								<?php
								wp_nav_menu(array(
								'theme_location' => 'footerMenu2'
								))
								?>
					</div>
				</div>
				<?php } 
				if ( has_nav_menu( 'footerMenu3' ) ) { ?>
				<div class="twenty col4 no-print phones-center">
					<div class="content" style="padding: 0 10px;">
						<p><strong>
								<?php
								$locations = get_nav_menu_locations();
								$menu_ID = $locations['footerMenu3'];
								$nav_menu = wp_get_nav_menu_object( $menu_ID );
								echo $nav_menu->name; ?>
								</strong></p>
								<?php
								wp_nav_menu(array(
								'theme_location' => 'footerMenu3'
								))
								?>
					</div>
				</div>
				<?php } ?>
				<div class="twenty col5 no-print" style="flex-grow: 0;">
					<?php if ( has_nav_menu( 'footerMenu4' ) ) { ?>
							<p><strong>
									<?php
									$locations = get_nav_menu_locations();
									$menu_ID = $locations['footerMenu4'];
									$nav_menu = wp_get_nav_menu_object( $menu_ID );
									echo $nav_menu->name; ?>
									</strong></p>
									<?php
									wp_nav_menu(array(
									'theme_location' => 'footerMenu4'
									))
									?>
					<?php } ?>
					<div class="social">
						<?php if($facebook || $twitter || $linkedin || $youtube || $instagram) { ?>
							<p class="social-links-title">Follow Us</p>
							<?php } ?>
						<p class="social-links">
							<?php if(!empty($facebook)): ?>
							<a href="<?php echo $facebook; ?>" target="_blank" class="fb">Facebook</a>
							<?php endif; ?>
							<?php if(!empty($linkedin)): ?>
							<a href="<?php echo $linkedin; ?>" target="_blank" class="li">LinkedIn</a>
							<?php endif; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer wrapper" id="f-disclosures" style="color: #676767;font-size: 0.9rem;overflow: hidden;">
			<div style="padding: 2% 0 1% 0; line-height: 1.6rem;margin: 0 auto;">
				<?php echo $f_disclosures; ?>
				<div class="copyright center" style="text-align: center; margin-top: 20px;font-size:0.75rem;line-height: 1rem;">
				<?php if($copyright) {
					echo $copyright;
				} else { ?>
					<p>©<?php echo do_shortcode('[year]'); ?> <?php bloginfo( 'name' ); ?>, All Rights Reserved.</p>
				<?php } ?>
				</div>
			</div>
		</div>
	</footer>
	<script>
		if(jQuery("body").hasClass("logged-in") && jQuery(".gf_page_steps").length > 0) {
			jQuery(".gform_wrapper").addClass("form-w-sidebar");
		}
	</script>
<?php wp_footer(); ?>
</body>
</html>