<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if (!function_exists('has_site_icon') || !has_site_icon()) {$redux_demo = get_option('redux_demo');
    $favicon_url = isset($redux_demo['jp_favicon']['url']) ? esc_url($redux_demo['jp_favicon']['url']) : '';
    if ($favicon_url) { echo '<link rel="shortcut icon" href="' . $favicon_url . '">'; 
}}?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper-header">
    <header id="masthead" class="site-header" role="banner">
    <div class="header-top">
        <div class="header-topinside"> </div>
    </div>
    <div class="nav-mainwrapper">
        <div class="header-style1">
            <div class="efposelogo">
                <?php global $redux_demo; if ( isset($redux_demo['opt_header_logo']['url']) && !empty($redux_demo['opt_header_logo']['url']) ){ ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php echo get_bloginfo('name'); ?>" src="<?php echo esc_url($redux_demo['opt_header_logo']['url']); ?>"></a>
                <?php } else if ( isset($redux_demo['opt_header_text']) && !empty($redux_demo['opt_header_text']) ){ ?>
                <h1> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo esc_html($redux_demo['opt_header_text']); ?></a></h1>
                <?php }else { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php echo get_bloginfo('name'); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/images/logo.png' ); ?>"></a>
                <?php } ?>
            </div>
            <nav id="site-navigation" class="efpose-nav">
                <?php wp_nav_menu(["theme_location" => "primary_menu", "menu_id" => "myTopnav", "menu_class" => "topnav", "container" => "ul", "fallback_cb" => "__return_false",]); ?>
            </nav>
            <!-- #site-navigation -->
            <div class="header1-slidebar"> 
                <!-- open Sidebar1 menu --> 
                <a class="btn btn-customized open-menu" href="#" role="button"></a>
                <div class="switch">
                    <input class="switch__input" type="checkbox" id="themeSwitch">
                    <label aria-hidden="true" class="switch__label" for="themeSwitch"> </label>
                    </input>
                    <div aria-hidden="true" class="switch__marker"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
<!-- Sidebar1 -->
<div class="Sidebar1"> 
    <!-- close Sidebar1 menu -->
    <div class="dismiss"></div>
    <div class="logo">
        <div class="efposelogo">
            <?php global $redux_demo; if ( isset($redux_demo['opt_header_logo']['url']) && !empty($redux_demo['opt_header_logo']['url']) ){ ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img alt="<?php echo get_bloginfo('name'); ?>" src="<?php echo esc_url($redux_demo['opt_header_logo']['url']); ?>"></a>
            <?php } else if ( isset($redux_demo['opt_header_text']) && !empty($redux_demo['opt_header_text']) ){ ?>
            <h1> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo esc_html($redux_demo['opt_header_text']); ?></a></h1>
            <?php }else { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php echo get_bloginfo('name'); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/images/logo.png' ); ?>"></a>
            <?php } ?>
        </div>
    </div>
    <div class="sidebar1-insidewrapper">
        <?php if ( is_active_sidebar( 'efpose-slidemenu' ) ) : ?>
        <div class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'efpose-slidemenu' ); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- End Sidebar1 -->
<div class="overlay"></div>
</div>
<div class="wrapper-body">