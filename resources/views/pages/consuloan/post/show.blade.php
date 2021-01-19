@extends('layouts.consuloan')

@section('css')
    <meta name="title" content="{{$post->seo_title}}">
    <meta name="description" content="{{$post->meta_description}}">
    <meta name="keywords" content="{{$post->meta_keywords}}">
@endsection

@section('content')
<!-- Page title -->
<div class="page-title parallax parallax1" style="padding: 10px 0 30px">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Berita</h1>
                </div>
                <!-- /.page-title-captions -->
                <div class="breadcrumbs">
                    <ul>
                        <li class="home">
                            <i class="fa fa-home"></i
                            ><a href="#">Home</a>
                        </li>
                        <li>Berita Terbaru</li>
                    </ul>
                </div>
                <!-- /.breadcrumbs -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.page-title -->

<!-- Services Details -->
<section class="flat-row services-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="item-wrap">
                    <div class="item item-details">
                        <div class="featured-item">
                                <img
                                    style="width:100%"
                                    src="http://cjip.jatengprov.go.id/storage/{{$post->image}}"
                                    alt="image"
                                />
                        </div>
                        <!-- /.feature-post -->
                        <div class="content-item">
                        <h2 class="title-item">{{$post->title}}</h2>
                        {!! $post->body !!}
                        </div>
                        <!-- /.content-item -->
                    </div>
                    <!-- /.item -->
                </div>
                <!-- /.item-wrap -->
            </div>
            <!-- /.Col-lg-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
@endsection

