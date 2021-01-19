<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/front-end/main.css')}}" id="main_style">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,800" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('css/slider.css')}}">--}}
    <title>{{setting('site.title')}}</title>
    @php $title_logo = Voyager::setting('site.logo', ''); @endphp
    <link rel="icon" href="{{asset('storage/'.$title_logo)}}" type="image/png">
    <link rel="stylesheet" href="{{asset('css/front-end/nav.css')}}">
@yield('css')
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143558094-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-143558094-1');
    </script>

</head>
<body>

<!--Main menu-->
<div class="menu">
    <div class="container menu__wrapper">
        <div class="row">
            <div class="menu__logo menu__item">
                <a href="/">
                    @php $site_logo = Voyager::setting('site.logo', ''); @endphp
                    <img class="menu__logo-img" style="max-width: 50px;height: auto"
                         src="{{asset('storage/'.$site_logo)}}" alt="">
                    <p class="menu__logo-title">{{setting('site.description')}}</p>
                </a>
            </div>
            <div class="menu__item d-t-none">
                <nav class="menu__center-nav">
                    {{menu('frontend', 'front-end.layouts.menu-desktop')}}
                </nav>
            </div>
            <div class="menu__item">
                <div class="d-none d-t-block">
                    <button type="button" class="menu__mobile-button">
                        <span><i class="mdi mdi-menu" aria-hidden="true"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Main menu-->

<!--Mobile menu-->
<div class="mobile-menu d-none d-t-block">
    <div class="container">
        <div class="mobile-menu__logo">
            @php $site_logo = Voyager::setting('site.logo', ''); @endphp
            <img class="menu__logo-img" style="max-width: 50px;height: auto" src="{{asset('storage/'.$site_logo)}}"
                 alt="">
        </div>
        <button type="button" class="mobile-menu__close">
            <span><i class="mdi mdi-close" aria-hidden="true"></i></span>
        </button>
        <nav class="mobile-menu__wrapper">
            <ul class="mobile-menu__ul">
                {{menu('frontend', 'front-end.layouts.menu')}}
            </ul>
        </nav>
    </div>
</div>

@yield('header')

@yield('search')

<section class="section">

    <div class="container">
        <div class="row post">

        @yield('content')
        {{--<div id="app">
            <beautiful-chat :participants="participants"
                            :titleImageUrl="titleImageUrl"
                            :onMessageWasSent="onMessageWasSent"
                            :messageList="messageList"
                            :newMessagesCount="newMessagesCount"
                            :isOpen="isChatOpen"
                            :close="closeChat"
                            :open="openChat"
                            :showEmoji="true"
                            :showFile="true"
                            :showTypingIndicator="showTypingIndicator"
                            :colors="colors"
                            :alwaysScrollToBottom="alwaysScrollToBottom"
                            :messageStyling="messageStyling"
                            @onType="handleOnType">
            </beautiful-chat>
        </div>--}}
        <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                    s1.async=true;
                    s1.src='https://embed.tawk.to/5cea3c972135900bac1288af/default';
                    s1.charset='UTF-8';
                    s1.setAttribute('crossorigin','*');
                    s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
            <!--End of Tawk.to Script-->
            <!--Right Info-->
            @yield('right')
        </div>
        <hr>
    </div>
</section>


<!--Footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>© 2018 SIAP JATENG – Potensi Investasi dan Peluang Penanaman Modal | Made by
                    <a href="https://dpmptsp.jatengprov.go.id" class="link link--gray">DPMPTSP Provinsi Jawa Tengah</a></p>
            </div>
        </div>
    </div>
</div>
<!--Footer-->

{{--<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--Selects-->
<script src="{{asset('js/front-end/vendor/jquery-editable-select.min.js')}}"></script>
<script src="{{asset('js/front-end/vendor/slick.min.js')}}"></script>
<!--Instagram-->
<script src="{{asset('js/front-end/vendor/lightwidget.js')}}"></script>

<script src="{{asset('js/front-end/menu.js')}}"></script>
<script src="{{asset('js/front-end/mobile-menu.js')}}"></script>
<script src="{{asset('js/front-end/blog/blog.js')}}"></script>
<script src="{{asset('js/front-end/blog/post.js')}}"></script>
<script src="{{asset('js/front-end/carousel.js')}}"></script>
<script src="{{asset('js/front-end/style-switcher.js')}}"></script>
<script src="{{asset('js/front-end/chart/highchart.js')}}"></script>

<script src="{{asset('js/front-end/jquery.waypoints.js')}}"></script>
<script src="{{asset('js/front-end/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/front-end/pricing.js')}}"></script>
<script src="{{asset('js/front-end/slick.min.js')}}"></script>
<script src="{{asset('js/front-end/dragscrollable.min.js')}}"></script>
<script src="{{asset('js/front-end/device.js')}}"></script>
<script src="{{asset('js/front-end/carousel.js')}}"></script>
<script src="{{asset('js/front-end/style-switcher.js')}}"></script>

{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
{{--<script src="{{mix('js/app.php')}}"></script>--}}
@php $img_broke = Voyager::setting('site.not_found', ''); @endphp
<script>
    var gambar = '{{asset('storage/'.$img_broke)}}';

    $('img').on("error", function() {
        $(this).attr('src', gambar);
    });
</script>
<script>
    $('button').click(function(){
        $('.pop-up').addClass('open');
    });

    $('.pop-up .close').click(function(){
        $('.pop-up').removeClass('open');
    });
</script>
@yield('js')
</body>
</html>
