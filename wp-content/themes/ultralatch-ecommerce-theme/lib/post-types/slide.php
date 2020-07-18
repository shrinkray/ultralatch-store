<?php

function slide_init() {
	register_post_type( 'slide', array(
		'labels'            => array(
			'name'                => __( 'Slides', 'sage' ),
			'singular_name'       => __( 'Slide', 'sage' ),
			'all_items'           => __( 'All Slides', 'sage' ),
			'new_item'            => __( 'New Slide', 'sage' ),
			'add_new'             => __( 'Add New', 'sage' ),
			'add_new_item'        => __( 'Add New Slide', 'sage' ),
			'edit_item'           => __( 'Edit Slide', 'sage' ),
			'view_item'           => __( 'View Slide', 'sage' ),
			'search_items'        => __( 'Search Slides', 'sage' ),
			'not_found'           => __( 'No Slides found', 'sage' ),
			'not_found_in_trash'  => __( 'No Slides found in trash', 'sage' ),
			'parent_item_colon'   => __( 'Parent Slide', 'sage' ),
			'menu_name'           => __( 'Slides', 'sage' ),
		),
		'public'            => false,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title' ),
		'has_archive'       => false,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-images-alt2',
		'show_in_rest'      => true,
		'rest_base'         => 'slide',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'slide_init' );

function slide_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['slide'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Slide updated. <a target="_blank" href="%s">View Slide</a>', 'sage'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'sage'),
		3 => __('Custom field deleted.', 'sage'),
		4 => __('Slide updated.', 'sage'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Slide restored to revision from %s', 'sage'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Slide published. <a href="%s">View Slide</a>', 'sage'), esc_url( $permalink ) ),
		7 => __('Slide saved.', 'sage'),
		8 => sprintf( __('Slide submitted. <a target="_blank" href="%s">Preview Slide</a>', 'sage'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Slide scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Slide</a>', 'sage'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Slide draft updated. <a target="_blank" href="%s">Preview Slide</a>', 'sage'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'slide_updated_messages' );
