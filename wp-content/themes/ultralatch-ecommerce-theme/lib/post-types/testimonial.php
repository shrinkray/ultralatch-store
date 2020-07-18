<?php
// Register Custom Post Type
function testimonial_post_type() {

$labels = array(
'name'                  => _x( 'Testimonials', 'Post Type General Name', 'sage' ),
'singular_name'         => _x( 'Testimonials', 'Post Type Singular Name', 'sage' ),
'menu_name'             => __( 'Testimonials', 'sage' ),
'name_admin_bar'        => __( 'Testimonials', 'sage' ),
'archives'              => __( 'Testimonials Archives', 'sage' ),
'attributes'            => __( 'Testimonials Attributes', 'sage' ),
'parent_item_colon'     => __( 'Parent Item:', 'sage' ),
'all_items'             => __( 'All Testimonials', 'sage' ),
'add_new_item'          => __( 'Add Testimonials', 'sage' ),
'add_new'               => __( 'Add New', 'sage' ),
'new_item'              => __( 'New Testimonials', 'sage' ),
'edit_item'             => __( 'Edit Testimonials', 'sage' ),
'update_item'           => __( 'Update Testimonials', 'sage' ),
'view_item'             => __( 'View Testimonials', 'sage' ),
'view_items'            => __( 'View Testimonials', 'sage' ),
'search_items'          => __( 'Search', 'sage' ),
'not_found'             => __( 'Not found', 'sage' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
'insert_into_item'      => __( 'Add to item', 'sage' ),
'uploaded_to_this_item' => __( 'Uploaded to this item', 'sage' ),
'items_list'            => __( 'Items list', 'sage' ),
'items_list_navigation' => __( 'Items list navigation', 'sage' ),
'filter_items_list'     => __( 'Filter items list', 'sage' ),
);
$args = array(
'label'                 => __( 'Testimonials', 'sage' ),
'description'           => __( 'Testimonials Post Type', 'sage' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'author', 'page-attributes', ),
'hierarchical'          => false,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-smiley',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
'show_in_rest'          => true,
);
register_post_type( 'testimonial', $args );

}
add_action( 'init', 'testimonial_post_type', 0 );
