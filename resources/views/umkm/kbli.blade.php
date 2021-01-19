@extends('umkm.umkm')

@section('css')
    <link rel="stylesheet" href="{{asset('umkm/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
        <form action="{{ route('import.kbli') }}" method="post" enctype="multipart/form-data" class="margin-bottom-73">
            @csrf
            <input type="file" name="file" id="" class="form-control"><br>
            <button type="submit" class="btn btn-dark form-control">Upload Now</button>
        </form>


    <div class="row" style="margin-top: 30px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data KBLI (Perka 2017)</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Kelompok</th>
                            <th>Judul Kelompok</th>
                            <th>Deskripsi Kelompok</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($kblis)
                            @foreach($kblis as $kbli)
                                <tr>
                                    <td>{{$kbli->kelompok}}</td>
                                    <td>{{$kbli->judul_kelompok}}</td>
                                    <td>{{$kbli->desk_kelompok}}</td>
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
    </div>
@endsection

@section('js')
    <script src="{{asset('umkm/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('umkm/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

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
        });
    </script>
@endsection
