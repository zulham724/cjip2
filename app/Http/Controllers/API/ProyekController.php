<?php

namespace App\Http\Controllers\API;

use App\CjibfSektor;
use App\JenisMarketplace;
use App\ProfilKabupaten;
use App\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ProyekController extends Controller
{
    public function postProject(Request $request){
        $request->validate([
            'project_name' => 'required',
            'fotos' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $profil = ProfilKabupaten::where('kab_kota_id', Auth::user()->id)->first();
        $profil_id = $profil->id;

        $coordinates = array(
            'lat' => $request->lat,
            'lng' => $request->lng,
        );
        $lat = (float) $coordinates['lat'];
        $lng = (float) $coordinates['lng'];
        $postcoordinates =  DB::raw("ST_GeomFromText('POINT({$lng} {$lat})')");

        //return $postcoordinates;

            $post = new Proyek();
            $post->project_name = $request->project_name;//wajib
            $post->location = $postcoordinates; //array, wajib
            $post->latar_belakang = $request->latar_belakang;
            $post->lingkup_pekerjaan = $request->lingkup_pekerjaan;
            $post->eksisting = $request->eksisting;
            $post->luas_lahan = $request->luas_lahan;
            $post->status_kepemilikan = $request->status_kepemilikan;
            $post->nilai_investasi = $request->nilai_investasi;
            $post->skema_investasi = $request->skema_investasi;
            $post->npv = $request->npv;
            $post->irr = $request->irr;
            $post->bc_ratio = $request->bc_ratio;
            $post->playback_period = $request->playback_period;
            $post->cp_nama = $request->cp_nama;
            $post->cp_hp = $request->cp_hp;
            $post->cp_email = $request->cp_email;
            $post->cp_alamat = $request->cp_email;
            $post->file_kajian = $request->file_kajian; //file, wajib
            $post->kab_kota_id = Auth::user()->id;
            $post->fotos = $request->fotos; //array
            $post->market_id = $request->market_id; //get from marketplace api
            $post->file_keuangan = $request->file_keuangan; //file
            $post->profil_id = $profil_id;
            $post->status = $request->status;
            $post->sektor_id = $request->sektor_id;

            

            $post->save();



        return response()->json(['success' => $post], 201);

        /*return response()->json([
            'message' => 'Successfully created user!'
        ], 201);*/
    }

    public function updateProject(Request $request){
        $request->validate([
            'project_name' => 'required',
            'fotos' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);
        $profil = ProfilKabupaten::where('kab_kota_id', Auth::user()->id)->first();
        $profil_id = $profil->id;
        $coordinates = array(
            'lat' => $request->lat,
            'lng' => $request->lng,
        );
        $lat = (float) $coordinates['lat'];
        $lng = (float) $coordinates['lng'];
        $postcoordinates =  DB::raw("ST_GeomFromText('POINT({$lng} {$lat})')");

        //return $postcoordinates;

            $update = Proyek::findOrFail($request->id);
            $update->project_name = $request->project_name;//wajib
            $update->location = $postcoordinates; //array, wajib
            $update->latar_belakang = $request->latar_belakang;
            $update->lingkup_pekerjaan = $request->lingkup_pekerjaan;
            $update->eksisting = $request->eksisting;
            $update->luas_lahan = $request->luas_lahan;
            $update->status_kepemilikan = $request->status_kepemilikan;
            $update->nilai_investasi = $request->nilai_investasi;
            $update->skema_investasi = $request->skema_investasi;
            $update->npv = $request->npv;
            $update->irr = $request->irr;
            $update->bc_ratio = $request->bc_ratio;
            $update->playback_period = $request->playback_period;
            $update->cp_nama = $request->cp_nama;
            $update->cp_hp = $request->cp_hp;
            $update->cp_email = $request->cp_email;
            $update->cp_alamat = $request->cp_email;
            $update->file_kajian = $request->file_kajian; //file, wajib
            $update->kab_kota_id = Auth::user()->id;
            $update->fotos = $request->fotos; //array
            $update->market_id = $request->market_id; //get from marketplace api
            $update->file_keuangan = $request->file_keuangan; //file
            $update->profil_id = $profil_id;
            $update->status = $request->status;
            $update->sektor_id = $request->sektor_id;

            $update->update();



        return response()->json(['success' => $update], 201);

        /*return response()->json([
            'message' => 'Successfully created user!'
        ], 201);*/
    }

    public function getMarketplace(){
        $markets = JenisMarketplace::all();

        $data = collect();

        foreach ($markets as $market){
            $ddd = array(
                'id' => $market->id,
                'name' => $market->name,
            );
            $data->push($ddd);
        }

        //dd($data);

        return Response::json([
            'data' => $data
        ]);
    }

    public function getSektor(){
        $sektors = CjibfSektor::all();

        $data = collect();

        foreach ($sektors as $sektor){
            $ddd = array(
                'id' => $sektor->id,
                'name' => $sektor->name,
            );
            $data->push($ddd);
        }

        //dd($data);

        return Response::json([
            'data' => $data
        ]);
    }

    public function getProject(){

        $data = Proyek::where('kab_kota_id', Auth::user()->id)->get();

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

        return Response::json([
            'data' => $maps
        ]);
    }

    public function getProjectGeoJson(){

        $data = Proyek::where('kab_kota_id', Auth::user()->id)->get();

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
            $coordinatesJSON = array('lat' => $value['latitude'], 'lng' => $value['longitude']);
            $result = array_diff_key($value, array_flip(["kab_kota_id", "market_id", "latitude", "longitude", "ribbon"]));
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
}
