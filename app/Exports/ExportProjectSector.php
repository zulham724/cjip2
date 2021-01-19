<?php


namespace App\Exports;


use App\CjibfInvestor;
use App\Proyek;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProjectSector implements FromView
{
    public function view(): View
    {
        $proyeks = Proyek::where('status', 1)
            ->leftJoin('user', 'user.id', '=', 'proyeks.kab_kota_id')
            ->select('proyeks.id', \DB::raw('COUNT(proyeks.nilai_investasi)'))
            ->groupBy('proyeks.kab_kota_id')
            ->get();
        dd($proyeks);
        foreach ($proyeks as $proyek){
            dd($proyek);
        }
        return view('cjibf.partials.rekap-project-sector', compact('proyeks'));
    }
}