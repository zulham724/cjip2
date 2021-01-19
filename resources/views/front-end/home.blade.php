@extends('front-end.master.front-end')
{{-- @extends('layouts.consuloan') --}}
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


        @foreach($feeds as $feed)
            <div class="infinite-scroll">
            <div class="card post__card">

                <div class="post__header">
                    <div class="believe">
                        <img alt="{{ $feed->{$feed->sektor->model}->userId->name }}" class="believe__avatar"
                             src="{{Voyager::image($feed->{$feed->sektor->model}->userId->avatar)}}">
                    </div>
                    @if($feed->sektor->model == 'pariwisatas')
                        <h4 class="post__title">{{$feed->pariwisatas->nama_wisata}}</h4>
                    @else
                        <h4 class="post__title">{{$feed->{$feed->sektor->model}->potensiId->jenis_komoditas}}</h4>
                    @endif
                    <p class="post__category">{{$feed->{$feed->sektor->model}->userId->name}}</p>
                </div>

                <article class="post__content">
                    <div class="carousel">
                        <div class="slider carousel__slider--images">
                            @if($feed->sektor->model == 'pariwisatas')
                                @php
                                    $images = json_decode($feed->pariwisatas->fotos)
                                @endphp
                                @foreach((array)$images as $image)
                                    <div class="carousel__slide">
                                        <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                        <p class="carousel__caption">{{$feed->pariwisatas->lokasi}}</p>
                                    </div>
                                @endforeach

                            @else
                                @php
                                    $images = json_decode($feed->{$feed->sektor->model}->potensiId->foto)
                                @endphp
                                @foreach($images as $image)
                                    <div class="carousel__slide">
                                        <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                        <p class="carousel__caption">{{$feed->{$feed->sektor->model}->lokasi}}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    @if($feed->sektor->model == 'pariwisatas')
                        <p>{!! str_limit($feed->pariwisatas->keterangan, 300, '....')!!} <a
                                href='{{route('pariwisata.detail', $feed->pariwisatas->id)}}' class='btn btn-primary'>Read
                                More</a></p>
                    @else
                        <p>{{ $feed->{$feed->sektor->model}->potensiId->jenis_komoditas }}</p>

                        <a href='{{route( substr(trim($feed->sektor->model), 0, -1).'.'.'detail', $feed->{$feed->sektor->model}->id)}}' class='btn btn-primary'>Read
                            More</a>

                    @endif

                </article>
                <div class="post__bottom">
                    {{--<div class="tags post__tags">
                        <span class="site-btn site-btn--light tags__tag">Cloud</span>
                        <span class="site-btn site-btn--light tags__tag">News</span>
                        <span class="site-btn site-btn--light tags__tag">Update</span>
                        <span class="site-btn site-btn--light tags__tag">Setup</span>
                    </div>--}}
                    <hr/>
                    <div class="post__socials">
                        <p class="post__social"><i class="mdi mdi-eye"></i> {{$feed->{$feed->sektor->model}->getViewsCount()}}
                            <span>views</span></p>
                       {{-- <p class="post__social"><i class="mdi mdi-comment"></i> 0 <span>comments</span></p>--}}
                        <button onclick="actOnFeed(event);" class="post__social post__social--likes"
                                style="background-color: transparent;
                                            background-repeat:no-repeat;
                                            border: none;
                                            cursor:pointer;
                                            overflow: hidden;
                                            outline:none;" data-feed-id="{{ $feed->id }}">Like
                        </button>
                        <span id="likes-count-{{ $feed->id }}">{{ $feed->likes_count }} <span>likes</span></span>
                    </div>
                </div>

            </div>
                {{$feeds->links()}}
            </div>
        @endforeach


    </div>
@endsection

@section('right')
    @include('front-end.sidebar')
@endsection

@section('js')
    <script>

        var updateFeedStats = {
            Like: function (feedId) {
                document.querySelector('#likes-count-' + feedId).textContent++;
            },

            Unlike: function (feedId) {
                document.querySelector('#likes-count-' + feedId).textContent--;
            }
        };


        var toggleButtonText = {
            Like: function (button) {
                button.textContent = "Unlike";
            },

            Unlike: function (button) {
                button.textContent = "Like";
            }
        };

        var actOnFeed = function (event) {
            var feedId = event.target.dataset.feedId;
            var action = event.target.textContent;
            toggleButtonText[action](event.target);
            updateFeedStats[action](feedId);
            axios.post('/feed/' + feedId + '/like',
                {action: action});

        };

    </script>
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="{{asset('images/loading.gif')}}" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
@endsection
