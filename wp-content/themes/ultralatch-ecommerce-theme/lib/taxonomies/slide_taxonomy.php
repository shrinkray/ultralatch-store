<?php

function slide_type_init() {
	register_taxonomy( 'slide-type', array( 'slide' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Types', 'sage' ),
			'singular_name'              => _x( 'Type', 'taxonomy general name', 'sage' ),
			'search_items'               => __( 'Search Types', 'sage' ),
			'popular_items'              => __( 'Popular Types', 'sage' ),
			'all_items'                  => __( 'All Types', 'sage' ),
			'parent_item'                => __( 'Parent Type', 'sage' ),
			'parent_item_colon'          => __( 'Parent Type:', 'sage' ),
			'edit_item'                  => __( 'Edit Type', 'sage' ),
			'update_item'                => __( 'Update Type', 'sage' ),
			'add_new_item'               => __( 'New Type', 'sage' ),
			'new_item_name'              => __( 'New Type', 'sage' ),
			'separate_items_with_commas' => __( 'Separate Types with commas', 'sage' ),
			'add_or_remove_items'        => __( 'Add or remove Types', 'sage' ),
			'choose_from_most_used'      => __( 'Choose from the most used Types', 'sage' ),
			'not_found'                  => __( 'No Types found.', 'sage' ),
			'menu_name'                  => __( 'Types', 'sage' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'slide-type',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'slide_type_init' );
