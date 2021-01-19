@extends('front-end.master.front-end')

@section('search')
    <div class="container">
        <div class="row search">
            <div class="col-12 col-m-12">
                <div class="card form">
                    <p class="card__title">Search</p>
                    <form class="form_form" action="{{route('search')}}">
                        <div class="form__form-group form__form-group--without-label">
                            <input class="form__input js-field__search" type="text" name="search" id="search"
                                   placeholder="I am looking for...">
                            <button type="submit" class="form__input-icon"
                                    style="background-color: transparent; background-repeat: no-repeat; border: none; overflow: hidden; outline: none;z-index: 100">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-8 col-m-8">
        @foreach($pariwisata as $par)
            <div class="card post__card">
                <div class="post__header">
                    <div class="believe">
                        <img alt="{{$par->userId->name}}" class="believe__avatar" style="float: left" src="{{Voyager::image($par->userId->avatar)}}">
                    </div>
                    <h4 class="post__title">{{$par->nama_wisata}}</h4>
                    <p class="post__category">{{$par->userId->name}}</p>
                </div>

                <article class="post__content">
                    <div class="carousel">
                        <div class="slider carousel__slider--images">
                            @php
                                $images = json_decode($par->fotos)
                            @endphp
                            @foreach((Array)$images as $image)
                                <div class="carousel__slide">
                                    <img src="{{Voyager::image($image)}}" alt="">
                                    <p class="carousel__caption">{{$par->lokasi}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p>{!! str_limit($par->keterangan, 300, '....')!!} <a href='{{route('pariwisata.detail', $par->id)}}' class='btn btn-primary'>Read More</a></p>
                </article>
                <div class="post__bottom">
                    <hr/>
                    <div class="post__socials">
                        <p class="post__social"><i class="mdi mdi-eye"></i> {{$par->getViewsCount()}} <span>views</span></p>
                        <a class="post__social post__social--likes" data-post-id="post0003">
                            <i class="mdi mdi-heart"></i> 103 <span>likes</span>
                        </a>
                        <p class="post__social post__social--like">I like it!</p>
                    </div>
                    <div id="comments"></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('right')
    @include('front-end.sidebar')
@endsection
