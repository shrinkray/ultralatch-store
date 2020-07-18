<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 8/23/17
 * Time: 9:39 AM
 */

/**
 * WooCommerce Love
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}

/**
 * @snippet       Add Order Note @ Cart Page - WooCommerce
 * @sourcecode    https://businessbloomer.com/?p=358
 * @author        Rodolfo Melogli
 * @compatible    WC 3.5.1
 * Per customer request 2-18-2019
 */

add_action( 'woocommerce_before_cart', 'soss_notice_shipping' );

function soss_notice_shipping() {
  echo '<p class="allow" style="background:rgb(232,232,232); padding:0.5rem 1rem;">For shipments outside of the United States, please contact our factory. Call 1-800-922-6957. <br>Offices open Monday thru Friday, 9:00AM – 5:00PM Eastern Time, United States.</p>';
}
/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
  $free = array();

  foreach ( $rates as $rate_id => $rate ) {
    if ( 'free_shipping' === $rate->method_id ) {
      $free[ $rate_id ] = $rate;
      break;
    }
  }

  return ! empty( $free ) ? $free : $rates;
}

add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

/**
 * Change number of products per row
 *
 * @link https://docs.woocommerce.com/document/change-number-of-products-per-row/
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 4; // 3 products per row
  }
}

/**
 * Disable WooCommerce Sidebar
 *   Typically this works from lib/setup where we only enable sidebar on certain templates.
 *   GRM 1-23-2019
 * https://secondlinethemes.com/enable-disable-the-woocommerce-sidebar/
 */
function disable_woo_commerce_sidebar() {
  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
add_action('init', 'disable_woo_commerce_sidebar');


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;

  ob_start();

  ?>
  <a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
     title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo
    sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
        $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
  <?php

  $fragments['a.cart-customlocation'] = ob_get_clean();

  return $fragments;

}

/**
 * Remove
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

  unset( $tabs['additional_information'] );  	// Remove the additional information tab

  return $tabs;

}
/**
 * Change Tab Names
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

  $tabs['description']['title'] = __( 'Overview' );		// Rename the description tab
  $tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab

  return $tabs;

}
/**
 * Add and customize new Panel Tabs
 *
 */
add_filter( 'woocommerce_product_tabs', 'dimensions_product_tab' );
function dimensions_product_tab( $tabs ) {

  // Adds the new tab

  $tabs['dimensions'] = array(
      'title' 	=> __( 'Dimensions', 'woocommerce' ),
      'priority' 	=> 50,
      'callback' 	=> 'dimensions_tab_content'
  );

  return $tabs;

}
function dimensions_tab_content() {

  // The dimensions tab content

  get_template_part('templates/modules/woo-dimensions-panel' );

}
add_filter( 'woocommerce_product_tabs', 'architectural_product_tab' );
function architectural_product_tab( $tabs ) {

  // Adds the new tab

  $tabs['specs'] = array(
      'title' 	=> __( 'Architectural Specs', 'woocommerce' ),
      'priority' 	=> 51,
      'callback' 	=> 'specs_tab_content'
  );

  return $tabs;

}
function specs_tab_content() {

  // The architectural specs tab content

  get_template_part('templates/modules/woo-specs-panel' );

}

add_filter( 'woocommerce_product_tabs', 'video_product_tab' );
function video_product_tab( $tabs ) {

  // Adds the new tab

  $tabs['video'] = array(
      'title' 	=> __( 'Video', 'woocommerce' ),
      'priority' 	=> 52,
      'callback' 	=> 'video_tab_content'
  );

  return $tabs;

}
function video_tab_content() {

  // The video tab content

  get_template_part('templates/modules/woo-video-panel' );

}
/**
 * Reorder Tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

  $tabs['description']['priority'] = 5;	       // First
  $tabs['dimensions']['priority'] = 10;		 // Second
  $tabs['video']['priority'] = 15;         // Third
  $tabs['specs']['priority'] = 20;         // Fourth
  $tabs['reviews']['priority'] = 25;			     // Fifth



  return $tabs;
}

/**
 * Add Large Order Button in WooCommerce product page
 * https://www.speakinginbytes.com/2016/05/add-call-order-button-woocommerce/
 * https://businessbloomer.com/woocommerce-visual-hook-guide-single-product-page/
 */

add_action('woocommerce_product_meta_start','ultralatch_woocommerce_large_order_button',10);

function ultralatch_woocommerce_large_order_button() {
  global $product; //get the product object
  if ( $product ) { // if there's a product proceed
    $url = esc_url( $product->get_permalink() ); //get the permalink to the product
    $order =  site_url() . '/large-orders/';


    echo '<div class="row"><div class="attract"><div class="d-flex justify-content-start align-items-center"><span class="pr-2">Ordering several items? 
          Contact us.</span><a rel="nofollow" href="' . $order . '" class="button large-order-button ">Large 
          Orders</a></div></div></div>'; //display a button that goes to the product page
  }
}


/**
 * @snippet       Add Custom Field to Product Variations - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=73545
 * @author        Rodolfo Melogli
 * @compatible    Woo 3.3.4
 */

// -----------------------------------------
// 1. Add custom field input @ Product Data > Variations > Single Variation

add_action( 'woocommerce_variation_options_pricing', 'bbloomer_add_custom_field_to_variations', 10, 3 );

function bbloomer_add_custom_field_to_variations( $loop, $variation_data, $variation ) {
  woocommerce_wp_text_input( array(
          'id' => 'custom_field[' . $loop . ']',
          'class' => 'short',
          'label' => __( 'Custom Field', 'woocommerce' ),
          'value' => get_post_meta( $variation->ID, 'custom_field', true )
      )
  );
}

// -----------------------------------------
// 2. Save custom field on product variation save

add_action( 'woocommerce_save_product_variation', 'bbloomer_save_custom_field_variations', 10, 2 );

function bbloomer_save_custom_field_variations( $variation_id, $i ) {
  $custom_field = $_POST['custom_field'][$i];
  if ( ! empty( $custom_field ) ) {
    update_post_meta( $variation_id, 'custom_field', esc_attr( $custom_field ) );
  } else delete_post_meta( $variation_id, 'custom_field' );
}

// -----------------------------------------
// 3. Store custom field value into variation data

add_filter( 'woocommerce_available_variation', 'bbloomer_add_custom_field_variation_data' );

function bbloomer_add_custom_field_variation_data( $variations ) {
  $variations['custom_field'] = '<div class="woocommerce_custom_field">Custom Field: <span>' . get_post_meta( $variations[ 'variation_id' ], 'custom_field', true ) . '</span></div>';
  return $variations;
}
/**
 * Add a UPC and EAN meta fields to variations
 *
 * Tutorial: http://www.remicorson.com/woocommerce-custom-fields-for-variations/
 */

add_action( 'woocommerce_product_after_variable_attributes', 'jb_woo_variation_add_upc_and_ean_fields', 10, 3);
function jb_woo_variation_add_upc_and_ean_fields($loop, $variation_data, $variation) {
  woocommerce_wp_text_input( array(
      'id' => '_upc[' . $variation->ID . ']',
      'label' => 'UPC',
      'description' => '',
      'desc_tip' => 'false',
      'value' => get_post_meta( $variation->ID, '_upc', true ),
      'placeholder' => '',
      'wrapper_class' => 'form-row form-row-first',
      'type' => 'text'
  ));

  woocommerce_wp_text_input( array(
      'id' => '_ean[' . $variation->ID . ']',
      'label' => 'EAN',
      'description' => '',
      'desc_tip' => 'false',
      'value' => get_post_meta( $variation->ID, '_ean', true ),
      'placeholder' => '',
      'wrapper_class' => 'form-row form-row-last',
      'type' => 'text'
  ));
}

//save the new meta data to the variations
add_action( 'woocommerce_save_product_variation', 'jb_woo_add_unit_size_field_save' );
function jb_woo_add_unit_size_field_save($post_id){
  $upc = $_POST['_upc'][ $post_id ];
  if ( ! empty( $_POST['_upc'] ) ) {
    update_post_meta( $post_id, '_upc', esc_attr( $upc ) );
  }

  $ean = $_POST['_ean'][ $post_id ];
  if ( ! empty( $_POST['_ean'] ) ) {
    update_post_meta( $post_id, '_ean', esc_attr( $ean ) );
  }
}


/**
 * Change price format from range to "From:"
 *
 * @param float $price
 * @param obj $product
 * @return str
 *
 * https://iconicwp.com/change-price-range-variable-products-woocommerce/
 */
//function iconic_variable_price_format( $price, $product ) {
//
//  $prefix = sprintf('%s: ', __('Starting from', 'iconic'));
//
//  $min_price_regular = $product->get_variation_regular_price( 'min', true );
//  $min_price_sale    = $product->get_variation_sale_price( 'min', true );
//  $max_price = $product->get_variation_price( 'max', true );
//  $min_price = $product->get_variation_price( 'min', true );
//
//  $price = ( $min_price_sale == $min_price_regular ) ?
//      wc_price( $min_price_regular ) :
//      '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';
//
//  return ( $min_price == $max_price ) ?
//      $price :
//      sprintf('%s%s', $prefix, $price);
//
//}
//
//add_filter( 'woocommerce_variable_sale_price_html', 'iconic_variable_price_format', 10, 2 );
//add_filter( 'woocommerce_variable_price_html', 'iconic_variable_price_format', 10, 2 );