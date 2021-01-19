<?php

namespace App\Http\Controllers\FrontEnd\Regulasi;

use App\Regulasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegulasiController extends Controller
{
    public function regulasi(){

        $regulasi = Regulasi::all()->sortByDesc('created_at');
        //dd($regulasi);

        return view('front-end.content.regulasi.regulasi');
    }
}
