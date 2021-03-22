$.isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));

/**
 * window
 */
/**
 * @param {String} id
 */
window.openA11yDialog = function (id) {
	var dialog = $(id);

	if (dialog.hasClass('reveal')) {
		dialog.foundation('open');
	} else {
		if (!$.magnificPopup) {
			window.alert('Thank you for submitting!');
		} else {
			var siblings = dialog.siblings();
			$.magnificPopup.open({
				items: {
					src: dialog,
				},
				type: 'inline',
				callbacks: {
					beforeOpen: function () {},
					open: function () {
						dialog.removeAttr('aria-hidden');
						siblings.attr('aria-hidden', true);
					},
					close: function (item) {
						dialog.attr('aria-hidden', true);
						siblings.removeAttr('aria-hidden');
					},
				},
			});
		}
	}
};

/**
 * @param {Object} mx Mendix namespace
 */
if (!window.mx) {
    //window.mx should be set in the header.php, incase any rogue inline
    //scripts try to access it
    window.mx = {};
}
/**
 * Strip special characters, spaces, and convert to lower case.
 * Returns a string format acceptable for CSS and similar to WP/ACF's slug format
 * @param {string} $string
 */
window.mx.convertToSlug = function(text) {
    return text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
};
/**
 * 
 * @param {string} sParam 
 */
window.mx.getUrlParameter = function(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

/**
 * DOMContentLoaded / $(document).ready()
 */
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
/**
 * Track various clicks in Google Analytics
 */
$(document).ready(function() {
    //ensure all PDFs aren't being crawled by search engines
    var pdfLinks = $('a[href*="pdf"]');
    pdfLinks.attr('rel', 'nofollow');
    pdfLinks.bind("click", function() {
        dataLayer.push({
            'event': 'PDFClick',
            'clickedHREF': $(this).attr('href')
        });
    });

    $("a[href*='home.mendix.com']").bind("click", function() {
        dataLayer.push({
            'event': 'SigninClick'
        });
    });
});
/**
 * Initialize Foundation
 */
$(document).ready(function () {
    if ($(document).foundation) {
        $(document).foundation();
    }
});
$(document).ready(function() {
    if ($().infiniteScroll && $('.pagination a').length) {
        var container = $('#content-container');
        container.infiniteScroll({
            path: '.pagination a',
            append: false,
            history: false
        });

        container.on('load.infiniteScroll', function(event, response, path) {
            var loadedPosts = $(response).find('.post');
            // append posts after images loaded
            loadedPosts.imagesLoaded(function() {
                container.infiniteScroll('appendItems', loadedPosts);
            });
        });

        container.on('append.infiniteScroll', function(event, response, path, items) {
            $(items).find('img[srcset]').each(function(i, img) {
                img.outerHTML = img.outerHTML;
            });
        });
    }
});
$(document).ready(function() {
    var matte;
    var languageSelect = $('.language-select');
	var languageSelectDialog = $('.language-select__dialog');
	var languageItems = $('.lang-item'); 

    function onIsEscapeKey(e) {
        if (e.keyCode == 27) {
            if (languageSelect.hasClass('active')) {
                closeLanguageDialog(true);
            }
        }
    }

	function openLanguageDialog(e) {
        languageSelect.addClass('active');
        languageSelect.before('<div class="language-select__matte"></div>');
        matte = $('.language-select__matte');
        matte.on('click', closeLanguageDialog);
        languageItems.first().find('a').focus();
        languageSelectDialog.attr('aria-hidden', false);
    }

	function closeLanguageDialog() {
        matte.remove();
        languageSelect.removeClass('active');
        languageSelectDialog.attr('aria-hidden', true);
        $(document).off('keyup', onIsEscapeKey);
    }

	languageItems.on('click', function(e) {
        if (languageSelect.hasClass('active') == false) {
            e.preventDefault();
            openLanguageDialog();
            $(document).on('keyup', onIsEscapeKey);
        }
    });
});
$(document).ready(function () {
  var logoTicker = $(".logoTicker");
  
  logoTicker.each(function () {

	var placeholderCount = $(this).find(".block").length;
    var cells = $(this).find(".logoTicker__cell");
    var l = cells.length;
    var i = -1;

    var replaceInterval;
    var animateIntterval;

    setInterval(function () {
      clearInterval(replaceInterval);
      clearInterval(animateIntterval);

      ++i;
      var prev = cells.get(i % l);
      var next = cells.get((i + placeholderCount) % l);
      prev.classList.add("out");

      //on out complete, replace the <li> with the next <li> to show
      replaceInterval = setTimeout(function () {
		prev.replaceWith(next);
		prev.classList.remove('block', 'out', 'in');
        next.classList.add("block");
		logoTicker.append(prev);
      }, 450);

      animateIntterval = setTimeout(function () {
		next.classList.add('in');
      }, 500);
	}, 1000);
  });
});
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
jQuery(document).ready(function($) {

    $('.pb_dropdown__toggle').each(function() {
        var CLOSE_ANIMATIION_DURATION = 500;
        var toggle = $(this);

        var target = toggle.attr('data-target');
        var dropdown = $('.pb_dropdown__pane#' + target);
        dropdown.active = false;

        var radios = dropdown.find('input[type="radio"]');
        var labels = dropdown.find('label');
        var closeTimeout = null;

        labels.on('mousedown', select);

        radios.on('keydown', function(e) {
            switch (e.keyCode) {
                case 13: //enter 
                    select();
                    break;
                case 27: //esc
                    close(e);
                    break;
            }
        });

        function select(e) {
            dropdown.addClass('selected');

            setTimeout(function() {
				var checked = radios.filter(':checked');
                toggle.text(checked.attr('value'));

                //TODO onselect stuff
                var callback = dropdown.attr('data-callback');
                window[callback](checked);
            }, 100);

            close(CLOSE_ANIMATIION_DURATION);
        }

        function open() {
            if (dropdown.hasClass('selected')) {
                radios.filter(':checked').focus();
                dropdown.removeClass('selected');
            } else {
                radios.eq(0).focus();
            }

            radios.attr('tabindex', '0');
            dropdown.css('top', toggle.position().top + toggle.outerHeight());
            dropdown.css('left', toggle.position().left);
            dropdown.css('width', toggle.outerWidth());

            toggle.addClass('active');
            dropdown.addClass('active');
            dropdown.active = true;
        }

        function close(timeout) {
            dropdown.active = false;

            clearInterval(closeTimeout);
            closeTimeout = setTimeout(function() {
                dropdown.removeClass('active');
                toggle.removeClass('active');
                radios.attr('tabindex', '-1');
            }, timeout);
        }

        toggle.on('click', function() {
            if (dropdown.active) {
                close(0);
            } else {
                open();
            }
        });

        toggle.on('keydown', function(e) {
            switch (e.keyCode) {
                case 38: //up 
                case 40: //down 
                    e.preventDefault();
                    open();
                    break;
            }
        });
    });
});
(function() {

	var terms = $("#rotatedTerms li");
	if (terms.length) {

		function rotateTerm() {
			var ct = $("#rotateText").data("term") || 0;
			$("#rotateText").data("term",
            ct == terms.length - 1 ? 0 : ct + 1).text(terms.eq([ct]).text()).fadeIn().delay(1200).fadeOut(500, rotateTerm);
			
		}
		$(rotateTerm);
	}
})();
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
/**
 * Swap LI elements
 */
$(document).ready(function () {
	$('.swapping-words').each(function () {
		var items = $(this).find('.swapping-words__item');
		var i = 0;

		function swap() {
			items.eq(i % items.length).hide();
			items.eq(++i % items.length).show();
			setTimeout(swap, 1000);
		}

		if (items.length) {
			swap();
		}
	});
});

/**
 *
 */
 document.addEventListener("DOMContentLoaded", function(event) {
    $('.tab-container').each(function() {
        var container = $(this);
        var links = container.find('.tab-link');
        var contents = $();

        //
        links.each(function() {
            var link = $(this);
            var href = link.attr('href');
            var asClass = href.replace('#', '.');
            var idAndClassSearch = [href, asClass].join(',');
            var content = $(idAndClassSearch);
            var linkActive = container.find('.tab-link.active');

            contents.push(content);
            link.data('content', content);
            content.find('a, button').attr('tabindex', '-1');
        });

        //
        links.on('click', function(event) {
            event.preventDefault();

            //
            links.removeClass('active');
            contents.each(function() {
                var content = $(this);
                content.removeClass('active');
                content.find('a, button').attr('tabindex', '-1');
            });

            //
            var link = $(this);
            var content = link.data('content');

            //send content's media to be un lazy loaded
            link.addClass('active');
            content.addClass('active');
            content.find('a, button').removeAttr('tabindex');

            if(content.hasClass('active')) {
                tabVideo = content.find($("video"));

                if ((tabVideo).length === 1) {
                    $(tabVideo).get(0).play();
                }

            } else {
                $(tabVideo).get(0).pause();
            }
        });
    });
});


/**
 * window.load
 */
/**
 * Insert player UUID instead of [UUID]
 * @param {string} vidyardUUId Vidyard video ID
 * @param {int} chatper chapter for the video if it has a playlist
 */
window.launchLightbox = function(vidyardUUId, chapter) {

    var title = $(this).attr('data-title') || vidyardUUId;
    if (!vidyardUUId) {
        console.warn('vidyardUUId is null');
        //also true, because we want stop trying to load a video that doesn‘t exist
        return true;
	}
	
    var players = VidyardV4.api.getPlayersByUUID(vidyardUUId);
    if (players && players[0]) {
        var player = players[0];
        player.showLightbox();

        player.on('chapterComplete', function() {
            var nextChapter = player.getCurrentChapter() + 1;
            window.history.replaceState({}, 'video', '?video=' + title + '&chapter=' + nextChapter);
        });

        if (chapter) {
            player.on('ready', function() {
                player.off('ready');
                player.playChapter(chapter);
            });
        } else {
            window.history.pushState({}, 'video', '?video=' + title);
        }

        //success! prevent calling the player again
        return player;
    } else {
        console.warn('No Vidyard player for vidyardUUId:', vidyardUUId);
        //also true, because we want stop trying to load a video that doesn't exist
        return true;
    }
};

/**
 * Look for a ?video= URL parameter  and trigger the video popup by looking for a matching link.
 * Page must have an element matching the parameter, which should be the video name run through convertToSlug
 * available in both PHP and JS abd a popup-contianer class. 
 * 
 * See Demos template for example, or: 
 * 
 * ex:
 * <section id="the-video-title" class="popup-container">
 * 
 *	<!-- vidyard video link setup -->
 * 	<a href='#' data-uuid='<?= $vidyard_video_id; ?>' onclick="launchLightbox.call(this, '<?= $vidyard_video_id; ?>'); return false;" class='popup-vidyard'></a>
 * 	<!-- or for youtube -->
 * 	<a href='https://www.youtube.com/watch?v=<?= $vidyard_video_id; ?>' class='popup-youtube'></a>
 *
 * </section>
 */


window.vidyardEmbed ? initApp(window.vidyardEmbed) : window.onVidyardAPI = function (vyApi) {
	return initApp(vyApi);
};
  
function initApp(vyApi) {
	var players = VidyardV4.players;
	
    var vidyardUUId = null;

    /**
     * If param ?form= is set to anything, the page will look for first
     * video available and launch the lightbox for it. 
     */
	var formParam = window.mx.getUrlParameter('form');
    if (formParam) {
		var embed = $('.vidyard-player-embed');
        if (embed.length) {
            vidyardUUId = embed.eq(0).attr('data-uuid');
        }
    }

    /**
     * Check the URL Parameter for a video request
     */
	var videoParam = window.mx.getUrlParameter('video');
    if (videoParam) {
        /**
         * Look for a <a> with a data-title that matches the incoming video param
         */
		var videoLink = $('a[data-title=' + videoParam + ']');
        if (videoLink.length) {
            if (videoLink.hasClass('popup-youtube')) {
                setTimeout(function() {
                    videoLink.click();
                }, 2000);
                return;
            }
            vidyardUUId = videoLink.attr('data-uuid');
        } else {	
			videoLink = $('a[data-uuid=' + videoParam + ']');
			if (videoLink.length) {
				vidyardUUId = videoParam;
			}
		}
	}
	

	if (vidyardUUId) {
		var checkVidyardReady = setInterval(function() {
			if (players.length) {
				var chapter = parseInt(window.mx.getUrlParameter('chapter')) - 1;
				var success = window.launchLightbox.call(videoLink, vidyardUUId, chapter);
				if (success) {
					clearInterval(checkVidyardReady);
				}
			}
		}, 300);
	}
};