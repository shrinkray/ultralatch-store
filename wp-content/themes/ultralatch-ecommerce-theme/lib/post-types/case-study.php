<?php
// Register Custom Post Type
function case_study_post_type() {

$labels = array(
'name'                  => _x( 'Case Studies', 'Post Type General Name', 'sage' ),
'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'sage' ),
'menu_name'             => __( 'Case Studies', 'sage' ),
'name_admin_bar'        => __( 'Case Study', 'sage' ),
'archives'              => __( 'Case Study Archives', 'sage' ),
'attributes'            => __( 'Case Study Attributes', 'sage' ),
'parent_item_colon'     => __( 'Parent Item:', 'sage' ),
'all_items'             => __( 'All Case Studies', 'sage' ),
'add_new_item'          => __( 'Add Case Study', 'sage' ),
'add_new'               => __( 'Add New', 'sage' ),
'new_item'              => __( 'New Case Study', 'sage' ),
'edit_item'             => __( 'Edit Case Study', 'sage' ),
'update_item'           => __( 'Update Case Study', 'sage' ),
'view_item'             => __( 'View Case Study', 'sage' ),
'view_items'            => __( 'View Case Studies', 'sage' ),
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
'label'                 => __( 'Case Study', 'sage' ),
'description'           => __( 'Case Study Post Type', 'sage' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'author', 'page-attributes', ),
'hierarchical'          => false,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-chart-area',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
'show_in_rest'          => true,
);
register_post_type( 'case-study', $args );

}
add_action( 'init', 'case_study_post_type', 0 );
