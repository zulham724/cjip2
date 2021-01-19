<?php

namespace App\Exports;

use App\CjibfInvestor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportRekapPendaftar implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $pesertas = CjibfInvestor::all()->groupBy('meja_id');
        return view('cjibf.partials.rekap-peserta', compact('pesertas'));
    }
}
