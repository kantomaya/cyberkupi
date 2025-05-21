<?php
/* Template Name: Full-width Page Template, No Sidebar */
if (isset($redux_demo["header_layout"])) {
	get_header($redux_demo["header_layout"]);
} else {
	get_header();
}
?>
<div class="single2-wrapper">
	<?php while (have_posts()):
		the_post(); ?>
		<div id="primary" class="site-content nosidebar">
			<div id="content" role="main">
				<?php get_template_part("page-templates/content5", get_post_format()); ?>
				<nav class="nav-single">
					<div class="assistive-text">
						<?php _e("Post navigation", "efpose"); ?>
					</div>
					<span class="nav-previous">
						<?php previous_post_link(
							"%link",
							'<span class="meta-nav">' .
							_x("&larr;", "Previous post link", "efpose") .
							"</span> %title"
						); ?>
					</span> <span class="nav-next">
						<?php next_post_link(
							"%link",
							'%title <span class="meta-nav">' .
							_x("&rarr;", "Next post link", "efpose") .
							"</span>"
						); ?>
					</span>
				</nav>
				<?php comments_template("", true); ?>
				<?php
			endwhile; ?>
		</div>
	</div>
</div>
<?php if (isset($redux_demo["footer_layout"])) {
	get_template_part($redux_demo["footer_layout"]);
} else {
	get_footer();
}
?>