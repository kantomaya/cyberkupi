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
		<header id="masthead" class="site-header">
			<div class="header3-topwrapper">
				<div class="header3-left">
				<div class="header3-desc"><?php echo get_option("blogdescription"); ?></div>
					<?php global $redux_demo; if (isset($redux_demo["opt_header_logo"]["url"]) && !empty($redux_demo["opt_header_logo"]["url"])) { ?>
					<a href="<?php echo esc_url(home_url("/")); ?>"><img alt="<?php echo get_bloginfo("name"); ?>" src="<?php echo esc_url($redux_demo["opt_header_logo"]["url"]); ?>"></a>
					<?php } elseif (
					isset($redux_demo["opt_header_text"]) && !empty($redux_demo["opt_header_text"]) ) { ?>
					<h1><a href="<?php echo esc_url(home_url("/")); ?>"> <?php echo esc_html($redux_demo["opt_header_text"]); ?></a></h1>
					<?php } else { ?>
					<a href="<?php echo esc_url(home_url("/")); ?>"><img alt="<?php echo get_bloginfo("name"); ?>" src="<?php echo esc_url(get_template_directory_uri() . "/images/logo.png"); ?>"></a>
					<?php } ?>
				</div>
				<div class="header3-right">
					<div class="header3-switch">
						<!-- open Sidebar1 menu -->
						<a class="btn btn-customized open-menu" href="#" role="button"> </a>
						<div class="switch">
							<input class="switch__input" type="checkbox" id="themeSwitch">
							<label aria-hidden="true" class="switch__label" for="themeSwitch"> </label>
							<div aria-hidden="true" class="switch__marker"></div>
						</div>	
							<?php global $redux_demo; if ( isset($redux_demo['jp_socmedlink1']) ){ ?>
								<?php if(isset($redux_demo['jp_socmedlink1']) && $redux_demo['jp_socmedlink1']): ?>
									<div class="sosmed"><a href="<?php echo esc_url($redux_demo['jp_socmedlink1']); ?>"> <img src="<?php if($redux_demo['jp_socmedimg1']['url']): 
									echo esc_url($redux_demo['jp_socmedimg1']['url']); endif; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr($redux_demo['jp_socmedalt1']); ?>" class="tip-bottom" alt="<?php echo esc_attr($redux_demo['jp_socmedalt1']); ?>"></a></div>
								<?php endif; ?>
								<?php if(isset($redux_demo['jp_socmedlink2']) && $redux_demo['jp_socmedlink2']): ?>
									<div class="sosmed"> <a href="<?php echo esc_url($redux_demo['jp_socmedlink2']); ?>"> <img src="<?php if($redux_demo['jp_socmedimg2']['url']): 
									echo esc_url($redux_demo['jp_socmedimg2']['url']); endif; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr($redux_demo['jp_socmedalt2']); ?>" class="tip-bottom" alt="<?php echo esc_attr($redux_demo['jp_socmedalt2']); ?>"></a></div>
								<?php endif; ?>
								<?php if(isset($redux_demo['jp_socmedlink3']) && $redux_demo['jp_socmedlink3']): ?>
									<div class="sosmed"> <a href="<?php echo esc_url($redux_demo['jp_socmedlink3']); ?>"> <img src="<?php if($redux_demo['jp_socmedimg3']['url']): 
									echo esc_url($redux_demo['jp_socmedimg3']['url']); endif; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr($redux_demo['jp_socmedalt3']); ?>" class="tip-bottom" alt="<?php echo esc_attr($redux_demo['jp_socmedalt3']); ?>"></a></div>
								<?php endif; ?>
								<?php if(isset($redux_demo['jp_socmedlink4']) && $redux_demo['jp_socmedlink4']): ?>
									<div class="sosmed"><a href="<?php echo esc_url($redux_demo['jp_socmedlink4']); ?>"> <img src="<?php if($redux_demo['jp_socmedimg4']['url']): 
									echo esc_url($redux_demo['jp_socmedimg4']['url']); endif; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr($redux_demo['jp_socmedalt4']); ?>" class="tip-bottom" alt="<?php echo esc_attr($redux_demo['jp_socmedalt4']); ?>"></a></div>
								<?php endif; ?>
								<?php if(isset($redux_demo['jp_socmedlink5']) && $redux_demo['jp_socmedlink5']): ?>
									<div class="sosmed"> <a href="<?php echo esc_url($redux_demo['jp_socmedlink5']); ?>"> <img src="<?php if($redux_demo['jp_socmedimg5']['url']): 
									echo esc_url($redux_demo['jp_socmedimg5']['url']); endif; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr($redux_demo['jp_socmedalt5']); ?>" class="tip-bottom" alt="<?php echo esc_attr($redux_demo['jp_socmedalt5']); ?>"></a></div>
								<?php endif; ?>
								<?php if(isset($redux_demo['jp_socmedlink6']) && $redux_demo['jp_socmedlink6']): ?>
									<div class="sosmed"> <a href="<?php echo esc_url($redux_demo['jp_socmedlink6']); ?>"> <img src="<?php if($redux_demo['jp_socmedimg6']['url']): 
									echo esc_url($redux_demo['jp_socmedimg6']['url']); endif; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr($redux_demo['jp_socmedalt6']); ?>" class="tip-bottom" alt="<?php echo esc_attr($redux_demo['jp_socmedalt6']); ?>"></a></div>
								<?php endif; ?>
							<?php } ?>
					</div>
					<div class="header3-widget">
						<div class="header3-widgetleft">
							<?php dynamic_sidebar("efpose-header1"); ?>
						</div>
						<div class="header3-widgetright">
							<?php dynamic_sidebar("efpose-header2"); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="nav-mainwrapper">
				<nav id="site-navigation" class="efpose-nav">
					<?php wp_nav_menu(["theme_location" => "primary_menu", "menu_id" => "myTopnav", "menu_class" => "topnav", "container" => "ul", "fallback_cb" => "__return_false",]); ?>
				</nav>
				<!-- #site-navigation -->
				<div class="responsive-burger"> <a href="javascript:void(0);" class="icon" onclick="myFunction()"><?php echo "&#9776;"; ?></a></div>
			</div>
		</header>
		<div class="Sidebar1">
			<div class="dismiss"></div>
			<div class="logo">
				<div class="efposelogo">
				<?php global $redux_demo; if ( isset($redux_demo["opt_header_logo"]["url"]) && !empty($redux_demo["opt_header_logo"]["url"])) { ?>
				<a href="<?php echo esc_url(home_url("/")); ?>">
				<img alt="<?php echo get_bloginfo("name"); ?>" src="<?php echo esc_url($redux_demo["opt_header_logo"]["url"]); ?>">
				</a>
				<?php } elseif (
				isset($redux_demo["opt_header_text"]) && !empty($redux_demo["opt_header_text"]) ) { ?>
				<h1><a href="<?php echo esc_url(home_url("/")); ?>"> <?php echo esc_html($redux_demo["opt_header_text"]); ?></a></h1>
				<?php } else { ?>
				<a href="<?php echo esc_url(home_url("/")); ?>">
				<img alt="<?php echo get_bloginfo("name"); ?>" src="<?php echo esc_url(get_template_directory_uri() . "/images/logo.png"); ?>">
				</a>
				<?php } ?>
				</div>
			</div>
			<div class="sidebar1-insidewrapper">
				<?php if (is_active_sidebar("efpose-slidemenu")): ?>
				<div class="widget-area" role="complementary">
					<?php dynamic_sidebar("efpose-slidemenu"); ?>
				</div>
				<!-- #secondary -->
				<?php endif; ?>
			</div>
		</div>
		<!-- End Sidebar1 -->
		<div class="overlay"></div>
		<!-- Dark overlay -->
	</div>
<div class="wrapper-body">