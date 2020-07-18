<?php

namespace Roots\Sage\Controllers\Jumbotron;

use Roots\Sage\Controllers\Modal\Modal;
use Roots\Sage\Controllers\VideoModal\VideoModal;
use Roots\Sage\Controllers\FormModal\FormModal;
use function Roots\Sage\Utils\videoLink;
use Roots\Sage\Wrapper\SageWrapping;

/**
 * Class Jumbotron
 * @package Roots\Sage\Controllers\Jumbotron
 */
class Jumbotron {

  /**
   * Jumbotron constructor.
   *
   * @param $postID
   */
  public function __construct( $postID ) {

    $this->postID = $postID;

    add_action( 'after_header', [ $this, 'outputJumbotron' ], 10 );

  }

  /**
   * Jumbotron Content
   *
   * Generates content for the jumbotron
   *
   * @return array of string values
   */
  public function jumbotronContent() {

    $postID = $this->postID;

    $jumbotron = [];

    $jumbotron['heading'] = get_field( 'jumbotron_heading', $postID );
    $jumbotron['lead']    = get_field( 'jumbotron_lead', $postID );
    $jumbotron['copy']    = get_field( 'jumbotron_copy', $postID );
    $jumbotron['button']  = $this->jumbotronButton();

    $background = false;

    if ( get_field( 'jumbotron_background_image', $postID ) ) {
      $url = get_field( 'jumbotron_background_image', $postID );

      $background = " style=\"background: url({$url});\"";

    }

    if( get_field( 'jumbotron_use_modal' )) {

      $trigger_text = get_field( 'jumbotron_modal_button_text', $postID );
      $modal_id = 'modal-' . $postID;
      $trigger = sprintf( '<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#%1$s">%2$s</a>', $modal_id,  $trigger_text );

      $ctaButton = $jumbotron['button'];

      $jumbotron['button'] = $trigger;

      $type = get_field( 'jumbotron_modal_type' );

      switch ($type) {
        case 'basic':
          new Modal($this->postID, 'jumbotron', $ctaButton);
          break;
        case 'video':
          new VideoModal($this->postID, 'jumbotron', false, 'jumbotron_video_link');
          break;
        case 'form':
          new FormModal($this->postID, 'jumbotron', false, 'jumbotron_select_form' );
          break;
      }
    }

    $jumbotron['background'] = $background;

    // video bg (field (should) returns URL to mp4 file)
    if(get_field('jumbotron_video_background', $postID)) {
      $jumbotron['video_bg'] = get_field('jumbotron_background_video_url', $postID);
    } else {
      $jumbotron['video_bg']  = false;
    }

    return $jumbotron;

  }

  /**
   * Generates button markup, or returns false if no button.
   *
   * @return bool|string false / button markup
   */
  public function jumbotronButton() {

    $postID = $this->postID;

    $button = false;


    if ( get_field( 'jumbotron_show_button', $postID ) === false ) {
      return $button;
    }

    $button_text = get_field( 'jumbotron_button_text', $postID );
    $link_type   = get_field( 'jumbotron_link_type', $postID );
    $target      = get_field( 'jumbotron_link_target', $postID );

    if ( $link_type === 'internal' ) {
      $link = get_field( 'jumbotron_internal_link', $postID );
    } else {
      $link = get_field( 'jumbotron_custom_link', $postID );
    }


    $button = sprintf( '<a href="%1$s" class="btn btn-primary btn-lg" target="%2$s">%3$s</a>', $link, $target, $button_text );

    return $button;

  }


  /**
   * File path to the hero template
   *
   * @return SageWrapping
   */
  public function filePath() {
    $path     = 'templates/modules/jumbotron-base.php';
    $template = new SageWrapping( $path );

    return $template;
  }

  /**
   * Render Jumbotron
   *
   * Assembles the jumbotron, sends the content to the template
   *
   * @return string a jumbotron
   */
  public function renderJumbotron() {
    ob_start();
    include $this->filePath();
    $output = ob_get_clean();

    return $output;
  }

  /**
   * Output jumbotron
   *
   * Outputs the jumbotron to the front end, using the after_header action hook
   */
  public function outputJumbotron() {
    $jumbotron = $this->renderJumbotron();
    echo $jumbotron;
  }


}
