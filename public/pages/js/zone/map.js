function show_map(zone_id) {
  // show zones

}

function initMap(coordinates) {

    var map;

    var mapOptions = {

        center: new google.maps.LatLng(-0.963279, 33.924462),

        mapTypeId: google.maps.MapTypeId.ROADMAP

    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
    monitorMapCall(window.location.href);
    var zonePath;
    var zoneCoordinates = [];

    var bounds = new google.maps.LatLngBounds();

    var lastlatlng;

    $.each(coordinates, function (index, coordinate) {

        index == 0 && (lastlatlng = new google.maps.LatLng(coordinate.lat, coordinate.lng));

        var latLng = new google.maps.LatLng(coordinate.lat, coordinate.lng);

        zoneCoordinates.push(latLng), bounds.extend(latLng);

    }),
        zoneCoordinates.push(lastlatlng), bounds.extend(lastlatlng),

        zonePath = new google.maps.Polygon({
            path: zoneCoordinates,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35
        }),
        map.fitBounds(bounds),
        zonePath.setMap(map);

}
