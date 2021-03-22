$(document).ready(function() {
    var map = document.getElementById('map-iframe');
    var zoomLevel = function() {
        var w = window.innerWidth;
        if (w < 800) {
            return 2;
        } else {
            return 3;
        }
    }();
    map.src = "https://mapsengine.google.com/map/u/0/embed?mid=1dnXLlU9b-jpfIEULMShLi7naRb4&ll=35%2C-40&z=" + zoomLevel;

    $('.map-container')
        .click(function() {
            map.addClass('clicked')
        })
        .mouseleave(function() {
            map.removeClass('clicked')
        });
});