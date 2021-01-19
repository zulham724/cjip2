<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @yield('title')
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('sass')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('sass')}}">


    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/search.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">

    <style>
        #map {
            height: 100%;
        }
    </style>

    <style>
        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }


        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    {{--@yield('css')--}}
</head>
<body>

{{--NAVBAR--}}
<nav id="colorlib-main-nav" role="navigation">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
    <div class="js-fullheight colorlib-table">
        <div class="colorlib-table-cell js-fullheight">
            <div class="row d-flex justify-content-end">
                <div class="col-md-12 px-5">
                    <ul class="mb-5">
                        @yield('menu')
                        <li class="active"><a href="index.html"><span>Home</span></a></li>
                        <li><a href="fashion.html"><span>Fashion</span></a></li>
                        <li><a href="model.html"><span>Model</span></a></li>
                        <li><a href="travel.html"><span>Travel</span></a></li>
                        <li><a href="about.html"><span>About us</span></a></li>
                        <li><a href="contact.html"><span>Contact</span></a></li>
                    </ul>
                </div>
                <div class="col px-5 copyright">
                   {{-- @yield('footer-menu')--}}
                    <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved <br> | This template is made with <i class="icon-heart"
                                                                                 aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a></p>
                </div>
            </div>
        </div>
    </div>
</nav>
{{--NAVBAR--}}


<div id="colorlib-page">

    {{--@yield('content')--}}
    {{--HEADER--}}
    <header>
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="colorlib-navbar-brand">
                        <a class="colorlib-logo" href="{{ url()->previous() }}">
                            <img src="{{asset('images/Jawa-Tengah.png')}}" alt="" style="width: 30%; height: auto">
                            <i class="icon ion-arrow-left-a" style="margin-top: 20%">BACK</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{--HEADER--}}


    <section class="ftco-fixed clearfix">
        <div class="image js-fullheight">
            <div id="map">

            </div>
        </div>
        <!-- end: page-container-->
    </section>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00"/>
        </svg>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('js/scrollax.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/jquery.timepicker.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{asset('js/google-map.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/choices.js')}}"></script>

<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.
    var map, infoWindow;
    var pos = {!! json_encode($ki->getCoordinates(), JSON_HEX_TAG) !!};
    var nama_lokasi = {!! json_encode($ki->location, JSON_HEX_TAG) !!};
    console.log(pos[0]);
    console.log(nama_lokasi);
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{$mapsKey}}&callback=initMap"></script>
<script>
    $(function () {
        $("#accordion").accordion();
    });
</script>
<script>
    $(document).ready(function() {
        //The Click the function
        $(".list .header").click(function() {
            var arrow = $(this).find("i");
            var list = $(this).parent();
            var body = list.find("ul");
            if (list.hasClass("open")) {
                //Close
                list.removeClass("open");
                arrow.css({'transform': 'rotate(-90deg)'});
                body.hide();
            } else {
                //Open
                list.addClass("open");
                arrow.css({'transform': 'rotate(0deg)'});
                body.show();
            }
        });

        //Initial Setting
        $(".list").each(function(index) {
            if ($(this).hasClass("open")) {
                $(this).find("ul").show();
                var arrow = $(this).find("i");
                arrow.css({'transform': 'rotate(0deg)'});
            } else {
                $(this).find("ul").hide();
                var arrow = $(this).find("i");
                arrow.css({'transform': 'rotate(-90deg)'});
            }
        });
    });
</script>

</body>
</html>
