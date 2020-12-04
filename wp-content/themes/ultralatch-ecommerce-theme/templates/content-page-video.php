<?php
  /**
   * Created by PhpStorm.
   * User: gmiller
   * Date: 2/26/18
   * Time: 7:46 PM
   */

  // Setting up the $args
  // http://www.wpbeginner.com/wp-themes/how-to-exclude-sticky-posts-from-the-loop-in-wordpress/
  // https://www.billerickson.net/code/wp_query-arguments/
  // https://www.mhthemes.com/blog/wordpress-sticky-posts/
  // https://wordpress.stackexchange.com/questions/41507/wordpress-remove-link-in-the-tags


  echo "<div class=\"row featured\">" ;

  $args = array(
    'order'               => 'DESC',
    'posts_per_page'      =>  -1,
    'post_type'            => 'video',
    'no_found_rows'       => 'true',
    'meta_query'            => array(

      array(
        'key'     => 'featured_video',
        'value'   => '1',
        'compare' => '=',
      ),
    )
  );

  $the_query = new WP_Query( $args );


  // The Loop

  while ( $the_query->have_posts() ) {
    $the_query->the_post();

// new vars

    $video_title = get_field( 'video_page_title' );
    $learn_more = get_field( 'page_link_name' );
    $video = get_field( 'oembed' );
    $custom_excerpt = get_field( 'add_excerpt' );
    $vid_desc = get_field( 'video_description' );
    $social_toggle = get_field( 'add_social_links');
    $facebook_link = get_field( 'facebook_share_link' );
    $twitter_link = get_field( 'twitter_share_link' );
    $linkedin_link = get_field( 'linkedin_share_link' );



    ?>


    <div class="col-12 mb-6  ">
      <article <?php post_class('d-flex flex-wrap'); ?>>
        <div class="col-12 col-lg-8 px-0">

          <?php if ( $video ) : ?>

            <div class="embed-container"><?php echo $video; ?></div>

          <?php else : ?>

          <?php endif; ?>

        </div>
        <div class="col-12 col-lg-4 ">

          <div class="card-block d-flex flex-lg-column justify-content-between flex-lg-wrap flex-sm-nowrap">

            <div class="title-content flex-lg-row "> <!-- This is a column for title related content -->

              <div class="meta">

                <?php
                  // Use this to make tags clickable
                  //the_tags( ' ', ' <span class="tag align-self-center">•</span> ', ' ' ); ?>
                <?php
                  // Use this to strip anchor tags away from tags
                  $posttags = get_the_tags();
                  if ($posttags) {
                    foreach($posttags as $tag) {
                      echo '<span class="tag align-self-start px-0">' . $tag->name . '</span>';
                    }
                  }
                  // Dummy content
                  //echo '<span class="tag align-self-start px-0">' . 'tag, tag, tag' . '</span>';
                  // end dummy content
                ?>
              </div>

              <h2 class="video-title" ">

              <a href="<?php the_permalink() ?>"><?php echo $video_title; ?></a>

              </h2>

              <?php if( $custom_excerpt ) { ?>

                <div class="entry-content ">

                  <?php echo $custom_excerpt; ?>

                </div>

              <?php } else {
                // there will be no excerpt
              } ?>
              <div class="social-dots d-flex">
                <?php if ( $social_toggle ) { ?>
                  <?php if ($facebook_link) { ?>
                    <a class="launch" href="<?php echo $facebook_link; ?>" target="_blank">
                    <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                    </a>
                  <?php }

                  if ($twitter_link) { ?>
                    <a class="launch" href="<?php echo $twitter_link; ?>" target="_blank">
                    <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                    </a>
                  <?php }

                  if ( $linkedin_link ) { ?>
                    <a class="launch" href="<?php echo $linkedin_link; ?>" target="_blank">
                    <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                  </span>
                    </a>
                  <?php } ?>


                <?php } else { ?>

                <?php } ?>
              </div>

            </div>


            <div class="flex-lg-row align-self-start mt-2">

              <?php if ($learn_more) { ?>
                <a class="btn-outline-success btn btn-md " href="<?php the_permalink() ?>"><?php echo $learn_more; ?></a>
              <?php } else { // use default text ?>
                <?php echo "Learn More"; ?>
              <?php } ?>

            </div>

          </div>

        </div>
      </article>
    </div>

    <?php // endif

  } // endwhile;
  wp_reset_query(); //reset the  WP_Query

  echo "</div>" ; // close .row
?>





<div class="row regular">
  <div class="col-10 offset-1 d-flex flex-wrap">
    <?php

      $posted = get_the_ID(); // This is the ID of this video post

      $args = array(
        'order'               => 'DESC',
        'posts_per_page'      =>  -1,
        'post_type'            => 'video',
        'no_found_rows'       => 'true',
      );

      $the_query = new WP_Query( $args );

      /*
      * The Loop
      * This loop displays all video posts
      * that are not the presenting post
      */

      while ( $the_query->have_posts() ) {
        $the_query->the_post();

        // new vars
        $featured = get_field( 'featured_video' );
        $video_title = get_field( 'video_page_title' );
        $learn_more = get_field( 'page_link_name' );
        $video = get_field( 'oembed' );
        $custom_excerpt = get_field( 'add_excerpt' );
        $vid_desc = get_field( 'video_description' );
        $current_ID = get_the_ID();


        // instead of video, display thumbnail

        preg_match('/src="(.+?)"/', $video, $matches_url );
        $src = $matches_url[1];

        preg_match('/embed(.*?)?feature/', $src, $matches_id );
        $id = $matches_id[1];
        $id = str_replace( str_split( '?/' ), '', $id );

        //var_dump( $id );

        // if any posts are not this post, display below.

        if ( $current_ID != $posted ) { ?>

          <div class="col-lg-6 my-4">

            <div class="embed">

              <?php if ( $video ) : // display thumbnail from YouTube ?>

                <!--                  <a href="--><?php //the_permalink() ?><!--"><img class="img-fluid" src="http://img.youtube.com/vi/--><?php //echo $id; ?><!--/mqdefault.jpg"></a>-->
                <div class="embed-container"><?php echo $video; ?></div>
              <?php else : ?>

              <?php endif; ?>

            </div>

            <div class="card-block d-flex flex-column">
              <header class="flex-row">
                <h3 class="video-title"><a href="<?php the_permalink() ?>"><?php echo $video_title; ?></a></h3>
              </header>
              <?php if( $custom_excerpt ) { ?>
                <div class="entry-content flex-row mb-1">
                  <?php echo $custom_excerpt; ?>
                </div>
              <?php } else {
                // there will be no excerpt
              } ?>

            </div>
            <?php if ($learn_more) { ?>
              <a class="btn-link " href="<?php the_permalink() ?>"><?php echo $learn_more; ?></a>
            <?php } else { // use default text ?>
              <?php echo "Learn More"; ?>
            <?php } ?>
          </div>





        <?php } // endif

      } // endwhile; ?>
    <?php wp_reset_query(); //reset the  WP_Query ?>
  </div>
</div>
