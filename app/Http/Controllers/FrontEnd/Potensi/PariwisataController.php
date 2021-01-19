<?php

namespace App\Http\Controllers\FrontEnd\Potensi;

use App\Berita;
use App\Feed;
use App\LoiInterest;
use App\Pariwisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PariwisataController extends Controller
{
    public function pariwisata(){
        $pariwisata = Pariwisata::orderByViews()->paginate(10);
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        //dd($pariwisata);
        return view('front-end.content.potensi.pariwisata', compact('pariwisata', 'intersts', 'populers', 'news'));
    }
}
