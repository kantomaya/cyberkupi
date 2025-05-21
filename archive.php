<?php if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<div class="category1-topheader">
	<div <?php body_class("site-content"); ?>>
        <div class="category1-topinside">
            <div class="category1-titlewrapper ">
				<h1 class="archive">
					<?php if (is_day()):
					printf(__("Daily Archives %s", "efpose"),"<span>" . get_the_date() . "</span>");
					elseif (is_month()):
					printf(	__("Monthly Archives %s", "efpose"),	"<span>" . get_the_date(_x("F Y", "monthly archives date format", "efpose")) . "</span>");
					elseif (is_year()):
					printf(__("Yearly Archives %s", "efpose"),"<span>" . get_the_date(_x("Y", "yearly archives date format", "efpose")) . "</span>");
					else:
					_e("Archives", "efpose");
					endif; ?>
				</h1>
            </div>

            <div class="bottom-gradientblack"></div>
        </div>
	</div>
</div>
<div class="single-wrapper">
	<div id="primary" <?php body_class("site-content"); ?>>
		<div id="content" role="main">
			<?php if (have_posts()): ?>
			<?php while (have_posts()):
			the_post(); ?>
			<div class="category1-wrapper">
				<div <?php post_class("clearfix"); ?>><?php get_template_part("page-templates/catcontent", get_post_format()); ?></div>
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
				<li class="previous"><?php next_posts_link(esc_attr__("&laquo; Older Entries", "efpose")); ?></li>
				<li class="next"><?php previous_posts_link(esc_attr__("Newer Entries &raquo;", "efpose")); ?></li>
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
}
?>