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
}