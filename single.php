<?php if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<div class="single2-wrapper <?php echo esc_html(get_post_meta(get_the_ID(), "efpose_sidebar", true) ); ?> <?php if(isset($redux_demo['jp_sidebar']) ){ ?><?php echo esc_html($redux_demo['jp_sidebar']); ?><?php } ?>">
<div class="scrollBar1"></div>
	<?php while (have_posts()):
     the_post(); ?>
	<div id="primary" <?php body_class("site-content"); ?>>
		<div id="content" role="main">
			<?php get_template_part("page-templates/content", get_post_format()); ?>
		<?php get_template_part("inc/related-post"); ?>
			<!-- related post -->
			<?php comments_template("", true); ?>
			<?php endwhile; ?>
		</div>
	</div>
	<div class="sidebar"><?php get_sidebar(); ?></div>
</div>
<?php if (function_exists("efpose_set_post_views")) { ?>
<?php efpose_set_post_views(); ?>
<?php } else { ?>
<?php } ?>
<?php if (isset($redux_demo["footer_layout"])) {
    get_template_part($redux_demo["footer_layout"]);
} else {
    get_footer();
} ?>