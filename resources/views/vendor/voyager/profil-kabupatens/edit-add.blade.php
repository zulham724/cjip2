@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <style>
        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.428571429;
        }
    </style>
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


                        @if(Auth::user()->hasRole('kab'))
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
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add')])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @elseif($row->display_name == "Infrasturktur Pendukung")
                                        @php
                                            $infrasturkturs = json_decode($dataTypeContent->infrasturktur, true);
                                        //dd($infrasturkturs);
                                        @endphp
                                        @if(is_null($infrasturkturs['infrastruktur'][0]))
                                            <div id="input-player-list">
                                                <div class="form-group">
                                                    <input placeholder="Infrastruktur Pendukung" name="infrastruktur[]" id="infrasturktur" class="form-control col-md-12"
                                                    >
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui-tooltip">
                                                        <button type='button' class="btn btn-danger btn-circle float-right"
                                                                data-toggle="tooltip" data-placement="bottom" title="Hapus Infrasturktur"
                                                                id='removePlayer'>
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <button type='button' class="btn btn-info btn-circle float-left" id='addPlayer'
                                                                data-toggle="tooltip" data-placement="bottom" title="Tambah Infrasturktur">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div id="input-player-list">


                                                @isset($infrastrukturs)
                                                @foreach($infrasturkturs as $infrastruktur)
                                                    @for($i=0;$i<count($infrastruktur);$i++)
                                                        <div class="form-group">
                                                            <input placeholder="Infrastruktur Pendukung" name="infrastruktur[]" id="infrastruktur" value="{{$infrastruktur[$i]}}" class="form-control col-md-12"
                                                            >
                                                        </div>
                                                    @endfor

                                                @endforeach

                                                @endisset

                                                <div class="col-lg-12">
                                                    <div class="ui-tooltip">
                                                        <button type='button' class="btn btn-danger btn-circle float-right"
                                                                data-toggle="tooltip" data-placement="bottom" title="Hapus Infrastruktur"
                                                                id='removePlayer'>
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <button type='button' class="btn btn-info btn-circle float-left" id='addPlayer'
                                                                data-toggle="tooltip" data-placement="bottom" title="Tambah Infrastruktur">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @elseif($row->field == 'proyek_kerjasama')
                                        @php
                                            $proyek_kerjasamas = json_decode($dataTypeContent->proyek_kerjasama, true);
                                            //dd($proyek_kerjasamas);
                                        @endphp

                                        @isset($proyek_kerjasamas)
                                            <div id="proyek_kerjasama_list">
                                                @foreach((array)$proyek_kerjasamas as $proyek_kerjasama)

                                                    @for($i=0;$i<count($proyek_kerjasama['nama_proyek']);$i++)
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <input placeholder="Nama Proyek Kerjasama" name="proyek_kerjasamas[nama_proyek][]" id="proyek_kerjasamaNama" value="{{$proyek_kerjasama['nama_proyek'][$i]}}" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <input placeholder="Skema Investasi Proyek Kerjasama" name="proyek_kerjasamas[skema_investasi][]" id="proyek_kerjasamaSkema" value="{{$proyek_kerjasama['skema_investasi'][$i]}}" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <input type="number" placeholder="Nilai Investasi Proyek Kerjasama" name="proyek_kerjasamas[nilai_investasi][]" id="proyek_kerjasamaNilai" value="{{$proyek_kerjasama['nilai_investasi'][$i]}}" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endfor

                                                @endforeach

                                                <div class="col-lg-12">
                                                    <div class="ui-tooltip">
                                                        <button type='button' class="btn btn-danger btn-circle float-right"
                                                                data-toggle="tooltip" data-placement="bottom" title="Hapus Kerjasama"
                                                                id='removeKerjasama'>
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <button type='button' class="btn btn-info btn-circle float-left" id='addKerjasama'
                                                                data-toggle="tooltip" data-placement="bottom" title="Tambah Kerjasama">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div id="proyek_kerjasama_list">
                                                <div class="row" id="proyekKerjasama">
                                                    <div class="col-4">
                                                        <div class="form-group" id="nama">
                                                            <input placeholder="Nama Proyek Kerjasama" name="proyek_kerjasamas[nama_proyek][]" id="proyek_kerjasamaNama" class="form-control col-md-12"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group" id="skema">
                                                            <input placeholder="Skema Investasi Proyek Kerjasama" name="proyek_kerjasamas[skema_investasi][]" id="proyek_kerjasamaSkema" class="form-control col-md-12"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group" id="nilai">
                                                            <input type="number" placeholder="Nilai Investasi Proyek Kerjasama" name="proyek_kerjasamas[nilai_investasi][]" id="proyek_kerjasamaNilai" class="form-control col-md-12"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui-tooltip">
                                                        <button type='button' class="btn btn-danger btn-circle float-right"
                                                                data-toggle="tooltip" data-placement="bottom" title="Hapus Kerjasama"
                                                                id='removeKerjasama'>
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <button type='button' class="btn btn-info btn-circle float-left" id='addKerjasama'
                                                                data-toggle="tooltip" data-placement="bottom" title="Tambah Kerjasama">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endisset

                                    @elseif($row->field == 'proyek_investasi')
                                        @php
                                            $proyek_investasis = json_decode($dataTypeContent->proyek_investasi, true);
                                        //dd($proyek_investasis);
                                        @endphp
                                        @isset($proyek_investasis)
                                            <div id="proyek_investasi_list">
                                                @foreach((array)$proyek_investasis as $proyek_investasi)
                                                    @for($i=0;$i<count($proyek_investasi['nama_proyek']);$i++)
                                                        <div class="row" id="proyekInvestasi">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <input placeholder="Nama Proyek Investasi" name="proyek_investasis[nama_proyek][]" id="proyek_investasiNama" value="{{$proyek_investasi['nama_proyek'][$i]}}" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <input placeholder="Skema Investasi Proyek Investasi" name="proyek_investasis[nama_perusahaan][]" id="proyek_investasiSkema" value="{{$proyek_investasi['nama_perusahaan'][$i]}}" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <input type="number" placeholder="Nilai Investasi Proyek Investasi" name="proyek_investasis[nilai_investasi][]" id="proyek_investasiNilai" value="{{$proyek_investasi['nilai_investasi'][$i]}}" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endfor

                                                @endforeach

                                                <div class="col-lg-12">
                                                    <div class="ui-tooltip">
                                                        <button type='button' class="btn btn-danger btn-circle float-right"
                                                                data-toggle="tooltip" data-placement="bottom" title="Hapus Proyek Investasi"
                                                                id='removeInvestasi'>
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <button type='button' class="btn btn-info btn-circle float-left" id='addInvestasi'
                                                                data-toggle="tooltip" data-placement="bottom" title="Tambah Proyek Investasi">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div id="proyek_investasi_list">
                                                <div class="row" id="proyekInvestasi">
                                                    <div class="col-4">
                                                        <div class="form-group" id="nama">
                                                            <input placeholder="Nama Proyek/ Bidang Usaha" name="proyek_investasis[nama_proyek][]" id="proyek_investasiNama" class="form-control col-md-12"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group" id="skema">
                                                            <input placeholder="Nama Perusahaan" name="proyek_investasis[nama_perusahaan][]" id="proyek_investasiPerusahaan" class="form-control col-md-12"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group" id="nilai">
                                                            <input type="number" placeholder="Nilai Investasi Proyek Investasi" name="proyek_investasis[nilai_investasi][]" id="proyek_investasiNilai" class="form-control col-md-12"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui-tooltip">
                                                        <button type='button' class="btn btn-danger btn-circle float-right"
                                                                data-toggle="tooltip" data-placement="bottom" title="Hapus Proyek Investasi"
                                                                id='removeInvestasi'>
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <button type='button' class="btn btn-info btn-circle float-left" id='addInvestasi'
                                                                data-toggle="tooltip" data-placement="bottom" title="Tambah Proyek Investasi">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endisset
                                    @elseif ($row->field == 'kab_kota_id')
                                        <input type="hidden" value="{{Auth::user()->id}}" name="kab_kota_id">
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
                        @else
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
                                            <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                            @if (isset($row->details->view))
                                                @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add')])
                                            @elseif ($row->type == 'relationship')
                                                @include('voyager::formfields.relationship', ['options' => $row->details])
                                            @elseif($row->display_name == "Infrasturktur Pendukung")
                                                @php
                                                    $infrasturkturs = json_decode($dataTypeContent->infrasturktur, true);
                                                //dd(isset($infrasturkturs));
                                                @endphp
                                            @isset($infrasturkturs)
                                                    <div id="input-player-list">
                                                        @foreach($infrasturkturs as $infrastruktur)
                                                            @for($i=0;$i<count($infrastruktur);$i++)
                                                                <div class="form-group">
                                                                    <input placeholder="Infrastruktur Pendukung" name="infrastruktur[]" id="infrastruktur" value="{{$infrastruktur[$i]}}" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            @endfor

                                                        @endforeach

                                                        <div class="col-lg-12">
                                                            <div class="ui-tooltip">
                                                                <button type='button' class="btn btn-danger btn-circle float-right"
                                                                        data-toggle="tooltip" data-placement="bottom" title="Hapus Infrastruktur"
                                                                        id='removePlayer'>
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button type='button' class="btn btn-info btn-circle float-left" id='addPlayer'
                                                                        data-toggle="tooltip" data-placement="bottom" title="Tambah Infrastruktur">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                            <div id="input-player-list">
                                                                <div class="form-group">
                                                                    <input placeholder="Infrastruktur Pendukung" name="infrastruktur[]" id="infrasturktur" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="ui-tooltip">
                                                                        <button type='button' class="btn btn-danger btn-circle float-right"
                                                                                data-toggle="tooltip" data-placement="bottom" title="Hapus Infrasturktur"
                                                                                id='removePlayer'>
                                                                            <i class="fa fa-minus"></i>
                                                                        </button>
                                                                        <button type='button' class="btn btn-info btn-circle float-left" id='addPlayer'
                                                                                data-toggle="tooltip" data-placement="bottom" title="Tambah Infrasturktur">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            @endisset


                                            @elseif($row->field == 'proyek_kerjasama')
                                                @php
                                                    $proyek_kerjasamas = json_decode($dataTypeContent->proyek_kerjasama, true);
                                                    //dd($proyek_kerjasamas);
                                                @endphp

                                                @isset($proyek_kerjasamas)
                                                    <div id="proyek_kerjasama_list">
                                                        @foreach((array)$proyek_kerjasamas as $proyek_kerjasama)

                                                            @for($i=0;$i<count($proyek_kerjasama['nama_proyek']);$i++)
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <input placeholder="Nama Proyek Kerjasama" name="proyek_kerjasamas[nama_proyek][]" id="proyek_kerjasamaNama" value="{{$proyek_kerjasama['nama_proyek'][$i]}}" class="form-control col-md-12"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <input placeholder="Skema Investasi Proyek Kerjasama" name="proyek_kerjasamas[skema_investasi][]" id="proyek_kerjasamaSkema" value="{{$proyek_kerjasama['skema_investasi'][$i]}}" class="form-control col-md-12"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <input type="number" placeholder="Nilai Investasi Proyek Kerjasama" name="proyek_kerjasamas[nilai_investasi][]" id="proyek_kerjasamaNilai" value="{{$proyek_kerjasama['nilai_investasi'][$i]}}" class="form-control col-md-12"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endfor

                                                        @endforeach

                                                        <div class="col-lg-12">
                                                            <div class="ui-tooltip">
                                                                <button type='button' class="btn btn-danger btn-circle float-right"
                                                                        data-toggle="tooltip" data-placement="bottom" title="Hapus Kerjasama"
                                                                        id='removeKerjasama'>
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button type='button' class="btn btn-info btn-circle float-left" id='addKerjasama'
                                                                        data-toggle="tooltip" data-placement="bottom" title="Tambah Kerjasama">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div id="proyek_kerjasama_list">
                                                        <div class="row" id="proyekKerjasama">
                                                            <div class="col-4">
                                                                <div class="form-group" id="nama">
                                                                    <input placeholder="Nama Proyek Kerjasama" name="proyek_kerjasamas[nama_proyek][]" id="proyek_kerjasamaNama" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group" id="skema">
                                                                    <input placeholder="Skema Investasi Proyek Kerjasama" name="proyek_kerjasamas[skema_investasi][]" id="proyek_kerjasamaSkema" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group" id="nilai">
                                                                    <input type="number" placeholder="Nilai Investasi Proyek Kerjasama" name="proyek_kerjasamas[nilai_investasi][]" id="proyek_kerjasamaNilai" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui-tooltip">
                                                                <button type='button' class="btn btn-danger btn-circle float-right"
                                                                        data-toggle="tooltip" data-placement="bottom" title="Hapus Kerjasama"
                                                                        id='removeKerjasama'>
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button type='button' class="btn btn-info btn-circle float-left" id='addKerjasama'
                                                                        data-toggle="tooltip" data-placement="bottom" title="Tambah Kerjasama">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endisset

                                            @elseif($row->field == 'proyek_investasi')
                                                @php
                                                    $proyek_investasis = json_decode($dataTypeContent->proyek_investasi, true);
                                                //dd($proyek_investasis);
                                                @endphp
                                                @isset($proyek_investasis)
                                                    <div id="proyek_investasi_list">
                                                        @foreach((array)$proyek_investasis as $proyek_investasi)
                                                            @for($i=0;$i<count($proyek_investasi['nama_proyek']);$i++)
                                                                <div class="row" id="proyekInvestasi">
                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <input placeholder="Nama Proyek Investasi" name="proyek_investasis[nama_proyek][]" id="proyek_investasiNama" value="{{$proyek_investasi['nama_proyek'][$i]}}" class="form-control col-md-12"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <input placeholder="Skema Investasi Proyek Investasi" name="proyek_investasis[nama_perusahaan][]" id="proyek_investasiSkema" value="{{$proyek_investasi['nama_perusahaan'][$i]}}" class="form-control col-md-12"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <input type="number" placeholder="Nilai Investasi Proyek Investasi" name="proyek_investasis[nilai_investasi][]" id="proyek_investasiNilai" value="{{$proyek_investasi['nilai_investasi'][$i]}}" class="form-control col-md-12"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endfor

                                                        @endforeach

                                                        <div class="col-lg-12">
                                                            <div class="ui-tooltip">
                                                                <button type='button' class="btn btn-danger btn-circle float-right"
                                                                        data-toggle="tooltip" data-placement="bottom" title="Hapus Proyek Investasi"
                                                                        id='removeInvestasi'>
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button type='button' class="btn btn-info btn-circle float-left" id='addInvestasi'
                                                                        data-toggle="tooltip" data-placement="bottom" title="Tambah Proyek Investasi">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div id="proyek_investasi_list">
                                                        <div class="row" id="proyekInvestasi">
                                                            <div class="col-4">
                                                                <div class="form-group" id="nama">
                                                                    <input placeholder="Nama Proyek/ Bidang Usaha" name="proyek_investasis[nama_proyek][]" id="proyek_investasiNama" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group" id="skema">
                                                                    <input placeholder="Nama Perusahaan" name="proyek_investasis[nama_perusahaan][]" id="proyek_investasiPerusahaan" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group" id="nilai">
                                                                    <input type="number" placeholder="Nilai Investasi Proyek Investasi" name="proyek_investasis[nilai_investasi][]" id="proyek_investasiNilai" class="form-control col-md-12"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui-tooltip">
                                                                <button type='button' class="btn btn-danger btn-circle float-right"
                                                                        data-toggle="tooltip" data-placement="bottom" title="Hapus Proyek Investasi"
                                                                        id='removeInvestasi'>
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <button type='button' class="btn btn-info btn-circle float-left" id='addInvestasi'
                                                                        data-toggle="tooltip" data-placement="bottom" title="Tambah Proyek Investasi">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endisset

                                            @elseif ($row->field == 'kab_kota_id')

                                                <select class="form-control select2" name="kab_kota_id">

                                                    @foreach(Auth::user()->where('role_id', 3)->get() as $user)
                                                        @if(is_null($dataTypeContent->kab_kota_id))
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @else
                                                            <option value="{{$dataTypeContent->kab_kota_id}}" selected>@isset($dataTypeContent->kabkota){{$dataTypeContent->kabkota->name}} @endisset</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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
                        @endif
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
    <script>
        document.getElementById('addPlayer').onclick = function createInputField() {
            var input = document.createElement('input');
            var lineBreak = document.createElement('br');
            var testId = "infrasturktur";
            var i = 0;
            var x = document.getElementsByTagName('INPUT').length - 2;
            for (i = 0; i < x; i++) {
                i;
            }
            input.setAttribute('id', testId + i);
            input.className = 'form-control';
            input.name = 'infrastruktur[]';
            input.placeholder = 'Infrastruktur Pendukung Lain';
            var aplayer1 = document.getElementById('input-player-list');
            aplayer1.appendChild(input);
            aplayer1.appendChild(lineBreak);
        }

        document.getElementById('removePlayer').onclick = function removeInputField() {

            var x = document.getElementsByTagName('INPUT').length;
            console.log(x);
            if ( x > 2 ) {
                $('#input-player-list input:last').remove();
                $('#input-player-list br:last').remove();
                return false;
            } else {
            }
        }
    </script>
    <script>
        document.getElementById('addKerjasama').onclick = function createInputField() {

            var tambahRow = document.getElementById('proyek_kerjasama_list');
            tambahRow.insertAdjacentHTML('beforebegin',
                '<div class="row" id="proyekKerjasamaAdd">\n' +
'               <div class="col-4">\n' +
'               <div class="form-group" id="nama">\n' +
'                   <input placeholder="Nama Proyek Kerjasama" name="proyek_kerjasamas[nama_proyek][]" id="proyek_kerjasamaNama" class="form-control col-md-12"\n' + '                                                                    >\n' +
'               </div>\n' +
'               </div>\n' +
'               <div class="col-4">\n' +
'                  <div class="form-group" id="skema">\n' +
'                      <input placeholder="Skema Investasi Proyek Kerjasama" name="proyek_kerjasamas[skema_investasi][]" id="proyek_kerjasamaSkema" class="form-control col-md-12"\n' +
'                      >\n' +
'                  </div>\n' +
'                </div>\n' +
'                <div class="col-4">\n' +
'                   <div class="form-group" id="nilai">\n' +
'                      <input type="number" placeholder="Nilai Investasi Proyek Kerjasama" name="proyek_kerjasamas[nilai_investasi][]" id="proyek_kerjasamaNilai" class="form-control col-md-12"\n' +
'                      >\n' +
'                   </div>\n' +
'                 </div>\n' +
'                 </div>')

            //console.log(tambahRow);
        }

        document.getElementById('removeKerjasama').onclick = function removeInputField() {

            var x = document.getElementById('proyekKerjasamaAdd');
            x.parentNode.removeChild(x);

        }
    </script>
    <script>
        document.getElementById('addInvestasi').onclick = function createInputField() {

            var tambahRow = document.getElementById('proyek_investasi_list');
            tambahRow.insertAdjacentHTML('beforebegin',
                '<div class="row" id="proyekInvestasiAdd">\n' +
'               <div class="col-4">\n' +
'               <div class="form-group" id="nama">\n' +
'                   <input placeholder="Nama Proyek/ Bidang Usaha" name="proyek_investasis[nama_proyek][]" id="proyek_investasiNama" class="form-control col-md-12"\n' + '                                                                    >\n' +
'               </div>\n' +
'               </div>\n' +
'               <div class="col-4">\n' +
'                  <div class="form-group" id="skema">\n' +
'                      <input placeholder="Nama Perusahaan" name="proyek_investasis[nama_perusahaan][]" id="proyek_investasiPerusahaan" class="form-control col-md-12"\n' +
'                      >\n' +
'                  </div>\n' +
'                </div>\n' +
'                <div class="col-4">\n' +
'                   <div class="form-group" id="nilai">\n' +
'                      <input type="number" placeholder="Nilai Investasi Proyek Investasi" name="proyek_investasis[nilai_investasi][]" id="proyek_investasiNilai" class="form-control col-md-12"\n' +
'                      >\n' +
'                   </div>\n' +
'                 </div>\n' +
'                 </div>')

            //console.log(tambahRow);
        }

        document.getElementById('removeInvestasi').onclick = function removeInputField() {

            var y = document.getElementById('proyekInvestasiAdd');
            y.parentNode.removeChild(y);
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
@stop

