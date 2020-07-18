<?php

namespace Roots\Sage\Controllers\FormModal;

use Roots\Sage\Controllers\Modal\Modal;
use Roots\Sage\Wrapper\SageWrapping;

/**
 * Class FormModal
 * @package Roots\Sage\Controllers\FormModal
 */
class FormModal extends Modal {

  /**
   * VideoModal constructor.
   *
   * @param $postID
   * @param string $prefix
   * @param bool $ctaButton
   * @param $field string
   */
  function __construct( $postID, $prefix = "", $ctaButton = false, $formField ) {

    $this->formField = $formField;

    parent::__construct( $postID, $prefix, $ctaButton );

  }

  public function formObject() {

    $formObject = get_field( $this->formField, $this->postID );

    return $formObject;

  }

  /**
   * Checks for and returns form title and description
   * (*note - via ACF fields, not the gravity forms title and description)
   * @return array
   */
  public function formInfo() {

    $formInfo = [];

    $field = $this->field;

    $title = $field . '_form_title';
    $description = $field . '_form_description';

    $formInfo['title']       = get_field( $title, $this->postID );
    $formInfo['description'] = get_field( $description, $this->postID );

    return $formInfo;
  }

  /**
   * File path to the hero template
   *
   * @return SageWrapping
   */
  public function filePath() {
    $path     = 'templates/modules/modal-form.php';
    $template = new SageWrapping( $path );

    return $template;
  }

}
