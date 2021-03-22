/**
*
*/
function initNewCarousel() {
	var mobileArchitectureSlider = $('#mobile-architecture-slider');
	mobileArchitectureSlider.slick({
		dots: true,
		arrows: false,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 5000,
		pauseOnDotsHover: true,
	});

	$('.slick-dots').on('click', function() {
		mobileArchitectureSlider.slick('slickPause');
	});
}


// Helper function to help recalibrate height intersector for AOS animations
function reinitAOS() {
  // Start AOS
  AOS.init({
  	once: true,
  });
}

/**
 *
 */
 document.addEventListener("DOMContentLoaded", function(event) {

	// Vars for comparison slider
	var $panelContainer = $('.panel-split-container');
	var $pointer = $('.pointer-control ');



	$('#mobile-architecture-slider').on('init', function(event, slick){
	// Re-init to recalibrate page height
	reinitAOS();
});

   //add an observer to watch for the page to be on the tabs
	//and then reinit AOS when in view
	var mxdpTabbedContent = document.querySelector('.accordion-sections-with-image');


	if ($('.accordion-sections-with-image').foundation && mxdpTabbedContent) {
		var mxdpTabsObserver = new IntersectionObserver(function(entries, observer) {

			for (var l = entries.length - 1; l >= 0; l--) {
				var entry = entries[l];
				if (entry.intersectionRatio > 0) {
					mxdpTabsObserver.unobserve(entry.target);
					reinitAOS();
				}
			}
		});
		mxdpTabsObserver.observe(mxdpTabbedContent);
	}

	//add an observer to watch for the page to be on the carousel
	//and then start it when in view
	var mxdpCarouselElement = document.querySelector('#mobile-architecture-slider');


	if ($('#mobile-architecture-slider').slick && mxdpCarouselElement) {
		var mxdpCarouselObserver = new IntersectionObserver(function(entries, observer) {

			for (var l = entries.length - 1; l >= 0; l--) {
				var entry = entries[l];
				if (entry.intersectionRatio > 0) {
					mxdpCarouselObserver.unobserve(entry.target);
					initNewCarousel();
				}
			}
		});

		mxdpCarouselObserver.observe(mxdpCarouselElement);
	}

	  // Comparison Slider
	  $panelContainer.each(function(event) {
	  	var $panelLeft = $('.panel-left');
	  	var $panelRight = $('.panel-right');
	  	var $panelExtras = $('.panel-extras');
	  	var $panelEntry = $('.panel-entry');

	  	$panelLeft.hover(
	  		function() {
	  			var $this = $(this);
	  			$this.addClass('is-active').parent().addClass('panel-hover-left');
	  			$this.find($panelExtras).removeClass('fade-out').addClass('fade-in');
	  			$this.find($panelEntry).addClass('expanded');
	  			$pointer.addClass('move-right');
	  		},
	  		function() {
	  			var $this = $(this);
	  			$this.removeClass('is-active').parent().removeClass('panel-hover-left');
	  			$this.find($panelExtras).removeClass('fade-in').addClass('fade-out');
	  			$this.find($panelEntry).removeClass('expanded');
	  			$pointer.removeClass('move-right');
	  		}
	  		);

	  	$panelRight.hover(
	  		function() {
	  			var $this = $(this);
	  			$this.addClass('is-active').parent().addClass('panel-hover-right');
	  			$this.find($panelExtras).removeClass('fade-out').addClass('fade-in');
	  			$this.find($panelEntry).addClass('expanded');
	  			$pointer.addClass('move-left');
	  		},
	  		function() {
	  			var $this = $(this);
	  			$this.removeClass('is-active').parent().removeClass('panel-hover-right');
	  			$this.find($panelExtras).removeClass('fade-in').addClass('fade-out');
	  			$this.find($panelEntry).removeClass('expanded');
	  			$pointer.removeClass('move-left');
	  		}
	  		);
	  });
	});
