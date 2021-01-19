<?php

namespace App\Http\Controllers\CJIBF;

use App\CjibfInvestor;
use App\Exports\ExportLoiCjibf;
use App\Exports\ExportProject;
use App\Exports\ExportProjectKabkota;
use App\Exports\ExportProjectSector;
use App\Exports\ExportRekapLokasi;
use App\Exports\ExportRekapNegara;
use App\Exports\ExportRekapPendaftar;
use App\Exports\ExportRekapSektor;
use App\Lois;
use App\ProfileInvestor;
use App\Widgets\Loi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RekapPendaftarController extends Controller
{
    public function cetakRekap(){

        return Excel::download(new ExportRekapPendaftar, 'rekap-peserta-cjibf-2019.xlsx');
    }
    public function cetakLokasi(){

        return Excel::download(new ExportRekapLokasi(), 'rekap-cjibf-by-locations-2019.xlsx');
    }
    public function cetakSektor(){

        return Excel::download(new ExportRekapSektor(), 'rekap-cjibf-by-sectors-2019.xlsx');
    }
    public function cetakNegara(){

        return Excel::download(new ExportRekapNegara(), 'rekap-cjibf-by-country-2019.xlsx');
    }

    public function rekapProject(){
        return Excel::download(new ExportProject(), 'rekap-cjibf-by-country-2019.xlsx');

    }
    public function rekapProjectSector(){
        return Excel::download(new ExportProjectSector(), 'rekap-cjibf-by-country-2019.xlsx');

    }
    public function rekapProjectKabkota(){
        return Excel::download(new ExportProjectKabkota(), 'rekap-cjibf-by-country-2019.xlsx');

    }

    public function rekapLoI(){

        $lois = Lois::where('cjibf', 1)->get();
        //dd($lois[1]->nama_perusahaan);
        $loi_country = DB::table('lois')
            ->join('profile_investors', 'profile_investors.nama_perusahaan' , '=', 'lois.nama_perusahaan')
            ->select(DB::raw("sum(lois.nilai_rp) as sumrp"), DB::raw("sum(lois.nilai_usd) as sumusd"))
            ->where('cjibf', '=', 1)
            ->groupBy('lois.asal_negara')
            ->get();

        $graphics = Lois::where('cjibf', 1)->groupBy('bidang_usaha')
            ->selectRaw('*, sum(nilai_usd) as sumusd, sum(nilai_rp) as sumrp, count(*) as total')
            ->get();
        //dd($graphics);
        /*foreach ($graphics as $g){
            dump($g->bidang_usaha);
        }
        die();*/

        //dd($loi_country);

        return Excel::download(new ExportLoiCjibf(), 'rekap-loi-cjibf-by-country-2019.xlsx');


    }
}
