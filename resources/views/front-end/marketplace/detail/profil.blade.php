@extends('front-end.master.newest-master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/front-end/youtube.css')}}">
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
            border-radius: 5px;
        }
    </style>
    <style>
        .divider {
            padding:0;
            margin:0;
        }
        .divider h1 {
            margin: 10%;
            text-align:center;
            font-size:48px;
            color: #fff;
        }
        @media only screen and (max-width: 700px){
            .divider h1{
                font-size: 20px;
            }
            p{
                font-size: 14px;
            }
        }
        .carousel{
            width:100%;
            max-width:1280px;
            max-height:600px;
            font-family: 'Open Sans', sans-serif;
        }
        .carousel .item {
            position: relative;
        }
        .carousel .item .imageContainer {
            display:block;
            width:100%;
            position:relative;
            max-height:600px;
        }

        .carousel .item .imageContainer:before{
            content:"";
            position: absolute;
            top:0px;
            left:0px;
            color:red;
            width:100%;
            height:100%;
            background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.75) 90%, rgba(0,0,0,0.75) 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(90%,rgba(0,0,0,0.75)), color-stop(100%,rgba(0,0,0,0.75))); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.75) 90%,rgba(0,0,0,0.75) 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.75) 90%,rgba(0,0,0,0.75) 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.75) 90%,rgba(0,0,0,0.75) 100%); /* IE10+ */
            background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.75) 90%,rgba(0,0,0,0.75) 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#bf000000',GradientType=0 ); /* IE6-9 */
        }

        .carousel .item img {
            display:block;
            width:100%;
        }

        .carousel .item .overlay {
            z-index: 999;
            position:absolute;
            bottom:0px;
            left:0px;
            right:0px;
            color:#fff;
            padding: 30px 0px 70px 0px;

        }

        .carousel .item .overlay h3{
            text-align: center;
            font-size: 40px;
            font-weight: 300;
            padding-bottom: 20px;
            width: 70%;
            margin: 0 auto;
        }
        .carousel .item .overlay p{
            text-align: center;
            width: 60%;
            margin: 0 auto;
            font-size: 16px;
            font-weight: 300;
            line-height: 29px;
            color: rgba(255, 255, 255, 0.7);
        }


        .carousel .slick-dots{
            position:absolute;
            bottom:10px;
            z-index: 999;
        }

        .slick-dots li button:before
        {
            color: #fff;
        }

        .slick-dots li.slick-active button:before
        {
            color: #fff;
        }

        @media only screen and (min-width: 901px) and (max-width: 1100px) {
            .carousel {
                max-height:600px;
            }
            .carousel .item .imageContainer{
                max-height:600px;
            }

            .carousel .item .overlay{
                padding-bottom: 55px;
            }
            .carousel .item .overlay h3{
                width: 80%;
                font-size: 34px;
                line-height: 40px;
                padding-bottom:10px;
            }
            .carousel .item .overlay p{
                width: 65%;
                font-size:15px;
                line-height: 25px;
            }
        }

        @media only screen and (min-width: 651px) and (max-width: 900px) {
            .carousel .item .overlay{
                padding-bottom: 50px;
            }
            .carousel .item .overlay h3{
                width: 80%;
                font-size: 26px;
                line-height: 30px;
                padding-bottom:10px;
            }
            .carousel .item .overlay p{
                width: 70%;
                font-size:14px;
                line-height: 20px;
            }
        }

        @media only screen and (max-width: 650px) {
            .carousel .item .overlay{
                position: relative;
                background: inherit;
                color:#000;
                padding: 25px 20px 40px 20px;
            }
            .carousel .item .overlay h3{
                width: 100%;
                text-align: left;
                color: rgba(0,0,0,0.9);
                font-size: 27px;
                font-weight: 400;
                padding-bottom:10px;
            }
            .carousel .item .overlay p{
                width: 100%;
                text-align: left;
                color: rgba(102, 102, 102, 0.9);
                font-size:17px;
            }

            .carousel .slick-dots{
                bottom: -3px;
            }
            .slick-dots li button:before
            {
                color: #000;
            }

            .slick-dots li.slick-active button:before
            {
                color: #000;
            }

        }

        @media only screen and (max-width: 550px) {
            .carousel .item .overlay{
                padding: 15px 15px 40px 15px;
            }
            .carousel .item .overlay h3{
                font-size: 24px;
                line-height: 29px;
            }
            .carousel .item .overlay p{
                font-size:13px;
                line-height: 21px;
            }
        }

        @media only screen and (max-width: 450px) {
            .carousel .item .overlay h3{
                font-size: 20px;
                line-height: 25px;
            }
            .carousel .item .overlay p{
                font-size:13px;
                line-height: 21px;
            }
        }

        @import url('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800');
    </style>
    <script type="text/javascript"src="http://maps.google.com/maps/api/js?key={{$mapsKey}}"></script>
@endsection

@section('header')
    <header id="headerEn" class="header-home">
        <div class="container background background--right background--header background--mobile"
             style="background-image: url({{Voyager::image(setting('site.bg_profil'))}});">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-home__title">{{ $profil->profil }}</h2>
                </div>
            </div>
        </div>
    </header>
    <header id="headerId" style="display: none;" class="header-home">
        <div class="container background background--right background--header background--mobile"
             style="background-image: url({{Voyager::image(setting('site.bg_profil'))}});">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-home__title">{{ $profil->profil }}</h2>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div id="contentEn">
        <div class="col-12 col-m-12">
            {{--SECTION PROJECT--}}

            <section class="section">
                <div class="container">
                    <h3 class="section__title">{{ $profil->profil }}</h3>
                    <div class="row about-app">
                        <div class="col-12 about-app__img about-app__img--left">

                            @isset($profil->foto)
                                <div class="carousel">
                                    <div class="item">
                                        <div class="about-app__img-wrap">
                                            <img src="{{Voyager::image($profil->foto)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <img alt="" src="{{'storage/'.Voyager::setting('site.not_found')}}">
                            @endisset
                        </div>
                        <div class="col-12" style="padding-top: 80px;text-align: justify">
                            <h4 class="about-app__description-title">{{ $profil->profil }} </h4>
                            <p>@isset($profil->desc_profil) {{$profil->desc_profil}} @endisset</p>
                        </div>
                        <div class="col-12" style="text-align: justify">
                            <h4 class="about-app__description-title">Infrastuktur Pendukung</h4>
                            @php
                                $infras = json_decode($profil->infrasturktur);
                            @endphp
                            <p>
                                @isset($infras)
                                    @foreach((array)$infras as $infra)
                                        @foreach((array)$infra as $in)
                                            {{$in}},
                                        @endforeach
                                    @endforeach
                                @endisset
                            </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-8" style="text-align: justify">
                            <h4 class="about-app__description-title">Ringkasan</h4>
                            <div class="site-table">
                                <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe">
                                    <tbody class="site-table__body">
                                    @isset($profil->luas)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Luas Kabupaten/Kota</th>
                                            <td class="site-table__td"><p>{{$profil->luas}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->jarak_ke_smg)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Jarak ke Semarang</th>
                                            <td class="site-table__td"><p>{{$profil->jarak_ke_smg}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->rtrw)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">RTRW</th>
                                            <td class="site-table__td"><p>{{$profil->rtrw}}</p></td>
                                        </tr>
                                    @endisset

                                    @isset($profil->grdp)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Pendapatan Perkapita</th>
                                            <td class="site-table__td"><p>{{$profil->grdp}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->pert_ekonomi)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Pertumbuhan Ekonomi</th>
                                            <td class="site-table__td"><p>{{$profil->pert_ekonomi}}</p></td>
                                        </tr>
                                    @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-4" style="text-align: justify">
                            <div class="site-table">
                                <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe">
                                    <tbody class="site-table__body">
                                    @isset($profil->inflasi)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Tingkat Inflasi</th>
                                            <td class="site-table__td"><p>{{$profil->inflasi}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->populasi)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Total Populasi</th>
                                            <td class="site-table__td"><p>{{$profil->populasi}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->angk_kerja)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Ketersediaan Angkatan Kerja</th>
                                            <td class="site-table__td"><p>{{$profil->angk_kerja}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->umr)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">UMK</th>
                                            <td class="site-table__td"><p>{{$profil->umr}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->komp_usia)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Komposisi Usia</th>
                                            <td class="site-table__td"><p>{{$profil->komp_usia}}</p></td>
                                        </tr>
                                    @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            {{-- <section class="section">
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             <h3 class="section__title">{{ $profil->translate('en')->project_name }}</h3>
                         </div>
                         <div class="col-12">
                             <div class="col-12 about-app__img about-app__img--left">

                                 @isset($profil->fotos)
                                     @php
                                         $images = json_decode($profil->fotos)
                                     @endphp
                                     <div class="carousel">
                                         @foreach((array) $images as $image)
                                             <div class="item">
                                                 <div class="about-app__img-wrap">
                                                     <img src="{{Voyager::image($image)}}" alt="">
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>

                                 @else
                                     <img alt="" src="{{'storage/'.Voyager::setting('site.not_found')}}">
                                 @endisset
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <h3 class="section__title">Leadership</h3>
                         </div>
                     </div>
                     <hr>
                 </div>
             </section>--}}
            <hr>


        </div>
    </div>
    <div id="contentId" style="display: none">
        <div class="col-12 col-m-12">
            {{--SECTION PROJECT--}}
            <section class="section">
                <div class="container">
                    <h3 class="section__title">{{ $profil->profil }}</h3>
                    <div class="row about-app">
                        <div class="col-12 about-app__img about-app__img--left">

                            @isset($profil->foto)
                                <div class="carousel">
                                        <div class="item">
                                            <div class="about-app__img-wrap">
                                                <img src="{{Voyager::image($profil->foto)}}" alt="">
                                            </div>
                                        </div>
                                </div>

                            @else
                                <img alt="" src="{{'storage/'.Voyager::setting('site.not_found')}}">
                            @endisset
                        </div>
                        <div class="col-12" style="padding-top: 80px;text-align: justify">
                            <h4 class="about-app__description-title">{{ $profil->profil }} </h4>
                            <p>@isset($profil->desc_profil) {{$profil->desc_profil}} @endisset</p>
                        </div>
                        <div class="col-12" style="text-align: justify">
                            <h4 class="about-app__description-title">Infrastuktur Pendukung</h4>
                            @php
                                $infras = json_decode($profil->infrasturktur);
                            @endphp
                            <p>
                            @isset($infras)
                                @foreach((array)$infras as $infra)
                                    @foreach((array)$infra as $in)
                                        {{$in}},
                                    @endforeach
                                @endforeach
                            @endisset
                            </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-8" style="text-align: justify">
                            <h4 class="about-app__description-title">Ringkasan</h4>
                            <div class="site-table">
                                <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe">
                                    <tbody class="site-table__body">
                                    @isset($profil->luas)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Luas Kabupaten/Kota</th>
                                            <td class="site-table__td"><p>{{$profil->luas}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->jarak_ke_smg)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Jarak ke Semarang</th>
                                            <td class="site-table__td"><p>{{$profil->jarak_ke_smg}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->rtrw)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">RTRW</th>
                                            <td class="site-table__td"><p>{{$profil->rtrw}}</p></td>
                                        </tr>
                                    @endisset

                                    @isset($profil->grdp)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Pendapatan Perkapita</th>
                                            <td class="site-table__td"><p>{{$profil->grdp}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->pert_ekonomi)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Pertumbuhan Ekonomi</th>
                                            <td class="site-table__td"><p>{{$profil->pert_ekonomi}}</p></td>
                                        </tr>
                                    @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-4" style="text-align: justify">
                            <div class="site-table">
                                <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe">
                                    <tbody class="site-table__body">
                                    @isset($profil->inflasi)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Tingkat Inflasi</th>
                                            <td class="site-table__td"><p>{{$profil->inflasi}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->populasi)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Total Populasi</th>
                                            <td class="site-table__td"><p>{{$profil->populasi}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->angk_kerja)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Ketersediaan Angkatan Kerja</th>
                                            <td class="site-table__td"><p>{{$profil->angk_kerja}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->umr)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">UMK</th>
                                            <td class="site-table__td"><p>{{$profil->umr}}</p></td>
                                        </tr>
                                    @endisset
                                    @isset($profil->komp_usia)
                                        <tr class="site-table__row">
                                            <th class="site-table__th">Komposisi Usia</th>
                                            <td class="site-table__td"><p>{{$profil->komp_usia}}</p></td>
                                        </tr>
                                    @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            {{--END-SECTION PROJECT--}}

            <hr>
            {{--END-SECTION PROJECT CONTACT PERSON--}}


        </div>
    </div>

    {{--{{$profils->links('pagination.page')}}--}}
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    <script src="{{asset('js/front-end/vendor/slick.min.js')}}"></script>
    <script>
        $('.carousel').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,
            autoplay: true,
            arrows: false
        });
    </script>
    {{--<script type="text/javascript">
        var coordinate = {!! json_encode($profil->getCoordinates(), JSON_HEX_TAG) !!};
        var lt = Number(coordinate[0].lat);
        var lg = Number(coordinate[0].lng);

        var title = '{!! $profil->project_name !!}';
        var lat = coordinate[0].lat;
        var long = coordinate[0].lng;
        var myLatLng = {lat : lt, lng : lg};

        var myOptions = {
            zoom: 8,
            center: new google.maps.LatLng(lat, long),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map"), myOptions);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    </script>
    <script type="text/javascript">
        var coordinate = {!! json_encode($profil->getCoordinates(), JSON_HEX_TAG) !!};
        var lt = Number(coordinate[0].lat);
        var lg = Number(coordinate[0].lng);

        var title = '{!! $profil->project_name !!}';
        var lat = coordinate[0].lat;
        var long = coordinate[0].lng;
        var myLatLng = {lat : lt, lng : lg};

        var myOptions = {
            zoom: 8,
            center: new google.maps.LatLng(lat, long),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map2"), myOptions);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    </script>--}}
    {{--{!! ($chart->script()) !!}--}}
@endsection

