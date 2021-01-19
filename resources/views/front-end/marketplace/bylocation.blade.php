@extends('front-end.master.newest-master')
@section('css')
    <style>
        .gm-style-iw {
            width: 350px !important;
            top: 15px !important;
            left: 0px !important;
            background-color: #fff;
            box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
            border: 1px solid rgba(72, 181, 233, 0.6);
            border-radius: 2px 2px 10px 10px;
        }
        #iw-container {
            margin-bottom: 10px;
        }
        #iw-container .iw-title {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 22px;
            font-weight: 400;
            padding: 10px;
            background-color: #48b5e9;
            color: white;
            margin: 0;
            border-radius: 2px 2px 0 0;
        }
        #iw-container .iw-content {
            font-size: 13px;
            line-height: 18px;
            font-weight: 400;
            margin-right: 1px;
            padding: 15px 5px 20px 15px;
            max-height: 140px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .iw-content img {
            float: right;
            margin: 0 5px 5px 10px;
        }
        .iw-subTitle {
            font-size: 16px;
            font-weight: 700;
            padding: 5px 0;
        }
        .iw-bottom-gradient {
            position: absolute;
            width: 326px;
            height: 25px;
            bottom: 10px;
            right: 18px;
            background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
            background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
            background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
            background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
        }
    </style>
@endsection

@section('header')
    <header id="headerEn" class="header-home">
        <div class="container background background--right background--header background--mobile"
             style="background-image: url({{Voyager::image(setting('site.bg_location'))}});">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-home__title">{{Voyager::setting('site.title_location')}}</h2>
                    <p class="header-home__description">{{Voyager::setting('site.ket_location')}}</p>
                </div>
            </div>
        </div>
    </header>
    <header id="headerId" style="display: none;" class="header-home">
        <div class="container background background--right background--header background--mobile"
             style="background-image: url({{Voyager::image(setting('site.bg_location'))}});">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-home__title">{{Voyager::setting('site.id_title_location')}}</h2>
                    <p class="header-home__description">{{Voyager::setting('site.id_ket_location')}}</p>
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
                    <div class="row">
                        <div class="col-12" style="text-align: justify">
                            <h4 class="about-app__description-title">Location</h4>
                            <div style="height: 100%; min-height: 500px;">
                                {!! Mapper::render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- <section class="section">
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             <h3 class="section__title">{{ $proyek->translate('en')->project_name }}</h3>
                         </div>
                         <div class="col-12">
                             <div class="col-12 about-app__img about-app__img--left">

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
    {{--{{$proyeks->links('pagination.page')}}--}}
@endsection

@section('js')

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>

    {{--{!! ($chart->script()) !!}--}}
@endsection

