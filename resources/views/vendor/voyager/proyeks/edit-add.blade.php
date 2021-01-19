@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
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

                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    @if(Auth::user()->role_id == 3)
                                        @if($row->display_name == 'Kab/Kota')
                                        @elseif($row->display_name == 'Status')
                                        @else
                                        <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                        @endif
                                    @else
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>

                                    @endif
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                    @elseif ($row->type == 'relationship')
                                        @if(Auth::user()->role_id == 3)
                                            @if($row->field == 'proyek_belongsto_user_relationship')
                                                <input type="hidden" name="kab_kota_id" id="kab_kota_id" value="{{Auth::user()->id}}">
                                            @endif
                                        @else
                                            @include('voyager::formfields.relationship', ['options' => $row->details])
                                        @endif
                                    @elseif ($row->type == 'coordinates')
                                        <a href="javascript:void(0)" onclick="loadthemappicker()" class="btn btn-sm btn-success">
                                            <i class="fa fa-map"></i>
                                            Pilih Lokasi
                                        </a>
                                        @forelse($dataTypeContent->getCoordinates() as $point)
                                            <input type="hidden" name="{{ $row->field }} ['lat]" value="{{ $point['lat'] }}" id="lat">
                                            <input type="hidden" name="{{ $row->field }} ['lng]" value="{{ $point['lng'] }}" id="lng">
                                        @empty
                                            <input type="hidden" name="{{ $row->field }} ['lat]" value="{{ config('voyager.googlemaps.center.lat') }}" id="lat">
                                            <input type="hidden" name="{{ $row->field }} ['lng]" value="{{ config('voyager.googlemaps.center.lng') }}" id="lng">
                                        @endforelse
                                        <p id="koordinat"></p>
                                        <div id="map_piker" style="height: 300px!important;"></div>
                                    @elseif ($row->field == 'latar_belakang')
                                        <textarea cols="80" id="latar_belakang" name="latar_belakang" rows="10">

                                        </textarea>
                                    @elseif ($row->field == 'eksisting')
                                        <textarea cols="80" id="eksisting" name="eksisting" rows="10">

                                        </textarea>
                                    @elseif ($row->field == 'status_kepemilikan')
                                        <textarea cols="80" id="status_kepemilikan" name="status_kepemilikan" rows="10">

                                        </textarea>
                                    @elseif ($row->field == 'lingkup_pekerjaan')
                                        <textarea cols="80" id="lingkup_pekerjaan" name="lingkup_pekerjaan" rows="10">

                                        </textarea>
                                    @elseif ($row->field == 'ketersediaan_pasar')
                                        <textarea cols="80" id="ketersediaan_pasar" name="ketersediaan_pasar" rows="10">

                                        </textarea>
                                    @elseif ($row->field == 'ketersediaan_sd')
                                        <textarea cols="80" id="ketersediaan_sd" name="ketersediaan_sd" rows="10">

                                        </textarea>
                                    @elseif ($row->field == 'skema_investasi')
                                        <textarea cols="80" id="skema_investasi" name="skema_investasi" rows="10">

                                        </textarea>
                                    @elseif ($row->field == 'desain_layout_project')
                                        <textarea cols="80" id="layout-project" name="desain_layout_project" rows="10">

                                        </textarea>
                                    @elseif($row->field == 'status')
                                        @if(Auth::user()->role_id == 3)
                                            <input type="hidden" name="status" value="0">

                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}

                                        @endif
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
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
        CKEDITOR.replace('layout-project', {
            extraPlugins: 'autogrow,pastefromword',
            autoGrow_minHeight: 200,
            autoGrow_maxHeight: 600,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsCss: [
                'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
                'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/pastefromgdocs.css'

            ],
        });
        CKEDITOR.replace('latar_belakang', {
            extraPlugins: 'autogrow,pastefromword',
            autoGrow_minHeight: 200,
            autoGrow_maxHeight: 600,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsCss: [
                'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
                'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/pastefromgdocs.css'

            ],
        });
        CKEDITOR.replace('eksisting', {
            extraPlugins: 'autogrow,pastefromword',
            autoGrow_minHeight: 200,
            autoGrow_maxHeight: 600,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsCss: [
                'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
                'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/pastefromgdocs.css'

            ],
        });
        CKEDITOR.replace('status_kepemilikan', {
            extraPlugins: 'autogrow,pastefromword',
            autoGrow_minHeight: 200,
            autoGrow_maxHeight: 600,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsCss: [
                'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
                'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/pastefromgdocs.css'

            ],
        });
        CKEDITOR.replace('lingkup_pekerjaan', {
            extraPlugins: 'autogrow,pastefromword',
            autoGrow_minHeight: 200,
            autoGrow_maxHeight: 600,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsCss: [
                'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
                'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/pastefromgdocs.css'

            ],
        });
        CKEDITOR.replace('ketersediaan_pasar', {
            extraPlugins: 'autogrow,pastefromword',
            autoGrow_minHeight: 200,
            autoGrow_maxHeight: 600,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsCss: [
                'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
                'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/pastefromgdocs.css'

            ],
        });
        CKEDITOR.replace('ketersediaan_sd', {
            extraPlugins: 'autogrow,pastefromword',
            autoGrow_minHeight: 200,
            autoGrow_maxHeight: 600,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsCss: [
                'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
                'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/pastefromgdocs.css'

            ],
        });
        CKEDITOR.replace('skema_investasi', {
            extraPlugins: 'autogrow,pastefromword',
            autoGrow_minHeight: 200,
            autoGrow_maxHeight: 600,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsCss: [
                'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
                'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/pastefromgdocs.css'

            ],
        });
    </script>
@stop
