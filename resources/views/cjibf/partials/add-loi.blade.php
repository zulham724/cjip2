@extends('master')
@section('css')
    {{--<link rel="stylesheet" href="{{asset('css/front-end/cjibf.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('css/cjibf.css')}}">--}}
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
    @include('voyager::multilingual.language-selector')
@stop
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <form action="{{route('loi-cjibf.post', [$profile->id , $peserta->id])}}" method="post">
                @csrf
                <div class="col-lg-6">
                    <div class="row">
                        <div class="card" style="width: 100%">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Company Details</h6>

                            </div>
                            <div class="col-12">
                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label for="feFirstName">Name</label>
                                        <input type="text" class="form-control" id="feFirstName" name="name"
                                               placeholder="Full Name" value="{{$profile->investor_name}}" disabled>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="companyname">Company Name</label>
                                        <input type="text" class="form-control" id="companyname" name="company_name"
                                               placeholder="Email" value="{{$profile->nama_perusahaan}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 30px;">
                        <div class="card" style="width: 100%">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Project Details</h6>
                            </div>
                            <div class="col-12">
                                    <div class="row">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    @if(is_null($peserta->project_id))
                                    <div class="row" style="padding-top: 20px">
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="project_name" placeholder="Project Name"  required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="luas_lahan" placeholder="Luas Lahan"  required>
                                        </div>
                                    </div>


                                    @if(Auth::user()->hasRole('kab'))
                                        <input type="hidden" value="{{Auth::user()->id}}" name="kab_kota_id">
                                    @endif
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="javascript:void(0)" onclick="loadthemappicker()" class="btn btn-sm btn-success"><i class="fa fa-map"></i> Pilih Lokasi</a>

                                                <input type="hidden" name="maps[lat]" value="{{ config('voyager.googlemaps.center.lat') }}" id="lat"/>
                                                <input type="hidden" name="maps[lng]" value="{{ config('voyager.googlemaps.center.lng') }}" id="lng"/>

                                            <p id="koordinat"></p>
                                            <div id="map_piker" style="height: 300px!important;"></div>
                                        </div>
                                    </div>
                                    @else
                                        <div class="row" style="padding-top: 20px">
                                            <div class="col-12">
                                                <input type="text" class="form-control" value="{{$peserta->proyeks->project_name}}" disabled>
                                            </div>
                                        </div>
                                    @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
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
                                            <input type="text" class="form-control" id="sektor" name="sektor"
                                                   placeholder="Sector"
                                                   value="{{$profile->sektors->sektor_interest}}" required>
                                        </div>

                                    </div>
                                    @if(is_null($peserta->project_id))
                                        <label for="project">Investor Tidak Memilih Proyek, Silahkan Isi Manual</label>
                                    <input type="text" value="{{$peserta->id}}" hidden >
                                    <div class="form-group col-md-12">
                                        <label for="lokasi">Location</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi"
                                               placeholder="Detail Location" required>
                                    </div>
                                    @else
                                        <div class="form-group col-md-12">
                                            <label for="project">Project</label>
                                            <input type="text" class="form-control" id="project" name="project"
                                                   value="{{$peserta->proyeks->project_name}}" disabled>
                                            <input type="text" class="form-control" id="project_id" name="project_id" value="{{$peserta->proyeks->id}}" hidden>
                                        </div>
                                    @endif

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
        </div>
    </div>
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
