<?php

/*********** CORE DIRECTIVES - DO NOT MODIFY ***********/

if(!defined('_S_VERSION')){define('_S_VERSION','3.0.0');}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

if(!function_exists('w3wg3_setup')):function w3wg3_setup(){load_theme_textdomain('w3wg3',get_template_directory().'/languages');add_theme_support('automatic-feed-links');add_theme_support('title-tag');add_theme_support('post-thumbnails');register_nav_menus(array('menu-1'=>esc_html__('Menu główne','w3wg3'),));;add_theme_support('custom-background',apply_filters('w3wg3_custom_background_args',array('default-color'=>'ffffff','default-image'=>'',)));add_theme_support('customize-selective-refresh-widgets');add_theme_support('custom-logo',array('height'=>250,'width'=>250,'flex-width'=>true,'flex-height'=>true,));}
endif;add_action('after_setup_theme','w3wg3_setup');

function w3wg3_content_width(){$GLOBALS['content_width'] = apply_filters( 'w3wg3_content_width', 1015 );}
add_action( 'after_setup_theme', 'w3wg3_content_width', 0 );

function w3wg3_scripts(){wp_enqueue_style('w3wg3-style',get_stylesheet_uri(),array(),_S_VERSION);wp_style_add_data('w3wg3-style','rtl','replace');}
add_action('wp_enqueue_scripts','w3wg3_scripts');

/*********** HELPERS ***********/

// Login page 
function login_stylesheet() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/login/login.css' );
}
add_action( 'login_enqueue_scripts', 'login_stylesheet' );

// Removes WP version info from rss
remove_action('wp_head', 'wp_generator');

function my_secure_generator( $generator, $type ) {
	return '';
}
add_filter( 'the_generator', 'my_secure_generator', 10, 2 );

function my_remove_src_version( $src ) {
	global $wp_version;

	$version_str = '?ver='.$wp_version;
	$offset = strlen( $src ) - strlen( $version_str );

	if ( $offset >= 0 && strpos($src, $version_str, $offset) !== FALSE )
		return substr( $src, 0, $offset );

	return $src;
}
add_filter( 'script_loader_src', 'my_remove_src_version' );
add_filter( 'style_loader_src', 'my_remove_src_version' );

/*********** CUSTOM STYLING ***********/

// Template styles
function wg_styles() {

    // Globals
    $theme_dir = get_stylesheet_directory_uri();

    wp_register_style( 'normalize-legacy-v2', $theme_dir . '/assets/css/normalize-v2.css', array(), '1.01' ); 
    wp_register_style( 'wg-css', $theme_dir . '/assets/css/wg.css', array(), '1.04' ); 
    wp_register_style( 'responsive-767', $theme_dir . '/assets/css/responsive-767.css', array(), '1.00' ); 
    wp_register_style( 'responsive-1024', $theme_dir . '/assets/css/responsive-1024.css', array(), '1.00' );
    
    wp_enqueue_style( 'normalize-legacy-v2' );
    wp_enqueue_style( 'wg-css' );
    wp_enqueue_style( 'responsive-767' );
    wp_enqueue_style( 'responsive-1024' );

}
add_action( 'wp_enqueue_scripts', 'wg_styles' );

// Fix for admin clicks in media Classicpress
function enqueue_custom_admin_style() {
    wp_enqueue_style('custom-admin-style', get_stylesheet_directory_uri() . '/assets/css/admin-fix.css');
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_style');

/*********** CUSTOM FUNCTIONS ***********/

// Removes categories and tags from blogposts
function unregister_default_categories_taxonomy() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'unregister_default_categories_taxonomy');

// Removes unused image sizes
function disable_core_image_sizes() {
    remove_image_size('medium_large');
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');
}
add_action('init', 'disable_core_image_sizes');

function disable_core_image_sizes_settings($sizes) {
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_core_image_sizes_settings');

add_filter('intermediate_image_sizes', function($sizes) {
    return array_diff($sizes, ['medium_large']);
});

// IF ACF
function remove_unused_image_sizes_from_acf_wysiwyg($sizes) {
    unset($sizes['medium_large']);
    unset($sizes['large']);
    
    return $sizes;
}
add_filter('image_size_names_choose', 'remove_unused_image_sizes_from_acf_wysiwyg');

// Custom scripts
function loadk_scripts() {

    // Globals
    $theme_dir = get_stylesheet_directory_uri();
    $q_id = get_queried_object_id();

    // Style switch - global
    wp_enqueue_script( 'style-switch', $theme_dir . '/assets/js/style-switch.js', array(), '0.1', true );

    // SVG loader - global
    wp_enqueue_script( 'svg-loader', $theme_dir . '/assets/js/svg-loader.js', array(), '', true );

    // Smoothscroll
    wp_enqueue_script( 'scroll-to-id', $theme_dir . '/assets/js/scrolltoid.js', array(), '', true );
    /* use as: onclick="smoothScrollToId('your-section-id', 500, 30); return false;" on <a> elements;
    first parameter is ID, second is duration and third is offset */

    // Accordion
    if (is_singular('post') && get_field('accordion_for_post_script', $q_id) || is_page_template('template-plugins.php') && get_field('accordion_for_post_script', $q_id) || is_page_template('template-homev2.php')) {
        wp_enqueue_script( 'accordion-custom', $theme_dir . '/assets/js/accordion-w.js', array(), '', true );
    }

    // Social media share
    if ( is_singular('post') ) {
        wp_enqueue_script( 'sharer-js', $theme_dir . '/assets/js/sharer.min.js', array(), '0.5.3', true );
    }

    // Prism JS
    if (is_singular('post') && get_field('prismjs_check', $q_id)) {
        wp_enqueue_script( 'prism', $theme_dir . '/assets/prism/prism.js', array(), '1.29.0', true );
        wp_enqueue_style( 'prism-css', $theme_dir . '/assets/prism/prism.css' );
    }

    if (is_404()) {
        wp_enqueue_script( 'matrix-dark', $theme_dir . '/assets/js/matrix.js', array(), '', true );
    }
    
}
add_action( 'wp_enqueue_scripts', 'loadk_scripts' );

// Disable autop shortcode 
function my_formatter($content) {
       $new_content = '';
       $pattern_full = '{(\[noautop\].*?\[/noautop\])}is';
       $pattern_contents = '{\[noautop\](.*?)\[/noautop\]}is';
       $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

       foreach ($pieces as $piece) {
               if (preg_match($pattern_contents, $piece, $matches)) {
                       $new_content .= $matches[1];
               } else {
                       $new_content .= wptexturize(wpautop($piece));
               }
       }

       return $new_content;
}
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter', 99);

// Allow shortcodes in ACF fields
function text_area_shortcode($value, $post_id, $field) {
  if (is_admin()) {
    return $value;
  }
  return do_shortcode($value);
}
add_filter('acf/load_value/type=textarea', 'text_area_shortcode', 10, 3);

// ClassicPress ignore WP version
//add_filter( 'classicpress_ignore_wp_version', '__return_true' );

// XML-RPC off
function bu_disable_xmlrpc() {    
    add_filter('xmlrpc_enabled', '__return_false');
}
function disable_x_pingback( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
}
add_action('init', 'bu_disable_xmlrpc');
add_filter('wp_headers', 'disable_x_pingback' );
add_filter('xmlrpc_methods', '__return_empty_array' );

// Show admin notice with actual revision limit
/*add_action( 'admin_notices', function() {

    // Ask WP what the current limit is
    $limit = apply_filters( 'wp_revisions_to_keep', false, get_post() );

    if ( $limit !== false ) {
        echo '<div class="notice notice-info is-dismissible">
                <p><strong>Revision Limit Active:</strong> WordPress is keeping a maximum of '
                 . intval( $limit ) . ' revisions per post.</p>
              </div>';
    }
});*/