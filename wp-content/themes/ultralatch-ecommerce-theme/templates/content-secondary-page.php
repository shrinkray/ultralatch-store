<?php

if ( have_rows( 'content_sections' ) ): ?>
  <?php while ( have_rows( 'content_sections' ) ) : the_row(); ?>


    <!--      LEFT CTA ROW     -->

    <?php if ( get_row_layout() == 'layout_cta_left_optin' ) :

      $optin_title = get_sub_field('left_optin_section_title' );
      $optin_copy = get_sub_field( 'left_optin_paragraph_text' );
      $toggle = get_sub_field( 'left_optin_toggle');
      $button = get_sub_field( 'optin_button' );
      $link_target = get_sub_field( 'optin_link_target' );
      $button_style = get_sub_field( 'optin_button_style' );
      $link_type = get_sub_field( 'optin_link_type' );
      $internal_link = get_sub_field( 'optin_internal_link' );
      $custom_link = get_sub_field( 'optin_custom_link' );



      ?>

      <!-- Image Right - Checklist -->
      <div class="cta-list">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 py-5">
              <h3 class="col-12 col-lg-11 mt-0 mb-4 ml-lg-5 text_primary"><?php echo $optin_title ?></h3>

              <?php

              $left_content_toggle = get_sub_field( 'left_optin_toggle_sub_content' );
              $left_para = get_sub_field( 'left_optin_paragraph_text' ); ?>

              <div class="mb-4 ml-lg-5">

                <?php if ( $left_content_toggle ) { // display paragraph field ?>

                  <div class="col-12 col-md-11 text-grey">
                    <?php echo $left_para ?>
                  </div>

                <?php } else   { // display repeater

                  if ( have_rows( 'left_optin_punchlist_repeater' ) ) :
                    while ( have_rows( 'left_optin_punchlist_repeater' ) ) : the_row();

                      // repeater vars
                      $left_subheading = get_sub_field( 'left_optin_sub-heading' );
                      $left_subdesc = get_sub_field( 'left_optin_sub_paragraph' );
                      $subheading_link = get_sub_field( 'sub_heading_link' );
                      ?>


                      <div class="col-12 col-md-11 text-grey">

                        <?php if ( $subheading_link ) { // Check items can have a post or page link associated
                          ?>

                          <h4 class="light text-uppercase">
                            <a href="<?= $subheading_link ?>" class="subheading-link" ><i class="fa fa-check text_primary icon-2x"></i><?php echo $left_subheading ?></a>
                          </h4>

                        <?php } else { ?>
                          <h4 class="light text-uppercase">
                            <i class="fa fa-check text_primary icon-2x"></i><?= $left_subheading ?>
                          </h4>
                        <?php } ?>
                        <div class="col-12 ml-3"><p><?= $left_subdesc ?></p></div>
                      </div>


                    <?php endwhile; // repeater field ?>

                  <?php else : ?>
                    <?php // no rows found ?>
                  <?php endif; // repeater rows ?>


                <?php } ?>
              </div> <!-- end .row -->
              <?php if ( $toggle == 1 ) {
                // echo 'true'; ?>

                <div class="d-flex justify-content-center">
                  <?php if ( $toggle ) {
                    if ($button) { // display linked button

                      if ($link_type == "internal") { // link points to an internal page ?>

                        <a class="btn btn-primary <?php echo $button_style; ?>" href="<?php echo $internal_link; ?>" role="button" target="<?php echo $link_target; ?>"><?php echo $button; ?></a>

                      <?php } else  { // ( $link_type == "custom" ) ?>

                        <a class="btn btn-primary <?php echo $button_style; ?>" href="<?php echo $custom_link; ?>" role="button" target="<?php echo $link_target; ?>"><?php echo $button; ?></a>

                      <?php } ?>
                    <?php } else {
                      // do not display button
                    }
                  } else {
                    // toggle off

                  } ?>
                </div>

              <?php } else {
                // echo 'false';
              } ?>

            </div> <!-- end .col-* -->

            <?php
            $optin_image = get_sub_field( 'left_optin_background_image' ); // echos URL
            // if( !empty($optin_image) ):
            // vars
            ?>
            <?php // endif; ?>
            <div class="col-lg-6 divider-diagonal cta-diagonal divider-diagonal-r"
                 data-image-src="<?php echo $optin_image; ?>">
            </div>
          </div> <!-- end .row -->
        </div> <!-- end .container-fluid -->
      </div> <!-- close .cta-list -->

      <?php //endif; ?>



      <!--      RIGHT CTA ROW -->

    <?php elseif ( get_row_layout() == 'layout_cta_right_optin' ) :

      $optin_title = get_sub_field('right_optin_section_title' );
      $optin_copy = get_sub_field( 'right_optin_copy' );
      $toggle = get_sub_field( 'right_optin_toggle');
      $button = get_sub_field( 'optin_button' );
      $link_target = get_sub_field( 'optin_link_target' );
      $button_style = get_sub_field( 'optin_button_style' );
      $link_type = get_sub_field( 'optin_link_type' );
      $internal_link = get_sub_field( 'optin_internal_link' );
      $custom_link = get_sub_field( 'optin_custom_link' );

      ?>
      <?php  ?>
      <!-- Image Left - A Handle -->
      <div class="cta-list">
        <div class="container-fluid">
          <div class="row">
            <?php
            $optin_image = get_sub_field( 'right_optin_background_image' ); // echos URL

            ?>
            <?php // endif; ?>
            <div class="col-lg-6 divider-diagonal cta-diagonal divider-diagonal-l"
                 data-image-src="<?php echo $optin_image; ?>">


            </div> <!-- close background image -->
            <div class="col-lg-6 py-5 " >
              <h3 class="col-12 mt-0 mb-3 text_primary"><?php echo $optin_title ?></h3>
              <div class="mb-3 mr-lg-5">

                <div class="col-12 col-lg-11 text-grey">

                  <?php echo $optin_copy ?>

                  <div class="d-flex justify-content-center " >
                    <?php if ( $toggle ) {
                      if ( $button ) { // display linked buttonf

                        if ( $link_type == "internal" ) { // link points to an internal page ?>

                          <a class="btn btn-primary <?php echo $button_style; ?>" href="<?php echo $internal_link; ?>" role="button" target="<?php echo $link_target; ?>"><?php echo $button; ?></a>

                        <?php } else  { // ( $link_type == "custom" ) ?>

                          <a class="btn btn-primary <?php echo $button_style; ?>" href="<?php echo $custom_link; ?>" role="button" target="<?php echo $link_target; ?>"><?php echo $button; ?></a>

                        <?php } ?>
                      <?php } else {
                        // do not display button
                      }
                    } else {
                      // toggle off

                    } ?>
                  </div>

                </div>
              </div>
            </div> <!-- close text side -->

          </div> <!-- close .row -->
        </div> <!-- close .container-fluid -->
      </div> <!-- close second .cta-list -->

    
    <!-- VIDEO BLOCK :) -->

    <?php elseif ( get_row_layout() == 'video_block' ) :

      $video_url = get_sub_field( 'video_embed' );
      ?>

      <div class="row row-break justify-content-sm-center">
        <div class="col-md-8">
          <div class="embed-container">
            <?php if ( $video_url )  : ?>
              <div class="embed"><?php echo $video_url; ?></div>
            <?php else : ?>
              Something is wrong.
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!--    FULL-WIDTH BLOCK    -->

    <?php elseif ( get_row_layout() == 'standard_block' ) :
      $full_row = get_sub_field( 'full_row_block' );
      $section_title = get_sub_field( 'section_title' );
      $wysiwyg = get_sub_field( 'text_block' );
      $break_block = get_sub_field( 'break_block' );
      $background = get_sub_field( 'background_options' );
      $pallet = get_sub_field( 'theme_pallet' );
      $pattern = get_sub_field( 'theme_pattern' );
      $credit = get_sub_field( 'credited_to' );
      $seigaiha = get_sub_field( 'background_pattern' );

      if ( $full_row  == 'media' ) { ?>

        <?php if ( $section_title ) { ?>
          <div class="row">
            <div class="col">
              <div class="block-title">
                <h2><?php echo $section_title; ?></h2>
              </div>
            </div>
          </div>
        <?php } else {
          // don't display a title row
        }
        ?>

        <div class="row">
          <div class="col">

            <div class="standard-block block">

              <div class="block">
                <?php echo $wysiwyg; ?>
              </div>

            </div> <!-- .standard-block -->
          </div>
        </div>

      <?php } else { ?>

        <div class="row align-items-center">
          <div class="col">
            <div class="break-block block" data-image-src="<?= get_template_directory_uri(); ?>/dist/images/<?= $seigaiha ?>.png">

              <blockquote class="text-center"><?php echo $break_block; ?></blockquote>

              <?php if ( $credit ) { // display only if the quotation has an author
                ?>
                <div class="credit">&mdash;&nbsp;<?php echo $credit; ?></div>
              <?php } else {
                // do nothing
              } ?>


            </div> <!-- .standard-block -->
          </div>
        </div>

      <?php } ?>


      <!--    CARD BUILDER ROW     -->
      <?php
      /**
       * Updates 3/5/2019
       **  Replace holder.js with an SVG image placeholder instead. It is not reliant on a JS script and it scales.
       **  Change ACF for the Button. The image and title get link info and the button is out of style. Code already
       *   works to put same link on other areas.
       **  Add 'more' link in description.
       *
       */
      ?>

    <?php elseif ( get_row_layout() == 'card_builder' ) :
      $section_title = get_sub_field( 'section_title' );
      $no_gutters = get_sub_field( 'remove_gutters' );

      if ( $section_title ) { ?>
        <div class="row">
          <div class="col">

            <div class="block-title">
              <h2 class=""><?php echo  $section_title ?></h2>
            </div>

          </div>
        </div>
      <?php } else {
        // pass through
      } ?>

      <div class="row">

      <?php if ( $no_gutters ) { ?>

      <div class="card-group block no-gutters">

    <?php } else { ?>
      <div class="card-group block">
    <?php } ?>


      <?php if ( have_rows( 'assemble_card' ) ) :

      while ( have_rows( 'assemble_card' ) ) : the_row();

        // This was made more complicated to add options for appearance.

        // vars
        $card_title = get_sub_field( 'card_title' );
        $card_text = get_sub_field( 'card_text' );
        $image = get_sub_field( 'card_image' );
        $over_image = get_sub_field( 'over_image' );
        $text_color = get_sub_field( 'text_color' );
        $heading_link = get_sub_field( 'heading_link' );


        //CTA Button
        $toggle = get_sub_field( 'button_toggle' );
        $button = get_sub_field( 'button_name' );
        $type = get_sub_field( 'type' );
        $target = get_sub_field( 'target' );
        $internal = get_sub_field( 'internal_link' );
        $custom = get_sub_field( 'custom_link' );
        $style = get_sub_field( 'style' );
        $more = "...";


        ?>

        <div class="col-12  col-sm-6 col-lg-3">
          <div class="card">
            <div class="image-block">
              <?php if( ! empty( $image ) ) : { ?>
                <?php $pic = wp_get_attachment_image( $image, "secondary_image", false, $attr=array('class' => 'align-self-center card-image-top')); ?>

                <?php if ( $type == "internal" ) { // Title link to internal page
                  ?>
                  <a href="<?php echo $internal; ?>" target="<?php echo $target; ?>">
                    <?php echo $pic; ?></a>

                <?php } elseif ( $type == "custom" ) { // Title link to external page
                  ?>

                  <a href="<?php echo $custom; ?>" target="<?php echo $target; ?>">
                    <?php echo $pic; ?></a>

                <?php } else { // No link
                  echo $pic;
                } ?>

              <?php } else :  // with no image display placeholder ?>
                <svg version="1.1" id="svgPlaceholder" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 271 130"  xml:space="preserve"></svg>

              <?php endif; ?>
              <?php if ( $over_image ) {
                // add card header text here ?>
                <header>
                  <h3 class="card-title over-image checkScrollHeightOverflow" style="color: <?= $text_color ?>;">
                    <?php echo $card_title ?>
                  </h3>
                </header>

              <?php } else {
                // text heading appears below image
              } ?>
            </div>

            <div class="card-block">

              <?php if ( ! $over_image ) { ?>
                <?php if ( $type == "internal" ) { // Title link to internal page
                  ?>
                  <header>
                    <h3 class="card-title text-center checkScrollHeightOverflow">
                      <a href="<?php echo $internal; ?>" target="<?php echo $target; ?>">
                        <?php echo $card_title ?></a>
                    </h3>
                  </header>
                <?php } elseif ( $type == "custom" ) { // Title link to external page
                  ?>
                  <header>
                    <h3 class="card-title text-center checkScrollHeightOverflow">
                      <a href="<?php echo $custom; ?>" target="<?php echo $target; ?>">
                        <?php echo $card_title ?></a>
                    </h3>
                  </header>
                <?php } else { // No link
                  ?>
                  <header>
                    <h3 class="card-title text-center checkScrollHeightOverflow">
                      <?php echo $card_title ?>
                    </h3>
                  </header>
                <?php } ?>
              <?php } else {
                // Heading appears on top of image
              } ?>

              <?php if ( $heading_link ) {
                // echo 'true';
              } else {
                // echo 'false';
              } ?>


              <div class="card-summary card-text align-self-center">
                <p class="text-left"><?php echo $card_text ?>
                  <?php if ( ! $toggle ) { // If no footer button then add internal more link.?>
                    <a class="more-link" href="<?php echo $internal; ?>"
                       target="<?php echo $target; ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                  <?php } else { // no more button ?>

                  <?php } ?>
                </p>
              </div>

              <footer>
                <div class="d-flex justify-content-center align-self-center">
                  <?php if ( $toggle ) {
                    if ($button) { // display linked button

                      if ($type == "internal") { ?>

                        <a class="<?php echo $style; ?> internal" href="<?php echo $internal; ?>"
                           role="button" target="<?php echo $target; ?>"><?php echo $button; ?></a>

                      <?php } elseif ($type == "custom") { ?>

                        <a class="<?php echo $style; ?> external" href="<?php echo $custom; ?>"
                           role="button" target="<?php echo $target; ?>"><?php echo $button; ?></a>

                      <?php } else {
                        // no link
                      }
                    } else {
                      // no button
                    }
                  } else {
                    // toggle off
                  } ?>
                </div>
              </footer>
            </div> <!-- /.card-block -->
          </div> <!-- .card -->
        </div> <!-- /.col -->

      <?php  endwhile; ?>
      </div> <!-- .card-group -->
      </div> <!-- .row -->

    <?php else : ?>
      <?php // no rows found ?>
    <?php endif; // assemble_card ?>



      <!--    POSTS BUILDER ROW Secondary    -->

    <?php elseif ( get_row_layout() == 'post_builder' ) :

      // vars
      $post_type = get_sub_field( 'post_type' );
      $categories_ids = get_sub_field( 'categories' );
      // $dump =  var_dump( $categories_ids );
      $num_columns = get_sub_field( 'number_of_columns' );
      $num_posts = get_sub_field( 'number_of_posts' );
      $section_title = get_sub_field( 'section_title' );
      $excerpt = get_sub_field( 'show_excerpt' );
      $featured = get_sub_field( 'display_featured_image' );
      $show_meta = get_sub_field( 'display_meta_content' );
      $which_meta = get_sub_field( 'which_meta' );
      $set_length = get_sub_field( 'set_excerpt_length' );
      $limit = get_sub_field( 'excerpt_limit' );

      // Setting up the $args
      // http://www.wpbeginner.com/wp-themes/how-to-exclude-sticky-posts-from-the-loop-in-wordpress/
      $args = array(
          'order'               => 'DESC',
          'posts_per_page'      =>  $num_posts,
          'post_type'            =>  $post_type,
          'no_found_rows'       => 'true',
          'ignore_sticky_posts' => 1
      );
      ?>

      <?php
      if ( $post_type ) {
        ?>

        <?php if ( $section_title ) { ?>
          <div class="row">
            <div class="col">
              <div class="block-title">
                <h2><?php echo $section_title; ?></h2>
              </div>
            </div>
          </div>
        <?php } else {
          // don't display a title row
        }
        ?>

        <?php // http://www.problogdesign.com/how-to/the-2-methods-of-showing-excerpts/
        // https://codex.wordpress.org/Class_Reference/WP_Query
        // query for the blog archive page

        $your_query = new WP_Query( $args );

        // "loop" through query (even though it's just one page)
        echo '<div class="row block">';
        while ($your_query->have_posts()) : $your_query->the_post(); ?>

          <div class="col-12 col-sm-3 col-md">
            <article <?php post_class(); ?>>
              <?php if ( $featured ) {
                if(has_post_thumbnail()) : ?>
                  <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                <?php else : ?>
                  <a href="<?php the_permalink() ?>"><svg version="1.1" id="svgPlaceholder" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 271 130"  xml:space="preserve"></svg></a>
                <?php endif;
              } else { // we've selected not to display a featured image
                // skip the image
              }
              ?>
              <div class="card-block">
                <header>
                  <a href="<?php the_permalink() ?>"><h3 class="entry-title card-title checkScrollHeightOverflow"><?php the_title(); ?></h3></a>

                  <?php // Do we show meta tags? If so, display from two combinations
                  if ( $show_meta ) {
                    // decide which meta
                    switch ( $which_meta ) {
                      case "all" :
                        get_template_part('templates/entry-meta'); ;
                        break;
                      case "date" :
                        get_template_part('templates/entry-meta-date');
                        break;
                      case "date_author" :
                        get_template_part('templates/entry-meta-date-author'); ;
                        break;
                      case "date_cat" :
                        get_template_part('templates/entry-meta-date-cat');
                        break;
                    }
                  } else {
                    // no meta to display on post
                  } ?>
                </header>

                <?php if( $excerpt ) {
                  if ( $set_length ) { // helps set consistency in displayed posts ?>
                    <div class="entry-content">
                      <?php echo excerpt($limit); ?>
                    </div>
                  <?php } else { ?>
                    <div class="entry-content">
                      <?php the_excerpt(); ?>
                    </div>
                  <?php }
                  ?>

                <?php } else {
                  // there will be no excerpt
                } ?>
                <footer>
                </footer>
              </div>
            </article>
          </div>

          <?php
        endwhile;

        // reset post data (important!)
        wp_reset_postdata();
        ?>
        </div> <!-- .row -->

        <?php
      } // close post_type ?>




      <?php
    endif; // last if layout
  endwhile; // big loop ?>
<?php else: ?>
  <?php // no layouts found ?>
<?php endif; // content_section


