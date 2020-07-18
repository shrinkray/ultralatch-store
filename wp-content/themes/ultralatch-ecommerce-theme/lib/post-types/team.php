<?php
// Register Custom Post Type
function team_post_type() {

$labels = array(
'name'                  => _x( 'Team Members', 'Post Type General Name', 'sage' ),
'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'sage' ),
'menu_name'             => __( 'Team Members', 'sage' ),
'name_admin_bar'        => __( 'Team', 'sage' ),
'archives'              => __( 'Team Archives', 'sage' ),
'attributes'            => __( 'Team Attributes', 'sage' ),
'parent_item_colon'     => __( 'Parent Item:', 'sage' ),
'all_items'             => __( 'All Team Members', 'sage' ),
'add_new_item'          => __( 'Add Team Member', 'sage' ),
'add_new'               => __( 'Add New', 'sage' ),
'new_item'              => __( 'New Team Member', 'sage' ),
'edit_item'             => __( 'Edit Team Member', 'sage' ),
'update_item'           => __( 'Update Team Member', 'sage' ),
'view_item'             => __( 'View Team Member', 'sage' ),
'view_items'            => __( 'View Team Members', 'sage' ),
'search_items'          => __( 'Search', 'sage' ),
'not_found'             => __( 'Not found', 'sage' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
'featured_image'        => __( 'Profile Photo', 'sage' ),
'set_featured_image'    => __( 'Set profile photo', 'sage' ),
'remove_featured_image' => __( 'Remove profile photo', 'sage' ),
'use_featured_image'    => __( 'Use as profile photo', 'sage' ),
'insert_into_item'      => __( 'Insert into item', 'sage' ),
'uploaded_to_this_item' => __( 'Uploaded to this item', 'sage' ),
'items_list'            => __( 'Items list', 'sage' ),
'items_list_navigation' => __( 'Items list navigation', 'sage' ),
'filter_items_list'     => __( 'Filter items list', 'sage' ),
);
$args = array(
'label'                 => __( 'Team', 'sage' ),
'description'           => __( 'Team Post Type', 'sage' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes', ),
'hierarchical'          => false,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-nametag',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
'show_in_rest'          => true,
);
register_post_type( 'team', $args );

}
add_action( 'init', 'team_post_type', 0 );
