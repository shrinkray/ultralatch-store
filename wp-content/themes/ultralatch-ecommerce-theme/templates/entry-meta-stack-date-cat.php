<div class="flex-meta d-flex justify-content-start">
  <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?>&nbsp;&nbsp;</time>

  <div class="cat">
    <?php the_category(', '); ?>
  </div>
</div>