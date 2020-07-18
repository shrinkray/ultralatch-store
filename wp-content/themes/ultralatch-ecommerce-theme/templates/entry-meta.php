<div class="flex-meta d-flex justify-content-between">
  <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
  <p class="byline author vcard"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></p>
</div>
<div class="flex-meta cat ">
  <?php the_category(', '); ?> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i><?php the_tags( ' ', ' • ', ' ' ); ?>
</div>
<div class="flex-meta tax">

</div>