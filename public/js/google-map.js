function init(position) {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: position.coords.latitude, lng: position.coords.longitude},
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.BOTTOM_CENTER
        },
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        scaleControl: true,
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        fullscreenControl: true
    });
}
