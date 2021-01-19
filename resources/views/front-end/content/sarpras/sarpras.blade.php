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
    <div class="col-12 col-m-12">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">Central Java Infrastructure</h3>
                    </div>
                </div>
                <div class="row leadership">
                    @foreach($lists as $list)
                    <div class="col-3 col-t-6">
                        <a href="{{route('sarpras2', $list->sarana_id)}}">
                        <div class="leadership__item">
                            <img alt="" class="leadership__avatar" src="{{ Voyager::image($list->icon) }}">
                            <p class="leadership__name">{{$list->nama}}</p>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <hr>
            </div>
        </section>
    </div>
@endsection


