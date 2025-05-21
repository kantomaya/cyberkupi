<?php
/* Template Name: Template: Custom Frontpage No Top Margin */
if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<div id="full-widthnotop" class="clearfix" role="main">
	<div class="custom-page">
	<?php if (have_posts()):
		while (have_posts()):
          the_post(); ?>
			  <div id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>
			  <div class="customfrontpage-wrapper">
			  <?php the_content(); ?>
			  </div>
			  </div>
		  <?php endwhile;
		  else:?>
		<?php endif; ?>
	</div>
 </div>
<?php if (isset($redux_demo["footer_layout"])) {
    get_template_part($redux_demo["footer_layout"]);
} else {
    get_footer();
}
?>
