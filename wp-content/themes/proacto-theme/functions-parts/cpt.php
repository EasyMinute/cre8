<?php 
//Register CPT and taxonomies for website 


function register_projects_cpt() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'proacto' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'proacto' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'proacto' ),
		'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'proacto' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projects' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-products',
		'supports'           => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields',
			'page-attributes'
		),
		'show_in_rest'       => true, // Enables Gutenberg editor support
	);

	register_post_type( 'projects', $args );
}

add_action( 'init', 'register_projects_cpt' );

function register_technology_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Technologies', 'taxonomy general name', 'proacto' ),
		'singular_name'              => _x( 'Technology', 'taxonomy singular name', 'proacto' ),
	);

	$args = array(
		'hierarchical'          => false, // Set to false for "tag"-like behavior
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'technology' ),
		'show_in_rest'          => true, // Enables Gutenberg editor support
	);

	register_taxonomy( 'technology', 'projects', $args );
}

add_action( 'init', 'register_technology_taxonomy' );

function register_availability_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Availability', 'taxonomy general name', 'proacto' ),
		'singular_name'              => _x( 'Availability', 'taxonomy singular name', 'proacto' ),
	);

	$args = array(
		'hierarchical'          => true, // Set to false for "tag"-like behavior
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'availability' ),
		'show_in_rest'          => true, // Enables Gutenberg editor support
	);

	register_taxonomy( 'availability', 'projects', $args );
}

function register_category_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Category', 'taxonomy general name', 'proacto' ),
		'singular_name'              => _x( 'Category', 'taxonomy singular name', 'proacto' ),
	);

	$args = array(
		'hierarchical'          => true, // Set to false for "tag"-like behavior
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'projects_category' ),
		'show_in_rest'          => true, // Enables Gutenberg editor support
	);

	register_taxonomy( 'projects_category', 'projects', $args );
}

add_action( 'init', 'register_category_taxonomy' );

function register_availibility_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Availibility', 'taxonomy general name', 'proacto' ),
		'singular_name'              => _x( 'Availibility', 'taxonomy singular name', 'proacto' ),
	);

	$args = array(
		'hierarchical'          => true, // Set to false for "tag"-like behavior
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'availibility' ),
		'show_in_rest'          => true, // Enables Gutenberg editor support
	);

	register_taxonomy( 'availibility', 'projects', $args );
}

add_action( 'init', 'register_availibility_taxonomy' );


?>