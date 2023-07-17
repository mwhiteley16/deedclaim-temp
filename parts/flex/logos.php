<?php extract( $args ); ?>
<section id="section<?php echo $s; ?>" style="padding: 3% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible <?php echo $bg; ?>">
   <div class="wrapper" style="overflow:visible;">
         <!-- Content Section ------------------------------------------------------------------------>
			<div <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
                    <!-- Text -->
                    <div><?php echo $content; ?></div>
            </div>

		<div class="flex-row-center flex-wrap">
		<?php while( have_rows('logos') ) : the_row();
			$image = get_sub_field('logo');
			$size = 'medium';
			$thumb = $image['sizes'][ $size ];
			$width = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ];
			?>
			<div class="twenty">
				<div style="padding: 20px 10%;text-align: center;">
					<img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" />
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
