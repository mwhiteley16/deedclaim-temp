<?php get_header(); /* Template Name: Pricing */  
$above_footer = get_field('above_footer');
$oppage_id = get_queried_object_id();
$custom_heading = get_field("custom_heading", $oppage_id);
$faq = get_field("faq", $oppage_id);
$plans_info_copy = get_field("plans_info_copy", $oppage_id);
$plans = get_field("plans", $oppage_id);
?>
<main id="top" class="grey-bg">
<div id="heading">
    <div class="wrapper">
		<div class="flex-row-center sm-mobile-wrap">
			<div class="sixty">
				<div style="padding: 20px 0; text-align: center;">
					<?php if(!empty($custom_heading['heading'])){ ?>
					<h1 style="padding-bottom: 8px;"><?php echo $custom_heading['heading']; ?></h1>
					<?php } else { ?>
					<h1 style="padding-bottom: 8px;"><?php the_title(); ?></h1>
					<?php } ?>
					<?php if(!empty($custom_heading['subheading'])) { ?>
					<p style="color: #818181; font-size: 20px; padding: 0; margin: 0 0 24px 0;"><?php echo $custom_heading['subheading']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
    </div>
</div>


<?php if ( post_password_required() ) : // allows pw login form ?>
<div class="wrapper">
	<?php // No content intended for this section. 
	// It allows pages to be password protected by WordPress' default functionallity
	the_content();  ?>
</div>	
<?php endif; // End password login ?>
<?php if ( ! post_password_required() ) : // allows pages to be password protected by WordPress' default functionallity ?>


<section style="padding: 40px 0 5% 0;">
	<div class="wrapper">
		<div class="container-white">
			<div class="plans-grid">
				<?php foreach($plans as $plan): ?>
				<div class="pg-entry">
					<div class="pg-entry-info" style="text-align: center;padding: 0 0 32px 0;margin: 0 0 16px 0;border-bottom: 2px solid #000;">
						<h4><?php echo $plan['plan_name']; ?></h4>
						<?php if(!empty($plan['plan_name_subheading'])): ?><p><?php echo $plan['plan_name_subheading']; ?></p><?php endif; ?>
						<?php if(!empty($plan['above_price_copy'])): ?><p><?php echo $plan['above_price_copy']; ?></p><?php endif; ?>
						<h5 style="margin: 0 0 16px 0;padding: 0;font-weight: 600;font-size: 26px;line-height: 30px;">$<?php echo $plan['price']; ?></h5>
						<?php if(!empty($plan['cta_url'])): ?><p><a class="button" href="<?php echo $plan['cta_url']; ?>">Select this plan</a></p><?php endif; ?>
					</div>
					<div class="pg-entry-details">
						<?php echo $plan['plan_details']; ?>
					</div>
					<p class="more-details"><a href="#">More Details</a></p>
				</div>
				<?php endforeach; ?>
			</div>
			<?php if(!empty($plans_info_copy)): ?>
			<div class="plans-info">
				<?php echo $plans_info_copy; ?>
			</div>
			<p class="more-info-toggle"><a href="#">Show more</a></p>
			<?php endif; ?>
		</div>
	</div>
	<?php if(!empty($faq['heading'])): ?>
    <div class="wrapper nl-faq">
    	<div class="nl-faq-heading center">
			<h3><?php echo $faq['heading']; ?></h3>
		</div>
		<?php foreach($faq['faq_list'] as $faqe): ?>
		<div class="nl-faq-entry" style="margin:16px 0 32px 0;">
			<h4><?php echo $faqe['question']; ?></h4>
			<?php echo $faqe['answer']; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</section>



<?php if($above_footer):
get_template_part('parts/above-footer');
endif; //END above footer section ?>
<?php endif; // End password protected content ?>
</main>
<script>
	jQuery(document).on("click", ".more-info-toggle a", function(){
		jQuery(this).parent().toggleClass("active");
		jQuery(".plans-info").toggleClass("visible");
		return false;
	});
	jQuery(document).on("click", ".pg-entry .more-details a", function(){
		jQuery(this).parent().parent().toggleClass("visible");
		var text = jQuery(this).text();
    	jQuery(this).text(text == "Hide details" ? "More details" : "Hide details");
		return false;
	})
</script>
<?php get_footer(); ?>
