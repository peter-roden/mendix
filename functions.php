<?php
/**
 * Define global constants
 */
define('LANGUAGE_CODE_CHINESE', 'zh');
define('LANGUAGE_CODE_ENGLISH', 'en');
define('LANGUAGE_CODE_GERMAN',  'de');

/**
 * Import all the utilities, actions, hooks
 */
foreach (array_merge(
	glob(get_template_directory() . '/actions/*.php'),
	glob(get_template_directory() . '/filters/*.php'),
	glob(get_template_directory() . '/functions/*.php'),
	glob(get_template_directory() . '/shortcodes/*.php'),
	glob(get_template_directory() . '/utilities/*.php')
) as $filename)
{
	require $filename;
}

function add_acf_fields() {
	foreach( glob(get_template_directory() . '/acf-php/*.php') as $filename ) {
		require $filename;
	}
}
add_action('acf/init', 'add_acf_fields');

/* ========================================================================= */
/* !WORDPRESS SECURITY */
/* ========================================================================= */

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

/* ========================================================================= */
/* !WORDPRESS CUSTOMIZATION & SETUP */
/* ========================================================================= */

/* Post Thumbnail Sizes */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 128, 128, true );

/* Disable Emojis */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


function is_dark_header() {
	if (is_author()
		or (get_field('header_selection') == 'full-dark')
		or (get_field('use_dark_header') == true)
		or (is_singular('post') && !in_category_or_translation('press'))
		or (is_singular('evaluation_guide'))
		or (is_page('evaluation-guide'))
		or (is_singular('mx_live'))
		or (is_archive('mx_live'))
		or is_404()
	) {
		return 'dark';
	}
}

function is_template_with_tabbedNav() {
	return is_page_template(array(
		'pages/careers.php',
		'pages/citizen-developers-new.php',
		'pages/content-hub-agile.php',
		'pages/content-hub-lowcode.php',
		'pages/low-code-guide.php',
	));
}

function is_template_with_aos() {
	return is_page_template(array(
		'pages/homepage.php',
		'pages/mxdp.php',
		'pages/mobile-architecture.php',
		'pages/platform-2020.php',
		'pages/rapid-app-develop.php',
	));
}

function is_template_with_scrollmagic() {
	return is_page_template(array(
		'pages/mxdp.php',
	));
}

function is_template_with_magnify() {
	return is_page_template(array(
		'pages/platform-2020.php',
		'pages/rapid-app-develop.php',
	));
}

function is_template_with_isInViewport() {
	return is_page_template(array(
		'pages/platform-2020.php',
		'pages/rapid-app-develop.php',
	));
}

function is_template_with_case_studies_panel() {
	return is_page_template(array(
		'pages/awareness-dach.php',
	));
}

function is_template_with_sticky_header() {
	return is_page_template(array(
		'pages/customer-stories.php',
		'pages/evaluation-guide.php'
	))
	or get_post_type( get_the_ID() ) == 'evaluation_guide';
}

function is_template_with_magnific_popup() {
	return is_page_template(array(
		'pages/resources.php',
	)) or is_single();
}

/* ========================================================================= */
/* !ENQUEUE SCRIPTS */
/* ========================================================================= */
function enqueue_scripts() {
	/**
	 * Remove wp-embed script
	 *
	 * Relates specifically to embeding WordPress posts from other people's blogs/websites.
	 * Embedding WordPress posts inside WordPress posts: so meta! This feature was introduced in WordPress 4.4.
	 * cite: https://wordpress.stackexchange.com/questions/211701/what-does-wp-embed-min-js-do-in-wordpress-4-4
	*/
	wp_deregister_script('wp-embed');

	//remove the default WP jquery and load a newer version
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js');

    //a polyfill for intersection observer that should only be need for ie11 fallback
	wp_enqueue_script('intersection-observer-polyfill', 'https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver', null, null);
	enqueue_cache_busted_script('observer', '/ui/js/observer.min.js', null, null, true);

	/**
	 * Loading foundations complete helpers.
	 * Use across site for accordions, tabs. because their aria labeling is better than ours
	 */
	wp_enqueue_script('foundation', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/js/foundation.min.js', null, null, true);

	//allows older browsers to understand the <use xlink:href=""> in svgs
	wp_enqueue_script('svgxuse', 'https://cdnjs.cloudflare.com/ajax/libs/svgxuse/1.2.6/svgxuse.min.js', null, null, true);

	if (is_template_with_aos()) {
		wp_enqueue_script('aos-script', 'https://unpkg.com/aos@2.3.1/dist/aos.js', null, null, true);
		wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
	}

	if(is_template_with_scrollmagic()) {
		wp_enqueue_script('scrollmagic-tweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js', null, null, true);
		wp_enqueue_script('scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', null, null, true);
		wp_enqueue_script('scrollmagic-animation', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.js', null, null, true);
	}

	wp_enqueue_script('vidyard-script', 'https://play.vidyard.com/embed/v4.js', null, null, false);

	/**
	 * Magnific Popup for older Youtube video embeds, but alsop for Vimeos, popup Gmaps,
	 * or .popup-toggle items, which are no longer anywhere is the visible code bank,
	 * and are likely obsolete, but could still be contained on a blog somewhere?
	 */
	if (is_template_with_magnific_popup()) {
		wp_enqueue_script('magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), null, true);
		queue_non_critical_css("https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css");
	}

	if (is_template_with_isInViewport()) {
		wp_enqueue_script('is-in-viewport', 'https://cdnjs.cloudflare.com/ajax/libs/is-in-viewport/3.0.4/isInViewport.min.js', array('jquery'), null, true);
	}

	if (is_author() || is_tag() || is_category()) {
		wp_enqueue_script('infinite-scroll', 'https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js', null, null, true);
	}

	if ( is_template_with_sticky_header() ) {
		wp_enqueue_script('jquery-sticky', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js', array('jquery'));
	}

	if (is_template_with_magnify()) {
		wp_enqueue_script('magnify', 'https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify.min.js', array('jquery'), null, true);
	}

	enqueue_cache_busted_script('slick-js', '/ui/libs/slick.min.js', null, null, true);
	queue_non_critical_css("https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css");

	if (is_page_template(array('pages/blog-hub.php'))) {
		enqueue_cache_busted_script('blog-filtering', '/ui/js/blog-filtering.min.js', null, null, true);
		wp_localize_script('blog-filtering', 'blog_filtering_js', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ajax_custom_nonce' )
		));
	}

	if ( get_post_type( get_the_id() == 'evaluation_guide' ) ) {
		enqueue_cache_busted_script('eval-guide-js', '/ui/js/pages/evaluation-guide.min.js', null, null, true);
	}

	if (get_post_type( get_the_id() == 'mx_live' ) || is_post_type_archive('mx_live') ) {
    	wp_enqueue_script('twitch-embed', 'https://embed.twitch.tv/embed/v1.js',  null, null, false);
	}

	if (is_page_template(array(
		'pages/outsystems.php',
		'pages/resources.php',
		'pages/solution-providers.php',
	))) {
		wp_enqueue_script('sticky-kit', 'https://cdnjs.cloudflare.com/ajax/libs/sticky-kit/1.1.3/sticky-kit.min.js',  null, null, true);
	}

	//add capture UTM and the required cookie plugin
	wp_enqueue_script('js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', null, null, true);
	enqueue_cache_busted_script('capture-utm', '/ui/js/capture-utm.min.js', array('jquery', 'js-cookie'), null, true);
	enqueue_cache_busted_script('init', '/ui/js/jquery.init.min.js', array('jquery'));
	enqueue_cache_busted_script('remove-marketo-styles', '/ui/js/remove-marketo-styles.min.js', array('jquery'));

	/**
	 * Auto enqueue js for templates.
	 * Follows a convention of matching the template name, minus the 'page-' prefix
	 */
	$template_file_name = str_replace(array('page-','.php'), '', get_template_basename());
	$template_js_path = '/ui/js/pages/'.$template_file_name.'.min.js';
	if (file_exists(get_template_directory().$template_js_path)) {
		enqueue_cache_busted_script('page-'.$template_file_name, $template_js_path);
	}
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');

/* ========================================================================= */
/* !ENQUEUE STYLES */
/* ========================================================================= */

function enqueue_styles() {
	/**
	 * remove Gutenberg styles
	 */
	wp_dequeue_style('wp-block-library');

	/**
	 * remove stylesheet generated by 'SVG Support' plugin that doesn't need to run
	 * on the live site
	 */
	wp_dequeue_style('bodhi-svgs-attachment');

	/**
	 * enqueue the global styles
	 */
	enqueue_cache_busted_style('style', '/ui/css/style.min.css');

	if (is_template_with_tabbedNav()) {
		enqueue_cache_busted_style('tabbedNav', '/ui/css/partials/tabbedNav.min.css');
	}

	if ( is_singular('customer_stories') ) {
		$template_file_name = 'customer-stories-single.min.css';
		$template_css_path = '/ui/css/pages/'.$template_file_name;
		enqueue_cache_busted_style($template_file_name, $template_css_path);
	}

	if ( is_singular('evaluation_guide') ) {
		$template_file_name = 'evaluation-guide.min.css';
		$template_css_path = '/ui/css/pages/'.$template_file_name;
		enqueue_cache_busted_style($template_file_name, $template_css_path);
	}

	if ( is_singular('live') || is_archive('live') ) {
		$template_file_name = 'mx-live.min.css';
		$template_css_path = '/ui/css/pages/'.$template_file_name;
		enqueue_cache_busted_style($template_file_name, $template_css_path);
	}

	/**
	 * Auto enqueue css for templates.
	 * Follows a convention of matching the template name, minus the 'page-' prefix
	 */
	$template_file_name = str_replace(array('page-','.php'), '', get_template_basename());
	$template_css_path = '/ui/css/pages/'.$template_file_name.'.min.css';
	enqueue_cache_busted_style('page-'.$template_file_name, $template_css_path);
}

add_action('wp_enqueue_scripts', 'enqueue_styles');

/* ========================================================================= */
/* !ADD ACF5 OPTIONS PAGE - more args available at http://www.advancedcustomfields.com/resources/acf_add_options_page/  */
/* ========================================================================= */

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Shared Content',
		'menu_slug' => 'options'
	));

	acf_add_options_page(array(
		'page_title' => 'Site Navigation',
		'menu_slug' => 'site_navigation',
	));
}

/**
 *
 */
include 'static/redirects.php';
