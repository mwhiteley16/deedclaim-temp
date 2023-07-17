<?php get_header(); ?>
<main id="top">
<?php
    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	$authbio = $curauth->description;;
	$authTwitter = $curauth->twitter;
	$authFB = $curauth->facebook;
	$authLinked = $curauth->linkedin;
	$bio = $curauth->description;
	$author_id = get_the_author_meta( 'ID' ); 
	$author_img = get_field('author_photo', 'user_' . $curauth->ID);
	// Cropped Image size attributes.
		$size = 'square-300';
		$a_img = $author_img['sizes'][ $size ];
	$author_title = get_field('author_title', 'user_' . $curauth->ID);
	$count = count_user_posts($curauth->ID);
  ?>
<style>
	.avatar {border-radius: 200px;}
	.arrow-link:hover {-webkit-filter: invert(0%) sepia(0%) saturate(0%) hue-rotate(7deg) brightness(0%) contrast(102%);
    filter: invert(0%) sepia(0%) saturate(0%) hue-rotate(7deg) brightness(0%) contrast(102%);}
	h1.short-underline {position: relative;}
	h1.short-underline:after {content: " ";background: #ffd864;position: absolute;height: 6px;width: 125px;left: 0;    bottom: 0.72em;z-index: -1;}
	h2.short-underline {position: relative;}
	h2.short-underline:after {content: " ";background: #ffd864;position: absolute;height: 2px;width: 55px;left:0;top: 45px;}
	@media only screen and (min-width: 601px) and (max-width: 800px) {
		.thirty {flex-basis: 47%;}
		.phone-wrap .fifty {flex-basis: 80%;}
	}
	@media only screen and (max-width:800px) {
		h1.short-underline:after {display: none;}
	}
</style>
<section class="grey-bg" style="padding: 3% 0;">
	<div class="wrapper">
		<div class="flex-row-center sm-mobile-wrap">
			<div class="thirty" style="text-align: center;">
				<div id="author-info" style="text-align: center;padding: 5% 0;">

					<?php if($a_img) { ?>
								<img src="<?php echo $a_img; ?>" width="150" height="150" alt="<?php echo $author; ?>" style="border-radius: 150px;" />
							<?php } else {
								echo get_avatar($curauth->ID, 150 ); 
					} ?>
					<?php if($authLinked) { ?>
					<div class="social" style="padding-top: 10px;">
						<div style="font-size: 0.9rem;">Follow on <a style="font-weight: 600;" href="<?php echo $authLinked; ?>">LinkedIn</a></div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="seventy sm-mobile-center">
				<h1><?php echo $author_title . '<br />' . $curauth->display_name; ?></h1>
				<?php if($bio) { ?>
				<div style="padding-bottom: 3%">
					<p><?php echo $bio; ?></p>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<section style="padding: 3% 0;">
	<div class="slash" style="position: absolute;top: -16px;left: calc( 50% - 9px);display: none;"><img src="<?php echo get_template_directory_uri(); ?>/images/Slash.svg" width="18" height="33" /></div>
	<div class="wrapper">
		<?php if ( have_posts() ) :  ?>
		<div>
		<h2 style="margin-bottom: 20px;"><?php echo $count; ?> Published Articles</h2>
		<?php while ( have_posts() ) : the_post(); 
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
	<?php endif; ?>
	</div>
</section>


</main>
<?php get_footer(); ?>
