<?php
/* Template Name: Template: Blog */
if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<div class="index-wrapper">
	<?php
	$args = [
     "meta_key" => "post_views_count",
     "orderby" => "meta_value_num",
     "numberposts" => 3,
	];
 $postslist = get_posts($args);
 foreach ($postslist as $post):
     setup_postdata($post); ?>
	<div class="col-md-4 indextop-wrapper">
		<div class="index-thumb">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php $thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url($thumb, "full");
			$image = aq_resize($img_url, 800, 350, true, true, true);
			?>
			<img src="<?php if ($image) { echo esc_url($image); } else { echo efpose_catch_that_image(); } ?>" alt="<?php echo get_bloginfo("name"); ?>"/>
		</a>
		</div>
		<div class="indexfav-content">		
		<div class="category1-time">
			<?php
			$category = get_the_category();
			if ($category) {
				echo '<a href="' .
				esc_url(get_category_link($category[0]->term_id)) .
				'" title="' .
				sprintf(
				esc_attr__("View all posts in %s", "efpose"),
				$category[0]->name) .'" ' . ">" . $category[0]->name ."</a> "; }
			?>
			<div class="module9-view">
				<span class="view2">
				<?php if ( function_exists("efpose_get_post_views")) { ?>
				<?php echo efpose_get_post_views();} else {} ?>
				</span>
			</div>
		</div>
		<?php echo '<h3 class="module9-titlebig"><a href="' . get_permalink() . '">' . get_the_title() . "</a></h3>"; ?>
	</div>
		</div>
	<?php endforeach; ?>
</div>
<div class="index-wrapper2">
	<div id="primary" <?php body_class("site-content"); ?>>
		<div id="content" role="main">
			<?php if (have_posts()): ?>
			<?php if (get_query_var("paged")) {$paged = get_query_var("paged"); } elseif (get_query_var("page")) { $paged = get_query_var("page");
			} else {
				$paged = 1;
				}
				query_posts(["showposts" => "9", "paged" => $paged]);
				?>
				<?php while (have_posts()):
				the_post(); ?>
				<div <?php post_class("category3-jtop clearfix"); ?>>
				<?php get_template_part("page-templates/catcontent2", get_post_format()); ?>
				</div>
			<?php  endwhile; ?>
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