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