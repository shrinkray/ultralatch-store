<div class="flex-meta d-flex justify-content-between">
  <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
</div>
<div class="flex-meta cat d-flex justify-content-start">
  <?php the_category(', '); ?>
</div>