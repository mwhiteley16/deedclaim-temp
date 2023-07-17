<?php 
extract( $args );
$type_of_video = get_sub_field('type_of_video');
$video_id = get_sub_field('video_id');
?>
<section id="section<?php echo $s; ?>" style="padding: 3% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible <?php echo $bg; ?>">
    <div class="wrapper">
         <!-- Content Section ------------------------------------------------------------------------>
		<div <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
           <div><?php echo $content; ?></div>
        </div>
		<!-- Video -->
		<?php 
		if($video_id):
		if( $type_of_video == 'youtube' ) { ?>
		<div class="video-container center">
			<iframe title="YouTube video player" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" width="1100" height="620" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
		</div>
		<?php } ?>
		<?php if( $type_of_video == 'vimeo' ) { ?>
		<div class="video-container center">
			<iframe style="background: #000;" src="https://player.vimeo.com/video/<?php echo $video_id; ?>" width="1100" height="620" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
		</div>
		<?php } 
		endif; 
		?>
		<!-- Buttons -->
        <?php if( ($section_options) && (in_array('add-button', $section_options)) ) { ?>
	   		<div style="text-align: center;">
             	<?php if( have_rows('buttons') ): ?>
					<div class="flex-row flex-wrap" style="justify-content: center;">
						<?php while( have_rows('buttons') ) : the_row();
						$button = get_sub_field('button'); 
						?>
							<div style="margin: 10px 20px;"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" style="margin-left: 30px;box-shadow: none;"><?php echo $button['title']; ?></a></div>
						<?php endwhile; ?>
					</div>	
				<?php endif; ?>
		   </div>
       <?php } ?>
    </div>
</section>