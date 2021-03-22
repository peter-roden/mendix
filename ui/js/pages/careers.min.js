$(document).ready(function () {
	var $gallery = $('.location--slider');

	var slideCount = null;

	$('#careersLocations .location--slider').slick({
		autoplaySpeed: 8000,
		speed: 800,
		prevArrow: '.slick-prev',
		nextArrow: '.slick-next',
	});

	$gallery.on('init', function (event, slick) {
		slideCount = slick.slideCount;
		setSlideCount();
		setCurrentSlideNumber(slick.currentSlide);
	});

	$gallery.on(
		'beforeChange',
		function (event, slick, currentSlide, nextSlide) {
			setCurrentSlideNumber(nextSlide);
		}
	);

	function setSlideCount() {
		var $el = $('.slide-count-wrap').find('.total');
		$el.text(slideCount);
	}

	function setCurrentSlideNumber(currentSlide) {
		var $el = $('.slide-count-wrap').find('.current');
		$el.text(currentSlide + 1);
	}
});
