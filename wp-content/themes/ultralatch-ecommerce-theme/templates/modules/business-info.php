<?php
use Roots\Sage\Controllers\BusinessInfo;

$info = BusinessInfo\business_info();
?>

<div class="business-info">
  <address>

    <?php if ( $info['address1'] ) : ?>
      <span class="address-1"><?= $info['address1']; ?></span>
    <?php endif; ?>
    <?php if ( $info['address2'] ) : ?>
      <span class="address-2"><?= $info['address2']; ?></span>
    <?php endif; ?>
    <?php if ( $info['address3'] ) : ?>
      <span class="address-3"><?= $info['address3']; ?></span>
    <?php endif; ?>

    <?php if ( $info['phone'] ) : ?>
      <abbr title="phone" class="phone">
        P: <a href="tel:<?= $info['phone']; ?>"><?= $info['phone']; ?></a>
      </abbr>
    <?php endif; ?>

    <?php if ( $info['fax'] ) : ?>
      <abbr title="fax" class="fax">
        F: <a href="tel:<?= $info['fax']; ?>"><?= $info['fax']; ?></a>
      </abbr>
    <?php endif; ?>

    <?php if ( $info['email'] ) : ?>
      <abbr title="email" class="email">e: <a href="mailto:<?= $info['email']; ?>"><?= $info['email']; ?></a></abbr>
    <?php endif; ?>

  </address>
</div>

