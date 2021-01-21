<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support( 'soil-clean-up' );
  add_theme_support( 'soil-nav-walker' );
  add_theme_support( 'soil-nice-search' );
  add_theme_support( 'soil-jquery-cdn' );
  add_theme_support( 'soil-relative-urls' );

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain( 'sage', get_template_directory() . '/lang' );

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support( 'title-tag' );

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus( [
    'primary_navigation' => __( 'Primary Navigation', 'sage' ),
    'social_navigation' => __( 'Social Navigation', 'sage' ),
    'footer_navigation' => __( 'Footer Navigation', 'sage' )
  ] );

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support( 'post-thumbnails' );

  // custom logo support
  // https://codex.wordpress.org/Theme_Logo
  add_theme_support( 'custom-logo' );

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ] );

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style( Assets\asset_path( 'styles/main.css' ) );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar( [
    'name'          => __( 'Primary Sidebar', 'sage' ),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ] );

  register_sidebar( [
      'name'          => __( 'Blog Sidebar', 'sage' ),
      'id'            => 'sidebar-blog',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>'
  ] );

  register_sidebar( [
      'name'          => __( 'Footer 1', 'sage' ),
      'id'            => 'nav-footer',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
  ] );

  register_sidebar( [
    'name'          => __( 'Footer 2', 'sage' ),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="mb-4">',
    'after_title'   => '</h4>'
  ] );

  register_sidebar( [
      'name'          => __( 'Footer 3', 'sage' ),
      'id'            => 'serial-footer',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="mb-4">',
      'after_title'   => '</h4>'
  ] );

  register_sidebar( [
      'name'          => __( 'Top Menu', 'sage' ),
      'id'            => 'header-widget',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
  ] );

  // Store Sidebar
  register_sidebar([
      'name'          => __('Shop Main', 'sage'),
      'id'            => 'shop-main',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
  ]);
}

add_action( 'widgets_init', __NAMESPACE__ . '\\widgets_init' );

/**
 * Determine which pages SHOULD display the sidebar
 */
function display_sidebar() {
  static $display;

  isset( $display ) || $display = in_array( true, [
    // The sidebar WILL be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_page_template( 'template-sidebar.php' ),
    is_page_template( 'template-secondary.php' ),
    is_page_template( 'template-blog.php' ),
    is_page_template( 'template-orders.php' ),
    //is_archive( 'archive-product.php' ),
    is_singular('post'),
  ] );

  return apply_filters( 'sage/display_sidebar', $display );
}

/**
 * Theme assets
 */
function assets() {
//  wp_enqueue_style( 'google_fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700', false, null );
  wp_enqueue_style( 'dashicons' );
//  wp_enqueue_style( 'sage/css', Assets\asset_path( 'styles/main.css' ), false, null );
//  wp_enqueue_script( 'sage/js', Assets\asset_path( 'scripts/main.js' ), array('jquery'), null, true );
 wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', true );


  /**
   * This influenced me the most how to enqueue hash style files from Webpack build
   * @url: https://css-tricks.com/hashes-in-wordpress-assets-with-enqueue/
   *
   * $dirJS and $dirCSS
   */

  $dirJS = new \DirectoryIterator(get_stylesheet_directory() . '/dist/js');
  $dirCSS = new \DirectoryIterator(get_stylesheet_directory() . '/dist/css');
  $assetVer =  time();
  $assetVer = ''; // strval($assetVer) . '.';


  foreach ($dirJS as $file) {

    if (pathinfo($file, PATHINFO_EXTENSION) === 'js') {
      $fullName = basename($file);
      $name = substr(basename($fullName), 0, strpos(basename($fullName), '.'));
      $hashName = $name  . '.' . $assetVer . 'js';

      switch($name) {

        case 'index':
          $deps = ['jquery'];
          break;

        default:
          $deps = null;
          break;

      }

      wp_enqueue_script( 'sage/js', Assets\asset_path( 'js/' . $hashName ), $deps, null, true );

    }

  }

  /**
   * We're capturing all the style files, a .map and .css
   * This foreach gets all the style files; This should enqueue all
   */
  foreach ($dirCSS as $style) {

    if (pathinfo($style, PATHINFO_EXTENSION) === 'css') {
      $fullName = basename($style);
      $name = substr(basename($fullName), 0, strpos(basename($fullName), '.'));
      $hashName = $name  . '.' . $assetVer . 'css';


      wp_enqueue_style( 'sage/css', Assets\asset_path( 'css/' . $hashName ), null, true );

    } // enqueues the hashed style file

  } // end foreach CSS

  if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {

    wp_enqueue_script( 'comment-reply' );

  }

} // end function assets()

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100 );

/**
 * Add the SVG Mime type to the uploader
 * @author Alain Schlesser (alain.schlesser@gmail.com)
 * @link https://gist.github.com/schlessera/1eed8503110fb3076e73
 *
 * @param  array $mimes list of mime types that are allowed by the
 * WordPress uploader
 *
 * @return array modified version of the $mimes array
 *
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 * @see http://www.w3.org/TR/SVG/mimereg.html
 */
function add_svg_mime_type( $mimes ) {
  // add official SVG mime type definition to the array of allowed mime types
  $mimes['svg'] = 'image/svg+xml';

  // return the modified array
  return $mimes;
}

add_filter( 'upload_mimes', __NAMESPACE__ . '\\add_svg_mime_type' );

/**
 * Admin Styles
 *
 * Add styles to the admin area. Helps with visual clutter on ACF fields,
 * viewing SVG in media loader, etc.
 */
function admin_styles() {
  ob_start();
  include( locate_template( 'templates/modules/admin-styles.php' ) );
  $output = ob_get_clean();
  echo $output;
}

add_action( 'admin_head', __NAMESPACE__ . '\\admin_styles' );
add_action( 'customize_controls_print_styles', __NAMESPACE__ . '\\admin_styles' );

/**
 * ACF Admin Access Control
 *
 * Hide / Show the ACF menu.
 *
 * Hides the ACF menu via a radio button tucked away in customizer.
 * Out of sight, out of mind.
 *
 * @return bool
 */
function acf_admin_control() {
  get_theme_mod( 'acf_visibility' ) === 'show' ? $return = true : $return = false;

  return $return;
}

add_filter( 'acf/settings/show_admin', __NAMESPACE__ . '\\acf_admin_control' );

/**
 * Add google tag manager to head
 */
function tag_manager_head() {
  if ( get_theme_mod( 'gtm_id' ) && get_theme_mod( 'tracking_type' ) === 'gtm' ) {
    get_template_part( 'templates/modules/tag-manager', 'head' );
  }
}

add_action( 'wp_head', __NAMESPACE__ . '\\tag_manager_head' );
/**
 * Add google tag manager to body
 */
function tag_manager_body() {
  if ( get_theme_mod( 'gtm_id' ) && get_theme_mod( 'tracking_type' ) === 'gtm' ) {
    get_template_part( 'templates/modules/tag-manager', 'body' );
  }
}

add_action( 'get_header', __NAMESPACE__ . '\\tag_manager_body' );
/**
 * Add google Analytics to body
 */
function google_analytics_head() {
  if ( get_theme_mod( 'ga_id' ) && get_theme_mod( 'tracking_type' ) === 'ga' ) {
    get_template_part( 'templates/modules/google-analytics' );
  }
}

add_action( 'wp_head', __NAMESPACE__ . '\\google_analytics_head' );

/**
 * Google Maps API Key
 *
 * Set up Google API key to use with ACF maps
 */
function acf_google_api_key() {

  $api_key = "";

  if ( get_theme_mod( 'google_api_key' ) ) {
    $api_key = get_theme_mod( 'google_api_key' );
  }

  acf_update_setting( 'google_api_key', $api_key );

}

add_action( 'acf/init', __NAMESPACE__ . '\\acf_google_api_key' );
