<?php
/**
 * The sidebar containing the main widget area.
 */
?>
<?php if ( is_active_sidebar( 'efpose-sidebar' ) ) : ?>
  <?php dynamic_sidebar( 'efpose-sidebar' ); ?>
<?php endif; ?>