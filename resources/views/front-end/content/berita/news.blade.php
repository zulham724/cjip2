@extends('front-end.master.newest-master')


@section('header')
    <header class="header-home header-home--color">

        <div class="background background--clouds">
            @php $site_logo = Voyager::setting('site.logo', ''); @endphp
            <div class="container background background--right background--features background--header"
                 style="background-image: url({{asset('storage/'.$site_logo)}})">
                <div class="row">
                    <div class="col-12">
                        <h2 class="header-home__title header-home__title--features">Latest News on Central Java Investment</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="col-12 col-m-12">
        <section class="section">
            <div class="container">
                <div class="col-12 col-m-12">
                    @foreach($news as $n)
                        <div class="card post__card wow fadeIn" data-wow-delay=".5s">
                            <div class="post__header">
                                <h4 class="post__title">{{$n->judul}}</h4>
                            </div>

                            <article class="post__content">
                                {{--<div class="carousel">
                                    <div class="slider carousel__slider--images">--}}
                                <div class="row">
                                    <div class="col-6">
                                        @php
                                            $images = json_decode($n->gambar_berita)
                                        @endphp
                                        @foreach($images as $image)
                                            {{--<div class="carousel__slide">--}}
                                            <img src="{{Voyager::image($image)}}" style="width: 50%; height: auto; align-self: center" alt="">
                                            {{--</div>--}}
                                        @endforeach
                                    </div>
                                    <div class="col-6">
                                        <p class="carousel__caption">{{$n->userId->name}}</p>
                                        <p>{!! str_limit($n->isi_berita, 300, '....')!!} <a href='{{route('berita.detail', $n->id)}}' class='btn btn-primary'>Read More</a></p>
                                    </div>
                                </div>

                                    {{--</div>
                                </div>--}}

                            </article>
                            <div class="post__bottom">
                                <div class="tags post__tags">
                                    <span class="site-btn site-btn--light tags__tag">Cloud</span>
                                    <span class="site-btn site-btn--light tags__tag">News</span>
                                    <span class="site-btn site-btn--light tags__tag">Update</span>
                                    <span class="site-btn site-btn--light tags__tag">Setup</span>
                                </div>
                                <hr/>
                                <div class="post__socials">
                                    <p class="post__social"><i class="mdi mdi-eye"></i> {{$n->getViewsCount()}} <span>views</span></p>
                                    <a class="post__social post__social--likes" data-post-id="post0003">
                                        <i class="mdi mdi-heart"></i> - <span>likes</span>
                                    </a>
                                    <p class="post__social post__social--like">I like it!</p>
                                </div>
                                <div id="comments"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection


