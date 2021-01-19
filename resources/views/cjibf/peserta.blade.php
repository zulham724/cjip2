<div class="row">
    <div class="col">
        <div class="card card-small mb-4">
            <div class="card-header">
                <a href="{{route('loi.manual')}}">
                    <button class="btn btn-info block-6">Isi Manual</button>
                </a>
                @if(app('VoyagerAuth')->user()->hasRole('kab'))

                @else
                <a href="{{route('cetak.daftar-hadir')}}">
                    <button class="btn btn-info block-6">Cetak Daftar Hadir</button>
                </a>
                <a href="{{route('cetakpermeja.daftar-hadir')}}">
                    <button class="btn btn-info block-6">Cetak Daftar Hadir per Meja</button>
                </a>
                @endif
            </div>
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                    <tr style="text-align: center !important;">
                        <th scope="col" class="border-0" style="text-align: center">#</th>
                        <th scope="col" class="border-0" style="text-align: center">Nama Perusahaan</th>
                        <th scope="col" class="border-0" style="text-align: center">Kab/Kota</th>
                        <th scope="col" class="border-0" style="text-align: center">Sektor</th>
                        <th scope="col" class="border-0" style="text-align: center">Meja</th>
                        <th scope="col" class="border-0" style="text-align: center">Nilai Investasi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(app('VoyagerAuth')->user()->hasRole('kab'))
                        @foreach($pesertakabs as $pesertakab)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pesertakab->profil->nama_perusahaan}}, {{$pesertakab->profil->badan_hukum}}</td>
                                <td>{{$pesertakab->user->name}}</td>
                                <td>{{$pesertakab->sektor_interest}}</td>
                                <td>{{$pesertakab->meja_id}}</td>
                                <td>
                                    @if(is_null($pesertakab->loi_id))
                                        <a href="{{route('loi.cjibf', [$pesertakab->profile_id, $pesertakab->id])}}">
                                            <button class="btn btn-warning">Isi</button>
                                        </a>
                                    @else
                                        @if(is_null($pesertakab->loi->nilai_usd) || ($pesertakab->loi->nilai_usd) == 0)
                                            @isset($pesertakab->loi->nilai_rp)
                                                Rp. {{number_format($pesertakab->loi->nilai_rp)}}
                                            @endisset
                                        @else
                                            @isset($pesertakab->loi->nilai_usd)
                                            USD {{number_format($pesertakab->loi->nilai_usd)}}

                                            @endisset
                                        @endif

                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    @else
                        @isset($pesertas)
                        @foreach($pesertas as $peserta)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @isset($peserta->profil->nama_perusahaan)
                                    {{$peserta->profil->nama_perusahaan}}, {{$peserta->profil->badan_hukum}}
                                    @endisset
                                </td>
                                <td>
                                    @isset($peserta->user->name)
                                    {{$peserta->user->name}}
                                    @endisset
                                </td>
                                <td>{{$peserta->sektor_interest}}</td>
                                <td>{{$peserta->meja_id}}</td>
                                <td>
                                    @if(is_null($peserta->loi_id))
                                        <a href="{{route('loi.cjibf', [$peserta->profile_id, $peserta->id])}}">
                                            <button class="btn btn-warning">Isi</button>
                                        </a>
                                    @else
                                        @isset($peserta->loi->nilai_usd)
                                            @if($peserta->loi->nilai_usd == 0)
                                                Rp. {{number_format($peserta->loi->nilai_rp)}}
                                            @else
                                                USD {{number_format($peserta->loi->nilai_usd)}}
                                            @endif
                                        @endisset
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @endisset
                    @endif

                    </tbody>
                    {{$pesertas->links()}}
                </table>
            </div>
        </div>
    </div>
</div>
