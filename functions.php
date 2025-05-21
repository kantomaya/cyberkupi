<?php
/*
 * efpose Theme's Functions file, this is the heart of theme, modification directly is not recommended.
 * efpose Supports Child Themes, it is the way to go.
 * Use a child theme for customization (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes).
 */
/** Primary content width according to the design and stylesheet.*/
if ( ! isset( $content_width ) ) {
	$content_width = 1250;
}
/** efpose supported features and Registering defaults*/
if( !function_exists( 'efpose_setup' ) ) :

function efpose_setup() {
/** Making efpose ready for translation.*/
	load_theme_textdomain( 'efpose', get_template_directory() . '/languages' );
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );	
	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );
	// Woocommerce support
	add_theme_support( 'woocommerce' );	
	// html5 support	
    add_theme_support( 'html5', array( 'script', 'style' ) );	
	// Adds support for Navigation menu, efpose uses wp_nav_menu() in one location.
    add_theme_support('nav_menus');	
	register_nav_menu( 'primary_menu', esc_html__( 'Primary Menu', 'efpose' ) );
	register_nav_menu( 'footer_menu', esc_html__( 'Footer Menu', 'efpose' ) );	
	// Uncomment the following two lines to add support for post thumbnails - for classic blog layout
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1250, 500 ); // Unlimited height, soft crop set_post_thumbnail_size( $width = 0, $height = 0, $crop = false ) {
	//Defining home page thumbnail size
	add_image_size('efpose-large', 1200, 450, true);	
	add_image_size('efpose-medium', 700, 350, true);
	add_image_size('efpose-small', 500, 250, true);	
}
endif; //efpose setup
add_action( 'after_setup_theme', 'efpose_setup' );
	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'gallery',
			'video',
			'audio' 	
		)
	); 
/** Enqueueing scripts and styles for front-end of the efpose Framework.*/ 
function efpose_scripts_styles() {
	global $wp_styles;
/** Adds JavaScript to pages with the comment form to support */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
 	/*js for GENERAL*/
	wp_enqueue_script('general', get_template_directory_uri() . '/js/general.min.js', array('jquery'), '1.0', true );
  	/*js for Columns*/
	wp_enqueue_script('columnizer', get_template_directory_uri() . '/js/columnizer.min.js', array('jquery'), '1.1', true );  
  	/*js for Sticky Bar*/
	wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar-min.js', array('jquery'), '1.2', true );  

	/* CSS for FONTAWESOME*/   
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css', array(), '4.4.0', 'all');		
	/* CSS for BOOTSTRAP.*/
	wp_enqueue_style( 'efpose-custom-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.1.3', 'all' );	
	/* Loads efpose's main stylesheet and the custom stylesheet.*/
	wp_enqueue_style( 'efpose-style', get_stylesheet_uri(),  array(), '1.0', 'all' );
	wp_enqueue_style( 'efpose-addstyle', get_template_directory_uri() . '/efpose-addstyle.css', array(), '5.1.3', 'all' );
}
add_action( 'wp_enqueue_scripts', 'efpose_scripts_styles' );
// Registering GoogleFont
function efpose_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'efpose' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Playfair Display|Oswald|Jost:400,500,600,700,700italic,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
function efpose_scripts() {
    wp_enqueue_style( 'efpose_studio-fonts', efpose_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'efpose_scripts' );
/** Default Nav Menu fallback to Pages menu */
function efpose_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'efpose_page_menu_args' );	
	
/** Registers the main widgetized sidebar area. */
function efpose_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'efpose' ),
		'id' => 'efpose-sidebar',
		'description' => esc_html__( 'This is a Sitewide sidebar which appears on posts and pages', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Main Header 1', 'efpose' ),
		'id' => 'efpose-header1',
		'description' => esc_html__( 'This is a Sitewide header which appears on posts and pages', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Main Header 2', 'efpose' ),
		'id' => 'efpose-header2',
		'description' => esc_html__( 'This is a Sitewide header which appears on posts and pages', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Footer 1', 'efpose' ),
		'id' => 'efpose-footer1',
		'description' => esc_html__( 'This is a Sitewide sidebar which appears on posts and pages', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Footer 2', 'efpose' ),
		'id' => 'efpose-footer2',
		'description' => esc_html__( 'This is a Sitewide sidebar which appears on posts and pages', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer 3', 'efpose' ),
		'id' => 'efpose-footer3',
		'description' => esc_html__( 'This is a Sitewide sidebar which appears on posts and pages', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer 4', 'efpose' ),
		'id' => 'efpose-footer4',
		'description' => esc_html__( 'This is a Sitewide sidebar which appears on posts and pages', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer 5', 'efpose' ),
		'id' => 'efpose-footer5',
		'description' => esc_html__( 'This is a Sitewide sidebar which appears on posts and pages', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Slide Menu', 'efpose' ),
		'id' => 'efpose-slidemenu',
		'description' => esc_html__( 'This is a Sitewide header which appears on slide Menu', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Woo Widget', 'efpose' ),
		'id' => 'efpose-woowidget',
		'description' => esc_html__( 'This widget which appears on WooCommerce Page/post', 'efpose' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );	
}
add_action( 'widgets_init', 'efpose_widgets_init' );

if ( ! function_exists( 'efpose_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 */
function efpose_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo ent2ncr($html_id); ?>" class="navigation" role="navigation">
			<div class="assistive-text"><?php _e( 'Post navigation', 'efpose' ); ?></div>
			<div class="nav-previous alignleft"><?php next_posts_link( esc_html__( '<span class="meta-nav">&larr;</span> Older posts', 'efpose' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( esc_html__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'efpose' ) ); ?></div>
		</nav>
	<?php endif;
}
endif;
if ( ! function_exists( 'efpose_comment' ) ) :
/**
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function efpose_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php esc_html__( 'Pingback:', 'efpose' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'efpose' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-partleft">
				<?php echo get_avatar( $comment, 115 );	?>
			</header><!-- .comment-meta -->			
			<header class="comment-partrigh">
				<?php
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// Adds Post Author to comments posted by the article writer
						( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( 'Post author', 'efpose' ) . '</span>' : ''
					);
					echo "<div class='comment-time'>";
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date */
						sprintf( esc_html__( '%1$s', 'efpose' ), get_comment_date() )
					);
					echo "</div>";
				?>
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<div class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'efpose' ); ?></div>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( esc_html__( 'Edit', 'efpose' ), '<div class="edit-link">', '</div>' ); ?>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'efpose' ),  'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->	
			</section><!-- .comment-content -->					
			</header><!-- .comment-meta -->
		</article><!-- #comment-## -->
		</div>
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'efpose_entry_meta' ) ) :
/**For Meta information for categories, tags, permalink, author, and date.*/
function efpose_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( esc_html__( ', ', 'efpose' ) );
	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', esc_html__( ', ', 'efpose' ) );
	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( esc_html__( 'View all posts by %s', 'efpose' ), get_the_author() ) ),
		get_the_author()
	);
// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = esc_html__( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'efpose' );
	} elseif ( $categories_list ) {
		$utility_text = esc_html__( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'efpose' );
	} else {
		$utility_text = esc_html__( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'efpose' );
	}
	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;
/** WordPress body class Extender */
function efpose_body_class( $classes ) {
	$background_color = get_background_color();
	if ( is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';
	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';
	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'efpose-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';
	// Adds a class of no-sidebar to sites without active sidebar widget.
	if ( ! is_active_sidebar( 'efpose-sidebar' ) ) {
		$classes[] = 'no-sidebar';	}
	// Adds a class of no-sidebar to sites without active slide bar widget.		
	if ( ! is_active_sidebar( 'efpose-slidemenu' ) ) {
		$classes[] = 'no-slidemenu';	}		
	return $classes;
	if ( ! is_multi_author() )
		$classes[] = 'single-author';
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'efpose_body_class' );

/*
 * Adjusts content_width value for full-width and single image attachment
 */
function efpose_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'efpose-sidebar' ) ) {
		global $content_width;
		$content_width = 1040;
	}
}
add_action( 'template_redirect', 'efpose_content_width' );

/* efpose welcome text */
require_once( get_template_directory() . '/inc/tgm.php' );
require_once( get_template_directory() . '/inc/extra-functions.php' );
require_once( get_template_directory() . '/inc/redux_one_click.php' );
require_once( get_template_directory() . '/inc/efpose-sguide.php' );
require_once(get_template_directory() . '/aq_resizer.php');
require_once(get_template_directory() . '/metabox.php');

// Load Redux-related options via hook with proper priority
function efpose_load_theme_files() {
    /* tribunalex welcome text - Check if theme was just activated */
    if (is_admin() && isset($_GET['activated'])) {
        global $pagenow;
        if ($pagenow == "themes.php") {
            wp_redirect('themes.php?page=efpose_after_instalation');
        }
    }    
    require_once(get_template_directory() . '/inc/efpose-options.php'); // Redux config
}
add_action('after_setup_theme', 'efpose_load_theme_files', 5); // Early priority (5)
/****************************************************
/* GRAB THE FIRST POST IMAGE FOR ALL IMAGE ON THEME 
*****************************************************/
function efpose_catch_that_image() {
    global $post, $posts;
    $first_img = '';    
    // Ensure post_content is available and is a string
    $content = isset($post->post_content) ? $post->post_content : '';
    if (!empty($content) && is_string($content)) {
        if (preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches)) {
            $first_img = $matches[1][0];
        }
    }
    if (empty($first_img)) {
        $first_img = get_template_directory_uri() . "/images/blank.jpg";
    }
    return esc_url($first_img);
}
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
/****************************************************
/* TOTAL CONTENT'S WORD FOR MODULE 
*****************************************************/
function efpose_content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'.';
  } else {
    $content = implode(" ",$content);
  }	
	$content = preg_replace("/<img[^>]+\>/i", "", $content); // removes images
	$content = preg_replace('/<iframe.*?>/', "", $content); // removes iframes  
	$content = strip_tags($content, '<strong>'); // Temporarily keep <strong>
	$content = str_replace(['<strong>', '</strong>'], '', $content); // Remove <strong> tags completely
	$content =  preg_replace("/\<h1(.*)\>(.*)\<\/h1\>/","", $content); //remove <h1>	
	$content =  preg_replace("/\<h2(.*)\>(.*)\<\/h2\>/","", $content); //remove <h2>	
	$content =  preg_replace("/\<h3(.*)\>(.*)\<\/h3\>/","", $content); //remove <h3>	
	$content =  preg_replace("/\<h4(.*)\>(.*)\<\/h4\>/","", $content); //remove <h4>	
	$content =  preg_replace("/\<h5(.*)\>(.*)\<\/h5\>/","", $content); //remove <h5>	
	$content =  preg_replace("/\<h6(.*)\>(.*)\<\/h6\>/","", $content); //remove <h6>		
	$content = preg_replace('/\[.+\]/','', $content);	
	$content = apply_filters('the_content', $content); 
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}
/****************************************************
/* LIMIT WORD FOR MODULE
*****************************************************/
if( ! function_exists( 'efpose_limit_words' ) ) {
	function efpose_limit_words($string, $word_limit) {
		$words = explode(' ', $string);
		return implode(' ', array_slice($words, 0, $word_limit));
	}
}
/****************************************************
/* Author: Ramez Bdiwi
*****************************************************/
! defined( 'ABSPATH' ) and exit;
if ( ! function_exists( 'efpose_fb_set_feature_image' ) ) {
	add_action( 'save_post', 'efpose_fb_set_feature_image' );
	function efpose_fb_set_feature_image() {	
			if ( ! isset( $GLOBALS['post']->ID ) )
				return NULL;				
            if ( has_post_thumbnail( get_the_ID() ) )
                return NULL;				
            $args = array(
                'numberposts' => 1,
                'order' => 'ASC', // DESC for the last image
                'post_mime_type' => 'image',
                'post_parent' => get_the_ID(),
                'post_status' => NULL,
                'post_type' => 'attachment'
			);			
            $attached_image = get_children( $args );
            if ( $attached_image ) {
                foreach ( $attached_image as $attachment_id => $attachment )
					set_post_thumbnail( get_the_ID(), $attachment_id );
			}			
	}
}
/****************************************************
/* BREADCRUMB
*****************************************************/
function efpose_breadcrumb() {
  $delimiter = ' > ';
  $home = esc_html__( 'Home', 'efpose' ); // text for home link
  $before = ''; // tag before the current crumb
  $after = ''; // tag after the current crumb
  if ( !is_home() && !is_front_page() || is_paged() ) {
    echo '<div class="crumbs">';
    global $post;
    $homeLink = esc_url(home_url('/')) ;
    echo esc_url($before). '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' '. $after;
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo esc_url($before)  . single_cat_title('', false)  . $after;
    } elseif ( is_day() ) {
      echo esc_url($before).'<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' '. $after;
      echo esc_url($before).'<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' '. $after;
      echo esc_html($before) . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo esc_url($before) .'<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' '.$after;
      echo esc_html($before) . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo esc_html($before) . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo esc_url($before).'<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' '.$after;
        echo esc_html($before) . esc_attr(get_the_title()) . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' .  ' ');
      }

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo esc_url($before).'<a href="' . esc_url( get_permalink($parent) ) . '">' . $parent->post_title . '</a> ' . $delimiter . ' '.$after;
      echo esc_html($before) . esc_attr(get_the_title()) . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo esc_html($before) . esc_attr(get_the_title()) . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();

      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo esc_html($crumb) . ' ' . $delimiter . ' ';
      echo esc_html($before) . esc_attr(get_the_title()) . $after;

    } elseif ( is_search() ) {
      echo esc_html($before) . 'Search results for "' . esc_attr(get_search_query()) . '"' . $after;

    } elseif ( is_tag() ) {
      echo esc_html($before) . 'Posts tagged "' . esc_attr(single_tag_title('', false)) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
	  echo esc_html($before) . esc_attr__('Posted by', 'efpose') . ' ' . esc_attr($userdata->display_name) . $after;
    } elseif ( is_404() ) {
      echo esc_html($before) . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo esc_attr__('Page', 'efpose') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</div>';
  }
} // end the_breadcrumbs()
// Body open for theme test
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}
/**Display Bootstrap numbered pagination code.*/
function efpose_numbered_pages($args = null) {
    $defaults = array(
        'page' => null, 
        'pages' => null, 
        'range' => 3, 
        'gap' => 3, 
        'anchor' => 1,
        'before' => '<ul class="pagination">', 
        'after' => '</ul>',
        'nextpage' => esc_attr__('&raquo;','efpose'), 
        'previouspage' => esc_attr__('&laquo;','efpose'),
        'echo' => 1
    );
    $r = wp_parse_args($args, $defaults);
    extract($r, EXTR_SKIP);
    if (!$page && !$pages) {
        global $wp_query;
        $page = get_query_var('paged');
        $page = !empty($page) ? intval($page) : 1;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
    }
    
    $output = "";
    if ($pages > 1) {   
        $output .= "$before";
        $ellipsis = "<li></li>";
        if ($page > 1 && !empty($previouspage)) {
            $output .= "<li><a href='" . get_pagenum_link($page - 1) . "'>$previouspage</a></li>";
        }        
        $min_links = $range * 2 + 1;
        $block_min = min($page - $range, $pages - $min_links);
        $block_high = max($page + $range, $min_links);
        $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
        $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

        if ($left_gap && !$right_gap) {
            $output .= sprintf('%s%s%s', 
                efpose_numbered_pages_loop(1, $anchor), 
                $ellipsis, 
                efpose_numbered_pages_loop($block_min, $pages, $page)
            );
        }
        else if ($left_gap && $right_gap) {
            $output .= sprintf('%s%s%s%s%s', 
                efpose_numbered_pages_loop(1, $anchor), 
                $ellipsis, 
                efpose_numbered_pages_loop($block_min, $block_high, $page), 
                $ellipsis, 
                efpose_numbered_pages_loop(($pages - $anchor + 1), $pages)
            );
        }
        else if ($right_gap && !$left_gap) {
            $output .= sprintf('%s%s%s', 
                efpose_numbered_pages_loop(1, $block_high, $page),
                $ellipsis,
                efpose_numbered_pages_loop(($pages - $anchor + 1), $pages)
            );
        }
        else {
            $output .= efpose_numbered_pages_loop(1, $pages, $page);
        }
        if ($page < $pages && !empty($nextpage)) {
            $output .= "<li><a href='" . get_pagenum_link($page + 1) . "'>$nextpage</a></li>";
        }
        $output .= $after;
    }
    if ($echo) {
        echo wp_kses_post($output);
    }
    return $output;
}
/* Helper function for pagination which builds the page links. */
function efpose_numbered_pages_loop($start, $max, $page = 0) {
    $output = "";
    for ($i = $start; $i <= $max; $i++) {
        $output .= ($page === intval($i)) 
            ? "<li><span class='emm-page emm-current'>$i</span></li>" 
            : "<li><a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a></li>";
    }
    return $output;
}
/* TOTAL POST CATEGORY */
function display_current_category_post_count() {
	$count = '';
	if(is_category()) {	
		global $wp_query;
		$cat_ID = get_query_var('cat');
		$categories = get_the_category();		
		foreach($categories as $cat) {		
			$id = $cat->cat_ID;			
			if($id == $cat_ID) {			
				$count = $cat->category_count;	
			}
		}	
	}return $count;
}
/*Estimate time required to read the article*/
function efpose_reading_times() {
    $post = get_post();
    $words = str_word_count( strip_tags( $post->post_content ) );
    $minutes = floor( $words / 120 );
    $seconds = floor( $words % 120 / ( 120 / 60 ) );	
    if ( 1 < $minutes ) {
		echo "<span class='read-time'>";
        $estimated_time = $minutes . sprintf( __(' min', 'efpose') ) . ($minutes == 1 ? '' : 's') . '' ;
		echo "</span>";		
    } else {
		echo "<span class='read-time'>";		
        $estimated_time =$seconds . sprintf( __(' sec', 'efpose') ) . ($seconds == 1 ? '' : 's') . '' ;
		echo "</span>";			
    }
    return $estimated_time;
}
/*View Counter*/
function efpose_get_post_views() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    $count_float = floatval( $count );
    return sprintf( _n( '%s view', '%s views', $count, 'efpose' ), number_format_i18n( $count_float ) );
}
function efpose_set_post_views() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}