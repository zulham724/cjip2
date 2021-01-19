<?php

namespace App\Http\Controllers\FrontEnd\Kajian;

use App\KajianPeluang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KajianController extends Controller
{
    public function kajian(){

        $files = KajianPeluang::all()->sortByDesc('created_at');
        //dd($files);
        return view('front-end.content.kajian.kajian', compact('files'));
    }
}
