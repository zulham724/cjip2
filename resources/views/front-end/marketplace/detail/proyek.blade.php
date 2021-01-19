<div class="row">
    @foreach($proyeks as $proyek)
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card card-small card-post card-post--aside card-post--1">
                @php
                    $image = json_decode($proyek->fotos)
                @endphp
                <div class="card-post__image" style="background-image: url({{Voyager::image($image[0])}});">
                    <a href="#" class="card-post__category badge badge-pill badge-info">{{$proyek->byUser->namakota[0]->nama}}</a>
                    <div class="card-post__author d-flex">
                        <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url({{Voyager::image($proyek->byUser->avatar)}});">{{$proyek->byUser->namakota[0]->nama}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-fiord-blue" href="{{route('detail.proyek', $proyek->id)}}" target="_blank">{{$proyek->project_name}}</a>
                    </h5>
                    <p class="card-text d-inline-block mb-3">{{ str_limit($proyek->translate('en')->latar_belakang, $limit = 100, $end = '...') }}</p>
                    <div class="blog-comments__actions">
                        <div class="btn-group btn-group-sm">
                            @if($proyek->market_id == 1)
                                <a href="{{route('detail.proyek', $proyek->id)}}" target="_blank">
                                    <button type="button" class="btn btn-white">
                      <span class="text-success">
                        <i class="material-icons">star</i>
                      </span> {{$proyek->marketplace->name}}
                                    </button>
                                </a>
                            @elseif($proyek->market_id == 2)
                                <a href="{{route('detail.proyek', $proyek->id)}}" target="_blank">
                                    <button type="button" class="btn btn-white">
                      <span class="text-danger">
                        <i class="material-icons">star_border</i>
                      </span> {{$proyek->marketplace->name}}
                                    </button>
                                </a>
                            @else
                                <a href="{{route('detail.proyek', $proyek->id)}}" target="_blank">
                                    <button type="button" class="btn btn-white">
                      <span class="text-light">
                        <i class="material-icons">star_half</i>
                      </span> {{$proyek->marketplace->name}}
                                    </button>
                                </a>
                            @endif
                            <button type="button" class="btn btn-white">
                      <span class="text-light">
                        <i class="material-icons">person_pin</i>
                      </span> {{$proyek->byUser->namakota[0]->nama}}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top d-flex">
                    <form action="{{route('join.cjibf')}}" method="post">
                        @csrf
                        <input type="text" class="form-control" name="profil" value="{{$profile->id}}" hidden>
                        <input type="text" class="form-control" name="kabkota" value="{{$proyek->kab_kota_id}}" hidden>
                        <input type="text" class="form-control" name="sektor" value="{{$proyek->bySector->name}}" hidden>
                        <input type="text" class="form-control" name="project_id" value="{{$proyek->id}}" hidden>
                        <div class="my-auto ml-auto" align="center">
                            <button type="submit" id="cjibf1" class="btn btn-accent"> <i class="far fa-send mr-1"></i> Select This Project</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endforeach
</div>