<!DOCTYPE html>
<html <?php language_attributes(); ?> id="html" style="overflow-x:hidden;">
	<head>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
		<meta charset="<?php bloginfo('charset') ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<?php wp_head(); ?>
		<?php 
		$header_cta_1_bg = get_field('header_cta_1_bg');
		if(!$header_cta_1_bg) {
			$header_cta_1_bg = get_field('header_cta_1_bg', 'option');
		}
		$header_cta_2_color = get_field('header_cta_2_color');
		if(!$header_cta_2_color) {
			$header_cta_2_color = get_field('header_cta_2_color', 'option');
		}
		?>
		<style>
			header a.cta-1 {background-color: <?php echo $header_cta_1_bg; ?>;}
			.cta-2 {color: <?php echo $header_cta_2_color; ?>;}
		</style>
	</head>
<body <?php body_class(); ?>>
	<?php 
	$home_link = get_field('home_link', 'option'); 
	if(!$home_link){
		$home_link = get_bloginfo('url');
	}
	$logo_type = get_field('logo_type', 'option'); 
	$logo = get_field('logo', 'option'); 
	if($logo_type == 'svg') {
		$logo_width = get_field('logo_width', 'option'); 
		$logo_height = get_field('logo_height', 'option'); 
	} else {
		$logo_width = esc_attr($logo['width']);
		$logo_height = esc_attr($logo['height']);
	}

	$alert_text = get_field('alert_text');
	$alert_link = get_field('alert_link');
	
	$hide_preheader = get_field('hide_preheader');
	if(!$hide_preheader):
		$login_1 = get_field('custom_login_1');
		if(!$login_1) {
			$login_1 = get_field('login_1', 'option');
		}
		$login_2 = get_field('custom_login_2');
		if(!$login_2) {
			$login_2 = get_field('login_2', 'option');
		}
		$show_login = get_field('show_login', 'option');
	endif;
	
	$hide_header_cta_1 = get_field('hide_header_cta_1');
	if(!$hide_header_cta_1):
		$header_cta_1 = get_field('custom_cta_1');
		if(!$header_cta_1) {
			$header_cta_1 = get_field('header_cta_1', 'option');
		}
	endif;
	
	$hide_header_cta_2 = get_field('hide_header_cta_2');
	if(!$hide_header_cta_2):
		$header_cta_2 = get_field('custom_cta_2');
		if(!$header_cta_2) {
			$header_cta_2 = get_field('header_cta_2', 'option');
		}
	endif;
	?>

	<aside><a class="skip-link screen-reader-text" href="#top">Skip to content</a></aside>
	<?php if($alert_link || $alert_text) { ?>
	<aside id="alert" class="alert color-bg light" style="padding: 1% 2%;font-weight: 600;font-size: 0.9rem;">
		<div class="flex-row-center sm-mobile-wrap sm-mobile-center" style="justify-content: center;padding: 5px;">
			<?php if($alert_text) { ?>
			<div style="padding: 0 20px;"><?php echo $alert_text; ?></div>
			<?php } ?>
			<?php if($alert_link) { ?>
			<a style="white-space: nowrap;" href="<?php echo $alert_link['url']; ?>" target="<?php echo $alert_link['target']; ?>"><?php echo $alert_link['title']; ?> </a> <img style="display: inline-block;position: relative;top: -2px;margin-left: 6px;" src="/wp/wp-content/themes/go-fish/images/link-arrow.svg" alt=" " width="15.75" height="7.875">
			<?php } ?>
		</div>
		<div id="close-alert" tabindex="0" onClick="closeAlert()" style="position: absolute; right: 10px;top: calc( 50% - 9px );cursor: pointer;">X</div>
	</aside>
<?php } ?>
	<header id="main-nav" style="padding: 0;border-bottom:1px solid #C7C7C7">
		<!-- Top Header Row -->
		<?php if(($login_1) || ($login_2)): ?>
		<div style="border-bottom: 1px solid #C7C7C7;">
			<div class="flex-row" style="font-size: 0.9rem; margin: 0 auto; justify-content: flex-end; width: min(90vw, 1680px); padding: 4px 0;">
				<?php if($login_1) { ?>
				<div class="header-btn-holder no-print">
					<a style="min-width: 70px;white-space: nowrap;margin-left: 30px;" class="" href="<?php echo $login_1['url']; ?>" target="<?php echo $login_1['target']; ?>"> <strong><?php echo $login_1['title']; ?></strong><?php if($show_login){ ?> Login<?php }?></a> <img style="display: inline-block;position: relative;top: 1px;" src="/wp/wp-content/themes/go-fish/images/header-login-arrow.png">
				</div>
				<?php } ?>
				<?php if($login_2) { ?>
				<div class="header-btn-holder no-print">
					<a style="min-width: 70px;white-space: nowrap;margin-left: 50px;" class="" href="<?php echo $login_2['url']; ?>" target="<?php echo $login_2['target']; ?>"> <strong><?php echo $login_2['title']; ?></strong><?php if($show_login){ ?> Login<?php }?></a> <img style="display: inline-block;position: relative;top: 1px;margin-right: 30px;" src="/wp/wp-content/themes/go-fish/images/header-login-arrow.png">
				</div>
				<?php } ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="header flex-row-center" style="font-size: 0.9rem;width: min(90vw, 1680px); margin: 0 auto;padding: 16px 0;font-weight: 900;">
			<!-- LOGO-->
			<div class="logo">
				<a id="home" href="<?php echo $home_link; ?>" class="header-logo">
						<?php
							if( !empty( $logo ) ): ?>
								<img class="logo" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" width="<?php echo $logo_width; ?>" height="<?php echo $logo_height; ?>" style="max-width: 230px;" />
						<?php endif; ?>
				</a>
			</div>
			<!-- MAIN NAV -->
			<nav class="main-nav no-print">
				<div class="dropdown">
 					
  					<div id="myDropdown" class="dropdown-content">
   						<div>
							<?php
								if ( has_nav_menu( 'mainNav' ) ) {
								  wp_nav_menu( array(
									'theme_location' => 'mainNav',
									'container'      => false,
									'menu_class'     => 'main-navigation',
									'walker'         => new Aria_Walker_Nav_Menu(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
								  ) );
								}
							  ?>
							
						</div>						
 					</div>
				</div>
			</nav>
			
			<?php if($header_cta_1) { ?>
			<a class="button cta-1 no-mobile" style="white-space: nowrap;margin-right: 20px;" href="<?php echo $header_cta_1['url']; ?>" target="<?php echo $header_cta_1['target']; ?>"><?php echo $header_cta_1['title']; ?></a>
			<?php } ?>
			
			<?php if($header_cta_2) { ?>
			<a class="cta-2 no-mobile" style="white-space: nowrap;" href="<?php echo $header_cta_2['url']; ?>" target="<?php echo $header_cta_2['target']; ?>"><?php echo $header_cta_2['title']; ?></a>
			<?php } ?>

			<button id="dropbtn" onclick="menuFunction()" class="hamburger hamburger--squeeze no-desktop no-print" type="button" style="<?php if($header_button) {echo 'margin:0 10px;';} else {echo 'margin:0 10px 0 auto;';} ?>padding-left: 10px;">
			  <span class="hamburger-box">
				<span class="hamburger-inner"></span>
			  </span>
			</button>
			
		</div>

	</header>
