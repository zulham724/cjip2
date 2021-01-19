{{-- @extends('front-end.master.newest-master') --}}
@extends('layouts.consuloan')
@section('css')
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
            border-radius: 5px;
        }
        .carousel{
            width:100%;
            max-width:1280px;
            max-height:600px;
            font-family: 'Open Sans', sans-serif;
        }
        .carousel .item {
            position: relative;
        }
        .carousel .item .imageContainer {
            display:block;
            width:100%;
            position:relative;
            max-height:600px;
        }

        .carousel .item .imageContainer:before{
            content:"";
            position: absolute;
            top:0px;
            left:0px;
            color:red;
            width:100%;
            height:100%;
            background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.75) 90%, rgba(0,0,0,0.75) 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(90%,rgba(0,0,0,0.75)), color-stop(100%,rgba(0,0,0,0.75))); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.75) 90%,rgba(0,0,0,0.75) 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.75) 90%,rgba(0,0,0,0.75) 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.75) 90%,rgba(0,0,0,0.75) 100%); /* IE10+ */
            background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.75) 90%,rgba(0,0,0,0.75) 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#bf000000',GradientType=0 ); /* IE6-9 */
        }

        .carousel .item img {
            display:block;
            width:100%;
        }

        .carousel .item .overlay {
            z-index: 999;
            position:absolute;
            bottom:0px;
            left:0px;
            right:0px;
            color:#fff;
            padding: 30px 0px 70px 0px;

        }

        .carousel .item .overlay h3{
            text-align: center;
            font-size: 40px;
            font-weight: 300;
            padding-bottom: 20px;
            width: 70%;
            margin: 0 auto;
        }
        .carousel .item .overlay p{
            text-align: center;
            width: 60%;
            margin: 0 auto;
            font-size: 16px;
            font-weight: 300;
            line-height: 29px;
            color: rgba(255, 255, 255, 0.7);
        }


        .carousel .slick-dots{
            position:absolute;
            bottom:10px;
            z-index: 999;
        }

        .slick-dots li button:before
        {
            color: #fff;
        }

        .slick-dots li.slick-active button:before
        {
            color: #fff;
        }

        @media only screen and (min-width: 901px) and (max-width: 1100px) {
            .carousel {
                max-height:600px;
            }
            .carousel .item .imageContainer{
                max-height:600px;
            }

            .carousel .item .overlay{
                padding-bottom: 55px;
            }
            .carousel .item .overlay h3{
                width: 80%;
                font-size: 34px;
                line-height: 40px;
                padding-bottom:10px;
            }
            .carousel .item .overlay p{
                width: 65%;
                font-size:15px;
                line-height: 25px;
            }
        }

        @media only screen and (min-width: 651px) and (max-width: 900px) {
            .carousel .item .overlay{
                padding-bottom: 50px;
            }
            .carousel .item .overlay h3{
                width: 80%;
                font-size: 26px;
                line-height: 30px;
                padding-bottom:10px;
            }
            .carousel .item .overlay p{
                width: 70%;
                font-size:14px;
                line-height: 20px;
            }
        }

        @media only screen and (max-width: 650px) {
            .carousel .item .overlay{
                position: relative;
                background: inherit;
                color:#000;
                padding: 25px 20px 40px 20px;
            }
            .carousel .item .overlay h3{
                width: 100%;
                text-align: left;
                color: rgba(0,0,0,0.9);
                font-size: 27px;
                font-weight: 400;
                padding-bottom:10px;
            }
            .carousel .item .overlay p{
                width: 100%;
                text-align: left;
                color: rgba(102, 102, 102, 0.9);
                font-size:17px;
            }

            .carousel .slick-dots{
                bottom: -3px;
            }
            .slick-dots li button:before
            {
                color: #000;
            }

            .slick-dots li.slick-active button:before
            {
                color: #000;
            }

        }

        @media only screen and (max-width: 550px) {
            .carousel .item .overlay{
                padding: 15px 15px 40px 15px;
            }
            .carousel .item .overlay h3{
                font-size: 24px;
                line-height: 29px;
            }
            .carousel .item .overlay p{
                font-size:13px;
                line-height: 21px;
            }
        }

        @media only screen and (max-width: 450px) {
            .carousel .item .overlay h3{
                font-size: 20px;
                line-height: 25px;
            }
            .carousel .item .overlay p{
                font-size:13px;
                line-height: 21px;
            }
        }

        @import url('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800');
    </style>
@endsection
@section('header')
    <header class="header-home header-home--color">

        <div class="background background--clouds">
            @php $site_logo = Voyager::setting('site.logo', ''); @endphp
            <div class="container background background--right background--features background--header"
                 style="background-image: url({{asset('storage/'.$site_logo)}})">
                <div class="row">
                    <div class="col-12">
                        <h2 class="header-home__title header-home__title--features">Explore it, Invest on it</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
<div class="container">
    <div class="col-12 col-m-12">
        @if($cjibf->is_open == 1)
            <div class="card post__card post__card--comments">
                <p class="card__title" style="text-align: center">{{$cjibf->initial_name}} is now open</p>
                <div class="post__write-comment post__write-comment--main form form--comment">
                    <div class="header-home__btns header-home__btns-mobile" style="align-items: center" align="center">
                        <a href="{{route('frontend.cjibf')}}" class="site-btn site-btn--accent header-home__btn">Join CJIBF</a>
                    </div>
                    {{--<form class="form__form" action="{{route('store.interest')}}" method="post">
                        @csrf
                        <div class="form__form-group form__form-group--without-label">

                            <div class="form__input-icon-wrap">
                                <span class="form__input-icon"><i class="mdi mdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </form>--}}
                </div>
            </div>

        @else
            <div class="card post__card post__card--comments">
                <p class="card__title" style="text-align: center">Select <strong style="color: #ff5c72">sectors</strong> in which you like to <strong style="color: #ff5c72">invest</strong></p>
                <div class="post__write-comment post__write-comment--main form form--comment">
                    <select class="form__input form__input--select js-field__sector" name="sektor" id="sektor" title="Sector">
                        <option value="" selected disabled>Select Sektor</option>
                        @foreach($sektors as $sector)
                            <option value="{{$sector->id}}">{{$sector->name}}</option>
                        @endforeach
                    </select>

                    <div id="command" style="padding-left: 30px;padding-top: 30px; background-color: #ff4a52">
                        <h3 class="m-0" style="padding-bottom: 30px" align="center">Select Sector First</h3>
                    </div>

                    <div id="proyek"></div>
                    {{--<form class="form__form" action="{{route('store.interest')}}" method="post">
                        @csrf
                        <div class="form__form-group form__form-group--without-label">

                            <div class="form__input-icon-wrap">
                                <span class="form__input-icon"><i class="mdi mdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </form>--}}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection


@section('js')
    <script src="{{asset('js/front-end/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/front-end/vendor/slick.min.js')}}"></script>

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    {{--<script>
        $('#rp').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ".",
            digits: 3,
            autoGroup: true,
            /* prefix: 'Rp. ',*/ //Space after $, this will not truncate the first character.
            rightAlign: false,
            oncleared: function () {
                self.Value('');
            }
        });
    </script>
    <script>
        $('#usd').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ".",
            digits: 3,
            autoGroup: true,
            /* prefix: 'Rp. ',*/ //Space after $, this will not truncate the first character.
            rightAlign: false,
            oncleared: function () {
                self.Value('');
            }
        });
    </script>
    <script>
        var alarmInput = $('#alarm_action');
        alarmInput.on('change', function () {
            var rp = $('#rp');
            var usd = $('#usd');
            //this == alarmInput within this change handler
            switch ($(this).val()) {
                case 'rupiah':
                    rp.show();
                    usd.hide();
                    break;
                case 'dollar':
                    rp.hide();
                    usd.show();
                    break;
            }
        });
    </script>--}}
    <script>
        $(document).ready(function(){


            $('#sektor').change(function(){

                var e = document.getElementById("sektor");
                var id = e.options[e.selectedIndex].value;
                console.log(id);
                $('#proyek').load('/interest-sector/'+id).fadeIn('slow');
                $('#command').hide();
            });
        });
    </script>
@endsection
