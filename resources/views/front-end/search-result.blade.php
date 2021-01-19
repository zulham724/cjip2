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
    <div class="container">
            <div class="col-12 col-m-12">
                <div class="card form" style="margin-bottom: 20px; display: block" >
                    <p class="card__title">Search Results</p>
                    <p>You are searching for <span style="color: #c82333; font-weight: 500">{{$keywords}}</span>, found <span style="color: #c82333; font-weight: 500">{{count($find)}}</span> @if(count($find) < 2 ) item @else items @endif matched</p>
                </div>
            </div>
    </div>
    <div class="col-12 col-m-12">
        <section class="section">
            <div class="container">
                <div class="col-12 col-m-12">
                    @foreach($find as $n)
                        <div class="card post__card wow fadeIn" data-wow-delay=".5s">
                            <div class="post__header">
                                <h4 class="post__title">
                                    @if($n->model_name == 'pariwisatas')
                                        <div class="carousel__slide">
                                            <p class="carousel__caption">{{$n->pariwisatas->nama_wisata}}, {{str_replace("DPMPTSP", "", $n->{$n->model_name}->userId->name)}}</p>
                                        </div>
                                    @else
                                        <p class="carousel__caption">{{$n->{$n->model_name}->potensiId->jenis_komoditas}}, {{str_replace("DPMPTSP", "", $n->{$n->model_name}->userId->name)}}</p>
                                    @endif
                                </h4>
                            </div>

                            <article class="post__content">
                                {{--<div class="carousel">
                                    <div class="slider carousel__slider--images">--}}
                                <div class="row">

                                    <div class="col-6">

                                        @if($n->model_name == 'pariwisatas')
                                            @php
                                                $images = json_decode($n->pariwisatas->fotos)
                                            @endphp
                                            @foreach((array)$images as $image)
                                                <div class="carousel__slide">
                                                <img src="{{Voyager::image($image)}}" style="width: 50%; height: auto; align-self: center" alt="">
                                                </div>
                                            @endforeach
                                        @else
                                            @php
                                                $images = json_decode($n->{$n->model_name}->potensiId->foto)
                                            @endphp
                                            @foreach($images as $image)
                                                <div class="carousel__slide">
                                                <img src="{{Voyager::image($image)}}" style="width: 50%; height: auto; align-self: center" alt="">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if($n->model_name == 'pariwisatas')
                                                <div class="carousel__slide">
                                                <p class="carousel__caption">{{$n->pariwisatas->nama_wisata}}</p>
                                                <p>{!! str_limit($n->pariwisatas->keterangan, 300, '....')!!} <a href='{{route('pariwisata.detail', $n->pariwisatas->id)}}' class='btn btn-primary'>Read More</a></p>
                                                </div>
                                        @else
                                            <p class="carousel__caption">{{$n->{$n->model_name}->potensiId->jenis_komoditas}}</p>
                                            <p><a href='{{route( substr(trim($n->model_name), 0, -1).'.'.'detail', $n->{$n->sektor->model}->id)}}' class='btn btn-primary'>Read More</a></p>
                                        @endif
                                    </div>
                                </div>

                                {{--</div>
                            </div>--}}

                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection


