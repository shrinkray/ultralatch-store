

<?php

/**
 * Product Overview Template
 */

$video =  get_field('add_a_video');

?>


<div class="row row-break justify-content-center no-gutter">
  <div class="col-12 col-md-8 px-0 mb-5">
    <div class="embed-container">
      <?php if ( $video )  : ?>
        <div class="embed"><?php echo $video; ?></div>
      <?php else : ?>
        Image missing
      <?php endif; ?>

    </div>
  </div>
</div>



<?php // Flexible Sections

if ( have_rows( 'flexible_layout' ) ):  ?>

  <?php while ( have_rows( 'flexible_layout' ) ) : the_row();


// <!-- Removed button that triggers modal because that was custom functionality for soss.com site  -->


     if ( get_row_layout() == 'image_with_content' ) : // image (left or right) with content


      $image_layout = get_sub_field( 'image_placement' );
      $section = get_sub_field( 'section_heading' );
      $image_p = get_sub_field( 'add_portrait' );
      $image_l = get_sub_field( 'add_landscape' );
      $image_s = get_sub_field( 'add_square' );
      $pic_p = wp_get_attachment_image($image_p, 'overview_portrait', false, $attr = array('class' => 'align-self-center mt-2'));
      $pic_l = wp_get_attachment_image($image_l, 'overview_landscape', false, $attr = array('class' => 'align-self-center mt-2'));
      $pic_s = wp_get_attachment_image($image_s, 'overview_square', false, $attr = array('class' => 'align-self-center mt-2'));

      ?>
      <div class="row row-break mb-3">
        <?php // add an H2 section header to this row

        if ( $section ) {
          ?>

          <div class="col-sm-12 col-lg-10 offset-lg-1 px-md-3">
            <h2><?php echo $section ?></h2>
          </div>

          <?php
        }

        ?>
        <?php
        if (  $image_layout  == 'left' ) {

          ?>
          <!-- Layout A IMAGE LEFT TEXT RIGHT -->


          <div class="col-sm-12 col-md-5 d-flex justify-content-center justify-content-md-end mb-5">


            <?php // Page builder sends image size. Set cropped image on one of the three options

            if ( $image_p ) {

              echo $pic_p;

            }

            elseif ( $image_l ) {

              echo $pic_l;

            }

            elseif ( $image_s ) {

              echo $pic_s;

            }

            ?>

          </div>

          <div class="col-sm-12 col-md-6 ">
            <?php

            if ( have_rows( 'mix_content' ) ): // text & button ?>

              <?php while ( have_rows( 'mix_content' ) ) : the_row(); ?>


                <?php
                if ( get_row_layout() == 'add_text' ) :

                  $add_text = get_sub_field( 'add_text_content' ); ?>

                  <?php echo $add_text; ?>

                <?php elseif ( get_row_layout() == 'build_a_button' ) : // button builder ?>

                  <?php include "partials/build-button-part.php"; ?>

                <?php endif; ?>


              <?php endwhile; // mix_content ?>

            <?php else:  // --- no layouts found ?>

            <?php endif; // mix_content ?>

          </div>

        <?php  } else {

          ?>
          <!-- Layout B IMAGE RIGHT TEXT LEFT -->

          <div class="col-sm-12 col-md-5 order-md-2 d-flex justify-content-center justify-content-md-start mb-5">

            <?php // Page builder sends image size. Set cropped image on one of the three options

            if ( $image_p ) {

              echo $pic_p;

            }

            elseif ( $image_l ) {

              echo $pic_l;

            }

            elseif ( $image_s ) {

              echo $pic_s;

            }?>

          </div>

          <div class="col-sm-12 col-md-6 order-md-1 offset-md-1">
            <?php

            if ( have_rows( 'mix_content' ) ): // text & button ?>

              <?php while ( have_rows( 'mix_content' ) ) : the_row(); ?>

                <?php if ( get_row_layout() == 'build_a_button' ) : // button builder ?>

                  <?php include "partials/build-button-part.php"; ?>

                <?php elseif ( get_row_layout() == 'add_text' ) :

                  $add_text = get_sub_field( 'add_text_content' ); ?>

                  <?php echo $add_text; ?>

                <?php endif;
                ?>


              <?php endwhile; // mix_content ?>

            <?php else:  // --- no layouts found ?>

            <?php endif; // mix_content ?>

          </div>


          <?php

        }?>
      </div>

    <?php endif; // image_with_content ?>

  <?php endwhile; // flex layout ?>

<?php else:  // --- no layouts found ?>

<?php endif; // flex layout ?>
<!-- /.row -->


