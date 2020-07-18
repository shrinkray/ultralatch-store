<?php

namespace Roots\Sage\Controllers\Modal;

use Roots\Sage\Wrapper\SageWrapping;

/**
 * Class Modal
 * @package Roots\Sage\Controllers\Modal
 */

class Modal {

  /**
   * Modal constructor.
   *
   * @param $postID
   * @param $prefix string
   * @param $ctaButton bool string
   */
  public function __construct( $postID, $prefix = "", $ctaButton = false ) {

    $field = "" ? $field = "modal" : $field = $prefix . "_modal";

    $this->postID = $postID;
    $this->field = $field;
    $this->ctaButton = $ctaButton;

    add_action( 'after_footer', [ $this, 'outputModal' ] );

  }

  /**
   * Modal Content
   *
   * Generates content for the modal
   *
   * @return array of string values
   */
  public function modalContent() {

    $postID = $this->postID;
    $field = $this->field;

    $heading = $field . '_title';
    $content = $field . '_content';

    $modal = [];

    $modal['heading'] = get_field( $heading, $postID );
    $modal['content']    = get_field( $content, $postID );
    $modal['ID'] = 'modal-' . $postID;
    $modal['cta'] = $this->ctaButton;

    return $modal;

  }

  /**
   * Generates button markup, or returns false if no button.
   *
   * @return bool|string false / button markup
   */
  public function modalButton() {

    $postID    = $this->postID;

    $button = false;


    if ( get_field( 'jumbotron_show_button', $postID ) === false ) {
      return $button;
    }

    $button_text   = get_field( 'jumbotron_button_text', $postID );
    $target = get_field( 'jumbotron_link_target', $postID );

    if ( get_field( 'jumbotron_link_type', $postID ) === 'internal' ) {
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
    $path     = 'templates/modules/modal-base.php';
    $template = new SageWrapping( $path );

    return $template;
  }

  /**
   * Render Modal
   *
   * Assembles the modal, sends the content to the template
   *
   * @return string a jumbotron
   */
  public function renderModal() {
    ob_start();
    include $this->filePath();
    $output = ob_get_clean();

    return $output;
  }

  /**
   * Output modal
   *
   * Outputs the modal to the front end, using the after_footer action hook
   */
  public function outputModal() {
    $jumbotron = $this->renderModal();
    echo $jumbotron;
  }

}
