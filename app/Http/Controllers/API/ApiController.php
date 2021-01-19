<?php

namespace App\Http\Controllers\API;

use App\KabKota;
use App\Models\UMKM\Umkm;
use App\Proyek;
use App\Umr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function dataGeoJSON(){
        $data = Proyek::where('status', 1)->get();

        foreach ($data as $d){
            //dd($d->byUser->namakota[0]->nama);
            //dd($d->bySector->name);
            //dd($d->market_id);
            $coordinates = $d->getCoordinates();
            //dd($coordinates);
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


        //$coordinatesJSON = array();
        $new_data = collect();
        $n_data = array(
            'type' => 'FeatureCollection',

            'features' => $new_data,
        );
        foreach($maps as $key => $value) {
           // dd($value);
            $coordinatesJSON = array($value['latitude'], $value['longitude']);
            $result = array_diff_key($value, array_flip(["kab_kota_id", "market_id", "latitude", "longitude", "ribbon"]));
            //dd($result);
            $features = array(
                'type' => 'Feature',
                'geometry' => array('type' => 'Point', 'coordinates' => $coordinatesJSON),
                'properties' => $result,
            );
           // dd($features);

            $new_data->push($features);
        }


        $geoJSON = json_encode($n_data, JSON_PRETTY_PRINT);

        return $geoJSON;

    }

    public function dataUmk(){
        $umks = Umr::where('tahun', Carbon::now()->format('yy'))->get();
        //dd($umks);
        $data_umk = collect();


        foreach ($umks as $umk){
            switch ($umk->kotas[0]->nama){
                case 'Kabupaten Banjarnegara';
                $kode_map = 3401;
                break;
                case 'Kabupaten Banyumas';
                $kode_map = 3402;
                break;
                case 'Kabupaten Batang';
                $kode_map = 3403;
                break;
                case 'Kabupaten Blora';
                $kode_map = 3404;
                break;
                case 'Kabupaten Brebes';
                $kode_map = 3406;
                break;
                case 'Kabupaten Cilacap';
                $kode_map = 3407;
                break;
                case 'Kabupaten Demak';
                $kode_map = 3408;
                break;
                case 'Kabupaten Grobogan';
                $kode_map = 3409;
                break;
                case 'Kabupaten Jepara';
                $kode_map = 3410;
                break;
                case 'Kabupaten Boyolali';
                $kode_map = 3405;
                break;
                case 'Kabupaten Karanganyar';
                $kode_map = 3411;
                break;
                case 'Kabupaten Kebumen';
                $kode_map = 3412;
                break;
                case 'Kabupaten Kendal';
                $kode_map = 3413;
                break;
                case 'Kabupaten Klaten';
                $kode_map = 3414;
                break;
                case 'Kota Magelang';
                $kode_map = 3471;
                break;
                case 'Kota Pekalongan';
                $kode_map = 3475;
                break;
                case 'Kota Salatiga';
                $kode_map = 3473;
                break;
                case 'Kota Semarang';
                $kode_map = 3474;
                break;
                case 'Kota Surakarta';
                $kode_map = 3472;
                break;
                case 'Kota Tegal';
                $kode_map = 3476;
                break;
                case 'Kabupaten Kudus';
                $kode_map = 3415;
                break;
                case 'Kabupaten Magelang';
                $kode_map = 3416;
                break;
                case 'Kabupaten Pati';
                $kode_map = 3417;
                break;
                case 'Kabupaten Pekalongan';
                $kode_map = 3418;
                break;
                case 'Kabupaten Pemalang';
                $kode_map = 3419;
                break;
                case 'Kabupaten Purbalingga';
                $kode_map = 3420;
                break;
                case 'Kabupaten Purworejo';
                $kode_map = 3421;
                break;
                case 'Kabupaten Rembang';
                $kode_map = 3422;
                break;
                case 'Kabupaten Semarang';
                $kode_map = 3423;
                break;
                case 'Kabupaten Sragen';
                $kode_map = 3424;
                break;
                case 'Kabupaten Sukoharjo';
                $kode_map = 3425;
                break;
                case 'Kabupaten Tegal';
                $kode_map = 3426;
                break;
                case 'Kabupaten Temanggung';
                $kode_map = 3427;
                break;
                case 'Kabupaten Wonogiri';
                $kode_map = 3428;
                break;
                case 'Kabupaten Wonosobo';
                $kode_map = 3429;
                break;
            }
            //dd($umk->kotas[0]->nama);
            $props = array(
                'kabkota' => $umk->kotas[0]->nama,
                'tahun' => $umk->tahun,
                'umk' => $umk->nilai_umr,
                'kode_map' =>$kode_map
            );

            $data_umk->push($props);
        }


        return json_encode($data_umk);
    }

    public function dataUmkm(){
        $umkms = Umkm::all()->groupBy('kab_kota_id');
        $data_umkm = collect();


        foreach ($umkms as $key => $umkm){
            //dd($umkm->sum('jumlah_investasi'));
            $kabkot = KabKota::where('id', $key)->get('nama');
            //dump($kabkot[0]->nama);
            switch ($kabkot[0]->nama){
                case 'Kabupaten Banjarnegara';
                    $kode_map = 3401;
                    break;
                case 'Kabupaten Banyumas';
                    $kode_map = 3402;
                    break;
                case 'Kabupaten Batang';
                    $kode_map = 3403;
                    break;
                case 'Kabupaten Blora';
                    $kode_map = 3404;
                    break;
                case 'Kabupaten Brebes';
                    $kode_map = 3406;
                    break;
                case 'Kabupaten Cilacap';
                    $kode_map = 3407;
                    break;
                case 'Kabupaten Demak';
                    $kode_map = 3408;
                    break;
                case 'Kabupaten Grobogan';
                    $kode_map = 3409;
                    break;
                case 'Kabupaten Jepara';
                    $kode_map = 3410;
                    break;
                case 'Kabupaten Boyolali';
                    $kode_map = 3405;
                    break;
                case 'Kabupaten Karanganyar';
                    $kode_map = 3411;
                    break;
                case 'Kabupaten Kebumen';
                    $kode_map = 3412;
                    break;
                case 'Kabupaten Kendal';
                    $kode_map = 3413;
                    break;
                case 'Kabupaten Klaten';
                    $kode_map = 3414;
                    break;
                case 'Kota Magelang';
                    $kode_map = 3471;
                    break;
                case 'Kota Pekalongan';
                    $kode_map = 3475;
                    break;
                case 'Kota Salatiga';
                    $kode_map = 3473;
                    break;
                case 'Kota Semarang';
                    $kode_map = 3474;
                    break;
                case 'Kota Surakarta';
                    $kode_map = 3472;
                    break;
                case 'Kota Tegal';
                    $kode_map = 3476;
                    break;
                case 'Kabupaten Kudus';
                    $kode_map = 3415;
                    break;
                case 'Kabupaten Magelang';
                    $kode_map = 3416;
                    break;
                case 'Kabupaten Pati';
                    $kode_map = 3417;
                    break;
                case 'Kabupaten Pekalongan';
                    $kode_map = 3418;
                    break;
                case 'Kabupaten Pemalang';
                    $kode_map = 3419;
                    break;
                case 'Kabupaten Purbalingga';
                    $kode_map = 3420;
                    break;
                case 'Kabupaten Purworejo';
                    $kode_map = 3421;
                    break;
                case 'Kabupaten Rembang';
                    $kode_map = 3422;
                    break;
                case 'Kabupaten Semarang';
                    $kode_map = 3423;
                    break;
                case 'Kabupaten Sragen';
                    $kode_map = 3424;
                    break;
                case 'Kabupaten Sukoharjo';
                    $kode_map = 3425;
                    break;
                case 'Kabupaten Tegal';
                    $kode_map = 3426;
                    break;
                case 'Kabupaten Temanggung';
                    $kode_map = 3427;
                    break;
                case 'Kabupaten Wonogiri';
                    $kode_map = 3428;
                    break;
                case 'Kabupaten Wonosobo';
                    $kode_map = 3429;
                    break;
            }
            //die();
            //dd($umk->kotas[0]->nama);

            $props = array(
                'kabkota' => $kabkot[0]->nama,
                'umkm' => $umkm->sum('jumlah_investasi'),
                'kode_map' => $kode_map
            );

            //dump($props['umkm']);

            $data_umkm->push($props);
        }
            //die();
        //dd($data_umkm);
        return json_encode($data_umkm);
    }
}
