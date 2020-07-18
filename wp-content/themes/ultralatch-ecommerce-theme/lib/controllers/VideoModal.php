<?php

namespace Roots\Sage\Controllers\VideoModal;

use Roots\Sage\Controllers\Modal\Modal;
use Roots\Sage\Wrapper\SageWrapping;
use function Roots\Sage\Utils\videoLink;
/**
 * Class Modal
 * @package Roots\Sage\Controllers\Modal
 */

class VideoModal extends Modal {

  /**
   * VideoModal constructor.
   *
   * @param $postID
   * @param string $prefix
   * @param bool $ctaButton
   * @param $field string
   */
  function __construct( $postID, $prefix = "", $ctaButton = false, $field ) {

    $this->videoField = $field;

    parent::__construct( $postID, $prefix, $ctaButton );


  }

  public function displayVideo() {

    $params = [
      'autoplay' => 'false'
    ];

    $videoLink = videoLink($this->videoField, false, $params);

    return $videoLink;

  }

  /**
   * File path to the hero template
   *
   * @return SageWrapping
   */
  public function filePath() {
    $path     = 'templates/modules/modal-video.php';
    $template = new SageWrapping( $path );

    return $template;
  }

}
