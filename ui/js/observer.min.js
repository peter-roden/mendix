window.mx.startObserver = function(observer, query) {
	var items = document.querySelectorAll(query);
	if (items && items.length) {
		for (var l = items.length - 1; l >= 0; l--) {
			observer.observe(items[l]);
		}
	} else {
		// console.warn('no items for search ', query);
	}
};

(function() {
    function removeLazyData(el) {
        //lazy load a background-image
        el.classList.add('from-opacity-0');

        var dataBG = el.getAttribute('data-bg');
        if (dataBG) {
            el.style.backgroundImage = "url(" + dataBG + ")";
            el.removeAttribute('data-bg');
        }

        //lazy load a srcset image
        var dataSrcset = el.getAttribute('data-srcset');
        if (dataSrcset) {
            el.setAttribute('srcset', dataSrcset);
            el.removeAttribute('data-srcset');
        }

        //swap data-src to regular src tags
        var dataSrc = el.getAttribute('data-src');
        if (dataSrc) {
            el.setAttribute('src', dataSrc);
            el.removeAttribute('data-src');
        }

        el.classList.remove('from-opacity-0');

        //check if item is a video and lazy load that
        if (el.tagName == 'SOURCE') {
            var video = el.parentNode;
			//wait for the video to load before playing
			video.addEventListener('loadeddata', video.play, false);
			video.load();
        }
    }

    var repeatObserver = new IntersectionObserver(function(entries, observer) {
        for (var l = entries.length - 1; l >= 0; l--) {
            var entry = entries[l];
            if (entry.intersectionRatio >= 1) {
                entry.target.classList.add('active');
            } else if (entry.intersectionRatio <= 0) {
                entry.target.classList.remove('active');
            }
        }
    }, {
        threshold: [0, 1],
    });

    var singleFireObserve = new IntersectionObserver(function(entries, observer) {
        for (var l = entries.length - 1; l >= 0; l--) {
            var entry = entries[l];
            if (entry.intersectionRatio > 0) {
                singleFireObserve.unobserve(entry.target);

                entry.target.classList.add('active');
                removeLazyData(entry.target);

                //look for any children items to lazy load
                var lazyChildren = entry.target.querySelectorAll('[data-src],[data-bg]');
                for (var lc = lazyChildren.length - 1; lc >= 0; lc--) {
                    removeLazyData(lazyChildren[lc]);
                }
            }
        }
	});
	
    window.mx.startObserver(repeatObserver, '.observe');
    window.mx.startObserver(singleFireObserve, '.observe-once, .lazy');
}());