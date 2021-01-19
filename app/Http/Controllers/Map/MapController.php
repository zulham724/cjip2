<?php

namespace App\Http\Controllers\Map;

use App\CjibfSektor;
use App\JenisMarketplace;
use App\KabKota;
use App\Lois;
use App\Models\UMKM\Kbli;
use App\Models\UMKM\Umkm;
use App\Proyek;
use App\Umr;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use JavaScript;

class MapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function map(){
        //=========================LOI=====================

        $lois = Lois::with('statusLoi')->get();
        //dd($lois);
        //dd($lois->groupBy('status_proses'));
        //dd($lois[0]);
        $all_lois = collect();
        $drilldown_lois = collect();
        $drilldown_lois_negara = collect();
        $kabkotas = KabKota::all();
        $statuss = JenisMarketplace::all();
        $sektors = CjibfSektor::all();
        $kepemilikans = Proyek::groupBy('status_kepemilikan')->pluck('status_kepemilikan');
        $skemas = Proyek::groupBy('skema_investasi')->pluck('skema_investasi');
        //dd($skemas);
        //dd($statuss);
        //dd($kabkotas[0]->usernya[0]->id);

        foreach ($lois->groupBy('statusLoi.nama_proses') as $key => $loi){
            //dd($loi->groupBy('bidang_usaha'));
            //dd($lois->groupBy('statusLoi.nama_proses'));
            if ($key == null){
                //dump($loi->kabkota->namakota[0]->nama);
                $loi_arrs = array(
                    "name" => "Belum Ada Tindak Lanjut",
                    "y" => count($loi),
                    "drilldown" => "Belum Ada Tindak Lanjut"
                );
                $drill1 = array(
                    "id" => "Belum Ada Tindak Lanjut",
                    "name" => "Belum Ada Tindak Lanjut",
                    "data" => array()
                );

                foreach ($loi->groupBy(['bidang_usaha', 'asal_negara'])->where('status_proses', null) as $sektor => $d) {
                    //dd($d);
                    foreach ($d as $neg => $ne){
                        //dd($ne);

                        $negara = $neg;
                        $drill2 = array(
                            "id" => strtolower($negara),
                            "name" => $neg,
                            "data" => array(
                                count($d)
                            )
                        );

                    }
                    $drilldown_lois->push($drill2);
                    //dd($drilldown_lois_negara);
                    //dd($drilldown_lois_negara);
                    $drill1['data'][] = array (
                        "name" => $sektor,
                        "id" => $sektor,
                        "y" => count($ne),
                        "drilldown" => strtolower($neg)
                    );


                }

                //dd($drilldown_lois->toArray());
                //$all_lois->push($loi_arrs);
            }
            else{
                //dd($loi->groupBy(['bidang_usaha', 'asal_negara']));
                //dd($loi->statusLoi);
                $loi_arrs = array(
                    "name" => $key,
                    "y" => count($loi),
                    "drilldown" => $key
                );
                $drill1 = array(
                    "id" => $key,
                    "name" => $key,
                    "data" => array()
                );
                foreach ($loi->groupBy(['bidang_usaha', 'asal_negara']) as $sektor => $d) {
                    //dd($loi->groupBy(['bidang_usaha', 'asal_negara']));

                    foreach ($d as $neg => $ne){
                        //dd($ne);
                        $negara = $neg;
                        $drill2 = array(
                            "id" => strtolower($negara),
                            "name" => $neg,
                            "data" => array(
                                count($d)
                            )
                        );
                    }
                    $drilldown_lois->push($drill2);
                    //dd($drilldown_lois_negara);
                    $drill1['data'][] = array (
                        "name" => $sektor,
                        "id" => $sektor,
                        "y" => count($ne),
                        "drilldown" => strtolower($negara)
                    );


                }

            }

            //dd($drilldown_lois_negara);
            $drilldown_lois->push($drill1);
            $drilldown_lois->push($drill2);
            $all_lois->push($loi_arrs);
        }

        $data_loi = $all_lois->toArray();

        $drilldown_bidang_usaha = $drilldown_lois->toArray();

        $umks = Umr::with( ['kotas', 'kab'])->get();
        $umks2 = Umr::query();
        $th_umk = Umr::groupBy('tahun')->pluck('tahun');

        $data_umk = collect();
        $categoris_umk = collect();

        foreach ($umks->groupBy('kab_kota_id') as $kab => $u){
            foreach ($u as $uwuw){
                $namakota = $uwuw->kotas[0]->nama;
                //dd($namakota);
                $categoris_umk->push($namakota);
            }
        }


        foreach ($umks->groupBy('tahun') as $tt => $data){
            //dd($data);
            $y[$tt] = collect();
            foreach ($data as $datum){
                $dt = array(
                    "name" => $tt,
                    "data" => $y[$tt]->push($datum->nilai_umr)->toArray()
                );
            }

            //dump($dt);
            $data_umk->push($dt);
        }

        $all_umks = $data_umk->toArray();
        //dd($all_umks);



        return view('map/map', compact('lois',
            'data_loi' ,
            'drilldown_bidang_usaha',
            'all_umks',
            'categoris_umk',
            'kabkotas',
            'statuss',
            'sektors',
            'kepemilikans',
            'skemas'));
    }

    public function search(Request $request){
        $lois = Lois::with('statusLoi')->get();
        //dd($lois->groupBy('status_proses'));
        //dd($lois[0]);
        $all_lois = collect();
        $drilldown_lois = collect();
        $drilldown_lois_negara = collect();
        $user_kabkot = User::all();
        $kabkotas = KabKota::all();
        $statuss = JenisMarketplace::all();
        $sektors = CjibfSektor::all();
        $kepemilikans = Proyek::groupBy('status_kepemilikan')->pluck('status_kepemilikan');
        $skemas = Proyek::groupBy('skema_investasi')->pluck('skema_investasi');
        //dd($skemas);
        //dd($statuss);
        //dd($kabkotas[0]->usernya[0]->id);

        foreach ($lois->groupBy('statusLoi.nama_proses') as $key => $loi){
            //dd($loi->groupBy('bidang_usaha'));
            //dd($lois->groupBy('statusLoi.nama_proses'));
            if ($key == null){
                //dump($loi->kabkota->namakota[0]->nama);
                $loi_arrs = array(
                    "name" => "Belum Ada Tindak Lanjut",
                    "y" => count($loi),
                    "drilldown" => "Belum Ada Tindak Lanjut"
                );
                $drill1 = array(
                    "id" => "Belum Ada Tindak Lanjut",
                    "name" => "Belum Ada Tindak Lanjut",
                    "data" => array()
                );

                foreach ($loi->groupBy(['bidang_usaha', 'asal_negara'])->where('status_proses', null) as $sektor => $d) {
                    //dd($d);
                    foreach ($d as $neg => $ne){
                        //dd($ne);

                        $negara = $neg;
                        $drill2 = array(
                            "id" => strtolower($negara),
                            "name" => $neg,
                            "data" => array(
                                count($d)
                            )
                        );

                    }
                    $drilldown_lois->push($drill2);
                    //dd($drilldown_lois_negara);
                    //dd($drilldown_lois_negara);
                    $drill1['data'][] = array (
                        "name" => $sektor,
                        "id" => $sektor,
                        "y" => count($ne),
                        "drilldown" => strtolower($neg)
                    );


                }

                //dd($drilldown_lois->toArray());
                //$all_lois->push($loi_arrs);
            }
            else{
                //dd($loi->groupBy(['bidang_usaha', 'asal_negara']));
                //dd($loi->statusLoi);
                $loi_arrs = array(
                    "name" => $key,
                    "y" => count($loi),
                    "drilldown" => $key
                );
                $drill1 = array(
                    "id" => $key,
                    "name" => $key,
                    "data" => array()
                );
                foreach ($loi->groupBy(['bidang_usaha', 'asal_negara']) as $sektor => $d) {
                    //dd($loi->groupBy(['bidang_usaha', 'asal_negara']));

                    foreach ($d as $neg => $ne){
                        //dd($ne);
                        $negara = $neg;
                        $drill2 = array(
                            "id" => strtolower($negara),
                            "name" => $neg,
                            "data" => array(
                                count($d)
                            )
                        );
                    }
                    $drilldown_lois->push($drill2);
                    //dd($drilldown_lois_negara);
                    $drill1['data'][] = array (
                        "name" => $sektor,
                        "id" => $sektor,
                        "y" => count($ne),
                        "drilldown" => strtolower($negara)
                    );


                }

            }

            //dd($drilldown_lois_negara);
            $drilldown_lois->push($drill1);
            $drilldown_lois->push($drill2);
            $all_lois->push($loi_arrs);
        }

        $data_loi = $all_lois->toArray();

        $drilldown_bidang_usaha = $drilldown_lois->toArray();
        //dd($drilldown_bidang_usaha);
        //dd($drilldown_lois_negara);
        //=========================LOI=====================a
        //DB::enableQueryLog();
        $umks = Umr::with( ['kotas', 'kab'])->get();
        //dd(DB::getQueryLog());
        //dd($umks->groupBy('tahun'));
        //dd($umks);

        $data_umk = collect();
        $data_umk = collect();
        $categoris_umk = collect();

        //dd($data_umk);
        //dd($umks->groupBy(['tahun','kab.name']));
        //dd($umks->groupBy('kotas.nama'));
        foreach ($umks->groupBy('kab_kota_id') as $kab => $u){
            foreach ($u as $uwuw){
                $namakota = $uwuw->kotas[0]->nama;
                //dd($namakota);
                $categoris_umk->push($namakota);
            }
        }

        foreach ($umks->groupBy('tahun') as $tt => $data){
            //dd($data);
            $y[$tt] = collect();
            foreach ($data as $datum){
                $dt = array(
                    "name" => $tt,
                    "data" => $y[$tt]->push($datum->nilai_umr)->toArray()
                );
            }

            //dump($dt);
            $data_umk->push($dt);
        }





        //dd($data_umk);
        //dd($umks->groupBy(['kab.name', 'tahun'])->toJson());
        //dd($categoris_umk);
        $all_umks = $data_umk->toArray();
        //dd($all_umks);

        $data_filters = Proyek::Filter(
            $request->nama,
            $request->kabkota,
            $request->jenis_peluang,
            $request->sektor,
            $request->status_kepemilikan,
            $request->skema,
            $request->kajian,
            $request->keuangan
        )->where('status', 1)->get();

        //dd($data_filters);
        //dd(!$data_filters->isEmpty());

        if (!$data_filters->isEmpty()){
            foreach ($data_filters as $d){
                //dd($data_filter);
                if (isset($d->byUser)){
                    $kota = $d->byUser->namakota[0]->nama;
                    //dd($kota);
                }
                else{
                    $kota = $d->nama_perusahaan;
                }
                //dd($kota);
                $coordinates = $d->getCoordinates();
                $filter[] = array(
                    "id" => $d->id,
                    "title" => $d->project_name,
                    "nilai_investasi" => $d->nilai_investasi,
                    "npv" => $d->npv,
                    "irr" => $d->irr,
                    "bc_ratio" => $d->bc_ratio,
                    "luas_lahan" => $d->luas_lahan,
                    "payback_period" => $d->playback_period,
                    "latar_belakang" => $d->latar_belakang,
                    "lingkup_pekerjaan" => $d->lingkup_pekjerjaan,
                    "eksisting" => $d->eksisting,
                    "status_kepemilikan" => $d->status_kepemilikan,
                    "skema_investasi" => $d->skema_investasi,
                    "kab_kota_id" => $d->kab_kota_id,
                    "kab_kota" => $kota,
                    "market_id" => $d->market_id,
                    "market" => $d->marketplace->name,
                    "sektor" => $d->bySector->name,
                    "cp_nama" => $d->cp_nama,
                    "cp_hp" => $d->cp_hp,
                    "cp_email" => $d->cp_email,
                    "cp_alamat" => $d->cp_alamat,
                    "file_kajian" => $d->file_kajian,
                    "file_keuangan" => $d->file_keuangan,
                    "fotos" => json_decode($d->fotos),
                    "marker_image" => asset('map/icon/'.$d->market_id.'.png'),
                    "url" => "project/".$d->id,
                    "latitude" => (float)$coordinates[0]['lat'],
                    "longitude" => (float)$coordinates[0]['lng'],
                    "ribbon" => "<i class='fa fa-thumbs-up'></i>"
                );

            }

            //dd($filter);
            //dd($data_filters);

            JavaScript::put([
                'foo' => $filter
            ]);
            return view('map/map-filtered', compact('lois',
                'data_loi' ,
                'drilldown_bidang_usaha',
                'all_umks',
                'categoris_umk',
                'kabkotas',
                'statuss',
                'sektors',
                'kepemilikans',
                'skemas',
                'filter',
                'request',
                'user_kabkot'));
        }
        else{
            JavaScript::put([
                'foo' => 'kosong'
            ]);
            return view('map/map-filtered', compact('lois',
                'data_loi' ,
                'drilldown_bidang_usaha',
                'all_umks',
                'categoris_umk',
                'kabkotas',
                'statuss',
                'sektors',
                'kepemilikans',
                'skemas',
                'request',
                'user_kabkot'));
        }




    }

    public function data(Request $request){

        //dd(empty($request->all()));
        //dd('asas');
        //$data = Proyek::where('status', 1)->get();
        //dd($data);

        //dd($request->ajax());


        $data = Proyek::Filter(
            $request->nama,
            $request->kabkota,
            $request->jenis_peluang,
            $request->sektor,
            $request->status_kepemilikan,
            $request->skema,
            $request->kajian,
            $request->keuangan
        )->where('status', 1)->get();
        //dd($test);
        //dd($data);
        foreach ($data as $d){
            //dd($d->byUser->namakota[0]->nama);
            //dd($d);
            //dd($d->market_id);
            $coordinates = $d->getCoordinates();
            if (isset($d->byUser)){
                $kota = $d->byUser->namakota[0]->nama;
            }
            else{
                $kota = $d->nama_perusahaan;
            }

            $maps[] = array(
                "id" => $d->id,
                "title" => $d->project_name,
                "nilai_investasi" => $d->nilai_investasi,
                "npv" => $d->npv,
                "irr" => $d->irr,
                "bc_ratio" => $d->bc_ratio,
                "luas_lahan" => $d->luas_lahan,
                "payback_period" => $d->playback_period,
                "latar_belakang" => $d->latar_belakang,
                "lingkup_pekerjaan" => $d->lingkup_pekjerjaan,
                "eksisting" => $d->eksisting,
                "status_kepemilikan" => $d->status_kepemilikan,
                "skema_investasi" => $d->skema_investasi,
                "kab_kota_id" => $d->kab_kota_id,
                "kab_kota" => $kota,
                "market_id" => $d->market_id,
                "market" => $d->marketplace->name,
                "sektor" => $d->bySector->name,
                "cp_nama" => $d->cp_nama,
                "cp_hp" => $d->cp_hp,
                "cp_email" => $d->cp_email,
                "cp_alamat" => $d->cp_alamat,
                "file_kajian" => $d->file_kajian,
                "file_keuangan" => $d->file_keuangan,
                "fotos" => json_decode($d->fotos),
                "marker_image" => asset('map/icon/'.$d->market_id.'.png'),
                "url" => "project/".$d->id,
                "latitude" => (float)$coordinates[0]['lat'],
                "longitude" => (float)$coordinates[0]['lng'],
                "ribbon" => "<i class='fa fa-thumbs-up'></i>"
            );
        }


        return json_encode($maps);

    }


    public function mapumkm(){
        //=========================LOI=====================

        $kblis = Kbli::all();
        $kabkotas = KabKota::all();

        return view('umkm.map.map-umkm', compact('kblis', 'kabkotas'));
    }

    public function searchumkm(Request $request){

        $kblis = Kbli::all();
        $kabkotas = KabKota::all();

        //dd($request->all());
        $data_filters = Umkm::Filter(
            $request->nama,
            $request->kabkota,
            $request->nib,
            $request->tahun_a,
            $request->tahun_b,
            $request->kbli
        )->get();

        //dd($data_filters);
        //dd(!$data_filters->isEmpty());

        if (!$data_filters->isEmpty()){
            foreach ($data_filters as $d){
                //dd($data_filter);

                //dd($kota);
                $kota = KabKota::where('id', $d->kab_kota_id)->first();
                //dd($kota);
                $filter[] = array(
                    "id" => $d->id,
                    "nib" => $d->nib,
                    "alamat_pendirian" => $d->alamat_pendirian,
                    "nama_pendaftar" => $d->nama_pendaftar,
                    "kab_kota_id" => $kota->nama,
                    "kbli" => $d->kbli,
                    "jumlah_investasi" => $d->jumlah_investasi,
                    "tgl_terbit_oss" => $d->tgl_terbit_oss,
                    "marker_image" => url('http://cjip.jatengprov.go.id/storage/UMKM/umkm_2.png'),
                    "latitude" => (float)$d->lat,
                    "longitude" => (float)$d->lng,
                    "ribbon" => "<i class='fa fa-thumbs-up'></i>"
                );
                //dd($filter);

            }


            //dd($filter);
            //dd($data_filters);

            //dd($filter);
            $foo = $filter;
            //dd($foo);
            JavaScript::put([
                'foo' => $filter
            ]);
            return view('umkm/map/map-filtered-umkm', compact('kblis', 'kabkotas', 'request','foo','filter'));
        }
        else{
            $foo = 'kosong';
            JavaScript::put([
                'foo' => 'kosong'
            ]);
            return view('umkm/map/map-filtered-umkm', compact('kblis', 'kabkotas', 'request', 'foo'));
        }




    }

    public function dataumkm(Request $request){

        //dd(empty($request->all()));
        //dd('asas');
        //$data = Proyek::where('status', 1)->get();
        //dd($data);

        //dd($request->ajax());


        $data = Umkm::Filter(
            $request->nama,
            $request->kabkota,
            $request->nib,
            $request->tgl_oss,
            $request->kbli,
            $request->tahun_a,
            $request->tahun_b
        )->get();
        //dd($test);
        //dd($data);
        foreach ($data as $d){
            //dd($d->byUser->namakota[0]->nama);
            //dd($d);
            //dd($d->market_id);

            $kota = KabKota::where('id', $d->kab_kota_id)->first();

            $maps[] = array(
                "id" => $d->id,
                "nib" => $d->nib,
                "alamat_pendirian" => $d->alamat_pendirian,
                "nama_pendaftar" => $d->nama_pendaftar,
                "kab_kota_id" => $kota->nama,
                "kbli" => $d->kbli,
                "jumlah_investasi" => $d->jumlah_investasi,
                "tgl_terbit_oss" => $d->tgl_terbit_oss,
                "marker_image" => url('http://cjip.jatengprov.go.id/storage/UMKM/umkm_2.png'),
                "latitude" => (float)$d->lat,
                "longitude" => (float)$d->lng,
                "ribbon" => "<i class='fa fa-thumbs-up'></i>"
            );
        }


        return json_encode($maps);

    }

}
