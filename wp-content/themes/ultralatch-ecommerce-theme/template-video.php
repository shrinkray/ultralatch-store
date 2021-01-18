<?php
  /**
   * Template Name: Video Template
   */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page-video'); ?>
<?php endwhile; ?>
