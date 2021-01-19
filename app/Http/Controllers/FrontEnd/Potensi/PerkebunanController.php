<?php

namespace App\Http\Controllers\FrontEnd\Potensi;

use App\Berita;
use App\Feed;
use App\LoiInterest;
use App\Perkebunan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerkebunanController extends Controller
{
    public function perkebunan(){
        $perkebunan = Perkebunan::orderByViews()->paginate(10);
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        //dd($perkebunan);
        return view('front-end.content.potensi.perkebunan', compact('perkebunan', 'intersts', 'populers', 'news'));
    }
}
