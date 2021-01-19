<div class="row" style="padding-top: 2%">
    <div id="load" style="position: relative;">
        @foreach($ikan as $w)
            <div class="col-md-12">
                <div class="blog-entry ftco-animate">
                    <a href="#" class="blog-image">
                        @php
                            $images = json_decode($w->potensiId->foto)
                        @endphp
                        @foreach($images as $image)
                            <img src="{{ Voyager::image($image) }}" class="img-fluid" alt="">
                        @endforeach
                    </a>
                    <div class="text py-4">
                        <div class="meta">
                            <div><a href="#">{{ \Carbon\Carbon::parse($w->created_at)->diffForHumans() }}</a></div>
                            <div><a href="#" style="color:#aadaff; font-weight: bolder">- {{$w->userId->name}} -</a></div>
                        </div>
                        <h3 class="heading"><a href="#">{{$w->nama_wisata}}</a></h3>
                        <p>{{$w->luas}} Ha</p>
                        <p>{!! str_limit($w->keterangan, 300, '....')!!} <a href='{{route('perikanan.detail', $w->id)}}' class='btn btn-primary'>Read More</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
