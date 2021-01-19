<?php


namespace App\Exports;


use App\CjibfInvestor;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ExportRekapLokasi implements FromView
{
    public function view(): View
    {
        $user_info = CjibfInvestor::groupBy('kab_kota_id')->select('kab_kota_id', DB::raw('count(*) as total'))->get();

        return view('cjibf.partials.rekap-lokasi', compact('user_info'));
    }
}