<?php
/**
 * Add Options Menu Item for Admins Only
 *
 * This is used to edit special Theme Settings
 *
 * @link: https://www.advancedcustomfields.com/resources/acf_add_options_page/
 * @link: https://davidwalsh.name/php-shorthand-if-else-ternary-operators
 */

add_action('acf/init', 'my_acf_op_init');

function my_acf_op_init() {

// $option var set by ternary where if the user is not admin, return 'manage_options' value

  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
      'page_title' 	=> 'Theme General Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> $option = ( ! is_admin() ) ?  'edit_posts' : 'manage_options',
      'position'    => 58,
      'icon_url'    => false,
      'redirect'		=> false
    ));

  }
}

