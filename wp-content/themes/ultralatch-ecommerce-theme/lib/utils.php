<?php

namespace Roots\Sage\Utils;

/**
 * oEmbed Attributes
 *
 * Add parameters to oEmbed query string. Useful for
 * turning off related videos and such.
 *
 * Basic field use: $video = videoLink('your_field_name');
 * Add second param if in a repeater: $video - videoLink('your_subfield_name', true);
 *
 * @see https://www.advancedcustomfields.com/resources/oembed/
 *
 * @param $field
 * @param bool $repeater defaults to false / true if repeater
 * @param array $params / array of query string parameters as key value pairs
 *
 * @return mixed  embed HTML
 */
function videoLink( $field, $repeater = false, array $params = [] ) {
  global $post;
  // get current post ID
  $id = $post->ID;
  // set of default params
  $defaults = array(
    'rel'      => 0,
    'title'    => 0,
    'byline'   => 0,
    'portrait' => 0,
    'autoplay' => 'true'
  );
  // Check if defaults have been passed in via function args,
  // if not then add them to params array
  foreach ( $defaults as $key => $value ) {

    if ( ! array_key_exists( $key, $params ) ) {
      $params[ $key ] = $value;
    }

  }

  if ( ! $repeater ) {
    // get the field
    $videoFrame = get_field( $field, $id );
  } else {
    // if we are in a repeater
    $videoFrame = get_sub_field( $field, $id );
  }
  // use preg_match to find iframe src
  preg_match( '/src="(.+?)"/', $videoFrame, $matches );
  $src = $matches[1];
  // add extra params to iframe src

  $new_src   = add_query_arg( $params, $src );
  $videoLink = str_replace( $src, $new_src, $videoFrame );

  return $videoLink;
}


/**
 * Probably a phone
 *
 * Uses Mobile_Detect class to check user agent. Checks to
 * see if the sniffed device is a mobile device, but not a tablet.
 * If it is a mobile device, but not a tablet, it's probably
 * a phone.
 *
 * Returns true or false.
 *
 * Use sparingly because user agent sniffing is sketchy.
 *
 * @return bool
 */
function probablyAPhone() {

  if ( ! class_exists( \Mobile_Detect::class ) ) {
    return false;
  }

  // initiate the class
  $detect = new \Mobile_Detect();
  // catch all. Includes phones and tablets.
  $detect->isMobile() ? $mobile = true : $mobile = false;
  $detect->isTablet() ? $tablet = true : $tablet = false;
  $mobile && ! $tablet ? $probPhone = true : $probPhone = false;

  return $probPhone;
}

/**
 * Change Excerpt length
 */
function custom_excerpt_length( $length ) {
  return 30;
}

add_filter( 'excerpt_length', __NAMESPACE__ . '\\custom_excerpt_length', 999 );


/**
 * Populate post type choices
 *
 * Dynamically populate ACF select field for home page layouts
 * Automatically fill in acf select field on home page with the
 * currently available post types. Use get_post_types to bring
 * back post type objects, then loop through and pull out the
 * name and label, pass these to the ACF select field as
 * value : label pair.
 *
 * @see https://codex.wordpress.org/Function_Reference/get_post_types
 * @see https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 * @see https://www.advancedcustomfields.com/resources/select/
 *
 * @param $field
 *
 * @return mixed
 */
function acf_layout_post_type_choices( $field ) {

  // reset choices
  $field['choices'] = [];

  // add post types to exclude
  $exclude = [
    'attachment',
    'revision',
    'nav_menu_item',
    'custom_css',
    'customize_changeset',
    'acf-field-group'
  ];
  // todo-jimmy also exclude post types with no posts

  // get available public post types, return objects
  foreach ( get_post_types( [ 'public' => true ], 'objects' ) as $post_type ) {
    // post type name = ACF value
    $value = $post_type->name;
    // if the post type is not in the exclude array
    if ( ! in_array( $value, $exclude ) ) {

      // post type label = ACF label
      $label = $post_type->label;
      // add the value : label pair to the choices array
      $field['choices'][ $value ] = $label;
    }
  }

  // return the field
  return $field;
}

add_filter( 'acf/load_field/name=layout_post_type', __NAMESPACE__ . '\\acf_layout_post_type_choices' );