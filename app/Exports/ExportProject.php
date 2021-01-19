<?php


namespace App\Exports;


use App\CjibfInvestor;
use App\Proyek;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProject implements FromView
{
    public function view(): View
    {
        $proyeks = Proyek::whereHas('marketplace', function ($query) {
            $query->where('name', '=', 'Ready to Offer');
        })->where('status', 1)->get();

        foreach ($proyeks as $p){
            $total[] = (int)str_replace(['Rp', '.', ',', '%', ': Dairy goat cultivation area Rp 97.213.602.800 and Goat milk processing factory Rp 62.762.973.308', 'Total ', ' (22% Pemerintah Kota, 38% Swasta, 40% CSR)'], '', $p->nilai_investasi);

        }
        $potensial = Proyek::whereHas('marketplace', function ($query) {
            $query->where('name', '=', 'Potential Project');
        })->where('status', 1)->get();

        foreach ($potensial as $pot){
            $totalpot[] = (int)str_replace(['Rp', '.', ',', '%', ': Dairy goat cultivation area Rp 97.213.602.800 and Goat milk processing factory Rp 62.762.973.308', 'Total ', ' (22% Pemerintah Kota, 38% Swasta, 40% CSR)'], '', $pot->nilai_investasi);

        }
        $pros = Proyek::whereHas('marketplace', function ($query) {
            $query->where('name', '=', 'Potential Project');
        })->where('status', 1)->get();

        foreach ($pros as $pro){
            $totalpro[] = (int)str_replace(['Rp', '.', ',', '%', ': Dairy goat cultivation area Rp 97.213.602.800 and Goat milk processing factory Rp 62.762.973.308', 'Total ', ' (22% Pemerintah Kota, 38% Swasta, 40% CSR)'], '', $pro->nilai_investasi);

        }
        //dd(array_sum($total));
        return view('cjibf.partials.rekap-project', compact('proyeks', 'total', 'totalpro', 'totalpot'));
    }
}