/**
 * @param {Jquery Object} links 
 */
window.mx.scrollTo = function(target) {
	var scrollDistance = Math.abs(target.offset().top - window.scrollY);
	var clampedScrollDistance = Math.min(scrollDistance, 2000);

	$('html, body').animate({
		scrollTop: target.offset().top
	},
	clampedScrollDistance,
	//Callback after animation
	function() {
		//Must change focus!
		var $target = $(target);
		$target.focus();
		//Checking if the target was focused
		if ($target.is(":focus")) {
			return false;
		} else {
			//Adding tabindex for elements not focusable
			$target.attr('tabindex', '-1');
			//Set focus again
			$target.focus();
		}
	});
}; 

/**
 * @param {Jquery Object} links 
 */
var addSmoothScrolling = function(links) {
    //add smooth scrolling to all links with hashes (#)
    links.not('[href="#"]').not('[href="#0"]').click(function(event) {
        //On-page links
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

			//Does a scroll target exist?
			if (target.length) {
				//Only prevent default if animation is actually gonna happen
				event.preventDefault();
				window.mx.scrollTo(target); 
			}
        }
    });
};

/**
 */
document.addEventListener("DOMContentLoaded", function(event) {
    var anchorLinks = $('a[href^="#"]:not(.tabs-title *):not(.no-scroll *)');
    addSmoothScrolling(anchorLinks);
});