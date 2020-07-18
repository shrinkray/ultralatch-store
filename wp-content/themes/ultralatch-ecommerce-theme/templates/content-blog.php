

<?php
// Setting up the $args
// http://www.wpbeginner.com/wp-themes/how-to-exclude-sticky-posts-from-the-loop-in-wordpress/
// https://www.billerickson.net/code/wp_query-arguments/
// https://www.mhthemes.com/blog/wordpress-sticky-posts/
?>





<?php
// vars
$limit = get_sub_field( 'excerpt_limit' );
$excerpt = get_sub_field( 'show_excerpt' );
$set_length = get_sub_field( 'set_excerpt_length' );
$thumb_img = '<img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22100%22%20height%3D%22100%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20100%20100%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_168d9296816%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_168d9296816%22%3E%3Crect%20width%3D%22100%22%20height%3D%22100%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2224.0546875%22%20y%3D%2254.5%22%3E100x100%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-src="" alt="100x100" style="width: 100px; height: 100px;" data-holder-rendered="true">';

$args = array(
    'order'               => 'DESC',
    'posts_per_page'      =>  -1,
    'post_type'            => 'post',
    'no_found_rows'       => 'true',
);

$the_query = new WP_Query( $args );

// The Loop

while ( $the_query->have_posts() ) {
  $the_query->the_post();

  if (is_sticky()) { ?>
    <div class="row half-block">

      <article class="col-12 card-stack d-inline-flex sticky" <?php post_class(); ?>>
        <div class="no-gutters">
          <?php if(has_post_thumbnail()) : ?>
            <a class="" href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
          <?php else : ?>
            <a class="" href="<?php the_permalink() ?>"><?php echo $thumb_img; ?></a>
          <?php endif; ?>
        </div>
        <div class="col-sm-10">
          <header>
            <h4 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
            <?php // displays just the date meta
            get_template_part('templates/entry-meta-stack-date-cat'); ?>
          </header>
          <div class="entry-content">
            <?php the_excerpt(); ?>
          </div>
        </div>
      </article>

    </div> <!--close .row -->


  <?php } else {
    if ( ! (is_sticky()) ) { ?>

      <div class="row half-block">

        <article class="col-12 card-stack d-inline-flex non-stick" <?php post_class(); ?>>
          <div class="no-gutters">
            <?php if(has_post_thumbnail()) : ?>
              <a class="" href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
            <?php else : ?>
              <a class="" href="<?php the_permalink() ?>"><?php echo $thumb_img; ?></a>
            <?php endif; ?>
          </div>
          <div class="col-sm-10">
            <header>
              <h4 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
              <?php // displays just the date meta
              get_template_part('templates/entry-meta-stack-date-cat'); ?>
            </header>
            <div class="entry-content">
              <?php the_excerpt(); ?>
            </div>
          </div>
        </article>

      </div> <!--close .row -->

    <?php } // endif
  } // end if
} // endwhile

wp_reset_query(); //reset the original WP_Query



