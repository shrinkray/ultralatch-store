<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
use Roots\Sage\Controllers\Jumbotron\Jumbotron;
use Roots\Sage\Controllers\Slider\Slider;

$ID = get_the_ID();
if ( get_field( 'display_jumbotron' ))
  new Jumbotron( $ID );

if ( get_field( 'slider_show_slider' ))
  new Slider( $ID);
?>



<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      acf_form_head();
      do_action('get_header');
      get_template_part('templates/header');
      do_action('after_header');
    ?>
    <?php
    /**
     * This section pulls data from the ACF form found on the home page
     * @string: $combo is a shortcode string value
     * This places a slider originating from a plugin in the top area of the website above the content.
     */
    $alt_code = get_field('place_shortcode');
    $combo = $alt_code ;
    if( $alt_code ) :
    echo do_shortcode( $combo );
    endif;
    ?>


    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->


          <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif;
        ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      do_action('after_footer');
      wp_footer();
    ?>
  </body>
</html>
