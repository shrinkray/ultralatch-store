<?php

// Register Custom Taxonomy
function team_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Groups', 'Taxonomy General Name', 'sage' ),
    'singular_name'              => _x( 'Group', 'Taxonomy Singular Name', 'sage' ),
    'menu_name'                  => __( 'Groups', 'sage' ),
    'all_items'                  => __( 'All Groups', 'sage' ),
    'parent_item'                => __( 'Parent Group', 'sage' ),
    'parent_item_colon'          => __( 'Parent Group:', 'sage' ),
    'new_item_name'              => __( 'New Group Name', 'sage' ),
    'add_new_item'               => __( 'Add New Group', 'sage' ),
    'edit_item'                  => __( 'Edit Group', 'sage' ),
    'update_item'                => __( 'Update Group', 'sage' ),
    'view_item'                  => __( 'View Group', 'sage' ),
    'separate_items_with_commas' => __( 'Separate groups with commas', 'sage' ),
    'add_or_remove_items'        => __( 'Add or remove groups', 'sage' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
    'popular_items'              => __( 'Popular Groups', 'sage' ),
    'search_items'               => __( 'Search Groups', 'sage' ),
    'not_found'                  => __( 'Not Found', 'sage' ),
    'no_terms'                   => __( 'No Groups', 'sage' ),
    'items_list'                 => __( 'Groups list', 'sage' ),
    'items_list_navigation'      => __( 'Groups list navigation', 'sage' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'rewrite'                    => false,
    'show_in_rest'               => true,
  );
  register_taxonomy( 'team_group', array( 'team' ), $args );

}
add_action( 'init', 'team_taxonomy', 0 );
