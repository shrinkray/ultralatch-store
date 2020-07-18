<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
}

add_action( 'customize_register', __NAMESPACE__ . '\\customize_register' );

function theme_options( $wp_customize ) {

  /*
  * *********** Secondary Logo
  */

  // secondary logo upload
  $wp_customize->add_setting( 'secondary_logo', [
    'sanitize_callback' => 'esc_url'
  ] );
  $wp_customize->add_control(
    new\WP_Customize_Image_Control(
      $wp_customize,
      'secondary_logo_control', [
        'label'       => __( 'Secondary Logo', 'sage' ),
        'section'     => 'title_tagline',
        'description' => sprintf( __( 'Secondary logo, displays in the footer.', 'sage' ) ),
        'settings'    => 'secondary_logo',
        'priority'    => 20,
      ]
    )
  );
  // secondary logo link
  $wp_customize->add_setting( 'secondary_logo_link', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_url'
  ] );
  $wp_customize->add_control( 'secondary_logo_link', [
    'label'       => __( 'Secondary Logo Link', 'sage' ),
    'description' => __( 'URL for the secondary logo to link to. Leave blank for no link.', 'sage' ),
    'section'     => 'title_tagline',
    'settings'    => 'secondary_logo_link',
    'type'        => 'text',
    'priority'    => 20,
  ] );

  /*
 * ****** Site Info Section *******
 */
  $wp_customize->add_section( 'business_info', [
    'priority'    => 20,
    'capability'  => 'edit_theme_options',
    'title'       => __( 'Business Info', 'sage' ),
    'description' => sprintf( __( 'Business info, such as phone, fax, address, etc.', 'sage' ) )
  ] );
  /*
   * *********** Company name
   */
  $wp_customize->add_setting( 'business_name', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'business_name_control', [
    'label'    => __( 'Business Name', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'business_name',
    'type'     => 'text'
  ] );
  /*
   * *********** Phone
   */
  $wp_customize->add_setting( 'phone_setting', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'phone_control', [
    'label'    => __( 'Phone Number', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'phone_setting',
    'type'     => 'text'
  ] );
  /*
  * *********** Fax
  */
  $wp_customize->add_setting( 'fax_setting', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'fax_control', [
    'label'    => __( 'Fax Number', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'fax_setting',
    'type'     => 'text'
  ] );
  /*
  * *********** Email
  */
  $wp_customize->add_setting( 'email_setting', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'email_control', [
    'label'    => __( 'Site Email', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'email_setting',
    'type'     => 'text'
  ] );
  /*
  ************ Address
  */
  $wp_customize->add_setting( 'address_line_1', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'address_1_control', [
    'label'    => __( 'Address Line 1', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'address_line_1',
    'type'     => 'text'
  ] );
  $wp_customize->add_setting( 'address_line_2', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'address_2_control', [
    'label'    => __( 'Address Line 2', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'address_line_2',
    'type'     => 'text'
  ] );
  $wp_customize->add_setting( 'address_line_3', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'address_3_control', [
    'label'    => __( 'City, State, Zip', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'address_line_3',
    'type'     => 'text'
  ] );
  /*
  * ****** Privacy Policy  & TOC *******
  */
  // privacy
  $wp_customize->add_setting( 'privacy_policy_page', [
    'default'           => ''
  ] );
  $wp_customize->add_control( 'privacy_policy_page', [
    'label'    => __( 'Privacy Policy Page', 'sage' ),
    'description'    => __( 'Link to privacy policy page. Leave blank (- Select -) for none.', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'privacy_policy_page',
    'type'     => 'dropdown-pages',
    'allow_addition' => true
  ] );
  // terms
  $wp_customize->add_setting( 'terms_page', [
    'default'           => ''
  ] );
  $wp_customize->add_control( 'terms_page', [
    'label'    => __( 'Terms & Conditions Page', 'sage' ),
    'description'    => __( 'Link to Terms & Conditions page. Leave blank (- Select -) for none.', 'sage' ),
    'section'  => 'business_info',
    'settings' => 'terms_page',
    'type'     => 'dropdown-pages',
    'allow_addition' => true
  ] );

  /*
  * ****** Miscellaneous Section *******
  */
  $wp_customize->add_section( 'misc_settings', [
    'priority'   => 25,
    'capability' => 'edit_theme_options',
    'title'      => __( 'Miscellaneous', 'sage' )
  ] );

  // Hide Show ACF (if ACF is active)
  if ( class_exists( 'acf' ) ) :

    $wp_customize->add_setting( 'acf_visibility', array(
      'default' => 'show'
    ) );
    $wp_customize->add_control( 'acf_visibility', array(
      'type'     => 'radio',
      'section'  => 'misc_settings',
      'settings' => 'acf_visibility',
      'label'    => __( 'Hide / Show the ACF menu' ),
      'choices'  => array(
        'hide' => __( 'Hide' ),
        'show' => __( 'Show' ),
      ),
    ) );

  endif;

  $wp_customize->add_setting( 'tracking_type', array(
    'default' => 'none'
  ) );
  $wp_customize->add_control( 'tracking_type', array(
    'type'     => 'radio',
    'section'  => 'misc_settings',
    'settings' => 'tracking_type',
    'label'    => __( 'Tracking Type' ),
    'choices'  => array(
      'none' => __( 'None' ),
      'gtm'  => __( 'Google Tag Manager' ),
      'ga'   => __( 'Google Analytics' ),
    ),
  ) );
  $wp_customize->add_setting( 'gtm_id', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'gtm_id', [
    'label'    => __( 'Google Tag Manager ID', 'sage' ),
    'section'  => 'misc_settings',
    'settings' => 'gtm_id',
    'type'     => 'text'
  ] );
  $wp_customize->add_setting( 'ga_id', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'ga_id', [
    'label'    => __( 'Google Analytics ID', 'sage' ),
    'section'  => 'misc_settings',
    'settings' => 'ga_id',
    'type'     => 'text'
  ] );

  $wp_customize->add_setting( 'google_api_key', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ] );
  $wp_customize->add_control( 'google_api_key', [
    'label'    => __( 'Google Maps API Key', 'sage' ),
    'section'  => 'misc_settings',
    'settings' => 'google_api_key',
    'type'     => 'text'
  ] );

}

add_action( 'customize_register', __NAMESPACE__ . '\\theme_options' );

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script( 'sage/customizer', Assets\asset_path( 'scripts/customizer.js' ), [ 'customize-preview' ], null, true );
}

add_action( 'customize_preview_init', __NAMESPACE__ . '\\customize_preview_js' );
