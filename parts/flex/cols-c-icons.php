<?php 
extract( $args );
$bg_width = get_sub_field('bg_width');
$button = get_sub_field('button');
?>
<section id="section<?php echo $s; ?>" style="padding: 3% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible  <?php if ($bg_width == 'full') { echo $bg; } ?>">
    <div class="wrapper">
		<div class="<?php if ($bg_width == 'narrow') { echo $bg; } ?>" <?php if ($bg_width == 'narrow') { ?>style="padding: 5% 8%;position: relative;"<?php } else { ?>style="padding: 0 8%;position: relative;"<?php } ?>>
			<div <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
				<div class="wow animated fadeInUp"><?php echo $content; ?></div>
			</div>
			<?php if( have_rows('icons_with_text') ): 
			$rev = 1; ?>
			<div class="flex-row-stretch flex-wrap" style="padding-top: 30px;">
				<?php while( have_rows('icons_with_text') ) : the_row(); 
				$icon_source = get_sub_field('icon_source');
				$icon_link = get_sub_field('icon_link');
				$icon_bg_color = get_sub_field('icon_bg_color');
				$image = get_sub_field('image');
					$size = 'thumbnail';
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
    				$height = $image['sizes'][ $size . '-height' ];
				$icon = get_sub_field('icon');
				$icon_type = get_sub_field('icon_type');
				$icon_size = get_sub_field('icon_size');
				$text = get_sub_field('text');
				?>
				<div class="thirty" style="margin: 0 1.5%;">
					<div>
						<?php if($icon_link) { ?><a href="<?php echo $icon_link; ?>"><?php } ?>
						<div class="center box-shadow" style="width: 123px; height: 123px;margin:20px auto;background: <?php echo $icon_bg_color; ?>; padding: 20px; display:flex; justify-content:center; align-items:center;">
						<?php if($icon_source == 'image') { ?>
							<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
						<?php } else { ?>
							<i style="color: #474747;" class="fa-<?php echo $icon_type; ?> fa-<?php echo $icon_size; ?> fa-<?php echo $icon; ?>"></i>
						<?php } ?>
						</div>
						<?php if($icon_link) { echo '</a>';} ?>
						<div class="center"><?php echo $text; ?></div>
					</div>
				</div>
				<?php $rev++; endwhile; ?>
			</div>
			<?php endif; ?>
			<?php if($button) { ?>
			<div class="center">
				<a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><i class="fa-light fa-arrow-right-long" style="padding-right:5px;"></i> <?php echo $button['title']; ?></a>
			</div>
			<?php } ?>
		</div>
    </div>
</section>
