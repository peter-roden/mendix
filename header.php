<!DOCTYPE html>

<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">

    <?php include_once locate_template('partials/vendor/google-tag-manager.php'); ?>

	<title><?php wp_title(''); ?><?php if ($paged > 1) {echo (' | Page '); echo ($paged);} ?></title>
	<?php include get_template_directory() . "/partials/favicons.php"; ?>

	<meta name="google" content="nositelinkssearchbox">
	<meta name="google-site-verification" content="q7oFezlH4sCGnZNmgRU9ZlUXFjJxJ94LXUqL529y1VU" />
	<meta name="baidu-site-verification" content="lX6VpqzBv6" />
	<meta name="referrer" content="always">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i" rel="stylesheet">
	<link rel="preload" href="<?= get_template_directory_uri(); ?>/ui/fonts/PatronWEB-Bold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= get_template_directory_uri(); ?>/ui/fonts/PatronWEB-Thin.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= get_template_directory_uri(); ?>/ui/fonts/PatronWEB-Italic.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= get_template_directory_uri(); ?>/ui/fonts/PatronWEB-Regular.woff2" as="font" type="font/woff2" crossorigin>

	<?php wp_head(); ?>

	<script>
		<?php // Define the window.mx namespace object in the head it is initalized for all scripts ?>
		window.mx = {
			isMobile: (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()))
		};
		<?php // Opera 8.0+ ?>
		window.mx.isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

		<?php // Firefox 1.0+ ?>
		window.mx.isFirefox = typeof InstallTrigger !== 'undefined';

		<?php // Safari 3.0+ "[object HTMLElementConstructor]"  ?>
		window.mx.isSafari = /constructor/i.test(window.HTMLElement) || (function(p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

		<?php // Internet Explorer 6-11 ?>
		window.mx.isIE = /*@cc_on!@*/ false || !!document.documentMode;

		<?php // Edge 20+ ?>
		window.mx.isEdge = !window.mx.isIE && !!window.StyleMedia;

		<?php // Chrome 1 - 79 ?>
		window.mx.isChrome = !!window.chrome && (!!window.chrome.webstore || !!window.chrome.runtime);

		<?php // Edge (based on chromium) detection ?>
		window.mx.isEdgeChromium = window.mx.isChrome && (navigator.userAgent.indexOf("Edg") != -1);

		<?php // Blink engine detection ?>
		window.mx.isBlink = (window.mx.isChrome || window.mx.isOpera) && !!window.CSS;


		<?php
		//inlining the cssrelpreload script as recommended by the instructions at
		//https://github.com/filamentgroup/loadCSS\
		include_once get_template_directory().'/ui/libs/cssrelpreload.js';
		?>
	</script>

	<?php
	//check to see if the template has a specific critical style sheet
	$template_file_name = str_replace(array('page-','.php'), '', get_template_basename());
	$critical_css_url = get_template_directory().'/ui/css/pages/'.$template_file_name.'--critical.min.css';
	if (file_exists($critical_css_url)) {
		echo "<style>";
		include_once $critical_css_url;
		echo "</style>";
	}
	?>
</head>


<body id="top" <?php body_class( get_browser_class(), 'lang-'.get_current_language() ); ?> >

	<?php include_once locate_template('partials/vendor/google-tag-manager-noscript.php'); ?>

	<h2 class="visually-hidden"><?php wp_title(''); ?><?php if ($paged > 1) {echo (' | Page '); echo ($paged);} ?></h2>

	<a href="#content" class="skip-navigation show-for-sr">
		<?= pll__('Skip navigation'); ?>
	</a>

	<?php switch(strtolower(get_field('header_selection'))) {
		case 'mxworld2019':
			include_once locate_template('pages/mendix-world/2019/header.php');
			break;
		case 'mxworld2020':
			include_once locate_template('pages/mendix-world/2020/header.php');
			break;
		case 'mini':
			include_once locate_template('partials/headers/mini.php');
			break;
		case 'none':
			break;
		default:
			include_once locate_template('partials/headers/full.php');
			break;
	}?>

	<main id="content">
		<?= (!is_single()) ? '<section>' : null; ?>

		<?php if (get_post_type() == 'page') include locate_template ( 'partials/heros/dynamic.php' ); ?>
