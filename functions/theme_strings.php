<?php 
if (function_exists('pll_register_string')) {
	/**
	 * List of strings hardcoded into theme (not attached to a single ACF page).
	 * These are registered through Polylang and can be found in Wp Admin -> Languages -> String Translations
	 * where each item receives a field for each language and will can be accessed using the 
	 * function pll__() where the parameter is the registered string (in default language English), example:
	 * 	pll__('All');// returns string 'Alles' when the language is currently Deutsch 
	 */
	$theme_strings = [
		'A member of our team will be in touch with you shortly.',
		'About', 
		'All rights reserved',
		'All',
		'Anchor links',
		'Back to press releases',
		'Breadcrumbs',
		'Business Value',
		'Children pages',
		'Click here',
		'Close modal',
		'Contact Us',
		'Customer Story',
		'Customers',
		'Days',
		'Development Time',
		'Download now',
		'End of posts',
		'Events',
		'Featured Posts',
		'Follow us on social media.', //'Folgen Sie uns auf Social Media.' '如果您喜欢我们的内容，请关注我们的社交活动。'
		'Footer navigation',
		'Frequently Asked Questions',
		'Functionality',
		'Get Started',
		'Join thousands of Makers across the globe transforming their business with the Mendix low-code platform.',
		'Key findings',
		'Learn more',
		'Legal',
		'Listen now',
		'Loading more posts',
		'Login',
		'Media Coverage',
		'More posts',
		'Name of application',
		'Newer Media coverage',
		'Newer press releases',
		'Newsroom navigation',
		'Newsroom',
		'Older Media coverage',
		'Older press releases',
		'Posts by',
		'Privacy Policy',
		'Read more',
		'Read now',
		'Recent Releases',
		'Register Now',
		'Related Assets',
		'Search',
		'Site footer',
		'Site header',
		'Site navigation',
		'Skip navigation', //'Navigation überspringen'
		'Social Media',
		'Start for free', // 'Kostenlos testen', '免费试用'
		'Start making today',
		'Subscribe to the blog',
		'Subscribe',
		'Terms of Use',
		'Thank You',
		'Toggle Navigation',
		'Topic',
		'Trending',
		'View article',
		'View now',
		'Watch the video',
	];

	foreach ($theme_strings as $s) {
		pll_register_string( sanitize_title($s), $s );
	}

	/**
	 * unsure if the quoteation marks will work as a database string
	 * so these two are being added outside the automation loop
	 */
	pll_register_string( 'open-quote', '“' );
	pll_register_string( 'close-quote', '”' );
}
