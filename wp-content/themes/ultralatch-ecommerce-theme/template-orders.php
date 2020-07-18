<?php
/**
 * Template Name: Large Orders / Page without Sidebar
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'large-order-page'); ?>
<?php endwhile; ?>
