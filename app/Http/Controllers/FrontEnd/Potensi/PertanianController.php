<?php

namespace App\Http\Controllers\FrontEnd\Potensi;

use App\Berita;
use App\Feed;
use App\LoiInterest;
use App\Pertanian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PertanianController extends Controller
{
    public function pertanian(){
        $pertanian = Pertanian::orderByViews()->paginate(10);
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        //dd($pertanian);
        return view('front-end.content.potensi.pertanian', compact('pertanian', 'intersts', 'populers', 'news'));
    }
}
