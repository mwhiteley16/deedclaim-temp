<?php 
extract( $args );
?>
<section id="section<?php echo $s; ?>" style="padding: 3% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible <?php echo $bg; ?>">
    <div class="wrapper">
        <div <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
         	<div class="wow animated fadeInUp"><?php echo $content; ?></div>
        </div>
		<?php if( have_rows('reviews') ): 
		$rev = 1; ?>
		<div class="flex-row-stretch flex-wrap" style="padding-top: 30px;">
			<?php while( have_rows('reviews') ) : the_row(); 
			$review = get_sub_field('review');
			$reviewer = get_sub_field('reviewer');
			$product = get_sub_field('product');
			$date = get_sub_field('date');
			?>
			<div class="thirty light <?php if($rev % 2 == 0){echo 'alt-dark-bg-1';} else {echo 'alt-dark-bg-2';} ?>" style="margin: 0 1.5%;">
				<div style="padding: 15% 5% 5%;height: 80%;">
					<div class="flex-col" style="justify-content: space-between;height: 95%;">
						<div style="flex-basis: 35%;">&ldquo;<?php echo $review; ?>&rdquo;</div>
						<div style="font-size: 1rem;line-height: 1.5rem;">
							<div style="background:#fff;width: 34px;height: 1px;margin: 20px 0;"></div>
							<div><strong><?php echo $reviewer; ?></strong></div>
							<div><?php echo $product; ?></div>
						</div>
						<div class="flex-row" style="justify-content: space-between;font-size: 0.9rem;padding-top: 20px;">
							<div><?php echo $date; ?></div>
							<div><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i></div>
						</div>
					</div>
				</div>
			</div>
			<?php $rev++; endwhile; ?>
		</div>
		<?php endif; ?>
    </div>
</section>
