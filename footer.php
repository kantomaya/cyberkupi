<?php
/**
 * Footer4 for efpose
 */
?>
<?php edit_post_link(esc_attr__("Edit", "efpose"),'<span class="edit-link">', "</span>"); ?>
</div>
<div class="wrapper-footer four <?php if(isset($redux_demo['jp_footerscheme']) ){ ?><?php echo esc_html ($redux_demo['jp_footerscheme']); ?><?php } ?>">
<?php if (is_active_sidebar('efpose-footer1') || is_active_sidebar('efpose-footer2') || is_active_sidebar('efpose-footer3')  || is_active_sidebar('efpose-footer4') || is_active_sidebar('efpose-footer5') ) :?>
 <div class="footer-wrapinside">
    <div class="footer-topinside style4">
    <div class="footer4-top">	
        <div class="widget-area">
          <?php dynamic_sidebar( 'efpose-footer1' ); ?>
        </div>
	</div>	
    <div class="footer4-bottom">		
        <div class="widget-area">
          <?php dynamic_sidebar( 'efpose-footer2' ); ?>
        </div>
        <div class="widget-area">
          <?php dynamic_sidebar( 'efpose-footer3' ); ?>
        </div>
        <div class="widget-area">
          <?php dynamic_sidebar( 'efpose-footer4' ); ?>
        </div>
        <div class="widget-area">
          <?php dynamic_sidebar( 'efpose-footer5' ); ?>
        </div>
	</div>		
		   <div class="footerstyle6-nav">
				<nav id="site-footernavigation" class="efpose-nav">
					 <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_id' => 'menu-footer', 'menu_class' => 'nav-menu', 'container' => 'ul','fallback_cb' =>'__return_false','depth' => 1 ) ); ?>
				</nav>
				<!-- #site-navigation --> 
		   </div>	
        <div id="back-top"><a href="#top"><span> <?php esc_html_e('Scroll To Top ', 'efpose'); ?></span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
    </div>
  </div>
 <?php endif; ?>   
<div class="footer-bottom-wrapper">
     <div class="footer-bottominside">
          <div class="footerstyle6 site-wordpress">
               <?php if ( isset($redux_demo['footer_text']) && !empty($redux_demo['footer_text']) ){ ?>
               <?php echo esc_html($redux_demo['footer_text']); ?>
               <?php }else { ?>
               <?php esc_html_e( '&copy; Copyright', 'efpose' ); ?>
               <?php echo date('Y'); ?> - <?php echo get_bloginfo( 'name' ); ?>
               <?php esc_html_e( '. All Rights Reserved', 'efpose' ); ?>
               <?php } ?>
          </div>
          <!-- .site-info --> 
     </div>
</div>
</div>
<div class="clear"></div>
<?php wp_footer(); ?>
</body></html>