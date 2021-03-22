/**
 * Init lightbox style popups for YouTube video links with MagnificPopup
 */
$(document).ready(function() {
    if ($().magnificPopup) {
        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        $('.popup-toggle').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
		});
		
		$('.popup-youtube').on('click', function() {
			var title = $(this).attr('data-title');
			window.history.replaceState({}, 'video', '?video=' + title);
		});
	}
});