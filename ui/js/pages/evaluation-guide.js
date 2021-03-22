evalGuideFunctions = (function($) {
    var win = $(window);
    var siteHeader = $('#siteHeader');
    var menuContainer = $('.responsive-menu');
    var siteHeaderHeight = $('#siteHeader').outerHeight();
    var sidebarTarget = $('.sidebar-menu .current-menu-item');
    var sidebarTargetAccordion = sidebarTarget.closest('ul');
    var sidebarTargetAccordionAncestor = sidebarTarget.closest('.current-menu-ancestor');
    var sidebarTargetAccordionAncestor = sidebarTargetAccordionAncestor.closest('ul');

    if ( $('#wpadminbar').length > 0) {
        var adminBarHeight = $('#wpadminbar').height();
    } else {
        var adminBarHeight = 0;
    }

    var headerHeight = adminBarHeight + siteHeaderHeight;

    $(document).ready(function () {

        // If viewport under 640px, sticky mobile nav
        checkScreenSize();

        // Open accordion to display active item
        openSidebarNav();

        $(window).on("resize", function (e) {
            checkScreenSize();
        });

        function checkScreenSize(){
            var newWindowWidth = $(window).width();
            if (newWindowWidth < 640 ) {
                 // Offset menuContainer by height of header always
                 if ( menuContainer.length > 0) {
                    menuContainer.sticky({
                        topSpacing: headerHeight,
                        zIndex: 90,
                    });
                }
            }
        }

        function openSidebarNav() {
            sidebarTargetAccordion.addClass('is-active');
            sidebarTargetAccordionAncestor.addClass('is-active');
        }

        function checkWidth() {
            var siteHeaderHeight = $('#siteHeader').outerHeight();

            if ( $('#wpadminbar').length > 0) {
                adminBarHeight = $('#wpadminbar').height();
            } else {
                adminBarHeight = 0;
            }

            var headerHeight = adminBarHeight + siteHeaderHeight;
        }

        checkWidth();
        // Bind event listener
        win.resize(checkWidth);
    });

})(jQuery);
