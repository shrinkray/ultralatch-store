<?php
use Roots\Sage\Controllers\Branding;
use Roots\Sage\Controllers\BusinessInfo;
use Roots\Sage\Controllers\Navigation;
$social_args = Navigation\social_nav( 'stack square brand' );
$footer_args = Navigation\footer_nav('nav-pills flex-column flex-sm-row justify-content-center');

$invitation = get_field( 'invitation', 'option' );
$section_title = get_field( 'section_title', 'option' );
$welcome = get_field( 'welcome_message', 'option' );
$label = get_field( 'form_label', 'option' );
$placeholder = get_field( 'placeholder', 'option' );
$submit = get_field( 'button_name', 'option' );
$style = get_field( 'button_style', 'option' );
$pattern = get_field( 'background_pattern', 'option' );
$email_help = get_field( 'email_help_message', 'option' );
$email_field = get_field( 'email_field' );
//$no_gradient = ( get_field( 'disable_gradient', 'option' );





?>


<?php if ( !($invitation == "3" )) { ?>

  <div class="cta-newsletter cta-news py-4" data-image-src="<?= get_template_directory_uri(); ?>/dist/images/<?= $pattern ?>.png">
    <div class="container">
      <div class="row">
        <?php if ( $invitation == "1" ) : ?>

          <div class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 ">
            <h3 class="mt-3 mb-5 text-center">
              <span class="text_primary"><?= $section_title ?></span>
            </h3>
            <p class=""><?= $welcome ?></p>

            <div class="form-group row no-gutters ">

              <?php
              gravity_form( 1, $display_title = false, $display_description = false, $display_inactive = false,
                  $field_values = null, $ajax = false, $tabindex, $echo = true );
              ?>

              <div class="col-12 text-center text-muted">
                <?= $email_help ?>
              </div>
            </div>
          </div>

        <?php endif; ?>
      </div>
    </div>
  </div>

<?php } else { // $invitation == 3

   // This section does not display

} ?>
<footer class="content-info">
  <div class="container">
    <div class="row">


        <div class="col-sm col social-nav-wrap mt-5">
          <?php if ( has_nav_menu( 'social_navigation' ) ) : ?>
          <nav class="social-nav">
            <?php wp_nav_menu( $social_args ); ?>
          </nav>
          <?php endif; ?>

<!--          <div class="col footer-brand">-->
<!--            --><?php //= Branding\footer_logo( 'img-responsive' ); ?>
<!--          </div>-->

          <?php if ( is_active_sidebar( 'nav-footer' ) ): ?>
          <nav class="col-sm mt-35">
            <div class="footer-widgets">
              <?php dynamic_sidebar( 'nav-footer' ); ?>
            </div>
          </nav>
          <?php endif; ?>
        </div>


      <?php if ( is_active_sidebar( 'sidebar-footer' ) ): ?>
        <div class="col-sm footer-widgets mt-5">
          <?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div>
      <?php endif; ?>


      <?php if ( is_active_sidebar( 'serial-footer' ) ): ?>
        <div class="col-sm footer-widgets mt-5">
          <?php dynamic_sidebar( 'serial-footer' ); ?>
        </div>
      <?php endif; ?>

<!--      <div class="col business-info">-->
<!--        --><?php //include( locate_template( 'templates/modules/business-info.php' ) ); ?>
<!--      </div>-->



    </div>
  </div>

  <div class="lower-footer">
    <div class="container">

<!--   May remove this .. adds horizontal nav from primary menu   -->
<!--      --><?php //if ( has_nav_menu( 'footer_navigation' ) ) : ?>
<!--        <div class="footer-nav-wrap mt-3 mb-3">-->
<!--          <nav class="footer-nav" role="navigation">-->
<!--            --><?php //wp_nav_menu( $footer_args ); ?>
<!--          </nav>-->
<!--        </div>-->
<!--      --><?php //endif; ?>

      <div class="legal d-flex justify-content-between flex-column flex-sm-row">
        <?= BusinessInfo\privacy_policy('small p-2'); ?>
        <?= BusinessInfo\terms_page('small p-2'); ?>
        <?= BusinessInfo\copyright('small pr-2'); ?>
      </div>
    </div>
  </div>

  <!-- Return to top link -->
  <a href=”#anchored” class="go-top">
    <span class="fixed-btn fa fa-angle-up" aria-hidden="true"></span>
  </a>

</footer>
