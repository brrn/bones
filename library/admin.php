<?php
/*
This file handles the admin area and functions.

1. Custom Login Page
2. ACF Config
3. Theme Config
4. Sass Setup

*/


/************* 1. CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter('login_headerurl', 'bones_login_url');
add_filter('login_headertitle', 'bones_login_title');


/**************** 2. ACF Config **********************/

// Include ACF
include_once('ACF/advanced-custom-fields/acf.php');

// Disable the front end if ACF is not installed
if( !is_admin() && !function_exists('get_field') ){
	die( 'Please install and activate the <a href="'.admin_url( 'plugin-install.php?tab=search&s=Advanced+Custom+Fields' ).'">Advanced Custom Fields</a> plugin.');
}

// Include ACF Add Ons
include_once('ACF/acf-options-page/acf-options-page.php'); 
include_once('ACF/acf-repeater/acf-repeater.php');
include_once('ACF/acf-gallery/acf-gallery.php');
include_once('ACF/acf-flexible-content/acf-flexible-content.php');


// Include Theme Option Fields
include_once('ACF/acf_theme_options.php');


/*************** 3. Theme Config ********************/

// Privacy and Analytics Settings
if( function_exists('get_field') ){
	function think_privacy() {
		$staging = get_field('environment', 'option');
		$environment = parse_url($staging[0]['staging_address']);
		$current = parse_url(get_site_url());	
		if( $current[host] != $environment[host] ){
			update_option( 'blog_public', '1' );
			if( get_field('google_analytics_ua_code', 'option') != '' ){
				function think_analytics() {
					$ga_code = "
					<script type=\"text/javascript\">
					
					  var _gaq = _gaq || [];
					  _gaq.push(['_setAccount', '".get_field('google_analytics_ua_code', 'option')."']);
					  _gaq.push(['_trackPageview']);
					
					  (function() {
						var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
						ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
					  })();
					
					</script>";
					echo $ga_code;
				}
				add_action('wp_footer', 'think_analytics');
			}
		}else{
			update_option( 'blog_public', '0' );
		}
	} 
	add_action( 'init', 'think_privacy' );
}

// Maintenance Mode
if( function_exists('get_field') ){
	function maintenance_mode() {
		if ( get_field('maintenance_mode', 'option') == 'on' && !is_admin() && !is_user_logged_in() ) {
			get_template_part( 'maintenance' );
			die();
		}
	} 
	add_action( 'wp', 'maintenance_mode' );
}


/*************** 3. Sass Config ********************/


/*function generate_css() {
	if(function_exists('wpsass_define_stylesheet')) {
		wpsass_define_stylesheet("theme.scss", true);
	}
}
add_action( 'after_setup_theme', 'generate_css' );*/

include_once('scss/wordpress-sass/wordpress_sass.php');
function generate_css() {
if(function_exists('wpsass_define_stylesheet')) {
	wpsass_define_stylesheet("theme.scss", true);
	}
}
add_action( 'after_setup_theme', 'generate_css' );


?>
