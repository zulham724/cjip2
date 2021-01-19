@extends('master')

@section('css')
    {{--<link rel="stylesheet" href="{{asset('css/front-end/cjibf.css')}}">
    <link rel="stylesheet" href="{{asset('css/cjibf.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('css/front-end/main.css')}}" id="main_style">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,800" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('css/front-end/main.css')}}" id="main_style">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,800" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{asset('sass')}}">--}}
@endsection
@section('page_header')
    <h1 class="page-title">
        {{ 'Input Rencana Realisasi' }}
    </h1>
@stop
@section('content')
    <form action="{{route('loi-cjibf.manual')}}" method="post">
        @csrf
    <div class="col-lg-6 ">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">Company Details</h6>
            </div>


            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">
                            <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="feFirstName">Name</label>
                                        <input type="text" class="form-control" id="feFirstName" name="investor_name"
                                               placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position" name="jabatan"
                                               placeholder="Position" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Phone"  >
                                    </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="companyname">Company Name</label>
                                    <input type="text" class="form-control" id="companyname" name="nama_perusahaan"
                                           placeholder="Company Name Without PT" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="badan_hukum">Corporation</label>
                                    <input type="text" class="form-control" id="badan_hukum" name="badan_hukum" required
                                    >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="bidang_usaha">Business Field</label>
                                    <input type="text" class="form-control" id="bidang_usaha"
                                           name="bidang_usaha"  required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="feInputAddress">Address</label>
                                <input type="text" class="form-control" id="feInputAddress" name="alamat"
                                       placeholder="Jl. Example" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country"
                                           required>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
        <div class="col-lg-6">

                <div class="card">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Project</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row" style="padding-top: 20px">
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="project_name" placeholder="Project Name" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="luas_lahan" placeholder="Luas Lahan" required>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <a href="javascript:void(0)" onclick="loadthemappicker()" class="btn btn-sm btn-success"><i class="fa fa-map"></i> Pilih Lokasi</a>

                                            <input type="hidden" name="maps[lat]" value="{{ config('voyager.googlemaps.center.lat') }}" id="lat"/>
                                            <input type="hidden" name="maps[lng]" value="{{ config('voyager.googlemaps.center.lng') }}" id="lng"/>

                                            <p id="koordinat"></p>
                                            <div id="map_piker" style="height: 250px!important;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>



        </div>
    <div class="col-lg-12" style="padding-top: 20px">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">LoI</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col-12">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="sektor">Sector</label>
                                    <select id="why" name="why" class="form-control" required>
                                        <option selected>Select Sector You Interesred in</option>
                                        @foreach($sektors as $sektor)
                                            <option value="{{$sektor->name}}">{{$sektor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="lokasi">Location</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                                           placeholder="Detail Location" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inv">Investment Value</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <select id="alarm_action" class="form-control" required>
                                                <option selected>Choose...</option>
                                                <option value='rupiah'>Rupiah</option>
                                                <option value='dollar'>US Dollar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input class="form-control" name="rp" placeholder="Rupiah" id="rp"
                                           style="display: none"/>
                                    <input class="form-control" name="usd" id="usd" placeholder="USD"
                                           style="display: none"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Invest Now !!!</button>

                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>
    </form>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{asset('js/map/app.js')}}"></script>
    <script type="text/javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(setPosition);
            } else {
                console.log('none');
            }
        }

        function setPosition(position) {
            window.my_latitude = position.coords.latitude;
            window.my_longitude = position.coords.longitude;
        }

        getLocation();
        function ubahkoor() {
            var lat 	= $('#koordinat_lokasi_lat').val();
            var long 	= $('#koordinat_lokasi_long').val();
            var koor 	= lat+','+long;

            $('#koordinat_lokasi').val(koor);
        }
        function loadthemappicker(lt, lg) {
            if (lt==null) {
                lt = -6.983306;
            };
            if (lg==null) {
                lg = 110.407650;
            };

            if ($('#pac-input').length<=0) {
                $('<input id="pac-input" class="controls" type="text" placeholder="Search Box">').insertAfter('#koordinat');
            }
            loadScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp;sensor=false&libraries=places",function(){
                function updateMarkerPosition(latLng) {
                    var lat = [latLng.lat()];
                    var lng = [latLng.lng()];
                    $("#lat").val(lat);
                    $("#lng").val(lng);
                    $("#koordinat").html(lat+','+lng);
                }

                var map = new google.maps.Map(document.getElementById('map_piker'), {
                    zoom: 12,
                    center: new google.maps.LatLng(lt, lg),
                    // mapTypeId: google.maps.MapTypeId.ROADMAP
                    mapTypeId: 'satellite'
                });

                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.Autocomplete(input);
                //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                /*map.addListener('bounds_changed', function() {
                  searchBox.setBounds(map.getBounds());
                });*/
                searchBox.bindTo('bounds', map);


                var latLng = new google.maps.LatLng(lt, lg);
                var marker = new google.maps.Marker({
                    position : latLng,
                    title : 'Pilih Lokasi',
                    map : map,
                    draggable : true
                });

                searchBox.addListener('place_changed', function() {
                    var place = window.placenya = searchBox.getPlace();
                    var place_nama = place.name;
                    var place_lat = place.geometry.location.lat();
                    var place_lng = place.geometry.location.lng();
                    // if (!place.geometry) {
                    //   // User entered the name of a Place that was not suggested and
                    //   // pressed the Enter key, or the Place Details request failed.
                    //   window.alert("No details available for input: '" + place.name + "'");
                    //   return;
                    // }

                    // If the place has a geometry, then present it on a map.
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(20);  // Why 17? Because it looks good.
                    }

                    console.log(place_lat+','+place_lng);
                    var default_location = new google.maps.LatLng(Number(place_lat),Number(place_lng));
                    var latLng = default_location;
                    updateMarkerPosition(latLng);
                    marker.setPosition(place.geometry.location);
                    //map.fitBounds(bounds);
                });

                updateMarkerPosition(latLng);
                google.maps.event.addListener(marker, 'drag', function() {
                    updateMarkerPosition(marker.getPosition());
                });
            });
            $('#modallokasi').modal('show')

        }
    </script>
    <script>

        var alarmInput = $('#alarm_action');
        alarmInput.on('change', function () {
            var rp = $('#rp');
            var usd = $('#usd');
            //this == alarmInput within this change handler
            switch ($(this).val()) {
                case 'rupiah':
                    rp.show();
                    usd.hide();
                    break;
                case 'dollar':
                    rp.hide();
                    usd.show();
                    break;
            }
        });
    </script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('#rp').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ".",
            digits: 3,
            autoGroup: true,
            /* prefix: 'Rp. ',*/ //Space after $, this will not truncate the first character.
            rightAlign: false,
            oncleared: function () {
                self.Value('');
            }
        });
    </script>
    <script>
        $('#usd').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ".",
            digits: 3,
            autoGroup: true,
            /* prefix: 'Rp. ',*/ //Space after $, this will not truncate the first character.
            rightAlign: false,
            oncleared: function () {
                self.Value('');
            }
        });
    </script>
@endsection
{{--@section('javascript')
    <script>
        console.log('lkalksldkoaksdokos');
        /*var alarmInput = $('#alarm_action');
        alarmInput.on('change', function () {
            var rp = $('#rp');
            var usd = $('#usd');
            //this == alarmInput within this change handler
            switch ($(this).val()) {
                case 'rupiah':
                    rp.show();
                    usd.hide();
                    break;
                case 'dollar':
                    rp.hide();
                    usd.show();
                    break;
            }
        });*/
    </script>
    <script>

        var alarmInput = $('#alarm_action');
        alarmInput.on('change', function () {
            var rp = $('#rp');
            var usd = $('#usd');
            //this == alarmInput within this change handler
            switch ($(this).val()) {
                case 'rupiah':
                    rp.show();
                    usd.hide();
                    break;
                case 'dollar':
                    rp.hide();
                    usd.show();
                    break;
            }
        });
    </script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('#rp').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ".",
            digits: 3,
            autoGroup: true,
            /* prefix: 'Rp. ',*/ //Space after $, this will not truncate the first character.
            rightAlign: false,
            oncleared: function () {
                self.Value('');
            }
        });
    </script>
    <script>
        $('#usd').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ".",
            digits: 3,
            autoGroup: true,
            /* prefix: 'Rp. ',*/ //Space after $, this will not truncate the first character.
            rightAlign: false,
            oncleared: function () {
                self.Value('');
            }
        });
    </script>

@endsection--}}
