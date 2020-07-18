<?php
// Register Custom Post Type
function career_post_type() {

$labels = array(
'name'                  => _x( 'Careers', 'Post Type General Name', 'sage' ),
'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'sage' ),
'menu_name'             => __( 'Careers', 'sage' ),
'name_admin_bar'        => __( 'Career', 'sage' ),
'archives'              => __( 'Career Archives', 'sage' ),
'attributes'            => __( 'Career Attributes', 'sage' ),
'parent_item_colon'     => __( 'Parent Item:', 'sage' ),
'all_items'             => __( 'All Careers', 'sage' ),
'add_new_item'          => __( 'Add Career', 'sage' ),
'add_new'               => __( 'Add New', 'sage' ),
'new_item'              => __( 'New Career Member', 'sage' ),
'edit_item'             => __( 'Edit Career Member', 'sage' ),
'update_item'           => __( 'Update Career', 'sage' ),
'view_item'             => __( 'View Career', 'sage' ),
'view_items'            => __( 'View Careers', 'sage' ),
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
'label'                 => __( 'Career', 'sage' ),
'description'           => __( 'Career Post Type', 'sage' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'author', 'page-attributes', ),
'hierarchical'          => false,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-pressthis',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
'show_in_rest'          => true,
);
register_post_type( 'career', $args );

}
add_action( 'init', 'career_post_type', 0 );
