@extends('master-lo')

@section('page_title', __('voyager::generic.viewing').' '. 'LO CJIBF 2019')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-lighthouse"></i> LO CJIBF 2019
        </h1>
    </div>
@stop
@section('content')
    <div class="page-content browse container-fluid">

        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <h1 class="page-title">
                                @if($meja1->isEmpty())
                                    MEJA KOSONG
                                @else
                                MEJA {{$meja1[0]->meja_id}}
                                @endif
                            </h1>
                            <table id="dataTable" class="table table-hover">

                                <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Nama Perusahaan
                                    </th>
                                    <th>
                                        Sektor
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Kab/Kota
                                    </th>
                                    <th>
                                        Meja
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@if(Auth::user()->hasRole('LO'))--}}
                                @if($meja1->isEmpty())

                                @else
                                    @foreach($meja1 as $inv1)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$inv1->profil->nama_perusahaan}}</td>
                                            <td>{{$inv1->sektor_interest}}</td>
                                            <td>{{$inv1->profil->phone}}</td>
                                            <td>{{$inv1->userId->kabkota->nama}}</td>
                                            <td>{{$inv1->meja_id}}</td>
                                        </tr>
                                    @endforeach
                                @endif

                                {{--@endif--}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <h1 class="page-title">
                                @if($meja2->isEmpty())
                                    MEJA KOSONG
                                @else
                                    MEJA {{$meja2[0]->meja_id}}
                                @endif
                            </h1>
                            <table id="dataTable" class="table table-hover">

                                <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Nama Perusahaan
                                    </th>
                                    <th>
                                        Sektor
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Kab/Kota
                                    </th>
                                    <th>
                                        Meja
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($meja2->isEmpty())

                                @else
                                    @foreach($meja2 as $inv2)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$inv2->profil->nama_perusahaan}}</td>
                                            <td>{{$inv2->sektor_interest}}</td>
                                            <td>{{$inv2->profil->phone}}</td>
                                            <td>{{$inv2->userId->kabkota->nama}}</td>
                                            <td>{{$inv2->meja_id}}</td>
                                        </tr>

                                    @endforeach
                                @endif

                                {{--@endif--}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <h1 class="page-title">
                                LoI
                            </h1>
                            <table id="dataTable" class="table table-hover">

                                <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Nama Perusahaan
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Lokasi Investasi
                                    </th>
                                    <th>
                                        Nilai USD
                                    </th>
                                    <th>
                                        Nilai Rp
                                    </th>
                                    <th>
                                        Bidang Usaha
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@if(Auth::user()->hasRole('LO'))--}}
                                    @foreach($investor as $invloi)
                                        <tr>
                                            @isset($invloi->loi)
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$invloi->profil->nama_perusahaan}}</td>
                                                <td>{{$invloi->loi->phone}}</td>
                                                <td>{{$invloi->loi->email}}</td>
                                                <td>{{$invloi->userId->kabkota->nama}}</td>
                                                <td>{{$invloi->loi->nilai_usd}}</td>
                                                <td>{{$invloi->loi->nilai_rp}}</td>
                                                <td>{{$invloi->loi->bidang_usaha}}</td>
                                            @endisset
                                        </tr>

                                    @endforeach
                                {{--@endif--}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')

        <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">

@stop

@section('javascript')
    <!-- DataTables -->

        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>

@stop
