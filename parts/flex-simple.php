<?php if( have_rows('content_block') ): ?>
<?php
$s = 1;
while( have_rows('content_block') ) : the_row();
	$section_options = get_sub_field('section_options'); 
	$bg = get_sub_field('background'); 
	$content = get_sub_field('content'); 
	$content_width = get_sub_field('content_width');
	$padding = get_sub_field('padding');

$args = array(
    'section_options' => $section_options,
    'bg' => $bg,
	'content' => $content,
	'content_width' => $content_width,
	'padding' => $padding,
	's' => $s
);

if( get_row_layout() == 'general-content' ):
	$image_orientation = get_sub_field('image_orientation'); 
	$image = get_sub_field('image'); 
	$number = get_sub_field('number'); 	
?>

<section id="section<?php echo $s; ?>" style="padding: 5% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="simple-block flexible <?php echo $bg; ?>">
   <div class="wrapper" style="overflow:visible;">
		<div class="animated fadeInUp wow <?php if( ($section_options) && (in_array('add-image', $section_options))  ) { ?>flex-row-center<?php } ?> sm-mobile-wrap<?php if( $image_orientation == 'left') { ?> row-reverse<?php }  ?>">
            <!-- Content Section ------------------------------------------------------------------------>
			<div <?php if( ($section_options) && (in_array('add-image', $section_options)) ) { ?>class="fifty wow animated fadeInUp" <?php } else if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
                <div <?php if( ($section_options) && (in_array('add-image', $section_options)) ) { ?>class="right-pad"<?php } ?>>
                    <!-- Text -->
                    <div class="sm-mobile-center<?php if($number) { echo ' flex-row'; } ?>">
						<?php if($number) { ?>
						<div class="flex-row" style="min-width: 100px;font-size: 60px;white-space: nowrap;padding-top: 20px;font-weight: 700;">
							<div><?php echo $number; ?></div>
							<div style="background: #474747; height: 3px;width: 55px;margin: 15px;">&nbsp;</div>
						</div>
						<?php } ?>
						<div>
						<?php echo $content; ?>
						<!-- Buttons -->
						<?php if( ($section_options) && (in_array('add-button', $section_options)) ) { ?>
							<?php if( have_rows('buttons') ): ?>
								<div class="flex-row flex-wrap" style="padding-top: 10px;">
									<?php while( have_rows('buttons') ) : the_row();
										$button = get_sub_field('button'); 
									?>
											<div class="sm-mobile-center"><a class="button content-button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></div>
								<?php endwhile; ?>
								</div>	
							<?php endif; ?>
						<?php } ?>
						</div>
					</div>

                </div>
            </div>
            <!-- Image Section ------------------------------------------------------------------------>
            <?php if( ($section_options) && (in_array('add-image', $section_options)) ) { ?>
            <div class="fifty">
                <div class="image wow animated fadeInUp" style="position: relative;width: 100%;max-width: 500px;margin: 0 auto;text-align: center;">
						<?php
						// Cropped Image size attributes.
						$size = 'max-500';
						$cropped_img = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
						if($width == 1) {
							$width = 500;
						}
						?>
						<!-- Cropped Image -->
              	    	<img loading="lazy" src="<?php echo $cropped_img; ?>" alt="<?php echo $image['alt']; ?>" style="max-width:100%;display: block;height: auto;" width="<?php echo $width; ?>"  height="<?php echo $height; ?>">
                    
                </div> <!-- END standard image -->
				
			</div>	
            <?php } // End Image Section ?>
			
        </div>
   </div>
</section>

<?php 
elseif( get_row_layout() == 'simple-content' ):
get_template_part('parts/flex/simple-content', null, $args );

elseif( get_row_layout() == 'call-out' ): 
get_template_part('parts/flex/call-out', null, $args ); 

elseif( get_row_layout() == 'logos' ): 
get_template_part('parts/flex/logos', null, $args ); 

elseif( get_row_layout() == 'reviews-block' ):
get_template_part('parts/flex/reviews-block', null, $args );

elseif( get_row_layout() == 'cols-c-icons' ): 
get_template_part('parts/flex/cols-c-icons', null, $args ); 

elseif( get_row_layout() == 'cols-icon-block' ): 
get_template_part('parts/flex/cols-icon-block', null, $args ); 

elseif( get_row_layout() == 'reviews-car' ):
get_template_part('parts/flex/reviews-car', null, $args ); 

elseif( get_row_layout() == 'faqs' ):
get_template_part('parts/flex/faqs', null, $args );

endif; 
$s++; 
endwhile; 
endif; 
?>
