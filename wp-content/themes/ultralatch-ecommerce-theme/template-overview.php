<?php
/**
 * Template Name: Product Overview Template
 * migrated from Soss Theme
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'overview-page'); ?>
<?php endwhile; ?>