
<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{setting('site.title')}}</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @php $title_logo = Voyager::setting('site.logo', ''); @endphp
    <link rel="icon" href="{{asset('storage/'.$title_logo)}}" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('investor/shards-dashboards.1.1.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('investor/extras.1.1.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/front-end/live/dataTables.material.min.css')}}" >
    <link rel="stylesheet" href="{{asset('js/front-end/live/material.min.css')}}" ><link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('js/front-end/live/buttons.dataTables.min.css')}}" >

</head>
<body class="h-100">
<div class="container-fluid">
    <div class="row">
        <!-- Main Sidebar -->

        <!-- End Main Sidebar -->
        <main class="main-content col-lg-12 col-md-12 col-sm-12 p-0">

            <!-- / .main-navbar -->
            <div class="main-content-container container-fluid px-4">
                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-12 text-center ">
                        <h1 class="page-title">Total Rencana Nilai Investasi Jawa Tengah</h1>
                        <hr>
                        <h1 class="page-title">Estimated Investment Value in Central Java</h1>
                    </div>
                </div>
                <!-- End Page Header -->
                <div id="autototal"></div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div id="auto"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card card-small h-100">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Sectors</h6>
                            </div>

                            <div id="autochart">

                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer d-flex p-2 px-3 bg-white border-top">

            <span class="copyright ml-auto my-auto mr-2">Central Java Investment Platform © 2019
              <a href="https://cjip.jatengprov.go.id" rel="nofollow">CJIP</a>
            </span>
            </footer>
        </main>
    </div>
</div>
<script src="{{asset('js/front-end/live/jquery-3.3.1.js')}}"></script>
<script src="{{asset('js/front-end/live/dataTables.material.min.js')}}"></script>
<script src="{{asset('js/front-end/live/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/front-end/live/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/front-end/live/jszip.min.js')}}"></script>
<script src="{{asset('js/front-end/live/pdfmake.min.js')}}"></script>
<script src="{{asset('js/front-end/live/vfs_fonts.js')}}"></script>
<script src="{{asset('js/front-end/live/buttons.html5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ],
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
<script src="{{asset('investor/js/extras.1.1.0.min.js')}}"></script>
<script src="{{asset('investor/js/shards-dashboards.1.1.0.min.js')}}"></script>
<script src="{{asset('investor/js/shards-dashboards.1.1.0.min.js')}}"></script>
<script src="{{asset('investor/js/app-blog-new-post.1.1.0.js')}}"></script>
<script src="{{asset('investor/js/app-components-overview.1.1.0.js')}}"></script>
<script src="{{asset('js/front-end/loading-js.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script>
    $(document).ready( function(){
        $('#auto').load('/reload');
        refreshauto();
    });

    function refreshauto()
    {
        setTimeout( function() {
            $('#auto').load('/reload').fadeIn('slow');
            refreshauto();
        }, 200);
    }
</script>
<script>
    $(document).ready( function(){
        $('#autototal').load('/reloadtotal');
        refreshtotal();
    });

    function refreshtotal()
    {
        setTimeout( function() {
            $('#autototal').load('/reloadtotal').fadeIn('slow');
            refreshtotal();
        }, 200);
    }
</script>
<script>
    $(document).ready( function(){
        $('#autochart').load('/reloadchart');
        refresh();
    });

    function refresh()
    {
        setTimeout( function() {
            $('#autochart').load('/reloadchart').fadeIn('slow');
            refresh();
        }, 10000);
    }
</script>
</body>
</html>
