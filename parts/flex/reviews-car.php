<?php
$additional_content = get_sub_field('additional_content');
extract( $args );
if( have_rows('reviews') ):
?>
<section id="section<?php echo $s; ?>" style="padding: 3% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="testimonials flexible <?php echo $bg; ?> animated fadeIn wow">
   <div class="wrapper" style="overflow:visible;">
         <div <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
         	<div><?php echo $content; ?></div>
        </div>
		<div class="rev-slider" >
			<?php while( have_rows('reviews') ) : the_row();
				$review = get_sub_field('review');
			?>
			<div>
				<div class="review-container">
					<div style="max-width: 500px;margin: 0 auto;padding: 0 5%;">
						<div class="center">
							<?php echo $review; ?>
						</div>
						
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<div class="rev-nav" style="max-width: 800px;margin: 0 auto;">
			<?php while( have_rows('reviews') ) : the_row();
				$reviewer = get_sub_field('reviewer');
			?>
			<div>
				<div class="center" style="padding: 10px 20px;">
					<div class="rev-button" style="border-radius: 50px;margin: 0 auto;padding: 10px;">
						<?php echo $reviewer; ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	   <div>
	   	<?php echo $additional_content; ?>
	   </div>
	</div>
</section>
<script defer>
jQuery(function($){
	$('.rev-slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
      arrows: false,
	  dots: false,
      autoplaySpeed: 4000,
	  adaptiveHeight: false,
	  asNavFor: '.rev-nav',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
		adaptiveHeight: true,
		arrows: false,
		dots: false
      }
    }
  ]

	});
	$('.rev-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
      arrows: false,
	  dots: false,
      autoplaySpeed: 4000,
	  adaptiveHeight: false,
	  asNavFor: '.rev-slider',
	  focusOnSelect: true,
	  centerMode: true,
	  centerPadding: '0px',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
		adaptiveHeight: true,
		arrows: false,
		dots: false
      }
    }
  ]

	});
});
</script>
<?php endif; ?>
