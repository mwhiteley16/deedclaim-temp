<?php 
$heading_type = get_field('heading_type'); 
$heading_text = get_field('heading_text'); 
$heading_image = get_field('heading_image'); 
?>
<?php if(($heading_type == 'simple') || ($heading_type == 'full')): ?>
<div id="heading">
    <div class="wrapper" style="">
		<div class="flex-row-center sm-mobile-wrap">
			<?php if($heading_type == 'simple') { ?>
			<div class="fourty">
			</div>
			<?php } ?>
			<div class="sixty">
				<div style="padding:20px 5px;">
					<?php if($heading_text){ ?>
					<div><?php echo $heading_text; ?></div>
					<?php } else { ?>
					<h1><?php the_title(); ?></h1>
					<?php } ?>
				</div>
			</div>
			<?php if($heading_type == 'full') { ?>
			<div class="fourty">
				<div style="padding: 5%;">
					<img src="<?php echo $heading_image['url']; ?>" alt="<?php echo $heading_image['alt']; ?>" width="<?php echo $heading_image['width']; ?>" height="<?php echo $heading_image['height']; ?>" />
				</div>
			</div>
			<?php } ?>
		</div>
    </div>
</div>
<?php elseif($heading_type == 'pf'): 
get_template_part('parts/above-footer');
endif; ?>
