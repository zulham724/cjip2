<?php

namespace App\Http\Controllers\FrontEnd\Potensi;

use App\Berita;
use App\Feed;
use App\LoiInterest;
use App\Perikanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerikananController extends Controller
{
    public function perikanan(){
        $perikanan = Perikanan::orderByViews()->paginate(10);
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        //dd($populers);
        //dd($intersts->isEmpty());
        //dd($perikanan);
        return view('front-end.content.potensi.perikanan', compact('perikanan','intersts', 'populers', 'news'));
    }
}
