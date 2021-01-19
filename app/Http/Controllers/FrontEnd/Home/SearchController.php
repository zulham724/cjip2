<?php

namespace App\Http\Controllers\FrontEnd\Home;

use App\Feed;
use App\Pariwisata;
use App\Perikanan;
use App\Search\Search;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request){

        $keywords = $request->input('search');

        $find = Feed::search($keywords)->get();

        foreach ($find as $fi){
            //dd($fi);
        }
        //dd($find);

        if (!isset($find) == true){

        }
        else {
            //dd($find);
            return view('front-end.search-result', compact('find', 'keywords'));
        }
    }
}
