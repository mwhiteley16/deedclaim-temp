<?php 
extract( $args );
$bg_width = get_sub_field('bg_width');
$button = get_sub_field('button');
?>
<section id="section<?php echo $s; ?>" style="padding: 3% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible  <?php if ($bg_width == 'full') { echo $bg; } ?>">
    <div class="wrapper">
		<div class="<?php if ($bg_width == 'narrow') { echo $bg; } ?>" <?php if ($bg_width == 'narrow') { ?>style="padding: 5% 8%;position: relative;"<?php } ?>>
			<div <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
				<div class="wow animated fadeInUp"><?php echo $content; ?></div>
			</div>
			<?php if( have_rows('blocks') ): 
			$rev = 1; ?>
			<div class="flex-row-stretch flex-wrap" style="padding-top: 30px;">
				<?php while( have_rows('blocks') ) : the_row(); 
				$icon_type = get_sub_field('icon_type');
				$icon_size = get_sub_field('icon_size');
				$icon = get_sub_field('icon');
				$title = get_sub_field('title');
				$title_link = get_sub_field('title_link');
				$content = get_sub_field('content');
				?>
				<div class="thirty <?php if($bg == 'white-bg') { echo 'grey-bg'; } else { echo 'white-bg'; } ?>" style="margin: 1.5%;">
					<?php if($icon) { ?>
					<div class="center fa-icon-holder" style="padding: 10% 5%;">
						<i style="color: #474747;" class="fa-<?php echo $icon_type; ?> fa-<?php echo $icon_size; ?> fa-<?php echo $icon; ?>"></i>
					</div>
					<?php } ?>
					<?php if($title_link) { ?><a href="<?php echo $title_link; ?>"><?php } ?>
					<?php if($title) { ?>
					<div style="padding: <?php if($icon) { echo '1%'; } else {echo '5%';} ?> 5% 1%;font-weight: 600;">
						<?php echo $title; ?>
					</div>
					<?php } ?>
					<?php if($title_link) { ?></a><?php } ?>
					<?php if($title && $content) { ?>
					<div style="padding: 1% 5%;">
						<div style="background:#474747;width: 34px;height: 1px;"></div>
					</div>
					<?php } ?>
					<?php if($content) { ?>
					<div  style="padding: 1% 5% 5%;color: #474747;">
						<?php echo $content; ?>
					</div>
					<?php } ?>
				</div>
				<?php endwhile; ?>
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
