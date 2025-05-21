<?php
/*
 * Comment display template of efpose.
 */
if (post_password_required()) {
    return;
} ?>
<div id="comments" class="comments-area">
	<?php if (have_comments()): ?>
	<div class="comments-title">
	<?php comments_number(__('0 Comments','efpose'),__('1 Comment','efpose'),__('% Comments','efpose')); ?>
	</div>
	<ul class="commentlist">
		<?php wp_list_comments(["callback" => "efpose_comment", "style" => "ol"]); ?>
	</ul>
	<!-- .commentlist -->
	<?php if ( get_comment_pages_count() > 1 &&  get_option("page_comments") ):	?>
	<nav id="comment-nav-below" class="navigation" role="navigation">
		<h1 class="assistive-text section-heading">
			<?php _e("Comment navigation", "efpose"); ?>
		</h1>
		<div class="nav-previous">
			<?php previous_comments_link(__("&larr; Older Comments", "efpose")); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link(__("Newer Comments &rarr;", "efpose")); ?>
		</div>
	</nav>
	<?php endif; ?>
	<?php if (!comments_open() && get_comments_number()): ?>
	<p class="nocomments"><?php _e("Comments are closed.", "efpose"); ?></p>
	<?php endif; ?>
	<?php endif; ?>
	<?php if (have_comments()): ?>
	<?php else: ?>
	<?php if (comments_open()): ?>
	<?php else: ?>
	<?php esc_html_e("Comments are closed.", "efpose"); ?>
	</p-->
	<?php endif; ?>
	<?php endif; ?>
	<?php if (comments_open()): ?>
	<section id="respond" class="respond-form">
		<div id="comment-form-title"><?php comment_form_title( esc_attr__("Leave a Reply", "efpose"), esc_attr__("Leave a Reply to %s", "efpose")); ?></div>
		<div id="cancel-comment-reply">
			<p class="small"><?php cancel_comment_reply_link(); ?></p>
		</div>
		<?php if (get_option("comment_registration") && !is_user_logged_in()): ?>
		<div class="alert alert-info"> <?php printf( esc_attr__(
          'You must be %1$slogged in%2$s to post a comment.',"efpose"),"",""); ?>
		</div>
		<?php else: ?>
		<form action="<?php echo get_option("siteurl"); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if (is_user_logged_in()): ?>
			<div class="comments-logged-in-as">
				<?php esc_attr_e("Logged in as", "efpose"); ?>
				<a href="<?php echo get_option("siteurl" ); ?>/wp-admin/profile.php"><?php echo esc_attr($user_identity); ?></a>
				<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e("Log out of this account", "efpose"); ?>">
					<?php esc_attr_e("Log out", "efpose"); ?>
					<?php esc_attr_e("&raquo;", "efpose"); ?>
				</a>
			</div>
			<?php else: ?>
			<div class="comments-author">
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php esc_attr_e("Your Name*","efpose"); ?>" tabindex="1" <?php if ($req) {echo "aria-required='true'";} ?> />
			</div>
			<div class="comments-email">
				<input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php esc_attr_e("Your E-Mail*", "efpose"); ?>" tabindex="2" <?php if ($req) { echo "aria-required='true'";} ?> />
			</div>
			<div class="comments-url">
				<input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php esc_attr_e("Got a website?","efpose"); ?>" tabindex="3"/>
			</div>
			<?php endif; ?>
			<p>
				<textarea name="comment" id="comment" placeholder="<?php esc_attr_e("Your Comment here...", "efpose"); ?>" rows="5" tabindex="4"></textarea>
			</p>
			<input name="submit" type="submit" id="submit" class="primary" tabindex="5" value="<?php esc_attr_e("Submit", "efpose" ); ?>"/>
			<?php comment_id_fields(); ?>
			<!--<div class="alert alert-info">
			<p id="allowed_tags" class="small"><strong>XHTML:</strong>
			<?php esc_attr_e("You can use these tags","efpose"); ?>:<code>
			<?php echo allowed_tags(); ?>
			</code></p></div>-->
			<?php do_action("efpose_comment_form()", $post->ID); ?>
		</form>
		<?php endif; ?>
	</section>
	<?php endif; ?>
</div>