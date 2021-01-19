@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                {{--{{dump($row->field . '-' . $row->type)}}--}}
                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                        @if($row->field == 'umkm_new_belongsto_kbli_relationship')
                                            <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">KBLI</legend>
                                        @elseif($row->field == 'umkm_new_belongsto_kab_kota_relationship')
                                            <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">Kab/Kota</legend>
                                        @if(Auth::user()->role_id !== 3)
                                                <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                            @endif
                                        @endif
                                @endif

                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}


                                    @if($row->field == 'umkm_new_belongsto_kbli_relationship')
                                        <label class="control-label" for="name">KBLI</label>
                                    @elseif($row->field == 'umkm_new_belongsto_kab_kota_relationship')
                                        <label class="control-label" for="name">KAB/KOTA</label>
                                        @if(Auth::user()->role_id == 3)
                                            <label class="control-label" for="name"></label>
                                        @endif
                                    @else
                                        <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @endif
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    {{--CUSTOM KBLI--}}

                                    {{--CUSTOM KBLI--}}
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                    @elseif ($row->type == 'relationship')


                                        @if($row->field == 'umkm_new_belongsto_kbli_relationship')
                                            <select class="form-control select2" name="kbli[]" multiple>
                                                @foreach($kblis as $kbli)
                                                    <option value="{{$kbli->kelompok}}">{{$kbli->kelompok}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            @if(Auth::user()->role_id !== 3)
                                            @include('voyager::formfields.relationship', ['options' => $row->details])
                                            @endif
                                        @endif


                                    @else

                                        @if($row->field == 'lat')
                                            <a href="javascript:void(0)" onclick="loadthemappicker()" class="btn btn-sm btn-success"><i class="fa fa-map"></i> Pilih Lokasi</a>

                                            @forelse($maps as $data)
                                                <input type="hidden" name="{{ $row->field }}[lat]" value="{{ $data->lat }}" id="lat"/>
                                                <input type="hidden" name="{{ $row->field }}[lng]" value="{{ $data->lng }}" id="lng"/>
                                            @empty
                                                <input type="hidden" name="{{ $row->field }}[lat]" value="{{ config('voyager.googlemaps.center.lat') }}" id="lat"/>
                                                <input type="hidden" name="{{ $row->field }}[lng]" value="{{ config('voyager.googlemaps.center.lng') }}" id="lng"/>
                                            @endforelse
                                            <p id="koordinat"></p>
                                            <div id="map_piker" style="height: 300px!important;"></div>
                                        @elseif($row->field == 'investasi')
                                            @php
                                                $investasis = json_decode($dataTypeContent->investasi, true);
                                                //dd($investasis);
                                            @endphp

                                            @isset($investasis)

                                                @if($edit)
                                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">Investasi</legend>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <input type="number" name="investasi" class="form-control col-md-12" value="{{$investasis['nilai_investasi']['nilai_investasi']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <input type="year" name="investasi" class="form-control col-md-12" value="{{$investasis['nilai_investasi']['tahun']}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">Tambahan Investasi</legend>

                                                    <div id="tambahans_list">
                                                        @for($i=0;$i<count($investasis['tambahan']);$i++)

                                                            <div class="row" id="proyekTambahanAdd">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <input placeholder="Jenis Tambahan" name="tambahans[jenis][]" id="jenisTambahan" value="{{$investasis['tambahan'][$i]['jenis']}}" class="form-control col-md-12"
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <input placeholder="Nilai Tambahan Investasi" name="tambahans[nilai_tambahan][]" id="nilaiTambahan" value="{{$investasis['tambahan'][$i]['nilai_tambahan']}}" class="form-control col-md-12"
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <input type="month" class="form-control" name="tambahans[tahun][]"
                                                                               value="

                                                                               {{ \Carbon\Carbon::parse($investasis['tambahan'][$i]['tahun'].'-'.\Carbon\Carbon::now()->format('m'))->format('Y-m') }}

                                                                               {{--@if(isset($dataTypeContent->{$row->field})){{ \Carbon\Carbon::parse(old($row->field, $dataTypeContent->{$row->field}))->format('Y-m-d') }}@else{{old($row->field)}}@endif--}}
                                                                                   ">

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endfor


                                                    <div class="col-lg-12">
                                                        <div class="ui-tooltip">
                                                            <button type='button' class="btn btn-danger btn-circle float-right"
                                                                    data-toggle="tooltip" data-placement="bottom" title="Hapus Tambahan Investasi"
                                                                    id='removeTambahan'>
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type='button' class="btn btn-info btn-circle float-left" id='addTambahan'
                                                                    data-toggle="tooltip" data-placement="bottom" title="Tambah Tambahan Investasi">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endif
                                            @endisset

                                            @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}

                                        @endif

                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach

                            {{--{{die()}}--}}
                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

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
                $('<input id="pac-input" class="controls" type="text"  placeholder="Search Box">').insertAfter('#koordinat');
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
                    //console.log(place)
                    var place_lat = place.geometry.location.lat();
                    var place_lng = place.geometry.location.lng();
                    // if (!place.geometry) {
                    //   // User entered the name of a Place that was not suggested and
                    //   // pressed the Enter key, or the Place Details request failed.
                    //   window.alert("No details available for input: '" + place.name + "'");
                    //   return;
                    // }
                    $('<input id="alamat" name="alamat" class="form-control" type="text" hidden value="'+ place.formatted_address +'" placeholder="Search Box">').insertAfter('#koordinat');
                    $('<input id="kecamatan" name="kecamatan" class="form-control" type="text" hidden value="'+ place.address_components[2].long_name+'" placeholder="Search Box">').insertAfter('#alamat');
                    $('<input id="kelurahan"  name="kelurahan" class="form-control" type="text" hidden value="'+ place.address_components[1].long_name+'" placeholder="Search Box">').insertAfter('#kecamatan');
                    $('<input id="negara" name="negara" class="form-control" type="text" hidden value="'+ place.address_components[5].long_name+'" placeholder="Search Box">').insertAfter('#negara');
                    $('<input id="lat2"  name="lt" class="form-control" type="text" hidden value="'+ place_lat+'" placeholder="Search Box">').insertAfter('#koordinat');
                    $('<input id="lng2" name="lg" class="form-control" type="text" hidden value="'+ place_lng+'" placeholder="Search Box">').insertAfter('#koordinat');
                    // If the place has a geometry, then present it on a map.
                    console.log(place_lat)
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(20);  // Why 17? Because it looks good.
                    }

                    //console.log(place_lat+','+place_lng);
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
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        document.getElementById('addTambahan').onclick = function createInputField() {

            var tambahRow = document.getElementById('tambahans_list');
            tambahRow.insertAdjacentHTML('beforebegin',
                '<div class="row" id="proyekTambahanAdd">\n' +
                '               <div class="col-4">\n' +
                '               <div class="form-group" id="jenis">\n' +
                '                   <input placeholder="Jenis Tambahan" name="tambahans[jenis][]" id="jenisTambahan" class="form-control col-md-12"\n' + '                                                                    >\n' +
                '               </div>\n' +
                '               </div>\n' +
                '               <div class="col-4">\n' +
                '                  <div class="form-group" id="nilai">\n' +
                '                      <input placeholder="Nilai Tambahan Investasi" name="tambahans[nilai][]" id="nilaiTambahan" value="" class="form-control col-md-12"\n' +
                '                      >\n' +
                '                  </div>\n' +
                '                </div>\n' +
                '                <div class="col-4">\n' +
                '                   <div class="form-group" id="time">\n' +
                '                      <input type="month" name="tambahans[time][]" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m')}}">\n' +
                '                   </div>\n' +
                '                 </div>\n' +
                '                 </div>')

            //console.log(tambahRow);
        }

        document.getElementById('removeTambahan').onclick = function removeInputField() {

            var x = document.getElementById('proyekTambahanAdd');

            x.parentNode.removeChild(x);

        }
    </script>
@stop
