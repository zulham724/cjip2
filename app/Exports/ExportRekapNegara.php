<?php

namespace App\Exports;

use App\CjibfInvestor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportRekapNegara implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $country_info = CjibfInvestor::with('profil')->get()->groupBy('profil.country');
        $pesertas2 = CjibfInvestor::all();

        return view('cjibf.partials.rekap-negara', compact('country_info', 'pesertas2'));
    }
}