@extends('voyager::master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/front-end/cjibf.css')}}">
    <link rel="stylesheet" href="{{asset('css/cjibf.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>


        .bBox::before
        {
            content:".";
            width:15px;
            height:15px;
            float:left;
            margin-right:10px;
        }
        @isset($jeniss)

        @foreach($jeniss as $jenis)
            .{{$jenis->nama}}::before
        {
            content: "";
            background: {{$jenis->warna}};
        }
        @endforeach

        @endisset
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato');
        .modal-wrapper {
            background-color: rgba(0, 0, 0, 0.3);
            opacity: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transition: all 0.3s ease-in-out;
            z-index: -1;
        }

        .modal-wrapper.open {
            opacity: 1;
            z-index: 999;
        }

        .modal {
            background-color: #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
            width: 380px;
            max-width: 95%;
        }

        .modal-header {
            background: #015AD1;
            background-image: linear-gradient(to right, #015AD1, #1748BC);
            color: #fff;
            padding: 15px 0;
        }

        .modal-header h3 {
            margin: 0;
        }

        .modal-body {
            padding: 15px 20px;
        }

        .modal-body h4 {
            margin: 0;
        }

        .modal-body p {
            letter-spacing: 0.5px;
            line-height: 24px;
            margin: 10px 0 0;
        }

        .modal-footer {
            background-color: #eee;
            padding: 15px 0;
        }
    </style>
@endsection
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            Setting Event
        </h1>
        {{--{{ menu('admin') }}--}}
        {{--<div class="box">
        <a href="#popup1" class="btn btn-danger" id="bulk_delete_btn">
            <i class="voyager-trash"></i>
            <span>Reset Event</span>
        </a>
        </div>--}}

            @if(Auth::user()->hasRole('kab'))
            @elseif(Auth::user()->hasRole('LO'))
            <a href="{{route('lo.setting', Auth::user()->id)}}" class="btn btn-success">LO kesini</a>
            @else
            {{--<a href="{{route('reset')}}" class="btn btn-danger" id="bulk_delete_btn"><i class="voyager-trash"></i> <span>Reset Event</span></a>--}}
            <a href="{{route('live.count')}}" class="btn btn-success" id="bulk_delete_btn"><i class="voyager-dollar"></i> <span>Live Count</span></a>
            <a href="{{route('rekap-pendaftar')}}" class="btn btn-primary" id="bulk_delete_btn"><i class="voyager-dollar"></i> <span>Rekap Peserta</span></a>
            @endif
    </div>
@stop

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <main>
                @if (app('VoyagerAuth')->user()->hasRole('admin'))
                    <input id="tab1" type="radio" name="tabs" style="display: none" checked>
                    <label for="tab1">Participants</label>

                    <input id="tab6" type="radio" name="tabs" style="display: none">
                    <label for="tab6">General Report</label>

                    <input id="tab2" type="radio" name="tabs" style="display: none">
                    <label for="tab2">Layout's Setting</label>

                    <input id="tab3" type="radio" name="tabs" style="display: none">
                    <label for="tab3">Setting Meja</label>

                    <input id="tab4" type="radio" name="tabs" style="display: none">
                    <label for="tab4">Filter Meja</label>

                    <input id="tab5" type="radio" name="tabs" style="display: none">
                    <label for="tab5">Pembagian Meja</label>

                    <a href="{{url('/maileclipse')}}"><button class="btn btn-primary save">Mail Templates</button></a>

                    <section id="content1">
                        @include('cjibf.peserta')
                    </section>
                    <section id="content6">
                        @include('cjibf.report')
                    </section>
                    <section id="content2">
                        @include('cjibf.layout')
                    </section>
                    <section id="content3">
                        @include('cjibf.meja')
                    </section>
                    <section id="content4">
                        @include('cjibf.filter-meja')
                    </section>
                    <section id="content5">
                        @include('cjibf.meja-kabkota')
                    </section>

                    @elseif(app('VoyagerAuth')->user()->hasRole('Promosi'))
                    <input id="tab1" type="radio" name="tabs" style="display: none" checked>
                    <label for="tab1">Participants</label>

                    <input id="tab6" type="radio" name="tabs" style="display: none">
                    <label for="tab6">General Report</label>

                    <input id="tab2" type="radio" name="tabs" style="display: none">
                    <label for="tab2">Layout's Setting</label>

                    <input id="tab3" type="radio" name="tabs" style="display: none">
                    <label for="tab3">Setting Meja</label>

                    <input id="tab4" type="radio" name="tabs" style="display: none">
                    <label for="tab4">Filter Meja</label>

                    <input id="tab5" type="radio" name="tabs" style="display: none">
                    <label for="tab5">Pembagian Meja</label>

                    <a href="{{url('/maileclipse')}}"><button class="btn btn-primary save">Mail Templates</button></a>

                    <section id="content1">
                        @include('cjibf.peserta')
                    </section>
                    <section id="content6">
                        @include('cjibf.report')
                    </section>
                    <section id="content2">
                        @include('cjibf.layout')
                    </section>
                    <section id="content3">
                        @include('cjibf.meja')
                    </section>
                    <section id="content4">
                        @include('cjibf.filter-meja')
                    </section>
                    <section id="content5">
                        @include('cjibf.meja-kabkota')
                    </section>

                @elseif(app('VoyagerAuth')->user()->hasRole('kab'))
                    <input id="tab1" type="radio" name="tabs" checked style="display: none">
                    <label for="tab1">Participants</label>
                    <section id="content1">
                        @include('cjibf.peserta')
                    </section>
                @elseif(Auth::user()->hasRole('LO'))
                    <a href="{{route('lo.setting', Auth::user()->id)}}" class="btn btn-success">LO kesini</a>
                @endif

            </main>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        var example = flatpickr('#flatpickr');
        console.log('tes');
        // flatpickr('selector', options);
        flatpickr('#flatpickr',{

            // A string of characters which are used to define how the date will be displayed in the input box.
            dateFormat: 'Y-m-d',


        });
    </script>

@endsection
