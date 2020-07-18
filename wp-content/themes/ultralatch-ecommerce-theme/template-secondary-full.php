<?php
/**
 * Template Name: Secondary / Page without Sidebar
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'secondary-page'); ?>
<?php endwhile; ?>
