<?php

namespace App\Exports;

use App\CjibfInvestor;
use App\Lois;
use App\ProfileInvestor;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportAllLoi implements FromView, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $lois = Lois::where('cjibf', 1)->get();
        $asal = ProfileInvestor::all();
        return view('cjibf.partials.loi-all', compact('lois', 'asal'));
    }

    public function title(): string
    {
        return 'LoI CJIBF 2019';
    }
}