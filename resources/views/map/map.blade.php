<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <!--CSS -->
    <link rel="stylesheet" href="{{asset('map/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('map/assets/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('map/assets/css/jquery.scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('map/assets/css/leaflet.css')}}">
    <link rel="stylesheet" href="{{asset('map/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <title>CJIP - Provinsi Jawa Tengah</title>
    <style>
        #map {
            width: 960px;
            height:500px;
        }

        /* css to customize Leaflet default styles  */
        .custom .leaflet-popup-tip,
        .custom .leaflet-popup-content-wrapper {
            background: #e93434;
            color: #ffffff;
        }
        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
            margin-top: 20px;
        }
        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }
        legend {
            line-height: 18px;
            color: #555;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
    <style>
        #container {
            height: 400px;
        }

        .highcharts-figure, .highcharts-data-table table {
            min-width: 900px;
            max-width: 900px;
            margin: 1em auto;
        }

        #umk {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>
</head>

<body>

<!-- WRAPPER
=====================================================================================================================-->
<div class="ts-page-wrapper ts-homepage" id="page-top">

    <!--*********************************************************************************************************-->
    <!--HEADER **************************************************************************************************-->
    <!--*********************************************************************************************************-->
    <header id="ts-header" class="fixed-top">


    </header>
    <!--end Header-->

    <!-- HERO MAP
    =================================================================================================================-->
    <section id="ts-hero" class=" mb-0">
        <!--Fullscreen mode-->
        <div class="ts-full-screen ts-has-horizontal-results w-1001 d-flex1 flex-column1">

            <!-- MAP
            =========================================================================================================-->
            <div class="ts-map ts-shadow__sm">

                <!-- FORM
                =====================================================================================================-->
                <div class="ts-form__map-search ts-z-index__2">
                    <!--Form-->
                    <form class="ts-form" action="{{route('map.search')}}" method="post" id="filterForm">
                    @csrf
                        <!--Collapse button-->
                        <a href=".ts-form-collapse" data-toggle="collapse" class="ts-center__vertical justify-content-between">
                            <h5 class="mb-0">Search Filter</h5>
                        </a>

                        <!--Form-->
                        <div class="ts-form-collapse ts-xs-hide-collapse collapse show">

                            <!--Keyword-->
                            <div class="form-group my-2 pt-2">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Potensi">
                            </div>

                            <!--SEKTOR-->
                            <label for="peluang">Jenis Peluang</label>
                                <select class="custom-select my-2 js-example-basic-single" id="jenis_peluang" name="jenis_peluang">
                                    <option value="">--Select--</option>
                                @foreach($statuss as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>


                            <!--SEKTOR-->
                            <label for="sektor"> Sektor</label>
                            <select class="custom-select my-2 js-example-basic-single" id="sektor" name="sektor">
                                <option value="">--Select--</option>
                            @foreach($sektors as $sektor)
                                    <option value="{{$sektor->id}}">{{$sektor->name}}</option>
                                @endforeach
                            </select>

                            <!--KABKOTA-->
                            <label for="sektor"> Kabupaten Kota</label>
                            <select class="custom-select my-2 js-example-basic-single" id="kabkota" name="kabkota">
                                <option value="">--Select--</option>
                            @foreach($kabkotas as $kabkota)
                                    <option value="{{$kabkota->usernya[0]->id}}">{{$kabkota->nama}}</option>
                                @endforeach
                            </select>

                            <!--Status Kepemilikan-->
                            <label for="sektor"> Status Kepemilikan</label>
                            <select class="custom-select my-2 js-example-basic-single" id="status_kepemilikan" name="status_kepemilikan">
                                <option value="">--Select--</option>
                                @foreach($kepemilikans as $kepemilikan)
                                    <option value="{{$kepemilikan}}">{{$kepemilikan}}</option>
                                @endforeach
                            </select>

                            <!--Skema Investasi-->
                            <label for="sektor"> Skema Investasi</label>
                            <select class="custom-select my-2 js-example-basic-single" id="skema" name="skema">
                                <option value="">--Select--</option>
                                @foreach($skemas as $skema)
                                    <option value="{{$skema}}">{{$skema}}</option>
                                @endforeach
                            </select>

                            <div class="custom-control custom-checkbox" style="margin : auto; margin-top: 20px">
                                <input type="checkbox" class="custom-control-input" id="kajian" name="kajian">
                                <label class="custom-control-label" for="kajian">Ketersediaan File Kajian</label>
                            </div>

                            <label for="kajian"> </label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="keuangan" name="keuangan">
                                <label class="custom-control-label" for="keuangan">Ketersediaan File Keuangan</label>
                            </div>

                            <!--Max Price-->

                            <!--Submit button-->
                            <div class="form-group mt-2 mb-3">
                                <button type="submit" class="btn btn-primary w-100" id="submitformFilter">Search</button>
                            </div>


                        </div>
                        <!--end ts-form-collapse-->

                    </form>
                    <div id="Rating"></div>
                    <!--end ts-form-->
                </div>


                <!--end ts-form__map-search-->
                <!-- FORM
                =====================================================================================================-->

                <!--end ts-form__map-search-->

                <div id="ts-map-hero" class="h-100 ts-z-index__1"
                     data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                     data-ts-map-leaflet-attribution="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> &copy; <a href='http://cartodb.com/attributions'>DPMPTSP Provinsi Jawa Tengah</a>"
                     data-ts-map-zoom-position="bottomright"
                     data-ts-map-scroll-wheel="1"
                     data-ts-map-zoom="8"
                     data-ts-map-center-latitude="-6.970"
                     data-ts-map-center-longitude="109.803"
                     data-ts-locale="en-US"
                     data-ts-currency="USD"
                     data-ts-unit="m<sup>2</sup>"
                     data-ts-display-additional-info="npv*NPV;irr*IRR;bc_ratio*BC Ratio"
                >
                </div>

            </div>

            <!-- RESULTS
            =========================================================================================================-->


        </div>
    </section>
    <!--end ts-hero-->

    <!--*********************************************************************************************************-->
    <!-- MAIN ***************************************************************************************************-->
    <!--*********************************************************************************************************-->

    <main id="ts-main">

        <!-- FEATURED PROPERTIES
        =============================================================================================================-->
        <section id="featured-properties" data-bg-pattern="{{asset('map/assets/img/bg-pattern-dot.png')}}" data-bg-color="#f4f4f4" class="ts-block pt-5">
            <div class="container" id="loijump">

                <!--Title-->
                <div class="ts-title text-center">
                    <h2 style="font-family:  'Raleway', sans-serif;font-weight: 300; font-size: 50px;">LoI</h2>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-12">

                        <div class="row">
                            <figure class="highcharts-figure">
                                <div id="container"></div>

                            </figure>
                        </div>
                        <!--end ts-item-->
                    </div>
                    <!--Item-->
                    <div class="col-sm-12 col-lg-12">

                        <table id="loi" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kabupaten/ Kota</th>
                                <th>Bidang Usaha</th>
                                <th>Asal Negara</th>
                                <th>Rencana Nilai Investasi</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($lois)
                            @foreach($lois as $loi)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                @isset($loi->kabkota)
                                    <td>{{$loi->kabkota->namakota[0]->nama}}</td>
                                @else
                                    <td>{{$loi->nama_perusahaan}}</td>
                                @endisset
                                {{--<td>{{$loi->kabkota->namakota[0]->nama}}</td>--}}
                                <td>{{$loi->bidang_usaha}}</td>
                                <td>{{$loi->asal_negara}}</td>
                                <td>
                                    @if($loi->nilai_usd == 0)
                                        Rp. {{number_format($loi->nilai_rp)}}
                                        @else
                                        USD {{number_format($loi->nilai_usd)}}
                                    @endif
                                </td>
                                <td>
                                    @isset($loi->statusLoi)
                                        {{$loi->statusLoi->nama_proses}}
                                    @else
                                        Belum ada tindak lanjut
                                    @endisset
                                </td>
                            </tr>
                            @endforeach
                            @endisset
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Kabupaten/ Kota</th>
                                <th>Bidang Usaha</th>
                                <th>Asal Negara</th>
                                <th>Rencana Nilai Investasi</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!--end ts-item-->
                    </div>
                    <!--Item-->
                </div>
                <!--end row-->

            </div>
            <!--end container-->
        </section>

        <!-- FEATURES
        =============================================================================================================-->
        <section class="ts-block bg-white" data-bg-pattern="{{asset('map/assets/img/bg-pattern-topo.png')}}" data-bg-color="#f4f4f4">
            <div class="container py-4" id="umkjump">
                <div class="ts-title text-center">
                    <h2 style="font-family:  'Raleway', sans-serif;font-weight: 300; font-size: 50px;">UMK</h2>
                </div>
                <div class="row">

                    <div class="col-sm-12 col-lg-12">

                        <figure class="highcharts-figure">
                            <div id="umk"></div>
                        </figure>
                        <!--end ts-item-->
                    </div>


                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end ts-block-->


    </main>

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->
    <section id="search-form" class="ts-form__map-horizontal ts-z-index__2">
        <div class="container" style="max-width: 300px">

            <form id="form-search" class="ts-form">

                <div class="form-row px-4 py-3">

                    <div class="col-sm-6">
                        <div class="form-group my-2">

                                <a href="#loijump" type="button" class="btn btn-primary w-100">LoI
                                </a>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group my-2">

                                <a href="#umkjump" type="button" class="btn btn-primary w-100">UMK
                                </a>

                        </div>
                    </div>
                    <!--end col-md-8-->

                </div>


            </form>
            <!--end #form-search-->

        </div>
        <!--end container-->
    </section>


</div>
<!--end page-->

<script src="{{asset('map/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('map/assets/js/popper.min.js')}}"></script>
<script src="{{asset('map/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('map/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('map/assets/js/sly.min.js')}}"></script>
<script src="{{asset('map/assets/js/dragscroll.js')}}"></script>
<script src="{{asset('map/assets/js/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('map/assets/js/leaflet.js')}}"></script>
<script src="{{asset('map/assets/js/leaflet.markercluster.js')}}"></script>
<script src="{{asset('map/assets/js/custom.js')}}"></script>
<script src="{{asset('map/assets/js/map-leaflet.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/2.2.0/jquery.smooth-scroll.min.js" integrity="sha256-fdhzLBb+vMfwRwZKZPtza9iFcdVtEhrWRHhxSzEy4Ek=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#loi').DataTable();
        $('.js-example-basic-single').select2();
    } );

    var status1 = [];
    var status2 = [];
    var status3 = [];

    var lois = {!! json_encode($data_loi) !!};
    var drilldown_lois = {!! json_encode($drilldown_bidang_usaha) !!};

    console.log(lois);
    console.log(drilldown_lois);
    Highcharts.chart('container', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            },
            backgroundColor: 'transparent',

        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Tindak Lanjut LoI'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            },
            point: {
                valueSuffix: '%'
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point:y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: false,
                cursor: 'pointer',
                depth: 55,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                },

            }
        },
        series: [{
            type: 'pie',
            name: 'Jumlah LoI',
            data:
                lois

        }],
        drilldown: {
            series: drilldown_lois
        },
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 400
                },
                chartOptions: {
                    chart: {
                        height: 290,
                        spacing: [2, 2, 2, 2]
                    },
                    title: {
                        y: 55
                    },
                    plotOptions: {
                        pie: {
                            size: "35%",
                            dataLabels: {
                                crop: true,
                                distance: 10
                            }
                        }
                    }
                }
            }]
        }
    });

    // Set up the chart



</script>
<script src="https://rawgit.com/kswedberg/jquery-smooth-scroll/master/jquery.smooth-scroll.js"></script>
<script>
    $(function() {
        $('a[href*="#"]').scrollTop({
            duration:  400
        });

    });


</script>

<script>


    var umks = {!! json_encode($all_umks) !!};
    var category = {!! json_encode($categoris_umk) !!};

    Highcharts.chart('umk', {
        chart: {
            type: 'column',

        },

        title: {
            text: 'UMK Jawa Tengah berdasarkan tahun dan kab/kota'
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: category,
            labels: {
                skew3d: true,
                style: {
                    fontSize: '16px'
                }
            }
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Besaran UMK',
                skew3d: true
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                pointPadding: 0.2,
                depth: 40
            }
        },

        series: umks,
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 400
                },
                chartOptions: {
                    chart: {
                        height: 290,
                        spacing: [2, 2, 2, 2]
                    },
                    title: {
                        y: 55
                    },
                    plotOptions: {
                        column: {
                            size: "35%",
                            dataLabels: {
                                crop: true,
                                distance: 10
                            }
                        }
                    }
                }
            }]
        }
    });
</script>
</body>
</html>
