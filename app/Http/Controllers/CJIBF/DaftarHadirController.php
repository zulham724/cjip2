<?php

namespace App\Http\Controllers\CJIBF;

use App\CjibfInvestor;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarHadirController extends Controller
{
    public function cetak(){
        $order = 'asc';
        $pesertas = CjibfInvestor::join('profile_investors', 'cjibf_investor.profile_id', '=', 'profile_investors.id')->orderBy('nama_perusahaan', $order)->select('cjibf_investor.*')->get();

        //dd($pesertass);
        $pdf = PDF::loadview('cjibf.partials.daftar-hadir',['pesertas'=>$pesertas])->setPaper([0, 0, 609.45, 935.43], 'landscape');
        return $pdf->download('daftar-hadir.pdf');
    }

    public function cetakMeja(){
        $order = 'asc';
        $pesertas = CjibfInvestor::all()->groupBy('meja_id');

        //dd($pesertas);
        $pdf = PDF::loadview('cjibf.partials.daftar-hadir-meja',['pesertas'=>$pesertas])->setPaper([0, 0, 609.45, 935.43], 'landscape');
        return $pdf->download('daftar-hadir.pdf');
       // return view('cjibf.partials.daftar-hadir-meja',['pesertas'=>$pesertas]);
    }

}
