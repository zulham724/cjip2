@extends('umkm.umkm')

@section('css')
    <link rel="stylesheet" href="{{asset('umkm/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('umkm/plugins/select2/css/select2.min.css')}}">
    <style>
        .whole-page-overlay{
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            position: fixed;
            background: rgba(0,0,0,0.6);
            width: 100%;
            height: 100% !important;
            z-index: 1050;
        }
        .whole-page-overlay .center-loader{
            top: 25%;
            left: 35%;
            position: absolute;
            color: white;
        }
    </style>
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">IMPORT DATA</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <button type="button" class="btn btn-block btn-outline-primary">
                        <a href="{{public_path('UMKM/template upload UMKM.xlsx')}}" style="color: black">Template Import</a>
                    </button>
                <form role="form" action="{{ route('import.umkm') }}" method="post" enctype="multipart/form-data" class="margin-bottom-73">
                    @csrf
                    <div class="form-group">
                        <label>Kabota</label>
                        <select class="form-control select2" style="width: 100%;" name="kab_kota">
                            <option value="" disabled>Pilih Kabkota</option>
                            @foreach($kabkotas as  $kabkota)
                                <option value="{{$kabkota->id}}">{{$kabkota->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <select class="form-control select2" style="width: 100%;" name="tahun">
                            <option value="" disabled>Pilih Tahun</option>
                            @foreach($years as  $year)
                                <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">

                                <input type="file" class="file" name="file" id="exampleInputFile">


                    </div>

                    <div class="form-group">
                        <div class="input-group">
                        <button class="btn btn-group btn-success" id="umkm" type="submit">IMPORT</button>
                        </div>
                    </div>

                </form>
                </div>
            </div>

        </div>
    </div>


    <div class="whole-page-overlay" style="display: none;" id="showthis">
        <img class="center-loader"  src="{{asset('images/preloader.gif')}}"/>
    </div>

    {{--<div class="row" style="margin-top: 30px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data UMKM</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>NIB</th>
                            <th>Nama Perseroan</th>
                            <th>Kab/Kota</th>
                            <th>Jumlah Investasi</th>
                            <th>Tanggal Terbit NIB</th>
                            <th>Masa Berlaku</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($umkms)
                            @foreach($umkms as $umkm)
                                <tr>
                                    <td>{{$umkm->nib}}</td>
                                    <td>{{$umkm->nama_perseroan}}</td>
                                    <td>{{$umkm->kabkota->nama}}</td>
                                    <td>{{number_format($umkm->jumlah_investasi)}}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $umkm->tgl_terbit_oss)->diffForHumans()}}</td>
                                    <td>-</td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>--}}
@endsection

@section('js')
    <script src="{{asset('umkm/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('umkm/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('umkm/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    @livewireScripts
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
            $('.select2').select2();
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        $("#umkm").click(function(){
            $("#showthis").show();
        });


    </script>
@endsection
