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
        @foreach($perikanan as $per)
            <div class="card post__card">
                <div class="post__header">
                    <div class="believe">
                        <img alt="{{$per->userId->name}}" class="believe__avatar" style="float: left" src="{{Voyager::image($per->userId->avatar)}}">
                    </div>
                    <h4 class="post__title">{{$per->nama_wisata}}</h4>
                    <p class="post__category">{{$per->userId->name}}</p>
                </div>

                <article class="post__content">
                    <div class="carousel">
                        <div class="slider carousel__slider--images">
                            @php
                                $images = json_decode($per->potensiId->foto)
                            @endphp
                            @foreach($images as $image)
                                <div class="carousel__slide">
                                    <img src="{{Voyager::image($image)}}" style="max-width: 758px;" alt="">
                                    <p class="carousel__caption">{{$per->lokasi}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p>{{ $per->potensiId->jenis_komoditas }}</p>
                    @php
                        $luass = json_decode($per->luas_perairan, true);
                        foreach ($luass as $l){
                        }
                        $jml_produksis = json_decode($per->jml_produksi);
                        $produktifitass = json_decode($per->produktifitas);
                    @endphp


                    <a href='{{route('perikanan.detail', $per->id)}}' class='btn btn-primary'>Read More</a>
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
                        <p class="post__social"><i class="mdi mdi-eye"></i> {{$per->getViewsCount()}} <span>views</span></p>
                        <p class="post__social"><i class="mdi mdi-comment"></i> 0 <span>comments</span></p>
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
