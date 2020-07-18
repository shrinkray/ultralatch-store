<?php //dynamic_sidebar('sidebar-primary'); ?>

<?php if (!is_woocommerce() && !is_page_template( 'template-blog.php' )) : ?>
  <?php dynamic_sidebar('sidebar-primary'); ?>
<?php endif; ?>
<?php if (is_woocommerce()) : ?>
  <?php dynamic_sidebar('shop-main'); ?>
<?php endif; ?>
<?php if (is_page_template( 'template-blog.php' )) : ?>
  <?php dynamic_sidebar('sidebar-blog'); ?>
<?php endif; ?>
