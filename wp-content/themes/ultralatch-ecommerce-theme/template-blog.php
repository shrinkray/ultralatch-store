<?php
  /**
   * Template Name: Blog Collection
  */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'blog'); ?>
<?php endwhile; ?>