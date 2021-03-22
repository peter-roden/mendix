/**
 * 
 */
window.mx.keyCodes = {
    escape: 27,
    enter: 13
};

/**
 * 
 */
function closeSubMenu() {
    this.classList.remove('active', 'from-left', 'from-right');
    this.style.height = 'auto';
}

/**
 * 
 */
function isMobileMenu(header) {
    if (!header) {
        header = document.querySelector('header#siteHeader');
    }
    return getComputedStyle(header)['z-index'] == 101;
}

/**
 * 
 * @param {*} event 
 */
function getEventType(event) {
    return event ? event.type : null;
}

/**
 * 
 * @param {*} event 
 */
function isDesktopEvent(event) {
    switch (getEventType(event)) {
        case 'mouseleave':
        case 'mouseenter':
            return true;
    }
}

/**
 * 
 * 
 */
window.mx.listeners = function() {
    var listeners = [];

    return {
        onUp: function(event) {
            for (var l = listeners.length - 1; l >= 0; l--) {
                if (event.keyCode == listeners[l].keyCode) {
                    listeners[l].callback.call(this, event);
                }
            }
        },
        remove: function(id) {
            for (var l = listeners.length - 1; l >= 0; l--) {
                if (id = listeners[l].id) {
                    listeners.splice(l, 1);
                }
            }
        },
        up: function(id, keyCode, callback) {

            var idActive = function() {
                for (var l = listeners.length - 1; l >= 0; l--) {
                    if (id == listeners[l].id) {
                        return true;
                    }
                }
            }();

            if (idActive) {
                return;
            }

            listeners.push({
                id: id,
                keyCode: keyCode,
                callback: callback
            });
            $(document).on('keyup', this.onUp);
        }
    };
}();

/**
 * Handle the main navigation popups and slide out for mobile
 */
document.addEventListener("DOMContentLoaded", function(event) {

    var body = document.body;
    var openSubMenuTimeout;
    var topLevelButtons = document.querySelectorAll('.navigation-top-level button');
	var header = document.querySelector('#siteHeader');
    var mobileNavigationToggle = document.querySelector('.siteHeader__toggle');
    var subMenuAll = document.querySelectorAll('.navigation-sub-menu');

    var lastButtonOrder = null;

    //add an order param to the buttons for future reference
    for (var i = 0, l = topLevelButtons.length; i < l; i++) {
        var button = topLevelButtons[i];
        button.setAttribute('order', i + 1);
        button.addEventListener('focus', function() {
            var isActive = this.classList.contains('active');
            if (isActive) {
                hideHeaderBackground();
            }
        });
    }

    function hideHeaderBackground(event) {
        //remove close background events
        header.removeEventListener('mouseleave', hideHeaderBackground);
        window.mx.listeners.remove('closeMenuOnEscape');
        mobileNavigationToggle.removeEventListener('click', hideHeaderBackground);

        if (isMobileMenu(header)) {
            for (var l = subMenuAll.length - 1; l >= 0; l--) {
                closeSubMenu.call(subMenuAll[l]);
            }

            for (var ll = topLevelButtons.length - 1; ll >= 0; ll--) {
                topLevelButtons[ll].classList.remove('active');
            }
        } else {
            closeAllSubMenus();
        }

        header.classList.remove('active');
        lastButtonOrder = null;

        //remove all closing listeners
        mobileNavigationToggle.addEventListener('click', showHeaderBackground);
    }

    function showHeaderBackground() {

        mobileNavigationToggle.removeEventListener('click', showHeaderBackground);

        if (!header.classList.contains('active')) {
            header.classList.add('active');

            //add close menu listeners
            header.addEventListener('mouseleave', hideHeaderBackground);
            window.mx.listeners.up('closeMenuOnEscape', mx.keyCodes.escape, hideHeaderBackground);
            mobileNavigationToggle.addEventListener('click', hideHeaderBackground);
        }
    }

    /**
     * 
     * @param {*} buttonToIgnore 
     */
    function closeAllSubMenus(buttonToIgnore) {
        //close other menus
        for (var l = topLevelButtons.length - 1; l >= 0; l--) {
            var el = topLevelButtons[l];
            if (el != buttonToIgnore && el.classList.contains('active')) {
                el.classList.remove('active');
                el.blur();

                var subMenu = el.nextElementSibling;
                slideToggle(subMenu);
            }
        }
    }

    function onButtonLeave(event) {
        event.target.hovering = false;
    }

    /**
     * 
     */
    function openSubMenu(event) {
        if (isMobileMenu(header) && isDesktopEvent(event)) {
            return;
        }

        var button = event.target;
        button.hovering = true;
        button.addEventListener('mouseleave', onButtonLeave);

        //remove previous open menu 
        clearTimeout(openSubMenuTimeout);

        //buffer open time so accidental hovers don't cause annoying menu flickerijg
        openSubMenuTimeout = setTimeout(function() {
            button.removeEventListener('mouseleave', onButtonLeave);
            if (event.target.hovering === false) {
                return;
            }

            var order = button.getAttribute('order');
            var subMenu = button.nextElementSibling;

            if (button.classList.contains('active')) {
                //close the submenu
                if (isMobileMenu(header)) {
                    closeAllSubMenus();
                } else {
                    hideHeaderBackground();
                }

            } else {
                closeAllSubMenus(button);
                //open the buttons submenu
                showHeaderBackground();
                button.classList.add('active');

                slideToggle(subMenu, order);

                lastButtonOrder = order;
            }

        }, (!!lastButtonOrder || event.type == 'click') ? 0 : 250);
    }

    /**
     * 
     * @param {Element} container 
     */
    function slideToggle(container, order) {
        clearTimeout(slideCloseTimeout);
        clearTimeout(slideOpenTimeout);

        var links = container.querySelectorAll('.navigation-sub-menu__item__link');
        for (var l = links.length - 1; l >= 0; l--) {
            links[l].setAttribute('tabindex', 0);
        }

        //open menu
        if (container.classList.contains('active') == false) {

            if (isMobileMenu(header)) {
                container.classList.add('active');
                var height = container.clientHeight + "px";
                container.style.height = '0px';

                //next frame
                var slideCloseTimeout = setTimeout(function() {
                    container.style.height = height;
                }, 0);
            }
            //full menu 
            else {
                if (lastButtonOrder && order) {
                    if (order > lastButtonOrder) {
                        container.classList.add('from-right');
                    } else {
                        container.classList.add('from-left');
                    }
                }
                var slideOpenTimeout = setTimeout(function() {
                    container.classList.add('active');
                }, !!lastButtonOrder ? 10 : 0);
            }

        }
        //closing 
        else {

            for (var ll = links.length - 1; ll >= 0; ll--) {
                links[ll].setAttribute('tabindex', -1);
            }

            if (isMobileMenu(header)) {
                container.style.height = '0px';
                container.addEventListener('transitionend', closeSubMenu.bind(container), {
                    once: true
                });
            } else {
                closeSubMenu.call(container);
            }
        }
    }

    mobileNavigationToggle.addEventListener('click', showHeaderBackground);

    //add listeners to open the menu
    for (var lll = topLevelButtons.length - 1; lll >= 0; lll--) {
        topLevelButtons[lll].addEventListener('click', openSubMenu);
    }

    var observer = new IntersectionObserver(function(entries, observer) {
        for (var l = entries.length - 1; l >= 0; l--) {
            var entry = entries[l];
            if (entry.intersectionRatio == observer.thresholds[0]) {
                header.classList.add(entry.target.dataset.out);
            } else {
                header.classList.remove(entry.target.dataset.out);
            }
        }
    });

    if (!window.location.pathname.includes('blog/')) {
        var headerFixedObserver = document.querySelector('.siteHeader-sticky-observer');
        var headerHeightObserver = document.querySelector('.siteHeader-height-observer');
        observer.observe(headerFixedObserver);
        observer.observe(headerHeightObserver);
    }
});