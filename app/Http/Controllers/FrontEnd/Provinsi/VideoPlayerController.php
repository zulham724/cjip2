<?php

namespace App\Http\Controllers\FrontEnd\Provinsi;

use App\Berita;
use App\Feed;
use App\LoiInterest;
use App\Pariwisata;
use App\Perikanan;
use App\Perkebunan;
use App\Pertanian;
use App\Peternakan;
use App\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;
use TCG\Voyager\Models\Menu;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class VideoPlayerController extends Controller
{

    public function home(Request $request){

            $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';
            $ikan = Perikanan::whereNotNull('komoditas_id')->orderByDesc('created_at')->take(3)->get();
            $tani = Pertanian::whereNotNull('komoditas_id')->orderByDesc('created_at')->take(3)->get();
            $kebun = Perkebunan::whereNotNull('komoditas_id')->orderByDesc('created_at')->take(3)->get();
            $ternak = Peternakan::whereNotNull('komoditas_id')->orderByDesc('created_at')->take(3)->get();
            $wisata = Pariwisata::where('status', 1)->orderByDesc('created_at')->take(3)->get();
            $ki = Proyek::where('id', 4)->get();
            foreach ($wisata as $w){
                //dd(json_decode($w->fotos));
            }
            //dd($wisata);

        //dd($ki->getCoordinates());

        //dd($menu);

        return view('front-end.master.master', compact(
            'mapsKey',
            'ikan',
            'tani',
            'kebun',
            'ternak',
            'wisata', 'ki'));
    }

    public function menu(){
        $items = Menu::display('frontend', 'front-end.layouts.menu');

        foreach ($items as $item){
            //dd($item);
        }
        //dd($items);

        return view('front-end.layouts.menu', compact('items'));
    }

    public function readPariwisata($id){
        $wisata = Pariwisata::findOrFail($id);
        $wisatas = Pariwisata::all();
        $feed = Feed::where('feed_id', $id)->where('model_name', 'pariwisatas')->first();
        //dd($feed);
        views($feed)->record();
        views($wisata)->record();
        //dd($wisata);
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        return view('front-end.content.potensi.detail.pariwisata', compact('wisata', 'intersts', 'populers', 'news'));
    }
    public function mapsPariwisata($id){
        $wisata = Pariwisata::findOrFail($id);
        $wisatas = Pariwisata::all();
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';
        //dd($wisata->nama_wisata);
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        //dd($wisata->getCoordinates());
        return view('front-end.content.potensi.maps-pariwisata', compact('wisata', 'mapsKey', 'intersts', 'populers', 'news'));
    }
    public function readPeternakan($id){
        $peternakan = Peternakan::findOrFail($id);
        $feed = Feed::where('feed_id', $id)->where('model_name', 'peternakans')->first();
        //dd($feed);
        views($feed)->record();
        views($peternakan)->record();
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        return view('front-end.content.potensi.detail.peternakan', compact('peternakan', 'intersts', 'populers', 'news'));
    }
    public function readPerikanan($id){
        $perikanan = Perikanan::findOrFail($id);
        $feed = Feed::where('feed_id', $id)->where('model_name', 'perikanans')->first();
        //dd($feed);
        views($feed)->record();
        views($perikanan)->record();
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        return view('front-end.content.potensi.detail.perikanan', compact('perikanan', 'intersts', 'populers', 'news'));
    }
    public function readPerkebunan($id){
        $perkebunan = Perkebunan::findOrFail($id);
        $feed = Feed::where('feed_id', $id)->where('model_name', 'perkebunans')->first();
        //dd($feed);
        views($feed)->record();
        views($perkebunan)->record();
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        return view('front-end.content.potensi.detail.perkebunan', compact('perkebunan', 'intersts', 'populers', 'news'));
    }
    public function readPertanian($id){
        $pertanian = Pertanian::findOrFail($id);
        $feed = Feed::where('feed_id', $id)->where('model_name', 'pertanians')->first();
        //dd($feed);
        views($feed)->record();
        views($pertanian)->record();
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        return view('front-end.content.potensi.detail.pertanian', compact('pertanian', 'intersts', 'populers', 'news'));
    }
}
