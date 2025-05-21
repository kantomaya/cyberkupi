<?php
/*
 * Template Name: Post Style 4
 * Template Post Type: post
 */
if (isset($redux_demo["header_layout"])) {
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
			<?php get_template_part("page-templates/content4", get_post_format()); ?>
			<!-- .nav-single -->
			<nav class="nav-single">
				<span class="nav-previous">
					<?php
					$prevPost = get_previous_post();
					if ($prevPost) {
						$args = [
						"posts_per_page" => 1,
						"include" => $prevPost->ID,
						];
						$prevPost = get_posts($args);
						foreach ($prevPost as $post) {
							setup_postdata($post); ?>
							<div class="postprev-top">
							<?php esc_html_e("PREVIOUS", "efpose"); ?>
							</div>
							<div class="postprev-text">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
							</a>
							</div>
							<?php wp_reset_postdata();
							}
					}?>
				</span>
				<span class="nav-next">
					<?php
					$nextPost = get_next_post();
					if ($nextPost) {
						$args = [
						"posts_per_page" => 1,
						"include" => $nextPost->ID,
						];
						$nextPost = get_posts($args);
						foreach ($nextPost as $post) {
							setup_postdata($post); ?>
							<div class="postnext-top">
							<?php esc_html_e("NEXT", "efpose"); ?>
							</div>
							<div class="postnext-text">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</div>
							<?php wp_reset_postdata();
						}
					}?>
				</span>
			</nav>
			<!-- author-info -->
			<div class="author-single">
			<?php get_template_part("inc/author-singlepost"); ?>
			</div>
			<!-- related post -->
			<?php get_template_part("inc/related-post"); ?>
			<?php comments_template("", true); ?>
			<?php endwhile;?>
		</div>
		<!-- #content -->
	</div>
	<div class="sidebar">
		<div class="single2-widget"><?php get_sidebar(); ?></div>
	</div>
</div>
<?php if (function_exists("efpose_set_post_views")) { ?>
<?php efpose_set_post_views(); ?>
<?php } else { ?>
<?php } ?>
<!-- #primary -->
<?php if (isset($redux_demo["footer_layout"])) {
    get_template_part($redux_demo["footer_layout"]);
} else {
    get_footer();
} ?>