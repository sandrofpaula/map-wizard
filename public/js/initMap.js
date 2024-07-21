var map;
var infowindow;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -3.1190275, lng: -60.0217314},
        zoom: 12
    });
    infowindow = new google.maps.InfoWindow();
}

function showInfo(lat, lng, info) {
    var location = new google.maps.LatLng(lat, lng);
    infowindow.setContent(info);
    infowindow.setPosition(location);
    infowindow.open(map);
    map.setCenter(location);
    map.setZoom(15);
}
$(document).on('shown.bs.modal', '#mapModal', function () {
    google.maps.event.trigger(map, 'resize');
});
