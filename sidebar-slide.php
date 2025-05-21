<?php
/**
 * The sidebar containing the main widget area.
 */
?>
<?php if ( is_active_sidebar( 'efpose-slidebar' ) ) : ?>
  <?php dynamic_sidebar( 'efpose-slidebar' ); ?>
<?php endif; ?>