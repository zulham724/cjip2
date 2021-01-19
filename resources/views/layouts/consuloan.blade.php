<!DOCTYPE html>

<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->

    <meta charset="utf-8">

    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>



    <meta name="author" content="themesflat.com">



    <!-- Mobile Specific Metas -->

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



    <!-- Bootstrap  -->

    <link rel="stylesheet" type="text/css" href="/consuloan/stylesheets/bootstrap.css">



    <!-- Theme Style -->

    <link rel="stylesheet" type="text/css" href="/consuloan/stylesheets/style.css">



    <!-- Responsive -->

    <link rel="stylesheet" type="text/css" href="/consuloan/stylesheets/responsive.css">



    <!-- Colors -->

    <link rel="stylesheet" type="text/css" href="/consuloan/stylesheets/colors/color1.css" id="colors">



    <!-- Animation Style -->

    <link rel="stylesheet" type="text/css" href="/consuloan/stylesheets/animate.css">



    <!-- Animation headline Style -->

    <link rel="stylesheet" type="text/css" href="/consuloan/stylesheets/headline.css">



    <!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="/consuloan/revolution/css/layers.css">

    <link rel="stylesheet" type="text/css" href="/consuloan/revolution/css/settings.css">
    {{-- font cjip  --}}
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100&family=Quicksand:wght@300&display=swap" rel="stylesheet">


    <!-- Favicon and touch icons  -->

    <link href="/images/logo-white.png" rel="icon"> {{-- main js --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@2.6.0/assets/css/leaflet.css"> @yield('css')
    <script src="{{mix('js/app.js')}}" defer></script>

    <!--[if lt IE 9]>

        <script src="/consuloan/javascript/html5shiv.js"></script>

        <script src="/consuloan/javascript/respond.min.js"></script>

    <![endif]-->

    <style>
        #app{
            /* font-family: 'Barlow', sans-serif; */
            font-family: 'Quicksand', sans-serif;
        }
    </style>

</head>

<body class="header_sticky">

    <!-- Preloader -->

    <div id="loading-overlay">

        <div class="loader"></div>

    </div>



    <!-- Boxed -->

    <v-app class="boxed" id="app">

        <div class="flat-header-wrap">

            <!-- Header -->
            <header id="header" class="header header-style2 box-shadow1 bg-white header-classic" style="background-color:rgb(42, 98, 245)">
                <div class="container" style="padding:0">
                    <div class="row" style="padding:0">
                        <div class="col-lg-3" style="padding:0">
                            <div id="logo" class="logo" @click="$router.push('/')">
                                <a href="#" rel="home">
                                <img src="/images/logo-white.png" alt="image">
                            </a>
                            </div>
                            <!-- /.logo -->
                        </div>
                        <div class="col-lg-9" style="padding:0">
                            <div class="flat-wrap-header">
                                <div class="nav-wrap clearfix">
                                    <nav id="mainnav" class="mainnav style2 color-661 float-left">
                                        <ul class="menu">
                                            <li><a href="/home#/">
                                            {{-- @{{TranslateModule.contents.menu1}} --}}
                                            Home
                                        </a></li>
                                            <li><a href="/home#/jatengprofile">@{{TranslateModule.contents.menu2}}</a></li>
                                            <li>
                                                <a href="#">@{{TranslateModule.contents.menu3}}</a>
                                                <ul class="submenu">
                                                    <li><a href="/home#/projectreadiness">@{{TranslateModule.contents.menu7}}</a></li>
                                                    <li><a href="/home#/sector">@{{TranslateModule.contents.menu8}}</a></li>
                                                    <li><a href="/home#/location">@{{TranslateModule.contents.menu6}}</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/home#/faqs">@{{TranslateModule.contents.menu4}}</a></li>
                                            <li v-if="AuthModule.auth"><a href="/home#/invest">@{{TranslateModule.contents.menu9}}</a></li>
                                            <li><a href="/home#/berita">@{{TranslateModule.contents.menu5}}</a></li>
                                            <li v-if="AuthModule.auth">
                                                <a {{-- :href="`/dashboard/${AuthModule.auth.id}`" --}} href="/panel-investor">@{{TranslateModule.contents.menu10}}
                                            </a>
                                            </li>

                                            {{-- <a v-if="AuthModule.auth"><a href="/home#/editprofile">Profil</a></a> --}}
                                        </ul>
                                    </nav>
                                    <!-- /.mainnav -->
                                    <ul class="menu menu-extra style2 color-661">
                                        <li v-for="language in TranslateModule.languages" :key="language" @click="updateTranslate(language)">
                                            <a href="#">@{{language.name}}</a>
                                        </li>
                                        <li>
                                            <auth-component></auth-component>
                                        </li>
                                    </ul>
                                    <div class="btn-menu">
                                        <span></span>
                                    </div>
                                    <!-- //mobile menu button -->
                                </div>
                                <!-- /.nav-wrap -->

                            </div>
                        </div>
                    </div>
                </div>
            </header>

        </div>

        @yield('content')

        <!-- Footer -->

        <footer class="footer widget-footer">

            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-sm-6 reponsive-mb30">

                        <div class="widget-logo">

                            <div id="logo-footer" class="logo">

                                <a href="index.html" rel="home">

                                    <img src="/images/logo-white.png" alt="image">

                                </a>

                            </div>

                            <p>@{{TranslateModule.contents.app_name}}</p>

                            <ul class="flat-information">

                                <li><i class="fa fa-map-marker"></i><a>Jl. Mgr Sugiyopranoto No.1, Pendrikan Kidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50131</a></li>

                                <li><i class="fa fa-phone"></i><a>(024) 3547091</a></li>

                                <li><i class="fa fa-envelope"></i><a>cjibf.jateng@gmail.com</a></li>

                            </ul>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-lg-3 col-sm-6 reponsive-mb30">

                        <div class="widget widget-out-link clearfix">

                            <h5 class="widget-title">@{{TranslateModule.contents.menu5}}</h5>

                            <ul class="menu" v-if="posts != null">
                                <li v-for="post in posts.data.slice(0, 3)" :key="post.id"><a class="white--text" :href="`/berita/${post.slug}`">@{{post.title}}</a></li>
                            </ul>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-lg-3 col-sm-6 reponsive-mb30">

                        <div class="widget widget-out-link clearfix">

                            <h5 class="widget-title">@{{TranslateModule.contents.link}}</h5>

                            <ul class="menu">

                                <li><a class="white--text" href="/home#/">@{{TranslateModule.contents.menu1}}</a></li>
                                <li><a class="white--text" href="/home#/jatengprofile">@{{TranslateModule.contents.menu2}}</a></li>
                                <li>
                                    <a class="white--text" href="#">@{{TranslateModule.contents.menu3}}</a>
                                    <ul class="submenu">
                                        <li><a class="white--text" href="/home#/projectreadiness">@{{TranslateModule.contents.menu7}}</a></li>
                                        <li><a class="white--text" href="/home#/sector">@{{TranslateModule.contents.menu8}}</a></li>
                                    </ul>
                                </li>
                                <li><a class="white--text" href="/home#/faqs">@{{TranslateModule.contents.menu4}}</a></li>
                                <li v-if="AuthModule.auth"><a class="white--text" href="/home#/invest">@{{TranslateModule.contents.menu9}}</a></li>
                                <li><a class="white--text" href="/home#/berita">@{{TranslateModule.contents.menu5}}</a></li>
                                {{-- <a v-if="AuthModule.auth"><a class="white--text" :href="`/dashboard/${AuthModule.auth.id}`">@{{TranslateModule.contents.menu10}}</a></a> --}}
                                <li><a class="white--text" href="/home#/location">@{{TranslateModule.contents.menu6}}</a></li>
                            </ul>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-lg-3 col-sm-6 reponsive-mb30">

                        <div class="widget widget-letter">

                            <h5 class="widget-title">@{{TranslateModule.contents.link}}</h5>

                            <ul class="menu">

                                <li><a class="white--text" href="https://web.dpmptsp.jatengprov.go.id">DPMTPSP Jawa Tengah</a></li>
                                <li><a class="white--text" href="https://lkpmonline.bkpm.go.id">LKPM Online</a></li>
                                <li><a class="white--text" href="https://perizinan.jatengprov.go.id">SIAP Jawa Tengah</a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->

        </footer>



        {{--
        <!-- Bottom -->

        <div class="bottom">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-sm-6">

                        <div class="copyright">

                            <p>@2017 <a href="https://ardata.co.id">CV Ardata</a>. All rights reserved.

                            </p>

                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6">

                        <ul class="social-links style2 text-right">

                            <li><a href="https://www.facebook.com/dinas.pmptsp.96"><i class="fa fa-facebook"></i></a></li>

                            <li><a href="https://twitter.com/DPMPTSPJateng"><i class="fa fa-twitter"></i></a></li>

                            <li><a href="https://www.instagram.com/ptspjateng/"><i class="fa fa-instagram"></i></a></li>

                        </ul>

                    </div>

                </div>

            </div>
            <!-- /.container -->

        </div>
        <!-- bottom -->--}}

        <v-fab-transition>
            <v-btn target="_blank" style="z-index:10000" href="https://wa.wizard.id/9ce3da" color="green" dark fixed bottom right fab>
                <v-icon>mdi-message</v-icon>
            </v-btn>
        </v-fab-transition>

    </v-app>

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143558094-1"></script>
    <script type="application/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-143558094-1');
    </script>


    <!-- Javascript -->

    <script src="/consuloan/javascript/jquery.min.js"></script>

    <script src="/consuloan/javascript/tether.min.js"></script>

    <script src="/consuloan/javascript/bootstrap.min.js"></script>

    <script src="/consuloan/javascript/jquery.easing.js"></script>

    <script src="/consuloan/javascript/jquery-waypoints.js"></script>

    <script src="/consuloan/javascript/jquery-validate.js"></script>

    <script src="/consuloan/javascript/jquery.cookie.js"></script>

    <script src="/consuloan/javascript/smoothscroll.js"></script>

    <script src="/consuloan/javascript/owl.carousel.js"></script>

    <script src="/consuloan/javascript/jquery.flexslider-min.js"></script>

    <script src="/consuloan/javascript/headline.js"></script>

    <script src="/consuloan/javascript/parallax.js"></script>

    {{--
    <script src="/consuloan/javascript/switcher.js"></script> --}}

    <script src="/consuloan/javascript/main.js"></script>



    <!-- Revolution Slider -->

    <script src="/consuloan/revolution/js/jquery.themepunch.tools.min.js"></script>

    <script src="/consuloan/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script src="/consuloan/revolution/js/slider.js"></script>



    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

    <script src="/consuloan/revolution/js/extensions/revolution.extension.actions.min.js"></script>

    <script src="/consuloan/revolution/js/extensions/revolution.extension.carousel.min.js"></script>

    <script src="/consuloan/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>

    <script src="/consuloan/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>

    <script src="/consuloan/revolution/js/extensions/revolution.extension.migration.min.js"></script>

    <script src="/consuloan/revolution/js/extensions/revolution.extension.navigation.min.js"></script>

    <script src="/consuloan/revolution/js/extensions/revolution.extension.parallax.min.js"></script>

    <script src="/consuloan/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    @yield('js')

</body>

</html>
