<?php 
extract( $args );
$bg_width = get_sub_field('bg_width');
$section_title = get_sub_field('section_title');
$show_slash = get_sub_field('show_slash');
?>
<section id="section<?php echo $s; ?>" style="padding: 5% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible <?php if ($bg_width == 'full') { echo $bg; } ?>">
	<?php if ($show_slash) { ?><div class="slash" style="position: absolute;top: -16px;left: calc( 50% - 9px);"><img src="<?php echo get_template_directory_uri(); ?>/images/Slash.svg" width="18" height="33" /></div><?php } ?>
    <div class="wrapper">
		<div class="flex-row phone-wrap animated wow fadeInUp <?php if ($bg_width == 'narrow') { echo $bg; } ?>" <?php if ($bg_width == 'narrow') { ?>style="padding: 5% 8%;position: relative;"<?php } else { ?>style="/*padding: 0 8%;*/position: relative;"<?php } ?>>
			<?php if($section_title) { ?>
			<div class="fourty" style="flex-shrink:1;">
			<?php echo $section_title; ?>
			</div>
			<?php } ?>
			<div class="sixty">
				<div>
					<?php echo $content; ?>
					<?php while( have_rows('buttons') ) : the_row();
						$button_text = get_sub_field('button_text'); 
						$button_url = get_sub_field('button_url');
						$icon = get_sub_field('icon');
						$custom_icon = get_sub_field('custom_icon');
						?>
					<a class="button content-button" style="width:85%;" href="<?php echo $button_url; ?>">
						<div class="flex-row-center" style="text-align:left;line-height: 1.6rem;">
							<?php if($icon != 'none'): ?>
								
								<div class="flex-row" style="min-width:40px;background:#fff;border:2px solid #FFD864; width: 40px;height: 40px;border-radius: 40px;margin-right: 10px;justify-content: center;">
									<?php if($icon == 'upload') { ?>
									<img src="<?php echo $custom_icon['url']; ?>" alt="<?php echo $custom_icon['alt']; ?>" style="max-width: 80%;" width="26" height="26" />
									<?php } ?>
								</div>
								
							<?php endif; ?>
							<div><?php echo $button_text; ?></div>
						</div>
					</a>
					<?php endwhile; ?>
            	</div>
			</div>
		</div>

    </div>
</section>
