<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/front-end/main.css')}}" id="main_style">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,800" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/front-end/jquery-ui.min.css')}}">
    <title>CJIP</title>
    @php $title_logo = Voyager::setting('site.logo', ''); @endphp
    <link rel="icon" href="{{asset('storage/'.$title_logo)}}" type="image/png">
    {{--<link rel="stylesheet" href="{{asset('css/front-end/nav.css')}}">--}}
    @yield('css')
</head>
<body>

<!--Switcher-->
<div class="style-switcher">
    <span class="style-switcher__control"></span>
    <div class="style-switcher__list">

    </div>
</div>
<!--Switcher-->

<!--Main menu-->
<div class="menu">
    <div class="container menu__wrapper">
        <div class="row">
            <div class="menu__logo menu__item">
                <a href="index.html">
                    <svg class="menu__logo-img" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                        <path data-name="Sigma symbol" class="svg-element"
                              d="M237.418,8583.56a12.688,12.688,0,0,0,.419-3.37c-0.036-5.24-2.691-9.68-7.024-13.2h-3.878a20.819,20.819,0,0,1,4.478,13.01c0,4.56-2.456,10.2-6.413,11.4a16.779,16.779,0,0,1-2.236.51c-10.005,1.55-14.109-17.54-9.489-23.31,2.569-3.21,6.206-4.08,11.525-4.08h17.935A24.22,24.22,0,0,1,237.418,8583.56Zm-12.145-24.45c-8.571.02-12.338,0.98-16.061,4.84-6.267,6.49-6.462,20.69,4.754,27.72a24.092,24.092,0,1,1,27.3-32.57h-16v0.01Z"
                              transform="translate(-195 -8544)"/>
                    </svg>
                    <p class="menu__logo-title">Sigma</p>
                </a>
            </div>
            <div class="menu__item d-t-none">
                <nav class="menu__center-nav">
                    <ul>
                        <li>
                            <div class="menu__dropdown">
                                <a class="link link--gray menu__dropdown-btn">Home
                                    <span><i class="mdi mdi-chevron-down"></i></span>
                                </a>
                                <div class="menu__dropdown-content menu__dropdown-content--home">
                                    <a class="link link--gray" href="index.html">Mobile App</a>
                                    <a class="link link--gray" href="02_messenger.html">Messenger</a>
                                    <a class="link link--gray link--gray-active" href="">Web App</a>
                                    <a class="link link--gray" href="04_desktop.html">Desktop App</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="05_features.html" class="link link--gray">Features</a></li>
                        <li><a href="06_pricing.html" class="link link--gray">Pricing</a></li>
                    </ul>
                </nav>
            </div>
            <div class="menu__item">
                <nav class="menu__right-nav d-l-none">
                    <ul>
                        <li><a href="10_get-app.html" class="site-btn site-btn--accent">Get the Sigma</a></li>
                        <li>
                            <div class="menu__dropdown d-t-none">
                                <a class="link link--gray menu__dropdown-btn">En
                                    <span><i class="mdi mdi-chevron-down"></i></span>
                                </a>
                                <div class="menu__dropdown-content">
                                    <a class="link link--gray link--gray-active" href="#">En</a>
                                    <a class="link link--gray" href="#">Fr</a>
                                    <a class="link link--gray" href="#">Ch</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
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
            <svg class="menu__logo-img" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                <path data-name="Sigma symbol" class="svg-element"
                      d="M237.418,8583.56a12.688,12.688,0,0,0,.419-3.37c-0.036-5.24-2.691-9.68-7.024-13.2h-3.878a20.819,20.819,0,0,1,4.478,13.01c0,4.56-2.456,10.2-6.413,11.4a16.779,16.779,0,0,1-2.236.51c-10.005,1.55-14.109-17.54-9.489-23.31,2.569-3.21,6.206-4.08,11.525-4.08h17.935A24.22,24.22,0,0,1,237.418,8583.56Zm-12.145-24.45c-8.571.02-12.338,0.98-16.061,4.84-6.267,6.49-6.462,20.69,4.754,27.72a24.092,24.092,0,1,1,27.3-32.57h-16v0.01Z"
                      transform="translate(-195 -8544)"/>
            </svg>
        </div>
        <button type="button" class="mobile-menu__close">
            <span><i class="mdi mdi-close" aria-hidden="true"></i></span>
        </button>
        <nav class="mobile-menu__wrapper">
            <ul class="mobile-menu__ul">
                <li class="mobile-menu__li mobile-menu__li-collapse"><a class="link link--dark-gray">Home
                        <span><i class="mdi mdi-chevron-down"></i></span>
                    </a></li>
                <li class="mobile-menu__ul--collapsed">
                    <ul class="mobile-menu__ul">
                        <li class="mobile-menu__li"><a class="link link--gray" href="index.html">Mobile App</a></li>
                        <li class="mobile-menu__li"><a class="link link--gray" href="02_messenger.html">Messenger</a></li>
                        <li class="mobile-menu__li"><a class="link link--gray link--gray-active" href="">Web App</a></li>
                        <li class="mobile-menu__li"><a class="link link--gray" href="04_desktop.html">Desktop App</a></li>
                    </ul>
                </li>
                <li class="mobile-menu__li"><a href="05_features.html" class="link link--dark-gray">Features</a></li>
                <li class="mobile-menu__li"><a href="06_pricing.html" class="link link--dark-gray">Pricing</a></li>
                <li class="mobile-menu__li"><a href="10_get-app.html" class="site-btn site-btn--accent">Get the Sigma</a></li>
                <li class="mobile-menu__li mobile-menu__li-collapse"><a class="link link--dark-gray">En
                        <span><i class="mdi mdi-chevron-down"></i></span></a></li>
                <li class="mobile-menu__ul--collapsed">
                    <ul class="mobile-menu__ul">
                        <li class="mobile-menu__li"><a href="" class="link link--gray link--gray-active">En</a></li>
                        <li class="mobile-menu__li"><a href="" class="link link--gray">Fr</a></li>
                        <li class="mobile-menu__li"><a href="" class="link link--gray">Ch</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!--Mobile menu-->

<!--Header-->
<header class="header-home header-home--color">
    <div class="container">
        <div class="row header-home__webapp-img-wrap">
            <img alt="" class="header-home__webapp-img" src="assets/img/img_bg_webapp.png">
            <div class="col-12">
                <h2 class="header-home__title">Great App that makes your life easier</h2>
                <p class="header-home__description header-home__description--webapp">Meet Sigma. The simple, intuitive and
                    powerful app to manage your work.
                    Explore app of the next generation for free and become a part of community of like-minded members.</p>
                <div class="header-home__btns header-home__btns-webapp">
                    <a href="10_get-app.html" class="site-btn site-btn--accent header-home__btn">Start Using for Free</a>
                    <a href="05_features.html" class="site-btn site-btn--invert header-home__btn">Explore Features</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Header-->

<!--Trusted by-->
<div class="section section--first">
    <div class="container">
        <div class="row logo">
            <div class="col-12">
                <div class="logo__row">
                    <p>Used by over 1,000,000 people worldwide</p>
                    <div class="logo__logos">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_1.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_2.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_3.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_4.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_5.png">
                        <img alt="" class="logo__img-mini" src="assets/img/img_logo_blue_6.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Trusted by-->

<!--Features-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section__title">The only app you’ll need to power your life</h3>
                <p class="section__description">Meet Sigma. The simple, intuitive and powerful app to manage your work.
                    Explore app of the next generation for free and become a part of community of like-minded members.</p>
            </div>
        </div>
        <div class="row carousel">
            <div class="col-12">
                <div class="carousel__navigation">
                    <ul id="carousel__navigation-feature-slider" class="carousel__navigation-items" role="tablist">
                        <li class="carousel__navigation-item slick-active" role="presentation" tabindex="0">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120"
                                 height="120" viewBox="0 0 120 120">
                                <rect class="svg-bg" width="120" height="120"/>
                                <path class="svg-light-gray"
                                      d="M12,20a2,2,0,0,1,2,2V34a2,2,0,0,1-4,0V22A2,2,0,0,1,12,20ZM6,26H18a2,2,0,0,1,0,4H6A2,2,0,0,1,6,26ZM8,72a2,2,0,0,1,2,2V86a2,2,0,0,1-4,0V74A2,2,0,0,1,8,72ZM2,78H14a2,2,0,0,1,0,4H2A2,2,0,0,1,2,78Zm98,14a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V94A2,2,0,0,1,100,92Zm-6,6h12a2,2,0,0,1,0,4H94A2,2,0,0,1,94,98ZM60,20A40,40,0,1,1,20,60,40,40,0,0,1,60,20Z"/>
                                <g>
                                    <rect class="svg-dark-gray" x="36" y="20" width="44" height="80" rx="4" ry="4"/>
                                    <path class="svg-white"
                                          d="M40,30H76a2,2,0,0,1,2,2V86a2,2,0,0,1-2,2H40a2,2,0,0,1-2-2V32A2,2,0,0,1,40,30ZM58.5,91.25a2.5,2.5,0,1,1-2.5,2.5A2.5,2.5,0,0,1,58.5,91.25Z"/>
                                </g>
                                <g id="label">
                                    <circle id="circle-2" data-name="circle" class="svg-element" cx="58" cy="59" r="16"/>
                                    <image id="Free" x="46" y="55" width="23" height="8"
                                           xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAICAMAAAAldJTcAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAM1BMVEUAAAD///////////////////////////////////////////////////////////8AAAC3K8SQAAAAD3RSTlMAVSJm3arMiLsR7ndEmTPX6l4jAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAALEgAACxIB0t1+/AAAAFtJREFUCNdtjVEOgDAIQ7vBkMkm97+tYGaixn6Q5oX0oXim4hti/Gbx1piruG9R3bWDcmaHcocawMMaMO3+D9YvE0ne+eJHNrHnfm7oBOywAINQljd4erWmV8YJJGkDageXzLEAAAAASUVORK5CYII="/>
                                </g>
                            </svg>
                            <p>Free Trial</p>
                        </li>
                        <li class="carousel__navigation-item" role="presentation" tabindex="1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120"
                                 height="120" viewBox="0 0 120 120">
                                <rect class="svg-bg" width="120" height="120"/>
                                <path class="svg-light-gray"
                                      d="M36,6H48a2,2,0,0,1,0,4H36A2,2,0,0,1,36,6Zm6-6a2,2,0,0,1,2,2V14a2,2,0,0,1-4,0V2A2,2,0,0,1,42,0ZM16,110H28a2,2,0,0,1,0,4H16A2,2,0,0,1,16,110Zm6-6a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V106A2,2,0,0,1,22,104Zm70-6h12a2,2,0,0,1,0,4H92A2,2,0,0,1,92,98Zm6-6a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V94A2,2,0,0,1,98,92ZM60,20A40,40,0,1,1,20,60,40,40,0,0,1,60,20Z"/>
                                <g id="speed">
                                    <path id="scale" class="svg-dark-gray"
                                          d="M60,31h0A33,33,0,0,1,93,64v2.818A3.182,3.182,0,0,1,89.818,70H30.182A3.182,3.182,0,0,1,27,66.818V64A33,33,0,0,1,60,31Z"/>
                                    <path id="max" class="svg-element"
                                          d="M83.671,41.019A32.883,32.883,0,0,1,93,64v2.818A3.182,3.182,0,0,1,89.818,70H60V64.69Z"/>
                                    <circle class="svg-gray" cx="60" cy="64" r="25"/>
                                    <image id="arrow" x="53" y="57" width="30" height="14"
                                           xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAOCAMAAAAPOFwLAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAgVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAABdYQRBAAAAKXRSTlMAFIbS+NCCU/Dx/hX1waOHbE4yFtzAaxOS9ti8oYNnTC4QaFTy0/r0zpnURg4AAAABYktHRACIBR1IAAAACXBIWXMAAAsSAAALEgHS3X78AAAAgUlEQVQY05WRUQ6CMBBEBylgK4JQFEQqqKjs/S9IEGIa3TTh/b5kM7MDAN7GFyIIPbBEW/ogI9YqWlCM30n6Eu+T9JDl2tIh/SOKY5KesrwEAnJQQbh07NSqYo+f60tjrm13+4nmN+bedqWVXFvFpF77FuDRz7Zn7TTJ8/UeDDfJCDOoIidStO0EAAAAAElFTkSuQmCC"/>
                                </g>
                            </svg>
                            <p>No setup</p>
                        </li>
                        <li class="carousel__navigation-item" role="presentation" tabindex="2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120">
                                <rect class="svg-bg" width="120" height="120"/>
                                <path class="svg-light-gray"
                                      d="M112,36a2,2,0,0,1,2,2V50a2,2,0,0,1-4,0V38A2,2,0,0,1,112,36Zm-6,6h12a2,2,0,0,1,0,4H106A2,2,0,0,1,106,42ZM8,8a2,2,0,0,1,2,2V22a2,2,0,0,1-4,0V10A2,2,0,0,1,8,8ZM2,14H14a2,2,0,0,1,0,4H2A2,2,0,0,1,2,14ZM20,92a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V94A2,2,0,0,1,20,92Zm-6,6H26a2,2,0,0,1,0,4H14A2,2,0,0,1,14,98ZM60,20A40,40,0,1,1,20,60,40,40,0,0,1,60,20Z"/>
                                <g id="shield">
                                    <path id="shield_light" class="svg-light"
                                          d="M60.752,81.9A2.866,2.866,0,0,1,60,82V16a1.975,1.975,0,0,1,1.18.393c3.37,2.5,13.594,9.343,26.121,10.54A3,3,0,0,1,89.993,29.9C90.138,39.995,88.551,74.278,60.752,81.9Z"/>
                                    <path id="shield_dark" class="svg-gray"
                                          d="M59.248,81.9A2.867,2.867,0,0,0,60,82V16a1.975,1.975,0,0,0-1.18.393c-3.37,2.5-13.594,9.343-26.121,10.54A3,3,0,0,0,30.007,29.9C29.862,39.995,31.449,74.278,59.248,81.9Z"/>
                                </g>
                                <g id="lock">
                                    <path id="lock-2" data-name="lock" class="svg-element"
                                          d="M70,75.25H88a4,4,0,0,1,4,4V92a4,4,0,0,1-4,4H70a4,4,0,0,1-4-4V79.25A4,4,0,0,1,70,75.25Zm13.522,0v-4.61c0-2.864-1.712-5.186-4.522-5.186s-4.522,2.322-4.522,5.186v4.61H71.087V68.915A6.85,6.85,0,0,1,77.87,62H80.13a6.85,6.85,0,0,1,6.783,6.915v6.339H83.522Z"/>
                                    <path id="hole" class="svg-white"
                                          d="M79,78.75A3.453,3.453,0,1,1,75.594,82.2,3.43,3.43,0,0,1,79,78.75ZM77.3,82.17H80.7l1.13,8.068H76.174Z"/>
                                </g>
                            </svg>
                            <p>Safety</p>
                        </li>
                        <li class="carousel__navigation-item" role="presentation" tabindex="3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120">
                                <rect class="svg-bg" width="120" height="120"/>
                                <path class="svg-light-gray"
                                      d="M90,110h12a2,2,0,0,1,0,4H90A2,2,0,0,1,90,110Zm6-6a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V106A2,2,0,0,1,96,104ZM92,8h12a2,2,0,0,1,0,4H92A2,2,0,0,1,92,8Zm6-6a2,2,0,0,1,2,2V16a2,2,0,0,1-4,0V4A2,2,0,0,1,98,2ZM16,20H28a2,2,0,0,1,0,4H16A2,2,0,0,1,16,20Zm6-6a2,2,0,0,1,2,2V28a2,2,0,0,1-4,0V16A2,2,0,0,1,22,14Zm38,6A40,40,0,1,1,20,60,40,40,0,0,1,60,20Z"/>
                                <g>
                                    <rect id="Прямоугольник_скругл._углы_2_копия_2" data-name="Прямоугольник, скругл. углы 2 копия 2"
                                          class="svg-dark-gray" x="38" y="20" width="44" height="80" rx="4" ry="4"/>
                                    <path id="Эллипс_2_копия" data-name="Эллипс 2 копия" class="svg-white"
                                          d="M42,30H78a2,2,0,0,1,2,2V86a2,2,0,0,1-2,2H42a2,2,0,0,1-2-2V32A2,2,0,0,1,42,30ZM60.5,91.25a2.5,2.5,0,1,1-2.5,2.5A2.5,2.5,0,0,1,60.5,91.25Z"/>
                                </g>
                                <g id="UI">
                                    <rect id="image" class="svg-light-gray" x="44" y="34" width="32" height="14" rx="2" ry="2"/>
                                    <path id="text" class="svg-light"
                                          d="M46,52h4a2,2,0,0,1,0,4H46A2,2,0,0,1,46,52Zm0,8h4a2,2,0,0,1,0,4H46A2,2,0,0,1,46,60Z"/>
                                    <path id="text-2" data-name="text" class="svg-gray"
                                          d="M56,52H74a2,2,0,0,1,0,4H56A2,2,0,0,1,56,52Zm0,8H74a2,2,0,0,1,0,4H56A2,2,0,0,1,56,60Z"/>
                                    <path id="text-3" data-name="text" class="svg-dark-gray"
                                          d="M66,68h8a2,2,0,0,1,0,4H66A2,2,0,0,1,66,68Zm0,8h8a2,2,0,0,1,0,4H66A2,2,0,0,1,66,76Z"/>
                                    <path id="text-4" data-name="text" class="svg-element"
                                          d="M52,68h8a2,2,0,0,1,0,4H52A2,2,0,0,1,52,68Zm0,8h8a2,2,0,0,1,0,4H52A2,2,0,0,1,52,76Z"/>
                                </g>
                            </svg>
                            <p>Optimized Data</p>
                        </li>
                        <li class="carousel__navigation-item" role="presentation" tabindex="4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120">
                                <rect class="svg-bg" width="120" height="120"/>
                                <path class="svg-light-gray"
                                      d="M112,20a2,2,0,0,1,2,2V34a2,2,0,0,1-4,0V22A2,2,0,0,1,112,20Zm-6,6h12a2,2,0,0,1,0,4H106A2,2,0,0,1,106,26ZM8,16a2,2,0,0,1,2,2V30a2,2,0,0,1-4,0V18A2,2,0,0,1,8,16ZM2,22H14a2,2,0,0,1,0,4H2A2,2,0,0,1,2,22ZM20,92a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V94A2,2,0,0,1,20,92Zm-6,6H26a2,2,0,0,1,0,4H14A2,2,0,0,1,14,98ZM60,20A40,40,0,1,1,20,60,40,40,0,0,1,60,20Z"/>
                                <g id="login">
                                    <rect class="svg-element" x="51" y="84" width="18" height="6" rx="3" ry="3"/>
                                    <path id="input" class="svg-gray"
                                          d="M41,72H79a3,3,0,0,1,0,6H41A3,3,0,0,1,41,72Zm0-10H79a3,3,0,0,1,0,6H41A3,3,0,0,1,41,62Z"/>
                                    <path id="user" class="svg-dark-gray"
                                          d="M60,32a5,5,0,1,1-5,5A5,5,0,0,1,60,32ZM58,42h4a7,7,0,0,1,7,7v3H51V49A7,7,0,0,1,58,42Z"/>
                                </g>
                            </svg>
                            <p>Quick Access</p>
                        </li>
                        <li class="carousel__navigation-item" role="presentation" tabindex="5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120">
                                <rect class="svg-bg" width="120" height="120"/>
                                <path class="svg-light-gray"
                                      d="M8,72a2,2,0,0,1,2,2V86a2,2,0,0,1-4,0V74A2,2,0,0,1,8,72ZM2,78H14a2,2,0,0,1,0,4H2A2,2,0,0,1,2,78ZM112,92a2,2,0,0,1,2,2v12a2,2,0,0,1-4,0V94A2,2,0,0,1,112,92Zm-6,6h12a2,2,0,0,1,0,4H106A2,2,0,0,1,106,98Zm-6-82a2,2,0,0,1,2,2V30a2,2,0,0,1-4,0V18A2,2,0,0,1,100,16Zm-6,6h12a2,2,0,0,1,0,4H94A2,2,0,0,1,94,22ZM60,20A40,40,0,1,1,20,60,40,40,0,0,1,60,20Z"/>
                                <path id="headphones" class="svg-dark-gray"
                                      d="M83,71a4,4,0,0,1-4-4V59h0a19,19,0,0,0-38,0V71a8,8,0,0,0,8,8h5.779A2.981,2.981,0,0,1,57,78h6a3,3,0,0,1,0,6H57a2.981,2.981,0,0,1-2.221-1H47A10,10,0,0,1,37,73V71a4,4,0,0,1-4-4V61a4,4,0,0,1,4-4h0.1a22.985,22.985,0,0,1,45.8,0H83a4,4,0,0,1,4,4v6A4,4,0,0,1,83,71Z"/>
                                <text id="_24h" data-name="24h" class="svg-element svg-text" x="60.5" y="65.25">24h</text>
                            </svg>
                            <p>24h Support</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="slider slider-img slider-img--big" id="feature-slider">
                    <div class="carousel__slide">
                        <div class="carousel__slide-content">
                            <h4 class="carousel__slide-title">Shape Your Ideas</h4>
                            <p class="carousel__slide-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Pellentesque placerat eros ac finibus congue. Integer consectetur, lorem nec
                                accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                                Suspendisse potenti.</p>
                        </div>
                        <div class="carousel__slide-img">
                            <img alt="" src="{{asset('images/frontend/img_feature_screen_1.png')}}">
                        </div>
                    </div>
                    <div class="carousel__slide">
                        <div class="carousel__slide-content">
                            <h4 class="carousel__slide-title">Shape Your Ideas</h4>
                            <p class="carousel__slide-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Pellentesque placerat eros ac finibus congue. Integer consectetur, lorem nec
                                accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                                Suspendisse potenti.</p>
                        </div>
                        <div class="carousel__slide-img">
                            <img alt="" src="{{asset('images/frontend/img_feature_screen_2.png')}}">
                        </div>
                    </div>
                    <div class="carousel__slide">
                        <div class="carousel__slide-content">
                            <h4 class="carousel__slide-title">Shape Your Ideas</h4>
                            <p class="carousel__slide-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Pellentesque placerat eros ac finibus congue. Integer consectetur, lorem nec
                                accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                                Suspendisse potenti.</p>
                        </div>
                        <div class="carousel__slide-img">
                            <img alt="" src="{{asset('images/frontend/img_feature_screen_3.png')}}">
                        </div>
                    </div>
                    <div class="carousel__slide">
                        <div class="carousel__slide-content">
                            <h4 class="carousel__slide-title">Shape Your Ideas</h4>
                            <p class="carousel__slide-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Pellentesque placerat eros ac finibus congue. Integer consectetur, lorem nec
                                accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                                Suspendisse potenti.</p>
                        </div>
                        <div class="carousel__slide-img">
                            <img alt="" src="{{asset('images/frontend/img_feature_screen_4.png')}}">
                        </div>
                    </div>
                    <div class="carousel__slide">
                        <div class="carousel__slide-content">
                            <h4 class="carousel__slide-title">Shape Your Ideas</h4>
                            <p class="carousel__slide-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Pellentesque placerat eros ac finibus congue. Integer consectetur, lorem nec
                                accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                                Suspendisse potenti.</p>
                        </div>
                        <div class="carousel__slide-img">
                            <img alt="" src="{{asset('images/frontend/img_feature_screen_5.png')}}">
                        </div>
                    </div>
                    <div class="carousel__slide">
                        <div class="carousel__slide-content">
                            <h4 class="carousel__slide-title">Shape Your Ideas</h4>
                            <p class="carousel__slide-description">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Pellentesque placerat eros ac finibus congue. Integer consectetur, lorem nec
                                accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                                Suspendisse potenti.</p>
                        </div>
                        <div class="carousel__slide-img">
                            <img alt="" src="{{asset('images/frontend/img_feature_screen_6.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="site-btn--center">
                    <a class="site-btn site-btn--light" href="05_features.html">Learn more</a>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
<!--Features-->

<!--What is-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section__title">What is Sigma?</h3>
                <p class="section__description">Meet Sigma. The simple, intuitive and powerful app to manage your work.
                    Explore app of the next generation for free and become a part of community of like-minded members.</p>
            </div>
        </div>
        <div class="row about-app">
            <div class="col-6 about-app__description">
                <div class="about-app__description-content about-app__description-content--left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                        <path class="svg-element"
                              d="M496.649,3155.93a1.94,1.94,0,0,0-1.939,1.94v11.78a2.476,2.476,0,0,1-2.473,2.47H461.351a2.475,2.475,0,0,1-2.473-2.47v-30.89a2.475,2.475,0,0,1,2.473-2.47h11.781a1.94,1.94,0,0,0,0-3.88H461.351a6.359,6.359,0,0,0-6.351,6.35v30.89a6.359,6.359,0,0,0,6.351,6.35h30.886a6.359,6.359,0,0,0,6.351-6.35v-11.78A1.94,1.94,0,0,0,496.649,3155.93Zm5.783-18.54-8.824-8.82a1.935,1.935,0,0,0-2.743,0l-22.06,22.06a1.919,1.919,0,0,0-.568,1.37v8.82a1.94,1.94,0,0,0,1.939,1.94H479a1.948,1.948,0,0,0,1.371-.56l22.061-22.07A1.936,1.936,0,0,0,502.432,3137.39ZM478.2,3158.88h-6.082v-6.08l20.122-20.12,6.082,6.08Z"
                              transform="translate(-455 -3128)"/>
                    </svg>
                    <h4 class="about-app__description-title">Create</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros ac finibus congue.
                        Integer consectetur, lorem nec accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                        Suspendisse potenti.</p>
                </div>
            </div>
            <div class="col-6 about-app__img">
                <div class="about-app__img-wrap">
                    <img alt="" src="assets/img/img_ui_1.png">
                </div>
            </div>
        </div>
        <div class="row about-app about-app--reverse">
            <div class="col-6 about-app__description">
                <div class="about-app__description-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="48" viewBox="0 0 42 48">
                        <path class="svg-element"
                              d="M1019.32,3629.62a4.6,4.6,0,0,0-1.57-1.56h0l-32.688-19.41h-0.01a4.7,4.7,0,0,0-6.4,1.61,4.616,4.616,0,0,0-.653,2.36h0v38.76a4.649,4.649,0,0,0,4.671,4.62h0a4.637,4.637,0,0,0,2.381-.65h0.009l32.689-19.38v-0.01A4.578,4.578,0,0,0,1019.32,3629.62Zm-3.6,3.02-32.67,19.38a0.758,0.758,0,0,1-.91-0.12,0.715,0.715,0,0,1-.219-0.52v-38.76h0a0.735,0.735,0,0,1,.1-0.38,0.75,0.75,0,0,1,.459-0.34,0.721,0.721,0,0,1,.565.08l32.67,19.4a0.667,0.667,0,0,1,.25.25A0.725,0.725,0,0,1,1015.72,3632.64Z"
                              transform="translate(-978 -3608)"/>
                    </svg>
                    <h4 class="about-app__description-title">Run</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros ac finibus congue.</p>
                    <a href="10_get-app.html" class="site-btn site-btn--accent about-app__btn">Start Using for Free</a>
                </div>
            </div>
            <div class="col-6 about-app__img about-app__img--left">
                <div class="about-app__img-wrap">
                    <img alt="" src="assets/img/img_ui_2.png">
                </div>
            </div>
        </div>
        <div class="row about-app">
            <div class="col-6 about-app__description">
                <div class="about-app__description-content about-app__description-content--left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                        <path class="svg-element"
                              d="M495.623,4102.78a1.367,1.367,0,0,1,1.246-.83h0.181a5.95,5.95,0,1,0,0-11.9h-0.333a1.379,1.379,0,0,1-1.136-.61,1.979,1.979,0,0,0-.126-0.4,1.372,1.372,0,0,1,.268-1.51l0.106-.1s0.006-.01.009-0.01a5.952,5.952,0,0,0,0-8.41s-0.006-.01-0.009-0.01a5.922,5.922,0,0,0-4.2-1.74h0a5.885,5.885,0,0,0-4.2,1.75l-0.111.11a1.354,1.354,0,0,1-1.506.26H485.78a1.376,1.376,0,0,1-.83-1.25v-0.18a5.95,5.95,0,0,0-11.9,0v0.33a1.368,1.368,0,0,1-.612,1.14,2.688,2.688,0,0,0-.4.12,1.354,1.354,0,0,1-1.506-.26l-0.115-.12a5.918,5.918,0,0,0-4.2-1.74h0a5.951,5.951,0,0,0-4.206,10.16l0.112,0.11a1.375,1.375,0,0,1,.268,1.51c-0.017.04-.032,0.08-0.046,0.11a1.36,1.36,0,0,1-1.236.9H460.95a5.95,5.95,0,0,0,0,11.9h0.333a1.368,1.368,0,0,1,1.254.83,0.167,0.167,0,0,1,.008.02,1.354,1.354,0,0,1-.268,1.5l-0.111.12h-0.008a5.95,5.95,0,0,0,.009,8.41c0,0.01.005,0.01,0.008,0.01a5.95,5.95,0,0,0,8.409-.01l0.111-.11a1.373,1.373,0,0,1,1.5-.27,0.542,0.542,0,0,0,.114.05,1.362,1.362,0,0,1,.9,1.24v0.15a5.95,5.95,0,1,0,11.9,0v-0.33a1.38,1.38,0,0,1,.831-1.26,0.019,0.019,0,0,0,.019-0.01,1.373,1.373,0,0,1,1.5.27l0.115,0.12a5.922,5.922,0,0,0,4.205,1.74h0a5.953,5.953,0,0,0,4.205-10.16l-0.111-.12a1.356,1.356,0,0,1-.268-1.5C495.618,4102.79,495.62,4102.79,495.623,4102.78Zm-2.506,4.24c0,0.01.01,0.01,0.015,0.02l0.121,0.12a2.076,2.076,0,0,1-1.467,3.54h0a2.077,2.077,0,0,1-1.467-.61l-0.12-.12s-0.01-.01-0.016-0.01a5.271,5.271,0,0,0-8.95,3.75v0.34a2.072,2.072,0,0,1-4.144,0v-0.18c0-.02,0-0.03,0-0.05a5.406,5.406,0,0,0-9.11-3.7s-0.01.01-.015,0.01l-0.121.12a2.071,2.071,0,0,1-2.931,0H464.9a2.076,2.076,0,0,1,0-2.93s0.005,0,.007-0.01l0.116-.11c0-.01.01-0.01,0.015-0.02a5.274,5.274,0,0,0-3.752-8.95H460.95a2.07,2.07,0,1,1,0-4.14h0.226a5.41,5.41,0,0,0,3.707-9.11c0-.01-0.01-0.01-0.015-0.02l-0.121-.12a2.076,2.076,0,0,1,1.466-3.54h0a2.032,2.032,0,0,1,1.466.61l0.121,0.12s0.01,0.01.015,0.01a5.2,5.2,0,0,0,5.413,1.2,1.87,1.87,0,0,0,.517-0.14,5.244,5.244,0,0,0,3.181-4.81v-0.34a2.072,2.072,0,0,1,4.144,0v0.19a5.271,5.271,0,0,0,8.95,3.74s0.01-.01.016-0.01l0.121-.12a2.024,2.024,0,0,1,1.465-.61h0a2.052,2.052,0,0,1,1.461.6s0,0.01.006,0.01a2.049,2.049,0,0,1,.608,1.46,2.079,2.079,0,0,1-.6,1.47h0l-0.121.12c0,0.01-.01.01-0.015,0.02a5.215,5.215,0,0,0-1.2,5.41,1.986,1.986,0,0,0,.141.52,5.257,5.257,0,0,0,4.811,3.18h0.341a2.07,2.07,0,1,1,0,4.14h-0.188A5.274,5.274,0,0,0,493.117,4107.02ZM479,4088.04a7.96,7.96,0,1,0,7.955,7.96A7.966,7.966,0,0,0,479,4088.04Zm0,12.04a4.08,4.08,0,1,1,4.077-4.08A4.083,4.083,0,0,1,479,4100.08Z"
                              transform="translate(-455 -4072)"/>
                    </svg>
                    <h4 class="about-app__description-title">Integrate</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros ac finibus congue.
                        Integer consectetur, lorem nec accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac lorem.
                        Suspendisse potenti. Vestibulum aliquam blandit scelerisque. Aliquam hendrerit vestibulum lorem non
                        placerat. Etiam at diam id erat tincidunt ullamcorper.</p>
                </div>
            </div>
            <div class="col-6 about-app__img">
                <div class="about-app__img-wrap">
                    <img alt="" src="assets/img/img_ui_3.png">
                </div>
            </div>
        </div>
        <div class="row about-app about-app--reverse">
            <div class="col-6 about-app__description">
                <div class="about-app__description-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                        <path class="svg-element"
                              d="M1016.16,4592H981.841a6.849,6.849,0,0,0-6.841,6.84v39.22a1.937,1.937,0,0,0,3.31,1.37l9.237-9.24h28.613a6.843,6.843,0,0,0,6.84-6.84v-24.51A6.85,6.85,0,0,0,1016.16,4592Zm2.96,31.35a2.968,2.968,0,0,1-2.96,2.97H986.744a1.946,1.946,0,0,0-1.371.56l-6.5,6.5v-34.54a2.966,2.966,0,0,1,2.963-2.96h34.319a2.966,2.966,0,0,1,2.96,2.96v24.51Z"
                              transform="translate(-975 -4592)"/>
                    </svg>
                    <h4 class="about-app__description-title">Communicate</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros ac finibus congue.
                        Integer consectetur, lorem nec accumsan commodo, sem mauris pharetra arcu, id viverra eros ipsum ac
                        lorem. Suspendisse potenti.</p>
                </div>
            </div>
            <div class="col-6 about-app__img about-app__img--left">
                <div class="about-app__img-wrap">
                    <img alt="" src="assets/img/img_ui_4.png">
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
<!--What is-->

<!--Pricing-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section__title">Pricing</h3>
                <p class="section__description">Sigma’s monthly pricing is based on how many functions you need
                    to start your work. If you ready to use Sigma for a long time you can choose yearly plan and
                    save 10%.</p>
            </div>
        </div>
        <div class="row pricing pricing--common">
            <div class="col-10 col-t-12 col-offset-1">
                <div class="pricing__card card">
                    <div class="pricing__card-price-wrap">
                        <div class="pricing__card-price">
                            <p id="month">$ 19.99</p>
                            <p class="pricing__card-price-caption">per month</p>
                        </div>
                        <div class="pricing__card-price">
                            <p id="year">$ 228.5</p>
                            <p class="pricing__card-price-caption">per year</p>
                        </div>
                    </div>
                    <select class="d-none" name="price-month" id="price">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <div class="pricing__plans">
                        <div class="pricing__plan pricing__plan--hidden">
                            <h4 class="pricing__card-title">Select plan</h4>
                        </div>
                        <div class="pricing__plan">
                            <h4 class="pricing__card-title">Basic</h4>
                            <div class="pricing__opportunities">
                                <p>10 pages</p>
                                <p>2 Gb storage</p>
                                <p>Donations</p>
                            </div>
                        </div>
                        <div class="pricing__plan active">
                            <h4 class="pricing__card-title">Regular</h4>
                            <div class="pricing__opportunities">
                                <p>20 pages</p>
                                <p>16 Gb storage</p>
                                <p>Donations</p>
                                <p>Integrated e-commerce</p>
                                <p>Custom domain free</p>
                            </div>
                        </div>
                        <div class="pricing__plan pricing__plan--disable">
                            <h4 class="pricing__card-title">Premium</h4>
                            <div class="pricing__opportunities">
                                <p>30 pages</p>
                                <p>100 Gb storage</p>
                                <p>Donations</p>
                                <p>Integrated e-commerce</p>
                                <p>Custom domain free</p>
                                <p>24/7 Customer support</p>
                            </div>
                        </div>
                        <div class="pricing__plan pricing__plan--disable pricing__plan--last">
                            <h4 class="pricing__card-title">Enterprise</h4>
                            <div class="pricing__opportunities">
                                <p>50 pages</p>
                                <p>500 Gb storage</p>
                                <p>Donations</p>
                                <p>Integrated e-commerce</p>
                                <p>Custom domain free</p>
                                <p>24/7 Customer support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-offset-1 col-10 col-t-12">
                <div class="pricing pricing--select">
                    <div class="pricing--select-content">
                        <h4 class="pricing--select-title">Ready to use Sigma?</h4>
                        <p class="pricing--select-description">Sigma has plans, from free to paid, that scale with your needs.
                            Subscribe to a plan that fits
                            the size of your business.</p>
                    </div>
                    <div class="pricing--select-btns">
                        <a class="site-btn site-btn--accent" href="06_pricing.html">Select plan</a>
                        <a class="site-btn site-btn--light" href="07_about.html">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
<!--Pricing-->

<!--Testimonials-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section__title">What users think about Sigma</h3>
            </div>
        </div>
        <div class="row carousel">
            <div class="col-12">
                <div class="slider carousel__slider--think">
                    <div class="carousel__slide-wrap">
                        <div class="carousel__slide">
                            <div class="carousel__slide-avatar">
                                <img alt="" class="carousel__slide-avatar-img" src="assets/img/img_believe_avatar.png">
                                <p class="carousel__slide-avatar-name">Li Chang</p>
                                <p class="carousel__slide-avatar-work">Director Product Development, Company Ltd.</p>
                            </div>
                            <div class="carousel__slide-quote">
                                <h4 class="carousel__slide-quote-title">Elegant and efficient</h4>
                                <p class="carousel__slide-quote-description">“ An elegant, yet efficient, magic tool! I love the
                                    overall design and the simple way that you can update or change a process. Awesome product. The
                                    guys have put huge effort into this app and focused on simplicity and ease of use. “</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel__slide-wrap">
                        <div class="carousel__slide">
                            <div class="carousel__slide-avatar">
                                <img alt="" class="carousel__slide-avatar-img" src="assets/img/img_believe_avatar.png">
                                <p class="carousel__slide-avatar-name">Li Chang</p>
                                <p class="carousel__slide-avatar-work">Director Product Development, Company Ltd.</p>
                            </div>
                            <div class="carousel__slide-quote">
                                <h4 class="carousel__slide-quote-title">Elegant and efficient</h4>
                                <p class="carousel__slide-quote-description">“ An elegant, yet efficient, magic tool! I love the
                                    overall design and the simple way that you can update or change a process. Awesome product. The
                                    guys have put huge effort into this app and focused on simplicity and ease of use. “</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel__slide-wrap">
                        <div class="carousel__slide">
                            <div class="carousel__slide-avatar">
                                <img alt="" class="carousel__slide-avatar-img" src="assets/img/img_believe_avatar.png">
                                <p class="carousel__slide-avatar-name">Li Chang</p>
                                <p class="carousel__slide-avatar-work">Director Product Development, Company Ltd.</p>
                            </div>
                            <div class="carousel__slide-quote">
                                <h4 class="carousel__slide-quote-title">Elegant and efficient</h4>
                                <p class="carousel__slide-quote-description">“ An elegant, yet efficient, magic tool! I love the
                                    overall design and the simple way that you can update or change a process. Awesome product. The
                                    guys have put huge effort into this app and focused on simplicity and ease of use. “</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel__slide-wrap">
                        <div class="carousel__slide">
                            <div class="carousel__slide-avatar">
                                <img alt="" class="carousel__slide-avatar-img" src="assets/img/img_believe_avatar.png">
                                <p class="carousel__slide-avatar-name">Li Chang</p>
                                <p class="carousel__slide-avatar-work">Director Product Development, Company Ltd.</p>
                            </div>
                            <div class="carousel__slide-quote">
                                <h4 class="carousel__slide-quote-title">Elegant and efficient</h4>
                                <p class="carousel__slide-quote-description">“ An elegant, yet efficient, magic tool! I love the
                                    overall design and the simple way that you can update or change a process. Awesome product. The
                                    guys have put huge effort into this app and focused on simplicity and ease of use. “</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Testimonials-->

<!--Download-->
<section class="section section--last">
    <div class="container download">
        <div class="row">
            <div class="col-12">
                <h3 class="download__title">Download Sigma today</h3>
                <h3>and get started with a free trial for your business</h3>
            </div>
        </div>
        <div class="row download__btns">
            <div class="col-6">
                <a href="10_get-app.html" class="site-btn site-btn--accent site-btn--right download__btn-first">
                    Start Using for Free</a>
            </div>
            <div class="col-6">
                <a href="05_features.html" class="site-btn site-btn--light site-btn--left">
                    Explore Features</a>
            </div>
        </div>
    </div>
    <img alt="" class="section__img" src="assets/img/img_backgroud_footer.png">
</section>
<!--Download-->

<!--Footer menu-->
<div class="container footer-menu">
    <div class="row">
        <div class="col-12">
            <a href="index.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                    <path data-name="Sigma symbol" class="svg-element"
                          d="M237.418,8583.56a12.688,12.688,0,0,0,.419-3.37c-0.036-5.24-2.691-9.68-7.024-13.2h-3.878a20.819,20.819,0,0,1,4.478,13.01c0,4.56-2.456,10.2-6.413,11.4a16.779,16.779,0,0,1-2.236.51c-10.005,1.55-14.109-17.54-9.489-23.31,2.569-3.21,6.206-4.08,11.525-4.08h17.935A24.22,24.22,0,0,1,237.418,8583.56Zm-12.145-24.45c-8.571.02-12.338,0.98-16.061,4.84-6.267,6.49-6.462,20.69,4.754,27.72a24.092,24.092,0,1,1,27.3-32.57h-16v0.01Z"
                          transform="translate(-195 -8544)"/>
                </svg>
            </a>
            <nav class="footer-menu__nav">
                <ul>
                    <li><a class="link link--gray" href="07_about.html">About</a></li>
                    <li><a class="link link--gray" href="08_faq.html">FAQ</a></li>
                    <li><a class="link link--gray" href="09_privacy.html">Privacy</a></li>
                    <li><a href="blog/12_blog.html" class="link link--gray">Blog</a></li>
                </ul>
            </nav>
            <p class="footer-menu__social">
                <a class="link link--gray" href="">
                    <i class="mdi mdi-twitter" aria-hidden="true"></i>
                </a>
                <a class="link link--gray" href="">
                    <i class="mdi mdi-facebook" aria-hidden="true"></i>
                </a>
                <a class="link link--gray" href="">
                    <i class="mdi mdi-linkedin" aria-hidden="true"></i>
                </a>
                <a class="link link--gray" href="">
                    <i class="mdi mdi-instagram" aria-hidden="true"></i>
                </a>
            </p>
        </div>
    </div>
</div>
<!--Footer menu-->

<hr>

<!--Footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>© 2017 Sigma – Featured as App Presentation HTML Template | Made by
                    <a href="http://themes.aspirity.com " class="link link--gray">Aspirity</a></p>
            </div>
        </div>
    </div>
</div>
<!--Footer-->

<script src="{{asset('js/front-end/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('js/front-end/vendor/jquery.waypoints.js')}}"></script>
<script src="{{asset('js/front-end/menu.js')}}"></script>
<script src="{{asset('js/front-end/mobile-menu.js')}}"></script>
<script src="{{asset('js/front-end/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/front-end/pricing.js')}}"></script>
<script src="{{asset('js/front-end/vendor/slick.min.js')}}"></script>
<script src="{{asset('js/front-end/vendor/dragscrollable.min.js')}}"></script>
<script src="{{asset('js/front-end/vendor/device.js')}}"></script>
<script src="{{asset('js/front-end/carousel.js')}}"></script>
<script src="{{asset('js/front-end/style-switcher.js')}}"></script>
</body>
</html>
