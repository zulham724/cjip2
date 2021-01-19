<?php


namespace App\Exports;


use App\CjibfInvestor;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProjectKabkota implements FromView
{
    public function view(): View
    {
        $sector_info = CjibfInvestor::groupBy('sektor_interest')->select('sektor_interest', DB::raw('count(*) as totalsektor'))->get();

        return view('cjibf.partials.rekap-sector', compact('sector_info'));
    }
}