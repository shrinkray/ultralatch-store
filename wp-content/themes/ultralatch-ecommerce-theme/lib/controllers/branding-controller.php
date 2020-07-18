<?php

namespace Roots\Sage\Controllers\Branding;

/**
 * Site Brand
 *
 * Use native WordPress site logo with custom (bootstrap friendly) markup
 * Falls back to text title if logo is not set.
 *
 * @param $html
 *
 * @return string
 */
/**
 * @param $html
 *
 * @return string
 */
/**
 * @param $html
 *
 * @return string
 */
function site_brand( $html ) {
  // grab the site name as set in customizer options
  $site = get_bloginfo( 'name' );
  // Wrap the site name in an H1 if on home, in a paragraph tag if not.
  is_front_page() ? $title = '<h1>' . $site . '</h1>' : $title = '<p>' . $site . '</p>';
  // Grab the home URL
  $home = esc_url( home_url( '/' ) );
  // Class for the link
  $class = 'navbar-brand';
  // Set anchor content to $title
  $content = $title;
  // Check if there is a custom logo set in customizer options...
  if ( has_custom_logo() ) {
    // get the URL to the logo
    $logo    = wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false, array(
      'class'    => 'brand-logo img-responsive',
//      'itemprop' => 'logo',
      'alt'     => $site,
    ) );
    $content = $logo;
    $content .= '<div class="sr-only">' . $title . '</div>';
  }
  // setup the markup
  // removed 'itemprop="url"' following 'rel="home"' due to error in validator.w3.org
  $html = sprintf( '<a href="%1$s" class="%2$s" rel="home" >%3$s</a>', $home, $class, $content );

  // return the result to WordPress
  return $html;
}

add_filter( 'get_custom_logo', __NAMESPACE__ . '\\site_brand' );


/**
 * @param null $classes
 *
 * @return string
 */
function footer_logo( $classes = null ) {

  if ( ! is_array( $classes ) ) {
    $classes = [ $classes ];
  }

  $classes[] = 'footer-logo';

  $site = get_bloginfo( 'name' );

  get_theme_mod( 'secondary_logo' ) ? $logo = 'secondary_logo' : $logo = 'custom_logo';

  $html = '<p>' . $site . '</p>';

  if ( ! empty( $logo ) ) {

    $logo_url = get_theme_mod( $logo );

    $html = sprintf( '<img src="%1$s" class="%2$s" alt="%3$s">', $logo_url, implode( " ", $classes ), $site );
  }

  // setup the markup

  return $html;
}
