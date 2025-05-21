<?php
/*
 * Template Name: Post Style 3
 * Template Post Type: post
 */
if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<?php $thumb = get_post_thumbnail_id(); 
	$img_url = wp_get_attachment_url( $thumb,'full' ); 
	$image = aq_resize( $img_url, 1350, 555, true,true,true ); ?>
<div class="feature3-postimg"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <img src="<?php if($image) {echo esc_url($image);
	} else {echo efpose_catch_that_image(); } ?>" alt="<?php echo get_bloginfo('name'); ?>"/></a>
</div>
<div class="single2-wrapper <?php echo esc_html(get_post_meta(get_the_ID(), "efpose_sidebar", true) ); ?> <?php if(isset($redux_demo['jp_sidebar']) ){ ?><?php echo esc_html($redux_demo['jp_sidebar']); ?><?php } ?>">
<div class="scrollBar1"></div>
    <?php while (have_posts()):
     the_post(); ?>
    <div id="primary" <?php body_class("site-content"); ?>>
        <div id="content" role="main">
            <?php get_template_part("page-templates/content3", get_post_format()); ?>
            <!-- related post -->
            <?php get_template_part("inc/related-post"); ?>
            <?php comments_template("", true); ?>
            <?php endwhile; ?>
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
<?php if (isset($redux_demo["footer_layout"])) {
    get_template_part($redux_demo["footer_layout"]);
} else {
    get_footer();
} ?>
