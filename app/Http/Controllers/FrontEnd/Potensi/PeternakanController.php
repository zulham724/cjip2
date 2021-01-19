<?php

namespace App\Http\Controllers\FrontEnd\Potensi;

use App\LoiInterest;
use App\Feed;
use App\Berita;
use App\Peternakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeternakanController extends Controller
{
    public function peternakan(){
        $peternakan = Peternakan::orderByViews()->paginate(10);
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        //dd($peternakan);
        return view('front-end.content.potensi.peternakan', compact('peternakan', 'intersts', 'populers', 'news'));
    }
}
