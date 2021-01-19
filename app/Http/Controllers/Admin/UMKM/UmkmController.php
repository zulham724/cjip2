<?php

namespace App\Http\Controllers\Admin\UMKM;

use App\Exports\UmkmNewExport;
use App\Imports\KbliImport;
use App\Imports\UmkmImport;
use App\KabKota;
use App\Models\UMKM\Kbli;
use App\Models\UMKM\Umkm;
use App\Models\UMKM\UmkmTambahan;
use App\Proyek;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use JavaScript;
use Maatwebsite\Excel\Facades\Excel;

class UmkmController extends Controller
{
    public function show(){


        $chart_kabkota = collect();
        $chart_drilldown = collect();

        $chart_umk = Umkm::with('kabkota')->get()->groupBy('kabkota.nama');
        $chart_umk_tahun = Umkm::with('kabkota')->get()->groupBy(['kabkota.nama', 'tahun']);


        //dd($chart_umk_tahun);
        //// CHART SEBELUM DRILLDOWN -> Berdasarkan kabkota dan jumlah total investasinya
        //dd($chart_umk);
        $umkms_kabkotas = $chart_umk->map(function ($chart_umk) {
            //dd($row);
            $jumlah = array();
            foreach ($chart_umk as $row){
                //dd($chart_umk);
                $nilai = json_decode($row->investasi,true);
                //$nilai = $n->toArray();
                //dd($nilai['total']['total']);
                $j = array_push($jumlah, $nilai['total']['total']);
                //dd($jumlah);

            }

            //dd(array_sum($jumlah));
            return array_sum($jumlah);
        });

        //dd($chart_umk);
        //dd($umkms_kabkotas);

        //dd($umkms_kabkotas);

        foreach ($umkms_kabkotas as $kab => $umkms_kabkota){
            //dd($kab);
            $series_kabkota = [
              'name' => $kab,
              'y' => $umkms_kabkota,
              'drilldown' => $kab
            ];
            $chart_kabkota->push($series_kabkota);
        }

        foreach ($chart_umk_tahun as $kabupaten => $data){
            //dd($kabupaten);

            $total_per_tahun = $data->map(function ($data){
                $jml = array();
                foreach ($data as $d){
                    $nilai_d = json_decode($d->investasi, true);
                    $j = array_push($jml, $nilai_d['total']['total']);
                }

                return array_sum($jml);
            });

            $array_total = array();
            foreach ($total_per_tahun as $tahun => $total_thn){
                $pertaun = array(
                    $tahun, $total_thn
                );
                array_push($array_total, $pertaun);
            }
            //dd($array_total);

            $drill = [
              'name'=>$kabupaten,
              'id'=>$kabupaten,
              'data'=>$array_total
            ];
            $chart_drilldown->push($drill);
            //dd($total_per_tahun);

        }

        //dd($chart_drilldown);



        //dd(json_encode($chart_kabkota));

        //// CHART SEBELUM DRILLDOWN -> Berdasarkan kabkota dan jumlah total investasinya


        //dd($chart_kabkota);


        $umkms = DB::table('umkm_new')
            ->select(
                DB::raw('YEAR(tgl_terbit_oss) as year'),
                DB::raw('MONTH(tgl_terbit_oss) as month'),
                DB::raw('SUM(jumlah_investasi) as sum')
            )
            ->groupBy('year', 'month')
            ->get();

        //dd($umkms);
        $grouped = collect();
        foreach ($umkms as $umkm){
            $bulan = $umkm->month;
        //dd();
                if ($bulan <=3){
                $bulan_t = 'Triwulan I';
                    $dateS = Carbon::createFromFormat('Y-m', $umkm->year.'-01');
                    $dateE = Carbon::createFromFormat('Y-m', $umkm->year.'-03');
                    $umkms_trl = DB::table('umkm_new')
                        ->select(
                            DB::raw('SUM(jumlah_investasi) as sum')
                        )
                        ->whereBetween('tgl_terbit_oss', [$dateS,$dateE])
                        ->get();
                    //dd($umkms_trl[0]);

                    $triwulan_1 = array(
                        "name" => $bulan_t,
                        "y" => $umkms_trl[0]->sum
                    );
                }
                elseif ($bulan > 3 && $bulan <= 6){
                    $bulan_t = 'Triwulan II';
                    $dateS = Carbon::createFromFormat('Y-m', $umkm->year.'-04');
                    $dateE = Carbon::createFromFormat('Y-m', $umkm->year.'-06');
                    $umkms_trl = DB::table('umkm_new')
                        ->select(
                            DB::raw('SUM(jumlah_investasi) as sum')
                        )
                        ->whereBetween('tgl_terbit_oss', [$dateS,$dateE])
                        ->get();
                    //dd($umkms_trl[0]);
                    //dd($umkms_trl[0]);

                    $triwulan_2 = array(
                        "name" => $bulan_t,
                        "y" => $umkms_trl[0]->sum
                    );
                }
                elseif ($bulan > 6 && $bulan <= 9){
                    $bulan_t = 'Triwulan II';
                    $dateS = Carbon::createFromFormat('Y-m', $umkm->year.'-07');
                    $dateE = Carbon::createFromFormat('Y-m', $umkm->year.'-09');
                    $umkms_trl = DB::table('umkm_new')
                        ->select(
                            DB::raw('SUM(jumlah_investasi) as sum')
                        )
                        ->whereBetween('tgl_terbit_oss', [$dateS,$dateE])
                        ->get();
                    //dd($umkms_trl[0]);
                    $ttl = $umkms_trl[0]->sum;
                    $triwulan_3 = array(
                        "name" => $bulan_t,
                        "y" => $umkms_trl[0]->sum
                    );
                }
                elseif ($bulan > 9){
                    $bulan_t = 'Triwulan IV';
                    $dateS = Carbon::createFromFormat('Y-m', $umkm->year.'-09');
                    $dateE = Carbon::createFromFormat('Y-m', $umkm->year.'-12');
                    $umkms_trl = DB::table('umkm_new')
                        ->select(
                            DB::raw('SUM(jumlah_investasi) as sum')
                        )
                        ->whereBetween('tgl_terbit_oss', [$dateS,$dateE])
                        ->get();
                    //dd($dateS);

                    //dd($dateS);
                    //dd($umkms_trl[0]->sum);
                    $triwulan_4 = array(
                        "name" => $bulan_t,
                        "y" => $umkms_trl[0]->sum
                    );
                }
        }

        //dd(isset($triwulan_2));
        if (isset($triwulan_1)){
        $grouped->push($triwulan_1);
        }
        if (isset($triwulan_2)){
        $grouped->push($triwulan_2);
        }
        if (isset($triwulan_3)){
        $grouped->push($triwulan_3);
        }
        if (isset($triwulan_4)){
        $grouped->push($triwulan_4);
        }

        //dd($grouped);

        $umkms_kab = Umkm::get()->groupBy([function($val) {
            return Carbon::parse($val->tgl_terbit_oss)->format('Y');
        }, 'kab_kota_id']);
        //dd($umkms_kab);
        //dd($umkms_kab->toArray());
        $grouped_kab = collect();
        $grouped_data = collect();
        $grouped_x = collect();
        foreach ($umkms_kab as $key => $ks) {
        //dd($ks);
            foreach ($ks as $ke => $k){
                //dd($ke);
            $kota = KabKota::where('id', $ke)->first();
            $tot = Umkm::where('kab_kota_id', $ke)->sum('jumlah_investasi');
            //dd($tot);
                $data_kab = $tot;
                $xAxis = $kota->nama;

                $grouped_data->push($data_kab);
                $grouped_x->push($xAxis);
            }
            $all = array(
                "name" => $key,
                "data" => $grouped_data->toArray(),
                "categories" => $grouped_x->toArray()
            );
            $grouped_kab->push($all);

            $grouped_data_kab = $grouped_kab->toArray();


        }

        //dd($umkms_kab);
        $grouped_1 = $grouped->toArray();
        $all_umkm = Umkm::all();

        $total_investasi = Umkm::sum('jumlah_investasi');
        $investasi_terbesar = Umkm::max('jumlah_investasi');
        $investasi_group = Umkm::groupBy('kab_kota_id')
            ->get(['kab_kota_id', DB::raw('sum(jumlah_investasi) as tot')]);
        $investasi_avg = Umkm::avg('jumlah_investasi');

        if (isset($grouped_1) && isset($grouped_data_kab)){
            return view('umkm.umkm-dashboard', compact('grouped_1', 'grouped_data_kab',
                'total_investasi',
                'investasi_avg',
                'all_umkm',
            'chart_kabkota',
            'chart_drilldown'
            ));
        }
        else{
            return view('umkm.umkm-dashboard', compact(
                'total_investasi',
                'investasi_avg',
                'all_umkm',
                'chart_kabkota',
                'chart_drilldown'
            ));
        }

    }

    public function kbli(){

        $kblis = Kbli::all();
        return view('umkm.kbli', compact('kblis'));
    }

    public function showUmkm(){

        $kabkotas = KabKota::all();
        $umkms = Umkm::all();
        $years = range(Carbon::now()->year, 2013);
        //dd($years);
        return view('umkm.umkm-upload', compact('umkms', 'kabkotas', 'years'));
    }

    public function umkmMap(){

        $kblis = Kbli::all();
        $kabkotas = KabKota::all();

        return view('umkm/map/map-umkm', compact('kblis', 'kabkotas'));
    }

    public function map(Request $request){

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

            //dd($d->market_id);
            if (isset($d->byUser)){
                $kota = $d->byUser->namakota[0]->nama;
            }
            else{
                $kota = $d->nama_perusahaan;
            }

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


        return json_encode($maps);
    }

    public function mapSearch(Request $request){

        //dd($request->all());

        $kblis = Kbli::all();
        $kabkotas = KabKota::all();


        $data_filters = Umkm::Filter(
            $request->nama,
            $request->kabkota,
            $request->nib,
            $request->tgl_oss,
            $request->kbli,
            $request->tahun_a,
            $request->tahun_b
        )->get();

        //dd($data_filters);
        //dd(!$data_filters->isEmpty());

        if (!$data_filters->isEmpty()){
            foreach ($data_filters as $d){
                //dd($d);
                $filter[] = array(
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
                //dd($filter);
            }

            //dd($data_filters);

            JavaScript::put([
                'foo' => $filter
            ]);
            return view('umkm.map.map-filtered-umkm', compact(
                'filter',
                'request',
                'kblis', 'kabkotas'));
        }
        else{
            JavaScript::put([
                'foo' => 'kosong'
            ]);
            return view('umkm.map.map-filtered-umkm', compact(
                'request','kblis', 'kabkotas'));
        }
    }

    public function importKbli(Request $request){
        //dd($request->all());
        $file = $request->file('file');

        $filenameWithExt = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $fileNamaToStore = $filename.'_'.time().'.'.$extension;
        //dd($fileNamaToStore);
        $pathkbli = $request->file('file')->storeAs('/kbli', $fileNamaToStore);

        //dd($path);

        Excel::import(new KbliImport(), $pathkbli);

        return redirect()->route('show.umkm-baru');
    }

    public function umkmImport(Request $request){
        //dd($request->all());
        $file = $request->file('file');

        $kabkota = $request->kab_kota;
        $tahun = $request->tahun;

        //dd($path);

        $filenameWithExt = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $filrNamaToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('file')->storeAs('/umkm', $filrNamaToStore);

        //dd($path);
        $import = new UmkmImport($kabkota, $tahun);
        Excel::import($import, $path);


        $umkmStore = $import->dataToStore();
        //dd($import->dataToStore());
        /*return $this->getkoordinat($umkmStore);*/
    }

    private function getkoordinat($umkmStore){
        $client = new \GuzzleHttp\Client();
        //dd(count($umkmStore));
        $trim = array(
            'Kab',
            'Kota',
            'Kabupaten',
            '.',
            ','
        );

        foreach ($umkmStore as $umkm){
            //dd($umkm);
            //dd(count($umkmStore));
            $umkmcek = Umkm::where('nib', $umkm['nib'])->first();
            $store = new Umkm();
            //dd(isset($umkmcek));
            /*if ($umkm['kecamatan'] !== null){
                $response = $client->request('GET', 'http://mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$umkm['kecamatan'].str_replace($trim, '', $umkm['kota']).' Jawa Tengah'.'&maxResults=1');
            }
            elseif ($umkm['kecamatan'] == null && $umkm['kelurahan'] !== null){
                $response = $client->request('GET', 'http://mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$umkm['kelurahan'].'+'.str_replace($trim, '', $umkm['kota']).' Jawa Tengah'.'&maxResults=1');
            }
            elseif ($umkm['kecamatan'] == null && $umkm['kelurahan'] == null && $umkm['kota'] !== null){
                $response = $client->request('GET', 'http://mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$umkm['kota'].'+'.str_replace($trim, '', $umkm['kota']).' Jawa Tengah'.'&maxResults=1');
            }*/

            //dd($response);

            //$response = $client->request('GET', 'http://open.mapquestapi.com/geocoding/v1/address?key=mS3RfNp804JA9cQSce21FvAMKH27Ylkw&location='.$umkm['kelurahan'].' '.$umkm['kecamatan'].' '.$umkm['kota']);
            //dd($response);
            /*$response->getStatusCode(); // 200
            $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
            $coordinate = json_decode($response->getBody(), JSON_PRETTY_PRINT);*/

            //dump($coordinate['results'][0]['locations']);
            //dump($coordinate);
            /*$coord = $coordinate['results'][0]['locations'][0]['latLng'];
            $lng = $coord['lng'];
            $lat = $coord['lat'];*/
            if (isset($umkmcek)) {
                if ($umkmcek->nib !== $umkm['nib']) {
                    $store->nib = $umkm['nib'];
                    $store->nama_perseroan = $umkm['nama_perseroan'];
                    $store->alamat_pendirian = $umkm['alamat_pendirian'];
                    $store->nama_pendaftar = $umkm['nama_pendaftar'];
                    $store->kab_kota_id = $umkm['kab_kota_id'];
                    $store->jumlah_tki = $umkm['jumlah_tki_l'];
                    $store->jumlah_tka = $umkm['jumlah_tki_p'];
                    $store->kbli = $umkm['kbli'];
                    $store->total_modal = $umkm['total_modal'];
                    $store->jumlah_investasi = $umkm['jumlah_investasi'];
                    $store->tgl_terbit_oss = $umkm['tgl_terbit_oss'];
                    $store->status_pm = $umkm['status_pm'];
                    $store->nama_pemegang_saham = $umkm['nama_pemegang_saham'];
                    $store->lat = 0 /*$lat*/;
                    $store->lng = 0 /*$lng*/;
                    $store->kelurahan = $umkm['kelurahan'];
                    $store->kecamatan = $umkm['kecamatan'];
                    $store->tahun = $umkm['tahun'];
                    //dump($store);
                    //dd($store);
                    $store->save();
                }
                else{
                    if ($umkmcek->jumlah_investasi < $umkm['jumlah_investasi']) {
                        $umkmcek->nama_perseroan = $umkm['nama_perseroan'];
                        $umkmcek->alamat_pendirian = $umkm['alamat_pendirian'];
                        $umkmcek->nama_pendaftar = $umkm['nama_pendaftar'];
                        $umkmcek->kab_kota_id = $umkm['kab_kota_id'];
                        $umkmcek->jumlah_tki = $umkm['jumlah_tki_l'];
                        $umkmcek->jumlah_tka = $umkm['jumlah_tki_p'];
                        $umkmcek->kbli = $umkm['kbli'];
                        $umkmcek->total_modal = $umkm['total_modal'];
                        $umkmcek->jumlah_investasi = $umkm['jumlah_investasi'];
                        $umkmcek->tgl_terbit_oss = $umkm['tgl_terbit_oss'];
                        $umkmcek->status_pm = $umkm['status_pm'];
                        $umkmcek->nama_pemegang_saham = $umkm['nama_pemegang_saham'];
                        $umkmcek->lat = 0 /*$lat*/;
                        $umkmcek->lng = 0 /*$lng*/;
                        $umkmcek->kelurahan = $umkm['kelurahan'];
                        $umkmcek->kecamatan = $umkm['kecamatan'];
                        $umkmcek->tahun = $umkm['tahun'];
                        //dump($store);
                        //dd($store);
                        $umkmcek->update();

                    }
                }
            }
            else{
                $store->nib = $umkm['nib'];
                $store->nama_perseroan = $umkm['nama_perseroan'];
                $store->alamat_pendirian = $umkm['alamat_pendirian'];
                $store->nama_pendaftar = $umkm['nama_pendaftar'];
                $store->kab_kota_id = $umkm['kab_kota_id'];
                $store->jumlah_tki = $umkm['jumlah_tki_l'];
                $store->jumlah_tka = $umkm['jumlah_tki_p'];
                $store->kbli = $umkm['kbli'];
                $store->total_modal = $umkm['total_modal'];
                $store->jumlah_investasi = $umkm['jumlah_investasi'];
                $store->tgl_terbit_oss = $umkm['tgl_terbit_oss'];
                $store->status_pm = $umkm['status_pm'];
                $store->nama_pemegang_saham = $umkm['nama_pemegang_saham'];
                $store->lat = 0 /*$lat*/;
                $store->lng = 0 /*$lng*/;
                $store->kelurahan = $umkm['kelurahan'];
                $store->kecamatan = $umkm['kecamatan'];
                $store->tahun = $umkm['tahun'];
                //dump($store);
                //dd($store);
                $store->save();
            }

            //sleep(1);
            //dump($kbli !== $row['kelompok']);

        }
        //die();


        return redirect()->route('show.umkm-baru')->with('success', 'berhasil');
    }

    public function export(Request $request){
        //dd($request->all());
        $year = $request->tahun;


        //dd();
        return (new UmkmNewExport($year))->download('data-umkm-'.$year.'.xlsx');
    }

    public function pisah(){

        $umkms = Umkm::where('investasi', '')->orWhereNull('investasi')->get();
        $nilai_tambahan = array();
        //dd($umkms);

        foreach ($umkms as $investasi_umkm){

            //dd($investasi_umkm);
            $investasi = collect();

            //dd((int)$umkm->jumlah_investasi);
            $tes = array();
            $kbli = array($investasi_umkm->kbli);
            //dd(json_encode($kbli));
            $nilai_investasi = array(
                    'nilai_investasi' => $investasi_umkm->jumlah_investasi,
                    'tahun' => $investasi_umkm->tahun
            );
            //dd(array_sum($nilai_investasi['nilai_investasi']));
            $tambahan = array(
                    'jenis' => null,
                    'nilai_tambahan' => null,
                    'tahun' => null,
            );

            //dd((array_sum(array_column($tambahan, 'nilai_tambahan'))));
            $total = array(
                'total' => $investasi_umkm->jumlah_investasi
            );

            $merge = array(
                'nilai_investasi' => $nilai_investasi,
                'tambahan' => $tambahan,
                'total' => $total
            );
            //dd($investasi_umkm);
            //dd($merge);
            $investasi_umkm->investasi = json_encode($merge);
            $investasi_umkm->kbli = json_encode($kbli);
            //dd($investasi_umkm);
            $investasi_umkm->update();
        }

        return 'done';
    }

    public function updateTambahan(){
        $umkms = Umkm::all();
        foreach ($umkms as $umkm){
            $investasis = json_decode($umkm->investasi, true);
            //dd($investasis);
            $new = array(
                'nilai_investasi' => $investasis['nilai_investasi'],
                'tambahan' => array(
                    $investasis['tambahan']
                ),
                'total'=> $investasis['total']
            );
            //dd($new);
            $umkm->investasi = json_encode($new);
            //dd($umkm);
            $umkm->update();
        }

        return 'ye';
    }

}
