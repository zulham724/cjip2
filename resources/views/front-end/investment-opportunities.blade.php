@extends('front-end.master.newest-master')
@section('css')
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
@endsection

@section('header')
    <header id="headerEn" class="header-home">
        <div class="container background background--right background--header background--mobile"
             style="background-image: url({{Voyager::image(setting('site.bg_rto'))}});">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-home__title">{{Voyager::setting('site.title_why')}}</h2>
                    <p class="header-home__description">{{Voyager::setting('site.ket_why')}}</p>
                </div>
            </div>
        </div>
    </header>
    <header id="headerId" style="display: none;" class="header-home">
        <div class="container background background--right background--header background--mobile"
             style="background-image: url({{Voyager::image(setting('site.bg_rto'))}});">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-home__title">{{Voyager::setting('site.id_title_why')}}</h2>
                    <p class="header-home__description">{{Voyager::setting('site.id_ket_why')}}</p>
                </div>
            </div>
        </div>
    </header>

@endsection
@section('content')
    <div id="contentEn">
        <div class="col-12 col-m-12">
            {{--SECTION PROJECT--}}
            @foreach($proyeks as $proyek)
                <section class="section">
                    <div class="container">
                        <h3 class="section__title">{{ $proyek->translate('en')->project_name }}</h3>
                        <div class="row about-app about-app--reverse">
                            <div class="col-6 about-app__description">
                                <div class="about-app__description-content">
                                    @isset($proyek->latar_belakang)
                                        <h6 class="about-app__description-title">Background</h6>
                                        <p style="text-align: justify; text-justify: inter-word;">{{ str_limit($proyek->translate('en')->latar_belakang, $limit = 500, $end = '...') }}</p>
                                    @endisset
                                    <div class="row">
                                        <div class="col-6">
                                            @if($proyek->market_id == 1)
                                            <a href="{{route('detail.rto', ['id'=>$proyek->id,'slug' => str_slug($proyek->project_name, '-')])}}" class="site-btn site-btn--accent header-home__btn" style="margin-bottom: 30px">Project Detail</a>
                                            @elseif($proyek->market_id == 2)
                                            <a href="{{route('detail.pros', ['id'=>$proyek->id,'slug' => str_slug($proyek->project_name, '-')])}}" class="site-btn site-btn--accent header-home__btn" style="margin-bottom: 30px">Project Detail</a>
                                            @else
                                            <a href="{{route('detail.pot', ['id'=>$proyek->id,'slug' => str_slug($proyek->project_name, '-')])}}" class="site-btn site-btn--accent header-home__btn" style="margin-bottom: 30px">Project's Details</a>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('detail.profile', ['id'=>$proyek->profil_id,'slug' => str_slug($proyek->project_name, '-')])}}" class="site-btn site-btn--light header-home__btn">Project Owner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 about-app__img about-app__img--left">

                                @isset($proyek->fotos)
                                    @php
                                        $images = json_decode($proyek->fotos);

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
                </section>

                <hr>

            @endforeach

        </div>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                {{$proyeks->links('pagination.page')}}
            </div>
        </div>
    </div>
    <div id="contentId" style="display: none">
        <div class="col-12 col-m-12">
            {{--SECTION PROJECT--}}
            @foreach($proyeks as $proyek)
                <section class="section">
                    <div class="container">
                        <h3 class="section__title">{{ $proyek->project_name }}</h3>
                        <div class="row about-app about-app--reverse" style="padding-top: 50px!important;">
                            <div class="col-6 about-app__description">
                                <div class="about-app__description-content">
                                    @isset($proyek->latar_belakang)
                                        <h6 class="about-app__description-title">Latar Belakang</h6>
                                        <p style="text-align: justify; text-justify: inter-word;">{{ str_limit($proyek->latar_belakang, $limit = 500, $end = '...') }}</p>
                                    @endisset
                                    <div class="row">
                                        <div class="col-6">
                                            @if($proyek->market_id == 1)
                                                <a href="{{route('detail.rto', ['id'=>$proyek->id,'slug' => str_slug($proyek->project_name, '-')])}}" class="site-btn site-btn--accent header-home__btn" style="margin-bottom: 30px">Detail Proyek</a>
                                            @elseif($proyek->market_id == 2)
                                                <a href="{{route('detail.pros', ['id'=>$proyek->id,'slug' => str_slug($proyek->project_name, '-')])}}" class="site-btn site-btn--accent header-home__btn" style="margin-bottom: 30px">Detail Proyek</a>
                                            @else
                                                <a href="{{route('detail.pot', ['id'=>$proyek->id,'slug' => str_slug($proyek->project_name, '-')])}}" class="site-btn site-btn--accent header-home__btn" style="margin-bottom: 30px">Detail Proyek</a>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('detail.profile', ['id'=>$proyek->profil_id,'slug' => str_slug($proyek->project_name, '-')])}}" class="site-btn site-btn--light header-home__btn">Pemilik Proyek</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 about-app__img about-app__img--left">

                                @isset($proyek->fotos)
                                    @php
                                        $images = json_decode($proyek->fotos)
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
                </section>

                <hr>
                {{--END-SECTION PROJECT CONTACT PERSON--}}
            @endforeach
        </div>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                {{$proyeks->links('pagination.page')}}
            </div>
        </div>
    </div>

    {{--{{$proyeks->links('pagination.page')}}--}}
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
    {{--{!! ($chart->script()) !!}--}}
@endsection

