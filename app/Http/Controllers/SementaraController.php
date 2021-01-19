<?php

namespace App\Http\Controllers;

use App\Imports\BukuSementara;
use App\SementaraBukus;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SementaraController extends Controller
{
    public function import(){
        Excel::import(new BukuSementara(), public_path('sementara/PMDN-alaskaki.xlsx'));

        return "done";
    }

    public function download(){

        $bukus = SementaraBukus::all();
        $pdf = PDF::loadView('sementara', ['bukus' => $bukus]);
        return $pdf->download('buku.pdf');

    }
}
