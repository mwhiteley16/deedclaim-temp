<?php get_header();  ?>
<?php while(have_posts()) {
			the_post();  ?>
<main id="top">
<?php if ( ! post_password_required() ) : 
	$author_id = get_the_author_meta( 'ID' ); 
	$author = get_the_author_meta( 'display_name', $author_id ); 
	$bio = get_the_author_meta( 'description', $author_id ); 
	$author_img = get_field('author_photo', 'user_' . $author_id);
	// Cropped Image size attributes.
		$size = 'square-300';
		$a_img = $author_img['sizes'][ $size ]; 
	$bio = get_the_author_meta( 'description', $author_id ); 
	$call_to_action = get_field('call_to_action');
	$custom_cta = get_field('custom_cta');
	$default_cta = get_field('default_cta', 'option');
	$sidebar_callout_cta = get_field('sidebar_callout_cta', 'option');
	$cta_bg = get_field('cta_bg');
	$show_rating = get_field('show_rating');
	$rating_embed = get_field('rating_embed', 'option');
	$custom_rating = get_field('custom_rating');
	$footer_rating = get_field('footer_rating', 'option');
	$footer_display = get_field('footer_display');
	$custom_fcontent = get_field('custom_fcontent');
	$authLinked = get_the_author_meta( 'linkedin', $author_id ); 
	$author_title = get_field('author_title', 'user_' . $author_id );
	$h1 = get_field('custom_h1');
	$hide_title = get_field('hide_title');
	$pub_date = get_the_date( 'M d, Y' );
	$up_date = get_the_modified_date( 'M d, Y' );
	$hide_author = get_field('hide_author');
	$hide_date = get_field('hide_date');
	$hide_breadcrumbs = get_field('hide_breadcrumbs');
	$hide_sidebar = get_field('hide_sidebar');
	$excerpt = get_the_excerpt();
	$above_footer = get_field('above_footer');
	$oppage_id = get_queried_object_id();
	$call_to_action_heading = get_field("call_to_action_heading", $oppage_id);
	$footer_custom_code = get_field("footer_custom_code", $oppage_id);
	$excerpt_visibility = get_field("excerpt_visibility", $oppage_id);
	$background_color = get_field('background_color');
	?>
	<style>
		#ez-toc-container ul li {line-height: 28px;}
		.avatar > img, img.avatar {border-radius: 100px; margin-right: 20px;}
		h2.short-underline {position: relative;padding-left: 10px;padding-right: 10px;}
		h2.short-underline:after {content: " ";background: #ffd864;position: absolute;height: 2px;width: 55px;left: 10px;top: 50px;}
		#sidebar a {box-shadow: none!important;-webkit-box-shadow:none!important;font-weight: 600;}
		#sidebar aside {padding: 5% 0;}
		#sidebar ul {margin: 0;}
		#sidebar li{list-style: none; border-bottom: 1px solid #e3e3e3;font-size: 0.9rem;padding: 10px;}
		.cta .button {box-shadow: 2px 2px 8px 2px rgba(0, 0, 0, .1);}
		.cta ul {display: inline-block;margin-left: 10px;}
		.cta li {text-align: left;}
		#breadcrumbs a, #breadcrumbs p, #breadcrumbs span {-webkit-box-shadow:none; box-shadow: none;font-size: 0.85rem;}
		<?php if(!$hide_sidebar) { ?>
		@media only screen and (min-width:1050px) {
			.main-content {padding-right: 5%;border-right: 1px solid #e3e3e3;}
			.sidebar {padding-left: 5%;}
		}
		<?php } ?>
	</style>
<div class="content <?php echo $background_color; ?>">
	<div class="wrapper">
		<div class="flex-row mobile-wrap">
			<div class="sixty main-content">
				<?php if(!$hide_breadcrumbs) :
					if ( function_exists('yoast_breadcrumb') ) {
					  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				endif;
				?>
				<?php if(!$hide_title) : ?>
				<h1 style="padding-bottom: 0.25em;"><?php if($h1) {echo $h1;} else {the_title();} ?></h1>
				<?php endif; ?>
				<?php if(has_excerpt()) { ?>
				<div class="excerpt" style="color: #818181;"><?php echo $excerpt; ?></div>
				<?php } ?>
				<?php if((!$hide_author) && (!$hide_date)) { ?>
				<div style="padding-bottom: 10px;padding-top: 15px;">
					<?php if(!$hide_author) { ?>
					<div class="post-meta flex-row-center">
						<?php if($a_img) { ?>
									<img src="<?php echo $a_img; ?>" width="60" height="60" alt="<?php echo $author; ?>" style="border-radius: 60px;" />
						<?php } else {
									echo get_avatar( get_the_author_email(), '60' );
						} ?>
					<?php } ?>
						<div class="info" style="text-align: left;padding-left: 15px;flex-grow: 1;line-height: 1.4rem;">
							<?php if(!$hide_author) { ?>
							<p style="font-size: 0.9rem;padding: 0;margin: 0;font-weight: 600;"><a class="no-underline" style="text-transform: capitalize; box-shadow: none;" href="<?php echo get_author_posts_url($author_id); ?>"><?php echo $author; ?></a></p>
							<p style="font-size: 0.9rem; padding: 0;margin: 0;"><?php echo $author_title; ?></p>
							<?php } ?>
							<?php if(!$hide_date) { ?>
							<p style="font-size: 0.9rem;padding: 0;margin: 0;">
									Published <?php echo $pub_date; ?>
									<?php if($pub_date != $up_date) { ?>
									<span style="color: #3082FF;"> | </span>
									Last updated <?php echo $up_date; ?>
									<?php } ?>
							</p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<div style="padding-bottom: 4%;"><?php the_content(); ?></div>
			</div>
			<?php if(!$hide_sidebar) { ?>
			<div class="twenty-five sidebar">
				<?php if($call_to_action != 'none') {  ?>
			  <div id="cta" style="padding-bottom: 5%;">
				  <div style="padding: 3% 0;">
					<div style="position: relative;" class=" <?php if(($cta_bg) && ($cta_bg!='white')): echo 'sdb-callout ' . $cta_bg; endif; ?>">
							
								<div style="text-align: center;font-size: 0.9rem;line-height: 1.2rem;">
									<?php if($call_to_action == 'default') {
										echo $default_cta;
									} else if($call_to_action == 'custom') {
										echo $custom_cta; 
									} ?>
								</div>
					</div>
					</div>
				</div>
				<?php  } ?>
				<?php if($show_rating == 'default'){ ?>
				<div class="grey-bg no-mobile" style="text-align: center;margin: 5% 0;">
				<?php echo $rating_embed; ?>
				</div>
				<?php } elseif($show_rating == 'custom'){ ?>
				<div class="grey-bg no-mobile p-no-pad" style="text-align: center;margin: 5% 0;padding: 20px;">
				<?php echo $custom_rating; ?>
				</div>
				<?php } ?>
				<?php get_sidebar( 'sidebar-1' ); ?>
			</div>
			<?php } ?>
		</div>
		
		
		
	</div>
</div>
<?php if(($bio) && ($footer_display == 'bio')): ?>
<div class="grey-bg">
	<div class="wrapper">
		<div style="padding: 5% 0;">
			<div class="flex-row phone-wrap">
				<div class="ten">
					<?php if($a_img) { ?>
										<img src="<?php echo $a_img; ?>" width="60" height="60" alt="<?php echo $author; ?>" style="border-radius: 60px;" />
							<?php } else {
										echo get_avatar( get_the_author_email(), '60' );
							} ?>
				</div>
				<div class="ninety">
					<div style="font-size: 16px;line-height: 1.5rem;"><?php echo $bio; ?></div>
					<?php if($authLinked) { ?>
					<div style="font-size: 0.9rem;">Follow on <a style="font-weight: 600;" href="<?php echo $authLinked; ?>">LinkedIn</a></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; //END author section ?>
<?php if(($bio) && ($footer_display == 'bioreview')): ?>
<div class="grey-bg">
	<div class="wrapper">
		<div style="padding: 5% 0;">
			<div class="flex-row phone-wrap">
				<div class="ten">
					<?php if($a_img) { ?>
										<img src="<?php echo $a_img; ?>" width="60" height="60" alt="<?php echo $author; ?>" style="border-radius: 60px;" />
							<?php } else {
										echo get_avatar( get_the_author_email(), '60' );
							} ?>
				</div>
				<div class="ninety">
					<div style="font-size: 16px;line-height: 1.5rem;"><?php echo $bio; ?></div>
					<?php if($authLinked) { ?>
					<div style="font-size: 0.9rem;">Follow on <a style="font-weight: 600;" href="<?php echo $authLinked; ?>">LinkedIn</a></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="border-top: 1px solid #e5e5e5;">
	<div class="wrapper">
		<div style="padding: 5% 0;text-align: center;">
			<?php echo $footer_rating; ?>
		</div>
	</div>
</div>
<?php endif; //END author and reviews section ?>
<?php if(($bio) && ($footer_display == 'biocode')): ?>
<div class="grey-bg">
	<div class="wrapper">
		<div style="padding: 5% 0;">
			<div class="flex-row phone-wrap">
				<div class="ten">
					<?php if($a_img) { ?>
										<img src="<?php echo $a_img; ?>" width="60" height="60" alt="<?php echo $author; ?>" style="border-radius: 60px;" />
							<?php } else {
										echo get_avatar( get_the_author_email(), '60' );
							} ?>
				</div>
				<div class="ninety">
					<div style="font-size: 16px;line-height: 1.5rem;"><?php echo $bio; ?></div>
					<?php if($authLinked) { ?>
					<div style="font-size: 0.9rem;">Follow on <a style="font-weight: 600;" href="<?php echo $authLinked; ?>">LinkedIn</a></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="border-top: 1px solid #e5e5e5;">
	<div class="wrapper">
		<div style="padding: 5% 0;text-align: center;">
			<h3><?php if(!empty($footer_custom_code['section_heading'])): echo $footer_custom_code['section_heading']; else: ?>View Our Reviews On TrustSpot<?php endif; ?></h3>
			<?php echo $footer_custom_code['custom_code']; ?>
		</div>
	</div>
</div>
<?php endif; //END author and reviews section ?>

<?php if($footer_display == 'review'): ?>
<div style="border-top: 1px solid #e5e5e5;">
	<div class="wrapper">
		<div style="padding: 5% 0;text-align: center;">
			<?php echo $footer_rating; ?>
		</div>
	</div>
</div>
<?php endif; //END rating section ?>
<?php if(($custom_fcontent) && ($footer_display == 'custom')): ?>
<div style="border-top: 1px solid #e5e5e5;">
	<div class="wrapper">
		<div style="padding: 5% 0;">
			<?php echo $custom_fcontent; ?>
		</div>
	</div>
</div>
<?php endif; //END rating section ?>
<?php if($above_footer):
get_template_part('parts/above-footer');
endif; //END above footer section ?>

<?php endif; // End password protected content ?>
</main>
<?php } ?>
<?php get_footer(); ?>
