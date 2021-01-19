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

        <div class="card post__card">
            <div class="post__header">
                <div class="believe">
                    <img alt="{{$perkebunan->userId->name}}" class="believe__avatar" style="float: left" src="{{Voyager::image($perkebunan->userId->avatar)}}">
                </div>
                <h4 class="post__title">{{$perkebunan->potensiId->jenis_komoditas}}</h4>
                <p class="post__category">{{$perkebunan->userId->name}}</p>
            </div>

            <article class="post__content">
                <div class="carousel">
                    <div class="slider carousel__slider--images">
                        @php
                            $images = json_decode($perkebunan->potensiId->foto)
                        @endphp
                        @foreach($images as $image)
                            <div class="carousel__slide">
                                <img src="{{Voyager::image($image)}}" alt="">
                                <p class="carousel__caption">{{$perkebunan->lokasi}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <p>{!! $perkebunan->keterangan!!} </p>
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
                    <p class="post__social"><i class="mdi mdi-eye"></i> {{$perkebunan->getViewsCount()}} <span>views</span></p>
                    <a class="post__social post__social--likes" data-post-id="post0003">
                        <i class="mdi mdi-heart"></i> 103 <span>likes</span>
                    </a>
                    <p class="post__social post__social--like">I like it!</p>
                </div>
                <div id="comments"></div>
            </div>
        </div>

    </div>
@endsection

@section('right')
    <div class="col-offset-1 col-3 col-m-4">
        <div class="card form">
            <p class="card__title">Search</p>
            <form class="form_form">
                <div class="form__form-group form__form-group--without-label">
                    <input class="form__input js-field__search" type="text" placeholder="I am looking for...">
                    <span class="form__input-icon"><i class="mdi mdi-magnify"></i></span>
                </div>
            </form>
        </div>
        <div class="card form">
            <p class="card__title">Categories</p>
            <form class="form__form js-form-category">
                <div class="form__form-group form__form-group--without-label">
                    <select class="form__input form__input--select js-field__category" title="category">
                        <option>Updates</option>
                        <option>Tutorials</option>
                        <option>Our Platform</option>
                        <option>Changelog</option>
                        <option>Security</option>
                    </select>
                    <div class="form__input-icon-wrap">
                        <span class="form__input-icon"><i class="mdi mdi-chevron-down"></i></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <p class="card__title">Most popular</p>
            <a class="popular" href="../posts/01_video_post.html">
                <div class="popular__img" style="background-image: url(../assets/img/blog/19_blog_img_2.jpg)"></div>
                <p class="popular__title">How to Setup Sigma in 10 minutes (Video Tutorial)</p>
            </a>
            <a class="popular" href="../posts/02_gallery_post.html">
                <div class="popular__img" style="background-image: url(../assets/img/blog/19_blog_img_3.jpg)"></div>
                <p class="popular__title">Sigma API Released v 3.0.2, Change IP Address Feature</p>
            </a>
            <a class="popular" href="../posts/03_standard_post.html">
                <div class="popular__img" style="background-image: url(../assets/img/blog/19_blog_img_1.jpg)"></div>
                <p class="popular__title">Sigma PRO 3.1.5 update, news and support</p>
            </a>
        </div>
        <div class="card">
            <p class="card__title">Tags</p>
            <div class="tags">
                <button class="site-btn site-btn--light tags__tag">Android</button>
                <button class="site-btn site-btn--light tags__tag">API</button>
                <button class="site-btn site-btn--light tags__tag">App</button>
                <button class="site-btn site-btn--light tags__tag">Backup</button>
                <button class="site-btn site-btn--light tags__tag">Cloud</button>
                <button class="site-btn site-btn--light tags__tag">Changelog</button>
                <button class="site-btn site-btn--light tags__tag">Control panel</button>
                <button class="site-btn site-btn--light tags__tag">Design</button>
                <button class="site-btn site-btn--light tags__tag">Development</button>
                <button class="site-btn site-btn--light tags__tag">E-mail</button>
                <button class="site-btn site-btn--light tags__tag">Features</button>
                <button class="site-btn site-btn--light tags__tag">How to</button>
                <button class="site-btn site-btn--light tags__tag">iOS</button>
                <button class="site-btn site-btn--light tags__tag">IP address</button>
                <button class="site-btn site-btn--light tags__tag">Landing page</button>
                <button class="site-btn site-btn--light tags__tag">Messanger</button>
                <button class="site-btn site-btn--light tags__tag">News</button>
                <button class="site-btn site-btn--light tags__tag">PHP</button>
                <button class="site-btn site-btn--light tags__tag">Server</button>
                <button class="site-btn site-btn--light tags__tag">Setup</button>
                <button class="site-btn site-btn--light tags__tag">Update</button>
                <button class="site-btn site-btn--light tags__tag">UI / UX</button>
                <button class="site-btn site-btn--light tags__tag">Video</button>
                <button class="site-btn site-btn--light tags__tag">Web application</button>
                <button class="site-btn site-btn--light tags__tag">WordPress</button>
                <button class="site-btn site-btn--light tags__tag">YouTube</button>
            </div>
        </div>
        <div class="card form">
            <p class="card__title">Archive</p>
            <form class="form__form js-form-date">
                <div class="form__form-group form__form-group--without-label">
                    <select class="form__input form__input--select js-field__month" title="month">
                        <option>March 2018</option>
                        <option>February 2018</option>
                        <option>January 2018</option>
                        <option>December 2017</option>
                        <option>November 2017</option>
                        <option>October 2017</option>
                    </select>
                    <div class="form__input-icon-wrap">
                        <span class="form__input-icon"><i class="mdi mdi-chevron-down"></i></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card social-card">
            <p class="card__title">Latest tweet</p>
            <a href="https://twitter.com/AspirityThemes" target="_blank"><i class="social-card__icon social-card__icon--twitter mdi mdi-twitter"
                                                                            aria-hidden="true"></i></a>
            <div class="tweet__tweet" style="opacity: 0; position: absolute; z-index: -1">
                <a class="twitter-timeline" href="https://twitter.com/AspirityThemes?ref_src=twsrc%5Etfw"
                   data-tweet-limit="1">
                    Tweets by AspirityThemes
                </a>
            </div>
            <div class="social-card__tweet social-card__tweet--load" id="tweet"></div>
        </div>
        <div class="card social-card">
            <p class="card__title">Instagram</p>
            <a href="https://www.instagram.com/aspirity_templates/" target="_blank">
                <i class="social-card__icon social-card__icon--instagram mdi mdi-instagram" aria-hidden="true"></i>
            </a>
            <!-- LightWidget WIDGET -->
            <div class="instagram">
                <iframe src="//lightwidget.com/widgets/8805af47fad15bfb82812dae1bccdff2.html" scrolling="no"
                        allowtransparency="true" class="lightwidget-widget"
                        style="width:100%;border:0;overflow:hidden;"></iframe>
            </div>
        </div>
    </div>
@endsection
