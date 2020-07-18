<?php

namespace Roots\Sage\Controllers\HomePage;


function home_sections() {

  $sections = [];

  // check if the flexible content field has rows of data
  if ( have_rows( 'content_sections' ) ):

    // loop through the rows of data
    while ( have_rows( 'content_sections' ) ) : the_row();

      $section = $posts = [];

      // post types
      if ( get_row_layout() === 'layout_post_types' ):

        $selection = get_sub_field( 'layout_post_type' );

        // todo-jimmy add option to customize title then fall back to post type name
        $section['title']  = $selection['label'];

        $post_type_name = $selection['name'];
        $num_posts       = get_sub_field( 'layout_number_of_posts' );
        $num_columns     = get_sub_field( 'layout_number_of_columns' );

        switch ( $num_columns ) {
          case '1':
            $col = '12';
            break;
          case '2':
            $col = '6';
            break;
          case '3':
            $col = '4';
            break;
          case '4':
            $col = '3';
            break;
          default:
            $col = '12';
        }

        $section['col'] = $col;

        $args = [
          'post_type'      => $post_type_name,
          'posts_per_page' => $num_posts
        ];

        $query = new \WP_Query( $args );

        $posts = [];

        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post();
            $post = [];

            $post['title']     = get_the_title();
            $post['excerpt']   = get_the_excerpt();
            $post['thumbnail'] = get_the_post_thumbnail('full', ['class' => 'card-img-top']);
            $post['permalink'] = get_the_permalink();

            $posts[] = $post;
          endwhile;
          wp_reset_postdata();
        endif;
      $section['posts'] = $posts;

      // CTA Opt In
      elseif ( get_row_layout() === 'layout_cta_optin' ):

        $image = get_sub_field( 'add_background_image' );

        if ( $image ) {
          wp_get_attachment_image( $image, 'full' );
        }

        $optin = [];

        $optin['optin_message'] = get_sub_field( 'add_paragraph_text' );
        $optin['optin_button'] = get_sub_field( 'cta_button' );
        $optin['optin_url'] = get_sub_field( 'button_url' );

        $optins[] = $optin;

      endif;

      $sections[] = $optin;

      // More....
      //elseif ( get_row_layout() == 'foo' ):
        // more more more
     // endif;

     // $sections[] = $section;

    endwhile;
  else :
    // no sections
    $sections = false;
  endif;

  return $sections;
}

