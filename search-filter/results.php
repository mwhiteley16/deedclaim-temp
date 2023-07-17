<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() )
{
	?>				
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		$pub_date = get_the_date( 'M d, Y' );
		?>
			<div style="padding: 3% 0;">
				<div style="font-size: 0.85rem;line-height: 1rem;"><?php echo $pub_date; ?></div>
				<a href="<?php the_permalink(); ?>">
					<h2><?php the_title(); ?></h2>
				</a>
				<div><?php echo wp_trim_words( get_the_excerpt(), 25, '...'); ?></div>
				<div style="padding: 20px 0;"><a class="button outline" href="<?php the_permalink(); ?>">Continue Reading</a></div>
			</div>
		<?php
	}
	?>
	<div style="text-align: center;">
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
	<?php
}
else
{
	echo "No Results Found";
}
?>