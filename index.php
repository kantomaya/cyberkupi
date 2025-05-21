<?php if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<div class="index-wrapper"></div>
<div class="index-wrapper2">
	<div id="primary" <?php body_class("site-content"); ?>>
		<div id="content" class="indexcontent" role="main">
			<?php if (have_posts()): ?>
			<?php
			if (get_query_var("paged")) {
				$paged = get_query_var("paged");
			} 	elseif (get_query_var("page")) {
					$paged = get_query_var("page");
				} 	else {
						$paged = 1;
					}
					query_posts(["showposts" => "9", "paged" => $paged]);
			?>
			<?php while (have_posts()):
			the_post(); ?>
			<div <?php post_class("category3-jtop clearfix"); ?>>
				<?php get_template_part("page-templates/index-content", get_post_format()); ?>
			</div>
			<?php endwhile; ?>
			<?php else: ?>
			<?php get_template_part("page-templates/content2", "none"); ?>
			<?php endif; ?>
		</div>
		<?php if (function_exists("efpose_numbered_pages")) { ?>
		<?php efpose_numbered_pages(); ?>
		<?php } else { ?>
		<nav>
			<ul class="pager">
				<li class="previous">
					<?php next_posts_link(esc_attr__("&laquo; Older Entries", "efpose")); ?>
				</li>
				<li class="next">
					<?php previous_posts_link(esc_attr__("Newer Entries &raquo;", "efpose")); ?>
				</li>
			</ul>
		</nav>
		<?php } ?>
	</div>
	<div class="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php if (isset($redux_demo["footer_layout"])) {
    get_template_part($redux_demo["footer_layout"]);
} else {
    get_footer();
} ?>