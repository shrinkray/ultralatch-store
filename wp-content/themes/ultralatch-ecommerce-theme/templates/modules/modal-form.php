<?php
$modal = $this->modalContent();
$form_object = $this->formObject();
$form_info = $this->formInfo();
?>

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
        <?php if($form_info['title']) : ?>
          <h6><?= $form_info['title']; ?></h6>
        <?php endif; ?>
        <?php if($form_info['description']) : ?>
          <div class="modal-form-description">
            <?= $form_info['description']; ?>
          </div>
        <?php endif; ?>
        <div class="modal-form">
          <?php
          gravity_form_enqueue_scripts($form_object['id'], true);
          gravity_form($form_object['id'], false, false, false, '', true, 1);
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
