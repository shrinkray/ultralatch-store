<header>
  <!-- Top Bar -->
  <nav id="anchored" class="topmenu">
    <?php // Add new widget in header for topmenu items
    use Roots\Sage\Controllers\Navigation;
    $social_args = Navigation\social_nav( 'stack square brand' );
    ?>
    <?php if ( is_active_sidebar( 'header-widget' ) ): ?>
      <div class="col footer-widgets">
        <?php dynamic_sidebar( 'header-widget' ); ?>
      </div>
    <?php endif; ?>
    <div class="container d-flex justify-content-between align-items-center">

      <?php if ( has_nav_menu( 'social_navigation' ) ) : ?>
        <div class="social-nav-wrap">
          <nav class="social-nav">
            <?php wp_nav_menu( $social_args ); ?>
          </nav>
        </div>
      <?php endif;

      // Add wooCommerce cart and count to header topmenu row ?>

      <div class="woo-nav-wrap">
        <span class="shipping-message">Free standard shipping on all orders! <i class="fa fa-angle-double-right" aria-hidden="true"></i> </span>
        <i class="fa fa-shopping-cart" aria-hidden="true"></i><a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' );
        ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() );
          ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
      </div>
    </div>
  </nav>
  <!-- End Top Bar -->

  <div class="">
    <div class="">
      <div class="header-group">

        <div class="container">

<!--          TODO: Set top section up with ACF for image and tagline  -->
          <div class="row banner-row d-flex align-items-center">

            <div class="col-3  logo">
              <a href="/" title="The most comfortable handle ever!" class="brand-logo" style="display: inline-block; height: 100%;"><?php include( 'modules/logo.svg.php'); // logo svg file saves http requests ?></a>
            </div>

            <div class="col-7 d-flex justify-content-sm-end">
              <div class="heading-tagline justify-self-end">&ldquo;The most comfortable handle ever!&rdquo;</div>
            </div>

          </div>

        </div>

      </div>

    </div>
  </div>
      <div class="main-nav">

        <div class="container">
          <?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary_navigation') ) : ?>
            <?php wp_nav_menu( ['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav ml-auto d-flex flex-wrap'] ); ?>
          <?php else: ?>
            <nav class="navbar navbar-toggleable-md">
              <button class="navbar-toggler navbar-light navbar-toggler-right " type="button" data-toggle="collapse"
                      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon ml-auto"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav ml-auto d-flex flex-wrap']);
                endif; ?>
              </div><!-- #site-navigation -->
            </nav>
          <?php endif; ?>
        </div>

      </div>




</header>
