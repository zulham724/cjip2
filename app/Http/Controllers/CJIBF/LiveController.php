<?php

namespace App\Http\Controllers\CJIBF;

use App\CjibfInvestor;
use App\CjibfSektor;
use App\Lois;
use App\ProfileInvestor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveController extends Controller
{
    public function live(){

        $lois = Lois::where('cjibf', 1)->orderBy('created_at', 'desc')->get();
        //dd($lois);
        $graphics = Lois::groupBy('bidang_usaha')
            ->selectRaw('*, sum(nilai_usd) as sumusd, sum(nilai_rp) as sumrp')
            ->get();

        if (isset($lois)){
            $rp = Lois::where('cjibf', 1)->sum('nilai_rp');
            //dd($rp);
            $usd = Lois::where('cjibf', 1)->sum('nilai_usd');
        }
        else{
            $rp = "0";
            $usd = "0";
        }

        return view('front-end.live-count.live-count', compact('lois', 'rp', 'usd', 'graphics'
            ));
    }

    public function reload(){
        $lois = Lois::where('cjibf', 1)->orderBy('created_at', 'desc')->get();
        //dd($lois[0]->kota[0]->nama);
        $graphics = Lois::groupBy('bidang_usaha')
            ->selectRaw('*, sum(nilai_usd) as sumusd, sum(nilai_rp) as sumrp')
            ->get();
        //dd($graphics);

        $asal = ProfileInvestor::all();
        if (isset($lois)){
            $rp = Lois::where('cjibf', 1)->sum('nilai_rp');
            //dd($rp);
            $usd = Lois::where('cjibf', 1)->sum('nilai_usd');
        }
        else{
            $rp = "0";
            $usd = "0";
        }
        return view('front-end.live-count.reload', compact('lois', 'rp', 'usd', 'graphics', 'asal'
        ));
    }

    public function reloadtotal(){
        $lois = Lois::where('cjibf', 1)->orderBy('created_at', 'desc')->get();

        $graphics = Lois::groupBy('bidang_usaha')
            ->selectRaw('*, sum(nilai_usd) as sumusd, sum(nilai_rp) as sumrp')
            ->get();

        if (isset($lois)){
            $rp = Lois::where('cjibf', 1)->sum('nilai_rp');
            //dd($rp);
            $usd = Lois::where('cjibf', 1)->sum('nilai_usd');
        }
        else{
            $rp = "0";
            $usd = "0";
        }
        return view('front-end.live-count.reload-total', compact('lois', 'rp', 'usd', 'graphics'
        ));
    }
    public function reloadchart(){
        $lois = Lois::where('cjibf', 1)->orderBy('created_at', 'desc')->get();
        $graphics = Lois::where('cjibf', 1)->groupBy('bidang_usaha')
            ->selectRaw('*, sum(nilai_usd) as sumusd, sum(nilai_rp) as sumrp')
            ->get();
        //dd($lois[0]);

        if (isset($lois)){
            $rp = Lois::where('cjibf', 1)->sum('nilai_rp');
            //dd($rp);
            $usd = Lois::where('cjibf', 1)->sum('nilai_usd');

        }
        else{
            $rp = "0";
            $usd = "0";
        }
        return view('front-end.live-count.reload-chart', compact('lois', 'rp', 'usd', 'graphics'
        ));
    }
}
