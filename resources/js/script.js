window.initMap = function ($lat, $long, $toilets) {
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 12, center: {lat: $lat, lng: $long}});

    // Markers
    var marker = new google.maps.Marker({position: {lat: $lat, lng: $long}, map: map, title: "You are here!"});
    for (var i=0; i<$toilets.length; i++){
        var latToilet = parseFloat($toilets[i].lat);
        var lonToilet = parseFloat($toilets[i].long);
        var marker = new google.maps.Marker({
            position: {lat: latToilet, lng: lonToilet},
            map: map,
            title: $toilets[i].name,
            icon: 'img/wc.png'
        });
    }
}



