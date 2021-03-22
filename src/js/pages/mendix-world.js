$(document).ready(function() {
	var $window = $(window);
    var $mwHeader = $('#mw-header');

    var onScroll = function() {
        //Convert top nav to fixed position after scrolling a little bit
        if ($window.scrollTop() <= 11) {
            $mwHeader.removeClass('pushed');
        } else {
            $mwHeader.addClass('pushed');
        }
    }

	$window.on('scroll', onScroll);
});
