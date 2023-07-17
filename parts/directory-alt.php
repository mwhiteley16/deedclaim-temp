<style>
	.pill-button {color: #818181;cursor: pointer;}
	.pill-button.active {background: #34AF41;color: #fff;cursor: default;}
	.pill-button:not(.active):hover {text-decoration: underline;}
	.dir {display: none;}
	.dir.active-d {display: block;}
	.product-select a.button {background: #fff;color: #474747;border: 1px solid #E5E5E5;}
	.product-select a.button:hover {background: #474747;color: #fff;}
</style>
<?php 
$oppage_id = get_queried_object_id();
$deed_selector = get_field("deed_selector", $oppage_id);
$plan_content = get_field('plan_content');
$plan_link = get_field('plan_link');
if( have_rows('directory_group') ): 
$dg = 1;
$count = count(get_field('directory_group'));
if ($count > 1) { 
?>
<div style="padding: 3% 0 0;">
	<div class="wrapper grey-bg">
		<div class="flex-row-center phone-wrap phone-center" style="justify-content: space-between;padding: 20px 0;">
			<div style="padding: 4px 8px;">
				<?php echo $plan_content; ?>
			</div> 
			<div class="flex-row-center" style="background:#fff;border-radius: 100px;box-shadow: 2px 4px 14px rgba(0, 0, 0, 0.06);padding: 4px;">
				<?php  while( have_rows('directory_group') ) : the_row();
				$sort_by_title = get_sub_field('sort_by_title'); 
				?>
				<div data-dir="<?php echo str_replace(' ', '-', strtolower($sort_by_title)); ?>" class="pill-button<?php if($dg==2){ echo ' active'; } ?>" style="border-radius: 100px;min-width: 120px;padding: 2px 10px;text-align: center;">
					<?php echo $sort_by_title; ?>
				</div>
				<?php $dg++; endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php } // End if more than 1 directory group ?>
<?php if(!empty($deed_selector['ds_product'][0]) || !empty($deed_selector['ds_state'][0])):?>
<div id="product" style="padding: 0 0 3%;" class="dir active-d">
	<div class="wrapper grey-bg product-select">
		<div class="flex-row-center flex-wrap" style="padding-bottom: 40px;">
			<?php foreach($deed_selector['ds_product'] as $dsp): ?>
			<div class="fifty" style="flex-grow: 0;">
				<a class="button" href="<?php echo $dsp['url']; ?>" style="padding: 10px;width: calc(100% - 40px);">
					<?php if(!empty($dsp['label'])): echo $dsp['label']; else: echo "NO LABEL!"; endif; ?>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
		<?php if($plan_link) { ?>
		<div style="padding-bottom: 40px;">
			<i class="fa-light fa-arrow-right-long second-color" style="padding-right: 5px;"></i> <a href="<?php echo $plan_link['url']; ?>" target="<?php echo $plan_link['target']; ?>"><?php echo $plan_link['title']; ?></a>
		</div>
		<?php } ?>
	</div>
</div>
<div id="state" style="padding: 0 0 3%;" class="dir">
	<div class="wrapper grey-bg product-select">
		<div class="flex-row-center flex-wrap" style="padding-bottom: 40px;">
			<?php foreach($deed_selector['ds_state'] as $dss): ?>
			<div class="twenty" style="flex-grow: 0;">
				<a class="button" href="<?php echo $dss['url']; ?>" style="padding: 10px;width: calc(100% - 40px);">
					<?php if(!empty($dss['label'])): echo $dss['label']; else: echo "NO LABEL!"; endif; ?>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
		<?php if($plan_link) { ?>
		<div style="padding-bottom: 40px;">
			<i class="fa-light fa-arrow-right-long second-color" style="padding-right: 5px;"></i> <a href="<?php echo $plan_link['url']; ?>" target="<?php echo $plan_link['target']; ?>"><?php echo $plan_link['title']; ?></a>
		</div>
		<?php } ?>
	</div>
</div>
<?php 
else: 
$dg=1;
while( have_rows('directory_group') ) : the_row();
	$sort_by_title = get_sub_field('sort_by_title'); 
	$number_of_columns = get_sub_field('number_of_columns'); 
	$pages_in_directory = get_sub_field('pages_in_directory'); 
	$cta_button = get_sub_field('cta_button'); 
	?>
<div id="<?php echo str_replace(' ', '-', strtolower($sort_by_title)); ?>" style="padding: 0 0 3%;" class="dir <?php if($dg==2){echo 'active-d';} ?>">
	<div class="wrapper grey-bg product-select">
		<div class="flex-row-center flex-wrap" style="padding-bottom: 40px;">
			<?php if( $pages_in_directory ): 
				foreach( $pages_in_directory as $page ): 
					$permalink = get_permalink( $page->ID );
					$title = get_the_title( $page->ID );
					$custom_field = get_field( 'field_name', $page->ID );
					?>
			<div class="<?php if($number_of_columns == 2) {echo 'fifty';} else if($number_of_columns == 3){echo 'thirty-three';} else if($number_of_columns == 4){echo 'twenty-five';} else if($number_of_columns == 5) {echo 'twenty';} ?>" style="flex-grow: 0;">
				
				<a class="button" href="<?php echo $permalink; ?>" style="padding: 10px;width: calc(100% - 40px);">
					<?php echo $title; ?>
				</a>
			
			
			</div>
			<?php endforeach; endif; ?>
		</div>
		<?php if($plan_link) { ?>
		<div style="padding-bottom: 40px;">
			<i class="fa-light fa-arrow-right-long second-color" style="padding-right: 5px;"></i> <a href="<?php echo $plan_link['url']; ?>" target="<?php echo $plan_link['target']; ?>"><?php echo $plan_link['title']; ?></a>
		</div>
		<?php } ?>
	</div>
</div>

<?php $dg++; endwhile; endif; ?>
<script defer>
// Services
var pBtn = document.getElementsByClassName("pill-button");
//var btns = document.getElementsByClassName("step-trigger");

for (var i = 0; i < pBtn.length; i++) {
  pBtn[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
	var dID = this.dataset.dir;
	var dShow = document.getElementById(dID);
	var currentD = document.getElementsByClassName("active-d");
    currentD[0].className = currentD[0].className.replace(" active-d", "");
	dShow.className += " active-d";
  });
}
</script>
<?php if( have_rows('check_features') ): ?>
<div style="padding-bottom: 3%;border-bottom: 2px solid #e5e5e5;">
	<div class="wrapper">
		<div class="flex-row sm-mobile-wrap">
			<?php while( have_rows('check_features') ) : the_row(); 
			$feature = get_sub_field('feature');
			?>
			<div class="twenty-five flex-row">
				<div class="accent-color" style="padding: 0.75rem 10px 0.75rem 20px;"><i class="fa-light fa-circle-check"></i></div>
				<div style="padding-right: 20px;font-size: 0.95rem;line-height: 1.3rem;"><?php echo $feature; ?></div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php endif; ?>
