<?php if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<div class="single2-wrapper <?php if(isset($redux_demo['jp_sidebar']) ){ ?><?php echo esc_html($redux_demo['jp_sidebar']); ?><?php } ?>">
	<div id="primary" <?php body_class("site-content"); ?>>
		<div class="author-wrapper">
			<div class="author-info">
				<div class="author-avatar">
				<?php echo get_avatar(get_the_author_meta("user_email"), apply_filters("efpose_author_bio_avatar_size", 200) ); ?>
				</div>
				<div class="author-description">				
					<?php if(get_the_author_meta('Position') ): ?>
					<?php echo get_the_author_meta('Position'); ?>
					<?php esc_attr_e(' - ', 'efpose'); ?>					
					<?php else: ?>
					<?php endif; ?>					
					<?php printf( esc_html( _n('Published post: %d', 'Published posts: %d', count_user_posts( get_the_author_meta() ), 'efpose' ) ),
					number_format_i18n( count_user_posts( get_the_author_meta( 'ID' ) ) )); ?>	
					<h2><?php printf(__("About %s", "efpose"), get_the_author()); ?></h2>
					<p><?php the_author_meta("description"); ?></p>
					<div class="author-contact-wrapper">
						<?php
						if (get_the_author_meta("twitter")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://twitter.com/<?php the_author_meta("twitter"); ?>"><div class="author-twitter"></div></a>
								<span class="tooltiptext"><?php _e("X", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("facebook")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://facebook.com/<?php the_author_meta("facebook"); ?>"><div class="author-facebook"></div></a>
								<span class="tooltiptext"><?php _e("Facebook", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("youtube")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://youtube.com/<?php the_author_meta("youtube"); ?>"><div class="author-youtube"></div></a>
								<span class="tooltiptext"><?php _e("Youtube", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("vimeo")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://vimeo.com/<?php the_author_meta("vimeo"); ?>"><div class="author-vimeo"></div></a>
								<span class="tooltiptext"><?php _e("Vimeo", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("linkedin")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://linkedin.com/<?php the_author_meta("linkedin"); ?>"><div class="author-linkedin"></div></a>
								<span class="tooltiptext"><?php _e("Linkedin", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("devianart")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://devianart.com/<?php the_author_meta("devianart"); ?>"><div class="author-devianart"></div></a>
								<span class="tooltiptext"><?php _e("Deviant", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("dribble")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://dribble.com/<?php the_author_meta("dribble"); ?>"><div class="author-dribble"></div></a>
								<span class="tooltiptext"><?php _e("Dribble", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("flickr")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://flickr.com/<?php the_author_meta("flickr"); ?>"><div class="author-flickr"></div></a>
								<span class="tooltiptext"><?php _e("Flickr", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("instagram")) { ?>
							<div class="author-socmed-wrapper ">
								<a rel="me" href="http://instagram.com/<?php the_author_meta("instagram"); ?>"><div class="author-instagram"></div></a>
								<span class="tooltiptext"><?php _e("Instagram", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("behance")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://behance.com/<?php the_author_meta("behance"); ?>"><div class="author-behance"></div></a>
								<span class="tooltiptext"><?php _e("Behance", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("reddit")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://reddit.com/<?php the_author_meta("reddit"); ?>"><div class="author-reddit"></div></a>
								<span class="tooltiptext"><?php _e("Reddit", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("github")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://github.com/<?php the_author_meta("github"); ?>"><div class="author-github"></div></a>
								<span class="tooltiptext"><?php _e("Github", "efpose"); ?></span>
							</div>
						<?php }
						if (get_the_author_meta("pinterest")) { ?>
							<div class="author-socmed-wrapper">
								<a rel="me" href="http://pinterest.com/<?php the_author_meta("pinterest"); ?>"><div class="author-pinterest"></div></a>
								<span class="tooltiptext"><?php _e("Pinterest", "efpose"); ?></span>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
        <div id="content" role="main">
            <?php if ( have_posts() ) : ?>
            <?php if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
				} else if ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}
			?>
			<?php while(have_posts()) :
			the_post();
			?>
            <div class="category1-wrapper">
                <div <?php post_class('clearfix'); ?> >
                    <div class="categorydefault-wrapper">
                        <?php get_template_part( 'page-templates/catcontent', get_post_format() ); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php else : ?>
            <?php get_template_part( 'page-templates/content2', 'none' ); ?>
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
}
?>