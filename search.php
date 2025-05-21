<?php if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<div class="single2-wrapper <?php if(isset($redux_demo['jp_sidebar']) ){ ?><?php echo esc_html($redux_demo['jp_sidebar']); ?><?php } ?>">
	<div id="primary" <?php body_class("site-content"); ?>>
		<div id="content" role="main">
			<?php if (have_posts()): ?>
			<header class="page-header">
				<div class="cat-count"> <?php echo esc_html($wp_query->found_posts); ?>
					<?php esc_html_e("Search Result For:", "efpose"); ?>
				</div>
				<h1 class="page-title"><?php printf(__("%s", "efpose"), get_search_query()); ?>
				</h1>
			</header>
			<?php while (have_posts()):
			the_post(); ?>
			<div class="category1-wrapper">
				<div <?php post_class("clearfix"); ?>>
					<?php get_template_part("page-templates/catcontent2", get_post_format()); ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php if (function_exists("efpose_numbered_pages")) { ?>
			<?php efpose_numbered_pages(); ?>
			<?php } else { ?>
			<?php } ?>
			<?php else: ?>
			<article id="post-0" class="post no-results not-found">
				<header class="page-header">
					<h1 class="entry-title">
						<?php _e("Nothing Found", "efpose"); ?>
					</h1>
				</header>
				<div class="entry-content">
					<div class="col-md-12 searchleft">
						<?php _e("Sorry, but nothing matched your search criteria. Please try again with some different keywords.", "efpose"); ?>
					</div>
					<div class="col-md-6 searchright">
						<?php get_search_form(); ?>
					</div>
				</div>
			</article>
			<?php endif; ?>
		</div>
	</div>
	<div class="sidebar">
		<div class="single2-widget">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php if (isset($redux_demo["footer_layout"])) {
    get_template_part($redux_demo["footer_layout"]);
} else {
    get_footer();
} ?>