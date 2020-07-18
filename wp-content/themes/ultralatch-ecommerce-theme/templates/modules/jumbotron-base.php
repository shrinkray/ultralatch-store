<?php $jumbotron = $this->jumbotronContent(); ?>
<div class="jumbotron"<?= $jumbotron['background']; ?>>

  <?php if($jumbotron['video_bg'] && !\Roots\Sage\Utils\probablyAPhone()) : ?>
    <div class="bg-video-wrap" role="presentation">
      <div class="bg-video-container">
        <video class="bg-video" autoplay="autoplay" loop="loop" muted="">
          <source src="<?= $jumbotron['video_bg']; ?>" type="video/mp4">
        </video>
      </div>
    </div>
  <?php endif; ?>

  <div class="container jumbotron-inner">

    <?php if ( $jumbotron['heading'] ) : ?>
      <h1 class="display-3"><?= $jumbotron['heading']; ?></h1>
    <?php endif; ?>

    <?php if ( $jumbotron['lead'] ) : ?>
      <p class="lead"><?= $jumbotron['lead']; ?></p>
    <?php endif; ?>

    <?php if ( $jumbotron['copy'] ): ?>
      <hr class="my-4">
      <div class="jumbotron-content">
        <?= $jumbotron['copy']; ?>
      </div>
    <?php endif; ?>

    <?php if ( $jumbotron['button'] ) : ?>
      <p class="lead">
        <?= $jumbotron['button']; ?>
      </p>
    <?php endif; ?>

  </div>
</div>
