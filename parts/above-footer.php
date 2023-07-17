<?php 
$af_bg_color = get_field('af_bg_color', 'option');
$af_text_color = get_field('af_text_color', 'option');
$af_left_content = get_field('af_left_content', 'option');
$af_right_contnet = get_field('af_right_contnet', 'option');
?>
<style>
	.dark, .light .dark p, .light .dark a:not(.button) {color: #474747;}
	.fa-icon-holder i {color: #474747;}
</style>
<section id="footer-cta" class="<?php echo $af_text_color; ?>" style="margin-bottom:250px;background-color: <?php if($af_bg_color) { echo $af_bg_color; } else { echo '#fff';} ?>">
	<div class="wrapper" style="overflow: visible;">
		<div class="flex-row sm-mobile-wrap" style="position: relative; top:100px;">
			<div class="fourty">
				<div style="padding: 0 3%;"><?php echo $af_left_content; ?></div>
			</div>
			<div class="sixty">
				<div style="padding: 0 3%;"><?php echo $af_right_contnet; ?></div>
			</div>
		</div>
		<?php if( have_rows('af_blocks', 'option') ): ?>
		<div class="flex-row-stretch flex-wrap" style="position: relative; top:200px;">
			<?php while( have_rows('af_blocks', 'option') ) : the_row(); 
			$icon_type = 'solid';
			$icon_type = get_sub_field('icon_type');
			$icon_size = get_sub_field('icon_size');
			$icon = get_sub_field('icon');
			$title = get_sub_field('title');
			$content = get_sub_field('content');
			?>
			<div class="thirty box-shadow" style="margin: 1.5%;background: #fff;">
				<?php if($icon) { ?>
				<div class="center fa-icon-holder" style="padding: 10% 5%;color: #474747;">
					<i style="color: #474747;" class="fa-<?php echo $icon_type; ?> fa-<?php echo $icon_size; ?> fa-<?php echo $icon; ?>"></i>
				</div>
				<?php } ?>
				<?php if($title) { ?>
				<div style="padding: 1% 5%;color: #474747;font-weight: 600;">
					<?php echo $title; ?>
				</div>
				<?php } ?>
				<?php if($title && $content) { ?>
				<div style="padding: 1% 5%;">
					<div style="background:#474747;width: 34px;height: 1px;"></div>
				</div>
				<?php } ?>
				<?php if($content) { ?>
				<div class="dark" style="padding: 1% 5% 5%;color: #474747;">
					<?php echo $content; ?>
				</div>
				<?php } ?>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
