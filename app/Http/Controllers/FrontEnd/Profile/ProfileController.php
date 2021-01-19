<?php

namespace App\Http\Controllers\FrontEnd\Profile;

use App\Aset;
use App\BatasWilayah;
use App\Charts\SampleChart;
use App\Cp;
use App\KepadatanPenduduk;
use App\LuasPenggunaan;
use App\LuasWilayah;
use App\Perusahaan;
use App\ProfilKabupaten;
use App\ProfKepKabKota;
use App\Umkm;
use App\Umr;
use App\User;
use App\Video;
use App\VmKabKota;
use App\VmProv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    public function profile(){

        $kabkotas = User::where('role_id', 3)->get();
        $visimisis = VmProv::first();

        //dd($visimisis);
        //dd($kabkota);


        return view('front-end.content.profile.profile', compact('kabkotas', 'visimisis'));

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profileDetail($id){

        $bupatis = VmKabKota::where('kab_kota_id', $id)->first();
        $kadins = ProfKepKabKota::where('kab_kota_id', $id)->first();
        $video_f = Video::where('kab_kota_id', $id)->first();
        $luas_wilayahs = LuasWilayah::where('kab_kota_id', $id)->get();
        $batas_wilayahs = BatasWilayah::where('kab_kota_id', $id)->first();
        $luas_penggunaans = LuasPenggunaan::where('kab_kota_id', $id)->first();
        $penduduks = KepadatanPenduduk::where('kab_kota_id', $id)->get();
        $asets = Aset::where('kab_kota_id', $id)->first();
        $umrs = Umr::where('kab_kota_id', 12)->groupBy('tahun')->get();
        $umkms = Umkm::where('kab_kota_id', $id)->get();
        $perusahaans = Perusahaan::where('kab_kota_id', $id)->first();
        $cps = Cp::where('kab_kota_id', $id)->first();
        $videos = Video::where('kab_kota_id', $id)->get();

        //dd($penduduks);
        //
        //
        //
        //
        //LUAS WILAYAH CHART

        //dd(json_decode($luas_wilayahs));
        $data = collect([]);
        $label = collect([]);
        $colours = collect([]);

        for ($i = 0; $i < count($luas_wilayahs); $i++){

            $datas = [
                'name' => $luas_wilayahs[$i]->nama_kecamatan,
                'y' => $luas_wilayahs[$i]->luas_wilayah
            ];
            $label->push($luas_wilayahs[$i]->nama_kecamatan);
            $colours->push(sprintf('#%06X', mt_rand(0, 0xFFFFFF)));
            $data->push(floatval($luas_wilayahs[$i]->luas_wilayah));
        }


        $chart = new SampleChart;
        $chart->labels($label->toArray());
        $chart->dataset('Luas Wilayah', 'pie', $data)->options([
            'color' => $colours,

        ]);
        //dd($chart);


        //END-LUAS WILAYAH CHARTS
        //
        //
        //
        //

        //
        //
        //
        //

        //KEPADATAN PENDUDUK CHART
        $json = json_decode($penduduks);
        //dd($json);

        //dd(json_decode($luas_wilayahs));
        $datas = collect([]);

        for ($i = 0; $i < count($penduduks); $i++){
        //dd($penduduks[$i]);
            $datas = Array(
                'kecamatan' => $json[$i]->kecamatan_id,
                'lelaki' => $json[$i]->lelaki,
                'wanita' => $json[$i]->perempuan
            );
            //dd($datas);
        }

        $tes = json_encode($penduduks);
        //dd($data->toArray());

        $chart = new SampleChart;
        $chart->labels($label->toArray());
        $chart->dataset('Luas Wilayah', 'pie', $data)->options([
            'color' => $colours,
        ]);
        //dd($chart);


        //END-KEPADATAN PENDUDUK CHARTS
        //
        //
        //
        //

        //dd($umkm-new);

        if ($videos->isNotEmpty()){
            foreach ($videos as $v){
                parse_str( parse_url( $v->link_video, PHP_URL_QUERY ), $my_array_of_vars );
                //dd($my_array_of_vars);
            }
            return view('front-end.content.profile.kabkota.detail', compact(

                'bupatis',
                'kadins',
                'videos',
                'luas_wilayahs',
                'batas_wilayahs',
                'luas_penggunaans',
                'penduduks',
                'asets',
                'umrs',
                'umkms',
                'perusahaans',
                'cps',
                'videos',
                'video_f',
                'my_array_of_vars',
                'chart',
                'datas',
                'tes'

            ));
        }
        else{
            return view('front-end.content.profile.kabkota.detail', compact(

                'bupatis',
                'kadins',
                'videos',
                'luas_wilayahs',
                'batas_wilayahs',
                'luas_penggunaans',
                'penduduks',
                'asets',
                'umrs',
                'umkms',
                'perusahaans',
                'cps',
                'videos',
                'video_f',
                'chart',
                'datas',
                'tes'
            ));
        }


    }

}
