<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',       // Scripts and stylesheets
  'lib/extras.php',       // Custom functions
  'lib/setup.php',        // Theme setup
  'lib/titles.php',       // Page titles
  'lib/wrapper.php',      // Theme wrapper class
  'lib/customizer.php',   // Theme customizer
  'lib/walker.php',       // Nav walker
  'lib/utils.php',        // Utility functions
  'lib/woocommerce.php',  // WooCommerce Functions
  'lib/ACF_Forms.php',    // ACF Gravity Forms field
  'lib/controllers.php',  // Controller loader
  'lib/custom-types.php', // CPT & Taxonomy loader
  'lib/mobileDetect.php', // UA sniffing classes
  'lib/login.php',        // Promotion
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);



/**
 * Load ACF Custom Stylesheet
 * Please find this referenced in /lib/setup.php > Admin Styles section.
 */





/**
 * Deliver Responsive Images in ACF
 * adds the srcset to your front end image with image options inside of it

 */
function custom_theme_setup() {
  add_theme_support( 'advanced-image-compression' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
 *  Add new image sizes
 */
add_image_size('opt_in', 608, 492, true);
add_image_size('opt_in_wide', 900, 600, true);
add_image_size('secondary_image', 800, 450, true);
add_image_size('slider_image', 1246, 500, true);
add_image_size('custom_icon', 300, 300, true);
add_image_size('card_image', 545, 307, true);
add_image_size('overview_square', 300, 300, true);
add_image_size('overview_portrait', 300, 380, true);
add_image_size('overview_landscape', 450, 300, true);

/**
 *  Add Image Crop Images
 */
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields() { include_once('acf-image-crop/acf-image-crop.php'); }




/**
 * Limit length of excerpt by number of words
 * http://smallenvelop.com/limit-post-excerpt-length-in-wordpress/
 *
 * use echo excerpt($limit) instead of the_excerpt()
 */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// use this to limit number of words displaying

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * custom function targeting sticky posts
 * Use on blog landing page template
 *
 *  http://www.wpbeginner.com/wp-tutorials/how-to-display-the-latest-sticky-posts-in-wordpress/
 */

function soss_latest_sticky() {

  /* Get all sticky posts */
  $sticky = get_option( 'sticky_posts' );

  /* Sort the stickies with the newest ones at the top */
  rsort( $sticky );

  /* Get the 5 newest stickies (change 5 for a different number) */
  $sticky = array_slice( $sticky, 0, 5 );

  /* Query sticky posts */
  $the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
  // The Loop
  if ( $the_query->have_posts() ) {
    $return = '<ul>';
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      $return .= '<li><a href="' .get_permalink(). '" title="'  . get_the_title() . '">' . get_the_title() . '</a><br />' . get_the_excerpt(). '</li>';

    }
    $return .= '</ul>';

  }
  /* Restore original Post Data */
  wp_reset_postdata();

  return $return;

}
add_shortcode('latest_stickies', 'soss_latest_sticky');

/**
 * Remove Query Strings From Static Resources
 * https://kinsta.com/knowledgebase/remove-query-strings-static-resources/#remove-query-string-code
 */
function _remove_script_version( $src ){
  $parts = explode( '?', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/**
 *  Missing Dependencies in Query Monitor with wp-auth-check and heatbeat (missing)
 *  Add the following as a plugin, or to your theme’s functions.php file and it will stop WPEngine from disabling
 * 'heartbeat' and will thus eliminate the error message on Query Monitor
 * https://wordpress.org/support/topic/missing-dependencies-in-query-monitor-with-wp-auth-check-and-heatbeat-missing/
 */
add_filter( 'wpe_heartbeat_allowed_pages', function( $pages ) {
  global $page_now;
  $pages[] =  $page_now;
  return $pages;
});

