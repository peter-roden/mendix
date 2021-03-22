document.addEventListener("DOMContentLoaded", function(event) {

    var $panelContainer = $('.panel-split-container');
    var $pointer = $('.pointer-control ');

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