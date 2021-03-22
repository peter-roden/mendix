/**
 * If Animate on Scroll library is active for the page
 * https: //michalsnik.github.io/aos/
 */
$(document).ready(function() {
	if (window.AOS) {
		window.AOS.init({
			disable: 'mobile'
		});
	}
});