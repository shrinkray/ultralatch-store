<?php $modal = $this->modalContent(); ?>

<!-- Modal -->
<div class="modal video-modal fade" id="<?= $modal['ID']; ?>" tabindex="-1" role="dialog"
     aria-labelledby="<?= $modal['ID']; ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="<?= $modal['ID']; ?>Label"><?= $modal['heading']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
          <?= $this->displayVideo(); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
