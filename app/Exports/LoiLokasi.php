<?php

namespace App\Exports;

use App\CjibfInvestor;
use App\Lois;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class LoiLokasi implements FromView, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $graphics = Lois::where('cjibf', 1)->groupBy('kab_kota_id')
            ->selectRaw('*, sum(nilai_usd) as sumusd, sum(nilai_rp) as sumrp')
            ->get();

        return view('cjibf.partials.loi-lokasi', compact('graphics'));
    }

    public function title(): string
    {
        return 'Lokasi';
    }
}