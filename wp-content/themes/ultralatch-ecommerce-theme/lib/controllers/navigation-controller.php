<?php

namespace Roots\Sage\Controllers\Navigation;

/**
 * Social navigation args
 *
 * Tidy up front end markup.
 * Use the arg to pass classes to the nav UL
 *
 * @param $classes  // array or string of class names to apply to the nav UL element
 *
 * @return array
 */
function social_nav( $classes = "" ) {

  if ( ! is_array( $classes ) ) {
    $classes = [ $classes ];
  }

  $classes[] = 'nav nav-social';

  $menu_class = implode( " ", $classes );

  $args = [
    'theme_location' => 'social_navigation',
    'menu_class'     => $menu_class,
    'link_before'    => '<span class="sr-only">',
    'link_after'     => '</span>'
  ];

  return $args;

}

/**
 * Footer navigation args
 *
 * Tidy up front end markup.
 * Use the arg to pass classes to the nav UL
 *
 * @param $classes  // array or strong of class names
 *
 * @return array
 */
function footer_nav( $classes = "" ) {

  if ( ! is_array( $classes ) ) {
    $classes = [ $classes ];
  }

  $classes[] = 'nav';

  $menu_class = implode( " ", $classes );

  $args = [
    'theme_location' => 'footer_navigation',
    'menu_class'     => $menu_class,
  ];

  return $args;

}
