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
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section__title">Review of Investment Opportunities</h3>
                        <p class="section__description"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-m-12">
                        <div class="site-table">
                            <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe">
                                <thead class="site-table__head">
                                <tr>
                                    <th class="site-table__head-th site-table__head-th--other-color-1">
                                        <p>Nama Kajian</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--accent">
                                        <p>Penyusun</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--other-color-2">
                                        <p>Sektor</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--other-color-3">
                                        <p>Tahun</p>
                                    </th>
                                    <th class="site-table__head-th site-table__head-th--other-color-3">
                                        <p>File</p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="site-table__body">
                                @foreach($files as $dahir)
                                    <?php $file = (json_decode($dahir->file))[0]->download_link; ?>

                                    <tr class="site-table__row">
                                        <td class="site-table__td">{{$dahir->nama_doc}}</td>
                                        <td class="site-table__td"><p>{{$dahir->penyusun}}</p></td>
                                        <td class="site-table__td"><p>{{$dahir->sektor_id}}</p></td>
                                        <td class="site-table__td"><p>{{$dahir->tahun}}</p></td>
                                        <td class="site-table__td site-table__td--bold"><p><a href="{{Storage::disk(config('voyager.storage.disk'))->url($file)}}" class="site-btn site-btn--light site-btn--max-width">Download</a></p></td>
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


