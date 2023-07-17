<style>
	.pill-button {color: #818181;cursor: pointer;}
	.pill-button.active {background: #34AF41;color: #fff;cursor: default;}
	.pill-button:not(.active):hover {text-decoration: underline;}
	.dir {display: none;}
	.dir.active-d {display: block;}
</style>
<?php 
if( have_rows('directory_group') ): 
$dg = 1;
$count = count(get_field('directory_group'));
if ($count > 1) { 
?>
<div style="padding-bottom: 3%;">
	<div class="wrapper">
		<div class="flex-row-center phone-wrap phone-center" style="justify-content: center;padding: 20px 0;">
			<div style="padding: 4px 8px;">
				Sort by:
			</div> 
			<div class="flex-row-center" style="border-radius: 100px;box-shadow: 2px 4px 14px rgba(0, 0, 0, 0.06);padding: 4px;">
				<?php  while( have_rows('directory_group') ) : the_row();
				$sort_by_title = get_sub_field('sort_by_title'); 
				?>
				<div data-dir="<?php echo str_replace(' ', '-', strtolower($sort_by_title)); ?>" class="pill-button<?php if($dg==1){ echo ' active'; } ?>" style="border-radius: 100px;min-width: 120px;padding: 2px 10px;text-align: center;">
					<?php echo $sort_by_title; ?>
				</div>
				<?php $dg++; endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php } // End if more than 1 directory group ?>
<?php  
$dg=1;
while( have_rows('directory_group') ) : the_row();
	$sort_by_title = get_sub_field('sort_by_title'); 
	$number_of_columns = get_sub_field('number_of_columns'); 
	$pages_in_directory = get_sub_field('pages_in_directory'); 
	$cta_button = get_sub_field('cta_button'); 
	?>
<div id="<?php echo str_replace(' ', '-', strtolower($sort_by_title)); ?>" style="padding: 3% 0;" class="grey-bg dir <?php if($dg==1){echo 'active-d';} ?>">
	<div class="wrapper">
		<div class="flex-row-center flex-wrap" style="justify-content: center;">
			<?php if( $pages_in_directory ): 
				foreach( $pages_in_directory as $page ): 
					$permalink = get_permalink( $page->ID );
					$title = get_the_title( $page->ID );
					$custom_field = get_field( 'field_name', $page->ID );
					?>
			<div class="<?php if($number_of_columns == 2) {echo 'fifty';} else if($number_of_columns == 3){echo 'thirty-three';} else if($number_of_columns == 4){echo 'twenty-five';} else if($number_of_columns == 5) {echo 'twenty';} ?>" style="flex-grow: 0;">
				
				<a class="button alt" href="<?php echo $permalink; ?>" style="padding: 10px;width: calc(100% - 40px);">
					<?php echo $title; ?>
				</a>
			
			
			</div>
			<?php endforeach; endif; ?>
		</div>
	</div>
</div>

<?php $dg++; endwhile; ?>
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
<? endif; ?>
