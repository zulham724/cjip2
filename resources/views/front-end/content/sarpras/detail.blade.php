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
        @foreach($sarpras_detail as $item)
            @if($sarpras == 'kawasan_industris')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_kawasan}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                    @php
                                        $images = json_decode($item->foto)
                                    @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_kawasan}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Kawasan
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_kawasan }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-left: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; padding-bottom: 16px; margin-top: 0;
                    margin-bottom: 0;">
                                        Jenis Kawasan
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; padding-bottom: 16px; margin-top: 0;
                    margin-bottom: 0;">
                                        <b>{{ $item->kawasan_cat }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--2-->

                            <!--3-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                            <div class="tags post__tags">
                                <a href="{{route('maps.ki', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                                </a>
                            </div>


                        <hr/>
                    </div>

                </div>
                @elseif($sarpras == 'bandaras')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_bandara}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_bandara}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Bandara
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_bandara }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.bandara', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>

                </div>
                @elseif($sarpras == 'pelabuhans')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_pelabuhan}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_pelabuhan}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Pelabuhan
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_pelabuhan }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.pelabuhan', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'keretas')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_jalur}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_jalur}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Jalur Kereta
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_jalur }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.kereta', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'listriks')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_jalur}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_jalur}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Jalur Listrik
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_jalur }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.listrik', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'jalur_gas')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_jalur}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_jalur}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Jalur Gas
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_jalur }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.gas', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'waduks')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_waduk}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_waduk}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Waduk
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_waduk }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.waduk', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'tols')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_tol}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_tol}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Tol
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_tol }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.tol', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'smks')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_smk}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_smk}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama SMK
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_smk }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.smk', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'bpks')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_bpk}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_bpk}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama BPK
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_bpk }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.bpk', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'lpks')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_lpk}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_lpk}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama LPK
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_lpk }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.lpk', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @elseif($sarpras == 'banks')
                <div class="card post__card">

                    <div class="post__header">
                        <div class="believe" style="float: left;">
                            <img alt="{{ $item->userId->name }}" class="believe__avatar"
                                 src="{{Voyager::image($item->userId->avatar)}}">

                        </div>
                        <h3 class="post__title">{{$item->nama_bank}}</h3>
                    </div>

                    <article class="post__content">
                        <div class="carousel">
                            <div class="slider carousel__slider--images">
                                @php
                                    $images = json_decode($item->foto)
                                @endphp

                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="carousel__slide">
                                            <img src="{{Voyager::image($image)}}" alt="{{asset('images/notfound.jpg')}}">
                                            <p class="carousel__caption">{{$item->nama_bank}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; border: solid 2px #e5f0ff;">

                            <!--1-->
                            <tr>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-left: 16px;min-width: 30%" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: left; font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        Nama Bank
                                    </p>
                                </td>
                                <td align="left" style="vertical-align: top; padding-top: 16px; padding-right: 16px;" valign="top">
                                    <p style="background-color: #e5f0ff; text-align: right; font-size: 14px; font-family: sans-serif;
                    color: #4c6280; padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                        <b>{{ $item->nama_bank }}</b>
                                    </p>
                                </td>
                            </tr>
                            <!--1-->

                            <!--2-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="center">
                                    <b>{!! $item->keterangan !!}</b>
                                </td>
                            </tr>
                            <!--3-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                            <!--separator-->
                            <tr>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                                <td style="background-color: #e5f0ff; height: 2px;" height="2px"></td>
                            </tr>
                            <!--separator-->

                            <!--4-->
                            <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: left; color: #7d93b2;
                  padding-top: 18px; padding-left: 32px" valign="top" align="left">
                                    Sumber Data
                                </td>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: right; color: #4c6280;
                padding-top: 18px; padding-right: 32px" valign="top" align="right">
                                    <b>{{$item->sumber_data}}</b>
                                </td>
                            </tr>
                            <!--4-->

                            <!--paddingRow-->
                            <tr>
                                <td style="padding-bottom: 16px"></td>
                            </tr>
                            <!--paddingRow-->

                        </table>


                    </article>
                    <div class="post__bottom">

                        <div class="tags post__tags">
                            <a href="{{route('maps.bank', $item->id)}}">
                                <span class="site-btn site-btn--light tags__tag">See on Map</span>
                            </a>
                        </div>


                        <hr/>
                    </div>
                </div>
                @else
                <div class="card post__card">
                    <div class="post__header">
                        <p class="post__category">Sorry, this page is under maintenance</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
{{--@section('right')
    @include('front-end.sidebar')
@endsection--}}

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
@endsection
