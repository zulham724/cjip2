<?php

namespace App\Http\Controllers\API;

use App\Models\UMKM\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UmkmController extends Controller
{
    public function map(){
        $umkms = Umkm::all();

        foreach ($umkms as $d){
            //dd($d->byUser->namakota[0]->nama);
            //dd($d->bySector->name);
            //dd($d->market_id);

            $maps[] = array(
                "id" => $d->id,
                "nib" => $d->nib,
                "alamat_pendirian" => $d->alamat_pendirian,
                "nama_pendaftar" => $d->nama_pendaftar,
                "kab_kota_id" => $d->kab_kota_id,
                "kbli" => $d->kbli,
                "jumlah_investasi" => $d->jumlah_investasi,
                "tgl_terbit_oss" => $d->tgl_terbit_oss,
                "marker_image" => url('/storage/UMKM/umkm.png'),
                "latitude" => (float)$d->lat,
                "longitude" => (float)$d->lng,
                "ribbon" => "<i class='fa fa-thumbs-up'></i>"
            );
        }

        //dd($maps);


        //$coordinatesJSON = array();
        $new_data = collect();
        $n_data = array(
            'type' => 'FeatureCollection',

            'features' => $new_data,
        );
        foreach($maps as $key => $value) {
            //dd($value);
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

        //dd($n_data);
        return $geoJSON;
    }
}
