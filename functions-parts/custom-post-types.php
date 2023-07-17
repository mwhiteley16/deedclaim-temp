<?php
function my_post_types(){
	
	/* Plans */
	register_post_type('plans', array(
	'supports' => array('title', 'excerpt', 'thumbnail'),
	'rewrite' => array('slug' => 'plans', 'with_front' => false),
	'has_archive' => false, // false - Turns off archive page
	'public' => true,
	'publicly_queryable'  => false, // false - Prevents each testimonial from having it's own page
	'labels' => array(
		'name' => "Plans",
		'add_new_item' => 'Add New Plan',
		'edit_item' => 'Edit Plan',
		'all_items' => 'All Plans',
		'singular_name' => 'Plan'
	),
	'menu_icon' => 'dashicons-list-view'
	));
	
	/*Team*/
	register_post_type('team', array(
	'supports' => array('title', 'thumbnail', 'editor'),
	'rewrite' => array('slug' => 'team', 'with_front' => false),
	'has_archive' => false,
	'public' => true,
	'publicly_queryable'  => false,
	'labels' => array(
		'name' => "Team Members",
		'add_new_item' => 'Add New Team Member',
		'edit_item' => 'Edit Team Member',
		'all_items' => 'All Team',
		'singular_name' => 'Team Member'
	),
	'menu_icon' => 'dashicons-admin-users'
	));
	
}

add_action('init', 'my_post_types');

// Custom Taxonomy Code

add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
	
	register_taxonomy( 'feature', 'plans', array(
	'hierarchical' => true, 
	'rewrite' => array('slug' => 'feature', 'with_front' => false), // false - Ignore custom structure in permalink settings
	'has_archive' => false, //Prevents taxonomy archive page
	'public' => true,
	'publicly_queryable'  => false, //Prevents taxonomy terms from having thier own page
	'label' => 'Feature') 
	);
	

}

