@extends('front-end.master.newest-master')

@section('header')
    <div id="headerEn">
        <header class="header-home header-home--color">
            <div class="background background--wave">

                <div class="container background background--right background--features background--header"
                     >
                    <div class="row">
                        <div class="col-12">
                            <h2 class="header-home__title header-home__title--features">{{Voyager::setting('title_faq')}}<br/></h2>
                            <p class="header-home__description header-home__description--big header-home__description--faq">{{Voyager::setting('ket_faq')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div id="headerId" style="display: none">
        <header class="header-home header-home--color">
            <div class="background background--wave">

                <div class="container background background--right background--features background--header"
                     >
                    <div class="row">
                        <div class="col-12">
                            <h2 class="header-home__title header-home__title--features">{{Voyager::setting('id_title_faq')}}<br/></h2>
                            <p class="header-home__description header-home__description--big header-home__description--faq">{{Voyager::setting('id_ket_faq')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

@endsection
@section('content')
    <div id="contentEn">
        <section class="section section--first">
            <div class="container">

                <div class="row faq">
                    <div id="top" class="col-9 col-t-12">
                        <div class="faq__content">
                        @foreach($faqs as $key => $faq)

                            @foreach($jns_faq->where('id', $key) as $jenis)
                                <div id="{{str_replace(' ', '', $jenis->translate('en')->name)}}" class="faq__chapter chapter">
                                    <h3 class="faq__chapter-title">{{$jenis->translate('en')->name}}</h3>
                            @endforeach

                                    @foreach($faq as $f)
                                    <div class="faq__card card">
                                        <h4 class="faq__card-title">{{$f->translate('en')->question}}
                                            <span class="faq__card-icon"><i class="mdi mdi-chevron-down"></i></span>
                                        </h4>
                                        <div class="faq__card-description">
                                            <p>{!! $f->translate('en')->answer !!}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                        @endforeach
                        </div>
                    </div>
                    <div class="col-3 d-t-none">
                        <nav class="sidebar" id="menu">
                            <ul class="sidebar__list">
                                @foreach($faqs as $key => $faq)
                                    @foreach($jns_faq->where('id', $key) as $jenis)
                                    <li class="sidebar__item @if($loop->parent->first) active @else @endif"><a href="#{{str_replace(' ', '', $jenis->translate('en')->name)}}">{{$jenis->translate('en')->name}}</a></li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </section>
    </div>
    {{--<div id="contentId" style="display: none">
        <section class="section section--first">
            <div class="container">

                <div class="row faq">
                    <div id="top" class="col-9 col-t-12">
                        @foreach($faqs as $faq)
                            <div class="faq__content">
                                <div id="{{str_replace(' ', '', $faq->jenis->name)}}" class="faq__chapter chapter">
                                    <h3 class="faq__chapter-title">{{$faq->jenis->name}}</h3>
                                    <div class="faq__card card">
                                        <h4 class="faq__card-title">{{$faq->question}}
                                            <span class="faq__card-icon"><i class="mdi mdi-chevron-down"></i></span>
                                        </h4>
                                        <div class="faq__card-description">
                                            <p>{!! $faq->answer !!}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-3 d-t-none">
                        <nav class="sidebar" id="menu">
                            <ul class="sidebar__list">
                                @foreach($jns_faq as $faqid)
                                    <li class="sidebar__item @if($loop->first) active @endif"><a href="#{{str_replace(' ', '', $faqid->name)}}">{{$faqid->name}}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </section>
    </div>--}}
    <div id="endMenu" class="section section--last">
        <img alt="" class="section__img" src="{{asset('images/frontend/img_backgroud_footer.png')}}">
    </div>
@endsection


@section('js')

    <script type="application/javascript" src="{{asset('js/front-end/faq.js')}}"></script>
    <script type="application/javascript" src="{{asset('js/front-end/sidebar.js')}}"></script>
    <script>
        var header = document.getElementById("menu");
        var btns = header.getElementsByClassName("sidebar__item");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
{{--{!! ($chart->script()) !!}--}}
@endsection
