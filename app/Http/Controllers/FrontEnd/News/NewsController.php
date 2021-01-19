<?php

namespace App\Http\Controllers\FrontEnd\News;

use App\Berita;
use App\Feed;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function news(){
            $news = Berita::where('status', 1)->get();

            SEOTools::setTitle('News - Central Java Investment News');
            SEOTools::setDescription('News about Investment in Central Java, Indonesia');
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::addImages('https://cjip.jatengprov.go.id/storage/settings/August2019/esr0C8HmQss78AAnlaue.png');
            SEOTools::setCanonical(url()->current());
            SEOTools::opengraph()->addProperty('type', 'website');
            SEOTools::twitter()->setSite('@DPMPTSPJateng');
            SEOTools::jsonLd()->addImage('https://cjip.jatengprov.go.id/storage/settings/August2019/esr0C8HmQss78AAnlaue.png');

            return view('front-end.content.berita.news', compact('news'));
    }

    public function test(Request $request){
        dd($request->has('test_Checkbox'));
    }

    public function readBerita($id){
        $news = Berita::findOrFail($id);
        $newss = Berita::all();
        $feed = Feed::where('feed_id', $id)->where('model_name', 'beritas')->first();

        views($news)->record();

        return view('front-end.content.berita.detail.news', compact('news'));
    }
}
