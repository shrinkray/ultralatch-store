<?php

// Register Custom Taxonomy
function career_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Departments', 'Taxonomy General Name', 'sage' ),
    'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'sage' ),
    'menu_name'                  => __( 'Departments', 'sage' ),
    'all_items'                  => __( 'All Departments', 'sage' ),
    'parent_item'                => __( 'Parent Department', 'sage' ),
    'parent_item_colon'          => __( 'Parent Department:', 'sage' ),
    'new_item_name'              => __( 'New Department Name', 'sage' ),
    'add_new_item'               => __( 'Add New Department', 'sage' ),
    'edit_item'                  => __( 'Edit Department', 'sage' ),
    'update_item'                => __( 'Update Department', 'sage' ),
    'view_item'                  => __( 'View Department', 'sage' ),
    'separate_items_with_commas' => __( 'Separate departments with commas', 'sage' ),
    'add_or_remove_items'        => __( 'Add or remove departments', 'sage' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
    'popular_items'              => __( 'Popular Departments', 'sage' ),
    'search_items'               => __( 'Search Departments', 'sage' ),
    'not_found'                  => __( 'Not Found', 'sage' ),
    'no_terms'                   => __( 'No Departments', 'sage' ),
    'items_list'                 => __( 'Departments list', 'sage' ),
    'items_list_navigation'      => __( 'Departments list navigation', 'sage' ),
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
  register_taxonomy( 'career_department', array( 'career' ), $args );

}
add_action( 'init', 'career_taxonomy', 0 );
