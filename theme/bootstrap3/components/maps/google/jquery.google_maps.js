
if (typeof googleMapsStyles === 'undefined') {
    var googleMapsStyles = null;
}

/**
 * Each map requires to have the following data-attributes: lat, lon, zoom, marker
 */

function googleMapsInit() {
    $('[data-google-map=true]').each(function() {

        var mapOptions = {
            zoom: $(this).data('zoom') || 6,
            center: new google.maps.LatLng($(this).data('lat'), $(this).data('lon')),
            styles: googleMapsStyles,
            scrollwheel: $(this).data("scroll-wheel"),
            navigationControl: $(this).data("navigation-control"),
            scaleControl: $(this).data("scale-control"),
            draggable: $(this).data("draggable"),
            mapTypeControl: $(this).data("map-type-control")
        };

        var mapElement = document.getElementById($(this).attr('id'));
        var map = new google.maps.Map(mapElement, mapOptions);

        if($(this).data('marker')) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng($(this).data('lat'), $(this).data('lon')),
                map: map
            });
        }
    });
}

$(function() {
    google.maps.event.addDomListener(window, 'load', googleMapsInit);
});