@extends('front-end.master.front-end')


@section('content')

            <div id="peta" style="height: 100%; max-height: 720px"></div>

@endsection

@section('js')
    <script src="{{asset('js/google-map.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/choices.js')}}"></script>
    <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.
        var map, infoWindow;
        var pos = {!! json_encode($wisata->getCoordinates(), JSON_HEX_TAG) !!};
        var nama_lokasi = {!! json_encode($wisata->nama_wisata, JSON_HEX_TAG) !!};
        console.log(pos[0]);
        console.log(nama_lokasi);
        function initMap() {
            map = new google.maps.Map(document.getElementById('peta'), {
                center: pos[0],
                zoom: 17,
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
                fullscreenControl: true,
                fullscreenControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                }
            });
            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {

                    infoWindow.setPosition(pos[0]);
                    infoWindow.setContent(nama_lokasi);
                    infoWindow.open(map);
                    map.setCenter(pos[0]);
                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{$mapsKey}}&callback=initMap">
    </script>
@endsection

