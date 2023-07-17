<?php extract( $args ); ?>
<section id="section<?php echo $s; ?>" style="padding: 5% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible <?php echo $bg; ?> ">
	<div class="slash" style="position: absolute;top: -16px;left: calc( 50% - 9px);"><img src="<?php echo get_template_directory_uri(); ?>/images/Slash.svg" width="18" height="33" /></div>
   <div class="wrapper" style="overflow:visible;">
	   <div style="position: relative;">
			<div style="position: absolute;bottom: 0;left: 0;"><img src="<?php echo get_template_directory_uri(); ?>/images/corner-b-l.svg" width="80" height="80" /></div>
			<div style="position: absolute;top: 0;right: 0;"><img src="<?php echo get_template_directory_uri(); ?>/images/corner-t-r.svg" width="80" height="80" /></div>
			<div style="padding: 3% 0;">
				<div style="padding: 20px 8%;"><?php echo $content; ?></div>
			</div>
		</div>
	</div>
</section>
