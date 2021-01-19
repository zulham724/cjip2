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
                    <form class="ts-form" action="{{route('map.searchumkm')}}" method="post" id="filterForm">
                    @csrf
                    <!--Collapse button-->
                        <a href=".ts-form-collapse" data-toggle="collapse" class="ts-center__vertical justify-content-between">
                            <h5 class="mb-0">Search Filter</h5>
                        </a>

                        <!--Form-->
                        <div class="ts-form-collapse ts-xs-hide-collapse collapse show">

                            <!--Keyword-->
                            <div class="form-group my-2 pt-2">
                                <input type="text" class="form-control" id="nib" name="nib" placeholder="NIB">
                            </div>

                            <!--SEKTOR-->
                            <label for="kbli">KBLI</label>
                            <select class="custom-select my-2 js-example-basic-single" id="kbli" name="kbli">
                                <option value="">--Select--</option>
                                @foreach($kblis as $kbli)
                                    <option value="{{$kbli->id}}">{{$kbli->kelompok}}</option>
                                @endforeach
                            </select>

                            <!--KABKOTA-->
                            <label for="sektor"> Kabupaten Kota</label>
                            <select class="custom-select my-2 js-example-basic-single" id="kabkota" name="kabkota">
                                <option value="">--Select--</option>
                                @foreach($kabkotas as $kabkota)
                                    <option value="{{$kabkota->id}}">{{$kabkota->nama}}</option>
                                @endforeach
                            </select>


                            <div class="form-group my-2 pt-2">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pemilik">
                            </div>

                            <div class="form-group my-2 pt-2">
                                <input type="text" class="form-control" id="tahun_a" name="tahun_a" placeholder="dari Tahun">
                            </div>

                            <div class="form-group my-2 pt-2">
                                <input type="text" class="form-control" id="tahun_b" name="tahun_b" placeholder="sampai Tahun">
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

        <!-- FEATURES
        =============================================================================================================-->

        <!--end ts-block-->


    </main>

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->


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
<script src="{{asset('map/assets/js/map-leaflet3.js')}}"></script>
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

<script src="https://rawgit.com/kswedberg/jquery-smooth-scroll/master/jquery.smooth-scroll.js"></script>
<script>
    $(function() {
        $('a[href*="#"]').scrollTop({
            duration:  400
        });

    });


</script>

</body>
</html>
