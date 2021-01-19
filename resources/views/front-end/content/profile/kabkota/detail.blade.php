@extends('front-end.master.newest-master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/front-end/youtube.css')}}">
@endsection
@section('header')
    <header class="header-home header-home--color">
        <div class="background background--wave">

            <div class="container background background--right background--features background--header"
                 style="">
                <div class="row">
                    <div class="col-12">
                        <h2 class="header-home__title header-home__title--features">Central Java's Profile</h2>
                        <p class="header-home__description header-home__description--big header-home__description--faq"></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="col-12 col-m-12">
        <section class="section">
            <div class="container">
                @isset($bupatis)

                    <div class="row about-app">
                        <div class="col-6 about-app__description">
                            <div class="about-app__description-content about-app__description-content--left">
                                <h4 class="about-app__description-title">Visi Misi</h4>
                                <span class="text">
                                    <p>
                                        {!! $bupatis->visi_misi !!}
                                    </p>
                                </span>
                            </div>
                        </div>
                        <div class="col-3 about-app__img">
                            <div class="about-app__img-wrap">
                                <img alt="" src="{{Voyager::image($bupatis->foto_bupati)}}">
                                <p style="font-weight: 500; color: #c82333">{{ $bupatis->nama_bupati }}</p>
                            </div>
                        </div>
                        <div class="col-3 about-app__img">
                            <div class="about-app__img-wrap">
                                <img alt="" src="{{Voyager::image($bupatis->foto_wabup)}}">
                                <p style="font-weight: 500; color: #c82333">{{ $bupatis->nama_wabup }}</p>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($kadins)
                        <div class="row about-app about-app--reverse">
                            <div class="col-6 about-app__description">
                                <div class="about-app__description-content">
                                    <h4 class="about-app__description-title">Profil Kepala {{$kadins->userId->name}}</h4>
                                    <p>{!! $kadins->profil !!}</p>
                                </div>
                            </div>
                            <div class="col-6 about-app__img about-app__img--left">
                                <div class="about-app__img-wrap">
                                    <img alt="" src="{{ Voyager::image($kadins->foto_kadin) }}">
                                </div>
                            </div>
                        </div>


                <hr>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">Explore {{ $kadins->userId->name }}<br/>
                            Watch the video.</h3>
                    </div>
                </div>
                @endisset

                    <div class="konten">
                        <div class="video-player">
                            <div class="video-player__playing">
                                <div class="embed-container">
                                    <div id="player"></div>
                                </div>
                            </div>


                            @if($videos->isNotEmpty())
                                <div class="video-player__thumbs">
                                    @foreach($my_array_of_vars as $id)
                                        <div data-video="{{$id}}" id="idnya" class="video-thumb active"><img src="https://img.youtube.com/vi/{{$id}}/hqdefault.jpg"></div>
                                    @endforeach
                                </div>
                            @else
                                <div class="video-player__thumbs">
                                    <div data-video="" id="idnya" class="video-thumb active"><img src="https://img.youtube.com/vi/hqdefault.jpg"></div>
                                </div>
                            @endif
                       </div>
                    </div>

                <hr>
            </div>
        </section>

        @isset($batas_wilayahs)
        <section class="section">
            <div class="container">
                <div class="col-12">
                    <h3 class="section__title">Luas Wilayah {{$batas_wilayahs->userId->name}}</h3>
                </div>
                    {!! $chart->container() !!}
                <hr>
            </div>
        </section>
        @endisset



        <section class="section">
            <div class="container">
                <div class="col-12">
                    <div class="col-12">
                    </div>
                    <div id="penduduk">

                    </div>
                </div>
            </div>
        </section>


        <section class="section">
            <div class="container">
                @isset($batas_wilayahs)
                    <div class="row about-app about-app--reverse">
                        <div class="col-12">
                            <h3 class="section__title">Batas Wilayah {{$batas_wilayahs->userId->name}}</h3>
                        </div>
                        <div class="col-4 about-app__description">
                            <div class="about-app__description-content">
                                <p>{!! $batas_wilayahs->batas_wilayah !!}</p>
                            </div>
                        </div>
                        <div class="col-8 about-app__img about-app__img--left">
                            <div class="about-app__img-wrap">
                                @php
                                    $images = json_decode($batas_wilayahs->foto_batas)
                                @endphp
                                @foreach((array)$images as $foto)
                                <img alt="" src="{{ Voyager::image($foto) }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </section>

        <section class="section">
            <div class="container">
                @isset($luas_penggunaans)
                    <div class="row about-app about-app--reverse">
                        <div class="col-12">
                            <h3 class="section__title">Luas Wilayah Penggunaan {{$luas_penggunaans->userId->name}}</h3>
                        </div>
                        <div class="col-10 about-app__description">
                            <div class="about-app__description-content">
                                <p>{!! $luas_penggunaans->luas_wilayah_penggunaan !!}</p><br>
                                <p>Sumber Data : {{$luas_penggunaans->sumber_data}}</p>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="col-12">
                    <div class="col-12">
                    </div>
                    <div id="umr">

                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">UMKM</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="site-table">
                            <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe">
                                <thead class="site-table__head">
                                <tr>
                                   <th>Nama Perusahaan</th>
                                   <th>Alamat</th>
                                   <th>Jenis Usaha</th>
                                   <th>Nilai Investasi</th>
                                   <th>Jumlah Karyawan</th>
                                   <th>Status Badan Hukum</th>
                                </tr>
                                </thead>
                                <tbody class="site-table__body">
                                @foreach($umkms as $umkm)
                                <tr class="site-table__row">
                                    <th class="site-table__th">{{$umkm->nama_perusahaan}}</th>
                                    <td class="site-table__td"><p>{{$umkm->alamat}}</p></td>
                                    <td class="site-table__td"><p>{{$umkm->jns_usaha}}</p></td>
                                    <td class="site-table__td"><p>{{$umkm->nilai_investasi}}</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>{{$umkm->jml_karyawan}}</p></td>
                                    <td class="site-table__td site-table__td--bold"><p>{{$umkm->status_badan_hukum}}</p></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@section('js')
    @if($videos->isNotEmpty())
    <script>
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;
        var idnya = document.getElementById('idnya');

        //console.log({{$id}});

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '315',
                width: '560',
                videoId: '{{$id}}',
                events: {
                    'onReady': function() {
                        $(".video-thumb").click(function() {
                            var $this = $(this);
                            if (!$this.hasClass("active")) {
                                player.loadVideoById($this.attr("data-video"));
                                $this.addClass("active").siblings().removeClass("active");
                            }
                        });
                    }
                }
            });
        }
    </script>
    @endif
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        // Data gathered from http://populationpyramid.net/germany/2015/

        // Age categories
        var categories = [];
        var pria = [];
        var wanita = [];

        var test = {!! $tes !!};

        var i;
                for(i=0; i<test.length; i++){
                    categories.push(test[i].kecamatan_id);
                    pria.push(-Math.abs(test[i].lelaki));
                    wanita.push(test[i].perempuan);
                }
        var sumber = test[0].sumber_data;

            Highcharts.chart('penduduk', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Kepadatan Penduduk '+test[0].kab_kota_id
            },
            subtitle: {
                text: 'Source: '+sumber
            },
            xAxis: [{
                categories: categories,
                reversed: false,
                labels: {
                    step: 1
                }
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0,
                labels: {
                    step: 1
                }
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return Math.abs(this.value);
                    }
                }
            },

            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + ', kecamatan ' + this.point.category + '</b><br/>' +
                        'Population: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
                }
            },
                credits: {
                    enabled: false
                },
            series: [{
                name: 'Male',
                data: pria,
            }, {
                name: 'Female',
                data: wanita
            }]
        });

    </script>
    <script>
        /*JS FOR SCROLLING THE ROW OF THUMBNAILS*/
        $(document).ready(function () {
            $('.vid-item').each(function(index){
                $(this).on('click', function(){
                    var current_index = index+1;
                    $('.vid-item .thumb').removeClass('active');
                    $('.vid-item:nth-child('+current_index+') .thumb').addClass('active');
                });
            });
        });
    </script>
    <script>
        function moreLess(initiallyVisibleCharacters) {
            var visibleCharacters = initiallyVisibleCharacters;
            var paragraph = $(".text");




            paragraph.each(function() {
                var text = $(this).text();
                var wholeText = text.slice(0, visibleCharacters) + "<span class='ellipsis'>... </span><a href='#' class='more'>MORE<i class='fa fa-arrow-circle-o-down' aria-hidden='true'></i></a>" + "<span style='display:none'>" + text.slice(visibleCharacters, text.length) + "<a href='#' class='less'> LESS<i class='fa fa-arrow-circle-o-up' aria-hidden='true'></i></a></span>"

                if (text.length < visibleCharacters) {
                    return
                } else {
                    $(this).html(wholeText)
                }
            });
            $(".more").click(function(e) {
                e.preventDefault();
                $(this).hide().prev().hide();
                $(this).next().show();
            });
            $(".less").click(function(e) {
                e.preventDefault();
                $(this).parent().hide().prev().show().prev().show();
            });
        };

        moreLess(300);
    </script>
    <script>
        var tahun = [];
        var umr = [];
        var umrs = {!! $umrs !!};
        /*console.log(umrs);*/
        var i;

        for(i=0; i<umrs.length; i++){
            tahun.push(umrs[i].tahun);
            umr.push(Math.abs(umrs[i].nilai_umr));
        }
        /*console.log(tahun)
        console.log(umrs)*/
        var sumber = umrs[0].sumber_data;
        //console.log(umr);
        Highcharts.chart('umr', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'UMR'
            },
            subtitle: {
                text: 'Source: '+sumber
            },
            xAxis: {
                categories: tahun,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Juta (Rp)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: Rp </td>' +
                    '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'UMR',
                data: umr

            }]
        });
    </script>
    <script>
        $(document).ready(function() {
            // Configure/customize these variables.
            var showChar = 100;  // How many characters are shown by default
            var ellipsestext = "...";
            var moretext = "Show more >";
            var lesstext = "Show less";


            $('.more').each(function() {
                var content = $(this).html();


                if(content.length > showChar) {
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);
                    console.log(h);

                    var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                    $(this).html(html);
                }

            });

            $(".morelink").click(function(){
                if($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });
        });
    </script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    {!! ($chart->script()) !!}
@endsection

