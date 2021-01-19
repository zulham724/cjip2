<div class="col-offset-1 col-3 col-m-4">

    <div class="card">
        <p class="card__title">Popular</p>
        @foreach($populers as $populer)
        <a class="popular" href="{{route(substr($populer->model_name, 0, -1).'.'.'detail',  $populer->feed_id)}}">
            <div class="row">
                <div class="col-3">

                    <div class="popular__img" style="background-image: url({{ Voyager::image($populer->sektor->image) }})"></div>
                </div>
                <div class="col-9">
                    <p class="popular__title"><span style="color: #ff5c72; font-weight: 700">{{ strtoupper(substr($populer->model_name, 0, -1)) }}</span></p>
                    <p class="popular__title">{{$populer->index}}</p>
                </div>
            </div>
        </a>
            <hr style="margin-top: 5px">
        @endforeach
        <button class="site-btn site-btn--accent" style="margin-top: 5px; margin-right: 20%;margin-left: 20%">See more</button>
    </div>
    <div class="card">
        <p class="card__title">News</p>
        @foreach($news as $n)
        <a class="popular" href="{{route('berita.detail', $n->id)}}">
            <div class="row">
                <div class="col-3">
                    @php
                        $images = json_decode($n->gambar_berita)
                    @endphp
                    @foreach($images as $image)
                        <div class="popular__img" style="background-image: url({{Voyager::image($image)}})"></div>
                    @endforeach
                </div>
                <div class="col-9">
                    <p class="popular__title"><span style="color: #ff5c72; font-weight: 700">{{\Carbon\Carbon::parse($n->tgl_berita)->format('d M Y')}}</span></p>
                    <p class="popular__title">{{$n->judul}}</p>
                </div>
            </div>
        </a>
        <hr style="margin-top: 5px">
        @endforeach
        <a href="{{route('news')}}">
            <button class="site-btn site-btn--accent" style="margin-top: 5px; margin-right: 20%;margin-left: 20%">See more</button>
        </a>
    </div>
    {{--<div class="card">
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
    </div>--}}

    {{--<div class="card social-card">
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
    </div>--}}
</div>
