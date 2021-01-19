<?php

namespace App\Exports;

use App\CjibfInvestor;
use App\Lois;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class LoiSektor implements FromView, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $graphics = Lois::where('cjibf', 1)->groupBy('bidang_usaha')
            ->selectRaw('*, sum(nilai_usd) as sumusd, sum(nilai_rp) as sumrp, count(*) as total')
            ->get();

        return view('cjibf.partials.loi-sektor', compact('graphics'));
    }

    public function title(): string
    {
        return 'Sektor';
    }
}