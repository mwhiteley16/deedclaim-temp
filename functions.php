<?php
/* ADA Compliant Menu */
require_once('functions-parts/aria-walker-nav-menu.php');
require_once('functions-parts/custom-post-types.php');

/* Theme Options with Subpages. */

// DELETE any you don't need
if( function_exists('acf_add_options_page') ) {
	
	// Main Options Page
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Sidebar Settings',
		'menu_title'	=> 'Sidebar Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/* Import files */
function my_files(){
	
	//Theme files
	wp_enqueue_style( 'theme-style', get_template_directory_uri() .'/css/style.css' );
	wp_enqueue_script('script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.1', true);
	wp_enqueue_script('toc', get_template_directory_uri() . '/js/toc.js', array('jquery'), '1.1', true);
	
	//Slick Slider
		wp_enqueue_script('slick', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), true);
		wp_enqueue_style( 'slick-css', get_template_directory_uri() .'/slick/slick.css' );
		wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/slick/slick-theme.css' );

	//Animations
	wp_enqueue_script('mdb', get_template_directory_uri() . '/js/mdb.js', array('jquery'), '4.14.1', true);
	wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), true);
	wp_enqueue_style( 'mdb-style', get_template_directory_uri() .'/css/mdb.lite.css' );

	//Font Awesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/css/all.css' );

    wp_enqueue_style('styles', get_stylesheet_uri(),NULL, microtime());
}
add_action('wp_enqueue_scripts','my_files');


/* Add Features - Menus, etc */
function my_features(){
	//Menus
	register_nav_menu('mainNav', 'Main Navigation');
	register_nav_menu('footerMenu1', 'Footer Menu 1');
    register_nav_menu('footerMenu2', 'Footer Menu 2');
	register_nav_menu('footerMenu3', 'Footer Menu 3');
	register_nav_menu('footerMenu4', 'Footer Menu 4');
	register_nav_menu('sidebarMenu1', 'Default Sidebar Menu');
    add_theme_support('title-tag');
	// Excerpts
	add_post_type_support('page', 'excerpt' );
	add_post_type_support('post', 'excerpt' );
	add_post_type_support('team', 'excerpt' );
	add_post_type_support('testimonials', 'excerpt' );
	add_post_type_support('news', 'excerpt' );
	add_post_type_support( 'events', 'excerpt' );
	add_post_type_support( 'resources', 'excerpt' );
	// Thumbnails
	add_theme_support(
		'post-thumbnails', 
		array (
			'post', 'page', 'team', 'testimonials', 'news', 'events', 'resources'
    	) );
	// Custom Image Sizes
	add_image_size( 'max-400', 400, 400 ); // resizing the image proportionally
	add_image_size( 'max-500', 500, 500 ); // resizing the image proportionally
	add_image_size( 'max-800', 800, 800 ); // resizing the image proportionally
	add_image_size( 'horizontal-icon', 140, 110 ); 
    add_image_size( 'square-300', 300, 300, array( 'center', 'center' ) ); // Custom Image Size: 300 pixels square, hard crop mode
	add_image_size( 'square-600', 600, 600, array( 'center', 'center' ) ); // Custom Image Size: 300 pixels square, hard crop mode
	add_image_size( 'landscape-720', 720, 460, array( 'center', 'center' ) );
	add_image_size( 'landscape-600', 600, 450, array( 'center', 'center' ) ); // hard crop mode
	add_image_size( 'landscape-550', 550, 360, array( 'center', 'center' ) ); // hard crop mode
	add_image_size( 'portrait-600', 600, 800, array( 'center', 'center' ) ); // Custom Image Size: 600 x 800 pixels, hard crop mode
	add_image_size( 'youtube', 560, 315, array( 'center', 'center' ) ); // Custom Image Size: 560 x 315 pixels, hard crop mode
	add_image_size( 'gallery-sm', 337, 300, array( 'center', 'center' ) );
	add_image_size( 'gallery-med', 445, 300, array( 'center', 'center' ) );
	
	// Sidebars
	register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
 /*
    register_sidebar( array(
        'name'          => __( 'Secondary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
*/
}
add_action('after_setup_theme', 'my_features');



/* Shortcodes */
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// [highlight]
function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');function highlightSC($atts = array()) {
    extract(shortcode_atts(array(
        'text' => '',
        'size' => '2px'
                    ), $atts));

    return "<span class=\"highlight\" style=\"box-shadow: inset 0 -$size 0 0 #FFD864;\-webkit-box-shadow: inset 0 -$size 0 0 #FFD864;\"> $text</span>";
}

add_shortcode('highlight', 'highlightSC');

// [small]
function smallSC($atts = array()) {
    extract(shortcode_atts(array(
        'text' => ''
        ), $atts));

    return "<p style=\"font-size:0.8rem;font-weight:600;line-height: 1.1rem;\"> $text</p>";
}

add_shortcode('small', 'smallSC');

// [large]
function largeSC($atts = array()) {
    extract(shortcode_atts(array(
        'text' => ''
        ), $atts));

    return "<p style=\"font-size:1.6rem;font-weight:600;\"> $text</p>";
}

add_shortcode('large', 'largeSC');

// [sale]
function saleSC($atts = array()) {
    extract(shortcode_atts(array(
        'old' => '',
        'new' => ''
        ), $atts));

    return "<p><span style=\"text-decoration: line-through;margin-right:5px;\"> $old </span> <strong><span style=\"text-decoration: underline;\"> $new </span></strong></p>";
}

add_shortcode('sale', 'saleSC');

// [callout]
function calloutSC($atts = array(), $content = null) {
    extract(shortcode_atts(array(
        'style' => '',
		'icon' => ''
        ), $atts));
	
	if(!$style && !$icon) {
		return "<div class=\"grey-cta callout\" style=\"position: relative;\">
				<div style=\"padding: 3% 0;\">
					<div style=\"padding: 0 8%;\">
					".do_shortcode($content)."
					</div>
				</div>
			</div>";
	}
	elseif(!$style && $icon) {
			return "<div class=\"grey-cta callout\" style=\"position: relative;\">
				<div class=\"flex-row-center phone-wrap\" style=\"padding: 3% 7%;\">
					<div class=\"twenty\" style=\"padding: 1%;text-align:center;\">
						<i class=\"fa-light fa-3x fa-".do_shortcode($icon)."\"></i>
					</div>
					<div class=\"eighty\" style=\"padding: 0 1%;\">
					".do_shortcode($content)."
					</div>
				</div>
			</div>";
	}
	elseif(($style == 'bb') && (!$icon)) {
		return "<div style=\"position: relative;\" class=\"bb-cta callout\">
				<div style=\"position: absolute;bottom: 0;right: 0;\"><img src=\"/wp/wp-content/themes/go-fish/images/corner-b-r.svg\" width=\"80\" height=\"80\"></div>
				<div style=\"position: absolute;top: 0;left: 0;\"><img src=\"/wp/wp-content/themes/go-fish/images/corner-t-l.svg\" width=\"80\" height=\"80\"></div>
				<div>
					<div style=\"padding: 5%;\">
					".do_shortcode($content)."
					</div>
				</div>
			</div>";
	
	} 
	elseif(($style == 'bb') && ($icon)) {
		return "<div style=\"position: relative;\" class=\"bb-cta callout\">
				<div style=\"position: absolute;bottom: 0;right: 0;\"><img src=\"/wp/wp-content/themes/go-fish/images/corner-b-r.svg\" width=\"80\" height=\"80\"></div>
				<div style=\"position: absolute;top: 0;left: 0;\"><img src=\"/wp/wp-content/themes/go-fish/images/corner-t-l.svg\" width=\"80\" height=\"80\"></div>
				<div class=\"flex-row-center phone-wrap\" style=\"padding: 3% 7%;\">
					<div class=\"twenty\" style=\"padding: 1%;text-align:center;\">
						<i class=\"fa-light fa-3x fa-".do_shortcode($icon)."\"></i>
					</div>
					<div class=\"eighty\" style=\"padding: 0 1%;\">
					".do_shortcode($content)."
					</div>
				</div>
			</div>";
	}
	elseif($icon) {
		return "<div class=\" $style-cta callout\" style=\"position: relative;\">
				<div class=\"flex-row-center phone-wrap\" style=\"padding: 3% 7%;\">
					<div class=\"twenty\" style=\"padding: 1%;text-align:center;\">
						<i class=\"fa-light fa-3x fa-".do_shortcode($icon)."\"></i>
					</div>
					<div class=\"eighty\" style=\"padding: 0 1%;\">
					".do_shortcode($content)."
					</div>
				</div>
			</div>";
	}
	else {
		return "<div class=\" $style-cta callout\" style=\"position: relative;\">
				<div style=\"padding: 3% 7%;\">
					<div style=\"padding: 0 1%;\">
					".do_shortcode($content)."
					</div>
				</div>
			</div>";
	}
}

add_shortcode('callout', 'calloutSC');

function sidebar_callout($atts, $content = null) {
  extract(shortcode_atts(array("url" => "", "label" => "", "style" => "", "heading" => "", "haccent" => "", "price" => "", "oldprice" => "", "discount" => "", "subheading" => ""), $atts));
  $sidebar_callout_html = "";
  if($style == "blue"):
    $sidebar_callout_html .= '<div class="sdb-callout blue">';
  elseif($style == "grey"):
    $sidebar_callout_html .= '<div class="sdb-callout grey">';
  else:
    $sidebar_callout_html .= '<div class="sdb-callout">';
  endif;
  if(!empty($heading)):
  	if(!empty($haccent)):
  	$sidebar_callout_html .= '<h3><span>'.$haccent.'</span>'.$heading.'</h3>'; 
  	else:
  	$sidebar_callout_html .= '<h3>'.$heading.'</h3>'; 
  	endif; 
  endif;
  if(!empty($price)):
  	$sidebar_callout_html .= '<p class="sdbc-price">$'.$price.'</p>'; 
  endif;
  if(!empty($oldprice) && !empty($discount)):
  	$sidebar_callout_html .= '<p class="sdbc-old-price"><span>$'.$oldprice.'</span> <span>'.$discount.'</span></p>'; 
  endif;
  if(!empty($subheading)):
  	$sidebar_callout_html .= '<p>'.$subheading.'</p>'; 
  endif;
  if(!empty($url) && !empty($label)):
    $sidebar_callout_html .= '<a href="'.$url.'" target="_blank" class="button button"><span>'.$label.'</span></a>';  
  endif;
    $sidebar_callout_html .= $content;
  $sidebar_callout_html .= '</div>';
  return $sidebar_callout_html;
}
add_shortcode("sidebar_callout", "sidebar_callout");

//[year]
function currentYear( $atts ){ return date('Y');}
add_shortcode( 'year', 'currentYear' );


//[button]
function custom_button_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'url'    => '',
        'title'  => '',
        'target' => '',
		'class' => '',
        'text'   => ''
    ), $atts ) );
 
    $content = $text ? $text : $content;
	if ( empty($class) ) {
		$class = 'button';
	}
 
// Returns the button with a link
    if ( $url ) {
        $link_attr = array(
            'href'   => esc_url( $url ),
            'title'  => esc_attr( $title ),
            'target' => ( 'blank' == $target ) ? '_blank' : '',
            'class'  => $class . ' button'
        );
        $link_attrs_str = '';
        foreach ( $link_attr as $key => $val ) {
            if ( $val ) {
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
            }
        }
        return '<a' . $link_attrs_str . ' target="' . $target . '""><span>' . do_shortcode( $content ) . '</span></a>';
    }
	
    // Return as span when no link defined
    else {
        return '<strong><span class="second-color" style="font-size: 0.9rem;">' . do_shortcode( $content ) . '</span></strong>';
    }
}
add_shortcode( 'button', 'custom_button_shortcode' );

//[accent]
function accent_text_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'text'   => ''
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
// Returns the button with a link

        return '<span class="accent-color" style="font-size: 0.95rem;text-transform: uppercase;">' . do_shortcode( $content ) . '</span>';

}
add_shortcode( 'accent', 'accent_text_shortcode' );

//[youtube]
function youtube_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'id'   => '',
		'height'   => '',
		'width'   => ''
    ), $atts ) );
 
    $content = $id ? $id : $content;
 
// Returns the button with a link

        
	
	if($width && $height) {
		return '<div class="video-container center"><iframe title="YouTube video player" src="https://www.youtube.com/embed/' . $id . '" width="' . $width . '" height="' . $height . '" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>';
	} else {
		return '<div class="video-container center"><iframe title="YouTube video player" src="https://www.youtube.com/embed/' . $id . '" width="1100" height="620" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>';
	}
}
add_shortcode( 'youtube', 'youtube_shortcode' );

//[vimeo]
function vimeo_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'id'   => '',
		'height'   => '',
		'width'   => ''
    ), $atts ) );
 
    //$content = $id ? $id : $content;
 
// Returns the button with a link
	if($width && $height) {
        return '<div class="video-container center"><iframe style="background: #000;" src="https://player.vimeo.com/video/' . $id . '" width="' . $width . '" height="' . $height . '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>';
	} else {
		return '<div class="video-container center"><iframe style="background: #000;" src="https://player.vimeo.com/video/' . $id . '" width="1100" height="620" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>';
	}
	
}
add_shortcode( 'vimeo', 'vimeo_shortcode' );

//[accent]
function accent_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'text'   => ''
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
// Returns the button with a link

        return '<span class="accent-color">' . do_shortcode( $content ) . '</span>';

}
add_shortcode( 'accent', 'accent_shortcode' );

/* WP Admin Notices */
function wp_admin_notice(){
	global $pagenow;
    if ( $pagenow == 'post-new.php' || $pagenow == 'post.php' ) { 
      ?>

      <div class="updated" style="padding-top:10px;">  
		<span style="font-size: 18px; line-height: 22px;"><strong>Shortcodes:</strong></span>
		 <br>Target, class and size are optional.
        <p>
		<strong>Button</strong>: [button url="https://sample.com" text="Button text"] 
        </p>
		 <p>
		<strong>Button with options</strong>: [button url="https://sample.com" text="Button text goes here" class="outline" target="blank"] 
        </p>
		<p>
		<strong>Highlight</strong>: [highlight text="Text goes here" size="2px"] 
		</p>
		<p>
		<strong>Small Text</strong>: [small text="Text goes here"] 
		</p>
		<p>
		<strong>Large Text</strong>: [large text="Text goes here"] 
		</p>
		<p>
		<strong>Accent Color</strong>: [accent text="Text goes here"] 
		</p>
		<p>
		<strong>Sale Price</strong>: [sale old="Text goes here" new="Text goes here"] 
		</p>
		<p>
		<strong>Default Grey Callout</strong>: [callout]Content goes here[/callout] 
		</p>
		<p>
		<strong>Callout with other Styles</strong>: [callout style="yellow" icon="memo-circle-info"]Content goes here[/callout] 
			<br>Style Options: yellow, bb, orange, blue, green, red
			<br>Icon Options: Font Awesome Icon Name https://fontawesome.com/icons/
		</p>
      </div>

     <?php }

 }
 add_action('admin_notices','wp_admin_notice');

/* WP Admin custom css - KEEP THIS */
add_action('admin_head', 'my_admin_css');

function my_admin_css() {
  echo '<style>
    button.handle-order-higher, button.handle-order-lower {
		display: none;
	}
  </style>';
}

// Lexomatic Required Theme Edits (uncomment below)
if(defined('LEXOMATIC_PLUGIN_THEME')){ require LEXOMATIC_PLUGIN_THEME; }