@extends('umkm.umkm')

@section('css')
    <style>
        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #box {
            height:80%;
            background:#331266;
        }
        #container {
            position:relative;
            height:100%;
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
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{"Rp. ".number_format($total_investasi)}}</h3>

                    <p>Total Investasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{"Rp. ". number_format($investasi_avg)}}<sup style="font-size: 20px"></sup></h3>

                    <p>Rerata Investasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{count($all_umkm)}}</h3>

                    <p>Total UMKM</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-lg-12 col-12">
            <figure class="highcharts-figure">
                <div id="test"></div>
                <p class="highcharts-description">

                </p>
            </figure>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-12">
            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">

                </p>
            </figure>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    @isset($grouped_data_kab)
        @isset($grouped_1)
    <script>

        var grouped_data_kab = {!! json_encode($grouped_data_kab) !!};
        var chart_kabkota = {!! json_encode($chart_kabkota) !!};
        var chart_drilldown = {!! json_encode($chart_drilldown) !!};
        var grouped_1 = {!! json_encode($grouped_1) !!};
        var categories = chart_kabkota[0].categories;
        var data_inv = grouped_data_kab[0].data;
        var dataseries = {
            name: grouped_data_kab[0].name,
            data:data_inv
        };

        console.log(chart_drilldown);

        var newh = $("#box").height();

        $( window ).resize(function() {

            newh = $("#box").height();
            chartKota.redraw();
            chartKota.reflow();
        });

        var chartKota = Highcharts.chart('container', {
            chart: {
                type: 'bar',
                height: 1200
            },
            title: {
                text: 'Data UMKM Berdasarkan Kab Kota'
            },
            subtitle: {
                text: 'Source: <a href="#">DPMPTSP PRov Jateng</a><br/>Klik untuk lihat detail'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rupiah',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' rupiah'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            /*legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },*/
            credits: {
                enabled: false
            },
            series: [
                {
                    name: "UMK Berdasarkan Kab/ Kota",
                    colorByPoint: true,
                    data: chart_kabkota
                }
            ],
            drilldown: {
                series: chart_drilldown
            }
        });

        //console.log(chartKota.series)

        Highcharts.chart('test', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Nilai Investasi Dalam Triwulan'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'UMKM',
                colorByPoint: true,
                data: grouped_1
            }]
        });
    </script>
        @endisset
    @endisset
@endsection
